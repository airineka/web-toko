<?php

namespace App\Models\Perpustakaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Perpustakaans extends Model
{
    use HasFactory;
    protected $fillable = [
        "nama_buku",
        "penerbit",
        "user_id",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
