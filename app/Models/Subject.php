<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = ['name'];

    // public function eprints()
    // {
    //     return $this->belongsToMany(Eprint::class, 'eprint_subject', 'subject_id', 'eprint_id');
    // }
}
