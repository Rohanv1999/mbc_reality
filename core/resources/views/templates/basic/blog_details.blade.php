@extends($activeTemplate.'layouts.frontend')
@section('content')
@include($activeTemplate . 'partials.breadcrumb')
	<section class="blog-details-section pt-120 pb-120">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8">
					<div class="blog-details-wrapper">
						<div class="blog-details__thumb">
							<img src="{{getImage('assets/images/frontend/blog/'. $blog->data_values->blog_image, '768x550')}}" alt="@lang('image')">
							<div class="post__date">
								<span class="date">{{showDateTime($blog->created_at, 'd')}}</span>
								<span class="month">{{showDateTime($blog->created_at, 'M')}}</span>
							</div>
						</div>
						<div class="blog-details__content">
							<h4 class="blog-details__title">{{__($blog->data_values->title)}}</h4>
							@php echo $blog->data_values->description_nic  @endphp
						</div>
						<div class="blog-details__footer">
							<h4 class="caption">@lang('Share Tish Post')</h4>
							<ul class="social__links">
								<li>
	                                <a href="https://www.facebook.com/sharer.php?u={{urlencode(url()->current())}}" target="__blank"><i class="fab fa-facebook-f"></i></a>
	                            </li>
	                            <li>
	                                <a href="https://twitter.com/share?url={{urlencode(url()->current())}}&text=Simple Share Buttons&hashtags=simplesharebuttons" target="__blank"><i class="fab fa-twitter"></i></a>
	                            </li>
	                            <li>
	                                <a href="http://www.linkedin.com/shareArticle?mini=true&url={{urlencode(url()->current())}}" target="__blank"><i class="fab fa-linkedin-in"></i></a>
	                            </li>
							</ul>
						</div>

						 <div class="fb-comments" data-href="{{ route('blog.details',[$blog->id,slug($blog->data_values->title)]) }}" data-numposts="5"></div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="sidebar">
						<div class="widget">
							<h5 class="widget__title">@lang('Recent post')</h5>
							<ul class="small-post-list">
								@foreach($recentBlogs as $recentBlog)
									<li class="small-post">
										<div class="small-post__thumb"><img src="{{getImage('assets/images/frontend/blog/'. $recentBlog->data_values->blog_image, '768x550')}}" alt="@lang('image')"></div>
										<div class="small-post__content">
											<h5 class="post__title"><a href="{{route('blog.details',[$recentBlog->id,slug($recentBlog->data_values->title)])}}">{{__($recentBlog->data_values->title)}}</a></h5>
										</div>
									</li>
								@endforeach
							</ul>
							
							 @php 
	                            echo advertisements('264x262') 
	                        @endphp

	                         @php 
	                            echo advertisements('264x450') 
	                        @endphp
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@push('fbComment')
	@php echo loadFbComment() @endphp
@endpush
