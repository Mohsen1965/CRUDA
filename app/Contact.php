<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = [
        'codeContact',
        'nom',
        'prenom',
        'fonction',
        'tel',
        'fax',
        'email',
        'observations'
       ];
       protected $primaryKey = 'codeContact';
       public function clients()
{
    return $this->hasMany(Client::class);
}
}
