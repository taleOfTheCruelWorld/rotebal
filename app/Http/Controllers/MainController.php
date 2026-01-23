<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Models\Category;
use App\Models\Product;
use App\Models\Country;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $data['prods'] = Product::inRandomOrder()->limit(3)->get();
        $data['title'] = "Some Shop";
        return view ('index', $data);
    }
    public function productList(Request $r) {
        $query = Product::query();
        if ($r->category > 0)
        {
            $query->where('category_id', '=',intval($r->category));
        }
        if ($r->max > 0 )
        {
            $query->where('price', '<=',$r->max);
        }
        if ($r->min > 0 )
        {
            $query->where('price', '>=',$r->min);
        }
        $data['q_categ'] = $r->category;
        $data['q_min'] = $r->min;
        $data['q_max'] = $r->max;
        $data['cats'] = Category::where('parent_id', '!=', null)->get();
        $data['prods'] = $query->paginate(21)->withQueryString();
        $data['title'] = "Some Shop";
        return view ('products', $data);
    }
    public function search(Request $r) {
        $data['sr_value'] = $r->name;
        $query = Product::query();
        if ($r->category > 0)
        {
            $query->where('category_id', '=',intval($r->category));
        }
        if ($r->max > 0 )
        {
            $query->where('price', '<=',$r->max);
        }
        if ($r->min > 0 )
        {
            $query->where('price', '>=',$r->min);
        }
        $data['q_categ'] = $r->category;
        $data['q_min'] = $r->min;
        $data['q_max'] = $r->max;
        $data['cats'] = Category::where('parent_id', '!=', null)->get();
        if (strlen($r->name)>2) {
            $query->where('name', 'like', "%{$r->name}%")->paginate(21)->withQueryString();
            $data['prods'] = $query->paginate(21);
            $data['title'] = "Some Shop";
        return view ('products', $data);
        }
        else {
            return back();
        }
    }
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
        $data['q_categ'] = $r->category;
        $data['q_min'] = $r->min;
        $data['q_max'] = $r->max;
        $data['cats'] = Category::where('parent_id', '!=', null)->get();
        $data['prods'] = $query->paginate(10)->withQueryString();
        $data['title'] = "Some Shop";
        return view ('category', $data);
    }
    public function productShow( Product $Product) {
        $data['prod'] = $Product;
        $data['prods'] = $Product::where('category_id', $data['prod']->category_id)->inRandomOrder()->limit(3)->get();
        return view ('product', $data);
    }
    public function countryShow( Country $Country) {
        $data['country'] = $Country;
        return view ('country', $data);
    }
}
