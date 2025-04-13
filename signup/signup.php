<?php
include './partials/connect.php';
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($fullname) && !empty($number) && !empty($email) && !empty($password)) {
        $stmt = $con->prepare("SELECT email FROM signup WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->rowCount() > 0) {
            $error = "Email already exists. Please login instead.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $stmt = $con->prepare("INSERT INTO signup (name, phone, email, password) VALUES (?, ?, ?, ?)");
            
            if ($stmt->execute([$fullname, $number, $email, $hashed_password])) {
                header("Location: login.php?signup=success");
                exit();
            } else {
                $error = "Registration failed. Please try again.";
            }
        }
    } else {
        $error = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PowerCare - Sign Up</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #a855f7;
            --primary-dark: #7e22ce;
            --dark: #111827;
            --light: #f3f4f6;
            --danger: #ef4444;
            --success: #10b981;
            --gray: #6b7280;
            --dark-bg: #030712;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: var(--dark-bg);
            color: #e5e7eb;
            background-image: 
                radial-gradient(at 80% 0%, hsla(189, 100%, 56%, 0.1) 0px, transparent 50%),
                radial-gradient(at 0% 50%, hsla(355, 100%, 93%, 0.1) 0px, transparent 50%);
        }
        .signup-container {
            width: 100%;
            max-width: 450px;
            padding: 2rem;
        }
        .signup-card {
            background: rgba(17, 24, 39, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 2.5rem;
            border: 1px solid rgba(168, 85, 247, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }
        .signup-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(168, 85, 247, 0.1) 0%, transparent 70%);
            z-index: -1;
            animation: rotate 15s linear infinite;
        }
        .signup-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .signup-header h2 {
            color: var(--primary);
            font-size: 1.75rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        .signup-header p {
            color: var(--gray);
            font-size: 0.9rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #e5e7eb;
            font-size: 0.9rem;
        }
        .input-field {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            background-color: rgba(31, 41, 55, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: #e5e7eb;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        .input-field:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.2);
        }
        .input-icon {
            position: absolute;
            left: 1rem;
            top: 2.5rem;
            color: var(--gray);
            font-size: 1rem;
        }
        .signup-btn {
            width: 100%;
            padding: 0.75rem;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        .signup-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(168, 85, 247, 0.3);
        }
        .signup-btn:active {
            transform: translateY(0);
        }
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: var(--gray);
            font-size: 0.8rem;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin: 0 0.5rem;
        }
        .login-link {
            text-align: center;
            font-size: 0.9rem;
            color: var(--gray);
        }
        .login-link a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: var(--danger);
            background-color: rgba(239, 68, 68, 0.1);
            padding: 0.75rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        @media (max-width: 480px) {
            .signup-container { padding: 1.5rem; }
            .signup-card { padding: 1.5rem; }
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <div class="signup-card">
            <div class="signup-header">
                <h2><i class="fas fa-bolt"></i> PowerCare</h2>
                <p>Create your account to report electricity issues</p>
            </div>

            <?php if ($error): ?>
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" id="fullname" name="fullname" class="input-field" placeholder="Enter your full name" required>
                </div>

                <div class="form-group">
                    <label for="number">Phone Number</label>
                    <i class="fas fa-phone input-icon"></i>
                    <input type="text" id="number" name="number" class="input-field" placeholder="Enter your phone number" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" id="email" name="email" class="input-field" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" id="password" name="password" class="input-field" placeholder="Create a password" required>
                </div>

                <button type="submit" class="signup-btn">
                    <i class="fas fa-user-plus"></i> Sign Up
                </button>

                <div class="divider">OR</div>

                <div class="login-link">
                    Already have an account? <a href="login.php">Log in</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
