<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;
use DB;

class ScholarshipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = 'Scholarship';
        $scholarships = Scholarship::all();

        return view('scholarship.index',[
            'title' => $title,
            'scholarships' => $scholarships
        ]);
    }

    public function create()
    {
        $title = 'Add Scholarship';

        return view('scholarship.create',[
            'title' => $title,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'organizer' =>'required',
            'description' => 'required',
            'has_volunteer_program' => 'required',
            'registration_end_date' => 'required',
            'url' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $scholarship = Scholarship::create([
                'name' => $request->name,
                'organizer' => $request->organizer,
                'description' => $request->description,
                'has_volunteer_program' => $request->has_volunteer_program,
                'registration_end_date' => $request->registration_end_date,
                'url' => $request->url,
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Data added!');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', 'Data error! ' . $th->getMessage());
        }
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $scholarship = Scholarship::findOrFail($id);
        $title = $scholarship->name;

        return view('scholarship.edit',[
            'title' => $title,
            'scholarship' => $scholarship
        ]);
    }

    public function update(Request $request, $id)
    {
        $scholarship = Scholarship::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'organizer' =>'required',
            'description' => 'required',
            'has_volunteer_program' => 'required',
            'registration_end_date' => 'required',
            'url' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $scholarship->update([
                'name' => $request->name,
                'organizer' => $request->organizer,
                'description' => $request->description,
                'has_volunteer_program' => $request->has_volunteer_program,
                'registration_end_date' => $request->registration_end_date,
                'url' => $request->url,
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Data updated!');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', 'Data error! ' . $th->getMessage());
        }
    }
    
    public function destroy(Request $request, $id)
    {
        $scholarship = Scholarship::findOrFail($id);
        $scholarship->delete();
        return redirect()->back()->with('success', 'Data deleted!');
    }
}
