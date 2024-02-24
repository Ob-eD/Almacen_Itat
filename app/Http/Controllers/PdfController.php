<?php

namespace App\Http\Controllers;
use App\Models\Prestamo;
use App\Models\Alumno;
use App\Models\Herramienta;
use setasign\Fpdi\Fpdi;
use Illuminate\Http\Request;


class PdfController extends Controller
{
    public function generatePdf(Request $request)
    {
        $alumno = Alumno::all();
        $herramienta = Herramienta::all();
        $pendingLoans = Prestamo::where('Status', 'Pendiente')->get();
        $completedLoans = Prestamo::where('Status', 'Finalizado')->get();

        $pdf = new Fpdi();

        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(40, 10, 'Loan Report');
        $pdf->Ln();

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(40, 10, 'Pending Loans', 1);
        $pdf->Ln();

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(40, 10, 'Id Prestamo', 1);
        $pdf->Cell(40, 10, 'Nombre', 1);
        $pdf->Cell(40, 10, 'Fecha de Prestamo', 1);
        $pdf->Cell(40, 10, 'Herramienta', 1);
        $pdf->Cell(40, 10, 'Cantidad Prestada', 1);
        $pdf->Cell(40, 10, 'Observaciones', 1);
        $pdf->Cell(40, 10, 'Status', 1);
        $pdf->Ln();

        foreach ($pendingLoans as $prestamo) {
            $pdf->Cell(40, 10, $prestamo->IdPrestamo, 1);
            $pdf->Cell(40, 10, $prestamo->$alumno->Nombre, 1);
            $pdf->Cell(40, 10, $prestamo->FechaPrestamo, 1);
            $pdf->Cell(40, 10, $prestamo->$herramienta->NombreHerramienta, 1);
            $pdf->Cell(40, 10, $prestamo->CantidadPrestada, 1);
            $pdf->Cell(40, 10, $prestamo->Observaciones, 1);
            $pdf->Cell(40, 10, $prestamo->Status, 1);
            $pdf->Ln();
        }

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(40, 10, 'Completed Loans', 1);
        $pdf->Ln();

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(40, 10, 'Id Prestamo', 1);
        $pdf->Cell(40, 10, 'Nombre', 1);
        $pdf->Cell(40, 10, 'Fecha de Prestamo', 1);
        $pdf->Cell(40, 10, 'Herramienta', 1);
        $pdf->Cell(40, 10, 'Cantidad Prestada', 1);
        $pdf->Cell(40, 10, 'Fecha de Devolución', 1);
        $pdf->Cell(40, 10, 'Cantidad Devuelta', 1);
        $pdf->Cell(40, 10, 'Observaciones', 1);
        $pdf->Cell(40, 10, 'Status', 1);
        $pdf->Ln();

        foreach ($completedLoans as $prestamo) {
            $pdf->Cell(40, 10, $prestamo->IdPrestamo, 1);
            $pdf->Cell(40, 10, $prestamo->$alumno->Nombre, 1);
            $pdf->Cell(40, 10, $prestamo->FechaPrestamo, 1);
            $pdf->Cell(40, 10, $prestamo->$herramienta->NombreHerramienta, 1);
            $pdf->Cell(40, 10, $prestamo->CantidadPrestada, 1);
            $pdf->Cell(40, 10, $prestamo->FechaDevolucion, 1);
            $pdf->Cell(40, 10, $prestamo->CantidadDevuelta, 1);
            $pdf->Cell(40, 10, $prestamo->Observaciones, 1);
            $pdf->Cell(40, 10, $prestamo->Status, 1);
            $pdf->Ln();
        }

        $pdf->Output();

        exit;
    }
}
