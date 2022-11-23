<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'stock';
    protected $primaryKey = 'id';
    protected $fillable = ['tilapia', 'ornamental', 'carp', 'beetle_fish', 'cat_fish', 'date_added'];
}
