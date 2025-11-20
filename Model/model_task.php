<?php
function addTask($bdd, $name, $content, $date){
try{
  $req = $bdd->prepare("INSERT INTO task (name_task, content_task, date_task, id_user) VALUES  (?,?,?,1)");

  $req->bindParam(1, $name, PDO::PARAM_STR);
  $req->bindParam(2, $content, PDO::PARAM_STR);
  $req->bindParam(3, $date, PDO::PARAM_STR);

  $req->execute();

  $data = $req->fetchAll();
  echo "Print_r(\$data) pour savoir ce qu'il y a dedans </br>";
  print_r($data);

  return $data;

  }catch(EXCEPTION $error){
                    die($error-getMessage());
                }

}









?>