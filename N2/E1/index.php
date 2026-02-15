<!DOCTYPE html>
<?php
session_start();
$_SESSION["SessionVariable"] = "Variable de sessió definida a la pàgina index.php";
?> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema-7_Level-1_ex-2</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css" />
</head>
<body>
    <div>
        <h1>Errors i validacions nivell 2</h1>
        <!--
           Crea excepcions personalitzades per tractar els possibles errors que hi pugui haver en la validació del formulari de l'exercici anterior.
        -->

        <form method="POST" action="usuari.php">
            <fieldset>
                <legend>Identificat</legend>
                <label>Usuari</label>
                <input type="text" name="User" value="User" required><br>
                <label>Edad</label>
                <input type="number" name="Age" min="1" value="18" required><br>
                <label>Email</label>
                <input type="email" name="Email" value="mail@mail.es" required><br>
                <input type="submit" name="enviar" value="Enviar dades">
            </fieldset>
        </form>
        <?php
        ?>
    </div>
</body>
</html>