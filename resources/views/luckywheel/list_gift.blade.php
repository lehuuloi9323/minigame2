@extends('layout.admin')
@section('title', 'Danh sách phần thường')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách phần thưởng</h5>
        </div>
        @if (!empty(session('status')))
            <div class="alert alert-success">{{ Session('status') }}</div>
        @endif
        <div class="card-body">
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>

                        <th scope="col">#</th>

                        <th scope="col">Tên</th>
                        <th scope="col">Phần trăm cơ hội</th>

                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody
                    @foreach($lists as $list)
                    <tr>
                        <td scope="row">{{ $list->id }}</td>
                        <td><a href="">{{ $list->name }}</a></td>
                        <td>{{ $list->percent }}%</td>
                        <td>{{ $list->created_at }}</td>
                        <td>
                            <a href="{{ route('lucky_wheel.edit', $list->id) }}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('lucky_wheel.delete', $list->id) }}" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit" onclick="return confirm('Bạn chắc chắn muốn xóa phần thưởng này ?')"><i class="fa fa-trash"></i></a>

                        </td>

                    </tr>

                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
