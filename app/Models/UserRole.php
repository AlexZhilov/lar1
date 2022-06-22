<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    public const ROLE = [
        'user'      => 1,
        'manager'   => 2,
        'admin'     => 15
    ];
    public $timestamps = false;
    protected $table = 'users_roles';


    public function users()
    {
        return $this->hasMany(User::class, 'id', 'role_id');
    }
}
