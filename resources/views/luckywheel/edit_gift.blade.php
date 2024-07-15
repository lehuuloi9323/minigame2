@extends('layout.admin')
@section('title', 'Chỉnh sửa phần thưởng')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Chỉnh sửa giá trị
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('lucky_wheel.update', $gift->id) }}">
                @csrf
                <div class="form-group">
                    <label for="name">Tên phần thưởng</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $gift->name }}">
                    @error('name')
                                <small class="text-danger d-block">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Phần trăm cơ hội</label>
                    <input class="form-control" type="number" name="percent" id="percent" value="{{ $gift->percent }}">
                    @error('percent')
                    <small class="text-danger d-block">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection
