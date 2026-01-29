<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function productShow( Product $Product) {
        $data['product'] = $Product;
        $data['prods'] = $Product::where('category_id', $data['product']->category_id)->inRandomOrder()->limit(3)->get();
        return view ('product', $data);
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
}
