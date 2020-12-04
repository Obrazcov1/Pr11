<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pr11"; //повинна бути створена в субд

// Встановлення з'єднання 
$conn = new mysqli($servername, $username, $password, $database);

echo '<table border="1" cellpadding="6" cellspacing="0" align="center">';
echo	"<tr><td>ID</td>
	<td>fisrt_name</td>
	<td>last_name</td>
	<td>password</td>
	<td>login</td>
	<td>img</td></tr>
	";
	$res = mysqli_query ($conn, "select * from users");
    // output data of each row
		while($row = $res->fetch_assoc()) 
		{
		echo "<tr>
		<td>".$row['id']."</td>
		<td>".$row['first_name']."</td>
		<td>".$row['last_name']."</td>
		<td>".$row['password']."</td>
		<td>".$row['login']."</td>
		<td> <img src='".$row['img']."'/></td>
		</tr>";
    }
	echo "</table>";	
?>
