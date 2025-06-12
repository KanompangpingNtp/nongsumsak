<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class Test extends Controller
{
    public function formPDF()
    {
        return view('test.index');
    }

    public function formExportPDF1()
    {
        $pdf = Pdf::loadView('test.pdf1')->setPaper('A4', 'portrait');

        return $pdf->stream('pdf');
    }

    public function formExportPDF2()
    {
        $pdf = Pdf::loadView('test.pdf2')->setPaper('A4', 'portrait');

        return $pdf->stream('pdf');
    }

    public function formExportPDF3()
    {
        $pdf = Pdf::loadView('test.pdf3')->setPaper('A4', 'portrait');

        return $pdf->stream('pdf');
    }

    public function formExportPDF4()
    {
        $pdf = Pdf::loadView('test.pdf4')->setPaper('A4', 'portrait');

        return $pdf->stream('pdf');
    }

    public function formExportPDF5()
    {
        $pdf = Pdf::loadView('test.pdf5')->setPaper('A4', 'portrait');

        return $pdf->stream('pdf');
    }

    public function formExportPDF6()
    {
        $pdf = Pdf::loadView('test.pdf6')->setPaper('A4', 'portrait');

        return $pdf->stream('pdf');
    }

    public function formExportPDF7()
    {
        $pdf = Pdf::loadView('test.pdf7')->setPaper('A4', 'portrait');

        return $pdf->stream('pdf');
    }

    public function formExportPDF8()
    {
        $pdf = Pdf::loadView('test.pdf8')->setPaper('A4', 'portrait');

        return $pdf->stream('pdf');
    }

    public function formExportPDF9()
    {
        $pdf = Pdf::loadView('test.pdf9')->setPaper('A4', 'portrait');

        return $pdf->stream('pdf');
    }
}
