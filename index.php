<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <style>
       .container {
           width: 400px;
       }
   </style>
</head>
<body style="padding-top: 3rem;">

<div class="container">
   <form action="upload.php" method="post" enctype="multipart/form-data">
	Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
	First_name: <input type="text" name="first_name"></br>
		Last_name: <input type="text" name="last_name"></br>
       Login: <input type="text" name="login"><br>
       Password: <input type="password" name="password"><br>
	<input type="submit" value="Register" class="btn">
	</form>
</div>

</body>
</html>
