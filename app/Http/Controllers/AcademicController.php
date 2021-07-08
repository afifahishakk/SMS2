<?php

namespace App\Http\Controllers;
use App\Models\Academic_Type;
use App\Models\Academic;
use App\Models\Student;
use Illuminate\Http\Request;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['academics'] = Academic::orderBy('id','asc')->paginate(5);

        return view('academicPerformance.index', $data);
    }
    public function listAcademic()
    {
        $students = Student::where('purpose','!=' ,'Tahfiz')->get();
        return view('academicPerformance.listAcademicPerformance', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $academic_types = Academic_Type::all();
        $students = Student::where('purpose','!=' ,'Tahfiz')->get();
        $academic_types = Academic_Type::all();
        // dd($academic_types);
        return view('academicPerformance.create', compact('students','academic_types'));
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
            'student_id' => 'required',
            'a_type_id' => 'required',
            'BM' => 'required',
            'BA' => 'required',
            'MM' => 'required',
            'SN' => 'required',
            'SEJ' => 'required',
            'PQS' => 'required',
            'PSI' => 'required',
            'year' => 'required',
        ]);

        $student_id = $request->student_id;
        $a_type_id = $request->a_type_id;
        $BM = $request->BM;
        $BA = $request->BA;
        $MM = $request->MM;
        $SN = $request->SN;
        $SEJ = $request->SEJ;
        $PQS = $request->PQS;
        $PSI = $request->PSI;
        $year = $request->year;

        $academic = new Academic;

        $academic->student_id = $student_id;
        $academic->a_type_id = $a_type_id;
        $academic->BM = $BM;
        $academic->BA = $BA;
        $academic->MM = $MM;
        $academic->SN = $SN;
        $academic->SEJ = $SEJ;
        $academic->PQS = $PQS;
        $academic->PSI = $PSI;
        $academic->year = $year;

        $academic->save();

        return redirect()->route('academic.index')
                        ->with('success','Academic Performace has been created successfully.');
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
        
        return view('academicPerformance.showacademicPerformance',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Academic $academic)
    {
        $students = Student::where('purpose','!=' ,'Tahfiz')->get();
        $academic_types = Academic_Type::all();
        return view('academicPerformance.edit',compact('academic','students','academic_types'));
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
        $academic = Academic::find($id);

        $student_id = $request->student_id;
        $a_type_id = $request->a_type_id;
        $BM = $request->BM;
        $BA = $request->BA;
        $MM = $request->MM;
        $SN = $request->SN;
        $SEJ = $request->SEJ;
        $PQS = $request->PQS;
        $PSI = $request->PSI;
        $year = $request->year;

        $academic->student_id = $student_id;
        $academic->a_type_id = $a_type_id;
        $academic->BM = $BM;
        $academic->BA = $BA;
        $academic->MM = $MM;
        $academic->SN = $SN;
        $academic->SEJ = $SEJ;
        $academic->PQS = $PQS;
        $academic->PSI = $PSI;
        $academic->year = $year;

        $academic->save();

        return redirect()->route('academic.index')
                        ->with('success','Academic Performance has been updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Academic $academic)
    {
        $academic->delete();

        return redirect()->route('academic.index')
                        ->with('success','Academic deleted successfully');
    }
}
