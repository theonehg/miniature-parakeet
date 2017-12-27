@extends('admin.homesubleader')
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
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Request</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="required" for="request_subject">Request Subject</label>
                    <input type="text" id="request_subject" class="form-control input-lg" name="subject" value="{{ $request->subject }}" disabled>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="required" for="request_priority">Priority</label>
                            <select class="form-control" id="request_priority" name="priority_id" disabled>
                                @foreach($priorities as $priority)
                                    @if($request->priority_id == $priority->id)
                                        <option value="{{ $priority->id }}" selected>{{ $priority->name }}</option>
                                    @else
                                        <option value="{{ $priority->id }}">{{ $priority->name }}</option>
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
                                <input type="text" class="form-control" id="request_deadline" name="deadline_at" value="{{ $request->deadline_at }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="required" for="request_location">Department</label>
                            <select class="form-control" id="request_location" name="department_id" disabled>
                                @foreach($departments as $department)
                                    @if($request->department == $department->name)
                                        <option value="{{ $department->id }}" selected>{{ $department->name }}</option>
                                    @else
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endif
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="request_relaters">Relater(s)</label>
                            <select class="form-control select2" id="request_relaters" name="relaters[]" multiple="multiple" style="width:100%;" disabled>
                                @foreach($users as $user)
                                    @foreach($relaters as $relater)
                                        @if($user->id == $relater->user_id)
                                            <option value="{{ $user->id }}" selected>{{ $user->fullname }}</option>
                                            @break
                                        @elseif($loop->remaining == 0)
                                            <option value="{{ $user->id }}">{{ $user->fullname }}</option>
                                        @endif
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="required" for="request_priority">Status</label>
                            <select class="form-control" id="status" name="status_id" disabled>
                                @foreach($statuses as $status)
                                    @if($request->status_id == $status->id)
                                        <option value="{{ $status->id }}" selected>{{ $status->name }}</option>
                                    @else
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endif
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="request_created">Created_at</label>
                            <div class="input-group date">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="text" class="form-control" id="request_created" value="{{ $request->created_at }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                {!! $request->content !!}
            </div>
        </div>

        @foreach($comments as $comment)
            <div class="box box-primary">
                <div class="box-header with-border" data-widget="collapse">
                    <h3 class="box-title">
                        @foreach($users as $user)
                            @if($user->id == $comment->user_id)
                                {{ $user->fullname }}
                                @break
                            @endif
                        @endforeach
                    </h3>
                    <div class="box-tools pull-right">
                        <small><i class="fa fa-clock-o"></i> {{ $comment->created_at }}</small>
                        <button type="button" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    {!! $comment->content !!}
                </div>
            </div>
        @endforeach

        <form action="{{ route('srequest_comment_subleader', ['id' => $request->id]) }}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="box box-primary box-solid">
                <div class="box-header with-border" data-widget="collapse">
                    <h3 class="box-title">Write comment:</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <textarea id="comment_content" name="content" class="form-control" style="height:150px" required></textarea>
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary">Comment</button>
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
            $('#request_relaters').select2();
            $('#comment_content').wysihtml5();
        });
    </script>
@endsection