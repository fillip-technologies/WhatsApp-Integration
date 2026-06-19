<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Confirmation</title>
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', 'Helvetica Neue', Arial, sans-serif;
        }

        body {
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            width: 100%;
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            padding: 40px 36px 32px;
            border: 1px solid #e9edf4;
        }
        .header {
            border-bottom: 2px solid #eef2f7;
            padding-bottom: 20px;
            margin-bottom: 28px;
        }

        .header h1 {
            font-size: 26px;
            font-weight: 700;
            color: #1a2a3a;
            letter-spacing: -0.3px;
        }

        .header h1 span {
            color: #2a7de1;
        }

        /* Greeting */
        .greeting {
            font-size: 18px;
            font-weight: 600;
            color: #1a2a3a;
            margin-bottom: 16px;
        }

        /* Body text */
        .body-text {
            font-size: 16px;
            line-height: 1.7;
            color: #2c3e50;
            margin-bottom: 18px;
        }

        .body-text strong {
            color: #1a2a3a;
        }

        /* Steps box */
        .steps-box {
            background-color: #f8faff;
            border-left: 4px solid #2a7de1;
            border-radius: 8px;
            padding: 18px 22px;
            margin: 22px 0 24px;
        }

        .steps-box p {
            font-size: 15px;
            font-weight: 600;
            color: #1a2a3a;
            margin-bottom: 8px;
        }

        .steps-box ol {
            padding-left: 22px;
            margin: 0;
        }

        .steps-box ol li {
            font-size: 15px;
            line-height: 1.8;
            color: #2c3e50;
            padding-left: 4px;
        }

        .steps-box ol li strong {
            color: #1a2a3a;
        }

        /* Features list */
        .features {
            background-color: #f8faff;
            border-radius: 8px;
            padding: 18px 22px;
            margin: 18px 0 24px;
            list-style: none;
        }

        .features li {
            font-size: 15px;
            line-height: 1.9;
            color: #2c3e50;
            padding-left: 24px;
            position: relative;
        }

        .features li::before {
            content: "•";
            color: #2a7de1;
            font-weight: 700;
            font-size: 20px;
            position: absolute;
            left: 0;
            top: -2px;
        }

        /* Divider */
        .divider {
            height: 1px;
            background: #e9edf4;
            margin: 28px 0 24px;
        }

        /* Footer */
        .footer {
            font-size: 15px;
            line-height: 1.7;
            color: #2c3e50;
        }

        .footer .support {
            margin-top: 6px;
        }

        .footer .signoff {
            margin-top: 20px;
            font-weight: 500;
            color: #1a2a3a;
        }

        .footer .team-name {
            font-weight: 700;
            color: #2a7de1;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .email-container {
                padding: 24px 18px;
            }

            .header h1 {
                font-size: 22px;
            }

            .greeting {
                font-size: 16px;
            }

            .body-text,
            .steps-box ol li,
            .features li,
            .footer {
                font-size: 14px;
            }

            .steps-box,
            .features {
                padding: 14px 16px;
            }
        }
    </style>
</head>
<body>

    <div class="email-container">

        <!-- Header -->
        <div class="header">
            <h1>✅ <span>Registration</span> Complete</h1>
        </div>

        <!-- Greeting -->
        <p class="greeting">Dear {{ $data->first_name }} {{ $data->last_name}}</p>

        <!-- Body -->
        <p class="body-text">
            Congratulations! Your registration has been completed successfully, and your payment has been received.
        </p>
        <p class="body-text">
            Your account is now <strong>active</strong> and ready to use.
        </p>

        <!-- Steps -->
        <div class="steps-box">
            <p>📄 To view your payment invoice and account details:</p>
            <ol>
                <li>Login to your dashboard using your registered email and password.</li>
                <li>After logging in, navigate to the <strong>Payment Invoice</strong> section.</li>
                <li>You can view and download your payment invoice there.</li>
            </ol>
        </div>

        <!-- Features -->
        <p class="body-text" style="margin-bottom:6px;">Once logged in, you can also:</p>
        <ul class="features">
            <li>Create message templates.</li>
            <li>Manage your account settings.</li>
            <li>Use the available platform features and services.</li>
        </ul>

        <!-- Support -->
        <p class="body-text">
            If you have any questions or need assistance, please contact our support team.
        </p>

        <div class="divider"></div>

        <!-- Footer -->
        <div class="footer">
            <p>Thank you for choosing us.</p>
            <p class="signoff">
                Best Regards,<br />
                <span class="team-name">Fillip Technologies Team</span>
            </p>
        </div>

    </div>

</body>
</html>
