<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{

    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Blog::take(2)->latest()->get();

        $wine_category = Category::find(9);

        $toys_category = Category::find(6);

        $pastry_category = Category::find(5);

        $wines = $wine_category->products()->take(3)->get();
        $toys = $toys_category->products()->take(3)->get();
        $pastries = $pastry_category->products()->take(3)->get();

        return view('index', compact('posts', 'wines', 'toys', 'pastries'));
    }


    public function about()
    {
        return view('about');
    }

    /**
     * Show the single product.
     *
     * @return \Illuminate\Http\Response
     */
    public function singleProduct($slug)
    {

        $product = Product::where('slug', $slug)->first();

        $category = $product->categories()->first();

        $related_products = $category->products()->get();

        return view('single_product')->with(['product' => $product, 'related_products' => $related_products]);

    }

    public function singleCategory($category)
    {
        $category = SubCategory::where('name', $category)->first();

        $category_product = $category->products()->inRandomOrder()->get();

        return view('single_category')->with(['products' => $category_product, 'category' => $category]);
    }

    /*
     * This is the search function for all products
     *
     * */

    public function search()
    {
        $query = Input::get('query');

        $results = Product::where('title','like','%'.$query.'%')->latest()->paginate(30);
        $latest = Product::take(2)->latest()->get();

        return view('result')->with(['products' => $results, 'latest' => $latest, 'query' => $query]);
    }

    public function blog()
    {
        $posts = Blog::all();
        return view('blog', compact('posts'));
    }

    public function blogDetails($slug)
    {
        $post = Blog::where('slug', $slug)->first();

        return view('blog_details', compact('post'));
    }



}
