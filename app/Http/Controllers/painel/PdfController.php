<?php

namespace App\Http\Controllers\painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Crabbly\FPDF\FPDF;
use App\Aluno;

class PdfController extends Controller
{
	public function index()
	{

		return view('painel.documentos.declaracao_vinculo');
	}

    public function declaracao()
    {
    	
    }

    public function headerDoc()
    {
       

    }

    public function footerDoc()
    {
    	
    }

    public function imprimirDeclaracao($id)
    {   

        //aluno
        $aluno = Aluno::find($id);

        //header

        $pdf = new FPDF('P','mm',array(210,297));
        //$pdf = new FPDF();
        $pdf->AddPage();
        $pdf->Image(public_path('img/logo_escola.jpeg'),10,6,22);//caminho, tabulação, altura topo, tamanho
        $pdf->SetFont('Arial','B',8);
        $pdf->SetXY(80,6); // posição X e Y
        $pdf->Write(8,'ESCOLA EXCLUSIVO GLOBAL');
        $pdf->Ln();
        $pdf->SetXY(75,10);
        $pdf->Write(8,'Rua Emiliano Correa, Nº14, Santa Barabara');

        
        //corpo
        $pdf->SetFont('Arial','B',14);
        $pdf->Ln(20);
        $pdf->Cell(0,73,utf8_decode('D E C L A R A Ç Ã O'),0,1,'C');
        $pdf->Ln(28);

        $pdf->SetFont('Arial','',12);
        //$pdf->SetTopMargin('25');
       // $pdf->SetLeftMargin('30');
        //$pdf->SetRightMargin('30');
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        
        $data_hoje = utf8_decode("São Luís, "). ucwords(strftime('%A, %d de %B de %Y', strtotime('today')));

        $nome_aluno = strtoupper(utf8_decode($aluno->nome_aluno));

        

        $pdf->Write(8,utf8_decode('              Declaramos, para os fins a que se fizerem necessários, que ').$nome_aluno.utf8_decode(' é aluno(a) vinculado(a) a esta escola, sob o número 201610340, no turno ENGENHARIA DA COMPUTAÇÃO - SAO LUIS - BACHARELADO - Presencial - MTN.'));
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Write(8,utf8_decode('              Departamento de Administração Escolar da Pró-Reitoria de Graduação da Universidade Estadual do Maranhão - UEMA, em ').$data_hoje.'.');
        

        //footer
        // Position at 1.5 cm from bottom
        $pdf->SetY(-21);
        // Arial italic 8
        $pdf->SetFont('Arial','I',8);
        $pdf->Cell(0,0,utf8_decode('Cidade Universitária Paulo VI, s/n - Tirirical CEP , 65055-000 - São Luis - MA - Brasil'),0,1,'C');
        //$pdf->Write(8,utf8_decode('Cidade Universitária Paulo VI, s/n - Tirirical CEP , 65055-000 - São Luis - MA - Brasil'));
        $nome_pdf = str_replace(" ", "_", utf8_decode($aluno->nome_aluno));
        $pdf->Output('I','Declaracao_'.$nome_pdf.'.pdf');

    }
}
