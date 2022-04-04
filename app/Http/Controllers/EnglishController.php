<?php

namespace App\Http\Controllers;

use App\Models\English;
use App\Models\Chapter;
use App\Models\Lesson;
use Illuminate\Http\Request;

class EnglishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $englishes = English::all();
        return view('admin.english_subject.index', compact('englishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chapters = Chapter::all()->pluck('name', 'id');
        $lessons = Lesson::all()->pluck('name', 'id');
        return view('admin.english_subject.create', compact('chapters', 'lessons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chapters = English::create([
            'title' => $request->title,
            'chapters' => $request->chapters,
            'lessons' => $request->lessons,
            'description' => $request->description,
        ]);
        $chapters->chapters()->sync($request->input('chapters', []));
        $chapters->lessons()->sync($request->input('lessons', []));
        
        return redirect()->route('admin.englishes.index')->with('success', 'English Subject created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\English  $english
     * @return \Illuminate\Http\Response
     */
    public function show(English $english)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\English  $english
     * @return \Illuminate\Http\Response
     */
    public function edit(English $english)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\English  $english
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, English $english)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\English  $english
     * @return \Illuminate\Http\Response
     */
    public function destroy(English $english)
    {
        //
    }
}
