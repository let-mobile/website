@extends('layouts.default')
@section('title')
<title>Post a free Mobile Ad | Let Mobile </title>
<meta name="description" content="Let mobile is largest Used Mobile and New Mobiles Sale Website in Pakistan. Now You can Sell and Buy Latest Mobiles in all over the Pakistan.">
@stop
@section('page-css')
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
</style>
@stop
@section('content')
<div class="MainPostAd">
        <div class="container MainInnserDiv">
            <div  class="form position-relative" style="display: none;">
                <h3 class="text-center mb-4">Post your ad</h3>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="name" class="mb-1">Ad Title</label>
                            <input type="text" name="name" placeholder="Enter your name.." required>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="Price" class="mb-1">Price</label>
                            <input type="phone" name="phone" placeholder="0xxxxxxxxx" required>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="brand" class="mb-2" class="form-control">Select Brand</label>
                            <select name="brand" id="">
                                <option value="1">Brand Name</option>
                                <option value="2">Oppo</option>
                                <option value="2">Samsung</option>
                                <option value="2">Hweuei</option>
                                <option value="2">Apple</option>
                                <option value="2">Infinix</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="brand" class="mb-2" class="form-control">Condition</label>
                            <select name="brand" id="">
                                <option value="1">Brand Name</option>
                                <option value="2">Oppo</option>
                                <option value="2">Samsung</option>
                                <option value="2">Hweuei</option>
                                <option value="2">Apple</option>
                                <option value="2">Infinix</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="location" class="mb-2">Select your location</label>
                            <input type="text" name="location" placeholder="Enter your location.." required>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="Description" class="mb-2">Add street no</label>
                            <input type="text" name="street" placeholder="Street no.." required>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="Add mobile number" class="mb-2">Add mobile number</label>
                            <input type="tel" name="phone" placeholder="0xxxxxxxx" required>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="Description" class="mb-2">Description</label>
                            <textarea name="description" id="Description" cols="30" rows="6">Description</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="UploadImg">
                <h3 class="text-center">Upload Images</h3>
                <p class="text-center">Add up to 4 photos. Use a real image of your product, not catalogs</p>
                <div class="row mt-1 text-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" id="File-Body">
                        <label id="File-Lable" for="File-For">
                            <div id="Filebutton">
                                <img src="{{ asset('assets/images/upload-icon.png') }}"  alt="" /> Upload Images</div>
                        </label>
                        <input id="File-For" type="file" multiple name="files" accept="image/*">
                        <div class="field" ></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('page-scripts')
<script type="text/javascript">
  $(document).ready(function() {
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
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
</script>
@stop