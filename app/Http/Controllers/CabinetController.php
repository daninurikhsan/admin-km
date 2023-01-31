<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabinet;
use App\Models\Functionary;
use App\Models\Sectoral;
use DB;

class CabinetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Cabinets';
        $cabinets = Cabinet::all();

        return view('cabinets.index',[
            'title' => $title,
            'cabinets' => $cabinets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Cabinet';

        return view('cabinets.create',[
            'title' => $title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'logo' => 'required',
            'vision_statement' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'president_nim' => 'required',
            'president_name' => 'required',
            'president_study_program' => 'required',
            'president_generation' => 'required',
            'president_avatar' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $cabinet = Cabinet::create([
                'name' => $request->name,
                'vision_statement' => $request->vision_statement,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
            
            if($request->hasFile('logo')){
                $file = $request->file('logo');
                $fileName = 'cabinet/' .$cabinet->id . '/logo.' . $file->getClientOriginalExtension();
                $file->storeAs('public/' , $fileName);
                // dd($file);
                $cabinet->update([
                    'logo' => $fileName
                ]);
            }

            $president = Functionary::create([
                'nim' => $request->president_nim,
                'name' => $request->president_name,
                'study_program' => $request->president_study_program,
                'generation' => $request->president_generation,
                'role' => 'Presiden Mahasiswa'
            ]);

            if($request->hasFile('president_avatar')){
                $file = $request->file('president_avatar');
                $fileName = 'cabinet/' .$cabinet->id . '/president.' . $file->getClientOriginalExtension();
                $file->storeAs('public/' , $fileName);
                // dd($file);
                $president->update([
                    'card_url' => $fileName
                ]);
            }

            $cabinet->update([
                'functionary_id' => $president->id
            ]);
            
            DB::commit();
            return redirect()->back()->with('success', 'Data added!');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', 'Data error! ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cabinet = Cabinet::findOrFail($id);
        $sectorals = Sectoral::where('cabinet_id', $cabinet->id)->get();
        $title = $cabinet->name;

        return view('cabinets.detail',[
            'title' => $title,
            'cabinet' => $cabinet,
            'sectorals' => $sectorals,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cabinet = Cabinet::find($id);
        $title = 'Edit Cabinet';

        return view('cabinets.edit',[
            'title' => $title,
            'cabinet' => $cabinet,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cabinet = Cabinet::findOrFail($id);
        $president = Functionary::findOrFail($cabinet->functionary_id);

        $this->validate($request,[
            'name' => 'required',
            'vision_statement' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'president_nim' => 'required',
            'president_name' => 'required',
            'president_study_program' => 'required',
            'president_generation' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $cabinet->update([
                'name' => $request->name,
                'vision_statement' => $request->vision_statement,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
            
            if($request->hasFile('logo')){
                $file = $request->file('logo');
                $fileName = 'cabinet/' .$cabinet->id . '/logo.' . $file->getClientOriginalExtension();
                $file->storeAs('public/' , $fileName);
                // dd($file);
                $cabinet->update([
                    'logo' => $fileName
                ]);
            }

            
            $president->update([
                'nim' => $request->president_nim,
                'name' => $request->president_name,
                'study_program' => $request->president_study_program,
                'generation' => $request->president_generation,
            ]);

            if($request->hasFile('president_avatar')){
                $file = $request->file('president_avatar');
                $fileName = 'cabinet/' .$cabinet->id . '/president.' . $file->getClientOriginalExtension();
                $file->storeAs('public/' , $fileName);
                // dd($file);
                $president->update([
                    'card_url' => $fileName
                ]);
            }

            $cabinet->update([
                'functionary_id' => $president->id
            ]);
            
            DB::commit();
            return redirect()->back()->with('success', 'Data updated!');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', 'Data error! ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cabinet = Cabinet::findOrFail($id);
        $cabinet->delete();
        return redirect()->back()->with('success', 'Data deleted!');
    }
}
