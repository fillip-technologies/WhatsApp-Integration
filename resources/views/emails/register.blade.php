<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            padding: 20px;
        }
        .container {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
        }
        h1 {
            color: #333;
        }
        .info {
            margin-top: 15px;
        }
        .info p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Welcome, {{ $data->first_name }} {{ $data->last_name }} 🎉</h1>

    <p>Thank you for registering with us. Here are your details:</p>

    <div class="info">
        <p><strong>Name:</strong> {{ $data->first_name }} {{ $data->last_name }}</p>
        <p><strong>Company:</strong> {{ $data->company_name }}</p>
        <p><strong>Email:</strong> {{ $data->email }}</p>
        <p><strong>Role:</strong> {{ $data->role }}</p>
        <p><strong>Phone:</strong> {{ $data->phone }}</p>
        <p><strong>Business Type:</strong> {{ $data->business_type }}</p>
    </div>

    <p style="margin-top:20px;">
        Your account has been created successfully.
    </p>

    <p>Best Regards,<br>Team</p>
</div>

</body>
</html>
