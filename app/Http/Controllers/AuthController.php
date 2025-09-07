<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Illuminate\Validation\Rule;

class AuthController extends Controller{
    public function register(Request $request){
        $incomingData = $request->validate([
            'name'=>['required','min:3','max:12',Rule::unique('users','name')],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>['required','min:2','max:20'],
            'confirm_password'=>['required','same:password']
        ]);
        $incomingData['password']=bcrypt($incomingData['password']);
        User::create($incomingData);
        return redirect('/register')->with('status','Registration successful. Please login.');        
    }
    public function login(Request $request){
        $incomingData = $request->validate([
            'login_email'=>['required','email'],
            'login_password'=>['required','min:2','max:100']
        ]);
        if(auth()->attempt(['email'=>$incomingData['login_email'],'password'=>$incomingData['login_password']])){
            $request->session()->regenerate();
            return redirect('/dashboard')->with('status','Logged in Sucessfully!');
        }
        return back()->withErrors([
            'login_email' => 'Invalid credentials.',
        ])->withInput();
    }
    public function logout(){
        auth()->logout();
        return redirect('/')->with('status','Logged out Sucessfully!');
    }
}
?>