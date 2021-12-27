<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Contest;
use DB;
use Symfony\Component\HttpFoundation\Session\Session;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics=Topic::orderBy('id','desc')->get();
        return view('backend.topics.index',['topics'=>$topics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.topics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

           $validated = $request->validate([
        'name' => 'required|unique:topics',
        'description' => 'required',
        'status' => 'required',
    ]);
        $topic = new Topic();
        $topic->name=$request->name;
        $topic->status=$request->status;
        $description=$request->description;
     
        if((count(explode(' ',$description))>2)){
            $request->session()->put('errorr','World limit cannot be more than 2 words');
        }


        $topic->description=$request->description;
        $topic->save();
        return redirect()->route('topic.index')->with('status','Topic added successfully');




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
        $topicEdit=Topic::find($id);
      return view('backend.topics.edit',['topicEdit'=>$topicEdit]);


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

        $updateData=Topic::find($id);


        $updateData->name=$request->name;
        $updateData->status=$request->status;
        $updateData->description=$request->description;
        $updateData->save();
       return redirect()->route('topic.index')->with('status','Topic updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $topic =Topic::find($id);
       $check=Contest::where('topic_id',$topic->id)->exists();
       if($check){
        return redirect()->route('topic.index')->with('status','You cannot delete this topic Category. To delete this topic category, you have to shift the contests of this topic to another topic.');
       }
       else{
       $topic->delete();
    return redirect()->route('topic.index')->with('status','Topic Category deleted successfully');

       }

    }
}
