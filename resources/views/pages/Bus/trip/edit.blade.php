@extends('layouts.master')
@section('css')

    @section('title')
        {{ 'edit trip' }}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{ 'Add  lecture' }}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="card">


        <div class="card-header">
            <div class="row">
                <div class="col-md-6" style="display:flex; justify-content: space-evenly;align-items: center"><h6 class="card-title"><strong>Name: </strong> {{ $bus->name }}</h6></div>
                <div class="col-md-6" style="display:flex; justify-content: space-evenly;align-items: center"><h6 class="card-title"><strong>Number: </strong> {{ $bus->number }}</h6></div>
            </div>


            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class="nav-item"><a href="#add-tt" class="nav-link active" data-toggle="tab">edit Trip</a></li>
                </ul>


                <div class="tab-content">
                    <div class="tab-pane fade show active" id="add-tt">
                        <div class="col-md-8">
                            <form class="ajax-store" method="post" action="{{route('trip_update',$trip->id)}}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold" for="subject_id">  Name : <span class="text-danger"></span></label>
                                    <div class="col-lg-9">
                                        <input name="name" value="{{$trip->name}}" required type="text" class="form-control" placeholder="Name of Trip">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold" for="subject_id">  places : <span class="text-danger"></span></label>
                                    <div class="col-lg-9">
                                        <input name="places" value="{{$trip->places}}" required type="text" class="form-control" placeholder="places of Trip">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold" for="subject_id"> year : <span class="text-danger"></span></label>
                                    <div class="col-lg-9">
                                        <select class="form-control select" style="height: 50px;" name="Year">
{{--                                            <option selected disabled>{{('Choose')}}...</option>--}}
                                            @php
                                                $current_year = date("Y");
                                            @endphp
                                            @for($year=$current_year-1; $year<=$current_year +1 ;$year++)
                                                <option {{  $trip->year == $year."-".$year +1 ? 'selected' : '' }} value="{{ $year."-".$year +1}}">{{ $year."-".$year +1 }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="semester_id" class="col-lg-3 col-form-label font-weight-semibold">Semester <span class="text-danger"></span></label>
                                    <div class="col-lg-9">

                                        <select required data-placeholder="Select Class"style="height: 50px"  class="form-control select" name="semester_id" id="semester_id">
                                            <option {{  $trip->semester == "the first semester" ? 'selected' : '' }} value= "the first semester" > the first semester </option>
                                            <option {{  $trip->semester =="the second semester" ? 'selected' : '' }} value= "the second semester" > the second semester </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="semester_id" class="col-lg-3 col-form-label font-weight-semibold">Type : <span class="text-danger"></span></label>
                                    <div class="col-lg-9">

                                        <select required data-placeholder="Select Class"style="height: 50px"  class="form-control select" name="type" id="semester_id">

                                            <option  {{  $trip->semester == "school to home" ? 'selected' : '' }} value= "school to home" > school to home </option>
                                            <option  {{  $trip->semester == "home to school" ? 'selected' : '' }}value= "home to school" > home to school </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold" for="subject_id"> Driver : <span class="text-danger"></span></label>
                                    <div class="col-lg-9">
                                        <select class="select form-control" required style="height: 50px" name="driver_id">
                                            @foreach($driver as $subject)
                                                <option  {{  $trip->user_id ==  $subject->id ? 'selected' : '' }} value="{{ $subject->id }}">{{ $subject->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="teacher_id" class="col-lg-3 col-form-label font-weight-semibold">Day : <span class="text-danger"></span></label>
                                    <div class="col-lg-9">
                                        <select required data-placeholder="Select Class"style="height: 50px" class="form-control select" name="day_id" id="teacher_id">
                                            <option selected disabled>{{('Choose')}}...</option>
                                            @foreach($day as $teacher)

                                                <option   {{  $trip->day_id ==  $teacher->id ? 'selected' : '' }} value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row"></div>

                                <div class="form-group row">
                                    <label for="ts_id" class="col-lg-3 col-form-label font-weight-semibold">TimeSlot <span class="text-danger"></span></label>
                                    <div class="col-lg-9">

                                        <select required data-placeholder="Select Class"style="height: 50px" class="form-control select" name="ts_id" id="ts_id">

                                            <option selected disabled>{{('Choose')}}...</option>
                                            @foreach($ts as $ts)

                                                <option {{  $trip->ts_id ==  $ts->id ? 'selected' : '' }}  value="{{ $ts->id }}">{{ $ts->full }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button id="ajax-btn" type="submit" style="margin-bottom: 30px;" class="btn btn-primary">Submit form <i class="fas fa-paper-plane"></i></button>
        </div>

        </form>




@endsection
