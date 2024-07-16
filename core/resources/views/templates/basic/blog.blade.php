@extends($activeTemplate.'layouts.frontend')
@section('content')
@include($activeTemplate . 'partials.breadcrumb')
    <section class="pt-50 pb-50">
        <div class="container">
            <div class="row gy-4">
                @foreach($blogs as $blogElement)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                        <div class="post-card">
                            <div class="post-card__thumb">
                                <img src="{{getImage('assets/images/frontend/blog/'. $blogElement->data_values->blog_image, '768x550')}}" alt="@lang('image')">
                            </div>
                            <div class="post-card__content">
                                <ul class="post-meta">
                                    <li><i class="las la-calendar-plus"></i> - {{showDateTime($blogElement->created_at, 'd M Y')}}</li>
                                </ul>
                                <h5 class="post-card__title mb-3"><a href="{{route('blog.details',[$blogElement->id,slug($blogElement->data_values->title)])}}">{{__($blogElement->data_values->title)}}</a></h5>
                                <p>{{str_limit(strip_tags($blogElement->data_values->description_nic), 80)}}</p>
                                <a href="{{route('blog.details',[$blogElement->id,slug($blogElement->data_values->title)])}}" class="read-more mt-2">@lang('Read More')</a>
                            </div>
                        </div><!-- post-card end -->
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection