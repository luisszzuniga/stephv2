@extends('front.template')

@section('content')
    <div id="images">
        @foreach($final as $image)
            <div class="index-image" style="background-image: url('{{$image->url}}')"></div>
        @endforeach
    </div>
@endsection