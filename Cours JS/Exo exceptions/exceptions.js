let answer = window.prompt("Choisissez un sort entre ces trois : \n1 - Boule de feu (40 dégats) \n2 - Trait de glace (35 dégats) \n3 - Chaîne d'éclairs (25 dégats)");
if(answer == "1"){
    alert("Vous avez choisi la Boule de feu et vous faites 40 de dégats");
}else if(answer == "2"){
    alert("Vous avez choisi le Trait de glace et vous faites 35 de dégats");
}else if(answer == "3"){
    alert("Vous avez choisi la Chaîne d'éclairs et vous faites 25 de dégats");
}else{
    throw new Error("Les autres sorts ne sont pas de votre niveau");
}