<?php

namespace App\Http\Controllers;

class LegalDocumentController extends Controller
{
    public function index()
    {
        return view('legal_documents.index');
    }
}
