@extends('layout.admin')
@section('title', 'Màu sắc')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Màu sắc
        </div>
        <div class="card-body">
            @if (!empty(session('status')))
            <div class="alert alert-success">{{ Session('status') }}</div>
        @endif
            <form method="POST" action="{{ route('lucky_wheel.color.update') }}">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="color_background">Màu Background</label>
                                <input class="form-control rounded-circle tron" value="{{ $color->color_background }}" type="color" name="color_background" id="color_background" style="width: 3rem;">
                            </div>
                            <div class="form-group">
                                <label for="color_title">Title</label>
                                <input class="form-control rounded-circle tron" value="{{ $color->color_title }}" type="color" name="color_title" id="color_title" style="width: 3rem;">
                            </div>
                            <div class="form-group">
                                <label for="color_tab1">Màu Tab 1</label>
                                <input class="form-control rounded-circle tron" value="{{ $color->color_tab1 }}"  type="color" name="color_tab1" id="color_tab1" style="width: 3rem;">
                            </div>
                            <div class="form-group">
                                <label for="color_tab2">Màu tab 2</label>
                                <input class="form-control rounded-circle tron" value="{{ $color->color_tab2 }}" type="color" name="color_tab2" id="color_tab2" style="width: 3rem;">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="color_pointer">Màu con trỏ</label>
                                <input class="form-control rounded-circle tron" value="{{ $color->color_pointer }}" type="color" name="color_pointer" id="color_pointer" style="width: 3rem;">
                            </div>
                            <div class="form-group">
                                <label for="color_center">Màu Tâm</label>
                                <input class="form-control rounded-circle tron" value="{{ $color->color_center }}" type="color" name="color_center" id="color_center" style="width: 3rem;">
                            </div>
                            <div class="form-group">
                                <label for="color_border">Màu Viền</label>
                                <input class="form-control rounded-circle tron" value="{{ $color->color_border }}" type="color" name="color_border" id="color_border" style="width: 3rem;">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary text-center">Cập nhật</button>
                        </div>
                    </div>

                </div>


            </form>
        </div>
    </div>
</div>
@endsection

