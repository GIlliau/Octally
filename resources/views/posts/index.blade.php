@extends('layouts.app')

@section('content')
    <div id="main-content" class="blog-page mt-5">
        <div class="container">
            <div class="row">
                <a href="/post/create">
                    <button class="btn btn-default">New</button>
                </a>
            </div>
            <div class="row mt-2">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Public</th>
                        <th scope="col">Tittle</th>
                        <th scope="col">Text</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row"><a href="/post/open/{{$post->id}}">View</a></th>
                            <td>{{$post->title}}</td>
                            <td>{!! $post->preview !!}</td>
                            <td><img src="/{{$post->image}}" style="max-height: 50px"></td>
                            <td class="d-flex">
                                <a href="/post/edit/{{$post->id}}"
                                   class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>
                                    Edit</a>
                                <form action="/post/delete/{{$post->id}}" method="post" style="display: flex">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-danger btn-sm ml-2 delete-btn"
                                            data-original-title="" title=""
                                            onclick="confirm('{{ __("Are you sure you want to delete this post?") }}') ? this.parentElement.submit() : ''">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
