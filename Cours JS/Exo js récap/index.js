// // let prenom;
// // do{
// //     prenom = prompt("Quel est votre prénom ?");
// // } while (prenom =="");
// // let age;
// // do{
// //     age = prompt("Quel est votre age ?");
// // } while (age =="");
// // let majority = age<18? "mineur":"majeur";
// // switch (prenom.toLowerCase()){
// //     case "matthew":
// //     case "benjamin":
// //     case "axel":
// //         alert("Vous êtes un homme et vous êtes"+majority);
// //         break;
// //     case "pamela":
// //     case "ophélie":
// //     case "anca":
// //         alert("Vous êtes une femme et vous êtes "+majority);
// //         break;
// //     default:
// //         alert("Vous êtes non-binaire et vous êtes "+majority);
// // }
// // let tab2 = [["titi","toto","tata"],["truc","muche","bidule"]];
// // tab2.splice(1, 0, ["fli","flou","fla"]);
// // console.log(tab2);
// // let formateur = ['Ophelie', 'Benjamin','Mathieu','Leo'];
// // let benjamin = {
// //     'nom': 'bailly',
// //     'prenom':'benjamin',
// //     'force': 'extreme',
// //     'ego': 'surdimensionné'
// // }
// // function show(tab){
// //     for(const index in tab){
// //         console.log(index, ":", tab[index]);
// //     }
// // }
// // show(formateur);
// // show(benjamin);
// // const h2 = document.querySelector("h2");
// // const a = document.querySelectorAll("a");
// // const divText = document.querySelector(".text");
// // console.log(h2);
// // console.log(a);
// // console.log(divText);
// // h2.innerHTML = "titre modifié";
// // a[1].innerHTML = "Lien modifié"; 
// const newDiv = document.createElement("div");
// const newH1 = document.createElement("h1");
// const image = document.querySelector("img");
// const header = document.querySelector("header");
// newH1.innerHTML = "Nouveau titre";
// header.prepend(newDiv);
// newDiv.append(newH1);
// image.remove;
// document.body.className = "gradientBody";

// Exo Evenements

const link = document.querySelectorAll("a");
link[0].addEventListener ("click", function (event){
    link[0].remove();
});
const button = document.querySelector("button");
button.addEventListener ("mouseover", function (event){
    document.body.style.background = "red";
})
button.addEventListener ("mouseout", function (event){
    document.body.style.background = "none";
})
const h1 = document.querySelector("h1");
const section = document.querySelector("section");
h1.addEventListener ("click", function (event){
    alert("Vous avez cliqué sur le titre");
    event.stopPropagation();
})
section.addEventListener ("click", function (event){
    alert("Vous avez cliqué sur le texte");
})
function randomColor(){
    return Math.round(Math.random()*255);
}
function start(){
    button.style.backgroundColor = "rgb("+randomColor()+","+randomColor()+","+randomColor()+")";
}
let zeppelin = setInterval (start, 1000);
link[1].addEventListener ("click", function (){
    clearInterval(zeppelin);
});
link[2].addEventListener ("click", function (){
    setInterval (start, 1000);
});