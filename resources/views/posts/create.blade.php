@extends('layouts.app')

@section('content')
    <style>

    </style>
    <div id="main-content" class="blog-page mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="/post/store" method="post" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tittle</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="editor">Text</label>
                            <textarea class="form-control" id="editor" rows="3" name="text">{{ old('text') }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                        <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0" name="image">
                                        <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                                        <div class="input-group-append">
                                            <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-success mt-2">
                                    Create
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <img id="" src="#" alt="" class="image-result img-fluid rounded shadow-sm mx-auto d-block">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/initckeditor.js"></script>
    <script src="/js/imageupload.js"></script>
@endsection


{{--<div class="container py-5">--}}
{{--    <div class="row py-4">--}}
{{--        <div class="col-lg-6 mx-auto">--}}

{{--            <!-- Upload image input-->--}}
{{--            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">--}}
{{--                <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0">--}}
{{--                <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>--}}
{{--                <div class="input-group-append">--}}
{{--                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Uploaded image area-->--}}
{{--            <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p>--}}
{{--            <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
