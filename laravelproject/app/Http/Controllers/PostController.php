<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;


class PostController extends Controller
{
    public function index(Request $request){
   
      if($request->has('search')){

        $search = "%$request->search%";

        $posts= Post::with('user:id,name')->where('title','LIKE',$search )->orWhere('description','LIKE',$search )->orderBy('created_at','DESC')->get();
      }
    
      else{
        $posts = Post::with('user:id,name')->orderBy('created_at','DESC')->get();
      }

        return view('posts/index',compact('posts'));
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

    	  Post::create([
        'title'=>$request->title,
        'description'=>$request->description,
        'user_id'=>$user_id,
    ]);

         return redirect()->route('posts');

   }


    public function show($id){
    	
    	$post = Post::find($id);

    	 return view('posts/show',compact('post'));
   }

    public function edit($id){
     
        $post = Post::with('user:id,name')->find($id);

      if(auth()->user()->id == $post->user->id){
         return view('posts/edit',compact('post')); 
       }
    	 else{
         return redirect()->action('posts');
       }  	
          
       
    	
   }

    public function update(Request $request){
        $req = $request->except(["_token"]);
        $request->validate([
            'title'=> 'required',
            'description' => 'required'

        ]);
        
        $post= Post::find($req['id']);
        $post->update($req);
    	
    	return redirect()->action('PostController@index');

   }


    public function destroy($id){
    	
    	$post = Post::with('user:id,name')->find($id);

      if(auth()->user()->id == $post->user->id){
           
           $post->delete();
            return redirect()->route('posts');
         }
         else{
          return redirect()->route('posts');
         }
       
       
    	
   }

}
