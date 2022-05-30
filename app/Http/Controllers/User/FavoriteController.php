<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\ProductUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    //this func make user can add product to favorite list
    public function addFavoriteProduct($id)
    {
       $user_id = Auth::user()->id;
       
                 /* ______________Eloquent_________________*/

       /* $favorits = ProductUser::where(['user_id'=>$user_id ,'product_id'=>$id])->get();
        if($favorits->isEmpty()){
            ProductUser::create([
                'user_id'=>$user_id ,
                'product_id'=>$id
            ]);
            return back()->with('message','The produc was successfully added to your list of favorite products');
        }else{

            return back()->with('message', 'This product is already  in your favorites');

        }
      */

                 /* ______________Query Builder_________________*/

        if(DB::table('product_user')->where([ 'user_id'=>$user_id ,'product_id'=>$id ])->doesntExist()){
            DB::table('product_user')->insert([
                'user_id'=>$user_id ,
                'product_id'=>$id
            ]);
            return back()->with('message','The produc was successfully added to your list of favorite products');
        }else{

        return back()->with('message', 'This product is already  in your favorites');
        }
    }

  
    //this func make user can view the products in favorite list
    public function showFavoriteProducts()
    {
       $favorite_products=Auth::user()->products;
        // dd($favorite_products);
        if (! $favorite_products->isEmpty()) {
            return view('user.favorite',compact('favorite_products'));

        }else{

            return  back()->with('message','There are no favorite products');

        }
    }
}
