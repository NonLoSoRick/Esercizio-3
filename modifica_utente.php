<?php

$servername = "localhost";
$username = "root"; // Inserisci il nome utente del database
$password = ""; // Inserisci la password del database
$dbname = "users_data"; // Inserisci il nome del database


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $sql = "UPDATE utenti SET nome='$nome', cognome='$cognome', email='$email', telefono='$telefono' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Utente aggiornato con successo";
    } else {
        echo "Errore durante l'aggiornamento dell'utente: " . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM utenti WHERE id='$id'";
    $result = $conn->query($sql);
    $utente = $result->fetch_assoc();
} else {
    header("Location: index.php");
    exit();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica Utente</title>
</head>

<body>
    <h1>Modifica Utente</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo $utente['id']; ?>">
        Nome: <input type="text" name="nome" value="<?php echo $utente['nome']; ?>" required><br>
        Cognome: <input type="text" name="cognome" value="<?php echo $utente['cognome']; ?>" required><br>
        Email: <input type="email" name="email" value="<?php echo $utente['email']; ?>" required><br>
        Telefono: <input type="text" name="telefono" value="<?php echo $utente['telefono']; ?>"><br>
        <input type="submit" value="Salva Modifiche">
    </form>
    <a href="index.php">Torna alla lista degli utenti</a>
</body>

</html>