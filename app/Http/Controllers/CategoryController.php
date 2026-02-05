<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Country;

class CategoryController extends Controller
{
    public function categoryList()
    {
        $data['cats'] = Category::where('parent_id', null)->get();
        $data['title'] = "Some Shop";
        return view('categories', $data);
    }
    public function categoryShow(Request $r, Category $Category)
    {
        $data['cat'] = $Category;
        $query = $data['cat']->products();
        if ($r->max > 0) {
            $query->where('price', '<=', $r->max);
        }
        if ($r->min > 0) {
            $query->where('price', '>=', $r->min);
        }
        if ($r->sort) {
            switch ($r->sort) {
                case 'price_down':
                    $query->orderBy('price');
                    break;
                case 'price_up':
                    $query->orderBy('price', 'desc');
                    break;
                case 'abc':
                    $query->orderBy('name');
                    break;
                case 'new':
                    $query->orderBy('id', 'desc');
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
        return view('category', $data);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['cats'] = Category::orderBy('sort')->get();
        $data['title'] = "Some Shop";
        return view('admin/categories/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['cats'] = Category::get();
        $data['title'] = "Some Shop";
        return view('admin/categories/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Category $category)
    {
        if ($request->description == null) {
            $request['description'] = ' ';
        }
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $request->file('image')->store('images/category', 'public');
        $request['image'] = ($request->file('image')->getClientOriginalName());


        Category::create($request->all());

        return redirect('admin/categories');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $data['cat'] = $category;
        $data['title'] = "Some Shop";
        return view('admin/categories/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $data['cat'] = $category;
        $data['cats'] = Category::get();
        $data['title'] = "Some Shop";
        return view('admin/categories/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
        if ($request->parent_id == 0) {
            $request['parent_id'] = null;
        }
        if ($request->description == null) {
            $request['description'] = ' ';
        }
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('images'), $imageName);
        $request['image'] = ('/images/' . $imageName);

        $category->update($request->all());
        return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('admin/categories');
    }
}
