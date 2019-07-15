<?php

namespace App\Http\Controllers\API;

use App\Models\PostCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostCollectionController extends Controller
{

    const SUBJECT = 'Post Collection';

    /**@var PostCollection $post_collection */
    protected $post_collection;

    /**
     * PostCollectionController constructor.
     * @param PostCollection $post_collection
     */
    public function __construct(PostCollection $post_collection)
    {
        $this->post_collection = $post_collection;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostCollection  $postCollection
     * @return \Illuminate\Http\Response
     */
    public function show(PostCollection $postCollection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostCollection  $postCollection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostCollection $postCollection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostCollection  $postCollection
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCollection $postCollection)
    {
        //
    }

    public function filterBy(Request $request)
    {
        return $this->post_collection->getby($request->input('search'));
    }
}
