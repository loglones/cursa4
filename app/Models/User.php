<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage; //фасоды для равботы с файлами

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    const ROLE_GUEST = 'guest';

    protected $fillable = [
        'role',
        'active',
        'fio',
        'number_phone',
        'photo',
        'address',
        'email',
        'email_verified_at',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
    ];
    protected $casts = [
        'active' => 'boolean',
        'password' =>  'hashed',
    ];
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isUser(): bool
    {
        return $this->role === self::ROLE_USER;
    }

    public function isGuest(): bool
    {
        return $this->role === self::ROLE_GUEST;
    }
    public function isVerifiedAndActive(): bool
    {
        return $this->hasVerifiedEmail() && $this->active;
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function grades(): HasMany
    {
        return $this->hasMany(UserGrades::class);
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'user_courses')->withTimestamps();

    }

    //аксессор автоматически вызывется при обращении к $user->photo_url
    public function getPhotoUrlAttribute()
    {
        if($this->photo) {
            //фасад для генерации юрл
            return Storage::disk('public')->url('img/' . $this->photo);
        }
        return asset('img/melkov.png');
    }


}
