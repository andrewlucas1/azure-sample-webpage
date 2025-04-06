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
        .image-container {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hello World!</h1>
        <p>Your Azure Web App is running successfully.</p>
        
        <div class="image-container">
            <!-- Small, efficient SVG cloud image -->
            <svg xmlns="http://www.w3.org/2000/svg" width="120" height="80" viewBox="0 0 24 24">
                <path fill="#0078d4" d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM19 18H6c-2.21 0-4-1.79-4-4 0-2.05 1.53-3.76 3.56-3.97l1.07-.11.5-.95C8.08 7.14 9.94 6 12 6c2.62 0 4.88 1.86 5.39 4.43l.3 1.5 1.53.11c1.56.1 2.78 1.41 2.78 2.96 0 1.65-1.35 3-3 3z"/>
            </svg>
        </div>
        
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
                    // Get the IP using standard methods
                    $ip = '';
                    
                    // Check for CloudFlare IP
                    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                        $ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
                    }
                    // Check for X-Forwarded-For header
                    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                        // X-Forwarded-For can contain multiple IPs (comma-separated)
                        $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                        $ip = trim($ips[0]);
                    }
                    // If all else fails, use REMOTE_ADDR
                    else {
                        $ip = $_SERVER['REMOTE_ADDR'];
                    }
                    
                    // Remove port number if it exists (IP:PORT format)
                    if (strpos($ip, ':') !== false) {
                        $ip = explode(':', $ip)[0];
                    }
                    
                    return $ip;
                }
                
                echo getVisitorIP();
                ?>
            </div>
        </div>
    </div>
</body>
</html>
