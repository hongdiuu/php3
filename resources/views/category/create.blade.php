@extends('layoutadmin')
@section('title')
Thêm mới danh mục
@endsection
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Nguyễn Văn A" value="{{ old('name') }}">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Status</label>
        <input type="text" class="form-control" name="status" value="{{ old('status') }}">
        @error('status')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Thêm</button>
    <a class="btn btn-warning" href="{{route('category.index')}}">Quay lại trang chủ</a>
</form>
@endsection