<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use App\Models\Gender;
use App\Models\Login;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['teachers'] = Teacher::orderBy('id','asc')->paginate(5);

        // dd($teacherCount);

        return view('teacher.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders = Gender::all();
        return view('teacher.create', compact('genders'));
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
        request()->validate([
            'username' => 'required',
            // 'name' => 'required',
            // 'email' => 'required',
            // 'phone' => 'required',
            // 'gender_id' => 'required',
            // 'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            // 'nationality_id' => 'required',
            // 'type' => 'required',
            // 'address' => 'required',
            // 'marriage_status' => 'required',
            // 'salary' => 'required',
            // 'ic_no' => 'required',
            // 'ic_attachment' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            // 'spouse_name' => 'required',
            // 'spouse_occupation' => 'required',
            // 'spouse_phone' => 'required',
            // 'spouse_workplace' => 'required'
        ]);

        if ($photo = $request->file('photo')) {
            $destinationPath = 'image/teachers';
            $teacher_photo = date('YmdHis') . "." . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $teacher_photo);
            $input['photo'] = "$teacher_photo";
        }

        if ($ic_attachment = $request->file('ic_attachment')) {
            $destinationPath = 'image/teacherIC';
            $teacher_ic_photo = date('YmdHis') . "." . $ic_attachment->getClientOriginalExtension();
            $ic_attachment->move($destinationPath, $teacher_ic_photo);
            $input['ic_attachment'] = "$teacher_ic_photo";
        }

        $username = $request->username;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $gender_id = $request->gender_id;
        $nationality_id = $request->nationality_id;
        $type = $request->type;
        $address = $request->address;
        $marriage_status = $request->marriage_status;
        $salary = $request->salary;
        $ic_no = $request->ic_no;
        $spouse_name = $request->spouse_name;
        $spouse_occupation = $request->spouse_occupation;
        $spouse_phone = $request->spouse_phone;
        $spouse_workplace = $request->spouse_workplace;
        // dd($username);
        $teacher = new Teacher;

        $teacher->username = $username;
        $teacher->name = $name;
        $teacher->email = $email;
        $teacher->phone = $phone;
        $teacher->gender_id = $gender_id;
        // $teacher->nationality_id = $nationality_id;
        $teacher->type = $type;
        $teacher->address = $address;
        $teacher->marriage_status = $marriage_status;
        $teacher->salary = $salary;
        $teacher->ic_no = $ic_no;
        $teacher->spouse_name = $spouse_name;
        $teacher->spouse_occupation = $spouse_occupation;
        $teacher->spouse_phone = $spouse_phone;
        $teacher->spouse_workplace = $spouse_workplace;
        $teacher->photo = $teacher_photo;
        $teacher->ic_attachment = $teacher_ic_photo;

        $teacher->save();

        $user = new Login;
        $user->UserID = $username;
        $user->password = $username;
        if($type == 'Tahfiz'){
            $user->UserLvl = 2;

        }elseif($type == 'Academic'){
            $user->UserLvl = 3;
        }

        $user->Status = 'Active';
        $user->save();

        return redirect()->route('teacher.index')
                        ->with('success','Teacher has been created successfully.');
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
    public function edit(Teacher $teacher)
    {
        $genders = Gender::all();
        return view('teacher.edit',compact('teacher', 'genders'));
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
        $teacher = Teacher::find($id);

        if ($photo = $request->file('photo')) {
            $destinationPath = 'image/teachers';
            $teacher_photo = date('YmdHis') . "." . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $teacher_photo);
            $input['photo'] = "$teacher_photo";
        }

        if ($ic_attachment = $request->file('ic_attachment')) {
            $destinationPath = 'image/teacherIC';
            $teacher_ic_photo = date('YmdHis') . "." . $ic_attachment->getClientOriginalExtension();
            $ic_attachment->move($destinationPath, $teacher_ic_photo);
            $input['ic_attachment'] = "$teacher_ic_photo";
        }

        $username = $request->username;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $gender_id = $request->gender_id;
        $nationality_id = $request->nationality_id;
        $type = $request->type;
        $address = $request->address;
        $marriage_status = $request->marriage_status;
        $salary = $request->salary;
        $ic_no = $request->ic_no;
        $spouse_name = $request->spouse_name;
        $spouse_occupation = $request->spouse_occupation;
        $spouse_phone = $request->spouse_phone;
        $spouse_workplace = $request->spouse_workplace;

        $teacher->username = $username;
        $teacher->name = $name;
        $teacher->email = $email;
        $teacher->phone = $phone;
        $teacher->gender_id = $gender_id;
        // $teacher->nationality_id = $nationality_id;
        $teacher->type = $type;
        $teacher->address = $address;
        $teacher->marriage_status = $marriage_status;
        $teacher->salary = $salary;
        $teacher->ic_no = $ic_no;
        $teacher->spouse_name = $spouse_name;
        $teacher->spouse_occupation = $spouse_occupation;
        $teacher->spouse_phone = $spouse_phone;
        $teacher->spouse_workplace = $spouse_workplace;
        // $teacher->photo = $teacher_photo;
        // $teacher->ic_attachment = $teacher_ic_photo;
        //
        $teacher->save();

        return redirect()->route('teacher.index')
                        ->with('success','Teacher has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teacher.index')
                        ->with('success','Teacher deleted successfully');
    }
}
