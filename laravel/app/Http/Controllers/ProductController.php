<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::whereNull('deleted_at')->with([
            'brand',
            'category',
        ])->get();
        return response()->json([
            'products' => $products,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = $request->all();

        if ($image = $request->file('img')) {
            $path = 'img/';
            $img = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($path, $img);
            $product['img'] = "$img";
        } else {
            $product['img'] = 'default.jpg';
        }

        Product::create($product);

        return response()->json([
            'message' => 'Product Created Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json([
            'proudct' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $input = $request->validated();

        if ($image = $request->file('img')) {
            $path = 'img/';
            $img = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($path, $img);
            $input['img'] = "$img";
        } else {
            unset($input['img']);
        }

        $product->update($input);

        return response()->json([
            'message' => 'Product updated Successfully!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (file_exists(public_path('img/' . $product->img))) {
            unlink(public_path('img/' . $product->img));
        }

        $product->delete();
        return response()->json([
            'message' => 'Product deleted Successfully'
        ]);
    }
}
