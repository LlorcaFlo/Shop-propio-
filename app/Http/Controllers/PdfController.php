<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    function show()
    {
    	$pdf = \PDF::loadView('pdf.index');
    	return $pdf->download('Primerpdf.pdf');
    }

}