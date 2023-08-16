<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusRequest;
use App\Models\Bus;
use App\Http\Controllers\Controller;
use App\Models\Day;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bus=Bus::all();
        return view("pages.Bus.ttr_show",compact("bus"));}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.Bus.index");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BusRequest $request)
    {
        try {


            Bus::create([
                "name"=>$request->name,
                "number"=>$request->number,
            ]);
            toastr()->success(('Created'));
            return redirect()->route("Bus_index");

        } catch (\Exception $e) {
            return redirect()->route("Bus_index")->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_bus)
    {
        $bus=Bus::find($id_bus);
        return view("pages.Bus.edit",compact("bus"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusRequest $request, $id_bus)
    {
        try {


            $ttr=Bus::find($id_bus);
            $ttr->update([
                "name"=>$request->name,
                "number"=>$request->number,
            ]);
            toastr()->success(('Updated'));
            return redirect()->route("Bus_index");

        } catch (\Exception $e) {
            return redirect()->route("Bus_index")->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_bus)
    {
        try {


            $ttr=Bus::destroy($id_bus);

            toastr()->success(('deleted'));
            return redirect()->route("Bus_index");

        } catch (\Exception $e) {
            return redirect()->route("Bus_index")->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function manage($id_bus)
    {
        $bus=Bus::find($id_bus);
        $trip=$bus->trips;
        return view("pages.Bus.manage",compact("bus","trip"));
    }
    public function show($id_bus)
    {
        $bus=Bus::find($id_bus);
        $time_slot=DB::table('trips as l')
            ->select('ts.full' ,'ts.id')
            ->distinct()
            ->join('time_slots as ts', 'ts.id', '=', 'l.ts_id')
            ->where('l.bus_id', '=', $id_bus)
            ->orderBy('ts.hour_from', 'ASC')
            ->orderBy('ts.meridian_from', 'ASC')
            ->orderBy('ts.min_from', 'ASC')
            ->orderBy('ts.hour_to', 'ASC')
            ->orderBy('ts.meridian_to', 'ASC')
            ->orderBy('ts.min_to', 'ASC')
            ->get();
        $d['days'] = Day::all();
        $d['bus'] = $bus;
        $d['time_slot'] = $time_slot;

        return view("pages.Bus.show",$d);

    }
}
