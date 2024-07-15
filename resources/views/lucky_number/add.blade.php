@extends('layout.admin')
@section('title', 'Thêm')
@section('content')
<div id="content" class="container-fluid">
    
    <div class="card">
        <div class="card-header font-weight-bold">
            Import danh sách người chơi
        </div>
        <div class="card-body">
            @if (!empty(session('status')))
            <div class="alert alert-success">{{ Session('status') }}</div>
            @endif
            <form method="POST" action="{{ route('lucky_number.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="file">Import người chơi</label>
                    <input type="file" name="file" id="file" class="d-block"/>
                    <small class="text-secondary d-block">Import vào bằng file excel</small>
                    @error('file')
                                <small class="text-danger d-block">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
            <br>
            <a href="{{ route('lucky_number.delete') }}" class="btn-danger">Xóa toàn bộ người chơi</a>
        </div>
    </div>
</div>
@endsection

