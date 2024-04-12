<?php
$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "users_data";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM utenti WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Utente eliminato con successo";
    } else {
        echo "Errore durante l'eliminazione dell'utente: " . $conn->error;
    }
} else {
    header("Location: index.php");
    exit();
}
$conn->close();
