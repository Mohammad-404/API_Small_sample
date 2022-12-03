<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class category_model extends Model
{
    use Notifiable;
    protected $table = 'category';

    protected $fillable = [
        'name',
        'sub_name'
    ];

    public function scopeSelection($query){
        return $query->select('id','name','sub_name');
    }
}
