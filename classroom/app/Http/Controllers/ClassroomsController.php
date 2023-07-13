<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ClassroomsController extends Controller
{
    //

    public function index()
    {
        $classrooms = Classroom::orderBy('created_at' , 'DESC')->get();
        return view('classrooms.index'  , compact('classrooms'));
    }

    public function create()
    {
        return view('classrooms.create');
    }

    public function store(Request $request)
    {

        // has() => we use with normal inputs , hsafile() => with file input
        if($request->hasFile('cover_image')){
            $file = $request->file('cover_image');
            // local desk => default , public desk ,  s3 desk => remotly
            $path = $file->store('/covers' , 'public');
            $request->merge([
                'cover_image_path' => $path ,
            ]);

        }

        $request->merge([
            'code'=> Str::random(8),
        ]);

        $classroom = Classroom::create($request->all());

        return redirect()->route('classrooms.index');
    }
    

    public function show(string $id)
    {
        $classroom = Classroom::find($id);
        if(!$classroom)
        {
            abort(404);
        }

        return view('classrooms.show' , [
            'classroom' => $classroom,
        ]);
    }

    public function edit(string $id)
    {

        $classroom = Classroom::find($id);
        if(!$classroom)
        {
            abort(404);
        }
        return view('classrooms.edit',[
            'classroom' => $classroom,
        ]);

    }

    public function update(Request $request ,string $id)
    {
        $classroom = Classroom::find($id);
        $classroom->update($request->all());

        return Redirect::route('classrooms.index');
    }

    public function destroy(string $id)
    {
        Classroom::destroy($id);

        return redirect(route('classrooms.index'));
    }
}
