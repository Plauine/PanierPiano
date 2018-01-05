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
use panierpiano\models\Vendeur;
use panierpiano\models\Contient;
use Slim\Slim;

class VueCatalogue{

    private $array;
    private $rootLink;

    public function __construct($parray=null){
        $this->array = $parray;
        $this->rootLink = Slim::getInstance()->urlFor("Home");
    }

    private function afficherAccueil(){
        // Introduction du site
        $var = "<section>";

        $var .= "<div class=\"container\">";
        $var .= "<h1>PanierPiano</h1>";
        $var .= "<h2>Le site communautaire d'achat</h2>";
        $var .= "<p>Vous êtes artisant, auto-entrepreneur, paysan d'une amap ou épicier et cherchez à vendre vos produits?</p>";
        $var .= "<p>Vous cherchez des produits locaux vendus directement par les producteurs?</p>";
        $var .= "<p id=\"bienvenue\">Bienvenue sur Panier Piano!</p>";
        $var .= "</div>";
        $var .= "</section>";

        return $var;
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

    private function afficherProduits(){

        $var = "<section>
	<div class='container'>
		<div class='btn-toolbar justify-content-around row' role='toolbar' aria-label='Toolbar with button groups'>
		  <div class='btn-group mr-2' role='group' aria-label='First group' data-toggle='buttons'>
		    <label class='btn btn-secondary active'>
		        <input type='radio' name='options' id='onglet1' class='onglet' autocomplete='off' checked/> Tous les articles
		    </label>";

        $categories = Categorie::where("id_vendeur","=",$_SESSION['id'])->get();

        $id = 2;
        foreach ($categories as $cat){
            $var .= "<label class='btn btn-secondary'>";
            $var .= "<input type='radio' name='options' id='onglet$id' class='onglet' autocomplete='off'/>$cat->nom_categorie</label>";
            $id += 1;
        }
        $var .= "</div></div>";
        $var .= "<div class='row justify-content-center'>";
        $var .= "<form>";
		$var .= "<div class='col-3'>";
        $var .= "<button type='submit' formaction='".$this->rootLink."ajouterProduit' class='btn btn-outline-info'>Nouveau produit";
        $var .= "<span class='oi oi-plus'></span></button></div>";
        $var .= "<div class='col-3'>";
        $var .= "<button type='submit' formaction='".$this->rootLink."ajouterCategorie' class='btn btn-outline-info'>Nouvelle catégorie";
        $var .= "<span class='oi oi-star'></span></button></div>";
        $var .= "<div class='col-3'>";
        $var .= "<button type='submit' formaction='".$this->rootLink."recupererCategorie' class='btn btn-outline-info'>Supprimer catégorie";
        $var .= "<span class='oi oi-star'></span></button></div>";
        $var .= "<div class='col-3'>";
        $var .= "<button type='submit' formaction='".$this->rootLink."modifierCategorie' class='btn btn-outline-info'>Modifier catégorie";
        $var .= "<span class='oi oi-star'></span></button></div>";
        $var .= "</from></div>";
		$var .= "<div class='row'>";
		$var .=	"<table id='sub1' class='table table-striped'>";
        $var .= "<thead class='thead-light'>";
        $var .= "<tr>";
        $var .= "<th scope='col'>ID</th>";
        $var .= "<th scope='col'>Produit</th>";
        $var .= "<th scope='col'>Catégorie</th>";
        $var .= "<th scope='col'>Date d'ajout</th>";
        $var .= "<th scope='col'>Prix unit.</th>";
        $var .= "<th scope='col'>Actions</th></tr>";
        $var .= "</thead>";
        $var .= "<tbody>";

        foreach ($categories as $cat) {
            $produits = Produit::where("id_categorie","=",$cat->id_categorie)->get();
            foreach ($produits as $produit) {
                $var .= "<tr>";
                $var .= "<th scope='row'>$produit->id_produit</th>";
                $var .= "<td><a href='" . $this->rootLink . "produit/" . $produit->id_produit . "'>$produit->nom_produit</a></td>";
                $categ = $produit->categorie()->first();
                $var .= "<td><a href='" . $this->rootLink . "categorie/" . $categ->id_categorie . "'>$categ->nom_categorie</a></td>";
                $var .= "<td>$produit->date_ajout</td>";
                $var .= "<td>$produit->prix €</td>";
                $var .= "<td><a href='" . $this->rootLink . "gerer/" . $produit->id_produit . "' class='oi oi-pencil action'></a>";
                $var .= "<a href='" . $this->rootLink . "supprimer/" . $produit->id_produit . "' class='oi oi-x action'></a></td>";
                $var .= "</tr>";
            }
        }
        $var.= "</tbody></table>";

        $id = 2;
        foreach ($categories as $cat){
            $var .= "<table id='sub$id' class='table table-striped'>";
            $var .= "<thead class='thead-light'>";
            $var .= "<tr><th scope='col'>ID</th>";
            $var .= "<th scope='col'>Produit</th>";
            $var .= "<th scope='col'>Date d'ajout</th>";
            $var .= "<th scope='col'>Prix unit.</th>";
            $var .= "<th scope='col'>Actions</th></tr></thead>";

            $var .= "<tbody>";

            foreach ($this->array as $produit) {
                if ($produit->id_categorie == $cat->id_categorie) {
                    $var .= "<tr>";
                    $var .= "<th scope='row'>$produit->id_produit</th>";
                    $var .= "<td><a href='" . $this->rootLink . "produit/" . $produit->id_produit . "'>$produit->nom_produit</a></td>";
                    $cat = $produit->categorie()->first();
                    $var .= "<td>$produit->date_ajout</td>";
                    $var .= "<td>$produit->prix €</td>";
                    $var .= "<td><a href='" . $this->rootLink . "gerer/" . $produit->id_produit . "' class='oi oi-pencil action'></a>";
                    $var .= "<a href='" . $this->rootLink . "supprimer/" . $produit->id_produit . "' class='oi oi-x action'></a></td>";
                    $var .= "</tr>";
                }
            }
            $var .= "</tbody></table>";

            $id += 1;

        }
        $var .= "</div></div></section>";

        return $var;
    }

    private function afficherProduitsClient(){

        $var = "<script src=\"$this->rootLink/js/editarticles.js\"></script>";

        $var .= "<section><div class=\"container\">";
        $var .= "<div class=\"row\">";
        $var .= "<div class=\"col-8\">";
        $var .= "<div class='row justify-content-between'><h3>Les articles</h3></div>";
        $var .="<table class=\"table table-striped\">";
        $var .= "<thead class=\"thead-light\">";
        $var .= "<tr>";
        $var .= "<th scope=\"col\">Article</th>";
        $var .= "<th scope=\"col\">Marchand</th>";
        $var .= "<th scope=\"col\">Catégorie</th>";
        $var .= "<th scope=\"col\">Prix unit.</th>";
        $var .= "<th scope=\"col\">Actions</th>";
        $var .= "</tr></thead><tbody>";
        $produits = $this->array;
        foreach ($produits as $produit){
            $var .= "<tr>";
			$var .="<th scope=\"row\"><a href='" . $this->rootLink . "produit/" . $produit->id_produit . "'>$produit->nom_produit</a></th>";
            $cat = $produit->categorie()->first();
            $vendeur = Vendeur::where("id_vendeur","=",$cat->id_vendeur)->first();
            $var .= "<td>$vendeur->nom_vendeur</td>";
            $var .= "<td><a href='" . $this->rootLink . "categorie/" . $cat->id_categorie . "'>$cat->nom_categorie</a></td>";
            $var .= "<td>$produit->prix €</td>";
            $var .= "<td><a href='".$this->rootLink."ajouterProduit/".$produit->id_produit."'><span class=\"oi oi-plus action\"></span></td>";
            $var .= "</tr>";
		}
		$var .= "</tbody></table></div>";
		if(isset($_SESSION['panier'])) {
            $id = $_SESSION['panier']->id_commande;
            $var .= "<div class=\"col-4\">
				<div class=\"row justify-content-between\">
					<h3>Mon panier</h3>
					<button class=\"btn btn-outline-success\"><a href='".$this->rootLink."validerPanier/".$id."'>Valider le panier</a></button>
				</div>
				<table class=\"table table-striped\" id=\"table-right\">
					<thead class=\"thead-light\">
						<tr>
					    	<th scope=\"col\">Article</th>
					    	<th scope=\"col\">Prix unit.</th>
						</tr>
					</thead>
					<tbody>";
            $produits = Contient::where('id_commande','=',$id)->get();
            foreach($produits as $contient){
                $p = Produit::where('id_produit','=',$contient->id_produit)->first();
                $var .="<tr>";
                $var .="<td>$p->nom_produit</td>";
                $var .= "<td>$p->prix €</td></tr>";
			}
			$var .= "</tbody></table>";
            $var .= "<div class=\"row justify-content-between\"><p>Total: ".$_SESSION['montant']." €</p></div></div>";
        }

        $var .= "</div></div></section>";

        return $var;
    }

    private function detailProduit(){
        $produit = $this->array;
        $cat = $produit->categorie()->first();
        $vendeur = $cat->vendeur()->first();

        $var = "<div class=\"container\">";

        // Image et prix
        $var .= "<div id='gauche'><div id='imgarticle'>";
        $var .= "<img class='img_produit' src='../Images/produits/$produit->image_produit_1'/>";
        $var .= "</div>";
        $var .= "<div id='prixarticle'>";
        $var .= "<p>$produit->prix €</p>";
        $var .= "</div></div>";

        // Detail du produit
        $var .= "<div id=\"droite\">";
        $var .= "<div id=\"detail\">";
        $var .= "<table>";
        $var .= "<tr>";
        $var .= "<td>$produit->nom_produit</td>";
        $var .= "<td>$produit->id_produit</td>";
        $var .= "</tr>";
        $var .= "<tr>";
        $var .= "<td><a href='".$this->rootLink."categorie/".$cat->id_categorie."'>Catégorie : $cat->nom_categorie</a></td>";
        $var .= "<td>Vendu par : $vendeur->nom_vendeur</td>";
        $var .= "</tr>";
        $var .= "</table>";
        $var .= "</div>";

        // Description du produit
        $var .= "<div id=\"description\">";
        $var .= "<p>Description du produit: </p><p>$produit->descr_produit</p>";
        $var .= "</div></div>";

        $var .= "</div>";

        return $var;
    }

    private function detailCategorie(){
        $cat = $this->array;
        $vendeur = $cat->vendeur()->first();

        $var = "<div class=\"container\">";

        $var .= "<div id=\"droite\"><div id='detail'>";
        $var .= "<table>";
        $var .= "<tr>";
        $var .= "<td>$cat->nom_categorie</td>";
        $var .= "<td>$cat->id_categorie</td>";
        $var .= "</tr>";
        $var .= "<tr>";
        $var .= "<td>Vendeur : $vendeur->nom_vendeur</td>";
        $var .= "</tr>";
        $var .= "</table>";
        $var .= "</div>";
        $var .= "<div id='description'>";
        $var .= "<p>Description de la catégorie: <p>$cat->descr_categorie</p></p>";
        $var .= "</div></div>";

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
            case 4:
                $content = $this->afficherProduitsClient();
                break;
            default:
                $content = $this->afficherAccueil();
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