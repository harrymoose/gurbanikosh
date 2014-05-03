<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Japji Sahib</title>
	<link rel = "Stylesheet" href="css/main.css" type="text/css">
</head>
<body class= "body">
<?php
	include 'connect.php';
	include 'nav.php';
?>


	<h1>japji Sahib</h1>
	<p>Song of the soul</p>

<?php
	$querySahib = "select * from scripture where section = 'Jap Ji Sahib (Song Of The Soul)'";
	if($queryResult = mysqli_query($connect, $querySahib)){
		while($japjiSahib = $queryResult->fetch_assoc()){
			echo "<div>";
			echo $japjiSahib['scripture'];
			echo "</div>";
		}
	}
	
?>

</body>
</html>
