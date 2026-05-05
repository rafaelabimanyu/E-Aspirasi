<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['tracking_id', 'user_id', 'title', 'description', 'category', 'incident_date', 'location', 'attachment', 'status'])]
class Pengaduan extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tanggapans()
    {
        return $this->hasMany(Tanggapan::class);
    }
}
