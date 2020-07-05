<?php
 
namespace App\Models;
 
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticate;
 
class Admin extends Authenticate
{
    use Notifiable;
 
    protected $guard = 'admin';
 
    protected $fillable = [
        'name', 'email', 'password',
    ];
 
    protected $hidden = [
        'password', 'remember_token',
    ];
}
