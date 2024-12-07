<?php
require_once('../tcpdf/tcpdf.php');
require_once('databaseConnection.php');

$mysqli = db_connect();

if ($mysqli) {

    if(isset($_GET['billID']) && isset($_GET['studentID'])){
        $billID = $_GET['billID'];
        $studentID = $_GET['studentID'];

        $stmt = $mysqli->prepare("SELECT addstudent.fnameOfStudent, addstudent.lnameOfStudent, addstudent.class, addstudent.rollNumber, addstudent.feesGroup, feescollection.AmountPaid FROM `feescollection` INNER JOIN addstudent ON addstudent.ID = feescollection.StudentID WHERE feescollection.ID = ? AND feescollection.StudentID = ?;");
        $stmt->bind_param("ii", $billID, $studentID);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($fnameOfStudent, $lnameOfStudent, $class, $rollNumber, $feesGroup, $AmountPaid);
        $stmt->fetch();
        $stmt->close();
        
    }
    else{
        echo "Invalid parameters";
    }


    // Create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Haitomns Groups Private Limited');
    $pdf->SetTitle('Estimate Bill');
    $pdf->SetSubject('Bill');
    $pdf->SetKeywords('Student BIll, PDF, bill, estimate');

    // Set default header and footer data
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    // Set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // Set margins
    $pdf->SetMargins(10, 10, 10);

    // Set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, 10);

    // Add a page
    $pdf->AddPage('P', 'A4');

    // Set font
    $pdf->SetFont('helvetica', '', 12);

    // Add Logo
    $image_file = '../idCardAssets/logo.png'; // Replace with the path to your logo
    $pdf->Image($image_file, 95, 5, 25, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

    // Add Company Name
    $pdf->SetY(30);
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->Cell(0, 10, 'ARIA EDUCATION', 0, 1, 'C');

    // Add Company Address
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 10, 'Birgunj. Parsa, 051530778', 0, 1, 'C');
    $pdf->Cell(0, 10, 'Website: www.arialoksewa.com', 0, 1, 'C');

    // Add Title "Estimate Bill"
    $pdf->Ln(2); // Line break
    $pdf->SetFont('helvetica', 'B', 16);
    $pdf->Cell(0, 10, 'ESTIMATE BILL', 0, 1, 'C');

    // Add Student Information
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Ln(5);
    $pdf->Cell(0, 10, 'Student Name: '.$fnameOfStudent.' '.$lnameOfStudent.'', 0, 1, 'L');
    $pdf->Cell(0, 10, 'Class: '.$class.'', 0, 1, 'L');
    $pdf->Cell(0, 10, 'Roll No: '.$rollNumber.'', 0, 1, 'L');

    // Add Table Header
    $pdf->Ln(10);
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(20, 10, 'SN', 1, 0, 'C');
    $pdf->Cell(80, 10, 'Fee Group', 1, 0, 'C');
    $pdf->Cell(60, 10, 'Amount Paid', 1, 1, 'C');

    // Add Table Data
    $pdf->SetFont('helvetica', '', 12);
    for ($i = 1; $i <= 1; $i++) {
        $pdf->Cell(20, 10, $i, 1, 0, 'C');
        $pdf->Cell(80, 10, ''.$feesGroup.'', 1, 0, 'C');
        $pdf->Cell(60, 10, ''.$AmountPaid.'', 1, 1, 'C');
    }

    // Add Footer "Prepared By"
    $pdf->Ln(10);
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 10, 'Prepared by: Aria Institute', 0, 1, 'L');

    // Output the PDF as a file or inline in the browser
    $pdf->Output('Estimate_Bill.pdf', 'I');
} else {
    echo "Connection failed";
}
