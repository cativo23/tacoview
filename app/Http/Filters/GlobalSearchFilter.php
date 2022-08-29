<?php

namespace App\Http\Filters;

use App\Models\Country;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class GlobalSearchFilter implements Filter
{

    /**
     * @inheritDoc
     */
    public function __invoke(Builder $query, $value, string $property)
    {
        $globalCountries = Country::search(request()->input('filter')['global'])->keys();
        
        $query->whereIn('id', $globalCountries);
    }
}
