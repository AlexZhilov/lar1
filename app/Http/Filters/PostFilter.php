<?php


namespace App\Http\Filters;


use App\Http\Filters\base\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const TEXT = 'text';
    public const CATEGORY_ID = 'category_id';

    protected function getCallbacks(): array
    {
        return [
          self::TITLE => [$this, 'title'],
          self::TEXT => [$this, 'text'],
          self::CATEGORY_ID => [$this, 'categoryId'],
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%$value%");
    }

    public function text(Builder $builder, $value)
    {
        $builder->where('text', 'like', "%$value%");
    }

    public function categoryId(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }
}
