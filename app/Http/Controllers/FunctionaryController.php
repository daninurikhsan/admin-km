<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Functionary;
use App\Models\Cabinet;
use App\Models\Sectoral;
use App\Models\News;
use DB;

class FunctionaryController extends Controller
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
    public function index($cabinetId, $sectoralId)
    {
        $cabinet = Cabinet::findOrFail($cabinetId);
        $sectoral = Sectoral::findOrFail($sectoralId);
        $functionaries = Functionary::where('sectoral_id', $sectoral->id)->get();
        $title = 'Functionaries - ' . $sectoral->abbreviation;

        return view('cabinets.sectorals.functionaries.index',[
            'title' => $title,
            'sectoral' => $sectoral,
            'cabinet' => $cabinet,
            'functionaries' => $functionaries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cabinetId, $sectoralId)
    {
        $cabinet = Cabinet::findOrFail($cabinetId);
        $sectoral = Sectoral::findOrFail($sectoralId);
        $title = 'Add Functionary - ' . $sectoral->abbreviation;

        return view('cabinets.sectorals.functionaries.create',[
            'title' => $title,
            'sectoral' => $sectoral,
            'cabinet' => $cabinet,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $cabinetId, $sectoralId)
    {
        $this->validate($request,[
            'nim' => 'required',
            'name' => 'required',
            'role' => 'required',
            'study_program' => 'required',
            'generation' => 'required',
            'avatar' => 'required',
        ]);

        $cabinet = Cabinet::findOrFail($cabinetId);
        $sectoral = Sectoral::findOrFail($sectoralId);

        DB::beginTransaction();
        try {
            $functionary = Functionary::create([
                'nim' => $request->nim,
                'name' => $request->name,
                'role' => $request->role,
                'sectoral_id' => $sectoralId,
                'study_program' => $request->study_program,
                'generation' => $request->generation,
            ]);

            if($request->hasFile('avatar')){
                $file = $request->file('avatar');
                $fileName = 'cabinet/' .$cabinet->id . '/' . $sectoral->abbreviation . '/' . $request->nim .'.' . $file->getClientOriginalExtension();
                $file->storeAs('public/' , $fileName);
                // dd($file);
                $functionary->update([
                    'card_url' => $fileName
                ]);
            }
            
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($cabinetId, $sectoralId, $functionaryId)
    {
        $cabinet = Cabinet::findOrFail($cabinetId);
        $sectoral = Sectoral::findOrFail($sectoralId);
        $functionary = Functionary::findOrFail($functionaryId);

        $title = 'Edit Functionary - ' . $sectoral->abbreviation;
        
        return view('cabinets.sectorals.functionaries.edit',[
            'title' => $title,
            'sectoral' => $sectoral,
            'cabinet' => $cabinet,
            'functionary' => $functionary,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cabinetId, $sectoralId, $functionaryId)
    {
        $this->validate($request,[
            'nim' => 'required',
            'name' => 'required',
            'role' => 'required',
            'study_program' => 'required',
            'generation' => 'required',
        ]);

        $cabinet = Cabinet::findOrFail($cabinetId);
        $sectoral = Sectoral::findOrFail($sectoralId);
        $functionary = Functionary::findOrFail($functionaryId);

        DB::beginTransaction();
        try {
            $functionary->update([
                'nim' => $request->nim,
                'name' => $request->name,
                'role' => $request->role,
                'sectoral_id' => $sectoralId,
                'study_program' => $request->study_program,
                'generation' => $request->generation,
            ]);

            if($request->hasFile('avatar')){
                $file = $request->file('avatar');
                $fileName = 'cabinet/' .$cabinet->id . '/' . $sectoral->abbreviation . '/' . $request->nim .'.' . $file->getClientOriginalExtension();
                $file->storeAs('public/' , $fileName);
                // dd($file);
                $functionary->update([
                    'card_url' => $fileName
                ]);
            }
            
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
    public function destroy($cabinetId, $sectoralId, $functionaryId)
    {
        $functionary = Functionary::findOrFail($functionaryId);
        $functionary->delete();
        
        return redirect()->back()->with('success', 'Data deleted!');
    }
}
