<?php	
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ajax Example</title>
	<link rel="stylesheet" href="assets/stylesheet/style.css">
</head>
<body>
	<div id="container">
		<form action="">
			<label for="url">URL to fetch by Ajax:</label>
			<input type="text" id="url" placeholder="Enter a URL">
			<input type="submit" id="submit" value="Fetch">
		</form>
	</div>
	<div id="result"></div>
</body>
</html>