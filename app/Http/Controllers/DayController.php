<?php

namespace App\Http\Controllers;

use App\Models\day;
use App\Http\Requests\StoredayRequest;
use App\Http\Requests\UpdatedayRequest;

class DayController extends Controller
{
    public function index()
    {
        $day = day::get();
        return $day;
        // return redirect()->route('/')->with($day);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredayRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredayRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\day  $day
     * @return \Illuminate\Http\Response
     */
    public function show(day $day)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedayRequest  $request
     * @param  \App\Models\day  $day
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedayRequest $request, day $day)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\day  $day
     * @return \Illuminate\Http\Response
     */
    public function destroy(day $day)
    {
        //
    }
}
