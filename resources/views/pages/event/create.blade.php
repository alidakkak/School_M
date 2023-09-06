@extends('layouts.master')
@section('css')
{{--    /*@toastr_css*/--}}
@section('title')
    Add Event
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    اضافة مادة دراسية
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
            <div class="card-body">


                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{ route('Ev_store') }}" method="" autocomplete="off">
                            @csrf

                            <div class="form-row">

                                <div class="col">
                                    <label for="title">title</label>
                                    <input required type="text" name="title" class="form-control">
                                </div>
                            </div>
                            <br>

                            <div class="form-row">


                                <div class="form-group col">
                                    <label for="inputState">description</label>
                                    <input  type="text" name="description" class="form-control">
                                </div>

                                <div class="form-group col">
                                    <label for="inputState">End event</label>
                                        <input required class="form-control" type="text"
                                               id="datepicker-action" name="end_event" data-date-format="yyyy-mm-dd">



                                </div>

                                {{-- <div class="form-group col">
                                    <label for="inputState">Classroom</label>
                                    <select name="Class_id" class="custom-select"></select>
                                </div> --}}


                            </div>
                            <div class="text-center">
                                <button id="ajax-btn" type="submit" style="margin-bottom: 30px;" class="btn btn-primary">Submit form <i class="fas fa-paper-plane"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
<script>
    $(document).ready(function() {
        $('select[name="Grade_id"]').on('change', function() {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('classes') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="Class_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="Class_id"]').append('<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
@endsection
