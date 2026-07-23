<x-app-layout>

    <x-slot name="header">
        <h2 class="text-3xl font-bold text-blue-700">
            Add New Member
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-5xl mx-auto">

            @if ($errors->any())
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-5 py-4 rounded-lg">
                    <h3 class="font-bold mb-2">Please fix the following errors:</h3>

                    <ul class="list-disc ml-6">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>
            @endif

            <div class="bg-white rounded-xl shadow-xl overflow-hidden">

                <div class="bg-blue-700 text-white px-8 py-5">

                    <h2 class="text-2xl font-bold">
                        Member Registration Form
                    </h2>

                    <p class="text-blue-100">
                        Fill in the member details below.
                    </p>

                </div>

                <form action="{{ route('members.store') }}" method="POST" class="p-8">

                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Member Number -->

                        <div>

                            <label class="block font-semibold text-gray-700 mb-2">
                                Member Number
                            </label>

                            <input
                                type="text"
                                value="{{ $nextNumber }}"
                                class="w-full bg-gray-100 border rounded-lg p-3 font-bold text-blue-700"
                                readonly>

                            <input
                                type="hidden"
                                name="member_number"
                                value="{{ $nextNumber }}">

                        </div>

                        <!-- Full Name -->

                        <div>

                            <label class="block font-semibold text-gray-700 mb-2">
                                Full Name
                            </label>

                            <input
                                type="text"
                                name="full_name"
                                value="{{ old('full_name') }}"
                                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500"
                                placeholder="Enter full name"
                                required>

                        </div>

                        <!-- Email -->

                        <div>

                            <label class="block font-semibold text-gray-700 mb-2">
                                Email Address
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500"
                                placeholder="example@email.com"
                                required>

                        </div>

                        <!-- Phone -->

                        <div>

                            <label class="block font-semibold text-gray-700 mb-2">
                                Phone Number
                            </label>

                            <input
                                type="text"
                                name="phone"
                                value="{{ old('phone') }}"
                                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500"
                                placeholder="07XXXXXXXX"
                                required>

                        </div>

                        <!-- Organization -->

                        <div>

                            <label class="block font-semibold text-gray-700 mb-2">
                                Organization
                            </label>

                            <input
                                type="text"
                                name="organization"
                                value="{{ old('organization') }}"
                                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500"
                                placeholder="Organization">

                        </div>

                        <!-- Status -->

                        <div>

                            <label class="block font-semibold text-gray-700 mb-2">
                                Status
                            </label>

                            <select
                                name="status"
                                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500">

                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>

                            </select>

                        </div>

                    </div>

                    <div class="border-t mt-10 pt-6 flex justify-end gap-4">

                        <a href="{{ route('members.index') }}"
                           class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-3 rounded-lg font-semibold">

                            Cancel

                        </a>

                        <button
                            type="submit"
                            class="bg-blue-700 hover:bg-blue-800 text-white px-8 py-3 rounded-lg font-semibold shadow">

                            Save Member

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>