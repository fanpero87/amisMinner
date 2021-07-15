<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minner extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function dateFormat($value)
    {
        return $this->Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y');
    }
}
