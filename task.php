<?php

//Démarrer la session
session_start();

//IMPORT DE RESSOURCE
include './Model/model_task.php';
$title = "Mes tâches";
$message = '';

if(isset($_POST['enregistrer_task'])){
    //Etape de Sécurité 1 : Vérifier les champs vides
    $message1='if 1 ok';     
    if(!empty($_POST['name_task']) && !empty($_POST['content_task']) && !empty($_POST['date_task'])){
        //Etape de Sécurité 2 : Vérifier le Format de la date -> aucun format à vérifier ici sauf utilisé une Regex
        //Etape de Sécurité 3 : Nettoyage des données
        $name_task = htmlentities(stripslashes(strip_tags(trim($_POST['name_task']))));
        $content_task = htmlentities(stripslashes(strip_tags(trim($_POST['content_task']))));
        $date_task = htmlentities(stripslashes(strip_tags(trim($_POST['date_task']))));
        $category_task = htmlentities(stripslashes(strip_tags(trim($_POST['category_task']))));

        //Création de l'objet de connexion
        $bdd = new PDO('mysql:host=localhost;dbname=task','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        
        // Appel de la fonction pour enregistrer la tâche
        $data_task = createTask($bdd, $name_task, $content_task, $date_task, $_SESSION['id']);

        //$data_category = addCategoryToTask($bdd, $data_task['task_id'], $category_task);

        $message = $data_task['message_task'];


    } else {
        $message = "Veuillez remplir tous les champs !";
        
    }
}
        

include './View/header.php';
include './View/view_task.php';
include './View/footer.php';
?>