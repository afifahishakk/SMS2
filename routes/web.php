<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HafazanController;
use App\Http\Controllers\AcademicController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\MonthlyFeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Models\Hafazan;
use App\Models\Academic;
use App\Models\Student;
use App\Models\Fee;
use App\Models\Payment;
use App\Models\MonthlyFee;
use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\Route;

// login //
Route::post('/Login', [LoginController::class, 'validateLogin'])->name('login.validateLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// login //


// public view //
Route::get('/index', function () {
    return view('index');
})->name('login');

Route::get('/index', [AnnouncementController::class, 'displayAnnouncement']);


Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
// public view //


// login
Route::get('/', function () {
    return view('login');
});

// dashboard ikut user //

Route::resource('dashboard', 'App\Http\Controllers\DashboardController');

Route::get('/dashboardTeacherTahfiz', function () {
    $announcements = Announcement::orderBy('id','asc')->paginate(5);
    return view('dashboardTeacherTahfiz', compact('announcements'));
});

Route::get('/dashboardTeacherAcademic', function () {
    $announcements = Announcement::orderBy('id','asc')->paginate(5);
    return view('dashboardTeacherAcademic', compact('announcements'));
});

Route::get('/dashboardParent', function () {
    $announcements = Announcement::orderBy('id','asc')->paginate(5);
    return view('dashboardParent', compact('announcements'));
});
// dashboard ikut user //

// monthly report //
Route::get('/monthly-report', function (Request $request) {
    if($request->has('month') && $request->has('year')){
        $payments = Payment::where('month', $request->month)->where('year',$request->year)->get();
        // dd($payments);
        $total_paid = 0;
        foreach($payments as $payment){
            $total_paid += $payment->paid_amount;
        }

        $month = $request->month;
    $year = $request->year;
    $total1 = 0;
    /* PAPAR NAMA BULAN */
    if($month == 1)
        $month_name = "Jan";
    else if($month == 2)
        $month_name = "Feb";
    else if($month == 3)
        $month_name = "Mac";
    else if($month == 4)
        $month_name = "Apr";
    else if($month == 5)
        $month_name = "May";
    else if($month == 6)
        $month_name = "June";
    else if($month == 7)
        $month_name = "July";
    else if($month == 8)
        $month_name = "Aug";
    else if($month == 9)
        $month_name = "Sept";
    else if($month == 10)
        $month_name = "Oct";
    else if($month == 11)
        $month_name = "Nov";
    else if($month == 12)
        $month_name = "Dec";
    }else{
        $total_paid = 0;
        $month_name = '';
        $year = '';
    }

    return view('report/monthlyReport', compact('total_paid', 'month_name', 'year'));
})->name('monthly-report');

// monthly report //
Route::get('/annual-report', function () {
    return view('report/annualReport');
});

// annual report //
Route::get('/annual-report', function (Request $request) {
    if($request->has('year')){
        $payments = Payment::where('year',$request->year)->get();
        // dd($payments);
        $total_paid = 0;
        foreach($payments as $payment){
            $total_paid += $payment->paid_amount;
        }
        $year = $request->year;
        
    }else{
        $total_paid = 0;
        $year = '';
    }

    return view('report/annualReport', compact('total_paid', 'year'));
})->name('annual-report');


Route::get('/parents', [StudentController::class, 'indexChild'])->name('parents.indexChild');
Route::get('/parents/createChild', [StudentController::class, 'createChild']);
Route::post('/parents', [StudentController::class, 'storeChild'])->name('parents.storeChild');



Route::get('/enrollment-status', function () {
    return view('guardians.enrollmentStatus');
});

Route::get('/view-child-performance', function () {

    $students = Student::where('parent' ,session('ID'))->get();
    // dd($students);

    return view('childPerformance.index', compact('students'));
});
Route::get('/view-child-performance/{id_student}', [HafazanController::class, 'viewChildPerformance']);
Route::get('/view-child-performance/{id_student}/{week}/{month}/{year}/showPerformance', [HafazanController::class, 'childShowPerformance']);


Route::get('/child-hafazan-performance-details/{id}', function ($id) {
    $hafazansMon = Hafazan::where('student_id', $id)->where('day', "Mon")->get();
    $hafazansTue = Hafazan::where('student_id', $id)->where('day', 'Tue')->get();
    $hafazansWed = Hafazan::where('student_id', $id)->where('day', 'Wed')->get();
    $hafazansThu = Hafazan::where('student_id', $id)->where('day', 'Thu')->get();
    $hafazansFri = Hafazan::where('student_id', $id)->where('day', 'Fri')->get();
    $hafazansSat = Hafazan::where('student_id', $id)->where('day', 'Sat')->get();
    $hafazansSun = Hafazan::where('student_id', $id)->where('day', 'Sun')->get();
    $student = Student::find($id);
    // dd($hafazansSun);
    return view('childPerformance.hafazanPerformanceDetails', compact('student','hafazansMon', 'hafazansTue','hafazansWed','hafazansThu','hafazansFri','hafazansSat','hafazansSun'));
});

Route::get('/child-academic-performance-details/{id}', function ($id) {
    
    $student = Student::find($id);
    return view('childPerformance.academicPerformanceDetails', compact('student'));
});

Route::get('/payment-history', function () {
    $payments = Payment::orderBy('id','asc')->get();
    $students = Student::all();
    return view('guardians.paymentHistory', compact('payments', 'students'));
});

Route::get('/payment-history/{id_payment}/{id_student}/balance', [PaymentController::class, 'edit']);


Route::get('/pay-monthly-fee', function () {
    $monthlyFees = MonthlyFee::orderBy('id','asc')->get();
    $students = Student::all();
    return view('guardians.payMonthlyFee', compact('students', 'monthlyFees'));
});
Route::post('/pay-monthly-fee/fetchStudent', [PaymentController::class, 'fetchStudent'])->name('fetchStudent');


Route::get('/pay-registration-fee', function () {
    $fees = Fee::where('fee_category_id', 1)->get();
    $lelakifees = Fee::where('fee_category_id', 2)->get();
    $perempuanfees = Fee::where('fee_category_id', 3)->get();
    $students = Student::all();
    return view('guardians.payRegistrationFee', compact('fees','lelakifees','perempuanfees', 'students'));
});

Route::get('/pay-student-registration-fee', function () {
    $fees = Fee::where('fee_category_id', 1)->get();
    $lelakifees = Fee::where('fee_category_id', 2)->get();
    $perempuanfees = Fee::where('fee_category_id', 3)->get();
    $students = Student::all();
    return view('payment.payStudentRegistrationFee', compact('fees','lelakifees','perempuanfees', 'students'));
});
Route::get('/pay-student-monthly-fee', function () {
    $monthlyFees = MonthlyFee::orderBy('id','asc')->paginate(5);
    $students = Student::all();
    return view('payment.payStudentMonthlyFee', compact('students', 'monthlyFees'));
});

Route::post('/payment/fetchRegistrationPayment', 'App\Http\Controllers\PaymentController@fetchRegistrationPayment')->name('payment.fetchRegistrationPayment');
Route::post('/payment/{id}/approveRegistrationFee', 'App\Http\Controllers\PaymentController@approveRegistrationFee')->name('payment.approveRegistrationFee');
Route::post('/paymentMonthly/fetchMonthlyPayment', 'App\Http\Controllers\PaymentController@fetchMonthlyPayment')->name('payment.fetchMonthlyPayment');
Route::post('/paymentMonthly/{id}/approveMonthlyFee', 'App\Http\Controllers\PaymentController@approveMonthlyFee')->name('payment.approveMonthlyFee');


Route::get('/listHafazanPerformance', [HafazanController::class, 'listHafazan'])->name('hafazan.listHafazan');
Route::get('/listAcademicPerformance', [AcademicController::class, 'listAcademic'])->name('academic.listAcademic');

Route::get('/createHafazanPerformance', function () {
    return view('hafazanPerformance.create');
});
Route::get('/createAcademicPerformance', function () {
    return view('academicPerformance.create');
});


Route::resources([
    'announcement' => AnnouncementController::class,
    'login' => LoginController::class,
    'teacher' => TeacherController::class,
    'student' => StudentController::class,
    'fee' => FeeController::class,
    'hafazan' => HafazanController::class,
    'academic' => AcademicController::class,
    'monthlyFee' => MonthlyFeeController::class,
    'payment' => PaymentController::class,
]);
Route::get('/paymentMonthly', [PaymentController::class, 'indexMonthly'])->name('payment.indexMonthly');


Route::get('/guardians', [GuardianController::class, 'index'])->name('guardian.index');
Route::get('/guardians/create', [GuardianController::class, 'create']);
Route::post('/guardians', [GuardianController::class, 'store']);
Route::get('/guardians/{guardian}/edit', [GuardianController::class, 'edit'])->name('guardian.edit');
Route::put('/guardians/{guardian}', [GuardianController::class, 'update']);
Route::delete('/guardians/{guardian}', [GuardianController::class, 'destroy'])->name('guardian.destroy');

Route::post('/registrationPayment', [PaymentController::class, 'fee'])->name('payment.fee');
Route::get('/registrationPaymentlist', [PaymentController::class, 'index'])->name('payment.registrationPaymentlist');

Route::post('/monthlyPayment', [PaymentController::class, 'monthlyfee'])->name('payment.monthlyfee');
// Route::get('/MonthlyPaymentlist', [PaymentController::class, 'index'])->name('payment.MonthlyPaymentlist');

Route::post('/student/decline', [StudentController::class, 'decline'])->name('student.decline');
Route::post('/student/approve', [StudentController::class, 'approve'])->name('student.approve');
Route::get('/admins', [AdminController::class, 'index']);
Route::get('/admins/{admin}/edit', [AdminController::class, 'edit'])->name('admin.edit');

Route::get('/hafazan/{id_student}/{week}/{month}/{year}/showPerformance', [HafazanController::class, 'showPerformance'])->name('hafazan.showPerformance');


Route::get('/student-performance', function () {
    $students = Student::all();

    return view('student.performanceStudent', compact('students'));
});

Route::get('/student-performance/{id_student}', [HafazanController::class, 'viewStudentPerformance']);
Route::get('/student-performance/{id_student}/{week}/{month}/{year}/showPerformance', [HafazanController::class, 'childShowPerformance']);


Route::get('/student-hafazan-performance-details/{id}', function ($id) {
    $hafazansMon = Hafazan::where('student_id', $id)->where('day', "Mon")->get();
    $hafazansTue = Hafazan::where('student_id', $id)->where('day', 'Tue')->get();
    $hafazansWed = Hafazan::where('student_id', $id)->where('day', 'Wed')->get();
    $hafazansThu = Hafazan::where('student_id', $id)->where('day', 'Thu')->get();
    $hafazansFri = Hafazan::where('student_id', $id)->where('day', 'Fri')->get();
    $hafazansSat = Hafazan::where('student_id', $id)->where('day', 'Sat')->get();
    $hafazansSun = Hafazan::where('student_id', $id)->where('day', 'Sun')->get();
    $student = Student::find($id);
    // dd($hafazansSun);
    return view('student.hafazanPerformanceDetails', compact('student','hafazansMon', 'hafazansTue','hafazansWed','hafazansThu','hafazansFri','hafazansSat','hafazansSun'));
});

Route::get('/student-academic-performance-details/{id}', function ($id) {
    $firstexams = Academic::where('a_type_id', 1)->get();
    $secondexams = Academic::where('a_type_id', 2)->get();
    $thirdexams = Academic::where('a_type_id', 3)->get();
    $fourthexams = Academic::where('a_type_id', 4)->get();
    $fifthexams = Academic::where('a_type_id', 5)->get();
    $student = Student::find($id);
    return view('student.academicPerformanceDetails', compact('student', 'firstexams', 'secondexams', 'thirdexams', 'fourthexams', 'fifthexams'));
});

