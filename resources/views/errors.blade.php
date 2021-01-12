@if (isset($errors) && count($errors) > 0)
    <div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $message)
        <li>{{$message}}</li>
    @endforeach
    </div>
@endif
