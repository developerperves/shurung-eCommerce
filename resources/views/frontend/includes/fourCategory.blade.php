@foreach (categorreyFour() as $category)
@php
    $path = 'category/'.$category->slug
@endphp
<a   class="button button--secondary-outline singleCategory" data-credit="{{ $category->slug }}" ><i class="icon-woman"></i>{{ $category->name }}</a>
{{-- <a style="{{ Request::is($path) == 1? 'background:#161616;color:white' : '' }}"   class="button button--secondary-outline singleCategory" data-credit="{{ $category->slug }}" ><i class="icon-woman"></i>{{ $category->name }}</a> --}}
@endforeach