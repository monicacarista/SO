<?php
Yii::import('application.extensions.fpdf.*');

class PDF extends FPDF{
     function Header(){
        $this->setFont('Arial','B',12);
        $this->Cell(40);
        $this->Cell(30,7,'UKDW',0.1,'L');
        $this->Ln();

    }

    function Footer(){
        $this->SetY(-40);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page'.$this->PageNo(),0,0,'C');

    }

    function headerTable(){
        $this->Ln();
        $this->SetFont('Times','B','12');
        $this->Cell(20,10,'ID SO',1,0,'C');
        // $this->Cell(40,10,'tgl_mulai',1,0,'C');
        // $this->Cell(40,10,'tgl_berakhir',1,0,'C');
      
        $model = new EventSO('getTes');
        foreach($model as $row){
        $this->Cell(20,10, $row['id_so'],1,0,'C');
        // $this->Cell(40,10, $row['tgl_mulai'],1,0,'L');
        // $this->Cell(40,10, $row['tgl_berakhir'],1,1,'L');

        }
            $this->Ln();

        // $fill=false;
        // $model = EventSO::model()->getTes();
        // $no=0;
        // foreach($model as $row)
        // {
        //     $no++;
        //     $pdf->Cell(10,5, $no, 1, '0','L', $fill);
        //     $pdf->Cell(80,5, $row->id_so,1,'0','L',$fill);
        //     $fill = !$fill;
        //     $pdf->Ln();
        // }
      
        }
    
}

$pdf=new PDF();
// $pdf->AliasNbPages();
$pdf->AddPage('P','A4');
$pdf->headerTable();
$pdf->SetFont('Times','',12);
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);

// $no=0;
// foreach ($model as $baris)
// {
//     $no++;
//     $pdf->Cell(10,5,$no,1,'0','L', $fill);
//     $pdf->Cell(80,5,$baris->nama_barang,1,'0','L',$fill);
//     $pdf->Cell(30,5)
// }
//$pdf->Cell(40,10,'TEs');
$pdf->Output();

?>