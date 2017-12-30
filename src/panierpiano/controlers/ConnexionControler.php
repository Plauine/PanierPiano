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

}