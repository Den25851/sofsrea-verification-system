<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Certificate Verification</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gradient-to-br from-blue-700 via-green-600 to-teal-700 min-h-screen flex items-center justify-center p-6">

<div class="w-full max-w-2xl">

<div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

@if($certificate)

<div class="bg-green-600 text-white text-center py-8">

<div class="text-6xl">
✅
</div>

<h1 class="text-4xl font-bold mt-3">
Certificate Verified
</h1>

<p class="opacity-90 mt-2">
This certificate is authentic.
</p>

</div>

<div class="p-8">

<div class="grid gap-5">

<div class="bg-gray-100 rounded-xl p-4">
<p class="text-gray-500 text-sm">Certificate Number</p>
<p class="text-xl font-bold">{{ $certificate->certificate_number }}</p>
</div>

<div class="bg-gray-100 rounded-xl p-4">
<p class="text-gray-500 text-sm">Member</p>
<p class="text-xl font-bold">{{ $certificate->member->full_name }}</p>
</div>

<div class="bg-gray-100 rounded-xl p-4">
<p class="text-gray-500 text-sm">Certificate</p>
<p class="text-xl font-bold">{{ $certificate->certificate_title }}</p>
</div>

<div class="grid grid-cols-2 gap-4">

<div class="bg-gray-100 rounded-xl p-4">
<p class="text-gray-500 text-sm">Issued</p>
<p class="font-semibold">{{ $certificate->issue_date }}</p>
</div>

<div class="bg-gray-100 rounded-xl p-4">
<p class="text-gray-500 text-sm">Expires</p>
<p class="font-semibold">
{{ $certificate->expiry_date ?? 'N/A' }}
</p>
</div>

</div>

<div class="bg-green-50 border border-green-200 rounded-xl p-4">

<p class="text-gray-500 text-sm">
Status
</p>

<span class="inline-block mt-2 px-4 py-2 rounded-full bg-green-600 text-white font-bold">
{{ strtoupper($certificate->status) }}
</span>

</div>

</div>

@else

<div class="bg-red-600 text-white text-center py-10">

<div class="text-6xl">
❌
</div>

<h1 class="text-4xl font-bold mt-4">
Certificate Not Found
</h1>

<p class="mt-2">
The certificate number does not exist.
</p>

</div>

@endif

<div class="mt-8 text-center">

<a href="{{ route('verify.index') }}"
class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold shadow-lg">

Verify Another Certificate

</a>

</div>

</div>

</div>

</div>

</body>

</html>