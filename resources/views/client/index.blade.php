@extends('_layout.app')
@section('content')
    <h3>Clientes</h3>
    <div class="mt-3 mb-3">
        <a class="btn btn-success" href="{{route('client.create')}}">Novo</a>
    </div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Nome</th>
                <th class="col-1 text-center">Ativo</th>
                <th class="col-2 text-center">...</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($model as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td class="col-1 text-center">
                    <img src="{{$item->active === 1 ? '/img/ico/accept-icon.png' : '/img/ico/delete-icon.png'}}" border="0" />
                </td>
                <td class="col-2 text-center">
                    <a href="{{route('client.edit', ['id' => $item->id])}}" class="btn btn-primary">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $model->links() }}
    </div>
@endsection
