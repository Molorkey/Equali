<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\StudentInfo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    function ShowPendingInterview(){
        $users = User::where('role', 'Student')->where('status', 'Approved')->with('qualifiedStudent')->get();
        return view('admin.interview.dashboard-view-interview', compact('users'));
    } 
   

    function ShowScreeningForm($id){

        $user = User::findOrFail($id);
     
        return view('admin.interview.dashboard-screening-form', compact('user'));
    }


    function StoreInterview(Request $request){
      
     
        $request->validate([            
            'date' => 'required',
            'home_address' => 'required',
            'course' => 'required',
            'school_last_attended' => 'required',
            'school_address' => 'required',
            'year_graduated' => 'required',
            'gpa' => 'required',
            'academic_track' => 'required',
            'connectivity' => 'required',
        ]);
        
        $academicTrack = null;
        if($request->academic_track === "other"){
            $academicTrack = $request->other_academic_track;
        }
        else{
            $academicTrack = $request->academic_track;
        }
        $averageScore = ($request->interview1 + $request->interview2 + $request->interview3 + $request->interview4 + $request->interview5) / 5;

      
       $studentInfo = new StudentInfo();
       $studentInfo->user_id = $request->user_id; 
       $studentInfo->address = $request->home_address;
       $studentInfo->course = $request->course;
       $studentInfo->school_last_attended = $request->school_last_attended;
       $studentInfo->school_address = $request->school_address;
       $studentInfo->year_graduated = $request->year_graduate;
       $studentInfo->gpa = $request->gpa;

       $studentInfo->academic_track = $academicTrack;
       $studentInfo->internet_status = $request->connectivity;

       $studentInfo->interview = true;
       $studentInfo->interview_date = Carbon::now()->toDateString();

       $studentInfo->has_laptop =  $request->has('hasLaptop') ? 1 : 0;
       $studentInfo->has_computer =  $request->has('hasDesktop') ? 1 : 0;
       $studentInfo->has_smartphone = $request->has('hasSmartphone') ? 1 : 0;
       $studentInfo->has_tablet =  $request->has('hasTablet') ? 1 : 0;
       $studentInfo->interviewNo1 = $request->interview1;
       $studentInfo->interviewNo2 = $request->interview2;
       $studentInfo->interviewNo3 = $request->interview3;
       $studentInfo->interviewNo4 = $request->interview4;
       $studentInfo->interviewNo5 = $request->interview5;
       $studentInfo->year_graduated = $request->year_graduated;
       $studentInfo->average_score = $averageScore;//either make a new score db or fix this 
       $studentInfo->remarks =$request->remarks;
       $studentInfo->save();

       $result = Result::where('user_id', $studentInfo->user->id)->first();
       $result->measure_a_score = $studentInfo->average_score * 0.30;
       $result->save();

    
      
        return redirect()->route('admin.dashboard.pending-interview');
    }
}
