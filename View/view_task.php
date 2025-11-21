

<h3>Ajouter une tâche</h3>
<form action="" method="post">
  <label for="name">Nom de la tâche : </label><input id="name" type="text" name="name_task">
  <label for="content">Contenu de la tâche : </label><input id="content" type="text" name="content_task">
  <label for="date">Date de la tâche : </label><input id="date" type="date" name="date_task">
  <label for="category">Category tâche : </label><select name='category_task' id='category'>
    <option value="1">Cuisine</option>
    <option value="2">Formation</option>
    <option value="3">Projet personnel</option>
  <input type="submit" name="enregistrer_task" value="Ajouter tache">
</form>


<p> <?php echo $message ?></p>



