<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Country;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
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
        if ($r->name) {
            $query->where('name', 'like', "%{$r->name}%")->paginate(21)->withQueryString();
        }
        $data['sr_value'] = $r->name;
        $data['q_categ'] = $r->category;
        $data['q_min'] = $r->min;
        $data['q_max'] = $r->max;
        $data['cats'] = Category::where('parent_id', '!=', null)->get();
        $data['title'] = "Some Shop";
        $data['prods'] = $query->paginate(21)->withQueryString();
        return view ('products', $data);
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
    public function productShow( Product $Product) {
        $data['product'] = $Product;
        $data['prods'] = $Product::where('category_id', $data['product']->category_id)->inRandomOrder()->limit(3)->get();
        return view ('product', $data);
    }
    public function countryShow( Country $Country, Product $Product) {
        $data['country'] = $Country;
        return view ('country', $data);
    }
    public function review(Request $r, Product $Product) {
        Review::create(['content'=>$r->text, 'rating'=>$r->rating, 'user_id'=>Auth::id(), 'product_id'=>$Product->id]);
        return back();
    }
}
