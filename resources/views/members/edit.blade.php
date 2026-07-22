<x-app-layout>

    <x-slot name="header">
        <h2 class="text-3xl font-bold text-yellow-700">
            Edit Member
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-3xl mx-auto">

            <div class="bg-white shadow-xl rounded-xl p-8">

                <h2 class="text-2xl font-bold mb-6">
                    Update Member Details
                </h2>

                @if ($errors->any())

                    <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded mb-6">

                        <ul>

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                <form action="{{ route('members.update',$member->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-5">

                        <label class="font-semibold">
                            Member Number
                        </label>

                        <input
                            type="text"
                            name="member_number"
                            value="{{ old('member_number',$member->member_number) }}"
                            class="w-full border rounded-lg p-3 mt-2">

                    </div>

                    <div class="mb-5">

                        <label class="font-semibold">
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="full_name"
                            value="{{ old('full_name',$member->full_name) }}"
                            class="w-full border rounded-lg p-3 mt-2">

                    </div>

                    <div class="mb-5">

                        <label class="font-semibold">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email',$member->email) }}"
                            class="w-full border rounded-lg p-3 mt-2">

                    </div>

                    <div class="mb-5">

                        <label class="font-semibold">
                            Phone
                        </label>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone',$member->phone) }}"
                            class="w-full border rounded-lg p-3 mt-2">

                    </div>

                    <div class="mb-5">

                        <label class="font-semibold">
                            Organization
                        </label>

                        <input
                            type="text"
                            name="organization"
                            value="{{ old('organization',$member->organization) }}"
                            class="w-full border rounded-lg p-3 mt-2">

                    </div>

                    <div class="mb-6">

                        <label class="font-semibold">
                            Status
                        </label>

                        <select
                            name="status"
                            class="w-full border rounded-lg p-3 mt-2">

                            <option value="Active"
                                {{ $member->status=='Active' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="Inactive"
                                {{ $member->status=='Inactive' ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </div>

                    <div class="flex gap-4">

                        <button
                            type="submit"
                            class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-3 rounded-lg">

                            💾 Update Member

                        </button>

                        <a
                            href="{{ route('members.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">

                            Cancel

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>