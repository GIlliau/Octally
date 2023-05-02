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
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{!! $user->email !!}</td>
                            <td class="d-flex">
                                <form action="/user/delete/{{$user->id}}" method="post" style="display: flex">
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
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
