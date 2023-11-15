<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DownloadPdfController extends Controller
{
    public function download(User $record){

//        $pdf = Pdf::loadView('appraisee.pdf.appraiseeform', ['record' => $record]);
//        return $pdf->download($record->name.'.pdf');

        return view('appraisee.pdf.appraiseeform', ['record' => $record]);
    }
}
