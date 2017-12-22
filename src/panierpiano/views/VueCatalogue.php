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

    public function __construct($arrayProduit=null){
        $this->array = $arrayProduit;
    }

    private function afficherAccueil(){
        $var = "<div class='Menu'> Menu </div>";
        $var .= "<div>";
        $var .= "<center/><h1> Panier Piano </h1>";
        $var .= "<center/><h2> Le site communautaire d'achat</h2>";
        $var .= "<center/><p class ='explication'>Lorem ipsum</p>";
        $var .= "</div>";
        return $var;
    }

    private function afficherProduits(){
        $var = "<center><ul>";
        foreach ($this->array as $produit) {
            $var.= "<div class='col-lg-3 col-md-4 col-xs-6 thumb tailleThumb'>";
            $cat = $produit->categorie()->first();
            $var.="<a href='prestation/'.$produit->id_produit> <li>$produit->nom_produit</li></a>";
            $var.= "<li>$cat->nom_categorie</li>";
            $var.="<li>$produit->prix €</li>";
            $vendeur = $cat->vendeur()->first();
            $var.= "<li>Vendu par: $vendeur->nom_vendeur</li>";
            $var.="<img class='img_produit' src='../Images/produits/$produit->image_produit_1' />";
            $var.="</div>";
        }
        $var.= "</ul></center>";
        return $var;
    }

    private function detailProduit(){
        $produit = $this->array;
        $cat = $produit->categorie()->first();
        $var = "<div>";
        $var .= "<h1>$produit->nom_produit </h1>";
        $var .= "<ul>";
        $var .= "<li>Pour en savoir un peu plus sur le produit : $produit->descr_produit</li>";
        $var .= "<li>$produit->prix €</li>";
        $var .= "<li>Catégorie : $produit->prix €</li>";
        $var.="<li><img class='img_produit' src='../Images/produits/$produit->image_produit_1'/></li>";
        $var.="<li><img class='img_produit' src='../Images/produits/$produit->image_produit_2' /></li>";
        $var.="<li><img class='img_produit' src='../Images/produits/$produit->image_produit_3' /></li>";
        $var .= "</ul></div>";
    }


    public function render($id=0){
        switch ($id){
            case 1 :
                $content = $this->afficherProduits();
                break;
            default:
                $content = $this->afficherAccueil();
        }
        $app = Slim::getInstance();
        $urlHome= $app->urlFor("Home");
        $urlAfficherProduits = $app->urlFor("afficherProduits");
        $html = <<<END
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>PanierPiano</title>
</head>
            <body>
                <ul>
                    <li role="presentation" class="active"><a href="$urlHome">Home</a></li>
                    <!-- Ici se trouvera la banderole --> 
                </ul>
                <div>
                    $content
                 </div>
                 
                 <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="crossorigin="anonymous"></script>
                 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
            </body>
<html>
END;
        return $html;
    }

}