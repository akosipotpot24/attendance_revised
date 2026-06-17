<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Cast\Attribute;

class Student extends Model
{
    //
     protected $fillable = [
    'id_number',
    'firstname',
    'middlename',
    'lastname',
    'school_role',
    'library_branch',
    'section',
    'avatar'
];

protected function avatar(): Attribute{
    return Attribute::make(get:function($value){
        return $value ? '/storage/avatars/'. $value : '/default.png';
    });
}

}
