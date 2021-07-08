<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\Student;
use App\Helpers\Helper;
use App\Models\MonthlyFee;
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

        $payments = Payment::where('p_type_id','1')->orderBy('id','asc')->get();
        $students = Student::all();
        return view('payment.registrationPaymentlist', compact('payments', 'students'));
    }

    public function indexMonthly(){
        $payments = Payment::where('p_type_id','2')->orderBy('id','asc')->get();
        $students = Student::all();
        return view('payment.monthlyPaymentList', compact('payments', 'students'));
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
    public function edit($id_payment, $id_student)
    {
        $payment = Payment::find($id_payment);
        $student = Student::find($id_student);

        return view('guardians.payBalanceFee', compact('student','payment'));

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

        // dd($request);
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
		$payment_status = 'Pending';
		$payment_option = $request->payment_option;
        
        $student = Student::where('ic_no', $student_ic)->first();
        $payment = new Payment;
        if ($request->hasfile('proof'))
        {
            $file = $request->file('proof');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/receiptPayment/', $filename);
            $proof = $filename;
            $payment->proof = $proof;
        }
        
        // dd($student);
        $payment->payment_id = $payment_id;
        $payment->payment_date = $payment_date;
        $payment->student_id = $student->id;
        $payment->student_ic = $student_ic;
        $payment->p_type_id = $p_type_id;
        $payment->month = $month;
        $payment->year = $year;
        $payment->payment_option = $payment_option;
        $payment->amount = $amount;
        $payment->paid_amount = $paid_amount;
        $payment->balance = $balance;
        $payment->payment_status = $payment_status;
        $payment->parent = $parent;
        if($request->id_parent_payment){
            $payment->id_parent_payment = $request->id_parent_payment;
        }
        // dd($payment);
        $payment->save();
        // $payment = Payment::create([
        //     'payment_id' =>$payment_id,
        //     'payment_date' =>$payment_date,
        //     'student_id' => $student->id,
        //     'student_ic' =>$student_ic,
        //     'p_type_id' =>$p_type_id,
        //     'month' =>$month,
        //     'year' =>$year,
        //     'payment_option' =>$payment_option,
        //     'amount' =>$amount,
        //     'paid_amount' =>$paid_amount,
        //     'balance' =>$balance,
        //     'payment_status' =>$payment_status,
        //     'parent' =>$parent,
        //     'proof' =>$proof,
        // ]);

        return redirect('payment-history')->with('success', 'Thank You! Registration payment fee successfully recorded');
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
		$payment_status = 'Pending';
		$payment_option = $request->payment_option;
        // dd($request);
        $student = Student::where('ic_no', $student_ic)->first();
        // dd($student);
        $payment = new Payment;
        if ($request->hasfile('proof'))
        {
            $file = $request->file('proof');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/receiptPayment/', $filename);
            $proof = $filename;
            $payment->proof = $proof;
        }

        $payment->payment_id = $payment_id;
        $payment->payment_date = $payment_date;
        $payment->student_id = $student->id;
        $payment->student_ic = $student_ic;
        $payment->p_type_id = $p_type_id;
        $payment->month = $month;
        $payment->year = $year;
        $payment->payment_option = $payment_option;
        $payment->amount = $amount;
        $payment->paid_amount = $paid_amount;
        $payment->balance = $balance;
        $payment->payment_status = $payment_status;
        $payment->parent = $parent;
        if($request->id_parent_payment){
            $payment->id_parent_payment = $request->id_parent_payment;
        }
        $payment->save();

        // $payment = Payment::create([
        //     'payment_id' =>$payment_id,
        //     'payment_date' =>$payment_date,
        //     'student_id' => $student->id,
        //     'student_ic' =>$student_ic,
        //     'p_type_id' =>$p_type_id,
        //     'month' =>$month,
        //     'year' =>$year,
        //     'payment_option' =>$payment_option,
        //     'amount' =>$amount,
        //     'paid_amount' =>$paid_amount,
        //     'balance' =>$balance,
        //     'payment_status' =>$payment_status,
        //     'parent' =>$parent,
        // ]);

        return redirect('payment-history')->with('success', 'Thank You! Registration payment fee successfully recorded');
    }

    public function fetchRegistrationPayment(Request $request){
        $payment = Payment::find($request->id);
        $data = [
            'status' => 'success', 
            'message' => 'Successfully get payment.',
            'data' => $payment
        ];
        return json_encode($data);
    }

    public function approveRegistrationFee(Request $request, $id){
        $payment = Payment::find($id);
        $payment->payment_status = $request->payment_status;
        $payment->paid_amount = $request->paid_amount;
        if($request->id_parent_payment != 'null'){
            $paymentParent = Payment::find($request->id_parent_payment);
            $paymentParent->payment_status = $request->payment_status;
            $paymentParent->save();
        }
        $payment->save();

        return redirect('payment')->with('success', 'Registration Payment has been Updated');

    }

    public function fetchMonthlyPayment(Request $request){
        $payment = Payment::find($request->id);
        $data = [
            'status' => 'success', 
            'message' => 'Successfully get payment.',
            'data' => $payment
        ];
        return json_encode($data);
    }

    public function approveMonthlyFee(Request $request, $id){
        // dd($request);
        $payment = Payment::find($id);
        $payment->payment_status = $request->payment_status;
        $payment->paid_amount = $request->paid_amount;
        if($request->id_parent_payment != 'null'){
            $paymentParent = Payment::find($request->id_parent_payment);
            $paymentParent->payment_status = $request->payment_status;
            $paymentParent->save();
        }
        $payment->save();

        return redirect('paymentMonthly')->with('success', 'Registration Payment has been Updated');

    }

    public function fetchStudent(Request $request){

        $arr_data = [];
        $student = Student::find($request->student_id);
        $monthly_fee = MonthlyFee::where('year', $request->year)->first();

        array_push($arr_data,$student);
        array_push($arr_data,$monthly_fee);
        $month_year = (Object)[
            'month' => $request->month,
            'year' => $request->year
        ];
        array_push($arr_data,$month_year);


        $data = [
            'status' => 'success', 
            'message' => 'Successfully get student info',
            'data' => $arr_data
        ];
        return json_encode($data);
    }
}
