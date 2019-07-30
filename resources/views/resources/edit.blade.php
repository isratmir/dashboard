@extends('layouts.app')

@section('content')

    <h1 class="page-header">Редактировать ресурс</h1>

    <div class="row">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <form class="form-horizontal" action="/resources/{{$resource->id}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Название</label>
            <div class="col-sm-10">
                <input name="title" value="{{$resource->title}}" type="text" id="title" class="form-control" placeholder="Название">
            </div>
        </div>
        <div class="form-group">
            <label for="url" class="col-sm-2 control-label">URL</label>
            <div class="col-sm-10">
                <input name="url" value="{{$resource->url}}"  type="url" class="form-control" id="url" placeholder="URL">
            </div>
        </div>
        <div class="form-group">
            <label for="timeout" class="col-sm-2 control-label">Timeout</label>
            <div class="col-sm-10">
                <input name="timeout" value="{{$resource->timeout}}" type="number" value="3" class="form-control" id="timeout" placeholder="Timeout">
            </div>
        </div>
        <div class="form-group">
            <label for="picture" class="col-sm-2 control-label">Картинка</label>
            <div class="col-sm-10">
                <input name="picture" value="{{$resource->picture}}" type="url" class="form-control" id="picture" placeholder="Картинка">
            </div>
        </div>
        <div class="form-group">
            <label for="skip_peer_verification" class="col-sm-2 control-label">skip_peer_verification</label>
            <div class="col-sm-1">
                <input name="skip_peer_verification" @if ($resource->skip_peer_verification) checked="checked" @endif type="checkbox" class="form-control" id="skip_peer_verification">
            </div>
        </div>
        <div class="form-group">
            <label for="skip_hostname_verification" class="col-sm-2 control-label">skip_hostname_verification</label>
            <div class="col-sm-1">
                <input name="skip_hostname_verification" @if ($resource->skip_hostname_verification) checked="checked" @endif type="checkbox" class="form-control" id="skip_hostname_verification">
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="/resources" class="btn btn-primary">Назад</a>
                <button type="submit" class="btn btn-default">Сохранить</button>
            </div>
        </div>
    </form>
@endsection