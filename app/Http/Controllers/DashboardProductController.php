<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\ProductRequest;
use App\ProductGallery;

class DashboardProductController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::with(['category', 'galleries'])->where('users_id', Auth::user()->id)->get();
        return view('pages.dashboard-products', [
            'products' => $products,
        ]);
    }

    public function detail($id)
    {
        $categories = Category::all();
        $product = Product::with('category', 'galleries')->findOrFail($id);
        return view('pages.dashboard-products-details', [
            'product' => $product,
            'categories' => $categories,

        ]);
    }

    public function uploadGallery(Request $request)
    {
        $data = $request->all();

        return dd($data);

        // $data['photos'] = $request->file('photos')->store('assets/product-gallery', 'public');

        // ProductGallery::create($data);
        // return redirect()->route('dashboard-product-detail', $request->products_id);
    }

    public function deleteGallery(Request $request, $id)
    {
        $data = ProductGallery::findOrFail($id);

        $data->delete();

        return redirect()->route('dashboard-product-detail', $data->products_id);
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.dashboard-products-create', [
            'categories' => $categories,
        ]);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        $product = Product::create($data);

        $gallery = [
            'products_id' => $product->id,
            'photos' => $request->file('photo')->store('assets/product', 'public'),
        ];

        ProductGallery::create($gallery);

        return redirect()->route('dashboard-product');


    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        $item = Product::findOrFail($id);

        $item->update($data);

        session()->flash('success', "Product has been updated");
        return redirect()->route('dashboard-product');
    }
}
