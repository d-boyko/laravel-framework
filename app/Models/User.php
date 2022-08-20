<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Scopes\UserScope;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Prunable;

//    If the table is non-standard
//    protected $table = 'users';

//    If the primary key is non-standard than 'id'
//    protected $primaryKey = 'user_id';

//    If the primary key is not auto-incrementing integer type
//    public $incrementing = false;

//    If the primary key is not integer
//    protected $keyType = 'string';

//    If you don't want Laravel to change created_at and updated_at automatically
//    public $timestamps = false;

//    If you want to change date format of created_at and updated_at fields
//    protected $dateFormat = 'U';

//    If you want to change names of created_at and updated_at fields
//    CONST CREATED_AT = 'creation_date';
//    CONST UPDATED_AT = 'updated_date';

//    If you want to change standard connection to DB (.env)
//    protected $connection = 'sqlite';

//    Standard values of some fields
//    protected $attributes = [
//        'name' => null,
//    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function post(): HasMany
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    /**
     * Get the prunable model query.
     *
     * @return User
     */
    public function prunable(): User
    {
        return static::where('created_at', '<=', now()->subMonth());
    }

    /**
     * When we want to delete something else after deleting some model.
     *
     * @return void
        public function pruning()
        {
        }
     */

    /**
     * Method "booted" of the model.
     * app/Models/UserScope.php
     *
     * @return void

        protected static function booted()
        {
            static::addGlobalScope(new UserScope());
        }
     */
}
