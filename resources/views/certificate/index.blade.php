<x-app-layout>

    <x-slot name="header">
        <h2 class="text-3xl font-bold text-green-700">
            {{ $title ?? 'Certificates' }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto">

            @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-lg rounded-xl p-6">

                <div class="flex justify-between items-center mb-6">

                    <h2 class="text-2xl font-bold">
                        {{ $title ?? 'Certificates' }}
                    </h2>

                    <a href="{{ route('certificates.create') }}"
                       class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg shadow">
                        📜 Issue Certificate
                    </a>

                </div>

                <table class="min-w-full border border-gray-200">

                    <thead class="bg-green-600 text-white">

                        <tr>

                            <th class="p-3 text-left">Certificate No.</th>
                            <th class="p-3 text-left">Member</th>
                            <th class="p-3 text-left">Certificate</th>
                            <th class="p-3 text-left">Issue Date</th>
                            <th class="p-3 text-left">Expiry Date</th>
                            <th class="p-3 text-left">Status</th>
                            <th class="p-3 text-center">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($certificates as $certificate)

                            <tr class="border-b hover:bg-gray-50">

                                <td class="p-3">
                                    {{ $certificate->certificate_number }}
                                </td>

                                <td class="p-3">
                                    {{ $certificate->member->full_name }}
                                </td>

                                <td class="p-3">
                                    {{ $certificate->certificate_title }}
                                </td>

                                <td class="p-3">
                                    {{ $certificate->issue_date }}
                                </td>

                                <td class="p-3">
                                    {{ $certificate->expiry_date ?? 'N/A' }}
                                </td>

                                <td class="p-3">

                                    @if($certificate->status == 'Valid')

                                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full font-semibold">
                                            ✅ VALID
                                        </span>

                                    @elseif($certificate->status == 'Expired')

                                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full font-semibold">
                                            ❌ EXPIRED
                                        </span>

                                    @else

                                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full font-semibold">
                                            {{ strtoupper($certificate->status) }}
                                        </span>

                                    @endif

                                </td>

                                <td class="p-3 text-center">

                                    <a href="{{ route('certificates.show', $certificate->id) }}"
                                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">

                                        👁 View

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="text-center p-8 text-gray-500">

                                    No certificates found.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>