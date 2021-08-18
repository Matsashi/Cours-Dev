// Exercice 1 :
// Créer une variable (un objet) book qui va stocker des informations sur le livre Harry Potter à l'école des sorciers.
// Cette variable devra contenir :
// - Le titre : Harry Potter à l'école des sorciers
// - L'année de parution : 1998
// - La liste des chapitres : Le survivant, Une vitre disparaît, Les lettres de nulle part, Le gardien des Clés, Le Chemin de Traverse, Rendez-vous sur la voie 9¾, Le Choixpeau magique, Le maître des potions, Duel à minuit, Halloween, Le match de Quidditch, Le Miroir du Riséd, Nicolas Flamel, Norbert le dragon, La Forêt interdite, Sous la trappe, et L'homme aux deux visages.
// - Une liste (un tablau) de personnages principaux initialement vide.
let book = {
    title: "Harry Potter à l'école des sorciers",
    year: 1998,
    chapters: ["Le survivant", "Une vitre disparaît", "Les lettres de nulle part", "Le gardien des Clés", "Le Chemin de Traverse", "Rendez-vous sur la voie 9¾", "Le Choixpeau magique", "Le maître des potions", "Duel à minuit", "Halloween", "Le match de Quidditch", "Le Miroir du Riséd", "Nicolas Flamel", "Norbert le dragon", "La Forêt interdite", "Sous la trappe", "L'homme aux deux visages"],
    characters: [],
}


// Exercice 2 :
// Créer 3 variables (3 objets) pour représenter 3 des personnages principaux : Hermione Granger, Harry Potter et Ron Weasley.
// Ces objets contiendront le nom et le prénom des personnages.
// L'objet représentant Harry Potter contiendra aussi la valeur "Vert" pour l'attribut "eyesColor".
let granger ={
    firstName: "Hermione",
    lastName: "Granger",    
}
let potter ={
    firstName: "Harry",
    lastName: "Potter",
    eyesColor: "Vert",
}
let weasley ={
    firstName: "Ron",
    lastName: "Weasley",
}
// Exercice 3 :
// Écrire une fonction qui reçoit un livre (un objet représentant un livre) et un personnage (un objet représentant un personnage) et qui ajoute ce personnage à la fin de la liste des personnages.
function add (objBook,objCharacter){
    objBook.characters.push(objCharacter);
}

// Exercice 4 :
// Utiliser la fonction précédente pour ajouter les 3 personnages de l'exercice 2 au livre de la question 1
add (book, granger);
add (book, potter);
add (book, weasley);
console.log(book.characters);

// Exercice 5 :
// Écrire les prénoms des personnages principaux du livre **en passant par la variable qui représente le livre**. Interdiction d'utiliser les variables de l'exercice 2.
for(let i=0; i<3; i++){
    console.log(book.characters[i].firstName);
}

// Exercice 6 :
// Combien y a-t-il de 'e' dans les titres des chapitres du livre ?
let e;
for(let i=0; i<book.chapters.length; i++){    
}

// Exercice 7 :
// Créer un deuxième livre (de votre choix) en se basant sur le même modèle.
let prince = {
    name:"Le Petit Prince",
}
let narrateur = {
    name:"L'Aviateur",
}
let aiguilleur = {
    name:"L'Aiguilleur",
}

let serpent = {
    name:"Le Serpent",
}
let renard = {
    name:"Le Renard",
}
let fleur = {
    name:"La Rose",
}
let book2 = {
    title: "Le Petit prince",
    year: 1943,
    chapters: ["Chapitre 1", "Chapitre 2", "Chapitre 3", "Chapitre 4", "Chapitre 5", "Chapitre 6", "Chapitre 7", "Chapitre 8", "Chapitre 9", "Chapitre 10", "Chapitre 11", "Chapitre 12", "Chapitre 13", "Chapitre 14", "Chapitre 15", "Chapitre 16", "Chapitre 17", "Chapitre 18", "Chapitre 19", "Chapitre 20", "Chapitre 21", "Chapitre 22", "Chapitre 23", "Chapitre 24", "Chapitre 25", "Chapitre 26", "Chapitre 27"],
    characters: [prince, narrateur, aiguilleur, serpent, renard, fleur],
}

// Exercice 8 :
// Créer une variable qui contient le titre du livre qui a le plus de chapitres (en utilisant les deux variable représentant les livres).
let mostChapters = book.chapters.length>book2.chapters.length?book.title:book2.title;
console.log(mostChapters);

// Exercice 9 :
// Écrire une fonction qui reçoit un livre et qui ajoute un attribut "eyesColor" à tous les personnages du livre qui n'en ont pas déjà un. La valeur par défaut sera "Inconnue".

// Reprendre le livre de la série d'exercices précédente.
// Ajouter une méthode displayInfo à chacun des personnages principaux du livre (on peut donner une méthode "générique" pour tout le monde, ou faire des méthodes personnalisées ; au choix).
granger.displayInfo = function (){
    console.log("Le personnage s'appelle "+this.firstName+" "+this.lastName);
}
potter.displayInfo = function (){
    console.log("Le personnage s'appelle "+this.firstName+" "+this.lastName);
}
weasley.displayInfo = function (){
    console.log("Le personnage s'appelle "+this.firstName+" "+this.lastName);
}

granger.displayInfo(); // "Le personnage s'appelle Hermione Granger."
potter.displayInfo(); // "Le personnage s'appelle Harry Potter."
weasley.displayInfo(); // "Le personnage s'appelle Ron Weasley."

// Ajouter une méthode displayCharactersInfo à l'objet représentant le livre. Cette méthode va utiliser les méthodes de chacun des personnages, successivement.
book.displayCharactersInfo = function(){
    for(let i=0; i<book.characters.length; i++){
        book.characters[i].displayInfo();
    }
}

book.displayCharactersInfo();
// "Le personnage s'appelle Hermione Granger."
// "Le personnage s'appelle Harry Potter."
// "Le personnage s'appelle Ron Weasley."

// Ajouter une méthode qui renvoie vrai ou faux pour indiquer si tous les titres des chapitres commencent bien par une majuscule ou non.
book.capitalChapters = function(){
    for(let i=0; i<book.chapters.length; i++){
        if(book.chapters[i][0]>"A" && book.chapters[i][0]<"Z"){
            true;
        }
        else {
            return false;
        }
    }
}
console.log(book.capitalChapters());

// Bonus : ajouter une méthode copy qui retourne une copie du livre. Cette copie devra être séparée de l'original : en changeant quelque chose de l'un des deux, il ne faut pas que l'autre change.