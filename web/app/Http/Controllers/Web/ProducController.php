<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProducController extends Controller
{
    public function list()
    {
        $products = Product::paginate(10);
        return view('products.list', compact('products'));
    }

    public function create()
    {
        // Only admins can access this page
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('products.list')->with('error', 'Unauthorized action.');
        }

        return view('products.create');
    }

    public function store(Request $request)
    {
        // Only admins can create products
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('products.list')->with('error', 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'model' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('products', 'public') : null;

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'model' => $request->model,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('products.list')->with('success', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        // Only admins can access edit page
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('products.list')->with('error', 'Unauthorized action.');
        }

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // Only admins can update products
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('products.list')->with('error', 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'model' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
        } else {
            $imagePath = $product->image;
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'model' => $request->model,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('products.list')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        // Only admins can delete products
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('products.list')->with('error', 'Unauthorized action.');
        }

        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }

        $product->delete();
        return redirect()->route('products.list')->with('success', 'Product deleted successfully!');
    }
}
