<nav class="fixed top-0 left-0 h-screen w-64 bg-gradient-to-b from-blue-800 to-teal-700 text-white shadow-xl">

    <!-- Logo -->
    <div class="p-6 border-b border-blue-500">

        <h1 class="text-4xl font-extrabold">
            SOFSREA
        </h1>

        <p class="text-sm text-gray-200">
            Certificate Verification
        </p>

    </div>

    <!-- Menu -->
    <div class="mt-8 space-y-2">

        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}"
           class="flex items-center px-6 py-3 hover:bg-white/20 transition {{ request()->routeIs('dashboard') ? 'bg-white/20' : '' }}">

            <span class="text-xl">🏠</span>

            <span class="ml-4 font-medium">
                Dashboard
            </span>

        </a>

        <!-- Members -->
        <a href="{{ route('members.index') }}"
           class="flex items-center px-6 py-3 hover:bg-white/20 transition {{ request()->routeIs('members.*') ? 'bg-white/20' : '' }}">

            <span class="text-xl">👥</span>

            <span class="ml-4 font-medium">
                Members
            </span>

        </a>

        <!-- Certificates -->
        <a href="{{ route('certificates.index') }}"
           class="flex items-center px-6 py-3 hover:bg-white/20 transition {{ request()->routeIs('certificates.*') ? 'bg-white/20' : '' }}">

            <span class="text-xl">📜</span>

            <span class="ml-4 font-medium">
                Certificates
            </span>

        </a>

        <!-- Verify Certificate -->
        <a href="{{ route('verify.index') }}"
           class="flex items-center px-6 py-3 hover:bg-white/20 transition {{ request()->routeIs('verify.*') ? 'bg-white/20' : '' }}">

            <span class="text-xl">🔍</span>

            <span class="ml-4 font-medium">
                Verify Certificate
            </span>

        </a>

        <!-- Reports -->
        <a href="{{ route('reports.index') }}"
           class="flex items-center px-6 py-3 hover:bg-white/20 transition {{ request()->routeIs('reports.*') ? 'bg-white/20' : '' }}">

            <span class="text-xl">📊</span>

            <span class="ml-4 font-medium">
                Reports
            </span>

        </a>

        <!-- Settings -->
        <a href="{{ route('profile.edit') }}"
           class="flex items-center px-6 py-3 hover:bg-white/20 transition {{ request()->routeIs('profile.*') ? 'bg-white/20' : '' }}">

            <span class="text-xl">⚙️</span>

            <span class="ml-4 font-medium">
                Settings
            </span>

        </a>

    </div>

    <!-- User -->
    <div class="absolute bottom-0 w-full border-t border-blue-500 p-5">

        <div class="mb-4">

            <p class="font-bold">
                {{ Auth::user()->name }}
            </p>

            <p class="text-sm text-gray-200">
                {{ Auth::user()->email }}
            </p>

        </div>

        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <button type="submit"
                class="w-full bg-red-600 hover:bg-red-700 py-2 rounded-lg font-semibold">

                🚪 Logout

            </button>

        </form>

    </div>

</nav>