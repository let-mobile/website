<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $primaryKey = 'aid';
    public function scopeFilters($query,$req)
    {
        if(!is_null($req->q) && !empty($req->q))
        {
            $query->where('adtitle', 'LIKE', '%'.$req->q.'%')->orWhere('adadress', 'LIKE', '%'.$req->q.'%');
        }
        if(!is_null($req->cond) && !empty($req->cond) && is_array($req->cond))
        {
            $query->whereIn('cond', $req->cond);
        }
        if(!is_null($req->loc) && !empty($req->loc) && is_array($req->loc))
        {
            $query->whereIn('loc_id', $req->loc);
        }
        if(!is_null($req->brand) && !empty($req->brand) && is_array($req->brand))
        {
            $query->whereIn('br_id', $req->brand);
        }
        return $query;
    }

    public function brand(){
    	return $this->belongsTo(Brand::class,'br_id','bid')->select(array('bid', 'brand','brandslug'));
    }
    public function city(){
    	return $this->belongsTo(Cities::class,'loc_id','ctid')->select(array('ctid', 'city','cityslug'));
    }
    public function postview(){
    	return $this->hasMany(Postview::class,'post_id','aid');
    }
   public function user(){
        return $this->belongsTo(User::class,'postedby','id')->select(array('id', 'fname','lname','usrslug','email'));
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
