<?php

namespace App\Http\Controllers;

use App\Models\Country;
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

     public function index()
    {
        $data['products'] = Product::get();
        $data['title'] = 'some shop';
        return view('admin/product/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categories'] = Category::get();
        $data['countries'] = Country::get();
        $data['title'] = 'some shop';
        return view('admin/product/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create($request->all());
        redirect('/admin/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
