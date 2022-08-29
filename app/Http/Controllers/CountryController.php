<?php

namespace App\Http\Controllers;

use App\Http\Filters\GlobalSearchFilter;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Http\Resources\Country\IndexResource;
use App\Models\Country;
use Illuminate\Http\RedirectResponse;
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
        $globalSearch = AllowedFilter::custom('global', new GlobalSearchFilter);

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
     */
    public function create(): Response
    {
        return Inertia::render('Country/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCountryRequest $request
     * @return RedirectResponse
     */
    public function store(StoreCountryRequest $request): RedirectResponse
    {
        $country = Country::create($request->validated());

        session()->flash('success', "Country \"$country->name\" created successfully!");

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country): Response
    {
        return Inertia::render('Country/Show', [
            'country' => $country,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country): Response
    {
        return Inertia::render('Country/Edit', [
            'country' => $country,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountryRequest $request, Country $country): RedirectResponse
    {
        $country->update($request->validated());

        $country->refresh();

        $request->session()->flash('flash.banner', "Country \"$country->name\" updated successfully!");
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('countries.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country): RedirectResponse
    {
        $country->delete();

        session()->flash('success', "Country \"$country->name\" deleted successfully!");

        return redirect()->back();
    }
}
