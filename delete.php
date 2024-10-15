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

    $host = 'localhost';
    $dbname = 'dev109';
    $username = 'root';
    $password = '';
    try {
    $connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $statement = $connexion->prepare("DELETE from users where id=?");
    $statement->bindParam(1,$id);
    
    $statement->execute();
    echo("<hr><span style='color:green;'>User bien supprimé</span><hr>");
    }
    catch (Exception $e) {
    echo("<hr><div style='color:red;'>impossible de supprimer cet User<br>");
    echo($e->getMessage()."</div><hr>");
    }

    ?>

<a href="indexCRUD.html">Accueil CRUD</a>
</body>
</html>