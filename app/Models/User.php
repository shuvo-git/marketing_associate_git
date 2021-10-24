<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Role;
use App\Models\Branch;

class User extends Authenticatable
{
    use  Notifiable;

    

    //protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'employee_id',
        'username',
        'role_id',
        'branch_id',
        'email',
        'image',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRoleName(){
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function getBranchName()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'T24_BR');
    }
}
