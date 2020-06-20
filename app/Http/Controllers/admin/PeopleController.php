<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Our_people;
class PeopleController extends Controller
{

    public function get_people()
    {
      $main_active = 'people' ;
      $sub_active = 'people' ;
      return view('adminpanel.people.index',compact('main_active','sub_active'));
    }


    public function index()
    {
        $people = Our_people::latest('peoples.created_at')->paginate(5);
        return response()->json($people);
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

        $people = Our_people::create($request->all());
        return response()->json($people);
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
      $people = Our_people::where('_id',$id)->first();
      return response()->json($people);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$en,$id)
    {
      //  dd($id,$request->all());
        Our_people::find($id)->update($request->all());
        return 'yes';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($en,$id)
    {
      $people=Our_people::find($id)->delete();
      return response()->json($people);
    }

    //get all with offset
    public function show_offset_number($en,$offset) {
      $offset = (int)$offset;
      $data = Our_people::latest('peoples.created_at')->paginate($offset);
      return $data;
    }

    public function search($en,$key)
    {
      $data = Our_people::latest('peoples.created_at')->where(function($query) use ($key){
          $query->where('name','like', '%' . $key . '%');
          $query->orwhere('job_type','like', '%' . $key . '%');
      })->paginate(5);
      return $data;
    }
}
