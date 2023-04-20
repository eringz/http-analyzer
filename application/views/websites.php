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
	<style>
			div#contents{
				text-align: start;
                height: 500px;
                overflow-x: hidden;
                overflow-y: auto;
            }
	</style>
	<script>
		$(document).ready(function(){
			$('form').submit(function(){
				$.get($(this).attr('action'), $(this).serialize(), function(res){
					// console.log('result: ' + res.data);

					//codes for analyzing the http response - probably anywhere from 10-20 lines of code
					
					//codes for putting together the html - probably anywhere from 20-40 lines of code
					let http_response = `<h2>HTTP response:</h2>`;
					http_response += `<div id="contents"> ${res.data}</div>`;
					console.log(http_response);
					//codes for updating the html - probably a few lines	
					document.getElementById('http-response').innerHTML = http_response;

				}, 'json');
				return false;
			});
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
	<div id="result">
		<div id="tags-analyzer">
			<h1>HTML tags analyzer</h1>
			<table>
				<tr>
					<th>HTML tags</th>
					<th>number of apperances</th>
				</tr>
				<tr>
					<td>meta</td>
					<td>7</td>
				</tr>
				<tr>
					<td>div</td>
					<td>145</td>
				</tr>
				<tr>
					<td>p</td>
					<td>35</td>
				</tr>
				<tr>
					<td>a</td>
					<td>25</td>
				</tr>
				<tr>
					<td>img</td>
					<td>10</td>
				</tr>
				<tr>
					<td>li</td>
					<td>25</td>
				</tr>
				<tr>
					<td>h1</td>
					<td>2</td>
				</tr>
				<tr>
					<td>h2</td>
					<td>1</td>
				</tr>
				<tr>
					<td>h3</td>
					<td>0</td>
				</tr>
			</table>
		</div>
		<div id="http-response">
			
		</div>
	</div>
</body>
</html>