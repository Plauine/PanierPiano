<?php
/**
 * Created by PhpStorm.
 * User: Hermine
 * Date: 27/12/2017
 * Time: 19:18
 */

namespace panierpiano\views;

use panierpiano\models\Categorie;
use panierpiano\models\Client;
use panierpiano\models\Vendeur;
use Slim\Slim;

class VueConnexion{

    private $arrayVendeur;
    private $arrayClient;
    private $rootLink;

    public function __construct($parrayvendeur=null,$parrayclient=null){
        $this->arrayVendeur = $parrayvendeur;
        $this->arrayClient = $parrayclient;
        $this->rootLink = Slim::getInstance()->urlFor("Home");
    }

    private function banderole(){
        if($_SESSION['connecte']){
            if($_SESSION['type']=='vendeur') {
                $var = "
    <header>
      <div id=\"banderole\">
        <h1>Panier piano</h1>
      </div>
      <nav class=\"navbar navbar-expand-md navbar-dark bg-dark\">
        <a class=\"navbar-brand\" href=$this->rootLink><span class=\"oi oi-home align-middle\" title=\"home\" aria-hidden=\"true\"></span></a>
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
          <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <ul class=\"navbar-nav mr-auto\">
              <li class=\"nav-item\">
                <a class=\"nav-link\" href='" . $this->rootLink . "ajouterProduit'>
                  Nouvel article 
                  <span class=\"oi oi-plus align-middle\" title=\"plus\" aria-hidden=\"true\"></span>
                </a>
              </li>
              <li class=\"nav-item\">
                <a class=\"nav-link\" href='" . $this->rootLink . "afficherProduits'>
                  Mes articles 
                  <span class=\"oi oi-heart align-middle\" title=\"heart\" aria-hidden=\"true\"></span>
                </a>
              </li>
              <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">
                  Mes commandes 
                  <span class=\"oi oi-clipboard align-middle\" title=\"clipboard\" aria-hidden=\"true\"></span>
                </a>
              </li>
              <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">
                  Mon compte 
                  <span class=\"oi oi-cog align-middle\" title=\"cog\" aria-hidden=\"true\"></span>
                </a>
              </li>
              <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">
                  Déconnexion 
                  <span class=\"oi oi-power-standby align-middle\" title=\"power-standby\" aria-hidden=\"true\"></span>
                </a>
              </li>
            </ul>
          </div>
      </nav>
    </header>";
            }elseif($_SESSION['type']=='client'){
                $var = "<header>
      <div id=\"banderole\">
        <h1>Panier piano</h1>
      </div>
      <nav class=\"navbar navbar-expand-md navbar-dark bg-dark\">
        <a class=\"navbar-brand\" href=$this->rootLink><span class=\"oi oi-home align-middle\" title=\"home\" aria-hidden=\"true\"></span></a>
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
          <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <ul class=\"navbar-nav mr-auto\">
              <li class=\"nav-item\">
                <a class=\"nav-link\" href='" . $this->rootLink . "afficherProduitsClient'>
                  Tous les articles
                  <span class=\"oi oi-heart align-middle\" title=\"heart\" aria-hidden=\"true\"></span>
                </a>
              </li>
              <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">
                  Mes commandes 
                  <span class=\"oi oi-clipboard align-middle\" title=\"clipboard\" aria-hidden=\"true\"></span>
                </a>
              </li>
              <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">
                  Mon compte 
                  <span class=\"oi oi-cog align-middle\" title=\"cog\" aria-hidden=\"true\"></span>
                </a>
              </li>
              <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">
                  Déconnexion 
                  <span class=\"oi oi-power-standby align-middle\" title=\"power-standby\" aria-hidden=\"true\"></span>
                </a>
              </li>
            </ul>
          </div>
      </nav>
    </header>";
            }
        }else{
            $var = "
    <header>
      <div id=\"banderole\">
        <h1>Panier piano</h1>
      </div>
      <nav class=\"navbar navbar-expand-md navbar-dark bg-dark\">
        <a class=\"navbar-brand\" href=$this->rootLink><span class=\"oi oi-home align-middle\" title=\"home\" aria-hidden=\"true\"></span></a>
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
          <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <ul class=\"navbar-nav mr-auto\">
              <li class=\"nav-item\">
                <a class=\"nav-link\" href='".$this->rootLink."afficherProduitsClient'>
                  Tous les articles 
                  <span class=\"oi oi-heart align-middle\" title=\"heart\" aria-hidden=\"true\"></span>
                </a>
              </li>
              <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\" id=\"choseMenuNonConnecte\">
                  
                </a>
              </li>
              <li class=\"nav-item\">
                <a class=\"nav-link\" href='".$this->rootLink."connexion'>
                  Connexion
                </a>
              </li>
            </ul>
          </div>
      </nav>
    </header>";
        }
        return $var;
    }

