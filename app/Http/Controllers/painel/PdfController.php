<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Crabbly\FPDF\FPDF;

class PdfController extends Controller
{
	public function index()
	{
		return view('painel.documentos.declaracao_vinculo');
	}

    public function declaracao()
    {
    	$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(40,10,'Hello World!');
		$pdf->Output('D','file.pdf');
    }

    public function header()
    {

    }

    public function footer()
    {
    	$pdf = new FPDF();
    	$pdf->Image('logo.png',10,6,20);
    	$pdf->SetFont('Times','B',15);
    	$pdf->Cell(80);
    	$pdf->Cell(30,10,'Document r',1,0,'C');
    	$pdf->Ln(20);
    }
}
