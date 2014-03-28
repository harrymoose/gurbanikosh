<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Japji Sahib</title>
	<<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<?php
	    include 'connect.php';
	    include 'query.php';
	    
	    echo "<div class=scripture>";
	    foreach($connect->query($japjiSahib) as $hymn){
		 echo "<div class = hymn>";
		 echo $hymn['scripture'];
		 echo "</div>";
		}
	    echo "</div>";
	    
	    
	    
	?>
</body>
</html>
