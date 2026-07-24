<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SOFSREA Membership Confirmation</title>
</head>

<body style="font-family:Arial,Helvetica,sans-serif;background:#f4f4f4;padding:30px;">

<div style="max-width:700px;margin:auto;background:#ffffff;border-radius:10px;padding:40px;">

    <h2 style="color:#0f4c81;">
        Welcome to SOFSREA
    </h2>

    <p>Dear <strong>{{ $member->full_name }}</strong>,</p>

    <p>Congratulations!</p>

    <p>
        Your membership has been successfully registered with the
        <strong>Society of Forensic Science and Experts Association (SOFSREA).</strong>
    </p>

    <hr>

    <h3>Membership Details</h3>

    <p>
        <strong>Member Number:</strong>
        {{ $member->member_number }}
    </p>

    <p>
        <strong>Member Name:</strong>
        {{ $member->full_name }}
    </p>

    <p>
        <strong>Status:</strong>
        {{ $member->status }}
    </p>

    <hr>

    <p>
        Your membership has been recorded successfully.
    </p>

    <p>
        Your membership certificate will be issued by the administrator after approval.
        Once it has been issued, you will receive another email containing:
    </p>

    <ul>
        <li>Your Certificate Number</li>
        <li>Issue Date</li>
        <li>Expiry Date</li>
        <li>A verification link</li>
    </ul>

    <br>

    <p>
        Thank you for joining SOFSREA.
    </p>

    <br>

    <strong>SOFSREA Administration</strong>

</div>

</body>
</html>