<?php
/**
 * Created by PhpStorm.
 * User: Hermine
 * Date: 01/01/2018
 * Time: 18:08
 */

namespace panierpiano\controlers;

use panierpiano\models\Produit;
use panierpiano\views\VueGestion;

class GestionControler{

    public function supprimerProduit($id){
        $q = Produit::where("id_produit","=",$id)->first();
        $vue = new VueGestion($q);
        echo $vue->render(1);
    }

    public function gererProduit($id){
        $q = Produit::where("id_produit","=",$id)->first();
        $vue = new VueGestion($q);
        echo $vue->render(2);
    }

    public function modifierProduit($id){
        $q = Produit::where("id_produit","=",$id)->first();
        $vue = new VueGestion($q);
        echo $vue->render(3);
    }

}