<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Ixudra\Curl\Facades\Curl;
use App\Brand;
use App\Cities;
use App\Blog;
use App\BlogCategory;
use App\Post;

class NewMobileController extends Controller
{
    public function show(Request $request)
    {
        $cond = 0;
        if(request()->segment(2) == 'new')
        {
            $cond = 1;
        }
        else if (request()->segment(2) == 'used')
        {
            $cond = 0;
        }
        else if (request()->segment(2) == 'installments')
        {
            $cond = 2;
        }
        $this->search = $data['search'] = $request->get('s');
    	$this->loc = $data['loc'] = $request->get('loc')?$request->get('loc'):'';
    	$this->min = $data['min'] = $request->get('min')?$request->get('min'):0;
    	$this->max = $data['max'] = $request->get('max')?$request->get('max'):100000000;
    	$query = Post::query();
    	$query->with('brand','city');
    	// Check Properties By City
        if (!empty($this->search)) {
            $query->whereIn('br_id',Brand::where('brand','LIKE', '%'. $this->search. '%')->pluck('bid')->toArray());
        }
        // Check Properties By Area
        if (!empty($this->loc)) {
            $query->whereIn('loc_id',Cities::where('city','LIKE', '%'. $this->loc. '%')->pluck('ctid')->toArray());
        }
        $data['ads'] = $query->select('adprice','br_id','loc_id','postedby','adimgs','cond','adtitle','adslug','selname','created_at')
        ->where('is_sold','=',0)
        ->where('cond','=',$cond)
        ->where('adprice', '>=', $this->min)
        ->where('adprice', '<=', $this->max)
        ->where('adtitle', 'LIKE', '%'. $this->search. '%')
        ->orderBy('aid', 'DESC')
        ->paginate(20);
        $data['min'] = $request->get('min');
    	$data['max'] = $request->get('max');
        $data['params'] = array('loc' =>$data['loc'],'s' =>$data['search'],'min' =>$data['min'],'max' =>$data['max'] );
        return view('frontend.search',$data);
    }
}
