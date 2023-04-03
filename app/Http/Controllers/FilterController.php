<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Cities;

class FilterController extends Controller
{
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $query = Cities::query();
        $query->select('ctid','city');
        $query->where('city', 'LIKE', '%'. $request->q_loc. '%');
        $query->orderBy('city', 'ASC');
        $cities = $query->take(5)->get();
        $data = array();
        if(!is_null($cities))
        {
            $data = $cities->toArray();
        }
        return json_encode($data);
    }

    public function brands(Request $request)
    {
        $query = Brand::query();
        $query->select('bid','brand');
        $query->where('brand', 'LIKE', '%'. $request->q_br. '%');
        $query->orderBy('brand', 'ASC');
        $brands = $query->take(5)->get();
        $data = array();
        if(!is_null($brands))
        {
            $data = $brands->toArray();
        }
        return json_encode($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
