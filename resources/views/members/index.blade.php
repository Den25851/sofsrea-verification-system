<x-app-layout>

    <x-slot name="header">
        <h2 class="text-3xl font-bold text-blue-700">
            Members
        </h2>
    </x-slot>

    @if(session('success'))
        <div class="max-w-7xl mx-auto mt-6">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="py-6">
        <div class="max-w-7xl mx-auto">

            <div class="bg-white shadow rounded-lg p-6">

                <div class="flex justify-between items-center mb-6">

                    <h2 class="text-2xl font-bold">
                        Registered Members
                    </h2>

                    <a href="{{ route('members.create') }}"
                        class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg">
                        + Add Member
                    </a>

                </div>

                <table class="min-w-full border">

                    <thead class="bg-blue-600 text-white">

                        <tr>
                            <th class="p-3">Member No.</th>
                            <th class="p-3">Full Name</th>
                            <th class="p-3">Email</th>
                            <th class="p-3">Phone</th>
                            <th class="p-3">Organization</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($members as $member)

                            <tr class="border-b hover:bg-gray-50">

                                <td class="p-3">{{ $member->member_number }}</td>
                                <td class="p-3">{{ $member->full_name }}</td>
                                <td class="p-3">{{ $member->email }}</td>
                                <td class="p-3">{{ $member->phone }}</td>
                                <td class="p-3">{{ $member->organization }}</td>
                                <td class="p-3">
                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700">
                                        {{ $member->status }}
                                    </span>
                                </td>

                                <td class="p-3 flex gap-2">

                                    <a href="{{ route('members.show', $member->id) }}"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                                        View
                                    </a>

                                    <a href="{{ route('members.edit', $member->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                        Edit
                                    </a>

                                    <form action="{{ route('members.destroy', $member->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Delete this member?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                            Delete
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="text-center p-6 text-gray-500">
                                    No members have been added yet.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>