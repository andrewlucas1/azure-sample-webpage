// index.php
<!DOCTYPE html>
<html>
<head>
    <title>Hello World Azure App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 100px;
            background-color: #f0f8ff;
        }
        h1 {
            color: #0078d4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .info-box {
            background-color: #f5f5f5;
            border-radius: 5px;
            padding: 10px;
            margin-top: 20px;
            text-align: left;
        }
        .info-item {
            margin: 8px 0;
        }
        .label {
            font-weight: bold;
            display: inline-block;
            width: 150px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hello World!</h1>
        <p>Your Azure Web App is running successfully.</p>
        
        <div class="info-box">
            <div class="info-item">
                <span class="label">Server Time:</span>
                <?php echo date('Y-m-d H:i:s'); ?>
            </div>
            
            <div class="info-item">
                <span class="label">Your IP Address:</span>
                <?php
                // Function to get the visitor's real IP address
                function getVisitorIP() {
                    // Check for CloudFlare IP
                    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                        return $_SERVER["HTTP_CF_CONNECTING_IP"];
                    }
                    
                    // Check for X-Forwarded-For header
                    if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                        // X-Forwarded-For can contain multiple IPs (comma-separated)
                        $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                        return trim($ips[0]);
                    }
                    
                    // If all else fails, use REMOTE_ADDR
                    return $_SERVER['REMOTE_ADDR'];
                }
                
                echo getVisitorIP();
                ?>
            </div>
            
            <div class="info-item">
                <span class="label">Server Name:</span>
                <?php echo $_SERVER['SERVER_NAME']; ?>
            </div>
            
            <div class="info-item">
                <span class="label">Server Software:</span>
                <?php echo $_SERVER['SERVER_SOFTWARE']; ?>
            </div>
        </div>
    </div>
</body>
</html>