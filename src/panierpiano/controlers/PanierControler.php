<?php
/**
 * Created by PhpStorm.
 * User: Hermine
 * Date: 04/01/2018
 * Time: 22:49
 */

namespace panierpiano\controlers;


use panierpiano\models\Commande;
use panierpiano\models\Produit;
use panierpiano\views\VuePanier;

class PanierControler{

    public function ajoutProduit($id){
        $q = Produit::where("id_produit","=",$id)->first();
        $vue = new VuePanier($q);
        echo $vue->render(1);
    }

    public function validerPanier($id){
        $q = Commande::where('id_commande','=',$id)->first();
        $vue = new VuePanier($q);
        echo $vue->render(2);
    }
}