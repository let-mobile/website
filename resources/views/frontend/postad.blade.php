@extends('layouts.default')
@section('title')
<title>Post a free Mobile Ad | Let Mobile </title>
<meta name="description" content="Let mobile is largest Used Mobile and New Mobiles Sale Website in Pakistan. Now You can Sell and Buy Latest Mobiles in all over the Pakistan.">
@stop
@section('page-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/richtexteditor/rte_theme_default.css') }}" />
<style>
  .imageThumb {
    max-height: 75px;
    min-width: 75px;
    border: 2px solid #03a9fa;
    padding: 1px;
    cursor: pointer;
  }
  .pip {
    display: inline-block;
    margin: 10px 10px 0 0;
  }
  .remove {
    display: block;
    background: #03a9fa;
    border: 1px solid #03a9fa;
    color: white;
    text-align: center;
    cursor: pointer;
  }
  .remove:hover {
    background: white;
    color: black;
  }
  .select2
  {
    width: 100% !important;
    margin-bottom: 10px !important;
    outline: none;
    border-radius: 2px;
  }
  .select2-selection
  {
    padding: 2px !important;
    border-radius: 0px !important;
    height: 36px !important;
    border-radius: 2px;
  }
  .select2-search__field
  {
    outline: none !important;
  }
</style>
@stop
@section('content')
<div class="MainPostAd">
    <div class="container MainInnserDiv">
    <form action="{{ url('post/store') }}" method="POST">
      <div class="UploadImg " id="one-step">
          <h3 class="text-center">Upload Images</h3>
          <p class="text-center">Add up to 4 photos. Use a real image of your product, not catalogs</p>
          <div class="row mt-1 text-center">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" id="File-Body">
                  <label id="File-Lable" for="File-For">
                      <div id="Filebutton">
                        <img src="{{ asset('assets/images/upload-icon.png') }}"  alt="" /> Upload Images
                      </div>
                  </label>
                  <input id="File-For" type="file" multiple name="files" accept="image/*">
                  <div class="field" ></div>
              </div>
          </div>
      </div>
      <div  class="form position-relative step-hide" id="two-step">
          <h3 class="text-center mb-4">Device Details</h3>
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="brand" class="mb-2" class="form-control">Select Brand</label>
                    <select name="brand" id="brands" required>
                        <option value="0" selected disabled>Select Brand</option>
                        @if($brands)
                          @foreach($brands as $row)
                            <option value="{{ $row['bid'] ?? '' }}"  {{ (request()->cookie('let__brand') == $row['bid'])?'selected':''  }}>{{ ucwords($row['brand']) }}</option>
                          @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="brand" class="mb-2" class="form-control">Condition</label>
                    <select name="cond" id="condition" required>
                      <option value="0" {{ (request()->cookie('let__condition') == 0)?'selected':''  }}>Used</option>
                      <option value="1" {{ (request()->cookie('let__condition') == 1)?'selected':''  }}>New</option>
                      <option value="2" {{ (request()->cookie('let__condition') == 2)?'selected':''  }}>Intallments</option>
                    </select>
                </div>
            </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                      <label for="name" class="mb-1">Ad Title</label>
                      <input type="text" name="title" id="let__title" placeholder="Enter your title.." required value="{{ request()->cookie('let__title') }}">
                  </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                      <label for="Price" class="mb-1">Price</label>
                      <input type="phone" name="price" id="let__price" placeholder="40000" required value="{{ request()->cookie('let__price') ?? '' }}">
                  </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                      <label for="Description" class="mb-2">Description</label>
                      <textarea name="description" id="div_editor1" cols="30" rows="6">{{ request()->cookie("let__description") ?? "" }}</textarea>
                  </div>
              </div>
          </div>
      </div>
      <div  class="form position-relative step-hide" id="three-step">
        <h3 class="text-center mb-4">Location and Mobile No Details</h3>
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
                  <label for="location" class="mb-2">Select City</label>
                  <select name="city" id="city" required>
                      <option value="0" selected disabled>Select City</option>
                      @if($cities)
                        @foreach($cities as $row)
                          <option value="{{ $row['ctid'] ?? '' }}" {{ (request()->cookie('let__city') == $row['ctid'])?'selected':'' }}>{{ ucwords($row['city']) }}</option>
                        @endforeach
                      @endif
                  </select>
              </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
                  <label for="Description" class="mb-2">Street Address</label>
                  <input type="text" name="address" id="address" placeholder="Street Address" value="{{ request()->cookie('let__address') ?? '' }}" required>
              </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
                  <label for="Add mobile number" class="mb-2">Add mobile number</label>
                  <input type="tel" name="phone" id="phone" placeholder="0xxxxxxxx" value="{{ request()->cookie('let__phone') ?? Session::get('phone') }}" required>
              </div>
          </div>
          </div>
        </div>
      </div>
    </form>
  </div>
