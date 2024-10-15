<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    protected $table ='uploaded'

    protected $fillable = [
        'First Name',
        'Last Name',
        'Company',
        'Phone Number',
        'Email Address',
        'Foto KTP',
        'Video',
    ];
}