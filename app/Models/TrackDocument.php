<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackDocument extends Model
{
    use HasFactory;
    protected $table = "track_document";
    protected $fillable = [
        'control_number','adv_approved_by',
        'adviser_approved','adv_app_date',
        'osas_approved_by','osas_approved',
        'osas_app_date','osas_notes','adv_notes'];
}
