<?php

namespace App\Http\Controllers\Site;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\Http\Resources\Post as PostResource;

class PostController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $posts = Post::with(['category', 'tags'])
            ->paginate(12);
        return new PostCollection($posts);
    }

    /**
     * Get post by category
     *
     * @return \Illuminate\Http\Response
     */
    public function postByCategory($categoryId) {
        $posts = Post::where('category_id', $categoryId)
            ->with(['category', 'tags'])
            ->paginate(12);
        return new PostCollection($posts);
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug) {
        $post = Post::where('slug', $slug)->with([
            'category', 'tags'
        ])->firstOrFail();
        return new PostResource($post);
    }
}
