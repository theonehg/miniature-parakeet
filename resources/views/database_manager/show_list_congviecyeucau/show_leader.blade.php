@extends('admin.homeleader')
@section('css')

@endsection
@section('main')
<div>
    <div>
        <table class="table table-bordered table-hover table-striped dataTable no-footer display" id="tabledata">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên công việc</th>
                    <th>Mức độ ưu tiên</th>
                    <th>Người yêu cầu</th>
                    <th>Người thực hiện</th>
                    <th>Ngày tạo</th>
                    <th>Ngày hết hạn</th>
                    <th>Trạng thái</th>
                    <th>Chi tiết</th>
                </tr>
            </thead>
            <tbody>

                @foreach($indi_data as $key => $data)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{$data->username}}</td>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $key + 1 }}</td>
                    <td class="center" style="text-align: center;">
                        {{-- 1 tap hop cac object voi moi record $data lay id cua cac record --}}
                        <a href="{{route('srequest_edit_leader',$data->id)}}">
                            <span class="fa fa-search"></span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection @section('js')



<script type="text/javascript">
    $(document).ready(function() {
    $('#tabledata').DataTable( {
        paging: true,   
        "language": {
            "lengthMenu": "Hiển thị _MENU_ bản ghi trong 1 trang",
            "zeroRecords": "KHÔNG CÓ KẾT QUẢ",
            "info": "",
            "infoEmpty": "Không tìm thấy bản ghi nào cho tìm kiếm này",
            "infoFiltered": "(Tìm kiếm trong _MAX_ tổng số bản ghi)"
        }
    } );
} );
</script>
@endsection