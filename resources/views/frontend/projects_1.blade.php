@extends('frontend.layouts.app')
@section('content')
	<div class="content-wrapper">
		<!-- Lines -->
		<section class="content-lines-wrapper">
			<div class="content-lines-inner">
				<div class="content-lines"></div>
			</div>
		</section>
		<!-- Header Banner -->
		<section class="banner-header banner-img valign bg-img bg-fixed" data-overlay-darkgray="5" data-background="img/banner.jpg">
			<!-- Left Panel -->
			<div class="left-panel"></div>
		</section>
		<!-- Project Page -->
		<section class="section-padding2">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 class="section-title2">Cotton House</h2> </div>
				</div>
				<div class="row">
					<div class="col-lg-8 col-md-12">
						<p>Architecture non lorem ac erat suscipit bibendum. Nulla facilisi. Sedeuter nunc volutpat, mollis sapien vel, conseyer turpeutionyer masin libero sempe. Fusceler mollis augue sit amet hendrerit vestibulum. Duisteyerionyer venenatis lacus.</p>
						<p>Villa gravida eros ut turpis interdum ornare. Interdum et malesu they adamale fames ac anteipsu pimsine faucibus. Curabitur arcu site feugiat in tortor in, volutpat sollicitudin libero.</p>
					</div>
					<div class="col-lg-4 col-md-12">
						<p><b>Year : </b> 2025</p>
						<p><b>Company : </b> WPS International</p>
						<p><b>Project Name : </b> Cotton House</p>
						<p><b>Location : </b> Toronto, Canada</p>
					</div>
				</div>
				<div class="row mt-30">
					<div class="col-md-6 gallery-item">
						<a href="img/slider/1.jpg" title="Architecture" class="img-zoom">
							<div class="gallery-box">
								<div class="gallery-img"> <img src="img/slider/1.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
							</div>
						</a>
					</div>
					<div class="col-md-6 gallery-item">
						<a href="img/slider/2.jpg" title="Architecture" class="img-zoom">
							<div class="gallery-box">
								<div class="gallery-img"> <img src="img/slider/2.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
							</div>
						</a>
					</div>
					<div class="col-md-6 gallery-item">
						<a href="img/slider/3.jpg" title="Architecture" class="img-zoom">
							<div class="gallery-box">
								<div class="gallery-img"> <img src="img/slider/3.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
							</div>
						</a>
					</div>
					<div class="col-md-6 gallery-item">
						<a href="img/slider/4.jpg" title="Architecture" class="img-zoom">
							<div class="gallery-box">
								<div class="gallery-img"> <img src="img/slider/4.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</section>
		<!-- Prev-Next Projects -->
		<section class="projects-prev-next">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="d-sm-flex align-items-center justify-content-between">
							<div class="projects-prev-next-left">
								<a href="prime-hotel.html"> <i class="ti-arrow-left"></i> Previous Project</a>
							</div> <a href="projects.html"><i class="ti-layout-grid3-alt"></i></a>
							<div class="projects-prev-next-right"> <a href="armada-center.html">Next Project <i class="ti-arrow-right"></i></a> </div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Footer -->
		<footer class="main-footer dark">
			<div class="container">
				<div class="row">
					<div class="col-md-4 mb-30">
						<div class="item fotcont">
							<div class="fothead">
								<h6>Phone</h6> </div>
							<p>+1 203-123-0606</p>
						</div>
					</div>
					<div class="col-md-4 mb-30">
						<div class="item fotcont">
							<div class="fothead">
								<h6>Email</h6> </div>
							<p>architecture@bauen.com</p>
						</div>
					</div>
					<div class="col-md-4 mb-30">
						<div class="item fotcont">
							<div class="fothead">
								<h6>Our Address</h6> </div>
							<p>24 King St, Charleston, SC 29401 USA</p>
						</div>
					</div>
				</div>
			</div>
			<div class="sub-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="text-left">
								<p>© 2025 Bauen. All right reserved.</p>
							</div>
						</div>
						<div class="col-md-4 abot">
							<div class="social-icon"> <a href="index.html"><i class="ti-facebook"></i></a> <a href="index.html"><i class="fa-brands fa-x-twitter"></i></a> <a href="index.html"><i class="ti-instagram"></i></a> <a href="index.html"><i class="fa-brands fa-tiktok"></i></a> </div>
						</div>
						<div class="col-md-4">
							<p class="right"><a href="#">Terms &amp; Conditions</a></p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
@endsection