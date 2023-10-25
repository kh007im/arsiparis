<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classification extends Model
{
    use HasFactory;

    protected $fillable = [
        'cls_kode',
        'cls_namakode',
        'cls_nmrkode',
        'cls_keterangan',
    ];

    public function outgoingletters(): HasMany
    {
        return $this->hasMany(Outgoingletter::class);
    }
}
