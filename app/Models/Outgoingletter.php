<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Outgoingletter extends Model
{
    use HasFactory;

    protected $fillable = [
        'classification_id',
        'institution_id',
        'session_id',
        'ol_noagenda',
        'ol_nosurat',
        'ol_tglsurat',
        'ol_perihal',
        'ol_jenissurat',
        'ol_tglinput',
        'ol_file',
    ];

    public function classification(): BelongsTo
    {
        return $this->belongsTo(outgoingletter::class);
    }

    public function session(): BelongsTo
    {
        return $this->belongsTo(Session::class);
    }

    public function institution(): BelongsTo
    {
        return $this->belongsto(institution::class);
    }
}
