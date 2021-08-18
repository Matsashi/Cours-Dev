function Stagiaire (nom, prenom, age, ville){
    this.nom = nom;
    this.prenom = prenom;
    this.age = age;
    this.ville = ville;
    this.sePresenter = "Bonjour, je m'appelle " + prenom + " " + nom +", j'ai " + age + " ans et je viens de " + ville.nom + ".";
}
function Ville (nom, nombreHabitant, pays){
    this.nom = nom;
    this.habitants = nombreHabitant;
    this.pays = pays;
}
const Chartres = new Ville("Chartres", "38 752", "France");
const Montpellier = new Ville("Montpellier", "277 639", "France");
const Benjamin = new Stagiaire("Bailly", "Benjamin", "150", Montpellier);