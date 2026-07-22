<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /**
     * Show the public verification page.
     */
    public function index()
    {
        return view('verify.index');
    }

    /**
     * Verify using the form.
     */
    public function verify(Request $request)
    {
        $request->validate([
            'certificate_number' => 'required|string'
        ]);

        $certificate = Certificate::with('member')
            ->where('certificate_number', $request->certificate_number)
            ->first();

        return view('verify.result', compact('certificate'));
    }

    /**
     * Verify using QR Code.
     */
    public function show($certificate_number)
    {
        $certificate = Certificate::with('member')
            ->where('certificate_number', $certificate_number)
            ->first();

        return view('verify.result', compact('certificate'));
    }
}