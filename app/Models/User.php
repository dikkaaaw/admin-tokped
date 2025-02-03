<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;  // Import Authenticatable
use Illuminate\Notifications\Notifiable;  // Import Notifiable jika menggunakan notifikasi

class User extends Authenticatable  // Extend Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'address', 'is_admin'];
    protected $hidden = ['password'];
    public $timestamps = false;

    public function filter($filter = [])
    {
        return $this->when(isset($filter['search']), function ($query) use ($filter) {
            return $query->where('name', 'like', "%{$filter['search']}%");
        })
            ->when(isset($filter['is_admin']), function ($query) use ($filter) {
                return $query->where('is_admin', $filter['is_admin']);
            });
    }
}
