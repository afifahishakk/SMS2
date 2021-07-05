<?php

namespace App\Http\Controllers;
use App\Models\Guardian;
use App\Models\Login;
use App\Models\Gender;
use App\Models\Relationship;
use Illuminate\Http\Request;

class GuardianController extends Controller
{
    public function index()
    {
        $data['guardians'] = Guardian::orderBy('id','asc')->paginate(5);

        return view('guardians.index', $data);
    }

    public function create()
    {
        $genders = Gender::all();
        $relationships = Relationship::all();
        return view('guardians.create',  compact('genders', 'relationships'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'name' => 'required' ,
            'gender_id' => 'required',
            'phone_no' => 'required',
            'email' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'required',
            'occupation' => 'required',
            'salary' => 'required',
            'relationship_id' => 'required',
            'ic_attachment' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);



        if ($photo = $request->file('photo')) {
            $destinationPath = 'image/guardians';
            $guardian_image = date('YmdHis') . "." . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $guardian_image);
            $input['photo'] = "$guardian_image";
        }


        if ($ic_attachment = $request->file('ic_attachment')) {
            $destinationPath = 'image/guardiansIC';
            $guardianIC_image = date('YmdHis') . "." . $ic_attachment->getClientOriginalExtension();
            $ic_attachment->move($destinationPath, $guardianIC_image);
            $input['ic_attachment'] = "$guardianIC_image";
        }

        $username = $request->username;
        $name = $request->name;
        $gender_id = $request->gender_id;
        $phone_no = $request->phone_no;
        $email = $request->email;
        $address = $request->address;
        $occupation = $request->occupation;
        $salary = $request->salary;
        $relationship_id = $request->relationship_id;


        $guardian = new Guardian;

        $guardian->username = $username;
        $guardian->name = $name;
        $guardian->gender_id = $gender_id;
        $guardian->phone_no = $phone_no;
        $guardian->email = $email;
        $guardian->photo = $guardian_image;
        $guardian->address = $address;
        $guardian->occupation = $occupation;
        $guardian->salary = $salary;
        $guardian->relationship_id = $relationship_id;
        $guardian->ic_attachment = $guardianIC_image;

        $guardian->save();

        $user = new Login;
        $user->UserID = $username;
        $user->password = $username;
        $user->UserLvl = 4;

        $user->Status = 'Active';
        $user->save();

        return redirect('/guardians')->with('success','Guardian has been created successfully.');

    }

    public function edit(Guardian $guardian)
    {
        $genders = Gender::all();
        $relationships = Relationship::all();
        return view('guardians.edit', compact('genders', 'relationships', 'guardian'));
    }

    public function update(Request $request, $id)
    {
        $guardian = Guardian::find($id);

        $guardian->username = $request->username;
        $guardian->name = $request->name;
        $guardian->gender_id = $request->gender_id;
        $guardian->phone_no = $request->phone_no;
        $guardian->email = $request->email;

        if ($request->hasfile('photo'))
        {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/guardians/', $filename);
            $guardian->photo = $filename;
        }

        $guardian->address = $request->address;
        $guardian->occupation = $request->occupation;
        $guardian->salary = $request->salary;
        $guardian->relationship_id = $request->relationship_id;

        if ($request->hasfile('ic_attachment'))
        {
            $file = $request->file('ic_attachment');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/guardiansIC/', $filename);
            $guardian->ic_attachment = $filename;
        }

        $guardian->save();
        return redirect('/guardians')->with('success','Guardian has been updated successfully.');

    }

    public function destroy(Guardian $guardian)
    {
        $guardian->delete();

        return redirect('/guardians')->with('success','Guardian deleted successfully');
    }
}
