<?php
class PDF2 extends fpdf{
    
    function getPDF2(){
        $this->SetMargins(30,10,50,20);
        $this->AddPage();
        $this->SetFont('Arial','B',11);
        $this->Cell(220,10,'Laporan Event SO',0,1,'C');
        $this->Cell(10,10,'ID SO', 1, 0, 'C');
        $this->Cell(100,10,'Tgl Mulai',1,0,'C');
        $this->Cell(100,10,'Tgl Berakhir',1,1,'C');

        foreach(EventSO::model()->findAll() as $row){
            $this->Cell(10,10, $row['id_so'],1,0,'C');
            $this->Cell(100,10, $row['tgl_mulai'],1,0,'L');
            $this->Cell(100,10, $row['tgl_berakhir'],1,1,'L');

        }
        $this->AliasNbPages();
        $this->Output('EventSO.pdf','I');

    
    }
}



?>