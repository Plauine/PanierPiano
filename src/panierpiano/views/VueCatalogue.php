<?php
/**
 * Created by PhpStorm.
 * User: Hermine
 * Date: 13/12/2017
 * Time: 11:40
 */

namespace panierpiano\views;

use panierpiano\models\Categorie;
use panierpiano\models\Produit;
use Slim\Slim;

class VueCatalogue{

    private $array;
    private $rootLink;

    public function __construct($parray=null){
        $this->array = $parray;
        $this->rootLink = Slim::getInstance()->urlFor("Home");
    }

    private function afficherAccueil(){
        $app = Slim::getInstance();
        $urlLogin = $app->urlFor("loginSeller");
        $urlCommandState = "../EtatCommande/etatcommande.html";//TODO $app->urlFor("commandState");
        $urlNewBasket = "../NouveauPanier/nouveaupanier.html";//TODO $app->urlFor("newBasket");

        // Introduction du site
        $var = "<section id='intro'>";
        $var .= "<h1>PanierPiano</h1>";
        $var .= "<p>Le site communautaire d'achat</p>";
        $var .= "</section>";

        // Identite
        $var .= "<section id='identite'>";
        $var .= "<h2>Vous êtes?</h2>";

        // Vendeur
        $var .= "<div id='artisan'><a href='".$urlLogin."' title='artisan' >Artisan</a></div>";

        // Client
        $var .= "<div><p>Client</p>";
        $var .= "<ul id='client'>";
        $var .= "<li><a href='".$urlCommandState."' title='etatcommande' >Suivre ma commande</a></li>";
        $var .= "<li><a href='".$urlNewBasket."' title='creationpanier' >Créer un nouveau Panier</a></li>";
        $var .= "</ul></div>";
        $var .= "</section>";

        return $var;
    }

