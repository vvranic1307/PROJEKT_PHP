<?php
include 'includes/db.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $userMessage = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contact_queries (name, email, message) VALUES ('$name', '$email', '$userMessage')";
    
    if ($conn->query($sql) === TRUE) {
        $message = "Vaš upit je uspješno poslan!";
    } else {
        $message = "Došlo je do greške prilikom slanja upita.";
    }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Cvijeće i sobne biljke</h1>
        <nav>
            <a href="index.php">Početna</a>
            <a href="about.php">O nama</a>
            <a href="contact.php">Kontakt</a>
            <a href="flower_search.php">Pretraži biljke</a>
            <a href="admin.php">Admin</a>
        </nav>
    </header>

    <main>
        <h2>Kontakt</h2>
        <form method="post" action="contact.php">
            <input type="text" name="name" placeholder="Vaše ime" required>
            <input type="email" name="email" placeholder="Vaš email" required>
            <textarea name="message" placeholder="Vaša poruka" required></textarea>
            <button type="submit">Pošalji</button>
        </form>
        <?php if ($message): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 Cvijeće i sobne biljke</p>
    </footer>
</body>
</html>
