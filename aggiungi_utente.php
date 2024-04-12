<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggiungi Utente</title>
</head>

<body>
    <h1>Aggiungi Utente</h1>
    <form action="inserisci_utente.php" method="post">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br>
        <label for="cognome">Cognome:</label><br>
        <input type="text" id="cognome" name="cognome" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="telefono">Telefono:</label><br>
        <input type="text" id="telefono" name="telefono"><br><br>
        <input type="submit" value="Aggiungi Utente">
    </form>
    <br>
    <a href="index.php">Torna alla lista degli utenti</a>
</body>

</html>