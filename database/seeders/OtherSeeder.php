<?php

namespace Database\Seeders;

use App\Http\Controllers\FeesController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\OnlineClasseController;
use App\Http\Controllers\QuestionController;
use App\Models\Event;
use App\Models\Fee;
use App\Models\Lesson;
use App\Models\Note;
use App\Models\OnlineClass;
use App\Models\Question;
use App\Models\StudentAccount;
use App\Repository\FeesRepository;
use App\Repository\QuestionRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OtherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
OnlineClass::create([
    'integration' => 1,
    'Grade_id' => 1,
    'Classroom_id' => 1,
    'section_id' =>1,
    'user_id' =>1,
    'meeting_id' =>1,
    'topic' => "aribic",
    'start_at' => "2023-08-18 09:55:02.000000",
    'duration' => "22",
    'password' => "000000000",
    'start_url' => "https/qdas",
    'join_url' => "https/qdas",
    "semester"=>1,
    "year"=>"2023-2024",
]);
OnlineClass::create([
            'integration' => 1,
            'Grade_id' => 1,
            'Classroom_id' => 1,
            'section_id' =>1,
            'user_id' =>1,
            'meeting_id' =>1,
            'topic' => "arabic",
            'start_at' => "2023-08-18 09:55:02.000000",
            'duration' => "22",
            'password' => "000000000",
            'start_url' => "https/qdas",
            'join_url' => "https/qdas",
            "semester"=>1,
    "year"=>"2023-2024",
        ]);

        Note::create([
            "note"=>"note",
            "student_id"=>16,
            "teachers_id"=>16,
        ]);
        Note::create([
            "note"=>"note",
            "student_id"=>16,
            "teachers_id"=>16,
        ]);

        $students_accounts = new StudentAccount();
        $students_accounts->date = date('Y-m-d');
        $students_accounts->type = 'payment';
        $students_accounts->student_id = 16;
        $students_accounts->Debit = 1000;
        $students_accounts->credit = 0;
        $students_accounts->description ="payment";
        $students_accounts->save();
        $students_accounts = new StudentAccount();
        $students_accounts->date = date('Y-m-d');
        $students_accounts->type = 'recipent';
        $students_accounts->student_id = 16;
        $students_accounts->Debit = 1000;
        $students_accounts->credit = 0;
        $students_accounts->description ="recipent";
        $students_accounts->save();
        $students_accounts = new StudentAccount();
        $students_accounts->date = date('Y-m-d');
        $students_accounts->type = 'recipent';
        $students_accounts->teachers_id = 16;
        $students_accounts->Debit = 1000;
        $students_accounts->credit = 0;
        $students_accounts->description ="recipent";
        $students_accounts->save();
        Lesson::create([
            "title"=>"programme",
            "description"=>"programme",
            "filename"=>'attachments/lesson/2016-2017-2.pdf',
            "teacher_id"=>16,
            "subject_id"=>1,
            "section_id"=>1,
            "year"=>"2023-2024",
            "semester"=>1,
        ]);
        Lesson::create([
            "title"=>"programme",
            "description"=>"programme",
            "filename"=>'attachments/lesson/2016-2017-2.pdf',
            "teacher_id"=>16,
            "subject_id"=>2,
            "section_id"=>1,
            "year"=>"2023-2024",
            "semester"=>1,
        ]);
        Lesson::create([
            "title"=>"programme",
            "description"=>"programme",
            "filename"=>'attachments/lesson/2016-2017-2.pdf',
            "teacher_id"=>16,
            "subject_id"=>3,
            "section_id"=>1,
            "year"=>"2023-2024",
            "semester"=>1,
        ]);
        Question::create([
            "title"=>"what is your name",
            "answers"=>"A-B-C",
            "right_answer"=>"A",
            "lesson_id"=>1,
        ]);
        Question::create([
            "title"=>"what is your name",
            "answers"=>"A-B-C",
            "right_answer"=>"A",
            "lesson_id"=>1,
        ]);
        Question::create([
            "title"=>"what is your name",
            "answers"=>"A-B-C",
            "right_answer"=>"A",
            "lesson_id"=>1,
        ]);
        Question::create([
            "title"=>"what is your name",
            "answers"=>"A-B-C",
            "right_answer"=>"A",
            "lesson_id"=>2,
        ]);
        Event::create([
            "title"=>"party",
            "description"=>"q",
            "start"=>"2023-08-16 10:41:38",
            "end_time"=>"2023-09-16 10:41:38",
        ]);












    }










}
