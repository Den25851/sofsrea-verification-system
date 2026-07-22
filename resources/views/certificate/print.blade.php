<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SOFSREA Membership Certificate</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>

        body{
            background:#f3f4f6;
            font-family: "Times New Roman", serif;
        }

        .certificate{

            width:1100px;
            margin:40px auto;
            background:white;

            border:18px solid #0f766e;
            outline:8px solid #d4af37;
            outline-offset:-25px;

            padding:70px;

            box-shadow:0 15px 40px rgba(0,0,0,.2);

        }

        @media print{

            .no-print{

                display:none;

            }

            body{

                background:white;

            }

            .certificate{

                margin:0;
                box-shadow:none;

            }

        }

    </style>

</head>

<body>

<div class="text-center mt-8 no-print">

    <button onclick="window.print()"
        class="bg-green-700 hover:bg-green-800 text-white px-8 py-3 rounded-lg shadow-lg">

        🖨 Print Certificate

    </button>

</div>


<div class="certificate">

    <!-- Logo -->

    <div class="text-center">

        <img src="{{ asset('images/logo.png') }}"
             class="mx-auto h-36">

    </div>


    <!-- Organization -->

    <div class="text-center mt-3">

        <h1 class="text-5xl font-bold text-green-800">

            SOFSREA

        </h1>

        <p class="text-xl mt-2 text-gray-700">

            Society of Forensic Science and Experts Association

        </p>

    </div>

    <hr class="my-10">

    <!-- Certificate Title -->

    <div class="text-center">

        <h2 class="text-5xl font-bold text-yellow-700 tracking-wide">

            CERTIFICATE OF MEMBERSHIP

        </h2>

        <p class="text-xl mt-8">

            This Certificate is Proudly Presented To

        </p>

    </div>


    <!-- Member -->

    <div class="text-center mt-10">

        <h1 class="text-6xl font-bold text-blue-900">

            {{ $certificate->member->full_name }}

        </h1>

    </div>


    <div class="text-center mt-10 text-2xl leading-10">

        For successfully becoming a registered member of

        <strong>

            Society of Forensic Science and Experts Association (SOFSREA)

        </strong>

        and is hereby recognized as an official member of the Association.

    </div>


    <!-- Details -->

    <div class="grid grid-cols-2 gap-10 mt-16 text-xl">

        <div>

            <strong>Certificate Number</strong>

            <p class="text-blue-700">

                {{ $certificate->certificate_number }}

            </p>

        </div>

        <div>

            <strong>Membership Status</strong>

            <p class="text-green-700 font-bold">

                {{ $certificate->status }}

            </p>

        </div>

        <div>

            <strong>Issue Date</strong>

            <p>

                {{ \Carbon\Carbon::parse($certificate->issue_date)->format('d F Y') }}

            </p>

        </div>

        <div>

            <strong>Expiry Date</strong>

            <p>

                {{ \Carbon\Carbon::parse($certificate->expiry_date)->format('d F Y') }}

            </p>

        </div>

    </div>


    <!-- QR Code -->

    <div class="text-center mt-16">

        {!! QrCode::size(180)->generate(route('verify.show',$certificate->certificate_number)) !!}

        <p class="mt-4 text-gray-600">

            Scan QR Code to Verify this Certificate

        </p>

    </div>


    <!-- Signature -->

    <div class="grid grid-cols-3 gap-10 mt-24 text-center">

        <div>

            ______________________

            <br><br>

            <strong>President</strong>

        </div>

        <div>

            <img src="{{ asset('images/logo.png') }}" class="mx-auto h-20">

            Official Seal

        </div>

        <div>

            ______________________

            <br><br>

            <strong>Secretary</strong>

        </div>

    </div>


    <div class="text-center mt-16 text-gray-600">

        This certificate is digitally verifiable through the official
        SOFSREA Certificate Verification Portal.

    </div>

</div>

</body>
</html>>