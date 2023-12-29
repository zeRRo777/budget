<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Month extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'name', 'year_id', 'index'
    ];

    public function year(): BelongsTo
    {
        return $this->belongsTo(Year::class);
    }

}
