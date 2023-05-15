<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Brand;
use App\Cities;
use Response;
class SearchController extends Controller
{
	private $search;
	private $loc;
	private $min;
	private $max;
	public function index(Request $request)
    {
    	$this->search = $data['search'] = $request->get('s');
    	$this->loc = $data['loc'] = $request->get('loc')?$request->get('loc'):'';
    	$this->min = $data['min'] = $request->get('min')?$request->get('min'):0;
    	$this->max = $data['max'] = $request->get('max')?$request->get('max'):100000000;
    	$query = Post::query();
    	$query->with('brand','city');
        $query->select('adprice','br_id','loc_id','postedby','adimgs','adtitle','adslug','selname','cond','created_at');
        $query->where('adtitle', 'LIKE', '%'. $this->search. '%');
        // Check Properties By City
        if (!empty($this->search)) {
            $query->orWhereIn('br_id',Brand::where('brand','LIKE', '%'. $this->search. '%')->pluck('bid')->toArray());
        }
        // Check Properties By Area
        if (!empty($this->loc)) {
            $query->orWhereIn('loc_id',Cities::where('city','LIKE', '%'. $this->loc. '%')->pluck('ctid')->toArray());
        }
        $query->where('vcode','=',0);
        $query->where('is_sold','=',0);
        $query->where('adprice', '>=', $this->min);
        $query->where('adprice', '<=', $this->max);
        $query->orderBy('aid', 'DESC');
        $data['ads'] = $query->paginate(20);
    	$data['min'] = $request->get('min');
    	$data['max'] = $request->get('max');

    	$data['params'] = array('loc' =>$data['loc'],'s' =>$data['search'],'min' =>$data['min'],'max' =>$data['max'], );
        return view('frontend.search',$data);
    }
    public function home(Request $request)
    {
        $search = $request->get('term');
      	$posts  = Post::select('adtitle as name')->where('vcode','=',0)->where('is_sold','=',0)->where('adtitle', 'LIKE', '%'. $search. '%')->groupBy('adtitle')->orderBy('aid', 'DESC')->get()->toArray();
      	$brands = Brand::select('brand as name')->where('brand', 'LIKE', '%'. $search. '%')->get()->toArray();
      	$cities = Cities::select('city as name')->where('city', 'LIKE', '%'. $search. '%')->get()->toArray();
       	$result = array_merge($posts,$brands,$cities);
       	return response()->json($result);    
    }
    public function location(Request $request)
    {
        $search = $request->get('term');
      	$result = Cities::select('city as name')->where('city', 'LIKE', '%'. $search. '%')->get()->toArray();
     	return response()->json($result);    
    }
}
