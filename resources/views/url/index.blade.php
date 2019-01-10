@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        <a class="btn btn-primary" href="{{ url('/urls/add') }}" role="button">Add Url</a>
        <div>&nbsp;</div>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>URLs</h2>
        @if ($status = session()->get('status'))
            <div class="alert alert-info" role="alert">{{ $status }}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($urls as $url)
                <tr>
                <th scope="row">{{ $url->id }}</th>
                <td>{{ $url->title }}</td>
                <td>{{ $url->created_at }}</td>
                <td>
                    <a class="btn btn-success" href="{{ url('/urls/view/' . $url->id) }}" role="button">View</a>
                    <a class="btn btn-primary" href="{{ url('/urls/edit/' . $url->id) }}" role="button">Edit</a>
                    <a class="btn btn-warning" href="{{ url('/urls/delete/' . $url->id) }}" role="button" data-url-id="{{ $url->id }}" onclick="delete_url(event)">Delete</a>
                </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $urls->links('bootstrap-4') }}
    </div>
</div>
<script>
function delete_url(event) {
    var urlId = $(event.target).data('url-id');
    var val = confirm('Are you sure to delete #' + urlId + '?');
    
    if (val == false) {
        event.preventDefault();
    }
}
</script>
@endsection
    
