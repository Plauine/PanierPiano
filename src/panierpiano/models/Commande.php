<?php
/**
 * Created by PhpStorm.
 * User: Hermine
 * Date: 05/01/2018
 * Time: 01:42
 */

namespace panierpiano\models;

use \Illuminate\Database\Eloquent\Model as Model;

class Commande extends Model{

    protected $table = 'commande';
    protected $primaryKey = 'id_commande';
    public $timestamps = false;

    public function vendeur(){
        return $this->belongsTo('panierpiano\models\Vendeur','id_vendeur');
    }

    public function client(){
        return $this->belongsTo('panierpiano\models\Client','id_client');
    }

}