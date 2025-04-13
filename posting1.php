<?php 
session_start();
include './partials/connect.php';

if (isset($_POST['submit'])) {
    $uploaded_images = [];

    if (!empty($_FILES['images']['name'][0])) {
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $originalName = $_FILES['images']['name'][$key];
            $targetDirectory = "uploads/";
            $newFileName = $targetDirectory . uniqid() . "_" . basename($originalName);

            if (move_uploaded_file($tmp_name, $newFileName)) {
                $uploaded_images[] = $newFileName;
            }
        }
    }

    $images_json = json_encode($uploaded_images);
    $user_name = $_POST['user_name'];
    $user_problem = $_POST['user_problem'];

    try {
        $sql = "INSERT INTO user (user_name, user_problem, user_images) 
                VALUES (:user_name, :user_problem, :user_images)";
        $stmt = $con->prepare($sql);
        $stmt->execute([
            ':user_name' => $user_name,
            ':user_problem' => $user_problem,
            ':user_images' => $images_json
        ]);

        $_SESSION['success_message'] = "Report successfully registered!";
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        $_SESSION['error_message'] = "There was an error submitting your report. Please try again.";
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Issue Reporting | PowerCare</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

        .report-container {
            width: 100%;
            max-width: 800px;
            padding: 2rem;
        }

        .report-card {
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

        .report-card::before {
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

        .report-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .report-header h2 {
            color: var(--primary);
            font-size: 1.75rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .report-header p {
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
            padding: 0.75rem 1rem;
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

        textarea.input-field {
            min-height: 120px;
            resize: vertical;
        }

        .file-input {
            position: relative;
            margin-top: 1rem;
        }

        .file-input input[type="file"] {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .file-label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            border: 2px dashed rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            background-color: rgba(31, 41, 55, 0.6);
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-label:hover {
            border-color: var(--primary);
            background-color: rgba(168, 85, 247, 0.1);
        }

        .file-label i {
            margin-right: 0.5rem;
            color: var(--primary);
            font-size: 1.2rem;
        }

        .file-text {
            font-size: 0.9rem;
            color: var(--gray);
        }

        .submit-btn {
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
            margin-top: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .submit-btn:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(168, 85, 247, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
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
            .report-container {
                padding: 1.5rem;
            }
            
            .report-card {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="report-container">
        <div class="report-card">
            <div class="report-header">
                <h2><i class="fas fa-bolt"></i> Report Electricity Issue</h2>
                <p>Help us improve our services by reporting any power problems you're experiencing</p>
            </div>

            <?php if(isset($_SESSION['error_message'])): ?>
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i> <?= $_SESSION['error_message'] ?>
                </div>
                <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>

            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="user_name">Your Name</label>
                    <input type="text" id="user_name" name="user_name" class="input-field" placeholder="Enter Your Name" required>
                </div>

                <div class="form-group">
                    <label for="user_problem">Describe the Electricity Issue</label>
                    <textarea id="user_problem" name="user_problem" class="input-field" placeholder="Please describe your power problem in detail" required></textarea>
                </div>

                <div class="form-group">
                    <label for="file-upload" class="custom-label">Upload Photos (if any)</label>
                    <input type="file" id="file-upload" name="images[]" multiple>
                </div>

                <button type="submit" name="submit" class="submit-btn">
                    <i class="fas fa-paper-plane"></i> Submit Report
                </button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('file-upload');
            const fileLabel = fileInput.parentElement;
            const fileText = fileLabel.querySelector('.file-text');
            
            fileInput.addEventListener('change', function() {
                const files = this.files;
                
                if (files.length > 0) {
                    fileText.textContent = files.length === 1 ? files[0].name : `${files.length} files selected`;
                    fileLabel.style.borderColor = 'var(--primary)';
                    fileLabel.style.backgroundColor = 'rgba(168, 85, 247, 0.1)';
                } else {
                    fileText.textContent = 'Click to upload images or drag and drop';
                    fileLabel.style.borderColor = 'rgba(255, 255, 255, 0.1)';
                    fileLabel.style.backgroundColor = 'rgba(31, 41, 55, 0.6)';
                }
            });
        });
    </script>
</body>
</html>
