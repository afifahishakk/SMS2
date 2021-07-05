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
route::get('/dashboard', function(){
    return view('dashboard');
});

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
        $payments = Payment::all();
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


Route::get('/parents', [StudentController::class, 'indexChild'])->name('parents.indexChild');
Route::get('/parents/createChild', [StudentController::class, 'createChild']);
Route::post('/parents', [StudentController::class, 'storeChild'])->name('parents.storeChild');



Route::get('/enrollment-status', function () {
    return view('guardians.enrollmentStatus');
});

Route::get('/view-child-performance', function () {
    $hafazans = Hafazan::all();
    $academics = Academic::all();
    $students = Student::all();

    return view('childPerformance.index', compact('hafazans', 'academics', 'students'));
});

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
    $firstexams = Academic::where('a_type_id', 1)->get();
    $secondexams = Academic::where('a_type_id', 2)->get();
    $thirdexams = Academic::where('a_type_id', 3)->get();
    $fourthexams = Academic::where('a_type_id', 4)->get();
    $fifthexams = Academic::where('a_type_id', 5)->get();
    $student = Student::find($id);
    return view('childPerformance.academicPerformanceDetails', compact('student', 'firstexams', 'secondexams', 'thirdexams', 'fourthexams', 'fifthexams'));
});

Route::get('/payment-history', function () {
    $payments = Payment::orderBy('id','asc')->paginate(5);
    $students = Student::all();
    return view('guardians.paymentHistory', compact('payments', 'students'));
});

Route::get('/pay-monthly-fee', function () {
    $monthlyFees = MonthlyFee::orderBy('id','asc')->paginate(5);
    $students = Student::all();
    return view('guardians.payMonthlyFee', compact('students', 'monthlyFees'));
});

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


Route::get('/guardians', [GuardianController::class, 'index'])->name('guardian.index');
Route::get('/guardians/create', [GuardianController::class, 'create']);
Route::post('/guardians', [GuardianController::class, 'store']);
Route::get('/guardians/{guardian}/edit', [GuardianController::class, 'edit'])->name('guardian.edit');
Route::put('/guardians/{guardian}', [GuardianController::class, 'update']);
Route::delete('/guardians/{guardian}', [GuardianController::class, 'destroy'])->name('guardian.destroy');

Route::post('/registrationPayment', [PaymentController::class, 'fee'])->name('payment.fee');
Route::get('/registrationPaymentlist', [PaymentController::class, 'index'])->name('payment.registrationPaymentlist');

Route::post('/MonthlyPayment', [PaymentController::class, 'monthlyfee'])->name('payment.monthlyfee');
// Route::get('/MonthlyPaymentlist', [PaymentController::class, 'index'])->name('payment.MonthlyPaymentlist');


Route::get('/admins', [AdminController::class, 'index']);
Route::get('/admins/{admin}/edit', [AdminController::class, 'edit'])->name('admin.edit');


Route::get('/student-performance', function () {
    $hafazans = Hafazan::all();
    $academics = Academic::all();
    $students = Student::all();

    return view('student.performanceStudent', compact('hafazans', 'academics', 'students'));
});

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


Route::get('/update-monthly-status', function () {
    $payments = Payment::orderBy('id','asc')->paginate(20);
    $students = Student::all();
    return view('payment.monthlyPaymentList', compact('students', 'payments'));
});
