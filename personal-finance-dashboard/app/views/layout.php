<!-- app/views/layout.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Finance Dashboard</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Personal Finance Dashboard</h1>
            <nav>
                <ul>
                    <li><a href="/">Home</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a href="/logout">Logout</a></li>
                    <?php else: ?>
                        <li><a href="/login">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <div class="container">
            <?php // The specific view content will be loaded here ?>
            <?= $content; ?>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2025 Personal Finance Dashboard. All rights reserved.</p>
        </div>
    </footer>

    <script src="/public/js/script.js"></script>
</body>
</html>
