<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function menu()
    {
        return $this->belongsTo('App\Models\Menu', 'menu_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\User', 'roles_id', 'id');
    }

    public function asrole()
    {
        return $this->hasOne('Spatie\Permission\Models\Role', 'role_id', 'id');
    }

}
