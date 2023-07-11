<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Year;
use App\Models\Lyric;
use App\Models\Author;
use Illuminate\Support\Facades\File;

class LyricController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = Year::orderBy('id', 'DESC')->get();
        $authors = Author::all();
        $lyrics = Lyric::all();
        return view('files.lyrics.index', compact(['years', 'authors', 'lyrics']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $year = Year::select('year')->where('id',$request->year_id)->first();

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $file->move('files/lyrics/'.$year->year.'/',$filename);
        }
        Lyric::create([
            'year_id'=>$request->year_id,
            'author_id'=>$request->author_id,
            'file'=>$filename,
            'song'=>$request->song
        ]);
        return redirect()->route('lyrics.index');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $data = Lyric::find($id);
        $year = Year::select('year')->where('id',$request->year_id)->first();

        $latestFile = $data->file;

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $file->move('files/lyrics/'.$year->year.'/',$filename);

            $latestFile = $filename;
        }
        else 
        {
            if (! File::exists('files/lyrics/'.$year->year)) {
                File::makeDirectory('files/lyrics/'.$year->year);
            }
            File::move('files/lyrics/'.$data->year->year.'/'.$data->file, 'files/lyrics/'.$year->year.'/'.$data->file);
        }

        File::delete('files/lyrics/'.$data->year->year.'/'.$data->file);

        $data->where('id', $id)->update(array(
        'year_id'=>$request->year_id,
        'author_id'=>$request->author_id,
        'file'=>$latestFile,
        'song'=>$request->song
     ));
       
        return redirect()->route('lyrics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Lyric::find($id);
        $year = Year::select('year')->where('id',$data->year_id)->first();
        File::delete('files/lyrics/'.$year->year.'/'.$data->file);
        $data->delete();
        return redirect()->route('lyrics.index');
    }

    public function download($id)
    {
        $data = Lyric::find($id);
        return response()->download(public_path('files/lyrics/'.$data->file));
    }
}
