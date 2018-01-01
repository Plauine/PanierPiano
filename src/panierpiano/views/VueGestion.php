<?php
/**
 * Created by PhpStorm.
 * User: Hermine
 * Date: 01/01/2018
 * Time: 18:08
 */

namespace panierpiano\views;


use panierpiano\models\Categorie;
use panierpiano\models\Contient;
use Slim\Slim;

class VueGestion{

    private $array;
    private $rootLink;

    public function __construct($parray = null){
        $this->array = $parray;
        $this->rootLink = Slim::getInstance()->urlFor("Home");
    }

    private function banderole(){
        if(isset($_SESSION['connecte'])){
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
                <a class=\"nav-link\" href='".$this->rootLink."afficherProduits'>
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

    private function supprimerProduit(){
        $produit = $this->array;
        $contient = Contient::where("id_produit","=",$produit->id_produit)->get();
        foreach ($contient as $c){
            $c->delete();
        }
        $produit->delete();
        $app = Slim::getInstance();
        $redirect = $this->rootLink.'afficherProduits';
        $app->redirect($redirect);
    }

    private function gererProduit(){
        $produit = $this->array;

        $var = "<script src=\"js/onglets.js\"></script>";
        $var .= "<script src=\"js/editarticles.js\"></script>";
        $var .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/editarticle.css\">";

        $var .= "<section><div class=\"container\">";

		$var .= "<div class=\"row\">";
		$var .= "<div class=\"col-12 btn-toolbar justify-content-center\" role=\"toolbar\" aria-label=\"Toolbar with button groups\">";
        $var .= "<div class=\"btn-group mr-2\" role=\"group\" aria-label=\"First group\" data-toggle=\"buttons\">";
        $var .= "<label class=\"btn btn-secondary\">";
        $var .= "<input type=\"radio\" name=\"options\" id=\"onglet1\" class=\"onglet\" autocomplete=\"off\"/> Modifier un produit</label>";
        $var .= "<label class=\"btn btn-secondary\">";
        $var .= "<input type=\"radio\" name=\"options\" id=\"onglet2\" class=\"onglet\" autocomplete=\"off\"/> Modifier une catégorie</label></div></div></div>";
		$var .= "<div class=\"col-12\" id=\"sub1\">";
        $var .= "<div class=\"col\" id=\"etape11\">";
        $var .= "<h4>Sélectionner le produit à modifier</h4>";
        $var .= "<div class=\"row justify-content-center\">";
        $var .= "<div class=\"col-4\">";
        $var .= "<div class=\"row\">";
        $var .= "<select class=\"custom-select add-marg-top\">";
        $var .= "<option>Catégorie 1</option>";
        $var .= "<option>Catégorie 2</option>";
        $var .= "<option>Catégorie 3</option>";
        $var .= "<option>Catégorie 4</option></select>";
        $var .= "<input type=\"text\" class=\"form-control add-marg-top\" placeholder=\"Nom du produit\"/></div></div>";
        $var .= "<button disabled=\"true\" onclick=\"lancerEtape2('1')\" type=\"button\" class=\"btn btn-info\" id=\"selectionner\">Modifier la sélection</button></div></div></div>";
        $var .= "<div class=\"col hidden\" id=\"etape21\">";
        $var .= "<h4 id=\"addId1\">Modifier le produit </h4>";
        $var .= "<button onclick=\"annulerEtape2('1')\" type=\"button\" class=\"btn btn-danger\">Annuler</button>";
        $var .= "<form method='post' action=".$this->rootLink."modificationProduit/".$produit->id_produit.">";
        $var .= "<div class=\"row justify-content-center\">";
        $var .= "<div class=\"col-4\">";
        $var .= "<input type=\"text\" class=\"form-control\" placeholder=\"Nom du produit\" name='nom_produit'/></div>";
        $var .= "<div class=\"col-4\">";
        $var .= "<select class=\"custom-select\">";
		$categories = Categorie::all();
		foreach ($categories as $categorie) {
            $var .= "<option name='categorie'>$categorie->nom_categorie</option>";
        }
        $var .= "</select></div></div>";
        $var .= "<div class=\"row justify-content-around\">";
        $var .= "<div class=\"col-8\">";
        $var .= "<textarea class=\"form-control\" rows=\"5\" id=\"comment\" placeholder=\"Description\" name='description'></textarea></div></div>";
        $var .= "<div class=\"row justify-content-center\">";
        $var .= "<div class=\"col-4\">";
        $var .= "<input type=\"submit\" class=\"btn btn-outline-success\" value='Enregistrer'/><span class=\"oi oi-check\"></span></div></div></form></div>";
        $var .= "</div>";

        // MODIFICATION DES CATEGORIES
        /**$var .= "<div class=\"col-12\" id=\"sub2\">
				<div class=\"col\" id=\"etape12\">
					<h4>Sélectionner la catégorie à modifier</h4>
					<div class=\"row justify-content-center\">
						<div class=\"col-4\">
							<div class=\"row\">
								<select class=\"custom-select add-marg-top\">
									<option selected>Choisir cat.</option>
									<option value=\"Catégorie 1\">Catégorie 1</option>
									<option value=\"Catégorie 2\">Catégorie 2</option>
									<option value=\"Catégorie 3\">Catégorie 3</option>
									<option value=\"Catégorie 4\">Catégorie 4</option>
								</select>
								<button onclick=\"lancerEtape2('2')\" type=\"button\" class=\"btn btn-info\" id=\"selectionner\">Modifier la sélection</button>
							</div>
						</div>
					</div>
				</div>
				<div class=\"col hidden\" id=\"etape22\">
					<h4 id=\"addId2\">Modifier la catégorie </h4>
					<button onclick=\"annulerEtape2('2')\" type=\"button\" class=\"btn btn-danger\">Annuler</button>
					<form>
						<div class=\"row justify-content-center\">
							<div class=\"col-4\">
								<input type=\"text\" class=\"form-control\" placeholder=\"Nom du produit\">
							</div>
							<div class=\"col-4\">
								<select id=\"sel-et2\" class=\"custom-select\">
									<option>Catégorie 1</option>
									<option>Catégorie 2</option>
									<option>Catégorie 3</option>
									<option>Catégorie 4</option>
								</select>
							</div>
						</div>
						<div class=\"row justify-content-around\">
							<div class=\"col-8\">
								<textarea class=\"form-control\" rows=\"5\" placeholder=\"Description\"></textarea>
							</div>
						</div>
						<div class=\"row justify-content-center\">
							<div class=\"col-8\">
								<input type=\"text\" class=\"form-control\" placeholder=\"Nom du produit\">
							</div>
						</div>
						<div class=\"row justify-content-center\">
							<div class=\"col-4\">
								<button type=\"submit\" class=\"btn btn-outline-success\">
									Enregistrer
									<span class=\"oi oi-check\"></span>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>*/
	    $var .= "</div></section>";
        return $var;
    }

    private function modificationProduit(){

        $app = Slim::getInstance();

        $produit = $this->array;
        $postnom = $app->request->post('nom_produit');
        $postcategorie = $app->request->post('categorie');
        $postdescr = $app->request->post('description');

        $produit->nom_produit = $postnom;
        $cat = Categorie::where("nom_categorie","=",$postcategorie)->first();
        $idcat = $cat->id_categorie;
        $produit->id_categorie = $idcat;
        $produit->descr_produit = $postdescr;
        $produit->save();

        $redirect = $this->rootLink.'afficherProduits';
        $app->redirect($redirect);

    }

    public function render($id){
        switch ($id){
            case 1:
                $this->supprimerProduit();
                break;
            case 2:
                $content = $this->gererProduit();
                break;
            case 3:
                $this->modificationProduit();
                break;
            default :
                $this->supprimerProduit();
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