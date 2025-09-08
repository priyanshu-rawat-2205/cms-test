<!DOCTYPE html>
<html>
<head>
    <title>New Blog Created</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #444;
            margin: 0;
            padding: 20px;
            background-color: #f4f6f8;
        }
        .container {
            max-width: 640px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }
        .header {
            background: linear-gradient(135deg, #3498db, #2c3e50);
            color: #fff;
            padding: 20px 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 1.6em;
            font-weight: 600;
        }
        .content {
            padding: 30px;
        }
        h2 {
            color: #2c3e50;
            font-size: 1.4em;
            margin-top: 0;
            margin-bottom: 15px;
        }
        .blog-info {
            background-color: #f9fbfd;
            border: 1px solid #e0e6ed;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
        }
        .blog-info p {
            margin: 8px 0;
            font-size: 0.95em;
        }
        strong {
            color: #2c3e50;
            display: inline-block;
            min-width: 110px;
        }
        .button {
            display: inline-block;
            background-color: #3498db;
            color: #fff !important;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.95em;
            font-weight: 500;
            margin-top: 15px;
        }
        .footer {
            padding: 20px 30px;
            text-align: center;
            font-size: 0.85em;
            color: #7f8c8d;
            border-top: 1px solid #eee;
            background-color: #fafbfc;
        }
        .logo {
            color: #3498db;
            font-weight: bold;
            font-size: 1em;
        }
    </style>
</head>
<body>
    <div class="container">

        <!-- Header -->
        <div class="header">
            <h1>Priyanshu's Blog</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <h2>🎉 A New Blog Has Been Created</h2>
            
            <p>We’re excited to share that a new blog has just been added to the platform. Here are the details:</p>
            
            <div class="blog-info">
                <p><strong>Title:</strong> {{ $item->name }}</p>
                <p><strong>Slug:</strong> {{ $item->slug }}</p>
                <p><strong>Description:</strong> {{ $item->description }}</p>
            </div>

            <a href="#" class="button">View Blog</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Thank you for being part of our community.<br>
            <span class="logo">Priyanshu's Blog</span></p>
        </div>

    </div>
</body>
</html>