<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoomFacilities extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $hidden = ['room_id'];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
