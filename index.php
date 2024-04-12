<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione Utenti</title>
</head>

<body>
    <h1>Gestione Utenti</h1>

    <!-- Aggiungi Utente -->
    <h2>Aggiungi Utente</h2>
    <a href="aggiungi_utente.php">Aggiungi Utente</a>

    <!-- Lista degli Utenti -->
    <h2>Lista Utenti</h2>
    <ul>
        <?php
        $servername = "localhost";
        $username = "pma";
        $password = "";
        $dbname = "users_data";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connessione al database fallita: " . $conn->connect_error);
        }

        $sql = "SELECT id, nome, cognome FROM utenti";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . $row["nome"] . " " . $row["cognome"] . " - ";
                echo "<a href='modifica_utente.php?id=" . $row["id"] . "'>Modifica</a> | ";
                echo "<a href='elimina_utente.php?id=" . $row["id"] . "' onclick=\"return confirm('Sei sicuro di voler eliminare questo utente?');\">Elimina</a></li>";
            }
        } else {
            echo "Nessun utente presente nel database";
        }
        $conn->close();
        ?>
    </ul>
</body>

</html>