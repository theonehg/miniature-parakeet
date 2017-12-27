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
        <form method="post" action="{{route('crequest_member')}}">
            {{ csrf_field() }}
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Request</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label class="required" for="request_subject">Request Subject</label>
                        <input type="text" class="form-control input-lg" id="request_subject" name="subject" required>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="required" for="request_priority">Priority</label>
                                <select class="form-control" id="request_priority" name="priority_id">
                                    @foreach($pr as $priority)
                                        <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="required" for="request_deadline">Deadline</label>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" class="form-control pull-right" id="request_deadline"
                                           name="deadline_at" data-date-format="yyyy-mm-dd hh:ii:ss" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="required" for="request_location">Department</label>
                                <select class="form-control" id="request_location" name="department_id">
                                    @foreach($dep as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="request_relater">Relater(s)</label>
                                <select class="form-control select2" id="request_relater" name="relaters[]" multiple="multiple" style="width:100%;">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->fullname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="required" for="request_content">Content</label>
                        <textarea id="request_content" name="content" class="form-control" style="height:250px" required></textarea>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </div>
        </form>
    </section>

@endsection
@section('js')
    <script src="{{ URL::asset('public/theme/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ URL::asset('public/theme/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            $('#request_deadline').datetimepicker({autoclose: true});
            $('#request_relater').select2();
            $('#request_content').wysihtml5();
        });
    </script>
@endsection