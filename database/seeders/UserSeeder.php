<?php

namespace Database\Seeders;

use App\Models\Type_User;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //// Manager
        $Users = new User();
        $Users->email = "ali@gmail.com";
        $Users->password =  Hash::make("00000000");
        $Users->name = "Ali";
        $Users->type_id = 5;
        $Users->Status =1;
        $Users->gender_id = 1;
        $Users->Joining_Date ="2023-2-2";
        $Users->Address = "Midan";
        $Users->save();

        ////  Oriented
        $Users = new User();
        $Users->email = "amer@gmail.com";
        $Users->password =  Hash::make("12345678");
        $Users->name = "Amer";
        $Users->type_id = 1;
        $Users->Status =1;
        $Users->gender_id = 1;
        $Users->Joining_Date ="2023-2-2";
        $Users->Address = "Midan";
        $Users->save();

        ////  Driver
        $Users = new User();
        $Users->email = "Alim@gmail.com";
        $Users->password =  Hash::make("12345678");
        $Users->name = "Ali";
        $Users->type_id = 2;
        $Users->Status =1;
        $Users->gender_id = 1;
        $Users->Joining_Date ="2023-2-2";
        $Users->Address = "Midan";
        $Users->save();


        ////  Accountant
        $Users = new User();
        $Users->email = "Ghina@gmail.com";
        $Users->password =  Hash::make("12345678");
        $Users->name = "Ghina";
        $Users->type_id = 3;
        $Users->Status =1;
        $Users->gender_id = 2;
        $Users->Joining_Date ="2023-2-2";
        $Users->Address = "Midan";
        $Users->save();


        ////  librarian
        $Users = new User();
        $Users->email = "Suha@gmail.com";
        $Users->password =  Hash::make("12345678");
        $Users->name = "Suha";
        $Users->type_id = 4;
        $Users->Status =1;
        $Users->gender_id = 2;
        $Users->Joining_Date ="2023-2-2";
        $Users->Address = "Midan";
        $Users->save();
    }
}
