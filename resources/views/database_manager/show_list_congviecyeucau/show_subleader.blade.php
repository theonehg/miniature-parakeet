@extends('admin.homesubleader')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('public/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('main')
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách công việc yêu cầu</h3>
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
                    <tr>
                        <td>1</td>
                        <td>Done this little shit</td>
                        <td>Critical</td>
                        <td>H</td>
                        <td>M</td>
                        <td>2017-12-25 12:00:00</td>
                        <td>New</td>
                        <td><a href="#"><i class="fa fa-search"></i></a></td>
                    </tr>
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