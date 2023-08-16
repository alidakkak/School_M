<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentAccount;
use App\Models\Teacher;
use App\Models\User;
use App\Traits\GeneralTrait;
use App\Transformers\AccountantTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAccountController extends Controller
{
use GeneralTrait;
public function  account_statement ($id){
   $data["fees"]=StudentAccount::where("student_id",$id)->get();
   $data["student"]=Student::where("id",$id)->first();
   return view("pages.Students.show_account",$data);
}
    public function  account_statement_api (Request $request){
        $Accountant=StudentAccount::where("student_id",$request->IdStudent)->get();
        $lessonTransfermer=[];
        foreach ($Accountant as $index=> $student){
            $lessonTransfermer[$index] = fractal($student, new AccountantTransformer())->toArray();
            $lessonTransfermer[$index]= $lessonTransfermer[$index]["data"];
        }
        return $this ->returnData("Accountant" ,$lessonTransfermer);
    }
    public function  account_statement_teacher_api (Request $request){
        $id_teacher=Auth::guard($request->role)->id();
        $Accountant=StudentAccount::where("teachers_id",$id_teacher)->get();
        $lessonTransfermer=[];
        foreach ($Accountant as $index=> $student){
            $lessonTransfermer[$index] = fractal($student, new AccountantTransformer())->toArray();
            $lessonTransfermer[$index]= $lessonTransfermer[$index]["data"];
        }
        return $this ->returnData("Accountant" ,$lessonTransfermer);
    }

    public function  account_statement_teacher ($id){
        $data["fees"]=StudentAccount::where("teachers_id",$id)->get();
        $data["student"]=Teacher::where("id",$id)->first();
        return view("pages.Teachers.show_account_teacher",$data);
    }
    public function  account_statement_user ($id){
        $data["fees"]=StudentAccount::where("user_id",$id)->get();
        $data["student"]=User::where("id",$id)->first();
        return view("pages.School_oriented.show_account_user",$data);
    }

}
