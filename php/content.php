<?php
	$host = "localhost";
     	$user = "Username";
	$password = "password";
	$dbname = "DBName";
		
	$dbc = mysqli_connect($host, $user, $password, $dbname);
		
	if(mysqli_connect_errno()){
		echo '<article class="first">
            <p>ERROR! Content could not be loaded!</p>
        </article>';
	}  

    	$sql = "SELECT * FROM Posts ORDER BY PostID DESC LIMIT 0, 4";
    	$result = mysqli_query($dbc, $sql);
    	$count = 1;
    	echo "<table>";
    	if($result->num_rows > 0){
         	while($row = $result->fetch_assoc()) {
             	if($count == 1){
                	echo '<article class="first">';
                	$count = 2;
             	}else
             	{
                	echo '<article>';
             	}
            
            	echo '<div class="artHeader">';
            	echo '<h3>';
            	echo $row["Name"];
            	echo '    Author: ';
            	echo $row["Author"];
            	echo '</h3>';
            	echo'</div>';
            	echo $row["Text"];
            	echo '</article>';
        	}
    	}else {
        	echo "no result";
    	}

	$dbc->close();
?>