<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\Student;
use App\Helpers\Helper;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $payments = Payment::orderBy('id','asc')->paginate(10);
        $students = Student::all();
        return view('payment.registrationPaymentlist', compact('payments', 'students'));
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

    public function fee(Request $request){

        $payment_id = Helper::IDGenerator(new Payment, 'payment_id', 5, 'PAY');
        // dd($payment_id);
        $payment_date = $request->payment_date;
		$student_ic = $request->student_ic;
		$p_type_id = $request->p_type_id;
		$month = $request->month;
		$year = $request->year;
		$parent = session('UserID');
		$amount = $request->amount;
		$paid_amount = $request->paid_amount;
		$balance = $amount - $paid_amount;
		$payment_status = $request->payment_status;
		$payment_option = "cash";

        $student = Student::where('ic_no', $student_ic)->first();
        // dd($student);
        $payment = Payment::create([
            'payment_id' =>$payment_id,
            'payment_date' =>$payment_date,
            'student_id' => $student->id,
            'student_ic' =>$student_ic,
            'p_type_id' =>$p_type_id,
            'month' =>$month,
            'year' =>$year,
            'payment_option' =>$payment_option,
            'amount' =>$amount,
            'paid_amount' =>$paid_amount,
            'balance' =>$balance,
            'payment_status' =>$payment_status,
            'parent' =>$parent,
        ]);

        return redirect('registrationPaymentlist')->with('success', 'Thank You! Registration payment fee successfully recorded');
    }

    public function monthlyfee(Request $request){

        $payment_id = Helper::IDGenerator(new Payment, 'payment_id', 5, 'PAY');
        // dd($payment_id);
        $payment_date = $request->payment_date;
		$student_ic = $request->student_ic;
		$p_type_id = $request->p_type_id;
		$month = $request->month;
		$year = $request->year;
		$parent = session('UserID');
		$amount = $request->amount;
		$paid_amount = $request->paid_amount;
		$balance = $amount - $paid_amount;
		$payment_status = $request->payment_status;
		$payment_option = "cash";

        $student = Student::where('ic_no', $student_ic)->first();
        // dd($student);
        $payment = Payment::create([
            'payment_id' =>$payment_id,
            'payment_date' =>$payment_date,
            'student_id' => $student->id,
            'student_ic' =>$student_ic,
            'p_type_id' =>$p_type_id,
            'month' =>$month,
            'year' =>$year,
            'payment_option' =>$payment_option,
            'amount' =>$amount,
            'paid_amount' =>$paid_amount,
            'balance' =>$balance,
            'payment_status' =>$payment_status,
            'parent' =>$parent,
        ]);

        return redirect('update-monthly-status')->with('success', 'Thank You! Registration payment fee successfully recorded');
    }
}
