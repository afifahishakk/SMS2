<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('login');
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
    public function validateLogin(Request $request){
        //UserID password
        // dd('hi');
        $userid = $request->UserID;
        $password = $request->password;

        $user = Login::where('UserID', $userid)->where('password', $password)->get();

        //if user found or not
        if(count($user) > 0){
            // $_SESSION['UserID'] = $user->UserID;
            // $_SESSION['UserLvl'] = $user->UserLvl;
            if($user[0]->UserLvl == 1){
                $username = $user[0]->UserID;
                $photo = 'face23.jpg';
            }elseif($user[0]->UserLvl == 2){
                $username = $user[0]->teacher->username;
                $photo = $user[0]->teacher->photo;

            }elseif($user[0]->UserLvl == 3){
                $username = $user[0]->teacher->username;
                $photo = $user[0]->teacher->photo;

            }elseif($user[0]->UserLvl == 4){
                $username = $user[0]->parent->username;
                $photo = $user[0]->parent->photo;

            }

            session([
                'username' => $username,
                'photo' => $photo,
                'UserID' => $user[0]->UserID,
                'UserLvl' => $user[0]->UserLvl
                //kat sini tambah gambar
            ]);

            // $value = session('UserID');
            // dd($value);
            if($user[0]->UserLvl == 1 && $user[0]->Status == 'Active'){
                return redirect('/dashboard');
            }elseif($user[0]->UserLvl == 2 && $user[0]->Status == 'Active'){
                return redirect('/dashboardTeacherTahfiz');
            }elseif($user[0]->UserLvl == 3 && $user[0]->Status == 'Active'){
                return redirect('/dashboardTeacherAcademic');
            }elseif($user[0]->UserLvl == 4 && $user[0]->Status == 'Active'){
                return redirect('/dashboardParent');
            }elseif($user[0]->UserLvl == 5 && $user[0]->Status == 'Active'){
                return redirect('/dashboard');
            }else{
                $errorMsg = 'Login Failed. Account not Active';
            return redirect('login')->with('errorMsg', $errorMsg);
            }
        }else{
            $errorMsg = 'Login Failed. Please Check Your User Name And Password';
            return redirect('login')->with('errorMsg', $errorMsg);
        }
    }

    public function logout(){
        Session::flush();
        $errorMsg = 'You Have Been Log Out';
        return redirect('login')->with('errorMsg', $errorMsg);
    }
}
