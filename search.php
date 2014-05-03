<?php
	include 'connect.php';
	include 'portable-utf8.php';
?>

  <link rel="stylesheet" href="css/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  var isOpen = false;
  $(function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      resizable: false,
      position: { my: "top top", at: "right center" },
      show: {
        effect: "blind",
        duration: 500
      },
      hide: {
        effect: "fadeOut",
        duration: 500
      }
    });
 
    $( "#opener" ).click(function() {
    if(isOpen){
	$("#dialog").dialog("close");
	isOpen = false;
    }
    else{
      $("#dialog").dialog({width: window.innerWidth});
      $( "#dialog" ).dialog( "open" );
    isOpen = true;
    }
    });
  });
  </script> 

  <link rel=stylesheet href=css/form.css type=text/css>

  <div class = "form search-form">
        <form action="" name="searchForm" method="get">
            <input name="searchQuery" type="text" class="search-textbox" placeholder="Type to search" required>
		<div class="circle">
            <input type="submit" name="submit" value="" class="search-btn">
		</div>
        </form>
  </div>
  <div id="dialog" title="Keyboard">
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
	<button id=1 value=a class=button></button>
  </div>
 
  <button id="opener">Open Dialog</button>
<?php
	
	    function meaningSearch($queryString, $connect)
	    {
        	 $searchQuery = "SELECT * FROM translation WHERE text LIKE  '%$queryString%' AND language_id=13";
		
         	  if ($search = mysqli_query($connect, $searchQuery)) {
        	    while ($english = $search->fetch_assoc()) {	    
		        $scripture_id = $english["scripture_id"];
		        $scriptureQuery = "select * FROM scripture WHERE id = $scripture_id";		    
		        $scriptureResult = mysqli_query($connect, $scriptureQuery);
		        $punjabi = $scriptureResult->fetch_array(MYSQLI_BOTH);
		        
		        echo "<div class=hymn>";
		        
		        echo "<div class=punjabi>";	
		        echo $punjabi["scripture"]; 
               		echo "</div>";
                
	                echo "<div class=english>";
        	        echo $english["text"];
                	echo "</div>";
                
	                echo "</div>";
                     }
      		   }
	      }

	      function scriptureSearch($queryString, $connect){
	   	 $queryArray = utf8_split($queryString);
		 
		 $totalAlphabets = count($queryArray);
		 $counter = 0;

		 $searchQuery = "SELECT * FROM `scripture`  WHERE CONCAT(' ', REPLACE(`Scripture`, ',', ' ')) RLIKE '";
		
		 while($counter < ($totalAlphabets-1)){
			$searchQuery = $searchQuery.$queryArray[$counter]."[[:alpha:]]* +";
			$counter = $counter + 1;
		}
		$searchQuery = $searchQuery.$queryArray[$totalAlphabets-1]."'";

         	if ($search = mysqli_query($connect, $searchQuery)) {
        	    while ($punjabi = $search->fetch_assoc()) {	    
		        $scripture_id = $punjabi["id"];
		        $englishQuery = "select * FROM translation WHERE scripture_id = $scripture_id AND language_id = 13";
		        $englishResult = mysqli_query($connect, $englishQuery);
		        $english = $englishResult->fetch_array(MYSQLI_BOTH);
		        
		        echo "<div class=hymn>";
		        
		        echo "<div class=punjabi>";	
		        echo $punjabi["scripture"]; 
               		echo "</div>";
                
	                echo "<div class=english>";
        	        echo $english["text"];
                	echo "</div>";
                
	                echo "</div>";
                     }
      		   }
	  }
         if(isset($_GET['submit'])){
	   $queryString = $_GET['searchQuery'];
	   scriptureSearch($queryString, $connect);
	  // meaningSearch($queryString, $connect);
		   
        }
?>
