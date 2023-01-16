<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    protected $fillable = [
    'types',
    'authors',
    'title',
    'website_name',
    'book_title',
    'periodic_title',
    'publishing',
    'newspaper_name',
    'locality',
    'district',
    'year',
    'day',
    'month',
    'pages',
    'book_author',
    'url'
    ];
}
