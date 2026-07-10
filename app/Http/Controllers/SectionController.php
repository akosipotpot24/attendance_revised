<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    //

    public function destroySection($id)
    {
        $section = Section::findOrFail($id);
        $section->delete();

        return redirect()->back()->with('success', 'Section deleted successfully!');

    }

       public function scanning()
    {
       
        return view('attendance.scan');
    }


    public function viewSections()
    {
        $sections = Section::all();
        return view('sections.section', compact('sections'));
    }

    public function createSection()
    {
        return view('sections.create-section');
    }

    public function storeSection(Request $request)
    {
       $values = $request->validate([
            'grade_level_code' => 'required',
            'section' => 'required',
        ]);

        Section::create($values);
        return redirect('/sections/create')->with('success', 'Section created successfully!');
    }

    
}
