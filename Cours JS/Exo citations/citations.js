const citation1 = {
    phrase: "“ Ou tu sors ou j'te sors, mais faudra prendre une décision. ”",
    film:"Dikkenek (2006)",
}
const citation2 = {
    phrase: "“ Votre colin avec ou sans patates? 100 patates! ”",
    film:"Les trois frères (1995)",
}
const citation3 = {
    phrase: "“ Vous voulez un whisky? Juste un doigt. Vous voulez pas un whisky d'abord? ” ",
    film:"La cité de la peur (1994)",
}
const citation4 = {
    phrase: "“ Le tabac c’est tabou, on en viendra tous à bout! ”",
    film:"Le Pari (1997)",
}
const citation5 = {
    phrase: "“ D’ailleurs, ne dit-on pas qu’une femme qui éclabousse un homme, c’est un peu comme la rosée d’une matinée de printemps, c’est la promesse d’une belle journée et la perspective d’une soirée enflammée ? ”",
    film:"OSS 117 : Rio ne répond plus (2009)",
}
const citation6 = {
    phrase: "“ C’est notre RAÏS à nous, René COTI ! Un grand homme, il marquera l’histoire, il aime les cochinchinois, les malgaches, les sénégalais, les marocains… c’est donc ton ami.”",
    film:"OSS 117 : Le Caire, nid d'espion (2006)",
}
const citation7 = {
    phrase: "“ On dirait une pizza quatre chaussures”",
    film:"La tour montparnasse infernale (2001)",
}
const citation8 = {
    phrase: "“Qu'est-ce que vous fêtez ? Ah non, on dit qu'est-ce que vous faites !”",
    film:"RRRrrr (2004)",
}
const citation9 = {
    phrase: "“Le mec... Il s'appelle On ! Donc c'est le phare-à-On ! Le pharaon !”",
    film:"Asterix et Obelix : Mission Cléopatre (2002)",
}
const citation10 = {
    phrase: "“Si je ne suis pas de retour dans 5 minutes... Attendez plus longtemps !”",
    film:"Ace Ventura, détective chiens et chats (1994)",
}
const citations = [citation1, citation2, citation3, citation4, citation5, citation6, citation7, citation8, citation9, citation10];
function change(){
    let random = Math.floor(Math.random() * citations.length);
    while(allP[0].innerHTML==citations[random].phrase){
        random = Math.floor(Math.random() * citations.length);
    }
    allP[0].innerHTML = citations[random].phrase;
    allP[1].innerHTML = citations[random].film;
}
const allP = document.querySelectorAll("p");
const button = document.querySelector("button");
button.addEventListener ("click", change);
