<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
      'code',
      'raisonSociale',
      'formeJuridique',
      'tel',
      'fax',
      'email',
      'adresse',
      'ville'   ,
      'pays'    ,
      'matriculeFiscal',
      'registreCommerce',
      'rib'     ,
      'banque',
      'codeContact',
      'observations'
       ];
  protected $primaryKey = 'code';
  public function contact()
	{
		return $this->belongsTo(Contact::class,'codeContact', 'code');
	}

}
