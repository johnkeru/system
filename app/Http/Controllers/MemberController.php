<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Chords;
use App\Models\Member;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use Yajra\Address\Entities\City;
use Yajra\Address\Entities\Region;
use Yajra\Address\Entities\Barangay;
use Yajra\Address\Entities\Province;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Member::all();

        return view('members.index',compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $region = Region::select('id')->where('region_id',$request->region_id)->first();
        $province = Province::select('id')->where('province_id',$request->province_id)->first();
        $city = City::select('id')->where('city_id',$request->city_id)->first();
        $barangay = $request->barangay_id;
        $age = Carbon::parse($request->birthday)->diff(Carbon::now())->y; 

        Member::create([
            'first_name'=>$request->first_name,
            'middle_name'=>$request->middle_name,
            'last_name'=>$request->last_name,
            'contact_no'=>$request->contact_no,
            'email'=>$request->email,
            'birthday'=>$request->birthday,
            'age'=>$age,
            'added_by'=> auth()->user(),
            'region_id'=>$region->id,
            'province_id'=>$province->id,
            'city_id'=>$city->id,
            'barangay_id'=>$barangay,
            'zip_code'=>$request->zip_code,
        ]);

        return redirect()->route('member.index');
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
        $region = Region::select('id')->where('region_id',$request->region_id)->first();
        $province = Province::select('id')->where('province_id',$request->province_id)->first();
        $city = City::select('id')->where('city_id',$request->city_id)->first();
        $barangay = $request->barangay_id;
        $age = Carbon::parse($request->birthday)->diff(Carbon::now())->y; 

        Member::find($id)->update(array(
            'first_name'=>$request->first_name,
            'middle_name'=>$request->middle_name,
            'last_name'=>$request->last_name,
            'contact_no'=>$request->contact_no,
            'email'=>$request->email,
            'birthday'=>$request->birthday,
            'age'=>$age,
            'added_by'=> auth()->user(),
            'region_id'=>$region->id,
            'province_id'=>$province->id,
            'city_id'=>$city->id,
            'barangay_id'=>$barangay,
            'zip_code'=>$request->zip_code,
        ));

        return redirect()->route('member.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::find($id)->delete();

        return redirect()->route('member.index');
    }

    public function sendMessage(Request $request)
    {
        foreach($request->member_id as $member)
        {
            $data = Member::find($member);
            return $data->contact_no;
        }

    }
}
