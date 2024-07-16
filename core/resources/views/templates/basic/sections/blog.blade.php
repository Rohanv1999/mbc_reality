@php
    $blog = getContent('blog.content', true);
    $blogElements = getContent('blog.element', false, 3);
@endphp
<section class="pt-50 pb-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title">{{__($blog->data_values->heading)}}</h2>
                    <p class="mt-3">{{__($blog->data_values->sub_heading)}}</p>
                </div>
            </div> 
        </div>
        <div class="row">
            @foreach($blogElements as $blogElement)
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
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
