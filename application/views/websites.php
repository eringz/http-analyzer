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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			
		});
	</script>
</head>
<body>
	<div id="container">
		<form action="websites/analyze" method="GET">
			<label for="url">URL to fetch by Ajax:</label>
			<input type="text"  name="url" id="url" placeholder="Enter a URL">
			<input type="submit" id="submit" value="Fetch">
		</form>
	</div>
	<div id="result"></div>
</body>
</html>