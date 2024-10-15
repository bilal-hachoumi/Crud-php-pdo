<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
$host = 'localhost';
$dbname = 'dev109';
$username = 'root';
$password = '';
try {
$connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
echo "Vous êtes maintenant connecté à $dbname sur $host.";
}
catch (PDOException $e) {
die("Impossible de se connecter à la base de donnée $dbname :" . $e->getMessage());
}

?>
<br>
<a href="indexCRUD.html">TP CRUD</a>
</body>
</html>