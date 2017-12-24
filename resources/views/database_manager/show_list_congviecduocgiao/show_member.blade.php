@extends('admin.homeleader')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('public/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('main')
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách công việc được giao</h3>
            </div>
            <div class="box-body">
                <table id="request_list" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên công việc</th>
                        <th>Mức độ ưu tiên</th>
                        <th>Người yêu cầu</th>
                        <th>Người thực hiện</th>
                        <th>Ngày hết hạn</th>
                        <th>Trạng thái</th>
                        <th>Chi tiết</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($indi_data as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->subject }}</td>
                            <td>{{ $data->priority_id }}</td>
                            <td>{{ $data->created_by }}</td>
                            <td>{{ $data->assigned_to }}</td>
                            <td>{{ $data->deadline_at }}</td>
                            <td>{{ $data->status_id }}</td>
                            <td class="text-center">
                                {{-- 1 tap hop cac object voi moi record $data lay id cua cac record --}}
                                <a href="{{ route('srequest_edit_member', $data->id) }}">
                                    <span class="fa fa-search"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{ URL::asset('public/theme/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('public/theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#request_list').DataTable();
        });
    </script>
@endsection