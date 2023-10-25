<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Incomingletter extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'il_noagenda',
        'il_nosurat',
        'il_tglsurat',
        'il_tglterima',
        'il_perihal',
        'il_asal',
        'il_isiringkas',
        'il_file',
    ];

    public function session(): BelongsTo
    {
        return $this->belongsTo(Session::class)->where('status_aktif', 1);
    }

    public function disposition(): BelongsTo
    {
        return $this->belongsTo(Disposition::class);
    }
}
