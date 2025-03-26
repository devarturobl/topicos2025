<?php
require('./fpdf186/fpdf.php'); // Asegúrate de tener FPDF en el mismo directorio

function generarFirma($nombre, $curp, $ocr, $clave_elector) {
    $data = strtoupper($nombre . $curp . $ocr . $clave_elector); // Concatenar datos en mayúsculas
    return hash("sha256", $data); // Generar hash SHA-256
}

// Datos del usuario
$nombre = "Socorro Maceda Romero";
$curp = "PEGO010101HDFRRR00";
$ocr = "123456789012";
$clave_elector = "ABC1234567XYZ";

// Generar firma
$firma = generarFirma($nombre, $curp, $ocr, $clave_elector);

class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'Revista INCAING', 0, 1, 'C');
        $this->Cell(0, 10, '8va Entrega del CIIM 2025', 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer() {
        $this->SetY(-30);
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, 'Firma Electronica:', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, $GLOBALS['firma'], 0, 1, 'C');
        $this->Cell(0, 10, 'Ing. Socorro Maceda Romero', 0, 1, 'C');
        $this->Cell(0, 10, 'Directora de la Revista INCAING', 0, 1, 'C');
    }
}

$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : 'Nombre del Participante';
$trabajo = isset($_GET['trabajo']) ? $_GET['trabajo'] : 'Título del Trabajo';

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 14);

$pdf->MultiCell(0, 10, utf8_decode("La Revista INCAING en la 8va Entrega de su CIIM 2025\notorga la siguiente constancia de participación a:"), 0, 'C');
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 16);
$pdf->MultiCell(0, 10, utf8_decode($nombre), 0, 'C');
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 14);
$pdf->MultiCell(0, 10, utf8_decode("por su participación con el trabajo:"), 0, 'C');
$pdf->Ln(5);
$pdf->SetFont('Arial', 'I', 14);
$pdf->MultiCell(0, 10, utf8_decode("\"$trabajo\""), 0, 'C');
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 14);
$pdf->MultiCell(0, 10, utf8_decode("dentro del marco de nuestro evento, realizado los días 9, 10 y 11 de abril de 2025."), 0, 'C');

$pdf->Output('D', 'constancia.pdf');
?>
