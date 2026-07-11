<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reset Your Password</title>
</head>

<body style="margin:0;padding:0;background:#f4f7fb;font-family:Arial,Helvetica,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f7fb;padding:40px 0;">
    <tr>
        <td align="center">

            <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:10px;overflow:hidden;box-shadow:0 5px 20px rgba(0,0,0,.08);">

                <!-- Header -->
                <tr>
                    <td align="center" style="background:#2563eb;padding:35px;">
                        <h1 style="color:#ffffff;margin:0;font-size:28px;">
                            Reset Your Password
                        </h1>
                    </td>
                </tr>
                <tr>
                    <td style="padding:40px;color:#444444;line-height:28px;font-size:16px;">

                        <h2 style="margin-top:0;color:#111827;">
                            Hello {{ $user->first_name }} {{ $user->last_name }}
                        </h2>

                        <p>
                            We received a request to reset the password for your account.
                            Click the button below to create a new password.
                        </p>

                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td align="center" style="padding:30px 0;">
                                    <a href="{{ $link }}"
                                        style="
                                        background:#2563eb;
                                        color:#ffffff;
                                        text-decoration:none;
                                        padding:15px 35px;
                                        border-radius:6px;
                                        display:inline-block;
                                        font-size:16px;
                                        font-weight:bold;">
                                        Reset Password
                                    </a>
                                </td>
                            </tr>
                        </table>

                        <p>
                            If you didn't request a password reset, you can safely ignore this email.
                            Your password will remain unchanged.
                        </p>

                        <hr style="border:none;border-top:1px solid #e5e7eb;margin:30px 0;">
                        <p style="font-size:14px;color:#6b7280;">
                            If the button above doesn't work, copy and paste the following link into your browser:
                        </p>
                        <p style="word-break:break-all;font-size:14px;color:#2563eb;">
                            {{ $link }}
                        </p>

                    </td>
                </tr>

                <tr>
                    <td align="center" style="background:#f9fafb;padding:25px;font-size:13px;color:#6b7280;">
                        <strong>Fillip Technologies</strong><br><br>
                        © {{ date('Y') }} Your Company. All rights reserved.
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>
