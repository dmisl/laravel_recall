<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Platform</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 28px;
            color: #4CAF50;
            margin: 0;
        }
        .content {
            margin-top: 20px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
        }
        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 24px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #888;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Welcome Aboard!</h1>
        </div>
        <div class="content">
            <p>Hello '{{ $userName }}',</p>
            <p>Welcome to our platform! We're excited to have you as part of our community.</p>
            <p>To get started, you can explore your dashboard, update your profile, or simply dive into what we offer.</p>
            <a href="{{ $dashboardUrl }}" class="button">Go to Dashboard</a>
            <p>If you have any questions or need assistance, feel free to reply to this email or contact our support team.</p>
        </div>
        <div class="footer">
            <p>Thanks for joining us!</p>
            <p>— The Team</p>
        </div>
    </div>
</body>
</html>
