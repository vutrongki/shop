@extends('layouts.client')

@section('content')
<!-- Slider -->
<section class="section-slide">
	<div class="wrap-slick1 rs1-slick1">
		<div class="slick1">
			@foreach($slidersMain as $sliderMain)
			<div class="item-slick1" style="background-image: url('{{ $sliderMain->image }}');">
				<div class="container h-full">
					<div class="flex-col-l-m h-full p-t-100 p-b-30">
						<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
							<span class="ltext-202 cl2 respon2">
								{{ $sliderMain->name }}
							</span>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
							<h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1">
								{{ $sliderMain->description }}
							</h2>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
							<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
								Shop Now
							</a>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>


<!-- Banner -->
<div class="sec-banner bg0">
	<div class="flex-w flex-c-m">
		<div class="size-202 m-lr-auto respon4">
			<!-- Block1 -->
			<div class="block1 wrap-pic-w">
				<img src="shop/images/banner-04.jpg" alt="IMG-BANNER">

				<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
					<div class="block1-txt-child1 flex-col-l">
						<span class="block1-name ltext-102 trans-04 p-b-8">
							Women
						</span>

						<span class="block1-info stext-102 trans-04">
							Spring 2018
						</span>
					</div>

					<div class="block1-txt-child2 p-b-4 trans-05">
						<div class="block1-link stext-101 cl0 trans-09">
							Shop Now
						</div>
					</div>
				</a>
			</div>
		</div>

		<div class="size-202 m-lr-auto respon4">
			<!-- Block1 -->
			<div class="block1 wrap-pic-w">
				<img src="shop/images/banner-05.jpg" alt="IMG-BANNER">

				<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
					<div class="block1-txt-child1 flex-col-l">
						<span class="block1-name ltext-102 trans-04 p-b-8">
							Men
						</span>

						<span class="block1-info stext-102 trans-04">
							Spring 2018
						</span>
					</div>

					<div class="block1-txt-child2 p-b-4 trans-05">
						<div class="block1-link stext-101 cl0 trans-09">
							Shop Now
						</div>
					</div>
				</a>
			</div>
		</div>

		<div class="size-202 m-lr-auto respon4">
			<!-- Block1 -->
			<div class="block1 wrap-pic-w">
				<img src="shop/images/banner-06.jpg" alt="IMG-BANNER">

				<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
					<div class="block1-txt-child1 flex-col-l">
						<span class="block1-name ltext-102 trans-04 p-b-8">
							Bags
						</span>

						<span class="block1-info stext-102 trans-04">
							New Trend
						</span>
					</div>

					<div class="block1-txt-child2 p-b-4 trans-05">
						<div class="block1-link stext-101 cl0 trans-09">
							Shop Now
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>


