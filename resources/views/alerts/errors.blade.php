@if($errors->any())
<div class="alert alert-danger" role="alert">
    {{ implode('', $errors->all(':message')) }}
</div>
@endif
