<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = DB::table('posts')
        ->select('posts.id', 'posts.title', 'posts.content', 'posts.slug', 'posts.created_at as date', 'categories.name as category')
        ->join('categories', 'posts.category_id', 'category_id')
        ->paginate(5);
        /* $posts = Post::with(['category', 'tags'])->get(); */
        return response()->json($posts);
    }

    public function show($slug)
    {
        //
        $post = Post::where('slug', $slug)->with(['category', 'tags'])->first();
        if($post){
            $data=[
                'success' => true,
                'data' => $post,
            ];
            return response()->json($data);
        }

        return response()->json(['success' => false]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
