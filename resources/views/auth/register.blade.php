@extends('layouts.app')

@section('content')
    <div id="main-content" class="blog-page mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <form method="post" action="/register">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="test@mail.com">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="name" value="www">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="Qwerty12345">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password confirm</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password_confirmation" value="Qwerty12345">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
