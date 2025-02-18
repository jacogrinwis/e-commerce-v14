<?php

namespace App\Models;

use App\Enums\UserRole;
use App\Models\Product;
use App\Models\Favorite;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Model voor gebruikers
 * Centraal model voor alle gebruikersgegevens en authenticatie
 * 
 * Database eigenschappen:
 * @property int $id Unieke identifier
 * @property string $name Naam van de gebruiker
 * @property string $email E-mailadres
 * @property \Illuminate\Support\Carbon|null $email_verified_at Datum van e-mailverificatie
 * @property string $password Gehashed wachtwoord
 * @property string|null $remember_token Token voor "onthoud mij" functionaliteit
 * @property UserRole $role Gebruikersrol (ADMIN, EDITOR, USER)
 * 
 * Relaties:
 * @property-read \Illuminate\Database\Eloquent\Collection<Product> $favoriteProducts Favoriete producten
 * @property-read \Illuminate\Database\Eloquent\Collection<Favorite> $favorites Favorieten
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Velden die massaal toegewezen kunnen worden
     */
    protected $fillable = [
        'name',     // Gebruikersnaam
        'email',    // E-mailadres
        'password', // Wachtwoord
        'role',     // Gebruikersrol
    ];

    /**
     * Velden die verborgen moeten blijven bij serialisatie
     */
    protected $hidden = [
        'password',       // Wachtwoord
        'remember_token', // Remember me token
    ];

    /**
     * Type casting voor attributen
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class,
        ];
    }

    /**
     * Controleert of gebruiker een admin is
     */
    public function isAdmin(): bool
    {
        return $this->role === UserRole::ADMIN;
    }

    /**
     * Controleert of gebruiker een editor is
     */
    public function isEditor(): bool
    {
        return $this->role === UserRole::EDITOR;
    }

    /**
     * Controleert of gebruiker een normale gebruiker is
     */
    public function isUser(): bool
    {
        return $this->role === UserRole::USER;
    }

    /**
     * Relatie met favorieten
     */
    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }

    /**
     * Relatie met favoriete producten
     */
    public function favoriteProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'favorites')->withTimestamps();
    }

    /**
     * Relatie met beoordelingen
     */
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    /**
     * Relatie met bestellingen
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Relatie met adressen
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }
}
