<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Helpers\Helper;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['announcements'] = Announcement::orderBy('id','asc')->paginate(5);

        return view('announcement.index', $data);
    }

    public function displayAnnouncement()
    {
        $data['announcements'] = Announcement::orderBy('id','asc')->paginate(5);

        return view('index', $data);
    }

    // public function displayAnnouncementParent()
    // {
    //     $data['announcements'] = Announcement::orderBy('id','asc')->paginate(5);

    //     return view('dashboardParent', $data);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('announcement.create');
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
            'title' => 'required',
            'description' => 'required',
            'announcement_date' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // $path = $request->file('image')->store('public/image/announcements');
        if ($image = $request->file('image')) {
                $destinationPath = 'image/announcements';
                $announcement_image = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $announcement_image);
                $input['image'] = "$announcement_image";
            }

        $title = $request->title;
        $description = $request->description;
        $announcement_date = $request->announcement_date;
        $announcement_id = Helper::IDGenerator(new Announcement, 'announcement_id', 5, 'ANCMT');

        $announcement = new Announcement;

        $announcement->title = $title;
        $announcement->description = $description;
        $announcement->announcement_date = $announcement_date;
        $announcement->announcement_id = $announcement_id;
        $announcement->image = $announcement_image;

        $announcement->save();



        return redirect()->route('announcement.index')
                        ->with('success','Announcement has been created successfully.');


        // $input = $request->all();

        // if ($image = $request->file('image')) {
        //     $destinationPath = 'image/announcements';
        //     $announcement_image = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $announcement_image);
        //     $input['image'] = "$announcement_image";
        // }

        // Announcement::create($input);

        // return redirect()->route('announcement.index')
        //                 ->with('success','Announcement created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        return view('announcement.edit',compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $announcement = Announcement::find($id);
        $announcement->title = $request->title;
        $announcement->description = $request->description;
        $announcement->announcement_date = $request->announcement_date;
        if ($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/announcements/', $filename);
            $announcement->image = $filename;
            // $image->move($destinationPath, $announcement_image);
            // $input['image'] = "$announcement_image";
        }// }else{
        //     unset($input['image']);
        // }



        // dd(Announcement::find($id));


        // if($request->hasFile('image')){
        //     $request->validate([
        //       'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        //     ]);
        //     $path = $request->file('image')->store('public/image/announcements');
        //     $announcement->image = $path;
        // }



        $announcement->save();

        return redirect()->route('announcement.index')
                        ->with('success','Announcement updated successfully');


        // $input = $request->all();

        // if ($image = $request->file('image')) {
        //     $destinationPath = 'image/announcements';
        //     $announcement_image = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $announcement_image);
        //     $input['image'] = "$announcement_image";
        // }else{
        //     unset($input['image']);
        // }


        // $announcement->update($input);

        // dd($announcement);

        // return redirect()->route('announcement.index', $announcement)
        //                 ->with('success','Announcement updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()->route('announcement.index')
                        ->with('success','Announcement deleted successfully');
    }
}
