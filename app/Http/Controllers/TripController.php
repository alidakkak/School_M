<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripRequest;
use App\Models\Bus;
use App\Models\Day;
use App\Models\TimeSlote;
use App\Models\Trip;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_bus)
    {
        $data["id_bus"]=$id_bus;
        $data["ts"]=TimeSlote::all();
        $data["day"]=Day::all();
        $data["bus"]=Bus::find($id_bus);
        $data["driver"]=User::where("type_id",2)->get();
        return view("pages.Bus.trip.add",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TripRequest $request,$id_bus)
    {
        try {
            $exists=Trip::where([
                ["day_id",$request->day_id],["year",$request->Year],["semester",$request->semester_id],
                ["bus_id",$id_bus],["ts_id",$request->ts_id]])->get();
            if (!$exists->isEmpty()){
                toastr()->error(('there is a trip at this time'));
                return redirect()->route("trip_create",$id_bus);
            }

            $start=Carbon::createFromFormat('h:i A',TimeSlote::where("id",$request->ts_id)->pluck("time_from")[0]);
            $end=Carbon::createFromFormat('h:i A',TimeSlote::where("id",$request->ts_id)->pluck("time_to")[0]);
            $ovarlap = Trip::where([
                ["year",$request->Year]
          ,["semester",$request->semester_id]
               , ["day_id",$request->day_id]
          ,["bus_id",$id_bus]])
                ->select("ts.time_from","ts.time_to")->join('time_slots as ts', 'trips.ts_id', '=', 'ts.id')
                ->get();
            foreach ($ovarlap as $o2){
                $start_ts = Carbon::createFromFormat('h:i A', $o2->time_from);
                $end_ts = Carbon::createFromFormat('h:i A', $o2->time_to);

                if ($end->gt($start_ts)==1 && $end->lte($end_ts)==1) {
                    toastr()->error(('there is a time overlap '));
                    return redirect()->route("trip_create",$id_bus);
                }
                if ($start->gte($start_ts)==1 && $start->lt($end_ts)==1) {
                    toastr()->error(('there is a time overlap'));
                    return redirect()->route("trip_create",$id_bus);
                }
            }


            Trip::create([
                "name"=>$request->name,
                "user_id"=>$request->driver_id,
                "type"=>$request->type,
                "places"=>$request->places,
                "semester"=>$request->semester_id,
                "year"=>$request->Year,
                "ts_id"=>$request->ts_id,
                "day_id"=>$request->day_id,
                "bus_id"=>$id_bus,
            ]);
            toastr()->success(('Created'));
            return redirect()->route("Bus_manage",$id_bus);

        } catch (\Exception $e) {
            return redirect()->route("Bus_manage",$id_bus)->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Trip $trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_trip)
    {
        $id_bus=Trip::where("id",$id_trip)->pluck("bus_id")[0];
        $data["id_bus"]=$id_bus;
        $data["trip"]=Trip::where("id",$id_trip)->first();
        $data["ts"]=TimeSlote::all();
        $data["day"]=Day::all();
        $data["bus"]=Bus::find($id_bus);
        $data["driver"]=User::where("type_id",2)->get();
        return view("pages.Bus.trip.edit",$data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TripRequest $request,$id_trip)
    {
        try {
            $id_bus=Trip::where("id",$id_trip)->pluck("bus_id")[0];
            $exists=Trip::where([
                ["day_id",$request->day_id],["year",$request->Year],["semester",$request->semester_id],
                ["bus_id",$id_bus],["ts_id",$request->ts_id]])->where("id","!=",$id_trip)->get();
            if (!$exists->isEmpty()){
                toastr()->error(('there is a trip at this time'));
                return redirect()->route("trip_edit",$id_trip);
            }

            $start=Carbon::createFromFormat('h:i A',TimeSlote::where("id",$request->ts_id)->pluck("time_from")[0]);
            $end=Carbon::createFromFormat('h:i A',TimeSlote::where("id",$request->ts_id)->pluck("time_to")[0]);
            $ovarlap = Trip::where([
                ["year",$request->Year]
                ,["semester",$request->semester_id]
                , ["day_id",$request->day_id]
                ,["bus_id",$id_bus]])
                ->select("ts.*")->join('time_slots as ts', 'trips.ts_id', '=', 'ts.id')
                ->get();
            foreach ($ovarlap as $o2){
                $start_ts = Carbon::createFromFormat('h:i A', $o2->time_from);
                $end_ts = Carbon::createFromFormat('h:i A', $o2->time_to);

                if ($end->gt($start_ts)==1 && $end->lte($end_ts)==1) {
                    $l = Trip::where([
                        ["day_id",$request->day_id],["year",$request->Year],["semester",$request->semester_id],
                        ["bus_id",$id_bus],["ts_id",$o2->id]])
                        ->where('id',"!=", $id_trip)
                        ->get();
                    if (!$l->isEmpty()) {
                    toastr()->error(('there is a time overlap '));
                    return redirect()->route("trip_edit",$id_trip);}
                }
                if ($start->gte($start_ts)==1 && $start->lt($end_ts)==1) {
                    $l = Trip::where([
                        ["day_id",$request->day_id],["year",$request->Year],["semester",$request->semester_id],
                        ["bus_id",$id_bus],["ts_id",$o2->id]])
                        ->where('id',"!=", $id_trip)
                        ->get();
                    if (!$l->isEmpty()) {
                        toastr()->error(('there is a time overlap '));
                        return redirect()->route("trip_edit",$id_trip);}
                }
            }

            $trip=Trip::findOrFail($id_trip);
            $trip->update([
                "name"=>$request->name,
                "user_id"=>$request->driver_id,
                "type"=>$request->type,
                "places"=>$request->places,
                "semester"=>$request->semester_id,
                "year"=>$request->Year,
                "ts_id"=>$request->ts_id,
                "day_id"=>$request->day_id,
                "bus_id"=>$id_bus,
            ]);
            toastr()->success(('Updated'));
            return redirect()->route("Bus_manage",$id_bus);

        } catch (\Exception $e) {
            return redirect()->route("Bus_manage",$id_bus)->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id_trip)
    {  $id_bus=Trip::where("id",$id_trip)->pluck("bus_id")[0];
        try {

            $Classrooms = Trip::findOrFail($id_trip)->delete();
            toastr()->warning(('Deleted'));
            return redirect()->route("Bus_manage",$id_bus);
        } catch (\Exception $e) {
            return redirect()->route("Bus_manage",$id_bus)->withErrors(['error' => $e->getMessage()]);
        }
    }
}
