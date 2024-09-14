<?php

namespace App\Models;

use App\Interfaces\FieldInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FieldComposite extends Field implements FieldInterface
{
    use HasFactory;

    protected $table = 'fields'; 

    protected $fillable = ['id', 'name', 'created_at', 'updated_at'];
    

    public function subfields(): BelongsToMany
    {
        return $this->belongsToMany(Field::class, 'subfields', 'field_id', 'subfield_id')
                    ->withPivot('order') 
                    ->orderBy('pivot_order'); 
    }    

    public function isComposite(): bool {
        return true;
    }    
}
