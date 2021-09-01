<?php ob_start();?>
<div class="container">
    <div class="accordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Apprendre la Poo par la pratique
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>De la création d'une <code>class</code> à l'élaboration d'un <code>routeur</code>. Vous allez apprendre à écrire un code professionnelle et efficace.</p> 
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Comprendre et mettre en pratique le "MVC"
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" >
                <div class="accordion-body">
                    <p>Un des plus célèbres design patterns s'appelle MVC, qui signifie <code>Modèle - Vue - Contrôleur</code> . C'est celui que nous allons découvrir maintenant.</p> 
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Être capable de réaliser un crud en POO
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse " aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>Vous allez apprendre à structurer tout les composants d'un CRUD et faire le lien avec une BDD <code>SQL</code> en POO.</p>
                </div>
            </div>
        </div>
    </div>
    <h3 class="phpSkill">Compétences PHP à la fin du TP</h3>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100 %</div>
    </div>
</div>
<?php
$titre = "Accueil";
$content = ob_get_clean();
require "template.php";