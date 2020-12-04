<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<?php
session_start();
// Start the session;
$servername = "localhost";
$username = "root";
$password = "";
$database = "pr11"; //повинна бути створена в субд

$target_dir = "public/images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
    	$uploadOk = 1;
	} else {
        echo "File is not an image.";
    	$uploadOk = 0;
	}
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
	$uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
	$uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	
			$conn = new mysqli($servername, $username, $password, $database);
			
			$sql = "INSERT INTO users (first_name, last_name, login, password, img) VALUES ('".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['login']."', '".$_POST['password']."', 
							'".$target_dir . basename($_FILES["fileToUpload"]["name"])."')";
			if(mysqli_query($conn, $sql))
			{
				header('Location: newTable.php');
			}
			else
			{
				echo'
				<form action="index.php" method="post">
			       <input type="submit" value="Error(" class="btn">
			   </form>';
			}
		}
	else {
        echo "Sorry, there was an error uploading your file.";
	}
}

?>