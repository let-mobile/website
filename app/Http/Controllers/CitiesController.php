<?php

namespace App\Http\Controllers;

use App\Cities;
use Illuminate\Http\Request;
use App\Brand;
use App\Post;
class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $slug;
    public function index($slug,Request $request)
    {
        $this->slug = $slug;
        $this->search = $data['search'] = $request->get('s');
    	$this->loc = $data['loc'] = $request->get('loc')?$request->get('loc'):'';
    	$this->min = $data['min'] = $request->get('min')?$request->get('min'):0;
    	$this->max = $data['max'] = $request->get('max')?$request->get('max'):100000000;
    	$query = Post::query();
    	$query->with('brand','city');
        $data['ads'] = $query->whereHas('city', function ($query) { $query->where('cityslug', '=',$this->slug); })
        ->where('is_sold','=',0)
        ->where('adprice', '>=', $this->min)
        ->where('adprice', '<=', $this->max)
        ->where('vcode','=',0)
        ->select('adprice','br_id','loc_id','postedby','adimgs','cond','adtitle','adslug','selname','created_at')
        ->orderBy('aid', 'DESC')->where('adtitle', 'LIKE', '%'. $this->search. '%')->paginate(24);
        $data['min'] = $request->get('min');
    	$data['max'] = $request->get('max');
        $data['params'] = array('loc' =>$data['loc'],'s' =>$data['search'],'min' =>$data['min'],'max' =>$data['max'] );
        return view('frontend.brand',$data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function show(Cities $cities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function edit(Cities $cities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cities $cities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cities  $cities
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cities $cities)
    {
        //
    }
}
