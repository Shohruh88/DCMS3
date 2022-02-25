<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PdfReaderController extends Controller
{
    public function pdfReader($id) {
        $sql = "select file from published where id = ?";
        $pdfFile = DB::select($sql, [$id]);
// dd($pdfFile[0]);
        return view('pdfViewer.readPublished', [
            'file' => $pdfFile
        ]);
    }
}
