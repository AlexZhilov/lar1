<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory, Filterable;

    protected $guarded = [];
    protected $table = 'articles';

    public function category()
    {
        return $this->hasOne(ArticleCategory::class, 'id', 'category_id');
    }
}
