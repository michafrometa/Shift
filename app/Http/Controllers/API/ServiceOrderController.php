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
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ServiceOrderController extends Controller
{
    const SUBJECT = 'Service order';

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
        return datatables()->of($this->service_order
            ->with(array(
                'agreement:id,description',
                'post_collection:id,description',
                'patient:id,name,birthdate,neighborhood_id,gender_id',
                'patient.gender:id,value',
                'patient.neighborhood:id,description',
                'doctor:id,specialty_id,name',
                'doctor.specialty:id,description'
            )))->toJson();
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
                $service_order=$this->service_order->fill($request->all());
                $service_order->save();
            });
        } catch (Exception $exception) {
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
            return $this->service_order->findOrFail($service_order_id);
        } catch (ModelNotFoundException $exception) {
            return response(__('messages.response.no_found'), Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\ServiceOrder $serviceOrder
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceOrderUpdateRequest $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                $service_order = $this->service_order->findOrFail($request->input('id'));
                $service_order->update($request->all());
                return response(__('messages.app.service_order.update'));

            });
        } catch (ModelNotFoundException $exception) {
            report($exception);
            return response(__('messages.response.no_found'), Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceOrder $serviceOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceOrder $serviceOrder)
    {
        //
    }
}
