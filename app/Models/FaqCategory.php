<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FaqQuestion;


class FaqCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function questions()
{
    return $this->hasMany(FaqQuestion::class, 'category_id');
}


}
