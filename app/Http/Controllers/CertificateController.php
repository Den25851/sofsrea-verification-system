<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Member;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display all certificates.
     */
    public function index()
    {
        $certificates = Certificate::with('member')->latest()->get();

        return view('certificate.index', [
            'certificates' => $certificates,
            'title' => 'All Certificates'
        ]);
    }

    /**
     * Show create certificate form.
     */
    public function create()
    {
        $members = Member::orderBy('full_name')->get();

        return view('certificate.create', compact('members'));
    }

    /**
     * Store a newly created certificate.
     */
    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'certificate_title' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'expiry_date' => 'nullable|date|after_or_equal:issue_date',
            'status' => 'required|in:Valid,Expired',
        ]);

        // Current Year
        $year = date('Y');

        // Get the latest certificate created this year
        $lastCertificate = Certificate::where('certificate_number', 'like', "SOFSREA-$year-%")
            ->latest('id')
            ->first();

        if ($lastCertificate) {

            $lastNumber = (int) substr($lastCertificate->certificate_number, -4);
            $nextNumber = $lastNumber + 1;

        } else {

            $nextNumber = 1;

        }

        // Generate Certificate Number
        $certificateNumber = 'SOFSREA-' . $year . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        Certificate::create([
            'member_id' => $request->member_id,
            'certificate_number' => $certificateNumber,
            'certificate_title' => $request->certificate_title,
            'issue_date' => $request->issue_date,
            'expiry_date' => $request->expiry_date,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('certificates.index')
            ->with('success', 'Certificate issued successfully.');
    }

    /**
     * Display certificate.
     */
    public function show(Certificate $certificate)
    {
        return view('certificate.show', compact('certificate'));
    }

    /**
     * Edit certificate.
     */
    public function edit(Certificate $certificate)
    {
        $members = Member::orderBy('full_name')->get();

        return view('certificate.edit', compact('certificate', 'members'));
    }

    /**
     * Update certificate.
     */
    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'certificate_number' => 'required|unique:certificates,certificate_number,' . $certificate->id,
            'certificate_title' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'expiry_date' => 'nullable|date|after_or_equal:issue_date',
            'status' => 'required|in:Valid,Expired',
        ]);

        $certificate->update($request->all());

        return redirect()
            ->route('certificates.index')
            ->with('success', 'Certificate updated successfully.');
    }

    /**
     * Valid certificates.
     */
    public function valid()
    {
        $certificates = Certificate::with('member')
            ->where('status', 'Valid')
            ->latest()
            ->get();

        return view('certificate.index', [
            'certificates' => $certificates,
            'title' => 'Valid Certificates'
        ]);
    }

    /**
     * Expired certificates.
     */
    public function expired()
    {
        $certificates = Certificate::with('member')
            ->where('status', 'Expired')
            ->latest()
            ->get();

        return view('certificate.index', [
            'certificates' => $certificates,
            'title' => 'Expired Certificates'
        ]);
    }

    /**
     * Print certificate.
     */
    public function print(Certificate $certificate)
    {
        return view('certificate.print', compact('certificate'));
    }

    /**
     * Delete certificate.
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();

        return redirect()
            ->route('certificates.index')
            ->with('success', 'Certificate deleted successfully.');
    }
}