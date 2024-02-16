<?php

namespace App\Http\Controllers;

use App\Events\CategoryDeleting;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('pages.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.categories.create');
    }

    //store
    public function store(Request $request)
    {
        //validate the request...
        $request->validate([
            'name' => 'required',
            'status' => 'required|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //store the request...
        $category = new Category;
        $category->name = $request->name;
        $category->status = $request->status;
        $category->description = $request->description;
        $category->save();

        //save image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/categories', $category->id . '.' . $image->getClientOriginalExtension());
            $category->image = 'storage/categories/' . $category->id . '.' . $image->getClientOriginalExtension();
            $category->save();
        }

        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }

    //show
    public function show($id)
    {
        return view('pages.categories.show');
    }

    //edit
    public function edit($id)
    {
        $category = Category::find($id);
        return view('pages.categories.edit', compact('category'));
    }

    //update
    public function update(Request $request, $id)
    {
        //validate the request...
        $request->validate([
            'name' => 'required',
            'status' => 'required|boolean',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //update the request...
        $category = Category::find($id);
        $category->name = $request->name;
        $category->status = $request->status;
        $category->description = $request->description;

        //save image
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $image->storeAs('public/categories', $category->id . '.' . $image->getClientOriginalExtension());
        //     $category->image = 'storage/categories/' . $category->id . '.' . $image->getClientOriginalExtension();
        // }

        // Jika ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($category->image) {
                Storage::delete('public/categories/' . $category->image);
            }

            // Simpan gambar baru
            $image = $request->file('image');
            $filename = $category->id . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/categories', $filename);
            $category->image = 'storage/categories/' . $filename;
        }

        $category->save();

        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    //destroy
    public function destroy($id)
    {
        //delete the request...
        try {
            $category = Category::withTrashed()->findOrFail($id);
            event(new CategoryDeleting($category));
            $category->products()->delete();
            $category->forceDelete();
            return response()->json(['success' => true, 'message' => 'Category successfully deleted'], 200);
        } catch (\Exception $e) {
            Log::error('Error deleting category: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error deleting category'], 500);
        }
        // $category->delete();
        // return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }


}
