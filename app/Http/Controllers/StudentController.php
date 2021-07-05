<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Gender;
use App\Models\Guardian;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['students'] = Student::orderBy('id','asc')->paginate(5);

        return view('student.index', $data);
    }

    public function indexChild()
    {
        $data['students'] = Student::orderBy('id','asc')->paginate(5);

        return view('guardians.enrollmentStatus', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders = Gender::all();
        $guardians = Guardian::all();
        return view('student.create', compact('genders', 'guardians'));
    }

    public function createChild()
    {
        $genders = Gender::all();
        $guardians = Guardian::all();
        return view('guardians.childEnrollmentForm', compact('genders', 'guardians'));
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
            'name' => 'required',
            'ic_no' => 'required',
            'dob' => 'required',
            'gender_id' => 'required',
            'address' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ic_copy' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'parent' => 'required',
            'purpose' => 'required',
        ]);

        if ($photo = $request->file('photo')) {
            $destinationPath = 'image/students';
            $student_image = date('YmdHis') . "." . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $student_image);
            $input['photo'] = "$student_image";
        }

        if ($ic_copy = $request->file('ic_copy')) {
            $destinationPath = 'image/studentIC';
            $studentIC_image = date('YmdHis') . "." . $ic_copy->getClientOriginalExtension();
            $ic_copy->move($destinationPath, $studentIC_image);
            $input['ic_copy'] = "$studentIC_image";
        }

        $name = $request->name;
        $ic_no = $request->ic_no;
        $dob = $request->dob;
        $gender_id = $request->gender_id;
        $address = $request->address;
        $parent = $request->parent;
        $purpose = $request->purpose;

        $student = new Student();

        $student->name = $name;
        $student->ic_no = $ic_no;
        $student->dob = $dob;
        $student->gender_id = $gender_id;
        $student->address = $address;
        $student->parent = $parent;
        $student->purpose = $purpose;
        $student->photo = $student_image;
        $student->ic_copy = $studentIC_image;

        $student->save();

        return redirect()->route('student.index')
                        ->with('success','Student has been created successfully.');
    }

    public function storeChild(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'ic_no' => 'required',
            'dob' => 'required',
            'gender_id' => 'required',
            'address' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ic_copy' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'purpose' => 'required',
        ]);

        if ($photo = $request->file('photo')) {
            $destinationPath = 'image/students';
            $student_image = date('YmdHis') . "." . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $student_image);
            $input['photo'] = "$student_image";
        }

        if ($ic_copy = $request->file('ic_copy')) {
            $destinationPath = 'image/studentIC';
            $studentIC_image = date('YmdHis') . "." . $ic_copy->getClientOriginalExtension();
            $ic_copy->move($destinationPath, $studentIC_image);
            $input['ic_copy'] = "$studentIC_image";
        }

        $name = $request->name;
        $ic_no = $request->ic_no;
        $dob = $request->dob;
        $gender_id = $request->gender_id;
        $address = $request->address;
        $parent = $request->parent;

        $student = new Student();

        $student->name = $name;
        $student->ic_no = $ic_no;
        $student->dob = $dob;
        $student->gender_id = $gender_id;
        $student->address = $address;
        $student->parent = $parent;
        $student->photo = $student_image;
        $student->ic_copy = $studentIC_image;

        $student->save();

        return redirect()->route('parents.indexChild')
                        ->with('success','Student has been created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $genders = Gender::all();
        $guardians = Guardian::all();
        return view('student.edit', compact('student', 'genders', 'guardians'));
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
        $student = Student::find($id);
        $student->name = $request->name;
        $student->ic_no = $request->ic_no;
        $student->dob = $request->dob;
        $student->gender_id = $request->gender_id;
        $student->address = $request->address;
        $student->parent = $request->parent;
        $student->purpose = $request->purpose;

        if ($request->hasfile('photo'))
        {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/students/', $filename);
            $student->image = $filename;
        }

        if ($request->hasfile('ic_copy'))
        {
            $file = $request->file('ic_copy');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/studentIC/', $filename);
            $student->ic_copy = $filename;
        }

        $student->save();

        return redirect()->route('student.index')
                        ->with('success','Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('student.index')
                        ->with('success','Student deleted successfully.');
    }
}
