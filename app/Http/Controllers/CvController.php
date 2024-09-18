<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class CvController extends Controller
{

   
    public function previewCv($id){       
        $id = hashId($id, 'decode');
        $data['kandidat'] = Kandidat::find($id)->first();
        $pdf = Pdf::loadView('back.cv.index', $data);
        return $pdf->stream('cv-pdf.pdf');

    }
}
