class Personnage{
    constructor(pseudo, classe, sante, attaque){
        this.pseudo = pseudo;
        this.classe = classe;
        this.sante = sante;
        this.attaque = attaque;
        this.niveau = 1;
    }
    evoluer(){
        this.niveau++;
        console.log(this.pseudo + ` passe au niveau ` + this.niveau + "!");
    }
    verifierSante(){
        if(this.sante<=0){
            this.sante = 0;
            console.log(this.pseudo + " a perdu !");
        }
    }
    get informations(){
        return this.pseudo + " (" + this.classe + ") a " + this.sante + " points de vie et est au niveau " + this.niveau;
    }
}
class Magicien extends Personnage{
    constructor(pseudo){
        super(pseudo, "magicien", 170, 90);
    }
    attaquer(personnage){
        if(personnage instanceof Personnage){
            personnage.sante -= this.attaque;
            console.log(this.pseudo + " attaque " + personnage.pseudo + " en lançant un sort (" + this.attaque + " dégats)");
            this.evoluer();
            personnage.verifierSante();
        }else{
            console.log("Vous ne ciblez pas un personnage.");
        }
    }
    coupSpecial(personnage){
        personnage.sante -= (this.attaque*5);
        console.log(this.pseudo + " attaque " + personnage.pseudo + " avec son coup spécial PUISSANCE DES ARCANES (" + (this.attaque*5) + " dégats)");
        this.evoluer();
        personnage.verifierSante();
    }
}
class Guerrier extends Personnage{
    constructor(pseudo){
        super(pseudo, "guerrier", 350, 50);
    }
    attaquer(personnage){
        if(personnage instanceof Personnage){
            personnage.sante -= this.attaque;
            console.log(this.pseudo + " attaque " + personnage.pseudo + " avec son épée (" + this.attaque + " dégats)");
            this.evoluer();
            personnage.verifierSante();
        }else{
            console.log("Vous ne ciblez pas un personnage.");
        }
    }
    coupSpecial(personnage){
        personnage.sante -= (this.attaque*5);
        console.log(this.pseudo + " attaque " + personnage.pseudo + " avec son coup spécial HACHES DE GUERRE (" + (this.attaque*5) + " dégats)");
        this.evoluer();
        personnage.verifierSante();
    }
}
let Matsashi = new Magicien ("Matsashi");
let Alegria = new Guerrier ("Alegria");
let toto;

console.log(Alegria.informations);
console.log(Matsashi.informations);
Matsashi.attaquer(toto);
console.log(Alegria.informations);
Alegria.attaquer(Matsashi);
console.log(Matsashi.informations);
Matsashi.coupSpecial(Alegria);

let today = new Date();
const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
console.log(today);
console.log(today.toLocaleString("fr-FR",options));