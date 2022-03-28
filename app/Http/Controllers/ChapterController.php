<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapters = Chapter::all();
        return view('admin.chapters.index', compact('chapters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.chapters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:chapters|max:255',
        ]);

        $chapter = new Chapter();
        $chapter->name = $request->name;
        $chapter->save();

        return redirect()->route('chapters.index')->with('success', 'Chapter created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function show(Chapter $chapter)
    {
        $show_chapter = Chapter::find($chapter->id);
        return view('admin.chapters.show', compact('show_chapter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapter $chapter)
    {
        $edit_chapter = Chapter::find($chapter->id);
        return view('admin.chapters.edit', compact('edit_chapter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chapter $chapter)
    {
        $request->validate([
            'name' => 'required|unique:chapters|max:255',
        ]);

        $chapter = Chapter::find($chapter->id);
        $chapter->name = $request->name;
        $chapter->save();

        return redirect()->route('admin.chapters.index')->with('success', 'Chapter updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapter $chapter)
    {
        $chapter = Chapter::find($chapter->id);
        $chapter->delete();

        return redirect()->route('admin.chapters.index')->with('success', 'Chapter deleted successfully');
    }
}
