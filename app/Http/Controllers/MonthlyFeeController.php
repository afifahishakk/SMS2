<?php

namespace App\Http\Controllers;
use App\Models\MonthlyFee;
use Illuminate\Http\Request;

class MonthlyFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['monthlyFees'] = MonthlyFee::orderBy('id','asc')->paginate(5);

        return view('monthlyFee.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monthlyFee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fee' => 'required',
            'year' => 'required',
        ]);

        $fee = $request->fee;
        $year = $request->year;

        $monthlyFee = new MonthlyFee();

        $monthlyFee->fee = $fee;
        $monthlyFee->year = $year;

        $monthlyFee->save();

        return redirect()->route('monthlyFee.index')
                        ->with('success','Monthly Fee has been created successfully.');
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
    public function edit(Monthlyfee $monthlyFee)
    {

        return view('monthlyFee.edit', compact('monthlyFee'));
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
        $monthlyFee = MonthlyFee::find($id);
        $monthlyFee->fee = $request->fee_type;
        $monthlyFee->year = $request->year;

        $monthlyFee->save();

        return redirect()->route('monthlyFee.index')
                        ->with('success','Monthly Fee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthlyFee $monthlyFee)
    {
        $monthlyFee->delete();

        return redirect()->route('monthlyFee.index')
                        ->with('success','Monthly Fee deleted successfully.');
    }
}
