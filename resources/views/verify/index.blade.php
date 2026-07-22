<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SOFSREA Certificate Verification</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gradient-to-r from-blue-700 via-green-600 to-teal-700 min-h-screen flex items-center justify-center">

<div class="w-full max-w-xl">

    <div class="bg-white rounded-2xl shadow-2xl p-10">

        <div class="text-center">

            <h1 class="text-4xl font-extrabold text-green-700">
                SOFSREA
            </h1>

            <h2 class="text-2xl font-bold mt-2">
                Certificate Verification System
            </h2>

            <p class="text-gray-500 mt-3">
                Enter the certificate number below to verify whether the certificate is genuine.
            </p>

        </div>

        <form action="{{ route('verify.certificate') }}" method="POST" class="mt-8">

            @csrf

            <label class="font-semibold">
                Certificate Number
            </label>

            <input
                type="text"
                name="certificate_number"
                placeholder="Example: SOFSREA-2026-0001"
                class="w-full border rounded-lg p-4 mt-2 focus:ring-2 focus:ring-green-500"
                required>

            @error('certificate_number')

                <p class="text-red-500 mt-2">
                    {{ $message }}
                </p>

            @enderror

            <button
                class="w-full mt-6 bg-green-600 hover:bg-green-700 text-white font-bold py-4 rounded-lg transition">

                🔍 Verify Certificate

            </button>

        </form>

        <div class="text-center mt-8">

            <a href="{{ route('login') }}"
               class="text-blue-600 hover:underline">

                Administrator Login

            </a>

        </div>

    </div>

</div>

</body>

</html>