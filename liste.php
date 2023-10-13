<?php
    //connexion à la base de données
    $connexion = mysqli_connect('localhost', 'root','', 'TODOLIST');
    if(!$connexion){
     die('Erreur de connexion à la Base de Donnée');
    }
    
    $pt = "SELECT * FROM to_do_list ";
    $transh = mysqli_query($connexion,$pt);
    $query = mysqli_fetch_all($transh,MYSQLI_ASSOC);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

            .table{
                padding-top: 100px;
                display: flex;
                justify-content: center;
            }
            table{
            
                border-collapse: collapse;

            }
            th,td{
                border: 1px solid black;
                padding: 10px;
            }

    </style>
</head>
<body>
   
<section class="table">
    
        <div class="teleau">
        <h1>LISTE DE MES TÂCHES</h1>
            <table class="tableau">
                <thead>
                    <tr>
                        <th>Tâche </th>
                        <th>Description</th>   
                        <th colspan="3">Actions</th> 
                                          
                    </tr>
                </thead>
               <tbody>
               <?php foreach($query as $value) :
            
          ?>
       
                    <tr>
                        <td><?php echo $value['nom'];?></td>
                        <td><?php  echo $value['description']  ?></td> 
                         <td><a href="modifier.php?id=<?php echo $value['id']; ?>">Modifier</a></td>
                        <td><a href="supprimer.php?id=<?php echo $value['id']; ?>">Supprimer</a></td>  
                        <td><a href=""><a href="">Effectué</a></td>  
                         
                     </tr>
                     <?php endforeach;  ?>
                </tbody> 
                <thead>
                    <tr>
                               
                    </tr>
                </thead> 
              
            </table>

</body>
</html>