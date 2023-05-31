<?php
    ob_start();

require("fpdf/fpdf.php");

// Create PDF object
$pdf = new FPDF();

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', 'B', 12);

// Add title
$pdf->Cell(0, 10, 'Liste des eleves', 0, 1, 'L');

// Add table headers
$pdf->Cell(30, 10, '', 0, 0, 'C');
$pdf->Cell(50, 10, 'Prenom', 1, 0, 'C');
$pdf->Cell(50, 10, 'Nom', 1, 1, 'C');



// Add table rows
foreach ($lesElevesDansLeCours as $eleve1) {
    $pdf->Cell(30, 10, '', 0, 0, 'C');
    $pdf->Cell(50, 10, $eleve1->getPrenom(), 1, 0, 'C');
    $pdf->Cell(50, 10, $eleve1->getNom(), 1, 1, 'C');


}

// Output PDF
$pdf->Output('list_of_students.pdf', 'I');


ob_end_flush(); 

?>