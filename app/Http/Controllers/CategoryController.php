<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Country;

class CategoryController extends Controller
{
    public function categoryList() {
        $data['cats'] = Category::where('parent_id', null)->get();
        $data['title'] = "Some Shop";
        return view ('categories', $data);
    }
    public function categoryShow(Request $r,Category $Category) {
        $data['cat'] = $Category;
        $query = $data['cat']->products();
        if ($r->max > 0 )
        {
            $query->where('price', '<=',$r->max);
        }
        if ($r->min > 0 )
        {
            $query->where('price', '>=',$r->min);
        }
        if ($r->sort) {
            switch ($r->sort) {
                case 'price_down':
                    $query->orderBy('price');
                    break;
                case 'price_up':
                    $query->orderBy('price','desc');
                    break;
                case 'abc':
                    $query->orderBy('name');
                    break;
                case 'new':
                    $query->orderBy('id','desc');
                    break;
                default:
                    break;
            }
        }
        if ($r->country) {
            $query->where('country_id', $r->country);
        }
        $data['q_country'] = $r->country;
        $data['q_sort'] = $r->sort;
        $data['q_categ'] = $r->category;
        $data['q_min'] = $r->min;
        $data['q_max'] = $r->max;
        $data['cats'] = Category::where('parent_id', '!=', null)->get();
        $data['countries'] = Country::get();
        $data['prods'] = $query->paginate(10)->withQueryString();
        $data['title'] = "Some Shop";
        return view ('category', $data);
    }
}
