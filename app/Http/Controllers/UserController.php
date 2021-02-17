<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserEdit;
use Exception;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editedUser = UserEdit::find($id);
        return view('cms.user-edit', ['editedUser' => $editedUser, 'user' => Auth::user()]);
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
            error_log($request);
            error_log($request->input('userType'));
            $editedUser = UserEdit::find($id);
            $editedUser->fill($request->only(['userType']))->save();
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