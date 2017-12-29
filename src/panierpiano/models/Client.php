<?php
/**
 * Created by PhpStorm.
 * User: Hermine
 * Date: 27/12/2017
 * Time: 19:15
 */

namespace panierpiano\models;

use \Illuminate\Database\Eloquent\Model as Model;

class Client extends Model{

    protected $table = 'client';
    protected $primaryKey = 'id_client';
    public $timestamps = false;


}