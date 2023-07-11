<?php

namespace App\Http\Controllers\Files\Services;

use Carbon\Carbon;
use App\Models\Harp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class HarpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Harp::all();
        return view('files.services.harps-and-bowls.index', compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $month = Carbon::parse($request->date)->format('F');
        $year = Carbon::parse($request->date)->format('Y');

        if($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $file->move('files/services/harps-and-bowls/'.$year.'/'.$month.'/',$filename);
        }

        Harp::create([
            'date'=>$request->date,
            'preacher'=>$request->preacher,
            'file_name'=>$request->file_name,
            'file'=>$filename,
        ]);

        return redirect()->route('harps.index');
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
        $data = Harp::find($id);
        $monthDb = Carbon::parse($data->date)->format('F');
        $yearDb = Carbon::parse($data->date)->format('Y');
        
        $month = Carbon::parse($request->date)->format('F');
        $year = Carbon::parse($request->date)->format('Y');
        
        $latestFile = $data->file;
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $file->move('files/services/harps-and-bowls/'.$year.'/'.$month.'/',$filename);

            $latestFile = $filename;
        }else 
        {
            if (! File::exists('files/services/harps-and-bowls/'.$year.'/'.$month)) {
                File::makeDirectory('files/services/harps-and-bowls/'.$year.'/'.$month);
            }
            File::move('files/services/harps-and-bowls/'.$yearDb.'/'.$monthDb.'/'.$data->file, 
            'files/services/harps-and-bowls/'.$year.'/'.$month.'/'.$data->file);
        }

        File::delete('files/services/harps-and-bowls/'.$yearDb.'/'.$monthDb.'/'.$data->file);

        $data->where('id', $id)->update(array(
            'date'=>$request->date,
            'preacher'=>$request->preacher,
            'file'=>$latestFile,
            'file_name'=>$request->file_name
        ));

        return redirect()->route('harps.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Harp::find($id);
        $month = Carbon::parse($data->date)->format('F');
        $year = Carbon::parse($data->date)->format('Y');
        File::delete('files/services/harps-and-bowls/'.$year.'/'.$month.'/'.$data->file);

        $data->delete();
        return redirect()->route('harps.index');
    }

    public function download($id)
    {
        $data = Harp::find($id);
        $month = Carbon::parse($data->date)->format('F');
        $year = Carbon::parse($data->date)->format('Y');
        return response()->download(public_path('files/services/harps-and-bowls/'.$year.'/'.$month.'/'.$data->file));
    }
}
