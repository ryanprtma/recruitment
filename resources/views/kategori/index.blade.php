@extends('layouts.app')

<!-- double curly bracket adalah syntaks singkat dari <php echo ... >  -->

@section('main')
<div class="border rounded my-5 mx-auto d-flex flex-column align-items-stretch bg-white" style="width: 380px;">
    <div class="d-flex justify-content-between flex-shrink-0 p-3 link-dark  border-bottom">
        <span class="fs-5 fw-semibold">Task Lists In {{$title}} </span>
        <a href="{{url('/tasks/create')}}" class="btn btn-sm btn-primary">add</a>
    </div>
    @foreach($task as $item)
    <div class="list-group list-group-flush border-bottom scrollarea">
        <div class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
            <div class="d-flex w-100 align-items-center justify-content-between">
                <strong class="mb-1">{{$item -> task}}</strong><br>
                <small>Wed</small>
            </div>
            <div class="col-10 mb-1 small">{{$item -> user}}</div>
            <strong class="badge bg-info text-white">{{$item -> kategori -> nama_kategori}}</strong><br>
            <div class="group-action">
                <form action="{{ url("/tasks/$item->id") }}" method="POST">
                    @csrf @method('DELETE')
                    <a href="{{ url("/tasks/$item->id/edit") }}" class="badge bg-info text-white">edit</a>
                    <button type="submit" class="badge bg-danger text-white">delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    <br>
    <!-- bisa menggunakan juga ini
    php artisan vendor:publish --tag=laravel-pagination -->
</div>
@endsection

