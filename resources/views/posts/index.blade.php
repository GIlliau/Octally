@extends('layouts.app')

@section('content')
    <div id="main-content" class="blog-page mt-5">
        <div class="container">
            <div class="row">
                <a href="/post/create">
                    <button class="btn btn-default">New</button>
                </a>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tittle</th>
                        <th scope="col">Text</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>
                            <a href="/"
                               class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>
                                Edit</a>
                            <form action="/" method="post" style="display: flex">
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
