<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    //
    public function viewSections()
    {
        return view('sections.section');
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
