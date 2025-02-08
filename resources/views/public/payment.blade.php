<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Ready</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-yellow-100 to-indigo-200 flex justify-center items-center min-h-screen">

    <div class="bg-white shadow-2xl rounded-lg p-6 w-full max-w-3xl">
        <!-- Home Link -->
        <div class="mb-4 flex items-center">
            <a href="{{ route('homepage') }}" class="flex items-center text-indigo-600 hover:text-indigo-800 font-semibold transition">
                <!-- Icon Home -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9m0 0l9 9m-9-9v15" />
                </svg>
                Home
            </a>
        </div>

        <h2 class="text-2xl font-bold mb-4 text-center text-yellow-700">Payment Ready</h2>

        <table class="w-full border-collapse border border-gray-300 shadow-lg">
            <thead>
                <tr class="bg-yellow-600 text-white">
                    <th class="border border-gray-300 px-4 py-3 text-center">Bank Name</th>
                    <th class="border border-gray-300 px-4 py-3 text-center">On Behalf Of</th>
                    <th class="border border-gray-300 px-4 py-3 text-center">Account Number</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white hover:bg-yellow-100 transition">
                    <td class="border border-gray-300 px-7 py-2 align-middle">
                        <div class="flex items-center space-x-3">
                            <img class="w-12 h-12 object-contain" src="{{ asset('dist/assets/img/bank/bca.png') }}"
                                alt="BCA">
                            <p class="font-semibold text-gray-700">BCA</p>
                        </div>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-gray-700 text-center">RADEN AHRAM KURNIAWAN</td>
                    <td class="border border-gray-300 px-4 py-2 text-gray-700 text-center">0373933861</td>
                </tr>
                <tr class="bg-white hover:bg-yellow-100 transition">
                    <td class="border border-gray-300 px-7 py-2 align-middle">
                        <div class="flex items-center space-x-3">
                            <img class="w-12 h-12 object-contain" src="{{ asset('dist/assets/img/bank/bri.png') }}"
                                alt="BCA">
                            <p class="font-semibold text-gray-700">BRI</p>
                        </div>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-gray-700 text-center">I GUSTI NGURAH BAYU S</td>
                    <td class="border border-gray-300 px-4 py-2 text-gray-700 text-center">8461201015550530</td>
                </tr>
                <tr class="bg-white hover:bg-yellow-100 transition">
                    <td class="border border-gray-300 px-7 py-2 align-middle">
                        <div class="flex items-center space-x-3">
                            <img class="w-12 h-12 object-contain" src="{{ asset('dist/assets/img/bank/dana.png') }}"
                                alt="BCA">
                            <p class="font-semibold text-gray-700">DANA</p>
                        </div>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-gray-700 text-center">I gusti ngurah bayu supartha</td>
                    <td class="border border-gray-300 px-4 py-2 text-gray-700 text-center">085858641518</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>
