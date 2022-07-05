<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\PostController;

class PostController extends Controller
{
    //

        public function index(){

           $posts =  auth()->user()->posts()->paginate(1); 

          return view('admin.posts.index',  ['posts'=>$posts]) ; 
        }





          public function show(Request $request){

                      $post = Post::find($request->id);
        
                        return view('blog-post', ['post'=>$post]);
         }


                public function create(){

    
        
                            return view('admin.posts.create');
    }


                      public function store(){
            
                               $inputs  =  request()->validate([
                                    'title'=>'required|min:5|max:255',
                                        'post_image'=>'file',
                                            'body'=>'required'
                            ]);
                            if(request('post_image')){
                                $inputs['post_image'] = request('post_image')->store('images');
                            }
                                    auth()->user()->posts()->create($inputs);
                                      session()->flash('message', 'Post was Created');
                                    


                                    return redirect()->route('post.index');





                                    


                                    }
                                    public function edit(Post $post){
                                          $this->authorize('view', $post);

                                      return view('admin.posts.edit',  ['post'=>$post]); 
                                    }
                            
                                      
                                    
                            



                            
                                    public function destroy(Post $post){

                                                $post->delete();
                                                Session::flash('message', 'Post was deleted');
                                                return back();





                                    }



                                    public function update(Post $post){
                                      $inputs  =  request()->validate([
                                        'title'=>'required|min:5|max:255',
                                            'post_image'=>'file',
                                                'body'=>'required'
                                ]);
                                      
                                if(request('post_image')){
                                  $inputs['post_image'] = request('post_image')->store('images');
                                    $post->post_image = $inputs['post_image'];
                                } 

                          $post->title = $inputs['title'];
                          $post->body = $inputs['body'];

                          $this->authorize('update', $post );


                                $post->save();
                          // auth()->user()->posts()->save($post);
                          session()->flash('message', 'Post was Updated');
                                  
                          return back();



}


}