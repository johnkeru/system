<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HashPdfDoc extends Model
{
    protected $table = 'signed_pdfs';

    protected $fillable = [
        'hash_pdf',
    ];

    use HasFactory;
}