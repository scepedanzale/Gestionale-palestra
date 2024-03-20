<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $corsi = Course::get();
        return view('/dashboard', ['corsi' => $corsi]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        if(Auth::user()->admin === 1){
            return view('editcourse', ['corso' => $course]);
        }
        return redirect()->action([CourseController::class, 'index']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $course['name'] = $request->name;
        $course['description'] = $request->description;
        $course['price'] = $request->price;
        $course['created_at'] = Carbon::now();
        $course->update();
        return redirect('/bookings/create?id='.$course['id']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->action([CourseController::class, 'index']);
    }
}
