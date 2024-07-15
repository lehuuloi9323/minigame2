@extends('layout.admin')
@section('title', 'Thêm')
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
            <form method="POST" action="{{ route('lucky_card.create') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Tên phần thưởng</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                                <small class="text-danger d-block">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Phần trăm cơ hội</label>
                    <input class="form-control" type="number" name="percent" id="percent" value="{{ old('percent') }}">
                    @error('percent')
                    <small class="text-danger d-block">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Chọn ảnh</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                          <a id="url" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Chọn ảnh làm phần thưởng
                          </a>
                        </span>
                        <input id="thumbnail" name="url" class="form-control" type="text" value="{{ old('url') }}">
                      </div>
                      <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                      <script>
                        var route_prefix = "http://localhost/minigame/laravel-filemanager/";
                        $('#url').filemanager('image', {prefix: route_prefix});
                      </script>
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@endsection

