@section('meta_title', 'Blog Posts')
@section('meta_description', 'Blog Posts')
@section('page_title', 'Blog Posts')

@foreach($posts as $post)
    {!! $post->title !!}
    {!! $post->body !!}
@endforeach
