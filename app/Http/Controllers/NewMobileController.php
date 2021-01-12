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
        $data['ads'] = Post::with('brand','city')->select('adprice','br_id','loc_id','postedby','adimgs','cond','adtitle','adslug','selname','created_at')->where('is_sold','=',0)->where('cond','=',$cond)->orderBy('aid', 'DESC')->paginate(20);
        $data['params'] = array('loc' =>'','s' =>'','min' =>'','max' =>'');
        return view('frontend.search',$data);
    }
}
