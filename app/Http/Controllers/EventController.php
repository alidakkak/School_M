<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Event;
use App\Models\Quizze;
use App\Models\Setting;
use App\Models\Subject;
use App\Models\SubjectExam;
use App\Models\SubjectsCategorie;
use App\Models\TimeTableRecord;
use App\Repository\SubjectRepositoryInterface;
use App\Traits\GeneralTrait;
use App\Transformers\SubjectTransformer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    use GeneralTrait;


    public function index()
    {

       $events= Event::all();
        return view("pages.event.index",compact("events"));

    }


    public function create()
    {
        return view("pages.event.create");
    }


    public function store(Request $request)
    {
        try {

            $start=Carbon::createFromFormat("Y-m-d H:i:s",Carbon::now());
            $end=Carbon::createFromFormat("Y-m-d",$request->end_event);
            if ($start->gt($end)){

                toastr()->error('end event smaller than date of the day');
                return redirect()->route('Ev_create');
            }
            $description=$request->has("description")?$request->description:null;
            Event::create([
                "title"=>$request->title,
                "description"=>$description,
                "start"=>$start->format("Y-m-d"),
                 "end_time"=>$request->end_event,
            ]);
            toastr()->success('success');
            return redirect()->route('Ev_index');
        }
        catch (\Exception $e) {
            return redirect()->route("Ev_create")->withErrors(['error' => $e->getMessage()]);
        }


    }




    public function edit($id)
    {

    }

    public function update(Request $request)
    {

    }

    public function destroy( $id)
    {
        try {
            $Classrooms = Event::findOrFail($id)->delete();
            toastr()->warning(('Deleted'));
            return redirect()->route("Ev_index");

        } catch (\Exception $e) {
            return redirect()->route("Ev_index")->withErrors(['error' => $e->getMessage()]);
        }
    }


}