<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\Division;
use App\Models\District;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;



class PagesController extends Controller
{
    /**
     * Display a listing of the homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function homepage()
    {
        return view('frontend.pages.homepage');
    }

     /**
     * Display a listing of the All Product page.
     *
     * @return \Illuminate\Http\Response
     */
    public function allProducts()
    {
        $products = Product::orderBy('id','desc')->where('status',1)->get();
        return view('frontend.pages.allproducts',compact('products'));
    }

         /**
     * Display a listing of the All Product details page.
     *
     * @return \Illuminate\Http\Response
     */
    public function productDetails($slug)
    {
        $productDetails = Product::where('slug',$slug)->first();

          if( !is_null($productDetails)){

            return view('frontend.pages.details', compact('productDetails'));
        }
        else{
            return redirect()->back();
        }

    }


      /**
     * Display a listing of the All primary product listing.
     *
     * @return \Illuminate\Http\Response
     */
    public function pcategory($id)
    {
        $pcategory = Category::find($id);
         if(!is_null( $pcategory))
        {
          return view('frontend.pages.primarycategory', compact('pcategory'));
        }
        else{
            return redirect()->back();
        }

    }

      /**
     * Display a listing of the All Sub Product search page.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($slug)
    {
        $category = Category::where('slug',$slug)->first();
         if(!is_null( $category))
        {
          return view('frontend.pages.category', compact('category'));
        }
        else{
            return redirect()->back();
        }

    }

        /**
     * Display a listing of the All Product search page.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->search;
        $products = Product::orWhere('title', 'like', '%' . $search.  '%')
        ->orWhere('short_description','like', '%' . $search.  '%')
        ->orWhere('tags','like', '%'   . $search .  '%')
        ->orderBy('id','desc')->get();

        return view('frontend.pages.search',compact('search','products'));
    }

    /**
     * Display a listing of the cart page.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart()
    {
        return view('frontend.pages.cart');
    }

      /**
     * Display a listing of the checkout page.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $divisions = Division::orderBy('priority', 'asc')->get();
        $districts = District::orderBy('district_name', 'asc')->get();
        $cartItems = Cart::orderBy('id','desc')->get();
         return view('frontend.pages.checkout', compact('divisions','districts','cartItems'));
    }

    /**
     * Display a listing of the login and register page.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
      return view('frontend.pages.login');

    }

}
