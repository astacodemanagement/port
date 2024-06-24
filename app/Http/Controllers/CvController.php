<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class CvController extends Controller
{
    public function previewCv($id){
        $id = hashId($id, 'decode');
        $kandidat = Kandidat::where('id', $id)->firstOrFail();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('back.kandidat.cv', compact('kandidat'));
        return $pdf->stream();
    }
}
