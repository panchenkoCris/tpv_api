<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Example;

class ExamplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get - All from database
        $examples = Example::all();
        return response()->json($examples);
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Post data to database
        $this->validate($request,[
            'title' => 'required',
            'price' => 'required',
            'photo' => 'required',
            'description' => 'required'
        ]);

        $example = new Example();

        if($request->hasFile('photo')) 
        {
            $file = $request->file('photo');
            $allowedfileExtension = ['pdf', 'png', 'jpg'];
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);

            if($check) {
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                $example->photo = $name;
            }
        }


        $example->title = $request->input('title');
        $example->price = $request->input('price');
        $example->description = $request->input('description');

        $example->save();

        return response()->json($example);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //give 1 item from example
        $example = Example::find($id);
        return response()->json($example); 
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
        // update - id

        $this->validate($request,[
            'title' => 'required',
            'price' => 'required',
            'photo' => 'required',
            'description' => 'required'
        ]);

        $example = Example::find($id);

        if($request->hasFile('photo')) 
        {
            $file = $request->file('photo');
            $allowedfileExtension = ['pdf', 'png', 'jpg'];
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);

            if($check) {
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                $example->photo = $name;
            }
        }
        
        $example->title = $request->input('title');
        $example->price = $request->input('price');
        $example->description = $request->input('description');
        
        $example->save();

        return response()->json($example);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete - id
        $example = Example::find($id);
        $example->delete();
        return response()->json('Example deleted succesfully!');
    }
}
