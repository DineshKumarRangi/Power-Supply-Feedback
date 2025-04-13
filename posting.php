<?php include './partials/connect.php'; ?>

<?php
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

        header("Location: ?submitted=success");
        exit();
    } catch (PDOException $e) {
        header("Location: ?submitted=error");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Issue Reporting | PowerGrid Solutions</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        :root {
            --primary: #0056b3;
            --secondary: #ffcc00;
            --danger: #e63946;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #28a745;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .header {
            text-align: center;
            margin-bottom: 3rem;
            animation: fadeInDown 0.8s ease;
        }

        .header h1 {
            color: var(--primary);
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            position: relative;
            display: inline-block;
        }

        .header h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--secondary);
            border-radius: 2px;
        }

        .header p {
            color: #666;
            font-size: 1.1rem;
        }

        .main-content {
            display: flex;
            flex-wrap: wrap;
            gap: 3rem;
            align-items: center;
            justify-content: center;
        }

        .illustration {
            flex: 1;
            min-width: 300px;
            max-width: 500px;
            animation: float 6s ease-in-out infinite;
        }

        .illustration img {
            width: 100%;
            height: auto;
            filter: drop-shadow(0 10px 20px rgba(0, 86, 179, 0.2));
        }

        .report-form {
            flex: 1;
            min-width: 300px;
            max-width: 500px;
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 86, 179, 0.1);
            transform: translateY(0);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .report-form:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 86, 179, 0.15);
        }

        .report-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary), var(--secondary));
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: inherit;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 86, 179, 0.1);
            background-color: white;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .file-input {
            position: relative;
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
            padding: 1rem;
            border: 2px dashed #ddd;
            border-radius: 8px;
            background-color: #f8f9fa;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-label:hover {
            border-color: var(--primary);
            background-color: rgba(0, 86, 179, 0.05);
        }

        .file-label i {
            margin-right: 0.5rem;
            color: var(--primary);
            font-size: 1.2rem;
        }

        .file-text {
            font-size: 0.9rem;
            color: #666;
        }

        .submit-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary) 0%, #0077cc 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 86, 179, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .submit-btn i {
            margin-right: 0.5rem;
        }

        .submit-btn:hover {
            background: linear-gradient(135deg, #0077cc 0%, var(--primary) 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 86, 179, 0.25);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .alert {
            padding: 1rem;
            margin-bottom: 2rem;
            border-radius: 8px;
            font-weight: 500;
            text-align: center;
            animation: slideIn 0.5s ease-out;
        }

        .alert-success {
            background-color: rgba(40, 167, 69, 0.1);
            color: var(--success);
            border: 1px solid rgba(40, 167, 69, 0.3);
        }

        .alert-error {
            background-color: rgba(230, 57, 70, 0.1);
            color: var(--danger);
            border: 1px solid rgba(230, 57, 70, 0.3);
        }

        .power-icon {
            display: inline-block;
            margin-right: 0.5rem;
            color: var(--secondary);
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(0, 86, 179, 0.4);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(0, 86, 179, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(0, 86, 179, 0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }

            .report-form {
                padding: 1.5rem;
            }

            .main-content {
                flex-direction: column;
            }
        }

        .form-group {
            margin-bottom: 20px;
            font-family: Arial, sans-serif;
        }

        .custom-label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        #file-upload {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 14px;
            color: #555;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        #file-upload:hover {
            border-color: #888;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        #file-upload:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-bolt power-icon"></i> Report Electricity Issue</h1>
            <p>Help us improve our services by reporting any power problems you're experiencing</p>
        </div>

        <?php
        if (isset($_GET['submitted'])) {
            if ($_GET['submitted'] == 'success') {
                echo '<div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> Your electricity issue has been reported successfully!
                </div>';
            } else {
                echo '<div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i> There was an error submitting your report. Please try again.
                </div>';
            }
        }
        ?>

        <div class="main-content">
            <div class="illustration">
                <img src="https://illustrations.popsy.co/amber/digital-nomad.svg" alt="Electricity Issue Illustration">
            </div>

            <form class="report-form" action="index.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="user_name">Your Name</label>
                    <input type="text" id="user_name" name="user_n  ame" class="form-control"
                        placeholder="Enter Your Name" required>
                </div>

                <div class="form-group">
                    <label for="user_problem">Describe the Electricity Issue</label>
                    <textarea id="user_problem" name="user_problem" class="form-control"
                        placeholder="Please describe your power problem in detail (e.g., no electricity, voltage fluctuations, etc.)"
                        required></textarea>
                </div>

                <div class="form-group">
                    <label for="file-upload" class="custom-label">Upload Photos (if any)</label>
                    <input type="file" id="file-upload" name="images[]" multiple required>
                </div>

                <form action="" method="POST">
                    <button type="submit" name="submit" class="submit-btn">
                        <i class="fas fa-paper-plane"></i> Submit Report
                    </button>
                </form>
            </form>
        </div>
    </div>

    <script>
        // Add animation to form when page loads
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('.report-form');
            form.style.animation = 'pulse 2s infinite';

            setTimeout(() => {
                form.style.animation = '';
            }, 2000);
        });

        // Update file input display
        const fileInputs = document.querySelectorAll('input[type="file"]');
        fileInputs.forEach(input => {
            input.addEventListener('change', function () {
                const files = this.files;
                const label = this.previousElementSibling;
                const text = label.querySelector('.file-text');

                if (files.length > 0) {
                    if (files.length === 1) {
                        text.textContent = files[0].name;
                    } else {
                        text.textContent = `${files.length} files selected`;
                    }
                    label.style.borderColor = 'var(--success)';
                    label.style.backgroundColor = 'rgba(40, 167, 69, 0.05)';
                } else {
                    text.textContent = 'Click to upload images or drag and drop';
                    label.style.borderColor = '#ddd';
                    label.style.backgroundColor = '#f8f9fa';
                }
            });
        });
    </script>
</body>

</html>
