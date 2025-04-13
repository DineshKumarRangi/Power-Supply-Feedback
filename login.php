<?php
include './partials/connect.php';
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        // Modified query to match your actual table structure
        $stmt = $con->prepare("SELECT * FROM signup WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Verify the password against the hashed password
            if (password_verify($password, $user['password'])) {
                // Start session and store user data
                session_start();
                $_SESSION['user_id'] = $user['email']; // Using email as identifier since no id column
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_name'] = $user['name'];
                
                // Redirect to posting1.php
                header("Location: posting1.php");
                exit();
            } else {
                $error = "Invalid email or password.";
            }
        } else {
            $error = "Account not found. Please sign up first.";
        }
    } else {
        $error = "Both email and password are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PowerCare - Login</title>
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

        .login-container {
            width: 100%;
            max-width: 450px;
            padding: 2rem;
        }

        .login-card {
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

        .login-card::before {
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

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h2 {
            color: var(--primary);
            font-size: 1.75rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .login-header p {
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

        .login-btn {
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

        .login-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(168, 85, 247, 0.3);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .forgot-link {
            display: block;
            text-align: right;
            margin-bottom: 1.5rem;
            font-size: 0.8rem;
        }

        .forgot-link a {
            color: var(--gray);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .forgot-link a:hover {
            color: var(--primary);
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

        .signup-link {
            text-align: center;
            font-size: 0.9rem;
            color: var(--gray);
        }

        .signup-link a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .signup-link a:hover {
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

        .success-message {
            color: var(--success);
            background-color: rgba(16, 185, 129, 0.1);
            padding: 0.75rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 1.5rem;
            }
            
            .login-card {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h2><i class="fas fa-bolt"></i> PowerCare</h2>
                <p>Sign in to report electricity issues</p>
            </div>

            <?php if (isset($_GET['signup']) && $_GET['signup'] == 'success'): ?>
                <div class="success-message">
                    <i class="fas fa-check-circle"></i> Registration successful! Please log in.
                </div>
            <?php endif; ?>

            <?php if ($error): ?>
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" id="email" name="email" class="input-field" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" id="password" name="password" class="input-field" placeholder="Enter your password" required>
                </div>

                <div class="forgot-link">
                    <a href="forgot-password.php">Forgot password?</a>
                </div>

                <button type="submit" class="login-btn">
                    <i class="fas fa-sign-in-alt"></i> Sign In
                </button>

                <div class="divider">OR</div>

                <div class="signup-link">
                    Don't have an account? <a href="signup.php">Sign up</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
