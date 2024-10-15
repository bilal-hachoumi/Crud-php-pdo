<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Création d'un nouvel utilisateur</h1>
    <form action="#" method="post">
    email : <input type="text" name="email" required/><br/>
    age : <input type="number" name="age"/><br/>
    password : <input type="password" name="password" required min="4" max="4"/><br/>
    <input type="submit" value="Enregistrer" name="submit"/><br/>
    </form>
<?php
if(isset($_POST["submit"]))
{

    $email=$_POST["email"];
    $age=$_POST["age"];
    $motdepasse=$_POST["password"];


$host = 'localhost';
$dbname = 'dev109';
$username = 'root';
$password = '';
try {
$connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$statement = $connexion->prepare("INSERT INTO users(email,pass,age) VALUES(?,?,?)");
$statement->bindParam(1,$email,PDO::PARAM_STR);
$statement->bindParam(2,$motdepasse,PDO::PARAM_STR);
$statement->bindParam(3,$age,PDO::PARAM_INT);
$statement->execute();
echo("<hr><span style='color:green;'>User bien enregitré</span><hr>");
}
catch (Exception $e) {
echo("<hr><div style='color:red;'>impossible d'ajouter cet User<br>");
echo($e->getMessage()."</div><hr>");
}

}
?>
<a href="indexCRUD.html">Accueil CRUD</a>
</body>
</html>