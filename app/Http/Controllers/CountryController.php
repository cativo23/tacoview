<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Http\Resources\Country\IndexResource;
use App\Models\Country;
use Illuminate\Support\Collection;
use Inertia\Inertia;
use Inertia\Response;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(fn($value) => $query
                    ->orWhere('name', 'LIKE', "%{$value}%"));
            });
        });

        $countries = QueryBuilder::for(Country::class)
            ->defaultSort('name')
            ->allowedSorts(['name', 'iso3', 'id'])
            ->allowedFilters(['name', 'iso3', $globalSearch])
            ->paginate()
            ->withQueryString();

        return Inertia::render('Country/Index', [
            'countries' => IndexResource::collection($countries),
        ])->table(function (InertiaTable $table) {
            $table->withGlobalSearch('Buscar país...')
                ->defaultSort('name')
                ->searchInput('name')
                ->column(key: 'id', label: 'ID', sortable: true)
                ->column(key: 'name', label: 'Nombre', canBeHidden: false, sortable: true, searchable: true)
                ->column(key: 'iso3', label: 'ISO3', sortable: true, searchable: true)
                ->column(label: 'Actions');
        });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCountryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCountryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCountryRequest  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
    }
}
