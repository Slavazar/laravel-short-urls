@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <a class="btn btn-primary" href="{{ url('/urls') }}" role="button">Return</a>
        <div>&nbsp;</div>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>Add Url</h2>
    </div>
</div>
<div class="row">
    <div class="col">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('/urls/add') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" id="" value="{{ old('title') }}" placeholder="Enter a title">
            </div>
            <div class="form-group">
                <label for="">Url</label>
                <input type="text" name="url" class="form-control" id="" value="{{ old('url') }}" placeholder="Enter a url">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
