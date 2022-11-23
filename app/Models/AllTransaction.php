<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllTransaction extends Model
{
    use HasFactory;
    //public $timestamps = false;
    protected $table = 'all_transaction';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'address', 'contact_number', 'transaction_date', 'tilapia', 'ornamental', 'carp', 'beetle_fish', 'cat_fish', 'type'];
}
