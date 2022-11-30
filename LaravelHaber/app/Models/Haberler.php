<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Haberler extends Model
{
    use HasFactory;

    protected $table="haberler";
    protected $fillable=["id","baslik","aciklama","kategori","created_at","updated_at"];


    
}
