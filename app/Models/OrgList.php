<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrgList extends Model
{
    use HasFactory;
    protected $table = "org_list";
    protected $fillable = ['name'];

    // public function chords()
    // {
    //     return $this->hasMany(Chords::class, 'author_id', 'id');
    // }

    // public function lyrics()
    // {
    //     return $this->hasMany(Lyric::class, 'author_id', 'id');
    // }
}
