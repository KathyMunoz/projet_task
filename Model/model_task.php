<?php
function createTask($bdd, $name, $content, $date, $id_user){
try{
  $req = $bdd->prepare("INSERT INTO task (name_task, content_task, date_task, id_user) VALUES  (?,?,?,?)");

  $req->bindParam(1, $name, PDO::PARAM_STR);
  $req->bindParam(2, $content, PDO::PARAM_STR);
  $req->bindParam(3, $date, PDO::PARAM_STR);
  $req->bindParam(4, $id_user, PDO::PARAM_INT);
  
  // $req : INSERT INTO task (name_task, content_task, date_task, id_user) VALUES ('ma tache', 'mon detail', '01/01/2026', 2)

  $req->execute(); // j'ai "executé" ma requête en base de donnée
  $data = $req->fetchAll();

  // Pour remplir task_category il nous faut le id_task de la tâche qu'on vient d'inserer. On peut l'avoir à l'aide de $bdd->lastInsertId()
  $task_id = $bdd->lastInsertId();//lastInsertId() ça retourne la clé primaire de la derniere requete inserer
  $message = "La tâche a bien été enregistrée !";

    return ['task_id' => $task_id, 'message_task' => $message];
  }catch(EXCEPTION $error){
                    die($error->getMessage());
                }
}

function addCategoryToTask($bdd, $id_task, $id_category){
  try{
    $req = $bdd->prepare("INSERT INTO task_category (id_task, id_category) VALUES  (?,?)");
  
    $req->bindParam(1, $id_task, PDO::PARAM_INT);
    $req->bindParam(2, $id_category, PDO::PARAM_INT);
      
    $req->execute(); 
    $data = $req->fetchAll();
  
    $message = "La tâche a bien été liée à sa catégorie !";
  
      return ['data' => $data, 'message_category' => $message];
    }catch(EXCEPTION $error){
                      die($error->getMessage());
                  }
  }

?>