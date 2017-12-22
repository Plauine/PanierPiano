<?php
/**
 * Created by PhpStorm.
 * User: Hermine
 * Date: 22/12/2017
 * Time: 14:17
 */

namespace panierpiano\models;

use \Illuminate\Database\Eloquent\Model as Model;

class Vendeur extends Model{

    protected $table = 'vendeur';
    protected $primaryKey = 'id_vendeur';
    public $timestamps = false;

}