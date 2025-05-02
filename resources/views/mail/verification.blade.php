<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification Code</title>
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
        .code {
            font-size: 24px;
            font-weight: bold;
            color: #4CAF50;
            padding: 10px;
            background-color: #f4f7fc;
            border: 2px solid #4CAF50;
            border-radius: 4px;
            display: inline-block;
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
            <h1>Email Verification</h1>
        </div>
        <div class="content">
            <p>Hello,</p>
            <p>We received a request to verify your email address. Please use the following code to complete your email verification:</p>
            <div class="code">{{ $verificationCode }}</div>
            <p>This code will expire in 10 minutes.</p>
            <p>If you did not request this verification, you can safely ignore this email.</p>
        </div>
        <div class="footer">
            <p>Thanks for using our application!</p>
            <p>If you have any questions, feel free to contact our support team.</p>
        </div>
    </div>
</body>
</html>