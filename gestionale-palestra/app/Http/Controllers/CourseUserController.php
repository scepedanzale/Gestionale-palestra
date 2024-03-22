<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = CourseUser::get();
        return view('bookings', ['bookings' => $bookings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $corso = Course::findOrFail($request->id);
        return view('/newbooking', ['corso' => $corso]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['course_id', 'day', 'start_time']);
        $data['user_id'] = Auth::user()->id;
        $data['state'] = 'Pending';
        $query = DB::table('course_user');
        $query->insert($data);
        return redirect()->action([CourseController::class, 'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $corso_user = CourseUser::with('course')->findOrFail($id);
        return view('bookingdetail', ['booking' => $corso_user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $corso_user = CourseUser::with('course')->findOrFail($id);
        if(Auth::user()->admin === 1){
            return view('editbooking', ['booking' => $corso_user]);
        }
        return redirect()->action([CourseController::class, 'index']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $corso_user = CourseUser::findOrFail($request->id);
        $corso_user['day'] = $request->day;
        $corso_user['start_time'] = $request->start_time;
        $corso_user['state'] = $request->state;
        if($request->created_at){
            $corso_user['created_at'] = $request->created_at;
            $corso_user['updated_at'] = Carbon::now();
        }else{
            $corso_user['created_at'] = Carbon::now();
        }

        $corso_user->update();
        return redirect('/bookings/'. $request->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course_user = CourseUser::findOrFail($id);
        $course_user->delete();
        return redirect('/bookings');
    }
}
