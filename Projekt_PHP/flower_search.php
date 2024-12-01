<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pretraži biljke</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function fetchPlants() {
            const query = document.getElementById('plant-query').value || 'tomato';
            fetch(`flowers_api.php?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    const plantList = document.getElementById('plant-list');
                    plantList.innerHTML = '';

                    if (data.data && data.data.length > 0) {
                        data.data.forEach(plant => {
                            const listItem = document.createElement('li');
                            listItem.innerHTML = `
                                <strong>${plant.attributes.name || 'Nepoznato ime'}</strong><br>
                                Opis: ${plant.attributes.description || 'Nema opisa'}<br>
                                Svjetlost: ${plant.attributes.sun_requirements || 'Nepoznato'}<br>
                                Način sadnje: ${plant.attributes.sowing_method || 'Nepoznato'}
                            `;
                            plantList.appendChild(listItem);
                        });
                    } else {
                        plantList.innerHTML = '<p>Nema rezultata za zadani upit.</p>';
                    }
                })
                .catch(error => {
                    console.error('Greška pri dohvaćanju podataka:', error);
                    document.getElementById('plant-list').innerHTML = '<p>Greška pri dohvaćanju podataka.</p>';
                });
        }
    </script>
</head>
<body>
    <header>
        <h1>Pretraži biljke</h1>
        <nav>
            <a href="index.php">Početna</a>
            <a href="about.php">O nama</a>
            <a href="contact.php">Kontakt</a>
            <a href="flower_search.php">Pretraži biljke</a>
            <a href="admin.php">Admin</a>
        </nav>
    </header>

    <main>
        <h2>Pronađite informacije o biljkama</h2>
        <div>
            <input type="text" id="plant-query" placeholder="Unesite naziv biljke (npr. tomato)">
            <button onclick="fetchPlants()">Pretraži</button>
        </div>

        <ul id="plant-list" style="margin-top: 20px;">
        
        </ul>
    </main>

    <footer>
        <p>&copy; 2024 Cvijeće i sobne biljke</p>
    </footer>
</body>
</html>
