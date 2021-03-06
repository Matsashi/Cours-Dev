<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Love simulator</title>
    <link href="scss/love.css" rel="stylesheet">
    <link rel=icon href="https://img.icons8.com/emoji/452/red-heart.png">
</head>
<body>
    <h1>Love simulator</h1>
    <article id=bloc-name>        
        <form method="POST">
            <div id="names">
                <p>
                    <label id="homme" for="prénomH">Homme :</label>
                    <input id="inputH" type="text" name="prénomH" required>
                </p>
                <p>
                    <label id="femme" for="prénomF">Femme :</label>
                    <input id="inputF" type="text" name="prénomF" required>
                </p>
            </div>
            <div class="container-button">
                <div class="bg"></div>
                <div class="button">Tester l'amour</div>
            </div>
        </form>
    </article>
    <article id="bloc-heart">
        <div id="container">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0px" y="0px" viewBox="0 0 100 100">
                <text x="30" y="50" fill="white"></text>
                <path fill-opacity="0" stroke-width="1" stroke="#fff" d="M81.495,13.923c-11.368-5.261-26.234-0.311-31.489,11.032C44.74,13.612,29.879,8.657,18.511,13.923  C6.402,19.539,0.613,33.883,10.175,50.804c6.792,12.04,18.826,21.111,39.831,37.379c20.993-16.268,33.033-25.344,39.819-37.379  C99.387,33.883,93.598,19.539,81.495,13.923z"/>
                <path id="heart-path" fill-opacity="0" stroke-width="3" stroke="#8a2be2" d="M81.495,13.923c-11.368-5.261-26.234-0.311-31.489,11.032C44.74,13.612,29.879,8.657,18.511,13.923  C6.402,19.539,0.613,33.883,10.175,50.804c6.792,12.04,18.826,21.111,39.831,37.379c20.993-16.268,33.033-25.344,39.819-37.379  C99.387,33.883,93.598,19.539,81.495,13.923z"/>
            </svg>
        </div>
    </article>
    <script src="js/progressbar.js"></script>
    <script src="js/amour.js"></script>
</body>
</html>