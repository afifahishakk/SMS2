<?php

namespace App\Http\Controllers;
use App\Models\Hafazan;
use App\Models\Student;
use Illuminate\Http\Request;

class HafazanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hafazans = Hafazan::orderBy('id','asc')->get();
        $students = Student::all();

        return view('hafazanPerformance.index', compact('hafazans', 'students'));
    }
    public function listHafazan()
    {
        $students = Student::where('purpose','!=' ,'SPM')->get();

        return view('hafazanPerformance.listHafazanPerformance', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        return view('hafazanPerformance.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            // 'student_ic' => 'required',
            // 'date' => 'required',
            // 'day' => 'required',
            // 'day_position' => 'required',
            // 'week' => 'required',
            // 'month' => 'required',
            // 'year' => 'required',
            // 'talaqi_start_juz' => 'required',
            // 'talaqi_start_surah' => 'required',
            // 'talaqi_start_halaman' => 'required',
            // 'talaqi_end_juz' => 'required',
            // 'talaqi_end_surah' => 'required',
            // 'talaqi_end_halaman' => 'required',
            // 'hafazan_start_juz' => 'required',
            // 'hafazan_start_surah' => 'required',
            // 'hafazan_start_halaman' => 'required',
            // 'hafazan_end_juz' => 'required',
            // 'hafazan_end_surah' => 'required',
            // 'hafazan_end_halaman' => 'required',
            // 'ulangan_baru_start_juz' => 'required',
            // 'ulangan_baru_start_surah' => 'required',
            // 'ulangan_baru_start_halaman' => 'required',
            // 'ulangan_baru_end_juz' => 'required',
            // 'ulangan_baru_end_surah' => 'required',
            // 'ulangan_baru_end_halaman' => 'required',
            // 'ulangan_lama_start_juz' => 'required',
            // 'ulangan_lama_start_surah' => 'required',
            // 'ulangan_lama_start_halaman' => 'required',
            // 'ulangan_lama_end_juz' => 'required',
            // 'ulangan_lama_end_surah' => 'required',
            // 'ulangan_lama_end_halaman' => 'required',
            // 'remark' => 'required'
        ]);



        $student_ic = $request->student_ic;
        $date = $request->date;
        $day = $request->day;
        $day_position = $request->day_position;
        $week = $request->week;
        $month = $request->month;
        $year = $request->year;
        $talaqi_start_juz = $request->talaqi_start_juz;
        $talaqi_start_surah = $request->talaqi_start_surah;
        $talaqi_start_halaman = $request->talaqi_start_halaman;
        $talaqi_end_juz = $request->talaqi_end_juz;
        $talaqi_end_surah = $request->talaqi_end_surah;
        $talaqi_end_halaman = $request->talaqi_end_halaman;
        $hafazan_start_juz = $request->hafazan_start_juz;
        $hafazan_start_surah = $request->hafazan_start_surah;
        $hafazan_start_halaman = $request->hafazan_start_halaman;
        $hafazan_end_juz = $request->hafazan_end_juz;
        $hafazan_end_surah = $request->hafazan_end_surah;
        $hafazan_end_halaman = $request->hafazan_end_halaman;
        $ulangan_baru_start_juz = $request->ulangan_baru_start_juz;
        $ulangan_baru_start_surah = $request->ulangan_baru_start_surah;
        $ulangan_baru_start_halaman = $request->ulangan_baru_start_halaman;
        $ulangan_baru_end_juz = $request->ulangan_baru_end_juz;
        $ulangan_baru_end_surah = $request->ulangan_baru_end_surah;
        $ulangan_baru_end_halaman = $request->ulangan_baru_end_halaman;
        $ulangan_lama_start_juz = $request->ulangan_lama_start_juz;
        $ulangan_lama_start_surah = $request->ulangan_lama_start_surah;
        $ulangan_lama_start_halaman = $request->ulangan_lama_start_halaman;
        $ulangan_lama_end_juz = $request->ulangan_lama_end_juz;
        $ulangan_lama_end_surah = $request->ulangan_lama_end_surah;
        $ulangan_lama_end_halaman = $request->ulangan_lama_end_halaman;
        $remark = $request->remark;

        $day = date("D", strtotime($date));
        $month = date("M", strtotime($date));
        $year = date("Y", strtotime($date));

        $week = $this->getWeekday($date);
        // dd($day);
        $hafazan = new Hafazan;

        // $student = Student::where('ic_no', $student_ic)->first();
        // dd($student, $student_ic);
        $hafazan->student_ic = $student_ic;
        $hafazan->date = $date;
        $hafazan->day = $day;
        $hafazan->student_id = $student_ic;
        $hafazan->day_position = $day_position;
        $hafazan->week = $week;
        $hafazan->month = $month;
        $hafazan->year = $year;
        $hafazan->talaqi_start_juz = $talaqi_start_juz;
        $hafazan->talaqi_start_surah = $talaqi_start_surah;
        $hafazan->talaqi_start_halaman = $talaqi_start_halaman;
        $hafazan->talaqi_end_juz = $talaqi_end_juz;
        $hafazan->talaqi_end_surah = $talaqi_end_surah;
        $hafazan->talaqi_end_halaman = $talaqi_end_halaman;
        $hafazan->hafazan_start_juz = $hafazan_start_juz;
        $hafazan->hafazan_start_surah = $hafazan_start_surah;
        $hafazan->hafazan_start_halaman = $hafazan_start_halaman;
        $hafazan->hafazan_end_juz = $hafazan_end_juz;
        $hafazan->hafazan_end_surah = $hafazan_end_surah;
        $hafazan->hafazan_end_halaman = $hafazan_end_halaman;
        $hafazan->ulangan_baru_start_juz = $ulangan_baru_start_juz;
        $hafazan->ulangan_baru_start_surah = $ulangan_baru_start_surah;
        $hafazan->ulangan_baru_start_halaman = $ulangan_baru_start_halaman;
        $hafazan->ulangan_baru_end_juz = $ulangan_baru_end_juz;
        $hafazan->ulangan_baru_end_surah = $ulangan_baru_end_surah;
        $hafazan->ulangan_baru_end_halaman = $ulangan_baru_end_halaman;
        $hafazan->ulangan_lama_start_juz = $ulangan_lama_start_juz;
        $hafazan->ulangan_lama_start_surah = $ulangan_lama_start_surah;
        $hafazan->ulangan_lama_start_halaman = $ulangan_lama_start_halaman;
        $hafazan->ulangan_lama_end_juz = $ulangan_lama_end_juz;
        $hafazan->ulangan_lama_end_surah = $ulangan_lama_end_surah;
        $hafazan->ulangan_lama_end_halaman = $ulangan_lama_end_halaman;
        $hafazan->remark = $remark;
        // dd('here');
        $hafazan->save();
        // dd($hafazan);

        return redirect()->route('hafazan.index')
                        ->with('success','Hafazan Performance has been created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        $hafazans = Hafazan::where('student_id', $id)->groupBy('week','month','year')->get();
        // dd($hafazans);
        return view('hafazanPerformance.listWeekHafazanPerformance', compact('student','hafazans'));
    }

    public function showPerformance($id_student,$week,$month,$year){
        
        $student = Student::find($id_student);
        $hafazans = Hafazan::where('week', $week)->where('month', $month)->where('year', $year)->get();

        return view('hafazanPerformance.showHafazanPerformance', compact('student','hafazans'));

    }

    public function childShowPerformance($id_student,$week,$month,$year){
        
        $student = Student::find($id_student);
        $hafazans = Hafazan::where('week', $week)->where('month', $month)->where('year', $year)->get();

        return view('childPerformance.hafazanPerformanceDetails', compact('student','hafazans'));

    }
    public function studentShowPerformance($id_student,$week,$month,$year){
        
        $student = Student::find($id_student);
        $hafazans = Hafazan::where('week', $week)->where('month', $month)->where('year', $year)->get();

        return view('student.hafazanPerformanceDetails', compact('student','hafazans'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hafazan $hafazan)
    {
        $students = Student::all();
        return view('hafazanPerformance.edit',compact('hafazan', 'students'));
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
        $hafazan = Hafazan::find($id);

        $student_ic = $request->student_ic;
        $date = $request->date;
        $day = $request->day;
        $day_position = $request->day_position;
        $week = $request->week;
        $month = $request->month;
        $year = $request->year;
        $talaqi_start_juz = $request->talaqi_start_juz;
        $talaqi_start_surah = $request->talaqi_start_surah;
        $talaqi_start_halaman = $request->talaqi_start_halaman;
        $talaqi_end_juz = $request->talaqi_end_juz;
        $talaqi_end_surah = $request->talaqi_end_surah;
        $talaqi_end_halaman = $request->talaqi_end_halaman;
        $hafazan_start_juz = $request->hafazan_start_juz;
        $hafazan_start_surah = $request->hafazan_start_surah;
        $hafazan_start_halaman = $request->hafazan_start_halaman;
        $hafazan_end_juz = $request->hafazan_end_juz;
        $hafazan_end_surah = $request->hafazan_end_surah;
        $hafazan_end_halaman = $request->hafazan_end_halaman;
        $ulangan_baru_start_juz = $request->ulangan_baru_start_juz;
        $ulangan_baru_start_surah = $request->ulangan_baru_start_surah;
        $ulangan_baru_start_halaman = $request->ulangan_baru_start_halaman;
        $ulangan_baru_end_juz = $request->ulangan_baru_end_juz;
        $ulangan_baru_end_surah = $request->ulangan_baru_end_surah;
        $ulangan_baru_end_halaman = $request->ulangan_baru_end_halaman;
        $ulangan_lama_start_juz = $request->ulangan_lama_start_juz;
        $ulangan_lama_start_surah = $request->ulangan_lama_start_surah;
        $ulangan_lama_start_halaman = $request->ulangan_lama_start_halaman;
        $ulangan_lama_end_juz = $request->ulangan_lama_end_juz;
        $ulangan_lama_end_surah = $request->ulangan_lama_end_surah;
        $ulangan_lama_end_halaman = $request->ulangan_lama_end_halaman;
        $remark = $request->remark;

        $day = date("D", strtotime($date));
        $month = date("M", strtotime($date));
        $year = date("Y", strtotime($date));

        ceil(date('d')/7);
        $week = $this->getWeekday($date);
        
        // $week = ceil(date('d')/7);

        // dd($request->all(), $day, $month, $year, $week);

        $hafazan->student_ic = $student_ic;
        $hafazan->date = $date;
        $hafazan->day = $day;
        $hafazan->day_position = $day_position;
        $hafazan->week = $week;
        $hafazan->month = $month;
        $hafazan->year = $year;
        $hafazan->talaqi_start_juz = $talaqi_start_juz;
        $hafazan->talaqi_start_surah = $talaqi_start_surah;
        $hafazan->talaqi_start_halaman = $talaqi_start_halaman;
        $hafazan->talaqi_end_juz = $talaqi_end_juz;
        $hafazan->talaqi_end_surah = $talaqi_end_surah;
        $hafazan->talaqi_end_halaman = $talaqi_end_halaman;
        $hafazan->hafazan_start_juz = $hafazan_start_juz;
        $hafazan->hafazan_start_surah = $hafazan_start_surah;
        $hafazan->hafazan_start_halaman = $hafazan_start_halaman;
        $hafazan->hafazan_end_juz = $hafazan_end_juz;
        $hafazan->hafazan_end_surah = $hafazan_end_surah;
        $hafazan->hafazan_end_halaman = $hafazan_end_halaman;
        $hafazan->ulangan_baru_start_juz = $ulangan_baru_start_juz;
        $hafazan->ulangan_baru_start_surah = $ulangan_baru_start_surah;
        $hafazan->ulangan_baru_start_halaman = $ulangan_baru_start_halaman;
        $hafazan->ulangan_baru_end_juz = $ulangan_baru_end_juz;
        $hafazan->ulangan_baru_end_surah = $ulangan_baru_end_surah;
        $hafazan->ulangan_baru_end_halaman = $ulangan_baru_end_halaman;
        $hafazan->ulangan_lama_start_juz = $ulangan_lama_start_juz;
        $hafazan->ulangan_lama_start_surah = $ulangan_lama_start_surah;
        $hafazan->ulangan_lama_start_halaman = $ulangan_lama_start_halaman;
        $hafazan->ulangan_lama_end_juz = $ulangan_lama_end_juz;
        $hafazan->ulangan_lama_end_surah = $ulangan_lama_end_surah;
        $hafazan->ulangan_lama_end_halaman = $ulangan_lama_end_halaman;
        $hafazan->remark = $remark;

        $hafazan->save();

        return redirect()->route('hafazan.index')
                        ->with('success','Hafazan Performance has been updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hafazan $hafazan)
    {
        $hafazan->delete();

        return redirect()->route('hafazan.index')
                        ->with('success','Hafazan deleted successfully');
    }

    public function hafazanPerformance()
    {
        $data['hafazans'] = Hafazan::orderBy('id','asc')->paginate(5);

        return view('student.performanceStudent', $data);
    }

    public function getWeekday($date){
        return ceil(date('d',strtotime($date))/7);
    }

    public function viewChildPerformance($id_student){
        $student = Student::find($id_student);
        $hafazans = Hafazan::where('student_id', $id_student)->groupBy('week','month','year')->get();
        // dd($hafazans);
        return view('childPerformance.viewChildHafazanPerformance', compact('student','hafazans'));
    }

    public function viewStudentPerformance($id_student){
        $student = Student::find($id_student);
        $hafazans = Hafazan::where('student_id', $id_student)->groupBy('week','month','year')->get();
        // dd($hafazans);
        return view('student.viewStudentHafazanPerformance', compact('student','hafazans'));
    }
}
