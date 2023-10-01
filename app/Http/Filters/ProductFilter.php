<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const CATEGORY_ID = 'category_id';
    public const SEARCH_TITLE = 'search_title';
    public const SEARCH_DESCRIPTION = 'search_description';
    public const APPLE_IPHONE = 'iphone';
    public const APPLE_WATCH = 'watch';
    public const APPLE_MAC = 'mac';
    public const PRICE_FROM = 'price_from';
    public const PRICE_TO = 'price_to';


    protected function getCallbacks(): array
    {
        return [
            self::CATEGORY_ID => [$this, 'category_id'],
            self::SEARCH_TITLE => [$this, 'search_title'],
            self::SEARCH_DESCRIPTION => [$this, 'search_description'],
            self::PRICE_FROM => [$this, 'price_from'],
            self::APPLE_IPHONE => [$this, 'iphone'],
            self::APPLE_WATCH => [$this, 'watch'],
            self::APPLE_MAC => [$this, 'mac'],
            self::PRICE_TO => [$this, 'price_to'],

        ];
    }

    public function search_title(Builder $builder, $value)
    {
        $builder->where(function ($query) use ($value) {
            $query->where('title', 'LIKE', '%' . $value . '%');
        });
    }

    public function price_from(Builder $builder, $value)
    {
        $builder->where('price', '>=', $value);
    }
    public function price_to(Builder $builder, $value)
    {
        $builder->where('price', '<=', $value);
    }

    public function iphone(Builder $builder, $value)
    {
        $builder->where('category_id', '=', 17);
    }
    public function category_id(Builder $builder, $value)
    {
        $builder->where('category_id', '=', $value);
    }
    public function watch(Builder $builder, $value)
    {
        $builder->where('category_id', '=', 19);
    }
    public function mac(Builder $builder, $value)
    {
        $builder->where('category_id', '=', 24);
    }
}