<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ArticleCategory
 * @package App\Models
 */
class ArticleCategory extends Model
{
    use HasFactory;

    protected $table = 'article_categories';

    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id');
    }
}
