<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClassroomsController extends Controller
{
    //

    public function index()
    { 
        $classrooms = Classroom::orderBy('created_at' , 'DESC')->get();
        $success = session('success');
        return view('classrooms.index'  , compact('classrooms' , 'success'));
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

        return redirect()->route('classrooms.index')
                         ->with('success' , 'Classroom Created');
    }
    

    public function show(Classroom $classroom)
    {

        if(!$classroom)
        {
            abort(404);
        }

        return view('classrooms.show' , [
            'classroom' => $classroom,
        ]);
    }

    public function edit(Classroom $classroom)
    {

        if(!$classroom)
        {
            abort(404);
        }
        return view('classrooms.edit',[
            'classroom' => $classroom,
        ]);

    }

    public function update(Request $request ,Classroom $classroom)
    {

        if ($request->hasFile('cover_image')) {
            Storage::disk('public')->delete($classroom->cover_image_path);
    
            $file = $request->file('cover_image');
            $path = $file->store('/covers', 'public');
    
            $classroom->update([
                'cover_image_path' => $path
            ]);
        }
    
        $classroom->update($request->all());
    
        return redirect()->route('classrooms.index')->with('success' , 'Classroom Updated');
    }

    public function destroy(Classroom $classroom)
    {

        Storage::disk('public')->delete($classroom->cover_image_path);

        $classroom->delete();

        return redirect(route('classrooms.index'))->with('success' , 'Classroom Deleted');
    }
}
