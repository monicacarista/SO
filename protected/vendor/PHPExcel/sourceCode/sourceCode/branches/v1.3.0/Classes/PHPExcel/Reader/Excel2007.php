<?php
/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2007 PHPExcel, Maarten Balliauw
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel_Reader
 * @copyright  Copyright (c) 2006 - 2007 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/lgpl.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */


/** PHPExcel */
require_once 'PHPExcel.php';

/** PHPExcel_Reader_IReader */
require_once 'PHPExcel/Reader/IReader.php';

/** PHPExcel_Worksheet */
require_once 'PHPExcel/Worksheet.php';

/** PHPExcel_Cell */
require_once 'PHPExcel/Cell.php';

/** PHPExcel_Style */
require_once 'PHPExcel/Style.php';

/** PHPExcel_Style_Borders */
require_once 'PHPExcel/Style/Borders.php';

/** PHPExcel_Style_Conditional */
require_once 'PHPExcel/Style/Conditional.php';

/** PHPExcel_Worksheet_Drawing */
require_once 'PHPExcel/Worksheet/Drawing.php';

/** PHPExcel_Shared_Drawing */
require_once 'PHPExcel/Shared/Drawing.php';


/**
 * PHPExcel_Reader_Excel2007
 *
 * @category   PHPExcel
 * @package    PHPExcel_Reader
 * @copyright  Copyright (c) 2006 - 2007 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Reader_Excel2007 implements PHPExcel_Reader_IReader
{
	/**
	 * Loads PHPExcel from file
	 *
	 * @param 	string 		$pFilename
	 * @throws 	Exception
	 */	
	public function load($pFilename)
	{
		// Check if file exists
		if (!file_exists($pFilename)) {
			throw new Exception("Could not open " . $pFilename . " for reading! File does not exist.");
		}
			
		// Initialisations
		$excel = new PHPExcel;
		$excel->removeSheetByIndex(0);
		
		$rels = simplexml_load_file("zip://$pFilename#_rels/.rels"); //~ http://schemas.openxmlformats.org/package/2006/relationships");
		foreach ($rels->Relationship as $rel) {
			switch ($rel["Type"]) {
				case "http://schemas.openxmlformats.org/package/2006/relationships/metadata/core-properties":
					$xmlCore = simplexml_load_file("zip://$pFilename#$rel[Target]");
					$xmlCore->registerXPathNamespace("dc", "http://purl.org/dc/elements/1.1/");
					$xmlCore->registerXPathNamespace("dcterms", "http://purl.org/dc/terms/");
					$xmlCore->registerXPathNamespace("cp", "http://schemas.openxmlformats.org/package/2006/metadata/core-properties");
					$docProps = $excel->getProperties();
					$docProps->setCreator((string) self::array_item($xmlCore->xpath("dc:creator")));
					$docProps->setLastModifiedBy((string) self::array_item($xmlCore->xpath("cp:lastModifiedBy")));
					$docProps->setCreated(strtotime(self::array_item($xmlCore->xpath("dcterms:created")))); //! respect xsi:type
					$docProps->setModified(strtotime(self::array_item($xmlCore->xpath("dcterms:modified")))); //! respect xsi:type
					$docProps->setTitle((string) self::array_item($xmlCore->xpath("dc:title")));
					$docProps->setDescription((string) self::array_item($xmlCore->xpath("dc:description")));
					$docProps->setSubject((string) self::array_item($xmlCore->xpath("dc:subject")));
				break;
				
				case "http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument":
					$dir = dirname($rel["Target"]);
					$relsWorkbook = simplexml_load_file("zip://$pFilename#$dir/_rels/" . basename($rel["Target"]) . ".rels"); //~ http://schemas.openxmlformats.org/package/2006/relationships");
					$relsWorkbook->registerXPathNamespace("rel", "http://schemas.openxmlformats.org/package/2006/relationships");
					
					$sharedStrings = array();
					$xpath = self::array_item($relsWorkbook->xpath("rel:Relationship[@Type='http://schemas.openxmlformats.org/officeDocument/2006/relationships/sharedStrings']"));
					$xmlStrings = simplexml_load_file("zip://$pFilename#$dir/$xpath[Target]"); //~ http://schemas.openxmlformats.org/spreadsheetml/2006/main");
					foreach ($xmlStrings->si as $val) {
						$sharedStrings[] = (string) $val->t;
					}
					
					$worksheets = array();
					foreach ($relsWorkbook->Relationship as $ele) {
						if ($ele["Type"] == "http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet") {
							$worksheets[(string) $ele["Id"]] = $ele["Target"];
						}
					}
					
					$styles = array();
					$xpath = self::array_item($relsWorkbook->xpath("rel:Relationship[@Type='http://schemas.openxmlformats.org/officeDocument/2006/relationships/styles']"));
					$xmlStyles = simplexml_load_file("zip://$pFilename#$dir/$xpath[Target]"); //~ http://schemas.openxmlformats.org/spreadsheetml/2006/main");
					$numFmts = $xmlStyles->numFmts[0];
					if ($numFmts) {
						$numFmts->registerXPathNamespace("sml", "http://schemas.openxmlformats.org/spreadsheetml/2006/main");
					}
					foreach ($xmlStyles->cellStyles->cellStyle as $style) {
						$xf = $xmlStyles->cellStyleXfs->xf[intval($style["xfId"])];
						$styles[] = (object) array(
							"numFmt" => ($numFmts ? self::array_item($numFmts->xpath("sml:numFmt[@numFmtId=$xf[numFmtId]]")) : 0),
							"font" => $xmlStyles->fonts->font[intval($xf["fontId"])],
							"fill" => $xmlStyles->fills->fill[intval($xf["fillId"])],
							"border" => $xmlStyles->borders->border[intval($xf["borderId"])],
							"alignment" => $xf->alignment,
						);
					}
					
					$dxfs = array();
					foreach ($xmlStyles->dxfs->dxf as $dxf) {
						$style = new PHPExcel_Style;
						$this->_readStyle($style, $dxf);
						$dxfs[] = $style;
					}
					
					$xmlWorkbook = simplexml_load_file("zip://$pFilename#$rel[Target]"); //~ http://schemas.openxmlformats.org/spreadsheetml/2006/main");
					foreach ($xmlWorkbook->sheets->sheet as $eleSheet) {
						$docSheet = $excel->createSheet();
						$docSheet->setTitle((string) $eleSheet["name"]);
						$fileWorksheet = $worksheets[(string) self::array_item($eleSheet->attributes("http://schemas.openxmlformats.org/officeDocument/2006/relationships"), "id")];
						$xmlSheet = simplexml_load_file("zip://$pFilename#$dir/$fileWorksheet"); //~ http://schemas.openxmlformats.org/spreadsheetml/2006/main");
						foreach ($xmlSheet->cols->col as $col) {
							for ($i=intval($col["min"])-1; $i < intval($col["max"]); $i++) {
								if ($col["bestFit"]) {
									$docSheet->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($i))->setAutoSize(true);
								}
								$docSheet->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($i))->setWidth(floatval($col["width"]));
							}
						}
						
						foreach ($xmlSheet->sheetData->row as $row) {
							if ($row["ht"]) {
								$docSheet->getRowDimension(intval($row["r"]))->setRowHeight(floatval($row["ht"]));
							}
							foreach ($row->c as $c) {
								$r = (string) $c["r"];
								switch ($c["t"]) {
									case "s": $value = $sharedStrings[intval($c->v)]; break;
									case "b": $value = (bool) $c->v; break;
									case "str": $value = "=$c->f"; break;
									case "inlineStr": $value = (string) $c->is->t; break;
									default: $value = (string) $c->v; break;
								}
								if ($value) {
									$docSheet->setCellValue($r, $value);
								}
								if ($c["s"]) {
									$this->_readStyle($docSheet->getStyle($r), $styles[intval($c["s"])]);
								}
							}
						}
						
						$conditionals = array();
						foreach ($xmlSheet->conditionalFormatting as $conditional) {
							foreach ($conditional->cfRule as $cfRule) {
								$conditionals[(string) $conditional["sqref"]][intval($cfRule["priority"])] = $cfRule;
							}
						}
						foreach ($conditionals as $ref => $cfRules) {
							ksort($cfRules);
							$conditionalStyles = array();
							foreach ($cfRules as $cfRule) {
								$objConditional = new PHPExcel_Style_Conditional;
								$objConditional->setConditionType((string) $cfRule["type"]);
								$objConditional->setOperatorType((string) $cfRule["operator"]);
								$objConditional->setCondition((string) $cfRule->formula);
								$objConditional->setStyle($dxfs[intval($cfRule["dxfId"])]);
								$conditionalStyles[] = $objConditional;
							}
							$docSheet->getStyle($ref)->setConditionalStyles($conditionalStyles);
						}
						
						foreach (array("sheet", "objects", "scenarios", "formatCells", "formatColumns", "formatRows", "insertColumns", "insertRows", "insertHyperlinks", "deleteColumns", "deleteRows", "selectLockedCells", "sort", "autoFilter", "pivotTables", "selectUnlockedCells") as $key) {
							$method = "set" . ucfirst($key);
							$docSheet->getProtection()->$method($xmlSheet->sheetProtection[$key] == "true");
						}
						$docSheet->getProtection()->setPassword((string) $xmlSheet->sheetProtection["password"], true);
						if ($xmlSheet->protectedRanges->protectedRange) {
							foreach ($xmlSheet->protectedRanges->protectedRange as $protectedRange) {
								$docSheet->protectCells((string) $protectedRange["sqref"], (string) $protectedRange["password"], true);
							}
						}
						
						if ($xmlSheet->autoFilter) {
							$docSheet->setAutoFilter((string) $xmlSheet->autoFilter["ref"]);
						}
						
						if ($xmlSheet->mergeCells->mergeCell) {
							foreach ($xmlSheet->mergeCells->mergeCell as $mergeCell) {
								$docSheet->mergeCells((string) $mergeCell["ref"]);
							}
						}
						
						$docPageMargins = $docSheet->getPageMargins();
						$docPageMargins->setLeft(floatval($xmlSheet->pageMargins["left"]));
						$docPageMargins->setRight(floatval($xmlSheet->pageMargins["right"]));
						$docPageMargins->setTop(floatval($xmlSheet->pageMargins["top"]));
						$docPageMargins->setBottom(floatval($xmlSheet->pageMargins["bottom"]));
						$docPageMargins->setHeader(floatval($xmlSheet->pageMargins["header"]));
						$docPageMargins->setFooter(floatval($xmlSheet->pageMargins["footer"]));
						
						$docPageSetup = $docSheet->getPageSetup();
						$docPageSetup->setOrientation((string) $xmlSheet->pageSetup["orientation"]);
						$docPageSetup->setPaperSize(intval($xmlSheet->pageSetup["paperSize"]));
						
						$docHeaderFooter = $docSheet->getHeaderFooter();
						$docHeaderFooter->setDifferentOddEven($xmlSheet->headerFooter["differentOddEven"] == 'true');
						$docHeaderFooter->setDifferentFirst($xmlSheet->headerFooter["differentFirst"] == 'true');
						$docHeaderFooter->setScaleWithDocument($xmlSheet->headerFooter["scaleWithDoc"] == 'true');
						$docHeaderFooter->setAlignWithMargins($xmlSheet->headerFooter["alignWithMargins"] == 'true');
						$docHeaderFooter->setOddHeader((string) $xmlSheet->headerFooter->oddHeader);
						$docHeaderFooter->setOddFooter((string) $xmlSheet->headerFooter->oddFooter);
						$docHeaderFooter->setEvenHeader((string) $xmlSheet->headerFooter->evenHeader);
						$docHeaderFooter->setEvenFooter((string) $xmlSheet->headerFooter->evenFooter);
						$docHeaderFooter->setFirstHeader((string) $xmlSheet->headerFooter->firstHeader);
						$docHeaderFooter->setFirstFooter((string) $xmlSheet->headerFooter->firstFooter);
						
						if ($xmlSheet->rowBreaks->brk) {
							foreach ($xmlSheet->rowBreaks->brk as $brk) {
								if ($brk["man"]) {
									$docSheet->setBreak("A$brk[id]", PHPExcel_Worksheet::BREAK_ROW);
								}
							}
						}
						if ($xmlSheet->colBreaks->brk) {
							foreach ($xmlSheet->colBreaks->brk as $brk) {
								if ($brk["man"]) {
									$docSheet->setBreak(PHPExcel_Cell::stringFromColumnIndex($brk["id"]) . "1", PHPExcel_Worksheet::BREAK_COLUMN);
								}
							}
						}
						
						$relsWorksheet = simplexml_load_file("zip://$pFilename#" . dirname("$dir/$fileWorksheet") . "/_rels/" . basename($fileWorksheet) . ".rels"); //~ http://schemas.openxmlformats.org/package/2006/relationships");
						$drawings = array();
						foreach ($relsWorksheet->Relationship as $ele) {
							if ($ele["Type"] == "http://schemas.openxmlformats.org/officeDocument/2006/relationships/drawing") {
								$drawings[(string) $ele["Id"]] = self::dir_add("$dir/$fileWorksheet", $ele["Target"]);
							}
						}
						if ($xmlSheet->drawing) {
							foreach ($xmlSheet->drawing as $drawing) {
								$fileDrawing = $drawings[(string) self::array_item($drawing->attributes("http://schemas.openxmlformats.org/officeDocument/2006/relationships"), "id")];
								$relsDrawing = simplexml_load_file("zip://$pFilename#" . dirname($fileDrawing) . "/_rels/" . basename($fileDrawing) . ".rels"); //~ http://schemas.openxmlformats.org/package/2006/relationships");
								$images = array();
								foreach ($relsDrawing->Relationship as $ele) {
									if ($ele["Type"] == "http://schemas.openxmlformats.org/officeDocument/2006/relationships/image") {
										$images[(string) $ele["Id"]] = self::dir_add($fileDrawing, $ele["Target"]);
									}
								}
								$xmlDrawing = simplexml_load_file("zip://$pFilename#$fileDrawing")->children("http://schemas.openxmlformats.org/drawingml/2006/spreadsheetDrawing");
								foreach ($xmlDrawing->oneCellAnchor as $oneCellAnchor) {
									$blip = $oneCellAnchor->pic->blipFill->children("http://schemas.openxmlformats.org/drawingml/2006/main")->blip;
									$xfrm = $oneCellAnchor->pic->spPr->children("http://schemas.openxmlformats.org/drawingml/2006/main")->xfrm;
									$objDrawing = new PHPExcel_Worksheet_Drawing;
									$objDrawing->setName((string) self::array_item($oneCellAnchor->pic->nvPicPr->cNvPr->attributes(), "name"));
									$objDrawing->setDescription((string) self::array_item($oneCellAnchor->pic->nvPicPr->cNvPr->attributes(), "descr"));
									$objDrawing->setPath("zip://$pFilename#" . $images[(string) self::array_item($blip->attributes("http://schemas.openxmlformats.org/officeDocument/2006/relationships"), "embed")], false);
									$objDrawing->setCoordinates(PHPExcel_Cell::stringFromColumnIndex($oneCellAnchor->from->col) . ($oneCellAnchor->from->row + 1));
									$objDrawing->setOffsetX(PHPExcel_Shared_Drawing::EMUToPixels($oneCellAnchor->from->colOff));
									$objDrawing->setOffsetY(PHPExcel_Shared_Drawing::EMUToPixels($oneCellAnchor->from->rowOff));
									$objDrawing->setResizeProportional(false);
									$objDrawing->setWidth(PHPExcel_Shared_Drawing::EMUToPixels(self::array_item($oneCellAnchor->ext->attributes(), "cx")));
									$objDrawing->setHeight(PHPExcel_Shared_Drawing::EMUToPixels(self::array_item($oneCellAnchor->ext->attributes(), "cy")));
									if ($xfrm) {
										$objDrawing->setRotation(PHPExcel_Shared_Drawing::angleToDegrees(self::array_item($xfrm->attributes(), "rot")));
									}
									//! $shadow = $objDrawing->getShadow();
									$objDrawing->setWorksheet($docSheet);
								}
							}
						}
						
					}
					
					$excel->setActiveSheetIndex(intval($xmlWorkbook->bookView->workbookView["activeTab"]));
				break;
			}
		}
		
		return $excel;
	}
	
	private function _readStyle($docStyle, $style) {
		// format code
		$docStyle->getNumberFormat()->setFormatCode((string) $style->numFmt["formatCode"]);
		
		// font
		$docStyle->getFont()->setName((string) $style->font->name["val"]);
		$docStyle->getFont()->setSize((string) $style->font->sz["val"]);
		$docStyle->getFont()->setBold($style->font->b["val"] == 'true');
		$docStyle->getFont()->setItalic($style->font->i["val"] == 'true');
		$docStyle->getFont()->setStriketrough($style->font->strike["val"] == 'true');
		$docStyle->getFont()->getColor()->setARGB((string) $style->font->color["rgb"]);
		$docStyle->getFont()->setUnderline((string) $style->font->u["val"]);
		
		// fill
		if ($style->fill->gradientFill) {
			$gradientFill = $style->fill->gradientFill[0];
			$docStyle->getFill()->setFillType((string) $gradientFill["type"]);
			$docStyle->getFill()->setRotation(floatval($gradientFill["degree"]));
			$gradientFill->registerXPathNamespace("sml", "http://schemas.openxmlformats.org/spreadsheetml/2006/main");
			$docStyle->getFill()->getStartColor()->setARGB((string) self::array_item($gradientFill->xpath("sml:stop[@position=0]"))->color["rgb"]);
			$docStyle->getFill()->getEndColor()->setARGB((string) self::array_item($gradientFill->xpath("sml:stop[@position=1]"))->color["rgb"]);
		} elseif ($style->fill->patternFill) {
			$docStyle->getFill()->setFillType((string) $style->fill->patternFill["patternType"]);
			if ($style->fill->patternFill->fgColor) {
				$docStyle->getFill()->getStartColor()->setARGB((string) $style->fill->patternFill->fgColor["rgb"]);
			}
			if ($style->fill->patternFill->bgColor) {
				$docStyle->getFill()->getEndColor()->setARGB((string) $style->fill->patternFill->bgColor["rgb"]);
			}
		}
		
		// border
		if ($style->border["diagonalUp"] == 'true') {
			$docStyle->getBorders()->setDiagonalDirection(PHPExcel_Style_Borders::DIAGONAL_UP);
		} elseif ($style->border["diagonalDown"] == 'true') {
			$docStyle->getBorders()->setDiagonalDirection(PHPExcel_Style_Borders::DIAGONAL_DOWN);
		}
		$docStyle->getBorders()->setOutline($style->border["outline"] == 'true');
		$this->_readBorder($docStyle->getBorders()->getLeft(), $style->border->left);
		$this->_readBorder($docStyle->getBorders()->getRight(), $style->border->right);
		$this->_readBorder($docStyle->getBorders()->getTop(), $style->border->top);
		$this->_readBorder($docStyle->getBorders()->getBottom(), $style->border->bottom);
		$this->_readBorder($docStyle->getBorders()->getDiagonal(), $style->border->diagonal);
		$this->_readBorder($docStyle->getBorders()->getVertical(), $style->border->vertical);
		$this->_readBorder($docStyle->getBorders()->getHorizontal(), $style->border->horizontal);
		
		// alignment
		$docStyle->getAlignment()->setHorizontal((string) $style->alignment["horizontal"]);
		$docStyle->getAlignment()->setVertical((string) $style->alignment["vertical"]);
		$docStyle->getAlignment()->setTextRotation(intval($style->alignment["textRotation"]));
		$docStyle->getAlignment()->setWrapText($style->alignment["wrapText"] == "true");
	}
	
	private function _readBorder($docBorder, $eleBorder) {
		if (isset($eleBorder["style"])) {
			$docBorder->setBorderStyle((string) $eleBorder["style"]);
		}
		if (isset($eleBorder->color["rgb"])) {
			$docBorder->getColor()->setARGB((string) $eleBorder->color["rgb"]);
		}
	}

	private static function array_item($array, $key = 0) {
		return $array[$key];
	}
	
	private static function dir_add($base, $add) {
		return preg_replace('~[^/]+/\.\./~', '', dirname($base) . "/$add");
	}
	
}
