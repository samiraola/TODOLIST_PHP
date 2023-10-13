<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    

    $connexion = mysqli_connect('localhost', 'root', '', 'TODOLIST');
    if(!$connexion){
        die('Erreur de connexion à la Base de Données');
    }
    

    $requete = "SELECT * FROM to_do_list WHERE id = $id";
    $resultat = mysqli_query($connexion, $requete);
    
    if($resultat){
        $tabInfo = mysqli_fetch_all($resultat,MYSQLI_ASSOC);
       
    } else {
        echo "Aucune tâche trouvée avec cet ID.";
    }
} else {
    echo "L'ID n'a pas été spécifié dans la requête GET.";
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
<h1>To Do List</h1>
    <section>
        <form action="traitement_modifier.php" method="POST">
         
            <div class="container">
                   
                        <span>Modifier la tâche</span><br><br>
                        
                        <input type="text" name="nom" id="nom" placeholder="nom de la tâche" value="<?php echo $tabInfo['nom']; ?>"><br><br> 
                    
                        <input type="text" name="description" id="description" placeholder="description" value="<?php echo $tabInfo['description']; ?>"><br><br>
                        
                        
                        <input type="submit" value="Modifier">
                </div>
    
            </form>
            </section>        
</body>
</html>