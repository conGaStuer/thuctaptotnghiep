<?php
require('../tfpdf/tfpdf.php');

$pdf = new tFPDF();
$pdf->AddPage("0");

$pdf->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
$pdf->SetFont('DejaVu', '', 14);
$pdf->SetFillColor(193, 229, 252);

$mahd = $_GET['mahd'];
$inhoadon = show_HD_BY_ID($mahd); 

$pdf->Write(10, 'Giấy báo điện ');
$pdf->Ln(10);



$width_cell = array(15, 55, 55, 39, 30, 40, 50);

$pdf->Cell($width_cell[0], 10, 'Kỳ', 1, 0, 'C', true);
$pdf->Cell($width_cell[1], 10, 'Từ ngày', 1, 0, 'C', true);
$pdf->Cell($width_cell[2], 10, 'Đến ngày', 1, 0, 'C', true);
$pdf->Cell($width_cell[3], 10, 'Chỉ số đầu', 1, 0, 'C', true);
$pdf->Cell($width_cell[4], 10, 'Chỉ số cuối', 1, 0, 'C', true);
$pdf->Cell($width_cell[5], 10, 'Tổng tiền', 1, 0, 'C', true);
$pdf->Cell($width_cell[6], 10, 'Ngày lập', 1, 1, 'C', true);

$pdf->SetFillColor(235, 236, 236);
$fill = false;
$TT = $inhoadon['tongthanhtien'] . ' VNĐ';
$pdf->Cell($width_cell[0], 10, $inhoadon['ky'], 1, 0, 'C', $fill);
$pdf->Cell($width_cell[1], 10, $inhoadon['tungay'], 1, 0, 'C', $fill);
$pdf->Cell($width_cell[2], 10, $inhoadon['denngay'], 1, 0, 'C', $fill);
$pdf->Cell($width_cell[3], 10, $inhoadon['chisodau'], 1, 0, 'C', $fill);
$pdf->Cell($width_cell[4], 10, $inhoadon['chisocuoi'], 1, 0, 'C', $fill);
$pdf->Cell($width_cell[5], 10, $TT, 1, 0, 'C', $fill);
$pdf->Cell($width_cell[6], 10, $inhoadon['ngaylaphd'], 1, 1, 'C', $fill);
$fill = !$fill;

$pdf->Cell(0, 10, 'Người lập                                                                                                         Khách hàng', 0, 1, 'L');
$pdf->Ln(10);

$filename = 'hoadon.pdf';
$pdf->Output($filename, 'D');
?>
