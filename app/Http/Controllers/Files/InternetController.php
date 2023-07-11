<?php

namespace App\Http\Controllers\Files;

use App\Models\Year;
use App\Models\Month;
use App\Models\Internet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class InternetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = Year::orderBy('id', 'DESC')->get();
        $months = Month::all();
        $datas = Internet::all();
        return view('files.internet.index', compact('months', 'years', 'datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('bill_file')) {
            $file = $request->file('bill_file');
            $filename = $file->getClientOriginalName();
            $file->move('files/internet/bill',$filename);
            return $filename;
        }
        $data = Internet::all();
        $bill = $request->bill;
        $latestBalance = Internet::select('total_balance')->orderBy('id', 'DESC')->first();
        if(count($data)==0)
        {
            $total = -1 * $bill;
            
        }
        else {
            $total = -1 * $bill + $latestBalance->total_balance;
        }
        
        Internet::create([
            'year_id'=> $request->year_id,
            'month_id'=> $request->month,
            'bill'=> $bill,
            'bill_file'=> $request->bill_file,
            'total_balance'=> $total,
        ]);

        return redirect()->route('internet.index');
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
        $data = Internet::find($id);
        $latestBillFile = $data->bill_file;

        if($request->hasFile('bill_file')) {
            $file = $request->file('bill_file');
            $filename = $file->getClientOriginalName();
            $file->move('files/internet/bill',$filename);

            $latestBillFile = $filename;
        }        

        $bill = $request->bill;
        $latestData = Internet::select('total_balance')->orderBy('id', 'DESC')->skip(1)->first();


        if($data->payment == NULL && $data->blessing == NULL)
        {
            $total = -1 * $bill + $latestData->total_balance;
        } else {
            $total = (-1 * $bill + $latestData->total_balance) + $data->payment + $data->blessing;
        }

        $data->where('id', $id)->update(array(
            'year_id'=> $request->year_id,
            'month_id'=> $request->month,
            'bill'=> $bill,
            'bill_file'=> $latestBillFile,
            'total_balance'=> $total,
        ));

        return redirect()->route('internet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Internet::find($id);
        File::delete('files/internet/bill/'.$data->bill_file);
        File::delete('files/internet/reciept/'.$data->reciept);
        $data->delete();
        return redirect()->route('internet.index');
    }

    public function pay(Request $request, $id)
    {
        $data = Internet::find($id);
        $latestReciept = $data->reciept;

        if($request->hasFile('reciept')) {
            $file = $request->file('reciept');
            $filename = $file->getClientOriginalName();
            $file->move('files/internet/reciept',$filename);

            $latestReciept = $filename;
        }
        
        $total_payment = $request->payment + $request->blessing;
        $total = $total_payment + $data->total_balance;
        $payment = $data->payment + $request->payment;
        $blessing = $data->blessing + $request->blessing;

        $data->where('id', $id)->update(array(
            'total_balance'=>$total,
            'payment'=>$payment,
            'reciept'=>$latestReciept,
            'blessing'=>$blessing
        ));

        return redirect()->route('internet.index');
    }
}
