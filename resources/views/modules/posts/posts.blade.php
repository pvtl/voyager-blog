@section('meta_title', 'Blog Posts')
@section('meta_description', 'Blog Posts')
@section('page_title', 'Blog Posts')

@section('content')
    @foreach($posts as $post)
        {!! $post->title !!}
        {!! $post->body !!}
    @endforeach
@endsection
