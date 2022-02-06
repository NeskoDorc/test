<?php

namespace App\Http\Controllers;
use App\Exports\CsvExport;
use App\Http\Resources\V1\PartResource;
use App\Models\Part;
use App\Http\Requests\RequestPart;
use App\Models\Supplier;

use Maatwebsite\Excel\Facades\Excel;

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



    /**
     * Display all parts that belong to supplier.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */

    public function getBySupplier(RequestPart $request, Supplier $supplier)
    {
        return PartResource::collection(Part::where([
            'supplier_id' => $supplier->id
        ])->paginate());


    }

    public function exportBySupplier(Supplier $supplier)
    {



                $idSupplier = PartResource::collection(Part::where([
                    'supplier_id' => $supplier->id
                ])->get());

                $sup = Supplier::where([
                    'id'=>$supplier->id
                ])->get('supplier_name')->toArray();


                $file_name = $sup[0]['supplier_name'];

                $file_name = str_replace(' ', '_', $file_name);

                return Excel::download(new CsvExport($idSupplier), $file_name.'_'.date("Y_m_d_H_i").'.csv');


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
