<?php
namespace App\Http\Controllers;
use App\Models\Post;
use App\Http\Requests;      
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller{
    public function index(){
        $posts = Post::where("user_id",Auth::id())->latest()->get();
        return view('dashboard',compact('posts'));
    }  
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'post_title'=>'required|string|max:255',
            'post_content'=>'required|string',
        ]);
        if($validator->fails()){
            return redirect('/')->withErrors($validator)->withInput();
        }
        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->input('post_title');
        $post->content = $request->input('post_content');
        $post->save();
        return redirect('/')->with('success','Post created successfully');
    }
    public function destroy($post_id){
        $post = Post::findOrFail($post_id);
        if($post->user_id != Auth::id())
            abort(403,'Unauthorized action.');
        $post->delete();
        return redirect()->back()->with('success','Post deleted successfully');
    }
}
?>
