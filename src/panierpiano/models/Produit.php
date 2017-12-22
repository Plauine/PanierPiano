<?php
/**
 * Created by PhpStorm.
 * User: Hermine
 * Date: 13/12/2017
 * Time: 11:37
 */

namespace panierpiano\models;

use \Illuminate\Database\Eloquent\Model as Model;

class Produit extends Model{
    protected $table = 'produit';
    protected $primaryKey = 'id_produit';
    public $timestamps = false;

    public function categorie(){
        return $this->belongsTo('panierpiano\models\Categorie','id_categorie');
    }
}