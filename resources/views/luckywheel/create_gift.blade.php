@extends('layout.admin')
@section('title', 'Thêm mới phần thưởng')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm giá trị phần thưởng
        </div>
        <div class="card-body">
            @if (!empty(session('status')))
            <div class="alert alert-success">{{ Session('status') }}</div>
            @endif
            <form method="POST" action="{{ route('lucky_wheel.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Tên phần thưởng</label>
                    <input class="form-control" type="text" name="name" id="name">
                    @error('name')
                                <small class="text-danger d-block">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Phần trăm cơ hội</label>
                    <input class="form-control" type="number" name="percent" id="percent">
                    @error('percent')
                    <small class="text-danger d-block">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@endsection
