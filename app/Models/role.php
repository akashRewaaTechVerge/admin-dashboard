<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Models\Permission;

class role extends Model {
    use HasFactory,HasRoles;

    protected $table = 'roles';
    protected $fillable = [
        'name', 'guard_name',
    ];

     public function comptes()
    {
        return $this->hasMany('App\Compte') ;
    }

}
