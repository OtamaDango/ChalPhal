<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
class DashboardController extends Controller{
    public function index(){
        $posts = \app\Models\Post::with('user')->latest()->get();
        return view('home', compact('posts'));
    }   
}
?>