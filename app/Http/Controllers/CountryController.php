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
}
