<?php

namespace App\Http\Controllers\API;

use App\Models\Agreement;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AgreementController extends Controller
{

    const SUBJECT = 'agreement';

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

        return $this->agreement
            ->orderBy('created_at', 'desc')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                $agreement = $this->agreement->fill($request->all());
                $agreement->save();
                return response(__('messages.response.save', ['subject' => trans_choice('messages.subjects.' . $this::SUBJECT, 1)]), Response::HTTP_CREATED);
            });
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return response(__('messages.response.error'), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    /**
     * @param $agreement_id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function show($agreement_id)
    {
        try {
            return $this->agreement
                ->findOrFail($agreement_id);
        } catch (ModelNotFoundException $exception) {
            return response(__('messages.response.not_found', ['subject' => __('messages.subjects.' . $this::SUBJECT)]), Response::HTTP_NOT_FOUND);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return response(__('messages.response.error'), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Agreement $agreement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agreement $agreement)
    {
        try {
            return DB::transaction(function () use ($request) {
                $agreement = $this->agreement->findOrFail($request->input('id'));
                $agreement->update($request->all());
                return response(__('messages.response.update'));
            });
        } catch (ModelNotFoundException $exception) {
            return response(__('messages.response.not_found'), Response::HTTP_NOT_FOUND);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return response(__('messages.response.error'), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agreement $agreement
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
