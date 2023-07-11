<?php

namespace App\Http\Controllers\Files;

use App\Models\Year;
use App\Models\Author;
use App\Models\Chords;
use App\Models\SessionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ChordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $years = Year::orderBy('id', 'DESC')->get();
        $authors = Author::all();

        $search = $request['search'] ?? "";
        if ($search != "") {
            $samples = Chords::where('file_name', 'LIKE', "%".$search."%")
            ->orWhereHas('author', function($a) use($search) {
                return $a->where('author', 'LIKE', "%".$search."%");
            })->paginate(15);
        } else {
            $samples = Chords::paginate(15);
        }
        
        return view('files.chords.index',compact(['samples','authors','years']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            $file->move('files/chords/'.$year->year.'/',$filename);
        }
        Chords::create([
            'year_id'=>$request->year_id,
            'author_id'=>$request->author_id,
            'file'=>$filename,
            'file_name'=>$request->file_name
        ]);
        return redirect()->route('chords.index');

        //storage_path('app/assets)
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $data = Chords::find($id);
        $year = Year::select('year')->where('id',$request->year_id)->first();

        $latestFile = $data->file;

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $file->move('files/chords/'.$year->year.'/',$filename);
            
            $latestFile = $filename;
        } else 
        {
            if (! File::exists('files/chords/'.$year->year)) {
                File::makeDirectory('files/chords/'.$year->year);
            }
            File::move('files/chords/'.$data->year->year.'/'.$data->file, 'files/chords/'.$year->year.'/'.$data->file);
        }
        File::delete('files/chords/'.$data->year->year.'/'.$data->file);
        $data->where('id', $id)->update(array(
        'year_id'=>$request->year_id,
        'author_id'=>$request->author_id,
        'file'=>$latestFile, 
        'file_name'=>$request->file_name
     ));
       
        return redirect()->route('chords.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data  = Chords::find($id);
        $year = Year::select('year')->where('id',$data->year_id)->first();
        File::delete('files/chords/'.$year->year.'/'.$data->file);
        $data->delete();
        return redirect()->route('chords.index');
    }

    public function download($id)
    {
        $data = Chords::find($id);
        return response()->download(public_path('files/chords/'.$data->year->year.'/'.$data->file));
    }
}
