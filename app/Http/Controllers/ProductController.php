<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

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

  public function store(Request $request)
    {
        try{
            // validar los inputs del request
            $validated = $request->validate([
                'name' => 'required|string|max:40',
                'price' => 'required|numeric|min:1|max:9999999',
                'description' => 'required|string',
            ]);
            $id = $request->input('id', null);
            if ($id) {
                // actualizar producto existente
                $product = Product::find($id);
                $product->update($validated);
            }else{
                // agregar producto nuevo
                $product = Product::create($validated);
            }
            return redirect()->route('products.index')->with('success', 'Producto registrado exitosamente.');
        }catch(ValidationException $e){
            return redirect()->back()->withErrors($e->errors())->withInput();
        }catch(\Exception $e){
            return redirect()->back()->withInput()->with('error', $e->getMessage() );
        }
    }

    public function edit(Request $request, Product $product)
    {
      //  $product = Product::find($product);

        return view('products.form', [
            'product' => $product,
        ]);
    }

   // public function update(ProductUpdateRequest $request, Product $product): RedirectResponse
   // {
     //   $product->update($request->validated());

      //  $request->session()->flash('Product.name', $Product->name);

       // return redirect()->route('products.index');
   // }

    public function destroy(Request $request, Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente ✅.');
    }
}
