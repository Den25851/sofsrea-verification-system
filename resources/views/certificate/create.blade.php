<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            Issue New Certificate
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-4xl mx-auto">

            <div class="bg-white rounded-xl shadow-lg">

                <div class="bg-green-700 text-white px-8 py-5 rounded-t-xl">
                    <h2 class="text-2xl font-bold">
                        New Membership Certificate
                    </h2>
                </div>

                <form action="{{ route('certificates.store') }}" method="POST" class="p-8">

                    @csrf

                    <div class="grid md:grid-cols-2 gap-6">

                        <!-- Member -->

                        <div>

                            <label class="block font-semibold mb-2">
                                Member
                            </label>

                            <select
                                name="member_id"
                                class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-600"
                                required>

                                <option value="">Select Member</option>

                                @foreach($members as $member)

                                    <option value="{{ $member->id }}">

                                        {{ $member->full_name }}

                                    </option>

                                @endforeach

                            </select>

                            @error('member_id')

                                <p class="text-red-600 mt-1">{{ $message }}</p>

                            @enderror

                        </div>

                        <!-- Certificate Title -->

                        <div>

                            <label class="block font-semibold mb-2">
                                Certificate Title
                            </label>

                            <input
                                type="text"
                                name="certificate_title"
                                value="{{ old('certificate_title','SOFSREA Membership Certificate') }}"
                                class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-600"
                                required>

                            @error('certificate_title')

                                <p class="text-red-600 mt-1">{{ $message }}</p>

                            @enderror

                        </div>

                        <!-- Issue Date -->

                        <div>

                            <label class="block font-semibold mb-2">
                                Issue Date
                            </label>

                            <input
                                type="date"
                                name="issue_date"
                                value="{{ old('issue_date',date('Y-m-d')) }}"
                                class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-600"
                                required>

                            @error('issue_date')

                                <p class="text-red-600 mt-1">{{ $message }}</p>

                            @enderror

                        </div>

                        <!-- Expiry Date -->

                        <div>

                            <label class="block font-semibold mb-2">
                                Expiry Date
                            </label>

                            <input
                                type="date"
                                name="expiry_date"
                                value="{{ old('expiry_date') }}"
                                class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-600">

                            @error('expiry_date')

                                <p class="text-red-600 mt-1">{{ $message }}</p>

                            @enderror

                        </div>

                        <!-- Status -->

                        <div>

                            <label class="block font-semibold mb-2">
                                Status
                            </label>

                            <select
                                name="status"
                                class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-600"
                                required>

                                <option value="Valid">Valid</option>

                                <option value="Expired">Expired</option>

                            </select>

                            @error('status')

                                <p class="text-red-600 mt-1">{{ $message }}</p>

                            @enderror

                        </div>

                    </div>

                    <div class="mt-8 flex justify-end gap-4">

                        <a href="{{ route('certificates.index') }}"
                           class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg">

                            Cancel

                        </a>

                        <button
                            type="submit"
                            class="bg-green-700 hover:bg-green-800 text-white px-8 py-3 rounded-lg">

                            Issue Certificate

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>