    private function connexion(){
        $var = "<section>
	<div id=\"global\" class=\"container col-6\">
		<div class=\"btn-toolbar justify-content-around\" role=\"toolbar\" aria-label=\"Toolbar with button groups\">
		  <div class=\"btn-group mr-2\" role=\"group\" aria-label=\"First group\" data-toggle=\"buttons\">
		    <label class=\"btn btn-secondary active\">
		        <input type=\"radio\" name=\"options\" id=\"onglet1\" class=\"onglet\" autocomplete=\"off\" checked> Connexion
		    </label>
		    <label class=\"btn btn-secondary\">
		        <input type=\"radio\" name=\"options\" id=\"onglet2\" class=\"onglet\" autocomplete=\"off\"> Nouveau client
		    </label>
		    <label class=\"btn btn-secondary\">
		        <input type=\"radio\" name=\"options\" id=\"onglet3\" class=\"onglet\" autocomplete=\"off\"> Nouveau vendeur
		    </label>
		  </div>
		</div>
		<div id=\"formulaires\">
			<form method='post' action='connexionUtilisateur' id=\"sub1\">
			    <div class=\"groups-separation\">VENDEUR</div>
				<div class=\"form-group\">
					<label>Nom d'utilisateur</label>
					<input type=\"username\" class=\"form-control\" name='nomutil'/>
					<label>Mot de passe</label>
					<input type=\"password\" class=\"form-control\" name='mdp'/>
				</div>
				<button type=\"submit\" class=\"btn btn-primary\" name='vendeur'>Se connecter</button>
				<div class=\"groups-separation\">CLIENT</div>
				<div class=\"form-group\">
					<label>Nom d'utilisateur</label>
					<input type=\"username\" class=\"form-control\" name='nomutilcli'/>
					<label>Mot de passe</label>
					<input type=\"password\" class=\"form-control\" name='mdpcli'/>
				</div>
  				<button type=\"submit\" class=\"btn btn-primary\" name='cli'>Se connecter</button>
			</form>
			<form method='post' action='inscriptionClient' id=\"sub2\">
				<div class=\"form-group\">
				    <label>Nom</label>
					<input type=\"text\" class=\"form-control\" name='nom'/>
					<label>Prénom</label>
					<input type=\"prenom\" class=\"form-control\" name='prenom'/>
					<label>Nom d'utilisateur</label>
					<input type=\"username\" class=\"form-control\" name='nomutil'/>
					<label>Mot de passe</label>
					<input type=\"password\" class=\"form-control\" name='mdp'/>
					<label>Confirmer le mot de passe</label>
					<input type=\"password\" class=\"form-control\" name='conf'/>
					<label>e-mail</label>
					<input type=\"email\" class=\"form-control\" name='email'/>
					<label>Numéro de téléphone</label>
					<input type='tel' class=\"form-control\" name='numtel'/>
				</div>
				<h4>Adresse</h4>
				<div class=\"form-group\">
					<label>Numero et rue</label>
					<input type=\"text\" class=\"form-control\" name='numrue'/>
					<label>Code postal</label>
					<input type=\"text\" class=\"form-control\" name='codepostal'/>
					<label>Ville</label>
					<input type=\"text\" class=\"form-control\" name='ville'/>
				</div>
				<input type=\"submit\" class=\"btn btn-primary\" value='Valider'/>
			</form>
			<form method='post' action='inscriptionVendeur' id=\"sub3\">
				<div class=\"form-group\">
				    <label>Nom</label>
					<input type=\"text\" class=\"form-control\" name='nom'/>
					<label>Prénom</label>
					<input type=\"text\" class=\"form-control\" name='prenom'/>
					<label>Nom d'utilisateur</label>
					<input type=\"username\" class=\"form-control\" name='nomutil'/>
					<label>Mot de passe</label>
					<input type=\"password\" class=\"form-control\" name='mdp'/>
					<label>Confirmer le mot de passe</label>
					<input type=\"password\" class=\"form-control\" name='conf'/>
					<label>e-mail</label>
					<input type=\"email\" class=\"form-control\" name='email'/>
				</div>
				<h4>Adresse</h4>
				<div class=\"form-group\">
					<label>Numero et rue</label>
					<input type=\"text\" class=\"form-control\" name='numrue'/>
					<label>Code postal</label>
					<input type=\"text\" class=\"form-control\" name='codepostal'/>
					<label>Ville</label>
					<input type=\"text\" class=\"form-control\" name='ville'/>
				</div>
				<input type=\"submit\" class=\"btn btn-primary\" value='Valider'/>
			</form>
		</div>
	</div>
</section>";
        return $var;
    }

