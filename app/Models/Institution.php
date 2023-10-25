<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    protected $fillable = [
        'ins_nama', 'ins_email', 'ins_telepon', 'ins_alamat', 'ins_logo',
    ];

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class);
    }
}
