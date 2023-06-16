<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FaqCategory;

class FaqQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'question', 'answer'];

    public function category()
    {
        return $this->belongsTo(FaqCategory::class, 'category_id');
    }
    
}

