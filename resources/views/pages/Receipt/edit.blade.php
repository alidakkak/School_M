@extends('layouts.master')
@section('css')

@section('title')
   edit catch receipt
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
تعديل سند قبض : <label style="color: red">{{$receipt_student->student->name}}</label>
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->


                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                            <form action="{{route('Receipt_update','test')}}" method="" autocomplete="off">
                                @method('PUT')
                                @csrf
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>المبلغ : <span class="text-danger">*</span></label>
                                        <input  required class="form-control" name="Debit" value="{{$receipt_student->Debit}}" type="number" >
                                        <input  type="hidden" name="student_id" value="{{$receipt_student->student->id}}" class="form-control">
                                        <input  type="hidden" name="id"  value="{{$receipt_student->id}}" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>البيان : <span class="text-danger">*</span></label>
                                        <textarea required class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$receipt_student->description}}</textarea>
                                    </div>
                                </div>

                            </div>

                                <div class="text-center">
                                    <button id="ajax-btn" type="submit"
                                            class="btn btn-primary">Submit form <i class="fas fa-paper-plane"></i></button>
                                </div>     </form>

                </div>

    <!-- row closed -->
@endsection
@section('js')


@endsection
