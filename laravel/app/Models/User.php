<?php
/**
 * @noinspection PhpUndefinedClassInspection
 * @noinspection PhpMissingFieldTypeInspection
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * @var array $fillable
     * @var array $hidden
     * @var array $casts
     */
    protected $fillable = [ 'name', 'email', 'password' ];
    protected $hidden = [ 'password', 'remember_token' ];
    protected $casts = [ 'email_verified_at' => 'datetime' ];
}
