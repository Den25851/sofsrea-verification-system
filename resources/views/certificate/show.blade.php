<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            Certificate Details
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-5xl mx-auto">

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">

                <!-- Header -->

                <div class="bg-green-700 text-white px-8 py-6">

                    <h1 class="text-3xl font-bold">
                        {{ $certificate->certificate_title }}
                    </h1>

                    <p class="mt-2 text-green-100">
                        Certificate No:
                        <strong>{{ $certificate->certificate_number }}</strong>
                    </p>

                </div>

                <!-- Details -->

                <div class="p-8">

                    <div class="grid md:grid-cols-2 gap-8">

                        <div>

                            <h3 class="font-bold text-lg mb-4">
                                Member Information
                            </h3>

                            <p>
                                <strong>Name:</strong>
                                {{ $certificate->member->full_name }}
                            </p>

                            <p class="mt-2">
                                <strong>Email:</strong>
                                {{ $certificate->member->email }}
                            </p>

                            <p class="mt-2">
                                <strong>Phone:</strong>
                                {{ $certificate->member->phone }}
                            </p>

                        </div>

                        <div>

                            <h3 class="font-bold text-lg mb-4">
                                Certificate Information
                            </h3>

                            <p>
                                <strong>Issue Date:</strong>
                                {{ \Carbon\Carbon::parse($certificate->issue_date)->format('d F Y') }}
                            </p>

                            <p class="mt-2">
                                <strong>Expiry Date:</strong>
                                {{ \Carbon\Carbon::parse($certificate->expiry_date)->format('d F Y') }}
                            </p>

                            <p class="mt-2">
                                <strong>Status:</strong>

                                @if($certificate->status == 'Valid')

                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                                        Valid
                                    </span>

                                @else

                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
                                        Expired
                                    </span>

                                @endif

                            </p>

                        </div>

                    </div>

                    <!-- QR Code -->

                    <div class="mt-12 text-center">

                        {!! QrCode::size(180)->generate(route('verify.show', $certificate->certificate_number)) !!}

                        <p class="text-gray-500 mt-3">
                            Scan to Verify Certificate
                        </p>

                    </div>

                    <!-- Buttons -->

                    <div class="mt-12 flex flex-wrap gap-4 justify-center">

                        <a href="{{ route('certificates.print', $certificate->id) }}"
                           target="_blank"
                           class="bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg shadow">

                            🖨 Print Certificate

                        </a>

                        <a href="{{ route('verify.show', $certificate->certificate_number) }}"
                           target="_blank"
                           class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-3 rounded-lg shadow">

                            🌐 Public Verification

                        </a>

                        <a href="{{ route('certificates.index') }}"
                           class="bg-gray-700 hover:bg-gray-800 text-white px-6 py-3 rounded-lg shadow">

                            ← Back

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>