<!-- Product -->
<section class="sec-product bg0 p-t-100 p-b-50">
	<div class="container">
		<div class="p-b-32">
			<h3 class="ltext-105 cl5 txt-center respon1">
				New Product
			</h3>
		</div>

		<!-- Tab01 -->
		<div class="tab01">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item p-b-10">
					<a class="nav-link active" data-toggle="tab" href="#best-seller" role="tab">Best Seller</a>
				</li>

				<li class="nav-item p-b-10">
					<a class="nav-link" data-toggle="tab" href="#featured" role="tab">Featured</a>
				</li>

				<li class="nav-item p-b-10">
					<a class="nav-link" data-toggle="tab" href="#sale" role="tab">Sale</a>
				</li>

				<li class="nav-item p-b-10">
					<a class="nav-link" data-toggle="tab" href="#top-rate" role="tab">Top Rate</a>
				</li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content p-t-50">
				<!-- - -->
				<div class="tab-pane fade show active" id="best-seller" role="tabpanel">
					<!-- Slide2 -->
					<div class="wrap-slick2">
						<div class="slick2">
							@foreach($bestProducts as $bestProduct)
							<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-pic hov-img0">
										<img src="{{ $bestProduct->feature_image_path }}" alt="IMG-PRODUCT">

										<a href="#" data-id="{{$bestProduct->id}}" data-url="{{route('modal', $bestProduct->id)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
											Quick View
										</a>
									</div>

									<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
											<a href="{{ route('product.detail', $bestProduct->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
												{{ $bestProduct->name }}
											</a>

											<span class="stext-105 cl3">
												${{ $bestProduct->price }}
											</span>
										</div>

										<div class="block2-txt-child2 flex-r p-t-3">
											<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
												<img class="icon-heart1 dis-block trans-04" src="{{ asset('shop/images/icons/icon-heart-01.png') }}" alt="ICON">
												<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('shop/images/icons/icon-heart-02.png') }}" alt="ICON">
											</a>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>

				<!-- - -->
				<div class="tab-pane fade" id="featured" role="tabpanel">
					<!-- Slide2 -->
					<div class="wrap-slick2">
						<div class="slick2">
							@foreach($featureProducts as $featureProduct)
							<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-pic hov-img0">
										<img src="{{ $featureProduct->feature_image_path }}" alt="IMG-PRODUCT">

										<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
											Quick View
										</a>
									</div>

									<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
											<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
												{{ $featureProduct->name }}
											</a>

											<span class="stext-105 cl3">
												${{ $featureProduct->price }}
											</span>
										</div>

										<div class="block2-txt-child2 flex-r p-t-3">
											<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
												<img class="icon-heart1 dis-block trans-04" src="{{ asset('shop/images/icons/icon-heart-01.png') }}" alt="ICON">
												<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('shop/images/icons/icon-heart-02.png') }}" alt="ICON">
											</a>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>

				<!-- - -->
				<div class="tab-pane fade" id="sale" role="tabpanel">
					<!-- Slide2 -->
					<div class="wrap-slick2">
						<div class="slick2">
							@foreach($saleProducts as $saleProduct)
							<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-pic hov-img0">
										<img src="{{ $saleProduct->feature_image_path }}" alt="IMG-PRODUCT">

										<a href="#" data-id="{{$saleProduct->id}}" data-url="{{route('modal', $saleProduct->id)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
											Quick View
										</a>
									</div>

									<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
											<a href="{{ route('product.detail', $saleProduct->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
												{{ $saleProduct->name }}
											</a>

											<span class="stext-105 cl3">
												${{ $saleProduct->price }}
											</span>
										</div>

										<div class="block2-txt-child2 flex-r p-t-3">
											<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
												<img class="icon-heart1 dis-block trans-04" src="{{ asset('shop/images/icons/icon-heart-01.png') }}" alt="ICON">
												<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('shop/images/icons/icon-heart-02.png') }}" alt="ICON">
											</a>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>

				<!-- - -->
				<div class="tab-pane fade" id="top-rate" role="tabpanel">
					<!-- Slide2 -->
					<div class="wrap-slick2">
						<div class="slick2">
							@foreach($rateProducts as $rateProduct)
							<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-pic hov-img0">
										<img src="{{ $rateProduct->feature_image_path }}" alt="IMG-PRODUCT">

										<a href="#" data-id="{{$rateProduct->id}}" data-url="{{route('modal', $rateProduct->id)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
											Quick View
										</a>
									</div>

									<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
											<a href="{{ route('product.detail', $rateProduct->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
												{{ $rateProduct->name }}
											</a>

											<span class="stext-105 cl3">
												${{ $rateProduct->price }}
											</span>
										</div>

										<div class="block2-txt-child2 flex-r p-t-3">
											<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
												<img class="icon-heart1 dis-block trans-04" src="{{ asset('shop/images/icons/icon-heart-01.png') }}" alt="ICON">
												<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('shop/images/icons/icon-heart-02.png') }}" alt="ICON">
											</a>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="p-b-32">
			<h3 class="ltext-105 cl5 txt-center respon1">
				List Product
			</h3>
		</div>

		<div class="row isotope-grid">
			@foreach($newProducts as $newProduct)
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<img src="{{ $newProduct->feature_image_path }}" alt="IMG-PRODUCT">

						<a href="#" data-id="{{$newProduct->id}}" data-url="{{route('modal', $newProduct->id)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
							Quick View
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="{{ route('product.detail', $newProduct->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								{{ $newProduct->name }}
							</a>

							<span class="stext-105 cl3">
								${{ $newProduct->price }}
							</span>
						</div>

						<div class="block2-txt-child2 flex-r p-t-3">
							<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
								<img class="icon-heart1 dis-block trans-04" src="{{ asset
                                        ('shop/images/icons/icon-heart-01.png') }}" alt="ICON">
								<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('shop/images/icons/icon-heart-02.png') }}" alt="ICON">
							</a>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>


