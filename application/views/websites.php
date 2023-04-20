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
					
					//codes for analyzing the http response - probably anywhere from 10-20 lines of code
					console.log('result: ' + res.div);

					//codes for putting together the html - probably anywhere from 20-40 lines of code
					//html concatination for html tags analyzer
					let http_tags = `<h1>HTML tags analyzer</h1>
									<table>
										<tr>
											<th>HTML tags</th>
											<th>number of apperances</th>
										</tr>
										<tr>
											<td>meta</td>
											<td>${res.meta}</td>
										</tr>
										<tr>
											<td>div</td>
											<td>${res.div}</td>
										</tr>
										<tr>
											<td>p</td>
											<td>${res.p}</td>
										</tr>
										<tr>
											<td>a</td>
											<td>${res.a}</td>
										</tr>
										<tr>
											<td>img</td>
											<td>${res.img}</td>
										</tr>
										<tr>
											<td>li</td>
											<td>${res.li}</td>
										</tr>
										<tr>
											<td>h1</td>
											<td>${res.h1}</td>
										</tr>
										<tr>
											<td>h2</td>
											<td>${res.h2}</td>
										</tr>
										<tr>
											<td>h3</td>
											<td>${res.h3}</td>
										</tr>
									</table>`

					//html concatination for http response
					let http_response = `<h2>HTTP response:</h2>`;
					http_response += `<div id="contents"> ${res.data}</div>`;

					//codes for updating the html - probably a few lines	
					document.getElementById('tags-analyzer').innerHTML = http_tags;
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
			
		</div>
		<div id="http-response">
			
		</div>
	</div>
</body>
</html>