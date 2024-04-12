<?php
// Connessione al database
$servername = "localhost";
$username = "root"; // Inserisci il nome utente del database
$password = ""; // Inserisci la password del database
$dbname = "users_data"; // Inserisci il nome del database

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Prendi i dati dal modulo
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

// Query per inserire un nuovo utente nel database
$sql = "INSERT INTO utenti (nome, cognome, email, telefono) VALUES ('$nome', '$cognome', '$email', '$telefono')";

if ($conn->query($sql) === TRUE) {
    echo "Nuovo utente inserito con successo";
} else {
    echo "Errore durante l'inserimento dell'utente: " . $conn->error;
}

$conn->close();
