<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('../fpdf/fpdf.php');

require_once 'db_connection.php';


$req = $bdd->prepare("SELECT id, pseudo, email FROM user");
$req->execute();

$users = $req->fetchAll(PDO::FETCH_ASSOC);



class PDF extends FPDF
{

function Header()
{
    $this->Image('../asset/logo.png',10,6,30);
    $this->SetFont('Arial','B',15);
    $this->Cell(80);
    
    $this->Cell(30,10,'Tic-Tac-Toe.com',0,0,'C');
    $this->Ln(10);

    $this->SetFont('Arial','',12);
    $this->Cell(80);
    $this->Cell(30,10,'Donnees des utilisateurs',0,0,'C');
   
    $this->Ln(20);
}


// Page footer
function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
function BasicTable($header, $data)
    {
        foreach($header as $col)
            $this->Cell(60,8,$col,1);
        $this->Ln();
        foreach($data as $row)
        {
            foreach($row as $col)
                $this->Cell(60,8,$col,1);
            $this->Ln();
        }
    }

    function PartTitle($title)
    {
        $this->SetFont('Arial','',12);
        $this->SetFillColor(200,220,255);
        $this->Cell(0,6,$title ,0,1,'L',true);
        $this->Ln(4);

    }
}



// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Ln();
$header = array('ID', 'Pseudo', 'Email');
$pdf->PartTitle("Liste des utilisateurs : ");
$pdf->BasicTable($header, $users);

$pdf->Output();
