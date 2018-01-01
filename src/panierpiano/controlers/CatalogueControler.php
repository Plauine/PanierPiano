<?php
/**
 * Created by PhpStorm.
 * User: Hermine
 * Date: 13/12/2017
 * Time: 11:39
 */

namespace panierpiano\controlers;

use panierpiano\models\Categorie;
use panierpiano\models\Produit;
use panierpiano\views\VueCatalogue;

class CatalogueControler{

    public function afficherAccueil(){
        $vue = new VueCatalogue();
        echo $vue->render(0);
    }

    public function afficherProduits(){
        $q = Produit::all();
        $vue = new VueCatalogue($q);
        echo $vue->render(1);
    }

    public function detailProduit($id){
        $q = Produit::where("id_produit","=",$id)->first();
        $vue = new VueCatalogue($q);
        echo $vue->render(2);
    }

    public function detailCategorie($id){
        $q = Categorie::where("id_categorie","=",$id)->first();
        $vue = new VueCatalogue($q);
        echo $vue->render(3);
    }

    public function afficherProduitsClient(){
        $q = Produit::all();
        $vue = new VueCatalogue($q);
        echo $vue->render(4);
    }
}