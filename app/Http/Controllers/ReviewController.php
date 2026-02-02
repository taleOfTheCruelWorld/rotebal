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
        $validateData = $r->validate(
            [
                'content' => ['required','min:5'],
            ]);
        $r['user_id']=Auth::id();
        $r['product_id']=$Product->id;
        $r['status']=0;
        Review::create($r->all());
        return back();
    }
    public function reviews() {
        $data['title'] = "Some Shop";
        $data['reviews'] = Review::where('status',0)->get();
        return view('admin/reviews', $data);
    }
    public function reviewsCheck(Request $r) {
        $data['title'] = "Some Shop";
        if (Auth::user()->admin) {
            Review::find($r->review)->update(['status'=>$r->status]);
            return back();
        }
        return back();
    }
}
