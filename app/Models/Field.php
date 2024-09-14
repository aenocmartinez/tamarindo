<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Field extends Model
{
    use HasFactory;

    public function hasSubfields(): bool
    {
        return DB::table('subfields')
            ->where('field_id', $this->id)
            ->exists();
    }    
}
