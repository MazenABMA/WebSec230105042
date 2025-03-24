<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product; // Import the Product model
use Illuminate\Database\Eloquent\Model; // Import the Model class
use Illuminate\Database\Eloquent\Factories\HasFactory; // Import the HasFactory trait





class ProductsController extends Controller
{
    
    public function list(Request $request)
    {
        // Initialize query
        $query = Product::select("products.*");

        // Apply filters based on request parameters
        $query->when($request->keywords, fn($q) => 
            $q->where("name", "like", "%{$request->keywords}%")
        );

        $query->when($request->min_price, fn($q) => 
            $q->where("price", ">=", $request->min_price)
        );

        $query->when($request->max_price, fn($q) => 
            $q->where("price", "<=", $request->max_price)
        );

        $query->when($request->order_by, fn($q) => 
            $q->orderBy($request->order_by, $request->order_direction ?? "ASC")
        );

        // Execute query
        $products = $query->get();

        // Pass filtered products to the view
        return view("products.list", compact("products"));
    }
        public function edit(Request $request, Product $product = null) {
        $product = $product??new Product();
        return view("products.edit", compact('product'));
        }
        public function save(Request $request, Product $product = null)
        {
            $product = $product ?? new Product();
    
            // Validate request data
            $validated = $request->validate([
                'code' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'model' => 'required|string|max:255',
                'price' => 'required|numeric',
                'photo' => 'nullable|string',
                'description' => 'nullable|string',
            ]);
    
            // Save only the validated data
            $product->fill($validated);
            $product->save();
    
            return redirect()->route('products_list')->with('success', 'Product saved successfully!');
        }
        public function delete(Request $request, Product $product) {
            $product->delete();
            return redirect()->route('products_list');
            }
           
           

}