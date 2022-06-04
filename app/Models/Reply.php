<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'body',
    ];

    public function attachments() {
        return $this->hasMany(Attachment::class);
    }

    public function ticket() {
        return $this->belongsTo(Ticket::class);
    }
}
