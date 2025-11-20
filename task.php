<?php
<?php
//Démarrer la session
session_start();

//IMPORT DE RESSOURCE
include './Model/model_user.php';

if(isset($_POST['enregistrer_task'])){
    //Etape de Sécurité 1 : Vérifier les champs vides
    if(!empty($_POST['name_task']) && !empty($_POST['content_task']) && !empty($_POST['date_task'])){
        //Etape de Sécurité 2 : Vérifier le Format -> aucun format à vérifier ici sauf utilisé une Regex
        //Etape de Sécurité 3 : Nettoyage des données
        $name_task = htmlentities(stripslashes(strip_tags(trim($_POST['name_task']))));
        $content_task = htmlentities(strislashes(strip_tags(trim($_POST['content_task']))));
        $date_task = htmlentities(stripslashes(strip_tags(trim($_POST['date_task']))));
        

        //Créer l'objet de connexion PDO
        $bdd = new PDO('mysql:host=localhost;dbname=task','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //Try...catch pour communiquer avec la BDD :
        $data = addTask($bdd, $name, $content, $date);

        echo "Print_r(\$data) pour savoir ce qu'il y a dedans </br>";
        print_r($data);

        if(!empty($data)){
            //$data non vide, donc je reçois le compte de l'utilisateur
            //Vérifier la correspondancedes mots de psse : password_verify()
            if(password_verify($password, $data['password_user'])){
                //Je connecte l'utilisateur en remplissant la superglobal $_SESSION
                $_SESSION = [
                        'id' => $data['id_user'],
                        'nickname' => $data['nickname_user'],
                        'email' => $data['email_user'],
                        'role' => $data['role']
                ];

                //J'affiche le message de confirmation
                $messageCo = "{$_SESSION['nickname']} est connecté";

            }else{
                $messageCo = "Problème de Login et/ou Mot de Passe";
            }
        }else{
            //$data vide -> l'utilisateur n'existe pas -> message d'erreur
            $messageCo = "Problème de Login et/ou Mot de Passe";
        }

        

    }else{
        $messageCo = "Veuillez remplir tous les champs !";
    }

}
?>