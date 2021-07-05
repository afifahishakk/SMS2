<?php

namespace App\Http\Controllers;
use App\Models\Fee;
use App\Models\Fee_Category;

use Illuminate\Http\Request;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['fees'] = Fee::orderBy('id','asc')->paginate(5);

        return view('fee.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fee_category = Fee_Category::all();
        return view('fee.create', compact('fee_category'));
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
            'fee_category_id' => 'required',
            'fee_type' => 'required',
            'fee_total' => 'required',
        ]);

        $fee_category_id = $request->fee_category_id;
        $fee_type = $request->fee_type;
        $fee_total = $request->fee_total;

        $fee = new Fee;

        $fee->fee_category_id = $fee_category_id;
        $fee->fee_type = $fee_type;
        $fee->fee_total = $fee_total;

        $fee->save();

        return redirect()->route('fee.index')
                        ->with('success','Fee has been created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Fee $fee)
    {
        $fee_category = Fee_Category::all();
        return view('fee.edit', compact('fee', 'fee_category'));
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
        $fee = Fee::find($id);
        $fee->fee_category_id = $request->fee_category_id;
        $fee->fee_type = $request->fee_type;
        $fee->fee_total = $request->fee_total;

        $fee->save();

        return redirect()->route('fee.index')
                        ->with('success','Fee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fee $fee)
    {
        $fee->delete();

        return redirect()->route('fee.index')
                        ->with('success','Fee deleted successfully.');
    }
}
