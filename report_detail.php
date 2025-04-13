<?php
include './partials/connect.php';

// Get and sanitize the report ID
$report_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the specific report
$sql = "SELECT * FROM user WHERE user_id = ?";
$stmt = $con->prepare($sql);
$stmt->execute([$report_id]);
$report = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$report) {
    die("Report not found!");
}

$images = json_decode($report['user_images'], true);
$content = preg_split('/\r\n|\r|\n/', $report['user_problem']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Details | PowerCare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #a855f7;
            --dark-bg: #030712;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--dark-bg);
            color: #e5e7eb;
        }
        
        .report-container {
            background: rgba(17, 24, 39, 0.8);
            border-radius: 15px;
            padding: 2rem;
            margin: 2rem auto;
            max-width: 800px;
        }
        
        .report-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }
        
        .report-content {
            line-height: 1.8;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php"><i class="fas fa-bolt"></i> PowerCare</a>
        </div>
    </nav>

    <div class="container">
        <div class="report-container">
            <h2 class="mb-4"><?= htmlspecialchars($report['user_name']) ?>'s Report</h2>
            
            <?php if (!empty($images[0])): ?>
                <img src="<?= htmlspecialchars($images[0]) ?>" class="report-image" alt="Report Image">
            <?php endif; ?>
            
            <div class="report-content">
                <?php foreach ($content as $paragraph): ?>
                    <p><?= nl2br(htmlspecialchars($paragraph)) ?></p>
                <?php endforeach; ?>
            </div>
            
            <?php if (!empty($images[1])): ?>
                <img src="<?= htmlspecialchars($images[1]) ?>" class="report-image mt-4" alt="Report Image">
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
