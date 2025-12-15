<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="styles/styles.css" />
</head>
<?php	
error_reporting(E_ALL);

	$User = $_POST['User'];
	$Edad = $_POST['Age'];
	$Email = $_POST['Email'];

	$Missatges = [];

	class EmptyException extends Exception { }
	class NumericException extends Exception { }
	class EmailException extends Exception { }

	try {
		if (IsEmpty($User)) { throw new EmptyException("El nom d'usuari no pot ser buit"); }
		else { $Missatges[] = "El teu nom és: '$User'"; }

		if (IsEmpty($Edad)) { throw new EmptyException( "La teva edad es buida"); }
		elseif(!is_numeric($Edad)) { throw new NumericException( "La teva edad ha de ser numérica"); }
		else { $Missatges[] =  "La teva edad és: '$Edad'";	}

		if (IsEmpty($Email)) { throw new EmptyException( "La teva adreça de correu electrónica es buida"); }
		elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) { throw new EmailException( "La teva adreça de correu electrónica no és vàlida");}
		else { $Missatges[] =  "La teva direcció de correu electrónica és: '$Email'";	}	
	}
	catch (EmptyException $e) {
		echo "<div class='error'>Error de cadena buida:<br> " .$e->getMessage()."<br></div>";
		exit();
	}
	catch (NumericException $e) {
		echo "<div class='error'>Error d'edad no numérica:<br> " .$e->getMessage()."<br></div>";
		exit();
	}
	catch (EmailException $e) {
		echo "<div class='error'>Error d'email no vàlid:<br> " .$e->getMessage()."<br></div>";
		exit();
	}
	catch (Exception $e) {
		echo "<div class='error'>Error:<br> " .$e->getMessage()."<br></div>";
		exit();
	}
	echo "<div class='correcte'>Formulari correcte:</div><br>";
	foreach ($Missatges as $missatge){
		echo $missatge."<br>";
	}

	function IsEmpty($dade):bool{
		if($dade=='') return TRUE;
		else return FALSE;
	}	
?>