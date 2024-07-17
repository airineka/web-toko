<?php

namespace App\Models\Perpustakaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Perpustakaans extends Model
{
    use HasFactory;

  /**
   * The fields that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
        "nama_buku",
        "penerbit",
        "user_id",
    ];

  /**
   * Get the user associated with the model.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
