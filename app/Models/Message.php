<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['name', 'email', 'message'];

    // Si votre table de messages a des colonnes "created_at" et "updated_at"
    public $timestamps = true;

    // Définissez les éventuelles relations avec d'autres modèles ici
}