    private function banderole(){
        if($_SESSION['connecte']){
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
                <a class=\"nav-link\" href=\"#\">
                  Nouvel article 
                  <span class=\"oi oi-plus align-middle\" title=\"plus\" aria-hidden=\"true\"></span>
                </a>
              </li>
              <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"#\">
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
                <a class=\"nav-link\" href='".$this->rootLink."/afficherProduits'>
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

    private function afficherProduits(){

        $var = "<section>
	<div class=\"container\">
		<div class=\"btn-toolbar justify-content-around row\" role=\"toolbar\" aria-label=\"Toolbar with button groups\">
		  <div class=\"btn-group mr-2\" role=\"group\" aria-label=\"First group\" data-toggle=\"buttons\">
		    <label class=\"btn btn-secondary active\">
		        <input type=\"radio\" name=\"options\" id=\"onglet1\" class=\"onglet\" autocomplete=\"off\" checked/> Tous les articles
		    </label>";

        $categories = Categorie::all();

        foreach ($categories as $cat){
            $var .= "<label class=\"btn btn-secondary\">";
            $var .= "<input type=\"radio\" name=\"options\" id=\"onglet2\" class=\"onglet\" autocomplete=\"off\"/>$cat->nom_categorie</label>";
        }

        $var .= "</div></div>";
        /**$var .= "
		<div class=\"row justify-content-center\">
			<div class=\"col-3\">
				<button type=\"button\" class=\"btn btn-outline-info\">
					Nouveau produit
					<span class=\"oi oi-plus\"></span>
				</button>				
			</div>
			<div class=\"col-3\">
				<button type=\"button\" class=\"btn btn-outline-info\">
					Nouvelle catégorie
					<span class=\"oi oi-star\"></span>
				</button>				
			</div>
		</div>";*/
		$var .= "<div class=\"row\">";
		$var .=	"<table id=\"sub1\" class=\"table table-striped\">";
        $var .= "<thead class=\"thead-light\">";
        $var .= "<tr>";
        $var .= "<th scope=\"col\">ID</th>";
        $var .= "<th scope=\"col\">Produit</th>";
        $var .= "<th scope=\"col\">Catégorie</th>";
        $var .= "<th scope=\"col\">Date d'ajout</th>";
        $var .= "<th scope=\"col\">Prix unit.</th>";
        $var .= "<th scope=\"col\">Actions</th></tr>";
        $var .= "</thead>";
        $var .= "<tbody>";

        foreach ($this->array as $produit) {
            $var .= "<tr>";
            $var .= "<th scope=\"row\">$produit->id_produit</th>";
            $var .= "<a href='" . $this->rootLink . "produit/" . $produit->id_produit . "'><td>$produit->nom_produit</td></a>";
            $cat = $produit->categorie()->first();
            $var .= "<a href='" . $this->rootLink . "categorie/" . $cat->id_categorie . "'><td>$cat->nom_categorie</td></a>";
            $var .= "<td>$produit->date_ajout</td>";
            $var .= "<td>$produit->prix €</td>";
            $var .= "<td><span class=\"oi oi-pencil action\"></span>";
            $var .= "<span class=\"oi oi-x action\"></span></td>";
            $var .= "</tr>";
        }
        $var.= "</tbody></table>";

        foreach ($categories as $cat){
            $var .= "<table id='sub2' class='table table-striped'>";
            $var .= "<thead class=\"thead-light\">";
            $var .= "<tr><th scope=\"col\">ID</th>";
            $var .= "<th scope=\"col\">Produit</th>";
            $var .= "<th scope=\"col\">Date d'ajout</th>";
            $var .= "<th scope=\"col\">Prix unit.</th>";
            $var .= "<th scope=\"col\">Actions</th></tr></thead>";

            $var .= "<tbody>";
            $produits = $cat->produits();
            foreach ($produits as $p) {
               $var .= "<tr>";
               $var .= "<th scope='row'>$p->id_produit</th>";
               $var .= "<td>$p->nom_produit</td>";
               $var .= "<td>$p->date_ajout</td>";
               $var .= "<td>$p->prix €</td>";
               $var .= "<td><span class=\"oi oi-pencil action\"></span>";
               $var .= "<span class=\"oi oi-x action\"></span></td></tr>";
            }
            $var .= "</tbody></table>";
        }
        $var .= "</div></div></section>";

        return $var;
    }

    private function detailProduit(){
        $produit = $this->array;
        $cat = $produit->categorie()->first();
        $vendeur = $cat->vendeur()->first();
        $var = "<div>";
        $var .= "<h1>$produit->nom_produit </h1>";
        $var .= "<ul>";
        $var .= "<li>Pour en savoir un peu plus sur le produit : $produit->descr_produit</li>";
        $var .= "<li>$produit->prix €</li>";
        $var .= "<a href='".$this->rootLink."categorie/".$cat->id_categorie."'><li>Catégorie : $cat->nom_categorie</li></a>";
        $var.= "<li>Cet article est vendu par : $vendeur->nom_vendeur</li>";
        $var.="<li><img class='img_produit' src='../Images/produits/$produit->image_produit_1'/></li>";
        $var.="<li><img class='img_produit' src='../Images/produits/$produit->image_produit_2' /></li>";
        $var.="<li><img class='img_produit' src='../Images/produits/$produit->image_produit_3' /></li>";
        $var.="<li>Ajouter au panier</li>";
        $var .= "</ul></div>";
        return $var;
    }

    private function detailCategorie(){
        $cat = $this->array;
        $vendeur = $cat->vendeur()->first();
        $var = "<div>";
        $var .= "<h1>$cat->nom_categorie</h1>";
        $var .= "<ul>";
        $var .= "<li>Pour en savoir un peu plus sur la catégorie : $cat->descr_categorie</li>";
        $var .= "<li>Catégorie : $cat->nom_categorie</li>";
        $var.= "<li>Cette categorie appartient à: $vendeur->nom_vendeur</li></ul>";


        $var .= "<div><h2>$cat->nom_categorie</h2>";
        $var = "<center><ul>";
        foreach ($cat->produits()->getResults() as $produit) {
            $var.= "<div class='col-lg-3 col-md-4 col-xs-6 thumb tailleThumb'>";
            $cat = $produit->categorie()->first();
            $var.="<a href='".$this->rootLink."produit/".$produit->id_produit."'><li>$produit->nom_produit</li></a>";
            $var.="<li>$produit->prix €</li>";
            $vendeur = $cat->vendeur()->first();
            $var.= "<li>Vendu par: $vendeur->nom_vendeur</li>";
            $var.="<img class='img_produit' src='../Images/produits/$produit->image_produit_1' />";
            $var.="</div>";
        }
        $var.= "</ul></center>";

        $var .= "</div>";
        return $var;
    }

    public function render($id=0){
        switch ($id){
            case 1 :
                $content = $this->afficherProduits();
                break;
            case 2 :
                $content = $this->detailProduit();
                break;
            case 3 :
                $content = $this->detailCategorie();
                break;
            default:
                $content = $this->afficherAccueil();
        }
        $app = Slim::getInstance();
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
    <link rel="stylesheet" type="text/css" href="css/banderole.css">
    <link href="open-iconic-master/font/css/open-iconic-bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/connexion.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="js/banderole.js"></script>
    <script src="js/onglets.js"></script>
    
    <title>PanierPiano</title>
</head>
            $banderole
            <body>
                <div>
                    $content
                 </div>
                 
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
END;
        return $html;
    }

}