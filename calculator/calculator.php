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
	<h4><p>Расчет максимальной дальности полета</p></h4>
	<select id="airplane" required>
		<option value="0" disabled selected>Выберите модель самолета:</option>
		<option value="1">Boeing 777</option>
		<option value="2">Airbus 320</option>
		<option value="3">Ту-214</option>
		<option value="4">Ан-148</option>
	</select>
	<button type="button" name="button" onclick="calculator();">OK</button>
	<div class="button_right"><button type="button" name="button" onclick="help();">Справка</button></div>
	<div class="calc_text">
		<p>Введите количество пассажиров(чел.):</p>
		<input id="pass" type="number" value=""><br/>
		<p>Введите количество топлива(кг):</p>
		<input id="fuel" type="number" value=""><br/>
	</div>
</form>
<div id="help"></div>
<div id="result"></div>
<form action="" method="POST">
	<input type="submit" name="close" value="Закрыть">
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