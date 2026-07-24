<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SOFSREA Certificate Issued</title>
</head>

<body style="font-family:Arial,Helvetica,sans-serif;background:#f4f4f4;padding:30px;">

<div style="max-width:700px;margin:auto;background:#ffffff;border-radius:10px;padding:40px;">

    <h2 style="color:#0f4c81;">
        🎉 Your SOFSREA Certificate Has Been Issued
    </h2>

    <p>Dear <strong>{{ $certificate->member->full_name }}</strong>,</p>

    <p>
        Congratulations! Your membership certificate has been successfully issued by the
        <strong>Society of Forensic Science and Experts Association (SOFSREA).</strong>
    </p>

    <hr>

    <h3>Certificate Details</h3>

    <p><strong>Certificate Number:</strong> {{ $certificate->certificate_number }}</p>

    <p><strong>Certificate Title:</strong> {{ $certificate->certificate_title }}</p>

    <p><strong>Issue Date:</strong>
        {{ \Carbon\Carbon::parse($certificate->issue_date)->format('d F Y') }}
    </p>

    <p><strong>Expiry Date:</strong>
        {{ \Carbon\Carbon::parse($certificate->expiry_date)->format('d F Y') }}
    </p>

    <p><strong>Status:</strong> {{ $certificate->status }}</p>

    <hr>

    <h3>Verify Your Certificate</h3>

    <p>
        Click the button below to verify your certificate online.
    </p>

    <p style="text-align:center;margin:35px 0;">

        <a href="{{ url('/verify/'.$certificate->certificate_number) }}"
           style="
                background:#0f4c81;
                color:white;
                text-decoration:none;
                padding:15px 35px;
                border-radius:6px;
                font-weight:bold;">

            VERIFY CERTIFICATE

        </a>

    </p>

    <p>If the button does not work, copy this link into your browser:</p>

    <p>{{ url('/verify/'.$certificate->certificate_number) }}</p>

    <hr>

    <p>
        Thank you for being a valued member of SOFSREA.
    </p>

    <br>

    <strong>SOFSREA Administration</strong>

</div>

</body>
</html>