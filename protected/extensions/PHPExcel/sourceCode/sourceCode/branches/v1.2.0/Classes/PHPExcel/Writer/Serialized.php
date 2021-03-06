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
 * @package    PHPExcel_Writer
 * @copyright  Copyright (c) 2006 - 2007 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/lgpl.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */


/** PHPExcel */
require_once 'PHPExcel.php';

/** PHPExcel_HashTable */
require_once 'PHPExcel/HashTable.php';

/** PHPExcel_IComparable */
require_once 'PHPExcel/IComparable.php';

/** PHPExcel_Worksheet */
require_once 'PHPExcel/Worksheet.php';

/** PHPExcel_Cell */
require_once 'PHPExcel/Cell.php';

/** PHPExcel_IWriter */
require_once 'PHPExcel/Writer/IWriter.php';


/**
 * PHPExcel_Writer_Serialized
 *
 * @category   PHPExcel
 * @package    PHPExcel_Writer
 * @copyright  Copyright (c) 2006 - 2007 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Writer_Serialized implements PHPExcel_Writer_IWriter
{
	/**
	 * Private PHPExcel
	 *
	 * @var PHPExcel
	 */
	private $_spreadSheet;
	
    /**
     * Create a new PHPExcel_Writer_Serialized
     *
	 * @param 	PHPExcel	$pPHPExcel
     */
    public function __construct($pPHPExcel = null)
    {
    	// Assign PHPExcel
		if ($pPHPExcel instanceof PHPExcel) {
			// Set property PHPExcel
			$this->setPHPExcel($pPHPExcel);
		} else {
			throw new Exception("Invalid PHPExcel object passed.");
		}
    }
	
	/**
	 * Save PHPExcel to file
	 *
	 * @param 	string 		$pFileName
	 * @throws 	Exception
	 */	
	public function save($pFilename = null)
	{
		if (!is_null($this->_spreadSheet)) {
			// Create new ZIP file and open it for writing
			$objZip = new ZipArchive();
			
			// Try opening the ZIP file
			if ($objZip->open($pFilename, ZIPARCHIVE::OVERWRITE) !== true) {
				throw new Exception("Could not open " . $pFilename . " for writing!");
			}
					
			// Add media
			for ($i = 0; $i < $this->_spreadSheet->getSheetCount(); $i++) {
				for ($j = 0; $j < $this->_spreadSheet->getSheet($i)->getDrawingCollection()->count(); $j++) {
					$imgTemp = $this->_spreadSheet->getSheet($i)->getDrawingCollection()->offsetGet($j);
					$objZip->addFromString('media/' . $imgTemp->getFilename(), file_get_contents($imgTemp->getPath()));
				}
			}
						
			// Add phpexcel.xml to the document, which represents a PHP serialized PHPExcel object
			$objZip->addFromString('phpexcel.xml', $this->_writeSerialized($this->_spreadSheet, $pFilename));
			
			// Close file
			$objZip->close();
		} else {
			throw new Exception("PHPExcel object unassigned.");
		}
	}
	
	/**
	 * Get PHPExcel object
	 *
	 * @return PHPExcel
	 * @throws Exception
	 */
	public function getPHPExcel() {
		if (!is_null($this->_spreadSheet)) {
			return $this->_spreadSheet;
		} else {
			throw new Exception("No PHPExcel assigned.");
		}
	}
	
	/**
	 * Get PHPExcel object
	 *
	 * @param 	PHPExcel 	$pPHPExcel	PHPExcel object
	 * @throws	Exception
	 */
	public function setPHPExcel($pPHPExcel = null) {
		if ($pPHPExcel instanceof PHPExcel) {
			$this->_spreadSheet = $pPHPExcel;
		} else {
			throw new Exception("Invalid PHPExcel object passed.");
		}
	}

	/**
	 * Serialize PHPExcel object to XML
	 *
	 * @param 	PHPExcel	$pPHPExcel
	 * @param 	string		$pFilename
	 * @return 	string 		XML Output
	 * @throws 	Exception
	 */
	private function _writeSerialized($pPHPExcel = null, $pFilename = '')
	{
		if ($pPHPExcel instanceof PHPExcel) {
			// Clone $pPHPExcel
			$pPHPExcel = $pPHPExcel->duplicate();
			
			// Update media links
			for ($i = 0; $i < $pPHPExcel->getSheetCount(); $i++) {
				for ($j = 0; $j < $pPHPExcel->getSheet($i)->getDrawingCollection()->count(); $j++) {
					$imgTemp =& $pPHPExcel->getSheet($i)->getDrawingCollection()->offsetGet($j);
					$imgTemp->setPath('zip://' . $pFilename . '#media/' . $imgTemp->getFilename(), false);					
				}
			}
			
			// Create XML writer
			$objWriter = new xmlWriter();
			$objWriter->openMemory();
			
			// XML header
			$objWriter->startDocument('1.0','UTF-8','yes');
	
			// PHPExcel
			$objWriter->startElement('PHPExcel');
			$objWriter->writeAttribute('version', '##VERSION##');

				// Comment
				$objWriter->writeComment('This file has been generated using PHPExcel v##VERSION## (http://www.codeplex.com/PHPExcel). It contains a base64 encoded serialized version of the PHPExcel internal object.');
							
				// Data
				$objWriter->startElement('data');
					$objWriter->writeCData( base64_encode(serialize($pPHPExcel)) );
				$objWriter->endElement();

			$objWriter->endElement();

			// Return
			return $objWriter->outputMemory(true);		
		} else {
			throw new Exception("Invalid PHPExcel object passed.");
		}
	}
}
