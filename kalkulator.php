<?php
session_start();
require_once "connect.php";
if(!isset($_SESSION['zalogowany']))
{
    header('Location: index.php');
    exit;
}

require_once "connect.php";

$login = $_SESSION['user'];

if(isset($_POST['prom']))

{
    $result = $_POST['result']; 
    $polaczenie->query("UPDATE kusers SET wynik = $result WHERE user = '$login'");
     echo "Pomyślnie przesłano wynik!";
}

?>


<!DOCTYPE HTML>
<html lang="pl">
    <head>  <meta http-equiv="X-UA-Compatible" contect="IE=edge,chrome=1" />
    <link rel="stylesheet" href="kalk.css" type="text/css"/>
        <meta charset="utf-8"/>
        <title> Kalkulator objetosci kuli</title>

        
</head>
<body>
    <div id="menu" style="text-align: right; font-size:35px;font-weight:700px;padding-right: 20px; color: lightgray;">
<?php

echo "<p>Witaj, ".$_SESSION['user']."!</p>"; 


?>
</div>
<div style="	width: 00px;
	background-color: #36b03c;
    text-align: right;
	font-size:20px;
	color: white;
    margin-left: 1000px;

	border: none;
	border-radius: 2px;
	cursor: pointer;
	letter-spacing: 2px;
	outline: none;
    ">
<form method="post" action="logout.php">
<input type="submit" value="Wyloguj" name="wyloguj"/>
</form>
</div>

<div id="kalkulator">

<style type="text/css">
#calculator {
    background: #eaeaea;
    margin: 0 auto;
    padding: 45px 25px 35px 25px;
    width: 400px;
    text-align: center;
}
</style>
<script>

    function Calculator(operator) 
{
    var prom = document.getElementById('prom').value;
    var b = (3.14);  
    var c = (1.25);
 
    switch(operator) 
    {
        case '+':
            var result = Math.round((parseFloat(c) * parseFloat(b) * parseFloat(prom) * parseFloat(prom) * parseFloat(prom))*10) / 10;         
        break;

    }
 
    document.getElementById('result').value = '= ' + result;
}
</script>
</head>
<body>
<form id="calculator" action="" method="post">
    <input type="number" id="prom" placeholder="Promień kuli" />
    <input type="text" id="pi" placeholder="π ~ 3,14" disabled="disabled" />
    <input type="text" name="result" id="result" placeholder="=" disabled="disabled" />
    <p><button type="button" onclick="Calculator(this.innerHTML)">+</button> </p>
</form>
</div>
<div id="wyjasnienie" style="
    margin-left: auto;
    margin-right: auto;
    padding-top: 15px;
    font-size: 20px;
    font-weight: 800px;
    background-color: #eaeaea;
    text-align: center;
    width: 450px;
    padding-bottom: 15px;
    text-decoration: none;
    text-decoration:none;
">
    <p>Jak obliczana jest objętość kuli?
    <p>Jest na to bardzo prosty wzór:
    <p>V= 4/3 * π * r<sup>3</sup>
    <p><input type="submit" class="btn btn-secondary ml-2" id="zapisz" value="Zapisz wynik"></p>
</div>
</body>
</html>