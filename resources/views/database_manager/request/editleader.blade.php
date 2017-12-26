@extends('admin.homeleader')
@section('css')
    {{-- chinh lai style --}}
    <link rel="stylesheet" href="{{ URL::asset('public/theme/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/theme/bower_components/select2/dist/css/select2.min.css') }}">
    <style>
        div.form-group > label.required:after {
            content: " *";
            color: red;
        }
    </style>
@endsection
@section('main')
    <section class="content">
        <form method="post" action="{{ route('srequest_edit_leader', $edit_data->id) }}">
            {{ csrf_field() }}
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Request</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label class="required" for="request_subject">Request Subject</label>
                        <input type="text" id="request_subject" class="form-control input-lg" name="subject" value="{{$edit_data->subject }}" required>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="required" for="request_priority">Priority</label>
                                <select class="form-control" id="request_priority" name="priority">

                                    @foreach($pr as $item)
                                        @if($edit_data->priority == $item->name)
                                            <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                        @else
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="required" for="request_deadline">Deadline</label>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" class="form-control" id="request_deadline" name="deadline" data-date-format="yyyy-mm-dd hh:ii:ss" value="{{ $edit_data->deadline_at }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="required" for="request_location">Department</label>
                                <select class="form-control" id="request_location" name="department">
                                    {{--<option value="{{ $edit_data->priority_id }}">{{ $edit_data->priority }}</option>--}}
                                    @foreach($dep as $depart)
                                        @if($edit_data->department == $depart->name)
                                            <option value="{{$depart->id}}" selected>{{$depart->name}}</option>
                                        @else
                                            <option value="{{$depart->id}}">{{$depart->name}}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="request_relater">Relater(s)</label>
                                <select class="form-control select2" id="request_relater" name="relaters[]"
                                        multiple="multiple" style="width:100%;">
                                    {{--<option value="{{ $edit_data->id }}">{{ $edit_data->name }}</option>--}}
                                    @foreach($rel as $rela)
                                        @if($edit_data->assigned_to == $rela->fullname)
                                            <option value="{{$rela->id}}" selected>{{$rela->fullname}}</option>
                                        @else
                                            <option value="{{$rela->id}}">{{$rela->fullname}}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="required" for="request_priority">Status</label>
                                <select class="form-control" id="status" name="status">
                                    @foreach($stu as $stat)
                                        @if($edit_data->status == $stat->name)
                                            <option value="{{$stat->id}}" selected>{{$stat->name}}</option>
                                        @else
                                            <option value="{{$stat->id}}">{{$stat->name}}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="required" for="request_created">Created_at</label>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" class="form-control pull-right" id="request_created" name="created_at" data-date-format="yyyy-mm-dd hh:ii:ss" value="{{ $edit_data->created_at }}" required>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {{--// Chưa xử lý khung Content--}}
                        <label for="request_content">Content</label>
                        <textarea id="request_content" name="content" class="form-control" style="height:250px">{!! $edit_data->content !!}</textarea>
                    </div>
                </div>
            </div>
            <div class="box-footer">

                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>
        </form>
    </section>


    <div class="row">
        <div id="result-comment" class="form-group">
            <p>show comment owr dday bi vo phong chinh lai neu co the nhe</p><!--comment ajax result sau khi bình luận xong cái này sẽ suất hiện 1 list danh giống như ở trên kèm theo cái bình luận vừa submit. theo ajax để tránh bị trùng nên tôi đã hide phần trên-->
        </div>
    </div>
    <br>
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="binhluan">Bình luận</label>
            <br/>
            <select id="comment_value" class="form-control">
                <option value="" selected disabled>Chọn loại comment</option>
                <option value="0">Comment Bình thường</option>
                <option value="1">Comment Đánh giá</option>
                <option value="2">Comment thay đổi mức độ ưu tiên</option>
                <option value="3">Comment thay đổi deadline</option>
            </select>
            <br>
            {{--<!--phần này sẽ chạy trpng jquery ở duwosi-->--}}
            {{--<div id="showtextarea">--}}
                {{--<!--textarea-->--}}
            {{--</div>--}}
        </div>
        <textarea class="form-control" placeholer="Comment"></textarea>
        <button id="comment" class="btn btn-primary" type="submit" style="display: none">Gửi Bình Luận</button>


    {{-- trang xu ly edit gom cac form khac nhau de sua  --}}
@endsection
@section('js')
    <script src="{{ URL::asset('public/theme/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ URL::asset('public/theme/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            $('#request_deadline').datetimepicker({autoclose: true});
            $('#request_created').datetimepicker({autoclose: true});
            $('#request_relater').select2();
            $('#request_content').wysihtml5();
        });
    </script>
@endsection