<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Course_User;
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

        return view('bookings');
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
        $corso = Course::findOrFail($id);
        $corso_user = Auth::user()->courses->where('id', '=', $corso->id)->first();
        return view('bookingdetail', ['corso' => $corso_user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course_User $course_User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course_User $course_User)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course_user = Course_User::findOrFail($id);
        $course_user->delete();
        return redirect('/bookings');
    }
}
