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
    $id=$_REQUEST["id"];
    ?>

<?php
$host = 'localhost';
$dbname = 'dev109';
$username = 'root';
$password = '';
try {
$connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$statement = $connexion->prepare("select * from  users where id=?");
$statement->bindParam(1,$id);
$statement->execute();
$ligne=$statement->fetch();

$email=$ligne["email"];
$age=$ligne["age"];
$pass=$ligne["pass"];
}
catch(Exception $e)
{
echo $e->getMessage();
}
?>


<h1>Modification de l'utilisateur <?=$id?></h1>
    <form action="#" method="post">
    id : <input type="text" name="id" required disabled value="<?=$id?>"/><br/>
    email : <input type="text" name="email" required value="<?=$email?>"/><br/>
    age : <input type="number" name="age" value="<?=$age?>"/><br/>
    password : <input type="text" name="password" required min="4" max="4" value="<?=$pass?>"/><br/>
    <input type="submit" value="Enregistrer" name="submit"/><br/>
    </form>

<?php
if(isset($_POST["submit"]))
{
    
    $email=$_POST["email"];
    $age=$_POST["age"];
    $motdepasse=$_POST["password"];

try {
    
    $statement = $connexion->prepare("update users set email=?,pass=?,age=? where id=?");
    $statement->bindParam(1,$email,PDO::PARAM_STR);
    $statement->bindParam(2,$motdepasse,PDO::PARAM_STR);
    $statement->bindParam(3,$age,PDO::PARAM_INT);
    $statement->bindParam(4,$id,PDO::PARAM_INT);
    $statement->execute();
    echo("<hr><span style='color:green;'>User bien Modifié</span><hr>");
    }
    catch (Exception $e) {
    echo("<hr><div style='color:red;'>impossible de modifier cet User<br>");
    echo($e->getMessage()."</div><hr>");
    }
}
?>

</body>
</html>