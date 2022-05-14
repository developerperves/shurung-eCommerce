<div class="pt-150 social-media-sec">
    <div class="container">
        <!-- main title -->
        <div class="row">
            <div class="col-12">
                <div class="heading">
                    <h2 class="main-heading">{{ setting()->insta_heading }}</h2>
                    <a target="_blank" href="{{ setting()->insta_profile }}" class="heading-link">Follow us</a>
                </div>
            </div>
        </div>
        <!-- end main title -->
    </div>
    <!-- social media list -->
    <div class="social-media-slider">
        @foreach ($instagrams as $instagram)
        <div class="social-media_item">
            <a target="_blank" href="{{ $instagram->link }}"><img src="{{ $instagram->photo ?  asset('assets/images/'.$instagram->photo) : asset('assets/images/placeholder.png')}}" alt="No photo found"></a>
        </div>
        @endforeach
    </div>
</div>