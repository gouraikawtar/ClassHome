<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $postID)
    {
        $data = $request->only(['title', 'content']);
        $data['post_id']= $postID; 

        $file = File::create($data); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file, $id)
    {
        File::destroy($id);
    }
}
