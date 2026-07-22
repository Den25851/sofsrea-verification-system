<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">

            <div>
                <h2 class="text-3xl font-bold text-gray-800">
                    📊 SOFSREA Reports Dashboard
                </h2>

                <p class="text-gray-500 mt-1">
                    Society of Forensic Science and Experts Association
                </p>
            </div>

<div class="mt-8 bg-white rounded-xl shadow-lg p-6">

    <h2 class="text-2xl font-bold text-gray-800 mb-4">
        Report Summary
    </h2>

    <p class="text-gray-700 leading-8">

        This dashboard provides a comprehensive overview of the
        <strong>Society of Forensic Science and Experts Association (SOFSREA)</strong>
        certificate management system.

    </p>

    <ul class="mt-4 space-y-2 text-gray-700">

        <li>✅ Total Registered Members: <strong>{{ $memberCount }}</strong></li>

        <li>📜 Total Certificates Issued: <strong>{{ $certificateCount }}</strong></li>

        <li>🟢 Valid Certificates: <strong>{{ $validCertificates }}</strong></li>

        <li>🔴 Expired Certificates: <strong>{{ $expiredCertificates }}</strong></li>

        <li>⏰ Certificates Expiring Within 30 Days: <strong>{{ $expiringSoon }}</strong></li>

    </ul>

    <div class="mt-6 border-t pt-4 text-center text-gray-500 text-sm">

        Society of Forensic Science and Experts Association (SOFSREA)

        <br>

        Report Generated:
        {{ now()->format('d F Y, h:i A') }}

    </div>

</div>

        </div>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Organization Information -->

            <div class="bg-white rounded-xl shadow-lg p-6 mb-8">

                <h2 class="text-2xl font-bold text-gray-800 mb-4">
                    Organization Information
                </h2>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <p>
                            <strong>Organization:</strong>
                            Society of Forensic Science and Experts Association
                        </p>

                        <p class="mt-2">
                            <strong>System:</strong>
                            SOFSREA Certificate Verification System
                        </p>

                    </div>

                    <div>

                        <p>
                            <strong>Report Generated:</strong>
                            {{ now()->format('d F Y H:i') }}
                        </p>

                        <p class="mt-2">
                            <strong>Administrator:</strong>
                            {{ Auth::user()->name }}
                        </p>

                        <p class="mt-2">
                            <strong>Total Records:</strong>
                            {{ $certificateCount }}
                        </p>

                    </div>

                </div>

            </div>


            <!-- Executive Summary -->

            <h2 class="text-2xl font-bold text-gray-800 mb-5">
                Executive Summary
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">

                <div class="bg-blue-600 text-white rounded-xl p-6 shadow-lg">

                    <h3 class="text-lg font-semibold">
                        Total Members
                    </h3>

                    <p class="text-4xl font-bold mt-4">
                        {{ $memberCount }}
                    </p>

                </div>

                <div class="bg-green-600 text-white rounded-xl p-6 shadow-lg">

                    <h3 class="text-lg font-semibold">
                        Certificates Issued
                    </h3>

                    <p class="text-4xl font-bold mt-4">
                        {{ $certificateCount }}
                    </p>

                </div>

                <div class="bg-emerald-500 text-white rounded-xl p-6 shadow-lg">

                    <h3 class="text-lg font-semibold">
                        Valid
                    </h3>

                    <p class="text-4xl font-bold mt-4">
                        {{ $validCertificates }}
                    </p>

                </div>

                <div class="bg-red-600 text-white rounded-xl p-6 shadow-lg">

                    <h3 class="text-lg font-semibold">
                        Expired
                    </h3>

                    <p class="text-4xl font-bold mt-4">
                        {{ $expiredCertificates }}
                    </p>

                </div>

                <div class="bg-yellow-500 text-white rounded-xl p-6 shadow-lg">

                    <h3 class="text-lg font-semibold">
                        Expiring in 30 Days
                    </h3>

                    <p class="text-4xl font-bold mt-4">
                        {{ $expiringSoon }}
                    </p>

                </div>

            </div>


            <!-- Visual Statistics -->

            <div class="bg-white rounded-xl shadow-lg mt-10 p-6">

                <h2 class="text-2xl font-bold text-gray-800 mb-6">
                    📈 Certificate Statistics
                </h2>

                @php
                    $total = max($certificateCount,1);
                    $validPercent = round(($validCertificates/$total)*100);
                    $expiredPercent = round(($expiredCertificates/$total)*100);
                @endphp

                <div class="space-y-8">

                    <div>

                        <div class="flex justify-between mb-2">

                            <span class="font-semibold">
                                Valid Certificates
                            </span>

                            <span>
                                {{ $validPercent }}%
                            </span>

                        </div>

                        <div class="w-full bg-gray-200 rounded-full h-6">

                            <div class="bg-green-600 h-6 rounded-full"
                                 style="width:{{ $validPercent }}%"></div>

                        </div>

                    </div>

                    <div>

                        <div class="flex justify-between mb-2">

                            <span class="font-semibold">
                                Expired Certificates
                            </span>

                            <span>
                                {{ $expiredPercent }}%
                            </span>

                        </div>

                        <div class="w-full bg-gray-200 rounded-full h-6">

                            <div class="bg-red-600 h-6 rounded-full"
                                 style="width:{{ $expiredPercent }}%"></div>

                        </div>

                    </div>

                </div>

                <div class="mt-8 grid md:grid-cols-2 gap-6">

                    <div class="bg-blue-50 rounded-lg p-5">

                        <h3 class="font-bold text-blue-700">
                            📊 Growth Statistics
                        </h3>

                        <p class="mt-3 text-gray-600">
                            Future versions of the system will include monthly
                            membership growth, certificate issuance trends,
                            renewals and historical analytics.
                        </p>

                    </div>

                    <div class="bg-green-50 rounded-lg p-5">

                        <h3 class="font-bold text-green-700">
                            📈 Status Overview
                        </h3>

                        <p class="mt-3 text-gray-600">

                            Valid Certificates:
                            <strong>{{ $validCertificates }}</strong>

                            <br><br>

                            Expired Certificates:
                            <strong>{{ $expiredCertificates }}</strong>

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>