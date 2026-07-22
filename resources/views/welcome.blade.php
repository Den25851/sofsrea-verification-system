<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-extrabold bg-gradient-to-r from-green-600 via-blue-600 to-purple-600 bg-clip-text text-transparent">
            SOFSREA Certificate Verification System
        </h2>
    </x-slot>

    <!-- Welcome Popup -->
    <div id="welcomePopup"
        class="fixed top-6 right-6 bg-green-600 text-white px-6 py-4 rounded-xl shadow-2xl z-50 transition duration-500">

        <h2 class="text-xl font-bold">👋 Welcome, {{ Auth::user()->name }}</h2>

        <p class="mt-2">
            You have successfully logged into the
            <strong>SOFSREA Certificate Verification System</strong>.
        </p>
    </div>

    <script>
        setTimeout(function () {
            document.getElementById('welcomePopup').style.display = 'none';
        }, 5000);
    </script>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-xl p-6 shadow-lg hover:scale-105 transition">
                    <div class="text-5xl">👥</div>
                    <h2 class="text-xl mt-3 font-bold">Members</h2>
                    <p class="text-4xl font-bold mt-2">0</p>
                </div>

                <div class="bg-gradient-to-r from-green-500 to-green-700 text-white rounded-xl p-6 shadow-lg hover:scale-105 transition">
                    <div class="text-5xl">📜</div>
                    <h2 class="text-xl mt-3 font-bold">Certificates</h2>
                    <p class="text-4xl font-bold mt-2">0</p>
                </div>

                <div class="bg-gradient-to-r from-yellow-400 to-yellow-600 text-white rounded-xl p-6 shadow-lg hover:scale-105 transition">
                    <div class="text-5xl">✅</div>
                    <h2 class="text-xl mt-3 font-bold">Valid</h2>
                    <p class="text-4xl font-bold mt-2">0</p>
                </div>

                <div class="bg-gradient-to-r from-red-500 to-red-700 text-white rounded-xl p-6 shadow-lg hover:scale-105 transition">
                    <div class="text-5xl">❌</div>
                    <h2 class="text-xl mt-3 font-bold">Expired</h2>
                    <p class="text-4xl font-bold mt-2">0</p>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>