<!-- Blog -->
<section class="sec-blog bg0 p-t-60 p-b-90">
	<div class="container">
		<div class="p-b-66">
			<h3 class="ltext-105 cl5 txt-center respon1">
				Our Blogs
			</h3>
		</div>

		<div class="row">
			@foreach($listNews as $listNew)
			<div class="col-sm-6 col-md-4 p-b-40">
				<div class="blog-item">
					<div class="hov-img0">
						<a href="blog-detail.html">
							<img src="{{ $listNew->image }}" alt="IMG-BLOG">
						</a>
					</div>

					<div class="p-t-15">
						<div class="stext-107 flex-w p-b-14">
							<span class="m-r-3">
								<span class="cl4">
									By
								</span>

								<span class="cl5">
									Admin
								</span>
							</span>

							<span>
								<span class="cl4">
									on
								</span>

								<span class="cl5">
									{{ $listNew->created_at->format('d M Y') }}
								</span>
							</span>
						</div>

						<h4 class="p-b-12">
							<a href="blog-detail.html" class="mtext-101 cl2 hov-cl1 trans-04">
								{{ $listNew->name }}
							</a>
						</h4>

						<p class="stext-108 cl6">
							{{ $listNew->description }}
						</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endsection

@section('js')
<script>
	$(".js-select2").each(function() {
		$(this).select2({
			minimumResultsForSearch: 20,
			dropdownParent: $(this).next('.dropDownSelect2')
		});
	})
</script>
<!--===============================================================================================-->
<script src="{{ asset('shop/vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('shop/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('shop/vendor/slick/slick.min.js') }}"></script>
<script src="{{ asset('shop/js/slick-custom.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('shop/vendor/parallax100/parallax100.js') }}"></script>
<script>
	$('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src="{{ asset('shop/vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
<script>
	$('.gallery-lb').each(function() { // the containers for all your galleries
		$(this).magnificPopup({
			delegate: 'a', // the selector for gallery item
			type: 'image',
			gallery: {
				enabled: true
			},
			mainClass: 'mfp-fade'
		});
	});
</script>
<!--===============================================================================================-->
<script src="{{ asset('shop/vendor/isotope/isotope.pkgd.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('shop/vendor/sweetalert/sweetalert.min.js') }}"></script>
<script>
	$('.js-addwish-b2').on('click', function(e) {
		e.preventDefault();
	});

	$('.js-addwish-b2').each(function() {
		var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
		$(this).on('click', function() {
			swal(nameProduct, "is added to wishlist !", "success");

			$(this).addClass('js-addedwish-b2');
			$(this).off('click');
		});
	});

	$('.js-addwish-detail').each(function() {
		var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

		$(this).on('click', function() {
			swal(nameProduct, "is added to wishlist !", "success");

			$(this).addClass('js-addedwish-detail');
			$(this).off('click');
		});
	});

	/*---------------------------------------------*/

	$('.js-addcart-detail').each(function() {
		var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
		$(this).on('click', function() {
			swal(nameProduct, "is added to cart !", "success");
		});
	});
</script>
<!--===============================================================================================-->
<script src="{{ asset('shop/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script>
	$('.js-pscroll').each(function() {
		$(this).css('position', 'relative');
		$(this).css('overflow', 'hidden');
		var ps = new PerfectScrollbar(this, {
			wheelSpeed: 1,
			scrollingThreshold: 1000,
			wheelPropagation: false,
		});

		$(window).on('resize', function() {
			ps.update();
		})
	});
</script>
<!--===============================================================================================-->
<script src="{{ asset('shop/js/main.js') }}"></script>
@endsection