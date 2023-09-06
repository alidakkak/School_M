@extends('layouts.master')
@section('css')
{{--    @toastr_css--}}
@section('title')
event List
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    قائمة المواد الدراسية
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="card-body">
                                <a href="{{route('Ev_create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">Add Event</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> Title</th>
                                            <th> Description</th>
                                            <th> Start date </th>
                                            <th> End date</th>
                                            <th> Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($events as $subject)
                                            <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$subject->title}}</td>
                                            <td>{{$subject->description}}</td>
                                            <td>{{\Carbon\Carbon::createFromFormat("Y-m-d H:i:s",$subject->start)->format("Y-m-d ")}}</td>
                                                <td>{{\Carbon\Carbon::createFromFormat("Y-m-d H:i:s",$subject->end_time)->format("Y-m-d ")}}</td>
                                                <td>
                                                    <a class="dropdown-item"
                                                       data-target="#Delete_event{{ $subject->id }}"
                                                       data-toggle="modal"
                                                       href="##Delete_event{{$subject->id}}"><i
                                                                style=" color: red" class="fa fa-trash"></i>&nbsp;
                                                        </a>
                                                    </td>

                                            </tr>

                                            <div class="modal fade" id="Delete_event{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('Ev_destroy',$subject->id)}}" method="">
                                                        {{method_field('')}}
                                                        {{csrf_field()}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">Deleted event </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> {{ ('Warning Grade') }} {{$subject->name}}</p>
                                                            <input type="hidden" name="id"  value="{{$subject->id}}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{('Close') }}</button>
                                                                <button type="submit"
                                                                        class="btn btn-danger">{{ ('Submit') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </table>
                                </div>
                            </div>


    <!-- row closed -->
@endsection
@section('js')

@endsection