<div class="sticky-footer">
  <a href="javascript:;"  class="call-button step-disabled" id="back" data-back-setp="one-step"> << Back</a>
  <a href="javascript:;" class="call-button step-disabled" id="next" data-next-setp="two-step">Next Step</a>
</div>
@stop
@section('page-scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/richtexteditor/rte.js') }}"></script>
<script>RTE_DefaultConfig.url_base="{{ asset('assets/richtexteditor') }}"</script>
<script type="text/javascript" src="{{ asset('assets/richtexteditor/plugins/all_plugins.js') }}"></script>
<script>
  var editor1cfg = {}
  editor1cfg.toolbar = "basic";
  var editor1 = new RichTextEditor("#div_editor1", editor1cfg);
  // editor1.setHTMLCode('');
  // alert(editor1.getPlainText())
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#brands').select2();
    $('#condition').select2();
    $('#city').select2();
    function setCookie(name,value,days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    }
    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }
    function eraseCookie(name) {
        document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }
    $('input#let__title').bind("change keyup input",function() {
      console.log($(this).val());
      setCookie('let__title',$(this).val(),1);
    });
    $('input#let__price').bind("change keyup input",function() { 
      console.log($(this).val());
      setCookie('let__price',$(this).val(),1);
    });
    $('input#address').bind("change keyup input",function() { 
      console.log($(this).val());
      setCookie('let__address',$(this).val(),1);
    });
    $('input#phone').bind("change keyup input",function() { 
      console.log($(this).val());
      setCookie('let__phone',$(this).val(),1);
    });
    editor1.attachEvent("change", function () {      
      console.log(editor1.getPlainText());
      setCookie('let__description',editor1.getPlainText(),1);
    });
    $('select#brands').bind("change",function() { 
      console.log($(this).val());
      setCookie('let__brand',$(this).val(),1);
    });
    $('select#condition').bind("change",function() {
      console.log($(this).val());
      setCookie('let__condition',$(this).val(),1);
    });
    $('select#city').bind("change",function() { 
      console.log($(this).val());
      setCookie('let__city',$(this).val(),1);
    });
  });
  $(document).ready(function() {

    $('#next').click('',function(){
      var next = $('#next').attr('data-next-setp');
      var back = $('#back').attr('data-back-setp');

      if(next == 'two-step')
        {
          $('#'+next).removeClass('step-hide');
          $('#'+back).addClass('step-hide');
          $('#back').removeClass('step-disabled');
          $('#back').attr('data-back-setp','two-step');
          $('#next').attr('data-next-setp','three-step');
        }
      if(next == 'three-step')
        {
          $('#'+next).removeClass('step-hide');
          $('#'+back).addClass('step-hide');
          $('#back').attr('data-back-setp','three-step');
          $('#next').slideUp();

        }
    });
    $('#back').click('',function(){
      var back = $('#back').attr('data-back-setp');
      if(back == 'two-step')
      {
        $('#one-step').removeClass('step-hide');
        $('#'+back).addClass('step-hide');
        $('#back').attr('data-back-setp','one-step');
        $('#next').attr('data-next-setp','two-step');
      }
      if(back == 'three-step')
      {
        $('#two-step').removeClass('step-hide');
        $('#'+back).addClass('step-hide');
        $('#back').attr('data-back-setp','two-step');
        $('#next').slideDown();
        $('#next').attr('data-next-setp','three-step');
      }
    });
    if (window.File && window.FileList && window.FileReader) {
      $("#File-For").on("change", function(e) {
        var files = e.target.files,
          filesLength = files.length;
          for (var i = 0; i < filesLength; i++) {
            var f = files[i]
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
              var file = e.target;
              $(".field").append("<span class=\"pip\">" +
                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                "<span class=\"remove\">Delete</span>" +
                "</span>");
              $(".remove").click(function(){
                $(this).parent(".pip").remove();
              });

              // Old code here
              /*$("<img></img>", {
                class: "imageThumb",
                src: e.target.result,
                title: file.name + " | Click to remove"
              }).insertAfter("#files").click(function(){$(this).remove();});*/

            });
            fileReader.readAsDataURL(f);
          }
          if(filesLength > 0)
          {
            $('#next').removeClass('step-disabled');
          }
      });
    } else {
      alert("Your browser doesn't support to File API")
    }
  });
</script>
@stop
