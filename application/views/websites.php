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
                overflow: auto;
            }
	</style>
	<script>
		$(document).ready(function(){
			$('form').submit(function(){
				$.get($(this).attr('action'), $(this).serialize(), function(res){
					
					//codes for putting together the html - probably anywhere from 20-40 lines of code
					//html concatination for http tags analyzer
					let http_tags = `<h1>HTML tags analyzer</h1>
									<table>
										<tr>
											<th>HTML tags</th>
											<th>number of apperances</th>
										</tr>`;

					for(let i = 0; i<res.tags.length; i++){
						console.log('result: ' + res.tags[i].tag);
						http_tags += `<tr>
											<td>${res.tags[i].tag}</td>
											<td>${res.tags[i].count}</td>
									  </tr>`
					}
					http_tags += `</table>`

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