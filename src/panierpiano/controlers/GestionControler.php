<?php
/**
 * Created by PhpStorm.
 * User: Hermine
 * Date: 01/01/2018
 * Time: 18:08
 */

namespace panierpiano\controlers;

use panierpiano\models\Categorie;
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

    public function ajouterProduit(){
        $vue = new VueGestion();
        echo $vue->render(4);
    }

    public function ajoutProduit(){
        $vue = new VueGestion();
        echo $vue->render(5);
    }

    public function modifierCat(){
        $vue = new VueGestion();
        echo $vue->render(6);
    }

    public function modifCat(){
        $vue = new VueGestion();
        echo $vue->render(7);
    }

    public function modifierCategorie($id){
        $q = Categorie::where("id_categorie","=",$id)->first();
        $vue = new VueGestion($q);
        echo $vue->render(8);
    }

    public function enregistrerModif($id){
        $q = Categorie::where("id_categorie","=",$id)->first();
        $vue = new VueGestion($q);
        echo $vue->render(9);
    }

    public function recupererCategorie(){
        $vue = new VueGestion();
        echo $vue->render(10);
    }

    public function supprCategorie(){
        $vue = new VueGestion();
        echo $vue->render(11);
    }

    public function ajouterCategorie(){
        $vue = new VueGestion();
        echo $vue->render(12);
    }

    public function ajoutCategorie(){
        $vue = new VueGestion();
        echo $vue->render(13);
    }
}