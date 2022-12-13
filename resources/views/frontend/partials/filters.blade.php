<div class="col-md-3 h-100 p-0 d-none d-sm-block d-xs-block">
    <div class="topInput">
        <img src="{{ asset('public/assets/images/refine-search-icon.png') }}" alt="">
        <b class="fs-6  p-2 pt-0 pb-0">Refine</b>
    </div>
    <div class="featured-box mt-2">
        <form action="" class="p-3">
        <input type="hidden" name="q" value="{{ request()->q ?? '' }}">
            <h4 class="fs-6  pb-2">Categories</h4>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="cond[]"  id="category-New" {{ (!is_null(request()->cond) && in_array(1,request()->cond))?'checked':'' }} >
                <label class="form-check-label" for="category-New">New Phone </label> 
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="0" name="cond[]" id="category-Used" {{ (!is_null(request()->cond) && in_array(0,request()->cond))?'checked':'' }}>
                <label class="form-check-label" for="category-Used">Used Phone</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="2" name="cond[]" id="category-Installment" {{ (!is_null(request()->cond) && in_array(2,request()->cond))?'checked':'' }}>
                <label class="form-check-label" for="category-Installment">Installment Phone</label>
            </div>
            <hr>
            <h4 class="fs-6  pb-2">Location</h4>
            <input type="search" name="q_loc" placeholder="Enter location"  class="mb-3 form-control">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="85" name="loc[]" id="loc-85" {{ (!is_null(request()->loc) && in_array(85,request()->loc))?'checked':'' }}>
                <label class="form-check-label" for="loc-85">Lahore</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="113" name="loc[]" id="loc-113" {{ (!is_null(request()->loc) && in_array(113,request()->loc))?'checked':'' }}>
                <label class="form-check-label" for="loc-113">Karachi</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="24" name="loc[]" id="loc-24" {{ (!is_null(request()->loc) && in_array(24,request()->loc))?'checked':'' }}>
                <label class="form-check-label" for="loc-24">Islamabad</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="loc[]" id="loc-1" {{ (!is_null(request()->loc) && in_array(1,request()->loc))?'checked':'' }}>
                <label class="form-check-label" for="loc-1">Faisalabad</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="89" name="loc[]" id="loc-89" {{ (!is_null(request()->loc) && in_array(89,request()->loc))?'checked':'' }}>
                <label class="form-check-label" for="loc-89">Multan</label>
            </div>
            <hr>

            <h4 class="fs-6  pb-2">Brands</h4>
            <input type="search" name="q_br" placeholder="Enter Brand" class="mb-3 form-control" >
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="2" name="brand[]" id="brand-2" {{ (!is_null(request()->brand) && in_array(2,request()->brand))?'checked':'' }}>
                <label class="form-check-label" for="brand-2">iPhone</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="brand[]" id="brand-1" {{ (!is_null(request()->brand) && in_array(1,request()->brand))?'checked':'' }}>
                <label class="form-check-label" for="brand-1">Samsung</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="97" name="brand[]" id="brand-97" {{ (!is_null(request()->brand) && in_array(97,request()->brand))?'checked':'' }}>
                <label class="form-check-label" for="brand-97">Vivo</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="68" name="brand[]" id="brand-68" {{ (!is_null(request()->brand) && in_array(68,request()->brand))?'checked':'' }}>
                <label class="form-check-label" for="brand-68">Oppo</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="115" name="brand[]" id="brand-115" {{ (!is_null(request()->brand) && in_array(115,request()->brand))?'checked':'' }}>
                <label class="form-check-label" for="brand-115">Infinix</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="117" name="brand[]" id="brand-117" {{ (!is_null(request()->brand) && in_array(117,request()->brand))?'checked':'' }}>
                <label class="form-check-label" for="brand-117">Realme</label>
            </div>
            
            
            <hr>
            <div class=" d-block text-center">
                <a href="{{ url('/') }}" class="btn-rupees bgColor text-decoration-none" type="reset">Clear</a>
                <button class="btn-rupees">Update</button>
            </div>
        </form>
    </div>
</div>