<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        //get data products
        $products = Product::when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        //sort by created_at desc

        return view('pages.products.index', compact('products'));
    }

    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('pages.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|unique:products',
            'description' => 'required',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'category_id' => 'required',
            'status' => 'required|boolean',
            'is_favorite' => 'required|boolean',
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = (int) $request->price;
        $product->stock = (int) $request->stock;
        $product->category_id = $request->category_id;
        $product->status = $request->status;
        $product->is_favorite = $request->is_favorite;

        $product->save();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/products', $product->id . '.' . $image->getClientOriginalExtension());
            $product->image = 'storage/products/' . $product->id . '.' . $image->getClientOriginalExtension();
            $product->save();
        }

        return redirect()->route('product.index')->with('success', 'Product successfully created');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = DB::table('categories')->get();
        return view('pages.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|min:3|unique:products,name,' . $id,
            'description' => 'required',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'category_id' => 'required',
            'status' => 'required|boolean',
            'is_favorite' => 'required|boolean',
            'image' => 'image|mimes:png,jpg,jpeg',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = (int) $request->price;
        $product->stock = (int) $request->stock;
        $product->category_id = $request->category_id;
        $product->status = $request->status;
        $product->is_favorite = $request->is_favorite;

        // Jika ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image) {
                Storage::delete('public/products/' . $product->image);
            }

            // Simpan gambar baru
            $image = $request->file('image');
            $filename = $product->id . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/products', $filename);
            $product->image = 'storage/products/' . $filename;
        }

        $product->save();

        return redirect()->route('product.index')->with('success', 'Product successfully updated');
    }

    public function destroy($id)
    {
        // Hapus semua order items terkait dengan produk
        //DB::table('order_items')->where('product_id', $id)->delete();


        // delete product
        $product = Product::findOrFail($id);

        if ($product) {
            $product->delete();
            return response()->json(['success' => true, 'message' => 'Product successfully deleted'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Product not found'], 404);
        }


        //return redirect()->route('product.index')->with('success', 'Product successfully deleted');


    }
}
