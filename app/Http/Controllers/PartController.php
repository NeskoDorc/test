<?php

namespace App\Http\Controllers;
use App\Http\Resources\V1\PartResource;
use App\Models\Part;
use App\Http\Requests\RequestPart;
use App\Models\Supplier;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PartResource::collection(Part::paginate(30));
    }




    public function getBySupplier(RequestPart $request, Supplier $supplier)
    {
        return PartResource::collection(Part::where([
            'supplier_id' => $supplier->id
        ])->paginate());
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function show(Part $part)
    {
        return new PartResource($part);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function update(RequestPart $request, Part $part)
    {
        $part->update($request->all());
        return new PartResource($part);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function destroy(Part $part)
    {
        $part->delete();
        return response('',204);
    }
}
