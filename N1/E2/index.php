<!DOCTYPE html>
<?php
session_start(); 
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
        <h1>Errors i validacions nivell 1</h1>
        <!--
           Recorda l'exercici 1 del nivell 1 del tema 6(PHP Avançat).

            Programa en PHP diverses normes de validació pels camps del formulari. 
            Com per exemple que el camp no sigui buit o que compleixi determinades circumstàncies simples com ser un nombre en cas de ser un camp numèric.
        -->
<?php $_SESSION["SessionVariable"] = "Variable de sessió definida a la pàgina index.php"; ?>
        <form method="POST" action="usuari.php">
            <fieldset>
                <legend>Identificat</legend>
                <label>Usuari</label>
                <input type="text" name="User" value="User"><br>
                <label>Edad</label>
                <input type="integer" name="Age" value="18"><br>
                <label>Email</label>
                <input type="text" name="Email" value="mail@mail.es"><br>
                <input type="submit" name="enviar" value="Enviar dades">
            </fieldset>
        </form>
        <?php
        ?>
    </div>
</body>
</html>