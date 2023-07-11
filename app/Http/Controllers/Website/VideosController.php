<?php

namespace App\Http\Controllers\Website;

use App\Models\Year;
use App\Models\Month;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Website\Video;
use App\Http\Controllers\Controller;

class VideosController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
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
        Video::find($id)->delete();

        return redirect()->back();
    }

    public function showYear()
    {
        $years = Year::orderBy('year', 'DESC')->get();
        return view('website.videos.year',compact('years'));
    }

    public function showMonth($id)
    {
        $yearId = $id;
        $months = Month::all();
        return view('website.videos.month',compact('months','yearId'));
    }

    public function displayVideo($yearId, $monthId)
    {
        $monthId = $monthId;
        $yearId = $yearId;
        $sacredDatas = Video::where('year_id', $yearId)
        ->where('month_id', $monthId)->where('service_id', 2)->get();

        $harpsDatas = Video::where('year_id', $yearId)
        ->where('month_id', $monthId)->where('service_id', 3)->get();

        $oneDatas = Video::where('year_id', $yearId)
        ->where('month_id', $monthId)->where('service_id', 1)->get();

        $equippingDatas = Video::where('year_id', $yearId)
        ->where('month_id', $monthId)->where('service_id', 4)->get();

        $services = Service::all();
        
        $latestVid = Video::latest('date')->first();

        return view('website.videos.index',compact('monthId','yearId', 'sacredDatas', 'harpsDatas', 'services', 'oneDatas', 'equippingDatas', 'latestVid'));
    }

    public function addVideo(Request $request, $yearId, $monthId)
    {
        
        Video::create([
            'year_id'=>$yearId,
            'month_id'=>$monthId,
            'service_id'=>$request->service_id,
            'link'=>$request->link,
            'date'=>$request->date,
        ]);

        return redirect()->back();
    }


}
