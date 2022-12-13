<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use DB;


class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = 'News';
        $news = News::all();

        return view('news.index',[
            'title' => $title,
            'news' => $news
        ]);
    }

    public function create()
    {
        $title = 'Add News';

        return view('news.create',[
            'title' => $title,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'thumbnail' => 'required',
            'thumbnail_desc' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $news = News::create([
                'title' => $request->title,
                'body' => $request->body,
                'thumbnail' => 'link',
                'thumbnail_desc' => $request->thumbnail_desc,
                'user_id' => auth()->user()->id
            ]);

            if($request->hasFile('thumbnail')){
                $file = $request->file('thumbnail');
                $fileName = 'thumbails/' . time() . '_' .$news->id . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/' , $fileName);
                // dd($file);
                $news->update([
                    'thumbnail' => $fileName
                ]);
            }

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
        $news = News::findOrFail($id);
        $title = $news->title;

        return view('news.edit',[
            'title' => $title,
            'news' => $news
        ]);
        
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'thumbnail_desc' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $news->update([
                'title' => $request->title,
                'body' => $request->body,
                'thumbnail_desc' => $request->thumbnail_desc,
                'user_id' => auth()->user()->id
            ]);

            if($request->hasFile('thumbnail')){
                $file = $request->file('thumbnail');
                $fileName = 'thumbails/' . time() . '_' .$news->id . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/' , $fileName);
                // dd($file);
                $news->update([
                    'thumbnail' => $fileName
                ]);
            }

            DB::commit();
            return redirect()->back()->with('success', 'Data updated!');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', 'Data error! ' . $th->getMessage());
        }
    }

    public function destroy(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->back()->with('success', 'Data deleted!');
    }
}
