<?php

namespace App\Http\Controllers\Auth;

use DB;
use Session;
use Cookie;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

// here is the code for settling login,register,logout function
class AuthController extends Controller
{
    public function index(){

        return view('auth.login');

    }

    public function agentRegistration(){

        return view('auth.agentRegistration');

    }

    public function userRegistration(){

        return view('auth.userRegistration');

    }

    public function postLogin(Request $request){

        $request->validate([
            'password' => 'required',
            'username' => 'required',
        ]);

        if($request->has('rememberme')){
            Cookie::queue('username',$request->username,1440); //1440 means it stays for 24 hours
            Cookie::queue('password',$request->password,1440);
        }

        $credentials = $request->only('password', 'username');
        

        if(Auth::attempt($credentials)){
            // set remember me token when user check the box
            //$remember = Input::get('remember');
            /*if(!empty($remember)){
                Auth::login(Auth::user()->id, true);
            }*/
            if(Auth::user()->isAdmin()){
                return redirect()->route('agent.register')->withSuccess('You have successfully logged in!');
            }
            else if(Auth::user()->isAgent()){
                return redirect()->route('user.register')->withSuccess('You have successfully logged in!');
            }
            else if(Auth::user()->isMember()){
                return redirect()->route('blacklist.view')->withSuccess('You have successfully logged in!');
            }

        }
        else{
            return redirect()->route('login')->withError( 'Email or password is incorrect. Please try again.');
        }
    }

