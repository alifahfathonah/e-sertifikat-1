<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Roles extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'roles_id', 'id');
    }

    public function permission()
    {
        return $this->hasMany('Spatie\Permission\Models\Permission', 'id', 'role_id');
    }

}
