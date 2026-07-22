<x-app-layout>

    <x-slot name="header">
        <h2 class="text-3xl font-extrabold bg-gradient-to-r from-green-600 via-blue-600 to-purple-600 bg-clip-text text-transparent">
            SOFSREA Certificate Verification System
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Welcome Card -->
            <div class="bg-white rounded-xl shadow-md p-6 mb-8 border-l-4 border-green-500">

                <h2 class="text-2xl font-bold text-gray-800">
                    Welcome, {{ Auth::user()->name }} 👋
                </h2>

                <p class="text-gray-600 mt-2">
                    Welcome to the Society of Forensic Science and Experts Association (SOFSREA)
                    Certificate Verification System.
                    Manage members, issue certificates, verify certificates and monitor reports.
                </p>

            </div>

            <!-- Statistics Cards -->

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <a href="{{ route('members.index') }}">
                    <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-xl p-6 shadow-lg hover:shadow-2xl hover:scale-105 transition">

                        <div class="text-5xl">👥</div>

                        <h2 class="text-2xl font-bold mt-3">
                            Members
                        </h2>

                        <p class="text-4xl font-bold mt-4">
                            {{ $memberCount }}
                        </p>

                    </div>
                </a>

                <a href="{{ route('certificates.index') }}">
                    <div class="bg-gradient-to-r from-green-500 to-green-700 text-white rounded-xl p-6 shadow-lg hover:shadow-2xl hover:scale-105 transition">

                        <div class="text-5xl">📜</div>

                        <h2 class="text-2xl font-bold mt-3">
                            Certificates
                        </h2>

                        <p class="text-4xl font-bold mt-4">
                            {{ $certificateCount }}
                        </p>

                    </div>
                </a>

                <a href="{{ route('certificates.valid') }}">
                    <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white rounded-xl p-6 shadow-lg hover:shadow-2xl hover:scale-105 transition">

                        <div class="text-5xl">✅</div>

                        <h2 class="text-2xl font-bold mt-3">
                            Valid
                        </h2>

                        <p class="text-4xl font-bold mt-4">
                            {{ $validCertificates }}
                        </p>

                    </div>
                </a>

                <a href="{{ route('certificates.expired') }}">
                    <div class="bg-gradient-to-r from-red-500 to-red-700 text-white rounded-xl p-6 shadow-lg hover:shadow-2xl hover:scale-105 transition">

                        <div class="text-5xl">❌</div>

                        <h2 class="text-2xl font-bold mt-3">
                            Expired
                        </h2>

                        <p class="text-4xl font-bold mt-4">
                            {{ $expiredCertificates }}
                        </p>

                    </div>
                </a>

            </div>

            <!-- Quick Actions -->

            <div class="mt-10 bg-white rounded-xl shadow-md p-6">

                <h2 class="text-2xl font-bold text-gray-700 mb-6">

                    Quick Actions

                </h2>

                <div class="flex flex-wrap gap-4">

                    <a href="{{ route('members.create') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg shadow">

                        ➕ Add Member

                    </a>

                    <a href="{{ route('certificates.create') }}"
                       class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg shadow">

                        📜 Issue Certificate

                    </a>

                    <a href="{{ route('verify.index') }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-lg shadow">

                        🔍 Verify Certificate

                    </a>

                    <a href="{{ route('reports.index') }}"
                       class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg shadow">

                        📊 Reports

                    </a>

                </div>

            </div>

            <!-- System Overview -->

            <div class="mt-10 bg-white rounded-xl shadow-md p-6">

                <h2 class="text-2xl font-bold text-gray-700 mb-6">

                    System Overview

                </h2>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">

                    <div>

                        <h3 class="text-3xl font-bold text-blue-600">

                            {{ $memberCount }}

                        </h3>

                        <p class="text-gray-500">

                            Members

                        </p>

                    </div>

                    <div>

                        <h3 class="text-3xl font-bold text-green-600">

                            {{ $certificateCount }}

                        </h3>

                        <p class="text-gray-500">

                            Certificates

                        </p>

                    </div>

                    <div>

                        <h3 class="text-3xl font-bold text-yellow-500">

                            {{ $validCertificates }}

                        </h3>

                        <p class="text-gray-500">

                            Valid Certificates

                        </p>

                    </div>

                    <div>

                        <h3 class="text-3xl font-bold text-red-500">

                            {{ $expiredCertificates }}

                        </h3>

                        <p class="text-gray-500">

                            Expired Certificates

                        </p>

                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>