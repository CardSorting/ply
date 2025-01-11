<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'pokemon_cards';
    
    protected $fillable = [
        'name',
        'type',
        'hp',
        'category',
        'length',
        'weight',
        'attacks',
        'weakness',
        'resistance',
        'retreat_cost',
        'description',
        'image_url',
        'card_number',
        'artist',
        'set',
        'year'
    ];

    protected $casts = [
        'attacks' => 'array',
        'hp' => 'integer',
        'retreat_cost' => 'integer'
    ];

    public function setAttacksAttribute($value)
    {
        $this->attributes['attacks'] = is_array($value) ? json_encode($value) : $value;
    }

    public function getAttacksAttribute($value)
    {
        return json_decode($value, true) ?? [];
    }
}
