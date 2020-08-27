<?php

namespace App\Http\Controllers;

use App\City;
use App\Department;
use App\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, Department $departments, City $cities)
    {
        return view('contact.index', [
                'cities' => $cities,
                'departments' => $departments
            ]);
    }

    public function getCities(Request $request){
        if ($request->ajax()) {
            $cities =City::where('department_id', $request->department_id)->get();
            foreach ($cities as $city) {
                $cityArray[$city->id] = $city->city;
            }
            return response()->json($cityArray);
        }
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
    public function store(User $user, Department $department, City $city)
    {
          $fields = request()->validate([
            'name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'cedula' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'department' => 'required',
            'city' => 'required',
            'check' => 'required'
        ]);


         User::create($fields);

         return redirect()->route('inicio');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return User::count();
        // return view('contact.show', [
        //     'user' => $user
        // ]);
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
}
