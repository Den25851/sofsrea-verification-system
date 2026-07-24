<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SOFSREA Membership Confirmation</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; background:#f4f4f4; padding:30px;">

<div style="max-width:700px; margin:auto; background:white; border-radius:10px; padding:40px;">

    <h2 style="color:#0f4c81;">
        Welcome to SOFSREA
    </h2>

    <p>Dear <strong>{{ $member->full_name }}</strong>,</p>

    <p>
        Congratulations!
    </p>

    <p>
        Your membership has been successfully registered with the
        <strong>Society of Forensic Science and Experts Association (SOFSREA)</strong>.
    </p>

    <hr>

    <h3>Membership Details</h3>

    <p><strong>Member Number:</strong> {{ $member->member_number }}</p>

    <p><strong>Full Name:</strong> {{ $member->full_name }}</p>

    <p><strong>Status:</strong> {{ $member->status }}</p>

    <hr>

    <h3>Verify Your Membership</h3>

    <p>
        Click the button below to verify your membership.
    </p>

    <p style="text-align:center; margin:30px 0;">

        <a href="{{ url('/verify/'.$member->member_number) }}"
           style="background:#0f4c81;
                  color:white;
                  padding:15px 30px;
                  text-decoration:none;
                  border-radius:6px;
                  font-weight:bold;">

            VERIFY MY MEMBERSHIP

        </a>

    </p>

    <p>
        If the button does not work, copy and paste this link into your browser:
    </p>

    <p>
        {{ url('/verify/'.$member->member_number) }}
    </p>

    <hr>

    <p>
        Thank you for becoming a member of SOFSREA.
    </p>

    <p>
        We appreciate your commitment to advancing professionalism and excellence in forensic science.
    </p>

    <br>

    <strong>
        SOFSREA Administration
    </strong>

</div>

</body>
</html>