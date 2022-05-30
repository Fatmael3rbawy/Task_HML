<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\UserProductFavorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //this func returns All products have been assigned to category
    public function index()
    {
        /* ______________Eloquent_________________*/

        // $products= Product::where('category_id','!=', null)->orderby('id','desc')->paginate(10);

        /* ______________Query Builder_________________*/

        $products = DB::table('products')->where('category_id', '!=', null)->orderby('id', 'desc')->paginate(10);
        $categories = DB::table('categories')->get();

        return view('home', compact('products', 'categories'));
    }

    // search in products by name & category and return the search results
    public function search(Request $request)
    {

        $results = Product::where(function ($query) use ($request) {

            if ($request->filled('product_name')) {
                $query->where('name', 'like', '%' . $request->product_name . '%');
            }
        })->orderBy('id')
            ->paginate();

        if ($results->isEmpty())
            return back()->with('result', 'There are not results');
        else
            return view('user.searchResult', compact('results'));
    }

    public function filter(Request $request)
    {
        $results = Product::where(function ($query) use ($request) {
            // search by multiple category
            if ((array)$request->category_id) {
                $query->whereIn('category_id', $request->category_id);
            }
        })->orderBy('id')
            ->paginate();


        if ($results->isEmpty())
            return back()->with('result', 'There are not results');
        else
            return view('user.filtrationResult', compact('results'));
    }
}
