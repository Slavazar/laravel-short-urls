@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <a class="btn btn-primary" href="{{ url('urls') }}" role="button">Return</a>
        <div>&nbsp;</div>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>View Url</h2>
        @if ($status = session()->get('status'))
            <div class="alert alert-info" role="alert">{{ $status }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col">
        <h3>Title</h3>
        <div>{{ $url->title }}</div>
        <div>&nbsp;</div>
        <h3>Url</h3>
        <div>{{ $url->url }}</div>
        <div>&nbsp;</div>
        <h3>Short Url</h3>
        <div>{{ $url->getShortUrl() }} <a href="{{ $url->getShortUrl() }}" target="_blank">Test it</a>
        </div>
        <div>&nbsp;</div>
        <h3>Created</h3>
        <div>{{ $url->created_at }}</div>
        <div>&nbsp;</div>
        <h3>Updated</h3>
        <div>{{ $url->updated_at }}</div>
        <div>&nbsp;</div>
    </div>
</div>
@endsection
    