    public function postRegistration(Request $request){
        
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'type' => 'required',
            'handphone_number' => 'nullable',
            'gender' => 'nullable',
        ]);

    
        $data = $request->all();
        $check = $this->create($data);

        
        if($request->type == 1){
            return redirect()->route('member.show')->withSuccess('You have successfully created a new member!');
        }
        elseif($request->type == 2){
            return redirect()->route('agent.show')->withSuccess('You have successfully created a new agent!');
        }
        else{
            return redirect()->route('member.show')->withSuccess('You have successfully created a new member!');
        }
    }

    public function dashboard(){

        if(Auth::check()){
            return view('dashboard');
        }

        return redirect('login')->withSuccess('You do not have access to this page!');
    }
    
    public function create(array $data){
        
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
            'handphone_number' => $data['handphone_number'],
            'gender' => $data['gender'],
            'type' => $data['type'],
        ]);
        return redirect()->route('show-member')->withSuccess('You have successfully created a new member!');
    }

    public function viewAgent()
    {
        $users = DB::table('users')->select('users.*')->where('type','2')->paginate(5);
        return view("pages.viewAgent")->with(["users" => $users]);
    }

    public function viewMember()
    {
        $users = DB::table('users')->select('users.*')->where('type','1')->paginate(5);
        return view("pages.viewMember")->with(["users" => $users]);
    }

    public function showAgent()
    {
        $users = DB::table('users')->select('users.*')->where('type','2')->paginate(5);
        return view("pages.showAgent")->with(["users" => $users]);
    }

    public function showMember()
    {
        $users = DB::table('users')->select('users.*')->where('type','1')->paginate(5);
        return view("pages.showMember")->with(["users" => $users]);
    }

    public function editMember($id)
    {
        $users = User::all()->where('id',$id);

        return view('pages.editMember')->with(["users" => $users]);
    }

    public function editAgent($id)
    {
        $users = User::all()->where('id',$id);

        return view('pages.editAgent')->with(["users" => $users]);
    }

    public function deleteAgent($id)
    {
        $agents = User::find($id);
        $agents->delete();

        Session::flash('success',"Agent was deleted from record successfully!");
        return redirect()->back();
    }

    public function deleteMember($id)
    {
        $members = User::find($id);
        $members->delete();

        Session::flash('success',"Member was deleted from record successfully!");
        return redirect()->back();
    }
    
    public function update(Request $r)
    {
        $users = User::find($r->id);
        $r->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'handphone_number' => 'nullable',
            'gender' => 'nullable',
            'ic' => 'nullable',
            'bank_account_number1' => 'nullable',
            'bank_account_number2' => 'nullable',
            'bank_account_number3' => 'nullable',
        ]);


        $users->name = $r->name;
        $users->username = $r->username;
        $users->password = Hash::make($r->password);
        $users->email = $r->email;
        $users->handphone_number = $r->handphone_number;
        $users->gender = $r->gender;
        $users->ic = $r->ic;
        $users->bank_account_number1 = $r->bank_account_number1;
        $users->bank_account_number2 = $r->bank_account_number2;
        $users->bank_account_number3 = $r->bank_account_number3;
        $users->save();
    
        //return redirect()->route('profile.view');
     // return view('pages.profile')->withSuccess('You have successfully updated your profile!');
     //return redirect()->route('member.show')->withSuccess('You have successfully created a new member!');
     Session::flash('success',"User was updated successfully!");
     if($users->type == 2){
         return redirect()->route('agent.show');
     }
     else if($users->type == 1){
         return redirect()->route('member.show');
     }
     
 }


    public function searchAgent(Request $r)
    {
        $keyword = $r->keyword;
        $users = DB::table('users')->where('name','like','%'.$keyword.'%')->where('type','2')->get();

        return view('pages.showAgent')->with('users',$users);
    }

    public function searchMember(Request $r)
    {
        $keyword = $r->keyword;
        $users = DB::table('users')->where('name','like','%'.$keyword.'%')->where('type','1')->get();

        return view('pages.showMember')->with('users',$users);
    }

    public function displayNewerAgent()
    {
        $users = DB::table('users')->select('users.*')->where('type','2')->orderBy('id','desc')->paginate(5);
        return view("pages.showAgent")->with(["users" => $users]);
    }

    public function displayAgentAlphabetically()
    {
        $users = DB::table('users')->select('users.*')->where('type','2')->orderBy('name')->paginate(5);
        return view("pages.showAgent")->with(["users" => $users]);
    }

    public function displayAgentAlphabeticallyDesc()
    {
        $users = DB::table('users')->select('users.*')->where('type','2')->orderBy('name','desc')->paginate(5);
        return view("pages.showAgent")->with(["users" => $users]);
    }

    public function displayNewerMember()
    {
        $users = DB::table('users')->select('users.*')->where('type','1')->orderBy('id','desc')->paginate(5);
        return view("pages.showMember")->with(["users" => $users]);
    }

    public function displayMemberAlphabetically()
    {
        $users = DB::table('users')->select('users.*')->where('type','1')->orderBy('name')->paginate(5);
        return view("pages.showMember")->with(["users" => $users]);
    }

    public function displayMemberAlphabeticallyDesc()
    {
        $users = DB::table('users')->select('users.*')->where('type','1')->orderBy('name','desc')->paginate(5);
        return view("pages.showMember")->with(["users" => $users]);
    }


     public function profile(){
        $users = User::all()->where('id',Auth::id());
        return view('pages.profile')->with(["users" => $users]);
    }

    public function editProfile()
    {
        $users = User::all()->where('id',Auth::id());

        return view('pages.editProfile')->with(["users" => $users]);
    }

    public function updateProfile(Request $r)
    {
        $users = User::find($r->id);
        $r->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'handphone_number' => 'nullable',
            'gender' => 'nullable',
            'ic' => 'nullable',
            'bank_account_number1' => 'nullable',
            'bank_account_number2' => 'nullable',
            'bank_account_number3' => 'nullable',
        ]);

        $users->name = $r->name;
        $users->username = $r->username;
        $users->email = $r->email;
        $users->handphone_number = $r->handphone_number;
        $users->gender = $r->gender;
        $users->ic = $r->ic;
        $users->bank_account_number1 = $r->bank_account_number1;
        $users->bank_account_number2 = $r->bank_account_number2;
        $users->bank_account_number3 = $r->bank_account_number3;
        $users->save();

        Session::flash('success',"Profile was updated successfully!");
        return redirect()->route('profile.view');
    }

    
     public function editPassword()
    {
        $users = User::all()->where('id',Auth::id());

        return view('pages.editPassword')->with(["users" => $users]);
    } 


    public function updatePassword(Request $r)
    {

        $r->validate([
            'password' => 'required',
            'confirmPassword'=> 'required',
        ]);

        if($r -> confirmPassword !== $r ->password){
            Session::flash('error',"Your confirm password is not same as the new password.");
            return redirect()->route('password.change');
        }
        elseif($r -> confirmPassword == $r ->password){
            User::where('id',$r->userID)->update([
            'password' => \Hash::make($r->password)
        ]);

        Session::flash('success',"Password was changed successfully!");
        return redirect()->route('profile.view');
        }
        
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();
        
        return redirect('login');
    }

}