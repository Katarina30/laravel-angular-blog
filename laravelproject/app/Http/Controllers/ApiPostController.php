<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class ApiPostController extends Controller
{
     public function index(Request $request){

      if($request->has('search')){

        $search = "%$request->search%";

        $posts= Post::with('user:id,name')->where('title','LIKE',$search )->orWhere('description','LIKE',$search )->orderBy('created_at','DESC')->get();
      }
    
      else{
        $posts = Post::with('user:id,name')->orderBy('created_at','DESC')->get();
      }
     
				
    	return response()->json($posts);
    }

    public function create(){
   
   	$users = User::all();

   	return view('posts/create',compact('users'));
   }

    public function store(Request $request){

    	$request->validate([
    		'title'=> 'required',
    		'description' => 'required',
    		'user_id'=>''
    	]);
        $user_id = auth()->user()->id;

    	$post_id = Post::create([
        'title'=>$request->title,
        'description'=>$request->description,
        'user_id'=>$user_id,
    ]);

        if($post_id){
            $post = Post::find($post_id);

         return response()->json($post->toArray(),200);
         }
        else{
            return response()->json(['message' => 'Yup. This request succeeded.'], 200);
         }
   }


    public function show($id){
    	
    	$post = Post::with('user:id,name')->find($id);

    	return response()->json($post);
   }

    public function edit($id){

            $post = Post::with('user:id,name')->find($id);
        if(auth()->user() && auth()->user()->id == $post->user_id) {

            return response()->json($post);
        }
        else{
            return response()->json(null, 401);
        }


   }

    public function update(Request $request){

        $request->validate([
            'title'=> 'required',
            'description' => 'required'

        ]);
        
       $post= Post::find($request->id);

        $post->update($request->all());

        return response()->json($post, 200);
      }


    public function destroy($id){

           $post = Post::with('user:id,name')->find($id);

        if(auth()->user() && auth()->user()->id == $post->user_id) {
            $post->delete();

            return response()->json(null, 204);
        }
        else{
            return response()->json(null, 401);
        }
    	
   }

}
