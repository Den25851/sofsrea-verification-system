<x-app-layout>
<x-slot name="header">

    <div class="bg-gradient-to-r from-blue-700 via-blue-600 to-indigo-700 rounded-2xl shadow-xl p-8 text-white">

        <div class="flex flex-col lg:flex-row justify-between items-center">

            <div>

                <h1 class="text-4xl font-extrabold tracking-wide">
                    📊 SOFSREA Reporting & Analytics Center
                </h1>

                <p class="mt-3 text-blue-100 text-lg">
                    Real-Time Membership & Certificate Management Dashboard
                </p>

                <div class="mt-6 flex flex-wrap gap-6 text-sm">

                    <div>
                        <span class="font-semibold">📅 Date</span><br>
                        {{ now()->format('d F Y') }}
                    </div>

                    <div>
                        <span class="font-semibold">🕒 Time</span><br>
                        {{ now()->format('h:i A') }}
                    </div>

                    <div>
                        <span class="font-semibold">👤 Administrator</span><br>
                        {{ Auth::user()->name }}
                    </div>

                </div>

            </div>

            <div class="mt-8 lg:mt-0">

                <div class="bg-white/20 backdrop-blur-md rounded-xl p-6 text-center shadow-lg">

                    <p class="text-lg font-semibold">
                        System Status
                    </p>

                    <div class="mt-3 text-3xl">
                        🟢
                    </div>

                    <p class="mt-2 text-green-200 font-bold">
                        ONLINE
                    </p>

                </div>

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


           <!-- Dashboard Overview -->

<div class="mt-10">

    <h2 class="text-3xl font-bold text-gray-800">
        Dashboard Overview
    </h2>

    <p class="text-gray-500 mt-2 mb-8">
        Monitor membership registration and certificate performance at a glance.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-6">

        <!-- Members -->

        <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 hover:shadow-xl transition duration-300">

            <div class="text-4xl mb-4">
                👥
            </div>

            <h3 class="text-lg font-semibold text-gray-800">
                Members
            </h3>

            <p class="text-4xl font-bold text-gray-900 mt-4">
                {{ $memberCount }}
            </p>

            <p class="text-gray-500 mt-2">
                Registered Members
            </p>

        </div>

        <!-- Certificates -->

        <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 hover:shadow-xl transition duration-300">

            <div class="text-4xl mb-4">
                📜
            </div>

            <h3 class="text-lg font-semibold text-gray-800">
                Certificates
            </h3>

            <p class="text-4xl font-bold text-gray-900 mt-4">
                {{ $certificateCount }}
            </p>

            <p class="text-gray-500 mt-2">
                Certificates Issued
            </p>

        </div>

        <!-- Valid -->

        <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 hover:shadow-xl transition duration-300">

            <div class="text-4xl mb-4">
                ✅
            </div>

            <h3 class="text-lg font-semibold text-gray-800">
                Valid
            </h3>

            <p class="text-4xl font-bold text-green-600 mt-4">
                {{ $validCertificates }}
            </p>

            <p class="text-gray-500 mt-2">
                Active Certificates
            </p>

        </div>

        <!-- Expired -->

        <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 hover:shadow-xl transition duration-300">

            <div class="text-4xl mb-4">
                ❌
            </div>

            <h3 class="text-lg font-semibold text-gray-800">
                Expired
            </h3>

            <p class="text-4xl font-bold text-red-600 mt-4">
                {{ $expiredCertificates }}
            </p>

            <p class="text-gray-500 mt-2">
                Expired Certificates
            </p>

        </div>

        <!-- Expiring Soon -->

        <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 hover:shadow-xl transition duration-300">

            <div class="text-4xl mb-4">
                ⏰
            </div>

            <h3 class="text-lg font-semibold text-gray-800">
                Expiring Soon
            </h3>

            <p class="text-4xl font-bold text-yellow-600 mt-4">
                {{ $expiringSoon }}
            </p>

            <p class="text-gray-500 mt-2">
                Within 30 Days
            </p>

        </div>

    </div>

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