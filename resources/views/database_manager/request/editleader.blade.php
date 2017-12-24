@extends('admin.homeleader')
@section('css')
    {{-- chinh lai style --}}
    <style>
        div.form-group > label.required:after {
            content: " *";
            color: red;
        }
    </style>
@endsection
@section('main')

    <section class="content">

        <form method="post" action="{{route('srequest_edit_leader',$edit_data->id)}}">
            {{ csrf_field() }}
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Request</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label class="required" for="request_subject">Request Subject</label>
                        <div>{!!$edit_data->subject !!}</div>
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
                                    <div type="text" class="form-control pull-right" id="request_deadline"
                                           name="deadline_at" data-date-format="yyyy-mm-dd hh:ii:ss" >{{ $edit_data->deadline_at }}</div>
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
                                <select class="form-control select2" id="request_relater" name="assigned_to"
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
                                    <div type="text" class="form-control pull-right" id="request_deadline"
                                         name="deadline_at" data-date-format="yyyy-mm-dd hh:ii:ss" >{{ $edit_data->created_at }}</div>
                                </div>

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
            <div class="box-footer">
                <div class="pull-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            </div>
        </form>
    </section>

    {{-- trang xu ly edit gom cac form khac nhau de sua  --}}
@endsection
@section('js')


@endsection