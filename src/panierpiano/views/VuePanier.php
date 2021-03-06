<?php
/**
 * Created by PhpStorm.
 * User: Hermine
 * Date: 04/01/2018
 * Time: 22:53
 */

namespace panierpiano\views;

use panierpiano\models\Categorie;
use panierpiano\models\Client;
use panierpiano\models\Contient;
use panierpiano\models\Produit;
use panierpiano\models\Vendeur;
use Slim\Slim;
use panierpiano\models\Commande;

class VuePanier{

    private $array;
    private $rootLink;

    public function __construct($parray){
        $this->array = $parray;
        $this->rootLink = Slim::getInstance()->urlFor("Home");
    }


    private function banderole(){
        if(isset($_SESSION['connecte'])&&$_SESSION['connecte']){
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
                <a class=\"nav-link\" href='" . $this->rootLink . "afficherCompteVendeur/".$_SESSION['id']."'>
                  Mon compte 
                  <span class=\"oi oi-cog align-middle\" title=\"cog\" aria-hidden=\"true\"></span>
                </a>
              </li>
              <li class=\"nav-item\">
                <a class=\"nav-link\" href='" . $this->rootLink . "deconnexion'>
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
                <a class=\"nav-link\" href='" . $this->rootLink . "afficherCompteClient/".$_SESSION['idcli']."'>
                  Mon compte 
                  <span class=\"oi oi-cog align-middle\" title=\"cog\" aria-hidden=\"true\"></span>
                </a>
              </li>
              <li class=\"nav-item\">
                <a class=\"nav-link\" href='" . $this->rootLink . "deconnexion'>
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


    private function ajouterProduit(){
        $produit = $this->array;
        $app = Slim::getInstance();
        if(isset($_SESSION['connecte'])&&$_SESSION['connecte']) {
            if (!isset($_SESSION['panier'])) {
                $_SESSION['panier'] = new Commande();
                $_SESSION['panier']->id_client = $_SESSION['idcli'];
                $categorie = Categorie::where("id_categorie", "=", $produit->id_categorie)->first();
                $_SESSION['panier']->id_vendeur = $categorie->id_vendeur;
                $today = date("Y/m/d");
                $_SESSION['panier']->date = $today;
                $_SESSION['panier']->etat = 'en_cours';
                $_SESSION['panier']->save();
            }
            $contient = new Contient();
            $contient->id_commande = $_SESSION['panier']->id_commande;
            $contient->id_produit = $produit->id_produit;
            $contient->save();

            if (!isset($_SESSION['montant'])) {
                $_SESSION['montant'] = $produit->prix;
                $_SESSION['panier']->prix = $_SESSION['montant'];
                $_SESSION['panier']->save();
            } else {
                $_SESSION['montant'] = $_SESSION['montant'] + $produit->prix;
                $_SESSION['panier']->prix = $_SESSION['montant'];
                $_SESSION['panier']->save();
            }

            $redirect = $this->rootLink . 'afficherProduitsClient';
            $app->redirect($redirect);
        }else{
            $redirect = $this->rootLink . 'connexion';
            $app->redirect($redirect);
        }
    }

    private function validerPanier(){
        $commande = $this->array;
        $commande->etat = 'en_attente';
        $commande->save();
        $client = Client::where('id_client','=',$commande->id_client)->first();
        $vendeur = Vendeur::where('id_vendeur','=',$commande->id_vendeur)->first();
        $to1 = $client->email;
        $sujet1 = "Confirmation commande n°".$commande->id_commande;
        $message1 = "Votre commande a bien été validée, elle est en attende de validation par le vendeur".$vendeur->nom_vendeur;
       // mail($to1,$sujet1,$message1);
        $to2 = $vendeur->email;
        $sujet2 = "Une commande avec certains de vos produits est en attente de validation";
        $message2 = "Le client ".$client->nom_client." attend la validation de sa commande";
       // mail($to2,$sujet2,$message2);
        $var = "<h1> Votre commande a bien été validée, elle est en attente de validation par le vendeur</h1>";
        //suppression du panier existant
        unset($_SESSION['panier']);
        unset($_SESSION['montant']);
        return $var;
    }

    public function render($id)
    {
        switch($id){
            case 1:
               $this->ajouterProduit();
                break;
            case 2:
                $content = $this->validerPanier();
                break;
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
    <link href="$this->rootLink/open-iconic-master/font/css/open-iconic-bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="$this->rootLink/css/banderole.css">
    <link rel="stylesheet" type="text/css" href="$this->rootLink/css/connexion.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="$this->rootLink/js/banderole.js"></script>
    <script src="$this->rootLink/js/onglets.js"></script>
    <script src="$this->rootLink/js/actions.js"></script>
    
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