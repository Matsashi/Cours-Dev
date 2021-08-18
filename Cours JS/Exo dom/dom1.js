/*==================================================
  Accès et modification des éléments de la page html
  ================================================== */

/*
Pour manipuler le DOM, js possède une variable appelée document.
Cette variable est un objet qui va représenter tout le contenu de la page HTML.
*/
console.log(typeof document);
console.log(document);

/*
Cet objet contient énormément de propriétés (variables ou méthodes) qui vont nous permettre d'intéragir avec la page HTML.
Une de ces méthodes permet de récupérer un élément particulier de la page, grâce à son id.
*/
console.log("=== Le titre ===");
const titleOfMyPage = document.getElementById("myTitle");
// On choisit souvent d'utiliser const pour s'imposer de ne pas changer le contenu de la variable, par erreur.
console.log(typeof titleOfMyPage);
console.log(titleOfMyPage);

/*
Une des propriétés des éléments est appelée children. C'est une "HTMLCollection", une sorte de tableau, qui contient tous les enfants de cet éléments. Les enfants sont les éléments présent à l'intérieur de celui-ci.
*/
console.log("=== La div ===");
const myDiv = document.getElementById("myDiv");
console.log(typeof myDiv);
console.log(myDiv);
console.log(typeof myDiv.children);
console.log(myDiv.children);
console.log(typeof myDiv.children[0]);
console.log(myDiv.children[0]);

/*
Une fois que l'on a accès à un élément, on peut le modifier. Notamment, on peut modifier son contenu grâce à la propriété "innerHTML", ou son style grâce à la propriété éponyme.
*/
console.log("=== innerHTML et style ===");
console.log(myDiv.children[0].innerHTML);
myDiv.children[0].innerHTML = "C'est le titre dans la div !";
// Même si la variable myDiv est déclarée avec const, on peut modifier *l'intérieur* de l'objet. Mais on ne peut pas faire "myDiv = 3" par exemple;
titleOfMyPage.innerHTML = "Titre super <U>cool</U>";

// console.log(titleOfMyPage.style);
titleOfMyPage.style.backgroundColor = "#D0FFB0";
titleOfMyPage.style.color = "green";
titleOfMyPage.style.marginLeft = "20px";
titleOfMyPage.style.padding = "20px";
titleOfMyPage.style.border = "1em dashed blue";
titleOfMyPage.style.translate = "-20px";
titleOfMyPage.style.rotate = "-175deg";

/*
Il est possible d'accéder à des éléments autrement que par leur id. On peut par exemple récupérer la liste de tous les éléments portant un certain nom de balise.
*/
console.log("=== Récupération par rapport à une balise ===");
const allMyP = document.getElementsByTagName("p");
console.log(typeof allMyP);
console.log(allMyP);
for(let i = 0 ; i < allMyP.length ; i++) {
	console.log(`Paragraphe numéro ${i}`);
	const elt = allMyP[i];
	console.log(typeof elt);
	console.log(elt);
	console.log(elt.innerHTML);	
}

/*
On peut aussi récupérer tous les éléments qui ont une certaine classe.
*/

console.log("=== Récupération par rapport à une classe ===");
const important = document.getElementsByClassName("important");
console.log(typeof important);
console.log(important);
for(let i = 0 ; i < important.length ; i++) {
	const elt = important[i];
	console.log(i,elt.tagName,elt.innerHTML);
	elt.draggable = true;
}

/*
On peut modifier les classes (ajouter, retirer, changer) d'un élément, grâce aux méthodes de la propriété classList.
*/
console.log("=== Modification des classes ===");
console.log(allMyP[0].classList);
allMyP[0].classList.add("important");
allMyP[0].classList.remove("first");
allMyP[0].classList.toggle("important");
allMyP[0].classList.toggle("important");
for(let i = 0 ; i < allMyP.length ; i++) {
	const elt = allMyP[i];
	console.log(elt.classList.contains("important"));
}