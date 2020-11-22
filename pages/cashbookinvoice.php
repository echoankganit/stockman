
<?php
    include("../includes/connection.php");
    require("../fpdf182/fpdf.php");
    $cbnum = mysqli_real_escape_string($db, $_GET['cbnum']);
    $sql = "SELECT * FROM `ssf_cashbook` WHERE `cbnum`='$cbnum'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetTitle($row['cbnum']." - Invoice");
    $pdf->SetAuthor("Ankit Kamboj");
    $pdf->SetCreator("Ankit Kamboj");
    $pdf->SetSubject("Sri Sri Foods");
    $pdf->SetFont('Times','B',16);
    $pdf->Cell(0,8,"SRI SRI FOODS INDIA",0,1,'C');
    $pdf->SetFontSize(8);
    $pdf->Cell(0,0,"2655/2 Naya Bazar, Delhi 110006, Mobile 9810996607",0,1,'C');
    $pdf->SetFontSize(9);
    $pdf->Cell(0,8,"GSTIN No. : 07ADJPJ6855A1ZM",0,1,'C');
    //
    $pdf->SetFont('Arial','BI',10);
    $pdf->Cell(0,6,"Bill of Supply",1,1,'C');
    //
    $pdf->SetFont('Arial','',4);
    $pdf->Cell(0,3,"Original for fdfasdfafrfwerefdsafdsafklsdflkafiowaueryhabfmebfmabfjewaifuyh",1,1,'C');
    //
    $pdf->SetFontSize(10);
    $pdf->Rect(10,35,63,12);
    $pdf->Rect(73,35,63,12);
    $pdf->Rect(136,35,64,12);
    //header('Content-Type: text/plain');
    $pdf->Cell(63,6,"Invoice No. ".$row['cbnum'],0,0);
    $pdf->Cell(63,6,"Date of Supply ".$row['cbnum'],0,0);
    $pdf->Cell(0,6,"Vehicle No. ".$row['cbnum'],0,1);
    $pdf->Cell(63,6,"Invoice Date. ".date('d-M-Y'),0,0);
    $pdf->Cell(63,6,"Place of Supply ".$row['cbnum'],0,0);
    $pdf->Cell(0,6,"GR No. ".$row['cbnum'],0,1);
    //
    $pdf->SetFont('Arial','B',10);
    $pdf->Rect(10,47,190,6);
    $pdf->Cell(95,6,"Detail of Receiver",0,0);
    $pdf->Cell(0,6,"Detail of Consignee",0,1);
    //
    $pdf->SetFont('Arial','',10);
    $pdf->Rect(10,53,95,15);
    $pdf->Rect(105,53,95,15);
    $pdf->Cell(95,6,"Name. ".$row['cbnum'],0,0);
    $pdf->Cell(0,6,"Name. ".$row['cbnum'],0,1);
    $pdf->Cell(95,6,"Address. ".$row['cbnum'],0,0);
    $pdf->Cell(0,6,"Address. ".date('d-M-Y'),0,1);
    $pdf->Cell(0,3,"",0,1);
    //$pdf->Rect(10,68,15,6);
    //$pdf->Rect(25,68,25,6);
    //$pdf->Rect(50,68,15,6);
    //$pdf->Rect(65,68,40,6);
    //$pdf->Rect(105,68,95,6);
    //
    $pdf->Cell(20,6,"GSTIN No. ",1,0);
    $pdf->Cell(20,6,$row['cbnum'],1,0);
    $pdf->Cell(15,6,"PAN. ",1,0);
    $pdf->Cell(40,6,date('d-M-Y'),1,0);
    $pdf->Cell(20,6,"GSTIN No. ",1,0);
    $pdf->Cell(0,6,$row['cbnum'],1,1);
    //
    $pdf->Cell(20,6,"State",1,0);
    $pdf->Cell(35,6,$row['cbnum'],1,0);
    $pdf->Cell(15,6,"Code",1,0);
    $pdf->Cell(25,6,date('d-M-Y'),1,0);
    $pdf->Cell(20,6,"State",1,0);
    $pdf->Cell(35,6,$row['cbnum'],1,0);
    $pdf->Cell(15,6,"Code",1,0);
    $pdf->Cell(25,6,date('d-M-Y'),1,1);
    //
    $pdf->Cell(20,6,"Broker.",1,0);
    $pdf->Cell(75,6,$row['cbnum'],1,0);
    $pdf->Cell(30,6,"Reverse Charge.",1,0);
    $pdf->Cell(0,6,date('d-M-Y'),1,1);
    //
    $pdf->SetFontSize(7);
    $pdf->Cell(10,12,"S.no. ",1,0,'C');
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->SetXY($x, $y);
    $pdf->MultiCell(25,6,"Description Product/Service",1,'C');
    $pdf->SetXY($x + 25, $y);
    $pdf->MultiCell(10,4,"HSNI's AC Code ",1,'C');
    $pdf->SetXY($x + 35, $y);
    $pdf->MultiCell(10,6,"Bags/Katte",1,'C');
    $pdf->SetXY($x + 45, $y);
    $pdf->MultiCell(10,6,"Weight (Qtls.)",1,'C');
    $pdf->SetXY($x + 55, $y);
    $pdf->Cell(10,12,"Rate",1,0,'C');
    $pdf->SetXY($x + 65, $y);
    $pdf->MultiCell(10,6,"Amount (Rs.)",1,'C');
    $pdf->SetXY($x + 75, $y);
    $pdf->MultiCell(10,6,"Amount (Rs.)",1,'C');




    // Creates a file in server
    $pdf->output("Invoice.pdf", "F");
    
    // Tell that the file will be PDF
    header("Content-type: application/pdf");
    
    // Set the file as attachment and set its name to "Invoice.pdf"
    header("Content-disposition: attachment; filename = Invoice.pdf");
    
    // Read the source file (which needs to be downloaded)
    readFile("Invoice.pdf");
    
    // Delete the file from server
    unlink("Invoice.pdf");
?>