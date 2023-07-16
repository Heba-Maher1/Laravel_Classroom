<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicRequest;
use App\Models\Classroom;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;


class TopicsController extends Controller
{
    //
    public function index()
    {
        $topics = Topic::orderBy('name' , 'DESC')->get();
        $success = session('success');

        return view('topics.index'  , compact('topics' , 'success'));
    }

    public function create(int $classroom)
    {
        return view('topics.create' , compact('classroom'));
    }

    public function store(TopicRequest $request , Classroom $classroom)
    {
        $topic = new Topic();
        $topic->name = $request->post('name');
        $topic->classroom_id = $request->post('classroom_id');
        $topic->save();

        return redirect()->route('classrooms.index')->with('success' , 'Topics Created');
    }

    public function show(string $id)
    {
        $topics = Topic::find($id);
        if(!$topics)
        {
            abort(404);
        }

        return view('topics.show' , [
            'topic' => $topics,
        ]);
    }

    public function edit(string $id)
    {

        $topics = Topic::find($id);
        if(!$topics)
        {
            abort(404);
        }
        return view('topics.edit',[
            'classroom' => $topics,
        ]);

    }

    public function update(TopicRequest $request ,string $id)
    {
        $topics = Topic::find($id);
        $topics->update($request->all());

        return Redirect::route('topics.index')->with('success' , 'Topic Updated');
    }

    public function destroy(string $id)
    {
        Topic::destroy($id);

        return redirect(route('classrooms.index'))->with('success' , 'Topic Deleted');
    }
}
