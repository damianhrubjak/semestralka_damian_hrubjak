<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\FileService;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductCompactResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource on front-end
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFrontEnd()
    {
        $productsCategoriesWithProducts = Product::with('files', 'productCategory')->orderBy('product_category_id', 'ASC')->get()->groupBy('productCategory.category');

        return view('pages.products', compact('productsCategoriesWithProducts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('files', 'productCategory')->orderBy('product_category_id', 'ASC')->get();
        // return view('admin.pages.products-index', compact('products'));
        return new ProductCollection($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $files = $request->file('files');

        $productData = $request->except('files');
        $productData['user_id'] = auth()->user()->id;

        $newProduct = Product::create($productData);

        $folder = "product_files/product_with_id_" . $newProduct->id . "_files/";
        foreach ($files as $file) {
            (new FileService)->storeFile($file, $folder, "product_id", $newProduct->id);
        }

        return response()->json(['result' => 'success']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\EditProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, Product $product)
    {
        //set all validated data to model
        foreach ($request->all() as $key => $value) {
            $product[$key] = $value;
        }
        //update model
        $product->save();
        //return successful response
        return response()->json(['result' => 'success', 'product' => new ProductCompactResource($product)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->load('files');

        if ($product->files()->count() > 0) {
            $folderName = $product->files()->first()->folder_name;
        }

        //remove all files attached to file
        foreach ($product->files as $file) {
            (new FileService)->deleteFile($file, $file->folder_name);
        }

        //remove files folder
        if (!empty($folderName)) {
            rmdir(Storage::path($folderName));
        }

        //remove product
        $product->delete();
        //return successful response
        return response()->json(['result' => 'success']);
    }
}
