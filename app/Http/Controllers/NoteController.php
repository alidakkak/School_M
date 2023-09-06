<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use App\Transformers\NoteTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    use GeneralTrait;

    public function create(Request $request)
    {  $id_teacher=Auth::guard($request->role)->id();
        Note::create([
            "note"=>$request->note,
            "student_id"=>$request->IdStudent,
            "teachers_id"=>$id_teacher,
        ]);
       return $this->returnSuccessMessage("saved");
    }


    public function show(Request $request)
    {

        $id_teacher=Auth::guard($request->role)->id();
   $notes=   Note::where("student_id",$request->IdStudent)->where("teachers_id",$id_teacher)->get();
        $lessonTransfermer=[];
        foreach ($notes as $index=> $student){
            $lessonTransfermer[$index] = fractal($student, new NoteTransformer())->toArray();
            $lessonTransfermer[$index]= $lessonTransfermer[$index]["data"];
        }
        return $this ->returnData("Notes" ,$lessonTransfermer,"count_Notes",$notes->count());

    }
    public function show_student(Request $request)
    {
        $id_student=Auth::guard($request->role)->id();
        $notes=   Note::where("student_id",$id_student)->get();
        $lessonTransfermer=[];
        foreach ($notes as $index=> $student){
            $lessonTransfermer[$index] = fractal($student, new NoteTransformer())->toArray();
            $lessonTransfermer[$index]= $lessonTransfermer[$index]["data"];
        }
        return $this ->returnData("Notes" ,$lessonTransfermer,"count_Notes",$notes->count());

    }
    public function show_parent(Request $request)
    {
        $notes=   Note::where("student_id",$request->IdStudent)->get();
        $lessonTransfermer=[];
        foreach ($notes as $index=> $student){
            $lessonTransfermer[$index] = fractal($student, new NoteTransformer())->toArray();
            $lessonTransfermer[$index]= $lessonTransfermer[$index]["data"];
        }
        return $this ->returnData("Notes" ,$lessonTransfermer,"count_Notes",$notes->count());

    }



    public function destroy(Request $request)
    {         $note   =Note::where("id",$request->IdNote)->get();
        if($note->IsEmpty()){
            return $this ->returnError("404","not found");
        }
        Note::destroy($request->IdNote);
       return $this->returnSuccessMessage("Deleted");
    }
}
