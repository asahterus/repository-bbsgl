<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'hide_email',
        'title',
        'given_name',
        'family_name',
        'department',
        'organization',
        'address',
        'country',
        'homepage_url',
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Log only the attributes that are changed.
     *
     * @var bool
     */
    protected static $logOnlyDirty = true;

    public function tapActivity($activity, $eventName)
    {
        if ($eventName === 'updated') {
            $activity->log_name = 'profile_update';
            $activity->description = "User {$this->name} updated their profile.";
        } elseif ($eventName === 'login') {
            $activity->log_name = 'user_login';
            $activity->description = "User {$this->name} has logged in.";
        }
    }

    /**
     * Mengatur opsi logging aktivitas.
     *
     * @return LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'email', 'hide_email', 'title', 'given_name', 'family_name', 'department', 'organization', 'address', 'country', 'homepage_url'])
            ->setDescriptionForEvent(fn(string $eventName) => "User {$eventName}")
            ->useLogName('user_activity');
    }
}
