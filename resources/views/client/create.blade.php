@extends('_layout.app')
@section('content')
    <h3>Cliente - Cadastro</h3>
    @include('errors')
    <form method="POST" action="{{route('client.update')}}">
        @csrf
        @if(isset($model))
        <input type="hidden" id="id" name="id" value={{$model->id}}>
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                aria-describedby="namehelp"
                value="{{ isset($model) ? $model->name :'' }}"
                autofocus
            >
            <div id="namehelp" class="form-text"></div>
        </div>
        <div class="mb-3 form-check">
            <input
                type="checkbox"
                class="form-check-input"
                id="active"
                name="active"
                value="1"
                {!! isset($model) && $model->active === 1? 'checked="checked"' : ''!!}
            >
            <label class="form-check-label" for="active"> Ativo</label>
        </div>
        <button type="submit" class="btn btn-success">{{isset($model) ? "Alterar": "Incluir"}}</button>
    </form>
@endsection
