<?php
session_start();
include 'includes/db.php';

// Obrada odjave
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php"); // Preusmjeravanje na početnu stranicu
    exit;
}

// Obrada prijave
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = hash('sha256', $_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' AND is_admin=1";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $_SESSION['admin'] = true;
    } else {
        echo "<p>Pogrešno korisničko ime ili lozinka.</p>";
    }
}

// Provjera prijave
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    echo "<h2>Prijavite se kao administrator za pristup sadržaju.</h2>";
    ?>
    <form action="admin.php" method="POST">
        <input type="text" name="username" placeholder="Korisničko ime" required>
        <input type="password" name="password" placeholder="Lozinka" required>
        <button type="submit" name="login">Prijava</button>
    </form>
    <?php
    exit;
}

// Dohvat korisničkih upita
$query = "SELECT * FROM contact_queries ORDER BY created_at DESC";
$queries = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
        <nav>
            <a href="index.php">Početna</a>
            <a href="about.php">O nama</a>
            <a href="contact.php">Kontakt</a>
            <a href="wikipedia_search.php">Pretraži biljke</a>
            <a href="admin.php">Admin</a>
        </nav>
    </header>

    <main>
        <h2>Korisnički upiti</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ime</th>
                    <th>Email</th>
                    <th>Poruka</th>
                    <th>Vrijeme slanja</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($queries->num_rows > 0): ?>
                    <?php while ($row = $queries->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['message']); ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Nema upita korisnika.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Gumb za odjavu -->
        <form action="admin.php" method="GET">
            <button type="submit" name="logout">Odjava</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 Admin Panel</p>
    </footer>
</body>
</html>
