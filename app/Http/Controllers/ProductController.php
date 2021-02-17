<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $result = Product::all();
        } catch (Exception $e) {
            $message = 'Error: ' . $e->getCode() . ', message:' . $e->getMessage();
            error_log($message);
            return response()->json([
                'status' => 500,
                'message' => $message
            ]);
        };
        return response()->json([
            'status' => 200,
            'data' => $result
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if (!$request->has(['id_cat', 'name', 'description', 'price', 'created_by', 'img_path'])) {
                return response()->json([
                    'status' => 500,
                    'message' => 'Incorrect input data'
                ]);
            }
            $input = $request->only(['id_cat', 'name', 'description', 'price', 'created_by', 'img_path']);
            $result = new Product();
            $result->fill($input)->save();
        } catch (Exception $e) {
            $message = 'Error: ' . $e->getCode() . ', message:' . $e->getMessage();
            error_log($message);
            // return response()->json([
            //     'status' => 500,
            //     'message' => $message
            // ]);
            return back();
        };

        // return response()->json([
        //     'status' => 200,
        //     'data' => $result
        // ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Product $page, $id)
    {
        try {
            $result = Product::find($id);
        } catch (Exception $e) {
            $message = 'Error: ' . $e->getCode() . ', message:' . $e->getMessage();
            error_log($message);
            return response()->json([
                'status' => 500,
                'message' => $message
            ]);
        };

        return response()->json([
            'status' => 200,
            'data' => $result
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prodcut = Product::find($id);
        return view('cms.product-edit', ['product' => $prodcut, 'user' => Auth::user(), 'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $result = Product::find($id);
            $result->fill($request->only(['id_cat', 'name', 'description', 'price', 'img_path']))->save();
        } catch (Exception $e) {
            $message = 'Error: ' . $e->getCode() . ', message:' . $e->getMessage();
            error_log($message);
            return response()->json([
                'status' => 500,
                'message' => $message
            ]);
        };
        // return response()->json([
        //     'status' => 200,
        //     'data' => $result
        // ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $page, $id)
    {
        try {
            Product::destroy($id);
        } catch (Exception $e) {
            $message = 'Error: ' . $e->getCode() . ', message:' . $e->getMessage();
            error_log($message);
            return response()->json([
                'status' => 500,
                'message' => $message
            ]);
        };
        // return response()->json([
        //     'status' => 200
        // ]);
        return back();
    }
}