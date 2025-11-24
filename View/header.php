<!DOCTYPE html>
<html lang="en">
<head>
    

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.php">Accueil General</a></li>
                <?php 
                    switch($title){
                        case 'Mon Compte Utilisateur' :
                            echo "<li><a href='./index.php'>Accueil TODO LIST</a></li>";
                            break;
                        case 'accueil TODO LIST' :
                            echo "<li><a href='./info.php'>Vos Infos</a></li>";
                            break;
                        case 'Mes tâches' :
                            echo "<li><a href='./task.php'>Mes tâches</a></li>";
                            
                        }
                    if(isset($_SESSION['nickname'])){
                        // Lien pour se déconnecter
                        echo "<li><a href='./deco.php'>Se Deconnecter</a></li>";
                        // Lien vers task.php
                        echo "<li><a href='./task.php'>Mes Tâches</a></li>";
                    
                    }
                    
                ?>
                
            </ul>
        </nav>
            <?php
                if(isset($_SESSION['nickname'])){
                    echo "<span>Vous êtes : {$_SESSION['nickname']}</span>";
                }
            ?>
    </header>
    <main>

 