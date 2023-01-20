<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabinet;
use App\Models\Sectoral;
use DB;

class SectoralController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cabinet = Cabinet::findOrFail($id);
        $title = 'Add Sectoral';

        return view('cabinets.sectorals.create',[
            'title' => $title,
            'cabinet' => $cabinet,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $cabinet = Cabinet::findOrFail($id);

        $this->validate($request,[
            'title' => 'required',
            'abbreviation' => 'required',
            'logo' => 'required',
            'description' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $sectoral = Sectoral::create([
                'title' => $request->title,
                'abbreviation' => $request->abbreviation,
                'description' => $request->description,
                'cabinet_id' => $cabinet->id
            ]);

            if($request->hasFile('logo')){
                $file = $request->file('logo');
                $fileName = 'cabinet/'. $cabinet->id . '/sectorals/' . $sectoral->abbreviation . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/' , $fileName);
                // dd($file);
                $sectoral->update([
                    'logo' => $fileName
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
    public function edit($cabinetId, $sectoralId)
    {
        $cabinet = Cabinet::findOrFail($cabinetId);
        $sectoral = Sectoral::findOrFail($sectoralId);
        $title = 'Edit Sectoral';

        return view('cabinets.sectorals.edit',[
            'title' => $title,
            'cabinet' => $cabinet,
            'sectoral' => $sectoral,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cabinetId, $sectoralId)
    {
        $cabinet = Cabinet::findOrFail($cabinetId);
        $sectoral = Sectoral::findOrFail($sectoralId);

        $this->validate($request,[
            'title' => 'required',
            'abbreviation' => 'required',
            'description' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $sectoral->update([
                'title' => $request->title,
                'abbreviation' => $request->abbreviation,
                'description' => $request->description,
            ]);

            if($request->hasFile('logo')){
                $file = $request->file('logo');
                $fileName = 'cabinet/'. $cabinet->id . '/sectorals/' . $sectoral->abbreviation . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/' , $fileName);
                // dd($file);
                $sectoral->update([
                    'logo' => $fileName
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
    public function destroy($cabinetId, $sectoralId)
    {
        $sectoral = Sectoral::findOrFail($sectoralId);
        $sectoral->delete();
        return redirect()->back()->with('success', 'Data deleted!');
    }
}
