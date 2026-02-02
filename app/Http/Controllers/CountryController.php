<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Country;

class CountryController extends Controller
{
    public function countryShow( Country $Country, Product $Product) {
        $data['country'] = $Country;
        return view ('country', $data);
    }
    public function index()
    {
        $data['countries'] = Country::get();
        $data['title'] = "Some Shop";
        return view ('admin/countries/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['countries'] = Country::get();
        $data['title'] = "Some Shop";
        return view ('admin/countries/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Country $country)
    {
        if ($request->description == null ) {
            $request['description'] = ' ';
        }
        Country::create($request->all());
        return redirect('admin/countries');
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        $data['country'] = $country;
        $data['title'] = "Some Shop";
        return view ('admin/countries/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        $data['country'] = $country;
        $data['title'] = "Some Shop";
        return view ('admin/countries/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Country $country)
    {
        //
        if ($request->description == null ) {
            $request['description'] = ' ';
        }
        $country->update($request->all());
        return redirect('admin/countries');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return redirect('admin/countries');
    }
}
