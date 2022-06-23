<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @package App\Models
 * @mixin Builder
 */
class Article extends Model
{
    use HasFactory, Filterable;

    protected $guarded = [];
    protected $table = 'articles';

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class, 'category_id');
    }
}
