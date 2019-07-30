@extends('layouts.app');

@section('content')
    <div class="row">
        <div class="page-header">
            <h1>Ресурсы</h1>
        </div>
    </div>

        <div class="row">
            <div class="col-xs-12">
                <a class="btn btn-primary" href="/resources/create">Добавить ресурс</a>
            </div>
            <div class="col-xs-12">&nbsp;</div>
        </div>

    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Название</th>
                    <th>URL</th>
                    <th>Timeout</th>
                    <th>Картинка</th>
                    <th>skip_peer_verification</th>
                    <th>skip_hostname_verification</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @if($resources)
                @foreach($resources as $r)
                    <tr>
                        <td><a href="/resources/{{$r->id}}/edit" title="Редактировать">{{$r->title}}</a></td>
                        <td>{{$r->url}}</td>
                        <td>{{$r->timeout}}</td>
                        <td><img src="{{$r->picture}}" alt="" width="50" height="50"></td>
                        <td>{{$r->skip_peer_verification}}</td>
                        <td>{{$r->skip_hostname_verification}}</td>
                        <td>

                        </td>
                        <td>
                            <form action="/resources/{{$r->id}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" value="{{$r->id}}">
                                <button class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection