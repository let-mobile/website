<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Symfony\Component\HttpFoundation\Response;
use File;
use Illuminate\Support\Str;
use App\Brand;
use App\User;
use App\Cities;
use App\Postview;
use DB;
class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $this->city = $request->city;
        $this->address = $request->address;
        $near_ads =  Post::with('brand','city','user')->whereHas('city', function ($query) { $query->where('city','=',$this->city); })->where('adadress','like',"%{$this->address}%")->where('is_sold','=',0)->where('vcode','=',0)->select('aid','adprice','br_id','loc_id','postedby','adimgs','adtitle','cond','adslug','selname','created_at')->take(15)->orderBy('aid', 'DESC')->get()->toArray();
        $more = array();
        if(count($near_ads) < 15)
        {
            $limit = 15 - count($near_ads);
            $more = Post::with('brand','city','user')->where('is_sold','=',0)->where('vcode','=',0)->select('aid','adprice','br_id','loc_id','postedby','adimgs','adtitle','cond','adslug','selname','created_at')->take($limit)->orderBy('aid', 'DESC')->get()->toArray();
        }
        
        $data['ads'] = array_merge($near_ads,$more);
        return response()->json([
            'success'=>true,
            'data'=>$data,
            'image_path' => 'https://letmobile.pk/public/images/'
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function brand(Request $request,$slug)
    {
        $skip = 0;
        $total = env('PAGE_SIZE',20);
        if($request->has('page'))
        {
            $skip = ($request->page - 1) * $total;
        }
        
        $this->slug = $slug;
        $query = Post::query();
        $query->with('brand','city','user')->where('vcode','=',0)
        ->whereHas('brand', function ($query) { $query->where('brandslug', '=',$this->slug); })->where('is_sold','=',0)
        ->select('aid','adprice','br_id','loc_id','postedby','adimgs','adtitle','cond','adslug','selname','created_at')->orderBy('aid', 'DESC');
        if($skip > 0)
        {
            $query->skip($skip);
        }
        $data['ads'] = $query->take($total)->get()->toArray();
        $data['total_ads'] = Post::with('brand','city','user')->where('vcode','=',0)->where('is_sold','=',0)->whereHas('brand', function ($query) { $query->where('brandslug', '=',$this->slug); })->count();
        $data['showing_ads'] = count($data['ads']);
        return response()->json([
            'success'=>true,
            'data'=>$data,
            'image_path' => 'https://letmobile.pk/public/images/'
        ], 200);
    }
    public function city(Request $request,$slug)
    {
        $skip = 0;
        $total = env('PAGE_SIZE',20);
        if($request->has('page'))
        {
            $skip = ($request->page - 1) * $total;
        }
        
        $this->slug = $slug;
        $query = Post::query();
        $query->with('brand','city','user')->where('vcode','=',0)
        ->whereHas('city', function ($query) { $query->where('cityslug', '=',$this->slug); })->where('is_sold','=',0)
        ->select('aid','adprice','br_id','loc_id','postedby','adimgs','adtitle','cond','adslug','selname','created_at')->orderBy('aid', 'DESC');
        if($skip > 0)
        {
            $query->skip($skip);
        }
        $data['ads'] = $query->take($total)->get()->toArray();
        $data['total_ads'] = Post::with('brand','city','user')->where('vcode','=',0)->where('is_sold','=',0)->whereHas('city', function ($query) { $query->where('cityslug', '=',$this->slug); })->count();
        $data['showing_ads'] = count($data['ads']);
        return response()->json([
            'success'=>true,
            'data'=>$data,
            'image_path' => 'https://letmobile.pk/public/images/'
        ], 200);
    }
    public function category(Request $request,$slug)
    {
        $skip = 0;
        $total = env('PAGE_SIZE',20);
        if($request->has('page'))
        {
            $skip = ($request->page - 1) * $total;
        }
        
        $cond = 0;
        if($slug == 'new')
        {
            $cond = 1;
        }
        else if ($slug == 'used')
        {
            $cond = 0;
        }
        else if ($slug == 'installments')
        {
            $cond = 2;
        }
        
        $this->slug = $slug;
        $query = Post::query();
        $query->with('brand','city','user')->where('vcode','=',0)->where('cond','=',$cond)->where('is_sold','=',0)
        ->select('aid','adprice','br_id','loc_id','postedby','adimgs','adtitle','cond','adslug','selname','created_at')->orderBy('aid', 'DESC');
        if($skip > 0)
        {
            $query->skip($skip);
        }
        $data['ads'] = $query->take($total)->get()->toArray();
         $data['total_ads'] = Post::where('cond','=',$cond)->where('vcode','=',0)->where('is_sold','=',0)->count();
        $data['showing_ads'] = count($data['ads']);
        return response()->json([
            'success'=>true,
            'data'=>$data,
            'image_path' => 'https://letmobile.pk/public/images/'
        ], 200);
    }
    
    public function user(Request $request,$slug)
    {
        $skip = 0;
        $total = env('PAGE_SIZE',20);
        if($request->has('page'))
        {
            $skip = ($request->page - 1) * $total;
        }
        
        $this->slug = $slug;
        $query = Post::query();
        $query->with('brand','city','user')->where('vcode','=',0)
        ->whereHas('user', function ($query) { $query->where('usrslug', '=',$this->slug); })->where('is_sold','=',0)
        ->select('aid','adprice','br_id','loc_id','postedby','adimgs','adtitle','cond','adslug','selname','created_at')->orderBy('aid', 'DESC');
        if($skip > 0)
        {
            $query->skip($skip);
        }
        $data['ads'] = $query->take($total)->get()->toArray();
        $data['total_ads'] = Post::with('brand','city','user')->where('vcode','=',0)->where('is_sold','=',0)->whereHas('user', function ($query) { $query->where('usrslug', '=',$this->slug); })->count();
        $data['showing_ads'] = count($data['ads']);
        $data['user_detail'] = User::where('usrslug', '=',$this->slug)->first()->toArray();
        return response()->json([
            'success'=>true,
            'data'=>$data,
            'image_path' => 'https://letmobile.pk/public/images/'
        ], 200);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$slug)
    {
        $data['item'] = Post::with('brand','city','user')->withCount('postview')->where('is_sold','=',0)->where('adslug','=',$slug)->first();
        if (isset($data['item']->aid)) { 
            $data['l_ads'] = Post::with('brand','city')->where('vcode','=',0)->where('cond','=',$data['item']->cond)->select('adprice','br_id','loc_id','postedby','adimgs','adtitle','cond','adslug','selname','created_at')->orWhere('loc_id','=',$data['item']->loc_id)->where('br_id','=',$data['item']->br_id)->take(17)->orderBy('aid', 'DESC')->get();
            $data['ads'] = Post::with('brand','city')->where('vcode','=',0)->where(['postedby'=>$data['item']->postedby])->select('aid','aid','adprice','br_id','loc_id','postedby','adimgs','adtitle','adslug','selname','created_at')->where('adslug','!=',$slug)->take(10)->orderBy('aid', 'DESC')->get();
            $view = Postview::where(['post_id'=>$data['item']->aid,'user_ip'=>$request->ip()])->get();
            if ($view->count() < 1) {          
                $view = new Postview();
                $view->user_id = null;
                $view->post_id = $data['item']->aid;
                $view->user_ip = $request->ip();
                $view->save();
            }
            $data['item']->ad_description = str_replace('Description','',strip_tags($data['item']->ad_description));
            return response()->json([
                'success'=>true,
                'data'=>$data['item'],
                'image_path' => 'https://letmobile.pk/public/images/'
            ], 200);
        }
        else {
            return response()->json([
                'success'=>false,
                'data'=> 'Ad Not Found'
            ], 404);
        }
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
