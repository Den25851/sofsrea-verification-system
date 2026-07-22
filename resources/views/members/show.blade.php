<x-app-layout>

    <x-slot name="header">
        <h2 class="text-3xl font-bold text-yellow-600">
            Edit Member
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-4xl mx-auto">

            <div class="bg-white shadow-xl rounded-xl p-8">

                <form action="{{ route('members.update',$member->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="grid md:grid-cols-2 gap-6">

                        <div>

                            <label class="font-semibold">
                                Member Number
                            </label>

                            <input
                                type="text"
                                name="member_number"
                                value="{{ old('member_number',$member->member_number) }}"
                                class="w-full mt-2 border rounded-lg p-3">

                        </div>

                        <div>

                            <label class="font-semibold">
                                Full Name
                            </label>

                            <input
                                type="text"
                                name="full_name"
                                value="{{ old('full_name',$member->full_name) }}"
                                class="w-full mt-2 border rounded-lg p-3">

                        </div>

                        <div>

                            <label class="font-semibold">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email',$member->email) }}"
                                class="w-full mt-2 border rounded-lg p-3">

                        </div>

                        <div>

                            <label class="font-semibold">
                                Phone
                            </label>

                            <input
                                type="text"
                                name="phone"
                                value="{{ old('phone',$member->phone) }}"
                                class="w-full mt-2 border rounded-lg p-3">

                        </div>

                        <div>

                            <label class="font-semibold">
                                Organization
                            </label>

                            <input
                                type="text"
                                name="organization"
                                value="{{ old('organization',$member->organization) }}"
                                class="w-full mt-2 border rounded-lg p-3">

                        </div>

                        <div>

                            <label class="font-semibold">
                                Status
                            </label>

                            <select
                                name="status"
                                class="w-full mt-2 border rounded-lg p-3">

                                <option value="Active"
                                    {{ $member->status=='Active'?'selected':'' }}>
                                    Active
                                </option>

                                <option value="Inactive"
                                    {{ $member->status=='Inactive'?'selected':'' }}>
                                    Inactive
                                </option>

                            </select>

                        </div>

                    </div>

                    <div class="mt-8 flex gap-4">

                        <button
                            class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg">

                            💾 Update Member

                        </button>

                        <a href="{{ route('members.index') }}"
                           class="bg-gray-600 hover:bg-gray-700 text-white px-8 py-3 rounded-lg">

                            Cancel

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>