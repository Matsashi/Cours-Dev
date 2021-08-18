/*// 1) Créer un tableau tab1 de 6 cases, qui contient les nombres 144, 202, 216, 216, 222 et 64.
let tab1=[144,202,216,216,222,64];
// 2) Ajouter le nombre 0 à la fin du tableau tab1.
tab1.push(0);
// 3) Afficher *un par un* tous les éléments du tableau tab1.
for(let i=0; i<tab1.length; i++)
{
    console.log(tab1[i]);
}
// 4) Retirer le dernier élément du tableau tab1.
tab1.pop();
// 5) Créer un tableau tab2 qui contient les nombres 238, 222, 228, 216, 200.
let tab2=[238,222,228,216,200];
// 6) Ajouter le nombre 58 à la fin de tab2.
tab2.push(58);
// 7) Ajouter *un par un* tous les éléments du tableau tab2 à la fin du tableau tab1.
for(let i=0; i<tab2.length; i++)
{
    tab1.push(tab2[i]);
}
// 8) Afficher *un par un* tous les éléments du tableau tab1.
for(let i=0; i<tab1.length; i++)
{
    console.log(tab1[i]);
}
// 9) Retirer et stocker dans la variable maVariable le dernier élément du tableau tab1.
let maVariable = tab1.pop();

// 10) Afficher la taille du tableau tab1.
console.log(tab1.length);
// 11) Ajouter le nombre 66 à la fin du tableau tab1.
tab1.push(66);
// 12) Diviser par 2 toutes les variables contenues dans le tableau tab1.
for(let i=0; i<tab1.length; i++)
{
    tab1[i]= tab1[i]/2;
}
// 13) Pour vérifier si vous êtes correctement arrivé(e) jusqu'ici, essayez les deux lignes de code suivantes :
console.log(tab1.reduce((acc,cur)=> acc+String.fromCharCode(cur),""));
console.log(String.fromCharCode(maVariable)+String.fromCharCode(maVariable-17));
// (On ne cherchera pas à comprendre ça)

let tab = [1,4,7,8,5,2,22,5,1];
let t = [8,4,4,4,4,4,5,2,22,5,1];
let bob = [10,9,8,7,6,5,4,3,2,1,0];
let orderedArr = [0,1,3,8,10,15,17,20,50,77,100,222,300,500,999];
//Fonction qui prend un tableau en entrée et affiche le dernier élément de ce tableau.
function displayLast(tab)
{
    console.log(tab[tab.length-1]);
}
//Fonction qui prend un tableau en entrée et retourne le dernier élément de ce tableau.
function returnLast(tab)
{
    return tab[tab.length-1];
}

//Fonction qui prend en entrée un tableau et qui retourne le minimum de ce tableau.
function returnLow (tab)
{
    let low =tab[0];
    for(let i=1; i<tab.length; i++)
    {
        if (tab[i]<low) 
        {
            low = tab[i];
        }
    }
    return low;
}
//Fonction qui prend en entrée un tableau et qui retourne le maximum de ce tableau.
function returnHigh (tab)
{
    let high =tab[0];
    for(let i=1; i<tab.length; i++)
    {
        if (tab[i]>high) 
        {
            high = tab[i];
        }
    }
    return high;
}
//++ Fonction qui prend en entrée un tableau de nombres positifs et qui retourne la deuxième plus grande valeur du tableau.
function returnLessHigh (tab)
{
    let low=returnLow(tab);
    let high=returnHigh(tab);
    for(let i=0; i<tab.length; i++)
    {
        if (low<tab[i]&&tab[i]<high)
        {
            low = tab[i];
        }
    }
    return low;
}
//Fonction qui prend en entrée un tableau et un nombre et qui retourne le nombre de fois que ce nombre apparaît dans le tableau.
function returnTime(tab,x)
{
    let repeat=0;
    for(let i=0; i<tab.length; i++)
    {
        if (tab[i]==x)
        {
            repeat+=1;
        }
    }
    return repeat
}
//Fonction qui prend en entrée un tableau et un nombre et qui retourne true si le nombre existe dans le tableau, false sinon.
function returnTrue(tab,x)
{
    return returnTime(tab,x)>=1;
}
//Suite de l'exo : on **sait** que le tableau reçu est trié (on ne le vérifie pas). Comment exploiter cette information pour améliorer la recherche d'un élément ?*/
// Écrire ce code avec une boucle while :
// for(let i = 0 ; i < 5 ; i++) {
//     console.log(i);
// }

let a =0;
while(a<5)
{
    console.log(a);
    a++;
}

// Écrire ce code avec une boucle for :
// let a = 5;
// while(a != 1) {
//     if(a%2 == 0) {
//         a /= 2;
//     } else {
//         a = 3*a+1;
//     }
//     console.log(a);
// }