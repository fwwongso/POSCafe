<?php

namespace App\Models;


use Illuminate\Support\Number;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'desc',
        'type',
        'photo',
    ];

    public static $types = [
        'coffee',
        'non-coffee',
        'milk',
        'tea',
        'mocktail',
    ];

    public function getHargaAttribute()
    {
        return "Rp. " . Number::format($this->price);
    }

    public function getGambarAttribute()
    {
        return $this->photo ? Storage::url($this->photo) : url('noimages.png');
    }
}
