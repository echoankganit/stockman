
<?php
    include("../includes/connection.php");
    include("../includes/allfunctions.php");
    require("../fpdf182/fpdf.php");
    if (isset($_GET['pinprint'])){
        $innum = mysqli_real_escape_string($db, $_GET['pinnum']);
        $sql = "SELECT * FROM `ssf_invoice` WHERE `innum`='$innum'";
        $result = mysqli_query($db,$sql) or die(mysqli_error($db));
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        
        $sno = explode(": ",$row['sno']);
        $desc = explode(": ",$row['indesc']);
        $accode = explode(": ",$row['inaccode']);
        $bags = explode(": ",$row['inbags']);
        $weight = explode(": ",$row['inweight']);
        $rate = explode(": ",$row['inrate']);

        $frate = array();
        $amount = array();

        $i=0;
        $totalbags = 0;
        $totalweight = 0;
        $totalamount = 0;
        while ($i<5){
            $frate[$i] = $rate[$i]*0.01;
            $amount[$i] = $weight[$i]*$frate[$i];
            $totalbags = $totalbags + (int)$bags[$i];
            $totalweight = $totalweight + (float)$weight[$i];
            $totalamount = $totalamount + (float)$amount[$i];
            $i++;
        }
    }
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetTitle($row['innum']." - Invoice");
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
    $pdf->SetFontSize(8);
    $pdf->Rect(10,35,63,12);
    $pdf->Rect(73,35,63,12);
    $pdf->Rect(136,35,64,12);
    //header('Content-Type: text/plain');
    $pdf->Cell(63,6,"Invoice No. SV/20-21/".$row['innum'],0,0);
    $pdf->Cell(63,6,"Date of Supply ".$row['indate'],0,0);
    $pdf->Cell(0,6,"Vehicle No. ".$row['invehnum'],0,1);
    $pdf->Cell(63,6,"Invoice Date. ".date('d-M-Y'),0,0);
    $pdf->Cell(63,6,"Place of Supply ",0,0);
    $pdf->Cell(0,6,"GR No. ",0,1);
    //
    $pdf->SetFont('Arial','B',10);
    $pdf->Rect(10,47,190,6);
    $pdf->Cell(95,6,"Detail of Receiver",0,0);
    $pdf->Cell(0,6,"Detail of Consignee",0,1);
    //
    $pdf->SetFont('Arial','',8);
    $pdf->Rect(10,53,95,15);
    $pdf->Rect(105,53,95,15);
    $pdf->Cell(95,6,"Name. ".$row['inrecname'],0,0);
    $pdf->Cell(0,6,"Name. ",0,1);
    $pdf->Cell(95,6,"Address. ".$row['inrecaddress'],0,0);
    $pdf->Cell(0,6,"Address. ",0,1);
    $pdf->Cell(0,3,"",0,1);
    //$pdf->Rect(10,68,15,6);
    //$pdf->Rect(25,68,25,6);
    //$pdf->Rect(50,68,15,6);
    //$pdf->Rect(65,68,40,6);
    //$pdf->Rect(105,68,95,6);
    //
    $pdf->Cell(20,6,"GSTIN No. ",1,0);
    $pdf->Cell(20,6," ",1,0);
    $pdf->Cell(15,6,"PAN. ",1,0);
    $pdf->Cell(40,6," ",1,0);
    $pdf->Cell(20,6,"GSTIN No. ",1,0);
    $pdf->Cell(0,6," ",1,1);
    //
    $pdf->Cell(20,6,"State",1,0);
    $pdf->Cell(35,6,$row['instate'],1,0);
    $pdf->Cell(15,6,"Code",1,0);
    $pdf->Cell(25,6,$row['incode'],1,0);
    $pdf->Cell(20,6,"State",1,0);
    $pdf->Cell(35,6," ",1,0);
    $pdf->Cell(15,6,"Code",1,0);
    $pdf->Cell(25,6," ",1,1);
    //
    $pdf->Cell(20,6,"Broker.",1,0);
    $pdf->Cell(75,6,$row['inbroker'],1,0);
    $pdf->Cell(30,6,"Reverse Charge.",1,0);
    $pdf->Cell(0,6," ",1,1);
    //
    $pdf->SetFontSize(6);
    $pdf->Cell(10,12,"S.no. ",1,0,'C');
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->SetXY($x, $y);
    $pdf->MultiCell(25,6,"Description Product/Service",1,'C');
    $pdf->SetXY($x + 25, $y);
    $pdf->MultiCell(10,4,"HSNI's AC Code ",1,'C');
    $pdf->SetXY($x + 35, $y);
    $pdf->MultiCell(10,6,"Bags or Katte",1,'C');
    $pdf->SetXY($x + 45, $y);
    $pdf->MultiCell(10,6,"Weight (in KG)",1,'C');
    $pdf->SetXY($x + 55, $y);
    $pdf->Cell(10,12,"Rate",1,0,'C');
    $pdf->SetXY($x + 65, $y);
    $pdf->MultiCell(10,6,"Amount (Rs.)",1,'C');
    $pdf->SetXY($x + 75, $y);
    $pdf->MultiCell(10,6,"Dana Wgt.",1,'C');
    $pdf->SetXY($x + 85, $y);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->SetXY($x, $y);
    $pdf->MultiCell(10,6,"Dana Amount",1,'C');
    $pdf->SetXY($x + 10, $y);
    $pdf->MultiCell(12,12,"Amount",1,'C');
    $pdf->SetXY($x + 22, $y);
    $pdf->MultiCell(7,12,"Rate",1,'C');
    $pdf->SetXY($x + 29, $y);
    $pdf->MultiCell(12,6,"(CGST) Amount",1,'C');
    $pdf->SetXY($x + 41, $y);
    $pdf->MultiCell(7,12,"Rate",1,'C');
    $pdf->SetXY($x + 48, $y);
    $pdf->MultiCell(12,6,"(SGST) Amount",1,'C');
    $pdf->SetXY($x + 60, $y);
    $pdf->MultiCell(7,12,"Rate",1,'C');
    $pdf->SetXY($x + 67, $y);
    $pdf->MultiCell(12,6,"(IGST) Amount",1,'C');
    $pdf->SetXY($x + 79, $y);
    $pdf->MultiCell(16,6,"Total Amount (Rs.)",1,'C');

    $pdf->Rect(10,98,10,60);
    $pdf->Rect(20,98,25,60);
    $pdf->Rect(45,98,10,60);
    $pdf->Rect(55,98,10,60);
    $pdf->Rect(65,98,10,60);
    $pdf->Rect(75,98,10,60);
    $pdf->Rect(85,98,10,60);
    $pdf->Rect(95,98,10,60);

    $pdf->Rect(105,98,10,60);
    $pdf->Rect(115,98,12,60);
    $pdf->Rect(127,98,7,60);
    $pdf->Rect(134,98,12,60);
    $pdf->Rect(146,98,7,60);
    $pdf->Rect(153,98,12,60);
    $pdf->Rect(165,98,7,60);
    $pdf->Rect(172,98,12,60);
    $pdf->Rect(184,98,16,60);

    $i=0;
    $j=10;
    for($i = 0; $i < 5; $i++){
    $pdf->Cell(10,$j,$sno[$i],0,0,'C');
    //$x = $pdf->GetX();
    //$y = $pdf->GetY();
    //$pdf->SetXY($x, $y);
    $pdf->Cell(25,$j,$desc[$i],0,0,'C');
    //$pdf->SetXY($x + 25, $y);
    $pdf->Cell(10,$j,$accode[$i],0,0,'C');
    //$pdf->SetXY($x + 35, $y);
    $pdf->Cell(10,$j,$bags[$i],0,0,'C');
    //$pdf->SetXY($x + 45, $y);
    $pdf->Cell(10,$j,$weight[$i],0,0,'C');
    //$pdf->SetXY($x + 55, $y);
    $pdf->Cell(10,$j,$rate[$i],0,0,'C');
    //$pdf->SetXY($x + 65, $y);
    $pdf->Cell(10,$j,$amount[$i],0,0,'C');
    //$pdf->SetXY($x + 75, $y);
    $pdf->Cell(10,$j," ",0,0,'C');
    //$pdf->SetXY($x + 85, $y);
    //$x = $pdf->GetX();
    //$y = $pdf->GetY();
    //$pdf->SetXY($x, $y);
    $pdf->Cell(10,$j," ",0,0,'C');
    //$pdf->SetXY($x + 10, $y);
    $pdf->Cell(12,$j,$amount[$i],0,0,'C');
    //$pdf->SetXY($x + 22, $y);
    $pdf->Cell(7,$j," ",0,0,'C');
    //$pdf->SetXY($x + 29, $y);
    $pdf->Cell(12,$j," ",0,0,'C');
    //$pdf->SetXY($x + 41, $y);
    $pdf->Cell(7,$j," ",0,0,'C');
    //$pdf->SetXY($x + 48, $y);
    $pdf->Cell(12,$j," ",0,0,'C');
    //$pdf->SetXY($x + 60, $y);
    $pdf->Cell(7,$j," ",0,0,'C');
    //$pdf->SetXY($x + 67, $y);
    $pdf->Cell(12,$j," ",0,0,'C');
    //$pdf->SetXY($x + 79, $y);
    $pdf->Cell(16,$j,$amount[$i],0,1,'C');
    //$i++;
    //$j=$j+10;
    }

    $pdf->Cell(0,10," ",0,1);
    $pdf->SetFontSize(6);    
    $pdf->Cell(174,6,"Cash Discount",1,0,'R');
    $pdf->Cell(16,6," ",1,1);

    $pdf->Cell(45,6,"Total",1,0,'C');
    $pdf->Cell(10,6,$totalbags,1,0,'C');
    $pdf->Cell(10,6,$totalweight,1,0,'C');
    $pdf->Cell(20,6," ",1,0,'C');
    $pdf->Cell(10,6,"0.00",1,0,'C');
    $pdf->Cell(10,6," ",1,0,'C');
    $pdf->Cell(12,6," ",1,0,'C');
    $pdf->Cell(7,6," ",1,0,'C');
    $pdf->Cell(12,6," ",1,0,'C');
    $pdf->Cell(7,6," ",1,0,'C');
    $pdf->Cell(12,6," ",1,0,'C');
    $pdf->Cell(7,6," ",1,0,'C');
    $pdf->Cell(12,6," ",1,0,'C');
    $pdf->Cell(16,6,$totalamount,1,1,'C');

    $pdf->Cell(174,6,"Total Amount before Tax",1,0,'R');
    $pdf->Cell(16,6,$totalamount,1,1,'C');

    //$pdf->Cell(125,6,"Rs. ".convert_number_to_words(),1,0);
    $pdf->Cell(125,6,"Rs. ",1,0);
    $pdf->Cell(49,6,"Add : CGST (Rs.)",1,0);
    $pdf->Cell(16,6,"0",1,1,'R');

    $pdf->Rect(10,182,85,35);

    $pdf->Cell(100,6,"Terms & Conditions: ",0,0);
    $pdf->Cell(25,6," ",0,0);
    $pdf->Cell(49,6,"Add : SGST (Rs.)",1,0);
    $pdf->Cell(16,6,"0",1,1,'R');

    $pdf->Cell(100,6,"1. All Disputes are subject to Delhi Jurisdiction only.",0,0);
    $pdf->Cell(25,6," ",0,0);
    $pdf->Cell(49,6,"Add : IGST (Rs.)",1,0);
    $pdf->Cell(16,6,"0",1,1,'R');

    $pdf->Cell(100,6,"2. Interest @ 21% will be charges if the payment is not received within 5-8 days",0,0);
    $pdf->Cell(25,6," ",0,0);
    $pdf->Cell(49,6,"Add : IGST (Rs.)",1,0);
    $pdf->Cell(16,6,"0",1,1,'R');

    $pdf->Cell(100,6,"3. The terms will be according to Delhi Gram Merchants Association.",0,0);
    $pdf->Cell(25,6," ",0,0);
    $pdf->Cell(49,6,"Tax Amount : GST",1,0);
    $pdf->Cell(16,6,"0",1,1,'R');

    $pdf->Cell(125,6," ",0,0);
    $pdf->Cell(49,6,"LESS Freight 12rs",1,0);
    $pdf->Cell(16,6," ",1,1);

    $pdf->Cell(125,6," ",0,0);
    $pdf->Cell(49,6,"Total Amount After Tax",1,0);
    $pdf->Cell(16,6,$totalamount,1,1,'R');

    $pdf->Rect(10,217,85,17);
    $pdf->Rect(135,218,65,16);

    $pdf->Cell(100,6,"Bank Details: ",0,0);
    $pdf->Cell(25,6," ",0,0);
    $pdf->Cell(65,6,"For Shree Vardhman Foods India",0,1,'R');

    $pdf->Cell(100,4,"Bank A/c : AXIS BANK",0,0);
    $pdf->Cell(25,4," ",0,0);
    $pdf->Cell(65,4," ",0,1);

    $pdf->Cell(100,4,"IFSC Code / Branch : UT",0,0);
    $pdf->Cell(25,4," ",0,0);
    $pdf->Cell(65,4," ",0,1);

    //$pdf->Cell(190,4," ",0,1);

    $pdf->Cell(100,4," ",0,0);
    $pdf->Cell(25,4," ",0,0);
    $pdf->Cell(65,1,"Signature",0,1,'R');

    $pdf->Line(95,234,135,234);

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