<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public $timestamps =true;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'timestamps'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function jobs()
    {
        return $this->hasMany(Job::class,'client_id');
    }

    public function latestJob()
    {
        return $this->hasOne(Job::class,'client_id')->latestOfMany();
    }

    public function clientPayment(){
        return $this->hasMany(Payment::class, 'client_id');
    }

    public function agentPayment(){
       return $this->hasMany(Payment::class, 'agent_id');
    }

    // public function isAdmin(){
    //     return $this->role === 'admin';
    // }
    public function isAdmin(){
        return $this->belongsTo(Role::class,'role_id')->where('name','admin');
    }
}
