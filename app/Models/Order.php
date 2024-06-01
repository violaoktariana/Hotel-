<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function facilities(): BelongsTo
    {
        return $this->belongsTo(Hotel_Facility::class);
    }
    public function payments(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
}
