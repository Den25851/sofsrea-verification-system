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

                <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">

                 <h2 class="text-2xl font-bold text-gray-800">
    Registered Members
</h2>

                    <div class="flex flex-wrap gap-3">

                        <form action="{{ route('members.index') }}" method="GET" class="flex gap-2">

                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Search Member Number..."
                                class="border rounded-lg px-4 py-2 w-64 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                            <button
                                type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

                                🔍 Search

                            </button>

                            @if(request('search'))

                                <a href="{{ route('members.index') }}"
                                   class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-2 rounded-lg">

                                    Reset

                                </a>

                            @endif

                        </form>

                        <a href="{{ route('members.create') }}"
                           class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg">

                            + Add Member

                        </a>

                    </div>

                </div>

                <div class="overflow-x-auto">

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

                                    <td class="p-3 font-semibold">
                                        {{ $member->member_number }}
                                    </td>

                                    <td class="p-3">
                                        {{ $member->full_name }}
                                    </td>

                                    <td class="p-3">
                                        {{ $member->email }}
                                    </td>

                                    <td class="p-3">
                                        {{ $member->phone }}
                                    </td>

                                    <td class="p-3">
                                        {{ $member->organization }}
                                    </td>

                                    <td class="p-3">

                                        @if($member->status == 'Active')

                                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 font-semibold">
                                                Active
                                            </span>

                                        @else

                                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 font-semibold">
                                                Inactive
                                            </span>

                                        @endif

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

                                    <td colspan="7" class="text-center p-8 text-gray-500">

                                        No members found.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="mt-6">

                    {{ $members->links() }}

                </div>

            </div>

        </div>
    </div>

</x-app-layout>