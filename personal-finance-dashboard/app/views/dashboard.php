<!-- app/views/dashboard.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Finance Dashboard</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Personal Finance Dashboard</h1>
            <h3>Manage your Budget and Expenses</h3>
        </header>
        <!-- app/views/dashboard.php -->
<form action="/set-theme" method="POST">
    <label for="theme">Select Theme:</label>
    <select name="theme" id="theme">
        <option value="light" <?= isset($_COOKIE['theme']) && $_COOKIE['theme'] == 'light' ? 'selected' : '' ?>>Light</option>
        <option value="dark" <?= isset($_COOKIE['theme']) && $_COOKIE['theme'] == 'dark' ? 'selected' : '' ?>>Dark</option>
    </select>
    <button type="submit">Set Theme</button>
</form>

<!-- Add styles to apply the theme based on the cookie -->
<style>
    body {
        background-color: <?= isset($_COOKIE['theme']) && $_COOKIE['theme'] == 'dark' ? '#333' : '#fff' ?>;
        color: <?= isset($_COOKIE['theme']) && $_COOKIE['theme'] == 'dark' ? '#fff' : '#000' ?>;
    }
</style>

        <section class="budget">
            <h2>Your Budget</h2>
            <table>
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($budgetData as $data): ?>
                        <tr>
                            <td><?= $data['month']; ?></td>
                            <td><?= $data['year']; ?></td>
                            <td>$<?= number_format($data['amount'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <!-- app/views/dashboard.php -->
<nav>
    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="/logout">Logout</a>
    <?php else: ?>
        <a href="/login">Login</a>
    <?php endif; ?>
</nav>


        <section class="add-expense">
            <h2>Add an Expense</h2>
            <form action="/add-expense" method="POST">
                <input type="number" name="amount" placeholder="Amount" required>
                <input type="text" name="category" placeholder="Category" required>
                <input type="date" name="date" required>
                <button type="submit">Add Expense</button>
            </form>
        </section>

        <section class="set-budget">
            <h2>Set Budget for a Month</h2>
            <form action="/set-budget" method="POST">
                <input type="number" name="amount" placeholder="Amount" required>
                <input type="month" name="month" required>
                <input type="number" name="year" placeholder="Year" required>
                <button type="submit">Set Budget</button>
            </form>
        </section>
    </div>
    <script src="/public/js/script.js"></script>
</body>
</html>
