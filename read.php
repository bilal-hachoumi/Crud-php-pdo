<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Liste des utilisateurs</h2>
<form action="#" method="post">
afficher les users ayant l'age > <input type="number" name="ageparam"/>
<input type="submit" value="Rechercher"/>
</form>

<?php
$host = 'localhost';
$dbname = 'dev109';
$username = 'root';
$password = '';
try {
    
$connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
if (isset($_REQUEST["ageparam"]))
{
$statement = $connexion->prepare("select * from  users where age>?");
$statement->bindParam(1,$_REQUEST["ageparam"]);
}
else
$statement = $connexion->prepare("select * from  users");
$statement->execute();
$data=$statement->fetchAll();
}
catch(Exception $e)
{
echo $e->getMessage();
}
?>

<table border="1">
    <thead>
    <tr>
        <td>ID</td>
        <td>EMAIL</td>
        <td>PASSWORD</td>
        <td>AGE</td>
        <td>actions</td>
    </tr>
    </thead>
    <tbody>
        <?php
        foreach($data as $ligne)
   echo "<tr><td>".$ligne["id"]."</td><td>".$ligne["email"]."</td><td>".$ligne["pass"]."</td><td>".$ligne["age"]."</td><td><a style='margin-right:5px;' href='delete.php?id=".$ligne["id"]."'>Supprimer</a><a href='update.php?id=".$ligne["id"]."'>Modifier</a></td></tr>";
    ?>
    </tbody>
</table>


</body>
</html>