    private function inscriptionClient(){
        $app = Slim::getInstance();

        $postNom = $app->request->post('nom');
        $postprenom = $app->request->post('prenom');
        $postNomUtil = $app->request->post('nomutil');
        $postmdp = $app->request->post('mdp');
        $postemail = $app->request->post('email');
        $postnumrue = $app->request->post('numrue');
        $postcodepostal = $app->request->post('codepostal');
        $postville = $app->request->post('ville');
        $postNumtel = $app->request->post('numtel');

        $client = new Client();
        $client->nom_client = $postNom;
        $client->prenom_client = $postprenom;
        $client->nom_util = $postNomUtil;
        $client->mdp = $postmdp;
        $client->adresse = $postnumrue.' '.$postcodepostal.' '.$postville;
        $client->num_tel = $postNumtel;
        $client->email = $postemail;
        $client->save();

        $redirect = $this->rootLink.'afficherProduitsClient';
        $app->redirect($redirect);
    }

    private function inscriptionVendeur(){
        $app = Slim::getInstance();

        $postNom = $app->request->post('nom');
        $postprenom = $app->request->post('prenom');
        $postNomUtil = $app->request->post('nomutil');
        $postmdp = $app->request->post('mdp');
        $postemail = $app->request->post('email');
        $postnumrue = $app->request->post('numrue');
        $postcodepostal = $app->request->post('codepostal');
        $postville = $app->request->post('ville');

        $vendeur = new Vendeur();
        $vendeur->nom_vendeur = $postNom;
        $vendeur->prenom_vendeur = $postprenom;
        $vendeur->nom_util = $postNomUtil;
        $vendeur->mdp = $postmdp;
        $vendeur->adresse = $postnumrue.' '.$postcodepostal.' '.$postville;
        $vendeur->email = $postemail;
        $vendeur->save();

        try {
            // Creation des categories de base
            $categoriesParDefaut = ["Alimentaire", "Service", "Matériel", "Custom"];
            $descrParDefaut = ["Ingredients, plats, ...", "Services", "Outils, matières premières, ...", "Produits divers"];

            foreach ($categoriesParDefaut as $idCategorie => $categorieParDefaut) {
                $categorie = new Categorie();
                $categorie->nom_categorie = $categorieParDefaut;
                $categorie->descr_categorie = "[Catégorie par défaut] ".$descrParDefaut[$idCategorie];
                $categorie->id_vendeur = $vendeur->id_vendeur;
                $categorie->save();
            }

        } catch (\ErrorException $exception) {
        }

        $redirect = $this->rootLink.'afficherProduits';
        $app->redirect($redirect);
    }

