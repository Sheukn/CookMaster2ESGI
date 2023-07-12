<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Certification;
use Illuminate\Support\Facades\Auth;

class CertificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $certifications = Certification::all();
        return view('formations.certificationList', [
            'certifications' => $certifications
        ]);
    }

    public function download($certification)
    {
        $certifications = Certification::where('id', $certification)->first();
        $user = Auth::user();
        $pdf = Pdf::loadView('formations.diplome', compact('certifications', 'user'));
        return $pdf->download('certifications.pdf');
    }
}
