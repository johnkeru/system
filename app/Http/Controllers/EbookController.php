<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\Writer;
use Illuminate\Http\Request;

class EbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        return $id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = Ebook::where('writer_id', $id)->get();
        $count = Ebook::where('writer_id', $id)->count();
        $writerId = Writer::find($id);
        return view('files.ebook.show', compact('datas','writerId', 'count'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeEbook(Request $request, $id)
    {
        $writerData = Writer::find($id);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move('files/ebook/'.$writerData->writer.'/',$filename);
        }
        Ebook::create([
            'ebook'=>$request->ebook,
            'writer_id'=>$id,
            'file'=>$filename,
        ]);
        return redirect()->back();

    }

    public function viewPDF($id)
    {
        $writerId = Writer::find($id);
        $data = Ebook::find($id);
        return view('files.ebook.viewPDF', compact('data','writerId'));
    }
}
