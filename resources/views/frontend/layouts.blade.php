<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="EasyChop - Discover & Book the best restaurants at the best price">
    <meta name="author" content="Serial Developers">
    <title>EasyChop - Discover & Book the best restaurants at the best price</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{asset('front-assets/img/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{asset('front-assets/img/apple-touch-icon-57x57-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{asset('front-assets/img/apple-touch-icon-72x72-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{asset('front-assets/img/apple-touch-icon-114x114-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{asset('front-assets/img/apple-touch-icon-144x144-precomposed.png')}}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{asset('front-assets/css/bootstrap_customized.min.css')}}" rel="stylesheet">
    <link href="{{asset('front-assets/css/style.css')}}" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="{{asset('front-assets/css/home.css')}}" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="{{asset('front-assets/css/help.css')}}" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="{{asset('front-assets/css/contacts.css')}}" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="{{asset('front-assets/css/submit.css')}}" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="{{asset('front-assets/css/listing.css')}}" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="{{asset('front-assets/css/booking-sign_up.css')}}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{asset('front-assets/css/custom.css')}}" rel="stylesheet">
    <script src="{{asset('plugins/sweetalert/js/sweetalert.min.js')}}"></script>

    <!-- DATATABLE -->
    <link rel="stylesheet" href="{{ asset('plugins/datatable/css/datatables.min.css') }}">

	

    <!-- Custom style here -->
    <style>
    .home-search-button{
        background-color: #Ff2000!important;
    }

    .easy-chop-orange-color{
        color: #FF8D00!important;
    }

    .easy-chop-orange-bg{
        background-color: #FF8D00!important;
    }

    .headline {
            z-index: 1;
            background-color: white;
            position: relative;
    }

	.pac-container:after{
    	content:none !important;
	}
    </style>

</head>

<body>
    @include('sweet::alert')
@include('frontend.bottomNav')
	<header class="header clearfix element_to_stick"> {{-- Dis one dey work for other pages except d shop page --}}
		<div class="container">
		<div id="logo">
			<a href="{{url('/')}}">
				<img src="{{asset('front-assets/img/logo.png')}}" width="140" alt="" class="logo_normal">
				<img src="{{asset('front-assets/img/logo_sticky.png')}}" width="140" alt="" class="logo_sticky">
			</a>
		</div>
		<!-- /top_menu -->
		<!-- <a href="#0" class="open_close">
			<i class="icon_menu"></i><span>Menu</span>
		</a> -->
        @include('frontend.menu')
		
	</div>
	
	</header>
	<!-- /header -->
	
	
    @yield('content')
<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3 data-target="#collapse_1">Quick Links</h3>
					<div class="collapse dont-collapse-sm links" id="collapse_1">
						<ul>
							<li><a href="{{url('/about')}}">About us</a></li>
							<li><a href="#">Add your restaurant</a></li>
							<li><a href="#">Help</a></li>
							<li><a href="#">My account</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="#">Contacts</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3 data-target="#collapse_2">Categories</h3>
					<div class="collapse dont-collapse-sm links" id="collapse_2">
						<ul>
							<li><a href="#">Top Categories</a></li>
							<li><a href="#">Best Rated</a></li>
							<li><a href="#">Best Price</a></li>
							<li><a href="#">Latest Submissions</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
						<h3 data-target="#collapse_3">Contacts</h3>
					<div class="collapse dont-collapse-sm contacts" id="collapse_3">
						<ul>
							<li><i class="icon_house_alt"></i>EasyChop Address - Nigeria</li>
							<li><i class="icon_mobile"></i>+234-8116007280</li>
							<li><i class="icon_mail_alt"></i><a href="#0">info@domain.com</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
						<h3 data-target="#collapse_4">Keep in touch</h3>
					<div class="collapse dont-collapse-sm" id="collapse_4">
						<div id="newsletter">
							<div id="message-newsletter"></div>
							<form method="post" action="assets/newsletter.php" name="newsletter_form" id="newsletter_form">
								<div class="form-group">
									<input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
									<button type="submit" id="submit-newsletter"><i class="arrow_carrot-right"></i></button>
								</div>
							</form>
						</div>
						<div class="follow_us">
							<h5>Follow Us</h5>
							<ul>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset('front-assets/img/twitter_icon.svg')}}" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset('front-assets/img/facebook_icon.svg')}}" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset('front-assets/img/instagram_icon.svg')}}" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset('front-assets/img/youtube_icon.svg')}}" alt="" class="lazy"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- -- /row -- -->
			<hr>
			<div class="row add_bottom_25">
				<div class="col-lg-6">
					<ul class="footer-selector clearfix">
						<li>
							<div class="styled-select lang-selector">
								<select>
									<option value="English" selected>English</option>
									<option value="French">French</option>
									<option value="Spanish">Spanish</option>
									<option value="Russian">Russian</option>
								</select>
							</div>
						</li>
						<li>
							<div class="styled-select currency-selector">
								<select>
									<option value="NGN" selected>NGN</option>
									<option value="US Dollars">US Dollars</option>
								</select>
							</div>
						</li>
						<li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset('front-assets/img/cards_all.svg')}}" alt="" width="198" height="30" class="lazy"></li>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul class="additional_links">
						<li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Privacy</a></li>
						<li><span>© <?php echo date('Y') ?> EasyChop</span></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->

	<div id="toTop"></div><!-- Back to top button -->

	<div class="layer"></div><!-- Opacity Mask Menu Mobile -->

	<!-- COMMON SCRIPTS -->
	
	<script src="{{asset('front-assets/js/common_scripts.min.js')}}"></script>
    <script src="{{asset('front-assets/js/common_func.js')}}"></script>
    {{-- <script src="{{asset('front-assets/assets/validate.js')}}"></script> --}}
    <script src="{{asset('plugins/vue/vue.min.js')}}"></script>
    <script src="{{asset('plugins/axios/axios.js')}}"></script>
    <script src="{{asset('plugins/momentjs/moment.min.js')}}"></script>
    <script src="{{asset('plugins/lodash/lodash.min.js')}}"></script>
    <script src="{{ asset('plugins/bootstrap4-toggle/js/bootstrap4-toggle.min.js') }}"></script>
    <script src="{{asset('plugins/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('plugins/summernote/dist/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('plugins/croppie/js/croppie.min.js')}}"></script>
    <!-- DATATABLE -->
    <script src="{{asset('plugins/datatable/js/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    @yield('script')

</body>
</html>
