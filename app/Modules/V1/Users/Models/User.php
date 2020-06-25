<?php

namespace App\Modules\V1\Users\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
   protected $table = 'tbl_user';	
   protected $fillable = 
   [
   		'nama',
   		'jk',
   		'tgl_lahir',
   		'alamat',
        'no_hp'
   ];
}
