<?php

namespace App\Http\Controllers\API;

use App\Models\Agreement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgreementController extends Controller
{

    const SUBJECT = 'Agreement';

    /**@var Agreement $agreement */
    protected $agreement;

    /**
     * AgreementController constructor.
     * @param Agreement $agreement
     */
    public function __construct(Agreement $agreement)
    {
        $this->agreement = $agreement;
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
     * @param  \App\Models\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function show(Agreement $agreement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agreement $agreement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agreement $agreement)
    {
        //
    }
    public function filterBy(Request $request)
    {
        return $this->agreement->getby($request->input('search'));
    }


}
