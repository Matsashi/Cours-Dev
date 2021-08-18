/*Exercice 1 : écrire 50 fois "Bonjour" dans la console.
for(let i=0; i<50; i++)
    {
        console.log("Bonjour")
    }
    console.log("exercice 2")
Exercice 2 : écrire dans la console :
A
B
A
B
A
B
A
B
A
B
for(let i=0; i<5; i++)
{
    console.log("A")
    console.log("B")
}
console.log("Exercice 3")
Exercice 3 : écrire dans la console :
A
A
A
A
A
B
A
A
A
A
A
B
A
A
A
A
A
B

for(let i=0; i<3; i++)
{
    console.log("A")
    console.log("A")
    console.log("A")
    console.log("A")
    console.log("A")
    console.log("B")
}
Exercice 4 : écrire dans la console :
0
1
2
3
4
5
6
7
8
9

console.log("Exercice 4")
for(let i=0; i<10; i++)
{
    console.log(i)
}
console.log("Exercice 5")
/*Exercice 5 : écrire dans la console :
3
4
5
6
7
8
9
10
11 
for(let i=3; i<12; i++)
{
    console.log(i)
}
Exerice 6 : écrire dans la console :
0
1
2
3
0
1
2
3
0
1

/*for(let i=0; i<10; i++)
{
    console.log(i%4)
}
/*Exercice 7 : écrire dans la console :
0
1
2
3
4
A
A
A
8
9

for(let i=0; i<10; i++)
{
    if (i>4&&i<8)
    {
        console.log("A");
    }
    else 
    {
        console.log(i);
    }  
}
/*Exercice 8 : écrire dans la console :
100
1
2
103
4
5
106
7
8
109

for (let i=0; i<10; i++)
{
    if (i%3==0)
    {
        console.log(i+100);
    }
    else 
    {
        console.log(i);
    }
}
/*Exercice 9 : écrire dans la console :
0
101
202
3
104
205
... (66 lignes restantes) 
for (let i=100; i<171; i++)
{
    if (i%3==1)
    {
        console.log(i-100);
    }
    else 
    {
        console.log(i);
    }
}

Exercice 10 : écrire dans la console tous les résultats possibles de lancers de deux dé :
1 1
1 2
1 3
...
6 4
6 5
6 6

for(let i=1; i<7; i++)
{
    for(let j=1; j<7; j++)
    {
        console.log(i,j)
    }
}
Exercice 11 : adapter l'exercice précédent pour enlever les doublons (on ne veut pas afficher 1 2 et 2 1, mais seulement l'un des deux).

for(let i=1; i<7; i++)
{
    for(let j=i; j<7; j++)
    {
        console.log(i,j)
    }
}
Exercice 12 : en prenant des dés à 20 faces, combien de résultats différents (sans doublon) peut-on afficher ? (Autrement dit : adapter le code précédent pour compter les résultats au lieu de les afficher)

for(let i=1; i<21; i++)
{
    for(let j=i; j<21; j++)
    {
        console.log(i,j)
    }
}
Exercice 13 : afficher la table de multiplication de 1 (de 1 à 9):
1x1 = 1
1x2 = 2
1x3 = 3
1x4 = 4
1x5 = 5
1x6 = 6
1x7 = 7
1x8 = 8
1x9 = 9

for(let i=1; i<2; i++)
{
    for(let j=i; j<10; j++)
    {
        console.log(i,"x",j,"=",i*j)
    }
}
*/