<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Post;
use DB;
use App\Cities;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $slug;
    public function index(Request $request,$slug)
    {
        $this->slug = $slug;
        $this->search = $data['search'] = $request->get('s');
    	$this->loc = $data['loc'] = $request->get('loc')?$request->get('loc'):'';
    	$this->min = $data['min'] = $request->get('min')?$request->get('min'):0;
    	$this->max = $data['max'] = $request->get('max')?$request->get('max'):100000000;
    	$query = Post::query();
    	$query->with('brand','city');
        // Check Properties By Area
        if (!empty($this->loc)) {
            $query->whereIn('loc_id',Cities::where('city','LIKE', '%'. $this->loc. '%')->pluck('ctid')->toArray());
        }
        $data['ads'] = $query->whereHas('brand', function ($query) { $query->where('brandslug', '=',$this->slug); })
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
        return view('admin/brand/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand1 = $request->input('brand');

        $brand = new Brand;
        $brand->brand = $brand1;
        $brand->brandslug = $this->createSlug($brand1);
        $brand->save();

        return response(["success"=>true,"msg"=>"Brand added successfully"], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data['brand'] = DB::table('brands')->orderBy('brand', 'Asc')->get();
        return view('admin/brand/index',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $brand = Brand::where('bid','=', $id)->get();
        return view('admin/brand/edit',['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $brand = $request->input('brand');
        $brandslug = $request->input('brandslug');
        DB::table('brands')->where('bid', $id)->update( [ 'brand' => $brand, 'brandslug' => $this->createSlug($brand,$id)]);
        return response(["success"=>true,"msg"=>"Brand updated successfully"], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {
       Brand::where('bid', $id)->delete();
       return redirect('admin/brand/show');
    }

    public function createSlug($title, $id = 0) {
        $slug = Str::slug($title, '-');
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        if (! $allSlugs->contains('brandslug', $slug)){
            return $slug;
        }
        for ($i = 1; $i <= 10000; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('brandslug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }
    protected function getRelatedSlugs($slug, $id = 0) {
        return Brand::select('brandslug')->where('brandslug', 'like', $slug.'%')
            ->where('bid', '<>', $id)
            ->get();
    }
}
