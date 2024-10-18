<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'no_phone',
        'no_ic',
        'no_staff',
        'jawatan_id',
        'bahagian_id',
        'unit_id',
        'level'
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

    // Relation ke table jawatan dimana data di dalam column jawatan_id
    // adalah hak milik daripada table jawatan di column id
    public function jawatan()
    {
        // Jika naming column relation di table users menggunakan naming convention yang laravel sarankan
        // iaitu jawatan_id pada table users
        // dan id pada table jawatan
        // maka kod relation boleh ditulis seperti dibawah ini
        // return $this->belongsTo(Jawatan::class);

        // Sebaliknya jika nama column tidak mengikut naming convention yang laravel sarankan
        // maka perlu tulis kod seperti dibawah ini
        // relation berlaku pada column jawatan_id di table users dan column id di table jawatan
        return $this->belongsTo(Jawatan::class, 'jawatan_id', 'id');
    }

    public function bahagian()
    {
        return $this->belongsTo(Bahagian::class, 'bahagian_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }


}
