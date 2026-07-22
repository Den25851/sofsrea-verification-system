<x-app-layout>

    <x-slot name="header">
        <h2 class="text-3xl font-bold text-blue-700">
            Add New Member
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto">

            @if ($errors->any())
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow">
                    <strong>Please fix the following errors:</strong>
                    <ul class="list-disc ml-6 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow-lg rounded-xl p-8">

                <form action="{{ route('members.store') }}" method="POST">

                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Member Number -->
                        <div>
                            <label class="block font-semibold mb-2">
                                Member Number
                            </label>

                            <input
                                type="text"
                                name="member_number"
                                value="{{ old('member_number') }}"
                                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>

                        <!-- Full Name -->
                        <div>
                            <label class="block font-semibold mb-2">
                                Full Name
                            </label>

                            <input
                                type="text"
                                name="full_name"
                                value="{{ old('full_name') }}"
                                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block font-semibold mb-2">
                                Email Address
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="block font-semibold mb-2">
                                Phone Number
                            </label>

                            <input
                                type="text"
                                name="phone"
                                value="{{ old('phone') }}"
                                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>

                        <!-- Organization -->
                        <div>
                            <label class="block font-semibold mb-2">
                                Organization
                            </label>

                            <input
                                type="text"
                                name="organization"
                                value="{{ old('organization') }}"
                                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block font-semibold mb-2">
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

                    <div class="mt-8 flex gap-4">

                        <button
                            type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg shadow">
                            💾 Save Member
                        </button>

                        <a href="{{ route('members.index') }}"
                           class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-3 rounded-lg shadow">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>