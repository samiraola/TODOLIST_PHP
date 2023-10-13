<?php
    // Vérifie si la variable $id est définie
    if(isset($_GET['id'])){
        // Récupère la valeur de l'ID depuis la requête GET
        $id = $_GET['id'];

        // Connexion à la base de données
        $connexion = mysqli_connect('localhost', 'root', '', 'TODOLIST');
        if(!$connexion){
            die('Erreur de connexion à la Base de Données');
        }
        
        // Utilise une requête DELETE sans l'étoile (*) pour supprimer une ligne
        $supp = "DELETE FROM to_do_list WHERE id = $id";
        
        if(mysqli_query($connexion, $supp)){
            echo "La tâche a été supprimée avec succès.";
        } else {
            echo "Erreur lors de la suppression de la tâche : " . mysqli_error($connexion);
        }
        
        // Ferme la connexion à la base de données
        mysqli_close($connexion);
    } else {
        echo "L'ID n'a pas été spécifié dans la requête GET.";
    }

?>
