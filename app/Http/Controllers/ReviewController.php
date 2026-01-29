<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Review;

class ReviewController extends Controller
{
    public function review(Request $r, Product $Product) {
        Review::create(['content'=>$r->text, 'rating'=>$r->rating, 'user_id'=>Auth::id(), 'product_id'=>$Product->id]);
        return back();
    }
}
