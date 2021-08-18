<header>
    <h1>Mythologie Grecque</h1>
    <nav>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page"
                <?php
                if(basename($_SERVER['PHP_SELF'])!="index.php"){
                    echo "href='../index.php'";
                }else{
                    echo "href='#'";
                }
                ?>
                >Accueil</a>
            </li>
            <?php

            // Lien ajout article

            if(!empty($_SESSION["role"])){
                if($_SESSION["role"]==3){
                    if(basename($_SERVER['PHP_SELF'])!="add_article.php"){
                        if(dirname($_SERVER['PHP_SELF'])=="/EvalPHP/articles"){
                            echo "<li class='nav-item'><a class='nav-link' href='add_article.php'>Ajouter un article</a></li>";
                        }elseif(dirname($_SERVER['PHP_SELF'])=="/EvalPHP"){
                            echo "<li class='nav-item'><a class='nav-link' href='articles/add_article.php'>Ajouter un article</a></li>";
                        }
                    }else{
                        echo "<li class='nav-item'><a class='nav-link' href='#'>Ajouter un article</a></li>";
                    }
                }
            }
            else if(!empty($_COOKIE["role"])){
                if($_COOKIE["role"]==3){
                    if(basename($_SERVER['PHP_SELF'])!="add_article.php"){
                        if(dirname($_SERVER['PHP_SELF'])=="/EvalPHP/articles"){
                            echo "<li class='nav-item'><a class='nav-link' href='add_article.php'>Ajouter un article</a></li>";
                        }elseif(dirname($_SERVER['PHP_SELF'])=="/EvalPHP"){
                            echo "<li class='nav-item'><a class='nav-link' href='articles/add_article.php'>Ajouter un article</a></li>";
                        }
                    }else{
                        echo "<li class='nav-item'><a class='nav-link' href='#'>Ajouter un article</a></li>";
                    }
                }
            }

            // Lien inscription

            if(empty($_SESSION["pseudo"]) && empty($_COOKIE["pseudo"])){
                if(dirname($_SERVER['PHP_SELF'])!=="/EvalPHP"){
                    if(basename($_SERVER['PHP_SELF'])=="register.php"){
                        echo "<li class='nav-item'><a class='nav-link' href='#'>S'inscrire</a></li>";
                    }else{
                        echo "<li class='nav-item'><a class='nav-link' href='../accountManagement/register.php'>S'inscrire</a></li>";
                    }
                }else{
                    echo "<li class='nav-item'><a class='nav-link' href='accountManagement/register.php'>S'inscrire</a></li>";
                }
            }

            // Lien connexion

            if(empty($_SESSION["pseudo"]) && empty($_COOKIE["pseudo"])){
                if(dirname($_SERVER['PHP_SELF'])!=="/EvalPHP"){
                    if(basename($_SERVER['PHP_SELF'])=="connexion.php"){
                        echo "<li class='nav-item'><a class='nav-link' href='#'>Connexion</a></li>";
                    }else{
                        echo "<li class='nav-item'><a class='nav-link' href='../accountManagement/connexion.php'>Connexion</a></li>";
                    }
                }else{
                    echo "<li class='nav-item'><a class='nav-link' href='accountManagement/connexion.php'>Connexion</a></li>";
                }
            }

            // Lien déconnexion

            if(!empty($_SESSION["pseudo"]) || !empty($_COOKIE["pseudo"])){
                if(dirname($_SERVER['PHP_SELF'])=="/EvalPHP/articles"){
                    echo "<li class='nav-item'><a class='nav-link' href='../treatment/deconnexionTreatment.php'>Déconnexion</a></li>";
                }else{
                    echo "<li class='nav-item'><a class='nav-link' href='treatment/deconnexionTreatment.php'>Déconnexion</a></li>";
                }
            }
            ?>
        </ul>
    </nav>
</header>
