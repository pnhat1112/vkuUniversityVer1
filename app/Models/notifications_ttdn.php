<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notifications_ttdn extends Model
{
    use HasFactory;
    protected $table = 'thongbaottdn';
    public $timestamps = true;
}
