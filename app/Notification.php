<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = "notification";

    public function user(){
        return $this->belongsTo('app\User','id_user','id');
    }
}