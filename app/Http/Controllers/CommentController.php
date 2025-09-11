<?php
namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller{
    public function store(Request $request, $post_id){
        $request->validate([
            'comment_content'=>'required|string|max:500',
        ]);
        Comment::create([
            'post_id'=>$post_id,
            'user_id'=>auth()->id(),
            'comment_content'=>$request->comment_content,
        ]);
        return redirect()->back()->with('success','Comment added Sucessfully!');
    }
    public function destroy($comment_id){
        $comment = Comment::findOrFail($comment_id);
        if($comment->user_id != auth()->id())
            abort(403,'Unauthorized action.');
        $comment->delete();
        return redirect()->back()->with('success','Comment deleted successfully');
    }
}
?>