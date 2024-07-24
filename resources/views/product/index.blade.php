@extends('layoutadmin')
@section('title')
    Danh sách sản phẩm
@endsection
@section('content')
<a class="btn btn-success" href="{{route('product.create')}}">Thêm mới</a>
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
            <th scope="col">price</th>
            <th scope="col">quantity</th>
            <th scope="col">image</th>
            <th scope="col">category name</th>
            <th scope="col">status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listPro as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->quantity}}</td>
            <td>
                @if(!isset($item->image))
                    Không có hình ảnh
                @else
                    {{$item->image}}
                @endif
            </td>
{{--            <td>{{$item->loadAllCategory->name}}</td>--}}
{{--                <td>{{$item->catename}}</td>--}}
            <td>{{$listCate[$item->category_id]}}</td>
            <td>{{$item->status}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{$listPro->links()}}
@endsection