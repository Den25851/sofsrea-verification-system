<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SOFSREA Certificate Verification System</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100 font-sans antialiased">

<div class="flex h-screen">

    <!-- ================= SIDEBAR ================= -->

    <aside class="w-72 bg-gradient-to-b from-blue-800 via-blue-700 to-green-700 text-white shadow-2xl">

        <div class="p-6 border-b border-blue-500">

            <h1 class="text-2xl font-bold">

                SOFSREA

            </h1>

            <p class="text-sm text-blue-100">

                Certificate Verification

            </p>

        </div>

        <nav class="mt-6">

            <a href="{{ route('dashboard') }}"
               class="flex items-center px-6 py-4 hover:bg-blue-600 transition">

                🏠 <span class="ml-3">Dashboard</span>

            </a>

            <a href="{{ route('members.index') }}"
               class="flex items-center px-6 py-4 hover:bg-blue-600 transition">

                👥 <span class="ml-3">Members</span>

            </a>

            <a href="#"
               class="flex items-center px-6 py-4 hover:bg-blue-600 transition">

                📜 <span class="ml-3">Certificates</span>

            </a>

            <a href="#"
               class="flex items-center px-6 py-4 hover:bg-blue-600 transition">

                🔍 <span class="ml-3">Verify Certificate</span>

            </a>

            <a href="#"
               class="flex items-center px-6 py-4 hover:bg-blue-600 transition">

                📊 <span class="ml-3">Reports</span>

            </a>

            <a href="#"
               class="flex items-center px-6 py-4 hover:bg-blue-600 transition">

                ⚙ <span class="ml-3">Settings</span>

            </a>

        </nav>

    </aside>

    <!-- ================= CONTENT ================= -->

    <div class="flex-1 flex flex-col">

        @include('layouts.navigation')

        @isset($header)

            <header class="bg-white shadow">

                <div class="px-8 py-6">

                    {{ $header }}

                </div>

            </header>

        @endisset

        <main class="flex-1 overflow-y-auto">

            {{ $slot }}

        </main>

    </div>

</div>

</body>
</html>