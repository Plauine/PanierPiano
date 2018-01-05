<?php
/**
 * Created by PhpStorm.
 * User: Hermine
 * Date: 27/12/2017
 * Time: 19:17
 */

namespace panierpiano\controlers;

use panierpiano\models\Client;
use panierpiano\views\VueConnexion;
use panierpiano\models\Vendeur;

class ConnexionControler{

    public function connexion(){
        $vue = new VueConnexion();
        echo $vue->render(0);
    }

    public function inscriptionClient(){
        $vue = new VueConnexion();
        echo $vue->render(1);
    }

    public function inscriptionVendeur(){
        $vue = new VueConnexion();
        echo $vue->render(2);
    }

    public function connexionUtilisateur(){
        $vue = new VueConnexion();
        echo $vue->render(3);
    }

    public function afficherCompteClient($id){
        $q = Client::where('id_client','=',$id)->first();
        $vue = new VueConnexion($q);
        echo $vue->render(4);
    }

    public function afficherCompteVendeur($id){
        $q = Vendeur::where('id_vendeur','=',$id)->first();
        $vue = new VueConnexion($q);
        echo $vue->render(5);
    }

    public function deconnexion(){
        $vue = new VueConnexion();
        echo $vue->render(6);
    }

}