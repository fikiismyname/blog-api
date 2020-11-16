<?php

namespace App\Http\Controllers\Site;

use App\Models\Tag;
use App\Http\Controllers\Controller;
use App\Http\Resources\TagCollection;

class TagController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return new TagCollection(
            Tag::all()
        );
    }
}
