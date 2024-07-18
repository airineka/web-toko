<?php

namespace App\Models\Toko;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Toko extends Model
{
    use HasFactory;

  /**
   * The fields that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
        "nama_toko",
        "address",
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
