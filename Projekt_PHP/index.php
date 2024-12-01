<?php include 'includes/db.php'; ?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cvijeće i sobne biljke - Početna</title>
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
        <h2>Dobrodošli na našu stranicu o cvijeću i sobnim biljkama!</h2>
        <p>Ovdje možete pronaći informacije o raznim biljkama i kako ih uzgajati.</p>

        <div class="gallery">
            <div>
                <a href="monstera.php">
                    <img src="images/Monstera.jpg" alt="Biljka Monstera" style="width: 100%; border-radius: 10px;">
                </a>
                <h3>Monstera Deliciosa</h3>
                <p>Popularna sobna biljka poznata po svojim prepoznatljivim listovima.</p>
            </div>
            <div>
                <a href="orhideja.php">
                    <img src="images/orhideja.jpg" alt="Biljka Orhideja" style="width: 100%; border-radius: 10px;">
                </a>
                <h3>Orhideja</h3>
                <p>Elegantan cvijet koji dolazi u različitim bojama i oblicima.</p>
            </div>
            <div>
                <a href="ficus.php">
                    <img src="images/fikus.jpg" alt="Biljka Ficus" style="width: 100%; border-radius: 10px;">
                </a>
                <h3>Ficus Lyrata</h3>
                <p>Fikus je poznat po svojim velikim, sjajnim listovima.</p>
            </div>
            <div>
                <a href="snakeplant.php">
                    <img src="images/sanseveria.jpg" alt="Biljka Snake Plant" style="width: 100%; border-radius: 10px;">
                </a>
                <h3>Snake Plant</h3>
                <p>Sansevieria je izdržljiva biljka idealna za početnike.</p>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Cvijeće i sobne biljke</p>
    </footer>
</body>
</html>
