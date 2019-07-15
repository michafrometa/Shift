<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceOrderStoreRequest;
use App\Http\Requests\ServiceOrderUpdateRequest;
use App\Models\Agreement;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\PostCollection;
use App\Models\ServiceOrder;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PDOException;

class ServiceOrderController extends Controller
{
    /*this is just me traing to learn how to use constants*/
    const SUBJECT = 'service_order';

    /**@var ServiceOrder $service_order */
    protected $service_order;

    /**@var Agreement $agreement */
    protected $agreement;

    /**@var PostCollection $post_collection */
    protected $post_collection;

    /**@var Patient $patient */
    protected $patient;

    /**@var Doctor $doctor */
    protected $doctor;

    /**
     * ServiceOrderController constructor.
     * @param ServiceOrder $service_order
     * @param Agreement $agreement
     * @param PostCollection $post_collection
     * @param Patient $patient
     * @param Doctor $doctor
     */
    public function __construct(ServiceOrder $service_order, Agreement $agreement, PostCollection $post_collection, Patient $patient, Doctor $doctor)
    {
        $this->service_order = $service_order;
        $this->agreement = $agreement;
        $this->post_collection = $post_collection;
        $this->patient = $patient;
        $this->doctor = $doctor;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return $this->service_order
                ->with(array(
                    'agreement:id,description',
                    'post_collection:id,description',
                    'patient:id,name',
                    'doctor:id,name'
                ))->orderBy('created_at', 'desc')->get();
        } catch (PDOException $exception) {
            Log::error($exception->getMessage());
            return response(__('messages.response.database_issue'), Response::HTTP_SERVICE_UNAVAILABLE);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return response(__('messages.response.error'), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceOrderStoreRequest $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                $this->service_order
                    ->fill($request->all())
                    ->save();
                return response(__('messages.response.save'), Response::HTTP_CREATED);
            });
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return response(__('messages.response.error'), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     * @param int $service_order_id
     * @return \Illuminate\Http\Response
     */
    public function show($service_order_id)
    {
        try {
            return $this->service_order
                ->findOrFail($service_order_id)
                ->with(array(
                    'agreement:id,description',
                    'post_collection:id,description',
                    'patient:id,name',
                    'doctor:id,name'
                ));

        } catch (ModelNotFoundException $exception) {
            return response(__('messages.response.not_found', ['subject' => trans_choice('messages.' . $this::SUBJECT, 1)]), Response::HTTP_NOT_FOUND);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return response(__('messages.response.error'), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\ServiceOrder $serviceOrder
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceOrderUpdateRequest $request, $id)
    {
        try {
            $that = $this;
            return DB::transaction(function () use ($request, $id, $that) {

                $this->service_order
                    ->findOrFail($id)
                    ->update($request->all());

                Log::info('shift_' . $that::SUBJECT . 's whit id= ' . $request->input('id') . ' updated');
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
     * @param Request $request
     * @param $ids
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            $this->service_order::destroy($id);
            Log::info(__('messages.logs.delete', ['subject' => $this::SUBJECT, 'id' => $id]));
            return response(trans_choice('messages.response.delete', 1));
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return response(__('messages.response.error'), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
