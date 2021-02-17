<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Template;
use Exception;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $result = Template::all();
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
            if (!$request->has(['name'])) {
                return response()->json([
                    'status' => 500,
                    'message' => 'Incorrect input data'
                ]);
            }
            $input = $request->only(['name']);
            $result = new Template();
            $result->fill($input)->save();
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
        //return redirect()->route('template.edit', ['id' => $result->id]);
        back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Template $page, $id)
    {
        try {
            $result = Template::find($id);
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
        $template = Template::find($id);
        return view('cms.template-edit', ['template' => $template, 'user' => Auth::user()]);
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
            $post = Template::find($id);

            error_log($request);

            $post->fill($request->only(['name', 'content']))->save();
        } catch (Exception $e) {
            $message = 'Error: ' . $e->getCode() . ', message:' . $e->getMessage();
            error_log($message);
            return response()->json([
                'status' => 500,
                'message' => $message
            ]);
        };
        return response()->json([
            'status' => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $page, $id)
    {
        try {
            Template::destroy($id);
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
        return back()->withInput();
    }
}