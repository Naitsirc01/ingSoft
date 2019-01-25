<?php

namespace App\Http\Controllers;

use App\evidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function show($id){
        $dl=evidencia::find($id);
        return Storage::download($dl->archivo,$dl->nombre);
    }
}
