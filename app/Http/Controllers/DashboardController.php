<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Guardian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all();
        $total_paid_amount = 0;
        $total_amount = 0;
        
        foreach($payments as $payment){
            $total_paid_amount += $payment->paid_amount;
            if($payment->id_parent_payment == null)
                $total_amount += $payment->amount;
        }
        $total_balance = $total_amount-$total_paid_amount;

        $teachers = Teacher::all();
        $total_teachers = $teachers->count();
        
        $parents = Guardian::all();
        $total_parents = $parents->count();

        $students = Student::where('status','Approved')->get();
        $total_students = $students->count();

        return view('dashboard')->with(compact('total_balance','total_amount','total_paid_amount','total_teachers','total_parents','total_students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
}
