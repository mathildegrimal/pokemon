<?php /*
## Ajax
 interface PHP/JSON (ajax)
## Enoncé
Ma classe serveur comporte nom/prénom/age/salaire mensuel
Un calcul me permet de calculer le salaire annuel

-> Retourner ces infos au client JS pour l'objet (Doe/John/32/2000)


## Détails
- côté JS JSON.parse() décode un formet Json
- côté serveur: json_encode() encode un objet "complexe"


* cf 
https://www.w3schools.com/js/js_json_php.asp 

*/

class Serveur {
    public $nom;
    public $prenom;
    public $age;
    public $salaireMensuel;
    public $salaireAnnuel;

    const YEAR = 12;

    public function __construct (string $nom, string $prenom, int $age, string $salaireMensuel){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
        $this->salaireMensuel = $salaireMensuel;
    }

    public function setSalaireAnnuel(){
        $this->salaireAnnuel = $this->salaireMensuel*self::YEAR;

    }

    public function jsonEncode(){
        $json = json_encode(["nom"=> $this->nom, "prenom"=> $this->prenom, "age"=> $this->age, "salaire"=> $this->salaireMensuel, "salaire_annuel"=> $this->salaireAnnuel]);
        return $json;
    }

}

$toto = new Serveur("Michel", "Michelino", 34, 6000);
$toto->setSalaireAnnuel();
$hint = $toto->jsonEncode();
echo $hint;

?>