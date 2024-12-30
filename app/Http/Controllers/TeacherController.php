<?php

namespace App\Http\Controllers;

   use Illuminate\Http\Request;

   class TeacherController extends Controller
   {
       /**
        * Show the teacher dashboard.
        */
       public function index()
       {
           return view('teacher.dashboard');
       }
   }
