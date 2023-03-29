<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();

        return response()->json($product,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $payload = $this->payload($request);

       $product = Product::create($payload);

       return response()->json($product, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product:: where ('id', $id)->first();

        return response()->json($product, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payload = $this->payload($request);

        $product = Product:: where ('id', $id)->first();

        $product->update($payload);

        return response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product:: where ('id', $id)->first();
        $product->delete();
        return response ('', 204);
    }

    public function payload($request)
    {
        return $this->validate($request, [
            'name'=> ['required'],
            'quantity'=> ['required'],
            'price' => ['required'],


       ]);

    }
}
