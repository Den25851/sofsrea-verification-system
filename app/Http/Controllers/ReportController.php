<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Certificate;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        $memberCount = Member::count();

        $certificateCount = Certificate::count();

        $validCertificates = Certificate::where('status', 'Valid')->count();

        $expiredCertificates = Certificate::where('status', 'Expired')->count();

        $expiringSoon = Certificate::whereDate(
                'expiry_date',
                '<=',
                Carbon::now()->addDays(30)
            )
            ->where('status', 'Valid')
            ->count();

        $latestCertificates = Certificate::with('member')
            ->latest()
            ->take(10)
            ->get();

        return view('reports.index', compact(
            'memberCount',
            'certificateCount',
            'validCertificates',
            'expiredCertificates',
            'expiringSoon',
            'latestCertificates'
        ));
    }
}