<!-- Code header menu déroulant -->
echo "<li class='nav-item dropdown'>
<a class='nav-link dropdown-toggle' data-bs-toggle='dropdown' href='#' role='button' aria-expanded='false'>Articles</a>
<ul class='dropdown-menu'>";
?>
<li>
    <a class='dropdown-item'
    <?php
    if(basename($_SERVER['PHP_SELF'])!="ceciEstUnTest.php"){
        if(dirname($_SERVER['PHP_SELF'])=="/EvalPHP/articles"){
            echo "href='ceciEstUnTest.php'";
        }else{
            echo "href='articles/ceciEstUnTest.php'";
        } 
    }else{
        echo "href='#'";
    }
    ?>
    >Ceci est un test</a>
</li>
<li>
    <a class='dropdown-item'
    <?php
    if(basename($_SERVER['PHP_SELF'])!="deuxiemeArticle.php"){
        if(dirname($_SERVER['PHP_SELF'])=="/EvalPHP/articles"){
            echo "href='deuxiemeArticle.php'";
        }else{
            echo "href='articles/deuxiemeArticle.php'";
        } 
    }else{
        echo "href='#'";
    }
    ?>
    >Deuxième article</a>
</li>
<li>
    <a class='dropdown-item'
    <?php
    if(basename($_SERVER['PHP_SELF'])!="troisiemeArticle.php"){
        if(dirname($_SERVER['PHP_SELF'])=="/EvalPHP/articles"){
            echo "href='troisiemeArticle.php'";
        }else{
            echo "href='articles/troisiemeArticle.php'";
        } 
    }else{
        echo "href='#'";
    }
    ?>
    >Troisième article</a>
</li>

<!-- Code function création fichier -->
else{
                $newArticle = fopen(lcfirst(ucwords($_POST['title'])).".php", "w");
                $contentArticle = file_get_contents('./ceciEstUnTest.php');
                fwrite($newArticle, $contentArticle);
                // fwrite($newArticle, $_POST['content']);
            }