@extends('layouts.default')
@section('title')
<title>Contact Us | Let Mobile </title>
<meta name="description" content="LetMobile.pk is a website where you can buy or sell Used Mobile Phone and New Mobile Phone on Instalments. Now you can Sell, Buy or get at one place.">
@stop
@section('content')
<div id="content" class="section-padding">
	<div class="container">
		<div class="row clearfix mt-3 mb-2">
			<div class="col-md-4">
				<div class="contact_info">
					<h5 class="list-title gray"><strong>Contact Us</strong></h5>
					<div class="contact-info">
						<div class="address">
							<p class="p1 mb-0"> <i class="lni-map-marker"> </i> Bareez Strt, 74-B Canal, Raiwind Rd, Lahore, 54000 </p>
							<p class="mb-0"> <i class="lni-envelope"></i>  info@letmobile.pk</p>
							<p class="mb-0"><i class="lni-phone"></i> (042) 35957618</p>
							<div>
								<p class="mb-0"><strong><a href="" class="text-decoration-none">Get a Quote</a></strong></p>
								<p class="mb-0"><strong> <a href="{{ url('login') }}" class="text-decoration-none">Client Area Login</a></strong></p>
								<!-- <p><strong> <a href="#skypeid" class="skype">Live Chat</a></strong></p> -->
								<p class="mb-0"><strong> <a href="{{ url('support/terms-conditions') }}" class="text-decoration-none">Knowledge Base</a></strong></p>
							</div>
						</div>
					</div>
                    <a href="https://play.google.com/store/apps/details?id=com.letmobile.app"><img src="{{ asset('assets/images/google play.png') }}" class="mb-3 mt-3" alt="google play"></a>
				</div>
			</div>
			<div class="col-md-8">
				<div class="contact-form" id="mydiv">
					<h5 class="list-title gray mb-2"><strong>Contact us</strong></h5>
					<form id="contactForm"  accept-charset="utf-8" class="form-horizontal">
					{{ @csrf_field() }}
				    <fieldset>
				        <div class="row">
				            <div class="col-sm-12">
				                <div class="form-group mb-2">
				                    <div class="col-md-12">
				                        <input type="text" name="name" placeholder="Enter Name" class="form-control">
				                    </div>
				                </div>
				            </div>
				            <div class="col-sm-12">
				                <div class="form-group mb-2">
				                    <div class="col-md-12">
				                        <input type="email" name="email" placeholder="Enter Email" class="form-control">
				                    </div>
				                </div>
				            </div>
				            <div class="col-lg-12">
				                <div class="form-group mb-2">
				                    <div class="col-md-12">
				                        <textarea name="message" cols="40" rows="7" placeholder="Enter Message" class="form-control"></textarea>
				                    </div>
				                </div>
				                <div class="form-group">
	                                <ul class="errors"></ul>
	                                <ul class="success"></ul>
	                            </div>
				                <div class="form-group">
				                    <div class="col-md-12 ">
				                        <input type="submit" name="" value="Submit" class="btn btn-primary btn-lg"> </div>
				                </div>
				            </div>
				        </div>
				    </fieldset>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="intro-inner">
	<div class="contact-intro">
		<div class="w100 map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13613.232676248952!2d74.2493217!3d31.4607079!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xadd1b852462f8744!2sLetMobile.pk%20is%20a%20website%20where%20you%20can%20buy%20or%20sell%20Used%20Mobile%20Phone%20and%20New%20Mobile%20Phone%20on%20Instalments.!5e0!3m2!1sen!2s!4v1672230777460!5m2!1sen!2s"  width="100%" frameborder="0" style="border:0" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
	</div>
</div>
@stop
@section('page-scripts')
<script type="text/javascript">
    $("#contactForm :input").on("keyup", function() {
        if (!$(this).val()) {
            $(this).addClass('required');
        } else if ($(this).val()) {
            $(this).removeClass('required');
        }
    });
    $('#contactForm').submit(function(e) {
        e.preventDefault();
        $(".errors").text("");
        $(".errors").hide();
        $(".success").text("");
        $(".success").hide();
        var errors = 0;
        $("#contactForm :input").map(function() {
            if (!$(this).val()) {
                $(this).addClass('required');
                errors++;
            } else if ($(this).val()) {
                $(this).removeClass('required');
            }
        });
        if (errors > 0) { return false; }
        var formData = $(this).serialize();
        $('.log-btn').attr('disabled', true);
        $("#mydiv").addClass("disabled-div");
        $.ajax({
            type: 'POST',
            url: '{{ url("/contact/store") }}',
            data: formData,
            dataType: 'json',
            error: function(data) {
                $("#mydiv").removeClass("disabled-div");
                $('.log-btn').attr('disabled', false);
                var x = JSON.parse(data.responseText);
                $(".errors").show();
                for (var error in x.errors) {
                    $(".errors").append("<li>"+x.errors[error]+"</li>");
                    $('#'+error).addClass('required');
                }
            },
            success: function(data) {
                $("#mydiv").removeClass("disabled-div");
                $('#contactForm')[0].reset();
                $('.log-btn').prop('disabled', false);
                $(".success").show();
                $(".success").append("<li><strong>Sucess!</strong> Your message has been received.  Please enjoy, and let us know if there’s anything else we can help you with. <br> <b> The Let Mobile Team <b></li>");
            }
        });
    });
</script>
@stop