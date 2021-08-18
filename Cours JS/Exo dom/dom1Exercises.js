// Changer le texte de "Pas dans la div" en "En dehors de la div".
console.log("bonjour");
console.log(document.getElementsByTagName("h2"));
document.getElementsByTagName("h2")[1].innerHTML = "En dehors de la div";

// Changer la couleur du texte du lien en vert.
console.log(document.getElementsByTagName("a"));
document.getElementsByTagName("a")[0].style.color = "green";

// Changer le titre de l'onglet en DOM - EXOS
document.getElementsByTagName("title")[0].innerHTML = "DOM - EXOS";

// Écrire dans la console le texte du dernier paragraphe (celui en dehors de la div).
console.log(document.getElementsByClassName("important")[2]);

// Modifier le texte du quatrième paragraphe pour mettre le même texte que celui du dernier paragraphe.
document.getElementsByClassName("important")[1].innerHTML = document.getElementsByClassName("important")[2].innerHTML;

// Ajouter au début de chaque paragraphe son numéro :
// 1 --- Lorem...
// 2 --- Pellentesque
// ...
const paragraphe = document.getElementsByTagName("p");

// Ajouter à la fin de chaque paragraphe, sur une nouvelle ligne, le nombre de caractères de celui-ci, avant la modification de l'exercice précédent :
// ... Ut ut hendrerit eros.
// (size = 552)
// ... ante gravida sit amet.
// (size = 533)

// Ajouter un margin à gauche et à droite à tous les paragraphes importants.

// Changer la couleur des bordure des paragraphes non importants en bleu.

// Bonus : afficher toutes les voyelles des paragraphes en bleu. Et à l'envers.