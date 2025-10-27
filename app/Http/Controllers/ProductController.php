<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();

        return view('products.index', [
            'products' => $products,
        ]);
    }

    public function create(Request $request)
    {
        return view('products.form');
    }

    public function store(ProductStoreRequest $request): RedirectResponse
    {
        $product = Product::create($request->validated());

        $request->session()->flash('Product.name', $Product->name);

        return redirect()->route('products.index');
    }

    public function edit(Request $request, Product $product)
    {
        $product = Product::find($product);

        return view('products.form', [
            'product' => $product,
        ]);
    }

    public function update(ProductUpdateRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());

        $request->session()->flash('Product.name', $Product->name);

        return redirect()->route('products.index');
    }

    public function destroy(Request $request, Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