    private function connexionUtilisateur(){
        $app = Slim::getInstance();

        $postNomutil = $app->request->post('nomutil');
        $postmdp = $app->request->post('mdp');
        $postsubmitvend = $app->request->post('vendeur');

        $postnomutilci = $app->request->post('nomutilcli');
        $postmdpcli = $app->request->post('mdpcli');
        $postsubmitcli = $app->request->post('cli');

        $var = '';
        if(isset($postsubmitvend)) {
            if (isset($postNomutil) && !empty($postNomutil) && isset($postmdp) && !empty($postmdp)) {
                $vendeur = Vendeur::where('nom_util', '=', $postNomutil)->get();

                $count = $vendeur->count();

                if ($count == 1) {
                    foreach ($vendeur as $donnees) {
                        if ($donnees->mdp == $postmdp) {
                            $var = 'Vous êtes bien connecté';

                            $_SESSION['nom'] = $donnees->nom_vendeur;
                            $_SESSION['prenom'] = $donnees->prenom_vendeur;
                            $_SESSION['nom_util'] = $donnees->nom_util;
                            $_SESSION['mdp'] = $donnees->mdp;
                            $_SESSION['id'] = $donnees->id_vendeur;
                            $_SESSION['connecte'] = true;
                            $_SESSION['type'] = 'vendeur';

                        } else {
                            $_SESSION['connecte'] = false;
                            $var = 'Votre mdp n\'est pas correct';
                        }
                    }
                } else {
                    $_SESSION['connecte'] = false;
                    $var = 'votre nom d\'utilisateur est incorrect';
                }
            }
        }elseif(isset($postsubmitcli)){
            $client = Client::where('nom_util','=',$postnomutilci)->get();

            $count = $client->count();

            if($count == 1){
                foreach($client as $donnees){
                    if($donnees->mdp == $postmdpcli){
                        $var = "Vous êtes bien connecté";

                        $_SESSION['nom_cli'] = $donnees->nom_client;
                        $_SESSION['prenom_cli'] = $donnees->prenom_client;
                        $_SESSION['nom_utilcli'] = $donnees->nom_util;
                        $_SESSION['mdpcli'] = $donnees->mdp;
                        $_SESSION['idcli'] = $donnees->id_client;
                        $_SESSION['connecte'] = true;
                        $_SESSION['type'] = 'client';
                    } else{
                        $_SESSION['connecte'] = false;
                        $var = "votre mdp est incorrect";
                    }
                }
            } else {
                $_SESSION['connecte'] = false;
                $var = "votre nom d'utilisateur est incorrect";
            }
        }

        return $var;
    }

    public function render($id=0){
        switch($id){
            case 1:
                $this->inscriptionClient();
                break;
            case 2:
                $this->inscriptionVendeur();
                break;
            case 3:
                $content = $this->connexionUtilisateur();
                break;
            default :
                $content = $this->connexion();
        }
        $banderole = $this->banderole();
        $html = <<<END
<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="$this->rootLink/css/banderole.css">
    <link href="open-iconic-master/font/css/open-iconic-bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="$this->rootLink/css/connexion.css">
    <link rel="stylesheet" type="text/css" href="$this->rootLink/css/acceuil.css">
    <link rel="stylesheet" type="text/css" href="$this->rootLink/css/detailarticle.css">
    <link rel="stylesheet" type="text/css" href="$this->rootLink/css/nouveaupanier.css">
    <link rel="stylesheet" type="text/css" href="$this->rootLink/css/editarticle.css">
    <link rel="stylesheet" type="text/css" href="$this->rootLink/css/index.css">
    <link rel="stylesheet" type="text/css" href="$this->rootLink/css/nouveaupanier.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="$this->rootLink/js/banderole.js"></script>
    <script src="$this->rootLink/js/onglets.js"></script>
    <script src="$this->rootLink/js/actions.js"></script>
    <script src="$this->rootLink/js/editarticles.js"></script>
    <script src="$this->rootLink/js/espace.js"></script>
    
    <title>PanierPiano</title>
</head>

    $banderole
    
    <body>
       $content
    </body>
    
    <footer>
		<p>Ce site a été créé par Caroline, Esteban, Hermine et Pauline dans le cadre d'un projet de web en L3 sciences cognitives à Nancy</p>
		<p>2017-2018</p>
	</footer>
</html>
END;
        return $html;
    }

}