<?php
if(!empty($_POST['nom']) && !empty($_POST['description']) && !empty($_POST['heure'])){

    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $heure = $_POST['heure'];
  
    //connexion à la base de données
  
    $connexion = mysqli_connect('localhost', 'root','', 'TODOLIST');
    if(!$connexion){
     die('Erreur de connexion à la Base de Donnée');
    }else{
        echo "ok";
    }
    $retour = "INSERT INTO to_do_list(nom,description,date)";
    $retour .= "VALUES ('$nom','$description','$heure')";

    $req = mysqli_query($connexion,$retour);
    if($req){
        echo "insertion valide ! ";
    }else{
        echo "erreur";
    }
    header('LOCATION:liste.php');
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        section{
            text-align: center;
            align-items: center;
        }
         h1{
            text-align: center;
            text-decoration: underline;
        }
        .container{
            width: 300px;
            height: 350px;
            background-color: aquamarine;
            margin: 0 auto;
            padding: 30px;
        }
        .container input{
            width: 200px;
            height: 30px;

        }
        button{
            width: 100px;
            height: 30px;
            background-color: aquamarine;
            border: 1px solid #fff;
        }
        button :hover{
            cursor: pointer;
        }
    </style>

</head>
<body>
    <h1>MES TÂCHES</h1>
    <section>
        <form action="" method="post">
            <a href="liste.php">liste des taches</a>
                <div class="container">
                    <h1>To Do List</h1>
                        <span>AjOUTER UNE TÂCHE</span><br><br>
                        
                        <input type="text" name="nom" id="nom" placeholder="nom de la tâche"><br><br>
                    
                        <input type="text" name="description" id="description" placeholder="description"><br><br>
                        
                        <input type="time" name="heure" id="heure"><br><br>
                        <button id="addToDo">+</button> 
                </div>
        </form>
      
       
    </section>
</body>
</html>