@extends('layoutadmin')
@section('title')
    Danh sách danh mục
@endsection
@section('content')
<a class="btn btn-success" href="{{route('category.create')}}">Thêm mới</a>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listCate as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->status}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{$listCate->links()}}
@endsection