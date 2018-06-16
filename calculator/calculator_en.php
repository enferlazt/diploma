<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="/css/calculator.css">
<script type="text/javascript" src="/js/calculator.js"></script>
</head>
<body>
<div class="calculator">
<form action="" method="POST">
	<h4><p>Calculation of the maximum range of flight</p></h4>
	<select id="airplane" required>
		<option value="0" disabled selected>Select plane model:</option>
		<option value="1">Boeing 777</option>
		<option value="2">Airbus 320</option>
		<option value="3">Ту-214</option>
		<option value="4">Ан-148</option>
	</select>
	<button type="button" name="button" onclick="calculator_en();">OK</button>
	<div class="button_right"><button type="button" name="button" onclick="help_en();">Help</button></div>
	<div class="calc_text">
		<p>Enter the number of passengers (people):</p>
		<input id="pass" type="number" value=""><br/>
		<p>Enter the amount of fuel (kg):</p>
		<input id="fuel" type="number" value=""><br/>
	</div>
</form>
<div id="help"></div>
<div id="result"></div>
<form action="" method="POST">
	<input type="submit" name="close" value="Close">
</form>
</div>
<?php
if(isset($_POST['close']))
{
	return;
}
?>
</body>
</html>