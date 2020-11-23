<?php

namespace App\Http\Controllers;

//models
use App\User;
use App\Developer;

use View;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $developers = Developer::all();

        return View::make('developers.index')->with('developers',$developers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('developers.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|unique:developers|email',
        'phone_no' => 'required',
        'address' => 'required',
        ]);

        $first_name=$request->input('first_name');
        $last_name=$request->input('last_name');
        $email=$request->input('email');
        $phone_no=$request->input('phone_no');
        $address=$request->input('address');
        $logo=$request->file('logo');

        if($logo)
        {
            $filename = $first_name . time() . '.' . $logo->getClientOriginalExtension();

            // save to storage/app/photos as the new $filename
            $path = $logo->storeAs('public/developers-img', $filename);
        }
        else
        {
            $filename = 'developers-logo-'.time().'.png';
            Storage::copy('public/developers-img/developers-logo.png', 'public/developers-img/developers-logo-'.time().'.png');

        }


        $developer= new Developer;
        $developer->first_name = $first_name;
        $developer->last_name = $last_name;
        $developer->email = $email;
        $developer->phone_no = $phone_no;
        $developer->address = $address;
        $developer->image = $filename;
        $developer->save();


        return redirect('/developers')->with('responce','addded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Developer  $developer
     * @return \Illuminate\Http\Response
     */
    public function show(Developer $developer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Developer  $developer
     * @return \Illuminate\Http\Response
     */
    public function edit(Developer $developer)
    {
        echo $developer->id;

        $developer = Developer::find($developer->id);

        return view('developers.create-edit' , ['developer' => $developer ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Developer  $developer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Developer $developer)
    {
        $validator = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'phone_no' => 'required',
        'address' => 'required',
        ]);

        $first_name=$request->input('first_name');
        $last_name=$request->input('last_name');
        $email=$request->input('email');
        $phone_no=$request->input('phone_no');
        $address=$request->input('address');
        $logo=$request->file('logo');



        $developer= Developer::find($developer->id);
        $developer->first_name = $first_name;
        $developer->last_name = $last_name;
        $developer->email = $email;
        $developer->phone_no = $phone_no;
        $developer->address = $address;

        if($logo)
        {

                    //delete old images
        Storage::delete('public/developers-img/'.$developer->image);


            $filename = $first_name . time() . '.' . $logo->getClientOriginalExtension();

            // save to storage/app/photos as the new $filename
            $path = $logo->storeAs('public/developers-img', $filename);

            $developer->image = $filename;
        }
        
        $developer->save();


        return redirect('/developers')->with('responce','updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Developer  $developer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Developer $developer)
    {
        $developer= Developer::find($developer->id);
        Storage::delete('public/developers-img/'.$developer->image);
        Developer::destroy($developer->id); 
        return redirect('/developers')->with('responce','deleted');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Developer  $developer
     * @return \Illuminate\Http\Response
     */
    public function multipledelete(Request $request)
    {

        $delete=$request->input('delete');

        if(!empty($delete)) {
        foreach($delete as $id){
        $developer= Developer::find($id);
        Storage::delete('public/developers-img/'.$developer->image);
        Developer::destroy($id);
        }
        return redirect('/developers')->with('responce','deleted');
        }
        else
        {
            return redirect('/developers')->with('responce','select_delete');
        }

        
    }
}
