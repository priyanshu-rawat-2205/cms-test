<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome to Our Newsletter</title>
    <style>
        body {
            font-family: 'Inter', 'Helvetica Neue', Arial, sans-serif;
            background-color: #f4f5f7;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background-color: #4f46e5;
            color: white;
            text-align: center;
            padding: 30px 20px;
        }
        .header-icon {
            font-size: 50px;
            margin-bottom: 15px;
        }
        .header h2 {
            font-size: 26px;
            margin: 0;
        }
        .content {
            padding: 25px 20px;
        }
        .content p {
            margin-bottom: 15px;
        }
        .highlight {
            background-color: #eef2ff;
            border-left: 4px solid #4f46e5;
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
        }
        .email-address {
            font-weight: 600;
            color: #4f46e5;
        }
        ul {
            padding-left: 20px;
            margin-bottom: 20px;
        }
        ul li {
            margin-bottom: 10px;
        }
        .footer {
            background-color: #f9fafb;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #6b7280;
        }
        .signature {
            margin-top: 10px;
            font-style: italic;
            color: #374151;
        }
        @media screen and (max-width: 600px) {
            .header h2 {
                font-size: 22px;
            }
            .header-icon {
                font-size: 40px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <div class="header-icon">📧</div>
            <h2>Welcome Aboard!</h2>
        </div>

        <!-- Content Section -->
        <div class="content">
            <p>Thank you for subscribing to our newsletter! We're excited to have you on board and can't wait to share valuable insights, stories, and updates with you.</p>

            <div class="highlight">
                <p>You’ve successfully subscribed with: <span class="email-address">{{ $email }}</span></p>
            </div>

            <p>Here’s what you can expect:</p>
            <ul>
                <li>Curated content tailored for you</li>
                <li>Latest blog posts and tips</li>
                <li>Exclusive deals and special announcements</li>
            </ul>

            <p>We're committed to delivering content that you'll love and find useful. Stay tuned for the latest!</p>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>You're receiving this email because you subscribed to our newsletter.</p>
            <p class="signature">— The Blog Team</p>
        </div>
    </div>
</body>
</html>
