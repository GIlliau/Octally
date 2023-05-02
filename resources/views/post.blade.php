@extends('layouts.app')

@section('content')
    <div id="main-content" class="blog-page mt-5">
        <div class="container">
            @role("admin")
            <div class="row mb-5">
                <div class="col-1">
                    <a href="/post/edit/{{$post->id}}"
                       class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>
                        Edit</a>
                </div>
                <div class="col-1">
                    <form action="/post/delete/{{$post->id}}" method="post" style="display: flex">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-danger btn-sm ml-2 delete-btn"
                                data-original-title="" title=""
                                onclick="confirm('{{ __("Are you sure you want to delete this post?") }}') ? this.parentElement.submit() : ''">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
            @endrole
            <div class="row">
                <div class="col-3">Author: {{ $post->user()->first()->name }}</div>
                <div class="col-3 offset-6">Created: {{$post->date}}</div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    {!! $post->text !!}
                </div>
            </div>
            @auth()
            <div class="row mt-5">
                <div class="col-12">
                    <form method="post" action="/post/comment/store">
                        @csrf
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <div class="form-group">
                            <textarea class="form-control" id="editor" rows="3" name="text"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">
                            Send
                        </button>
                    </form>
                </div>
            </div>
            @endauth
            <div class="row mt-5">
                @foreach($comments as $comment)
                    <div class="col-12">
                        <div class="card">
                            <h5 class="card-header">
                                <span>[{{$comment->date}}] </span>
                                <strong>{{$comment->user->name}}:</strong>
                                @if(!is_null($user) && ($user->id === $comment->user_id || $user->hasRole("admin")))
                                    <div style="float: right">
                                        <form action="/comment/delete/{{$comment->id}}" method="post" style="display: flex">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-danger btn-sm ml-2 delete-btn"
                                                    data-original-title="" title=""
                                                    onclick="confirm('{{ __("Are you sure you want to delete this comment?") }}') ? this.parentElement.submit() : ''">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </h5>
                            <div class="card-body">
                                {!! $comment->text !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script src="/js/initckeditor.js"></script>
@endsection
