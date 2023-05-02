@extends('layouts.app')

@section('content')
    <div id="main-content" class="blog-page mt-5">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 left-box">
                    @foreach($posts as $post)
                    <div class="card single_post">
                        <div class="body">
                            <div class="img-post">
                                <img class="d-block img-fluid" src="{{$post->image}}">
                            </div>
                            <h3><a href="/post/open/{{$post->id}}">{{$post->title}}</a></h3>
                            <p>{{$post->largePreview}}</p>
                        </div>
                        <div class="footer">
                            <div class="actions">
                                <a href="/post/open/{{$post->id}}" class="btn btn-outline-secondary">Continue Reading</a>
                            </div>
                            <ul class="stats">
                                <li>COMMENTS: {{$post->comment->count()}}</li>
                                <li>CREATED: {{$post->date}}</li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                    {{$posts->withQueryString()->links()}}
                </div>
                <div class="col-lg-4 col-md-12 right-box">
                    <div class="card">
                        <div class="body search">
                            <div class="input-group m-b-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                                <form action="/" method="get">
                                    <input type="text" name="search" class="form-control" placeholder="Search..."">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>Popular Posts</h2>
                        </div>
                        <div class="body widget popular-post">
                            <div class="row">
                                <div class="col-lg-12">
                                    @foreach($popularPosts as $popularPost)
                                        <div class="single_post">
                                            <a href="/post/open/{{$popularPost->id}}" class="m-b-0">{{$popularPost->title}}</a>
                                            <br/>
                                            <span>{{$popularPost->date}}</span>
                                            <div class="img-post">
                                                <img src="{{$popularPost->image}}" alt="Awesome Image">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
