<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use App\Models\Topic;
use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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
        return view('classrooms.create' , [
            'classroom' => new Classroom(),
        ]);
    }

    public function store(ClassroomRequest $request)
    {

        $validated = $request->validated();

        if($request->hasFile('cover_image')){

            $file = $request->file('cover_image');

            $path = Classroom::uploadCoverImage($file);

            $validated['cover_image_path'] = $path;

        }

        $validated['code'] = Str::random(8);

        $classroom = Classroom::create($validated);

        return redirect()->route('classrooms.index')
                         ->with('success' , 'Classroom Created');

    }
    

    public function show($id)
    {
        $classroom = Classroom::findOrFail($id);
        $topics = $classroom->topics;
        if(!$classroom)
        {
            abort(404);
        }

        return view('classrooms.show' , [
            'classroom' => $classroom,
            'topics' => $topics,
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

    public function update(ClassroomRequest $request ,Classroom $classroom)
    {



        $validated = $request->validated();

        if ($request->hasFile('cover_image')) {
     
            $file = $request->file('cover_image');
            $path = Classroom::uploadCoverImage($file);
            
            $validated['cover_image_path'] = $path;
        }
        
        
        $old = $classroom->cover_image_path;

        $classroom->update($validated);
        
        if($old && $old != $classroom->cover_image_path){
            Classroom::deleteCoverImage($old);
        }
    
        return redirect()->route('classrooms.index')->with('success' , 'Classroom Updated');
    }

    public function destroy(Classroom $classroom)
    {
        $classroom->delete();

        Classroom::deleteCoverImage($classroom->cover_image_path);

        return redirect(route('classrooms.index'))->with('success' , 'Classroom Deleted');
    }
}
