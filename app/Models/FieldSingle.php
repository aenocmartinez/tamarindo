<?php

namespace App\Models;

use App\Interfaces\FieldInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FieldSingle extends Field implements FieldInterface
{
    use HasFactory;

    protected $table = 'fields'; 

    protected $fillable = ['id', 'name', 'created_at', 'updated_at'];

    public function isComposite(): bool {
        return false;
    }
}
