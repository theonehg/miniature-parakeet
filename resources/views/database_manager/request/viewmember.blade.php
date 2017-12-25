@extends('admin.homemember')
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
        <form method="post" action="{{ route('srequest_view_member', $edit_data->id) }}">
            {{ csrf_field() }}
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">View Request</h3>
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
                                <input type="text" id="request_priority" class="form-control input-lg" name="priority" value="{{$edit_data->priority}}">
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
                                <input type="text" class="form-control" id="request_location" name="department" value="{{$edit_data->department}}" >
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="request_relater">Relater(s)</label>

                                {{--TODO:chưa select đươc người liên quan để hiện thị--}}
                                <input type="text" id="request_relater" class="form-control input-lg" name="relater" value="{{$edit_data->assigned_to}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="required" for="request_priority">Status</label>
                                <input type="text" id="request_status" class="form-control input-lg" name="status" value="{{$edit_data->status}}">
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
                        <texbox id="request_content" name="content" class="form-control" style="height:250px">{!! $edit_data->content !!}</texbox>
                    </div>
                </div>
            </div>
            <div class="box-footer">

            </div>
        </form>
    </section>

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