<?php	
	error_reporting(E_ALL);

	require_once 'exceptions/ValidationException.php';
	require_once 'exceptions/EmptyException.php';
	require_once 'exceptions/NumericException.php';
	require_once 'exceptions/EmailException.php';

	$User = trim($_POST['User'] ?? '');
	$Edad = trim($_POST['Age'] ?? '');
	$Email = trim($_POST['Email'] ?? '');

	$Errors = [];
	$Missatges = [];

	try {
		if (empty($User)) { throw new EmptyException("El nom d'usuari no pot ser buit"); }
		
		if (strlen($User) < 3) { throw new ValidationException( "El nom d'usuari ha de tenir almenys 3 caràcters"); }

		if (empty($Edad)) { throw new EmptyException( "La teva edad es buida"); }
		
		if(!filter_var($Edad, FILTER_VALIDATE_INT) || $Edad < 0) { throw new NumericException( "La teva edad ha de ser numérica i major que 0"); }
		
		if (empty($Email)) { throw new EmptyException( "La teva adreça de correu electrónica es buida"); }

		if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) { throw new EmailException( "La teva adreça de correu electrónica no és vàlida");}

		$Missatges[] = "El teu nom d'usuari és: " . htmlspecialchars($User);
		$Missatges[] = "La teva edad és: " . htmlspecialchars($Edad);
		$Missatges[] = "El teu email és: " . htmlspecialchars($Email);		
	}
	catch (ValidationException $e) {
		$Errors[] = $e->getMessage();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema-7_Level-1_ex-2</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
	<?php if (!empty($Errors)): ?>
		<div class="error">
			<?php foreach ($Errors as $error): ?>
				<p><?= htmlspecialchars($error) ?></p>
			<?php endforeach; ?>
		</div>
	<?php else: ?>
		<div class="correcte">
			<h2>Formulari correcte</h2>
			<?php foreach ($Missatges as $msg): ?>
				<p><?= $msg ?></p>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
	<a href="index.php">Tornar al formulari</a>

</body>
</html>