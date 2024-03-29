<?php

namespace App\Http\Controllers\Auth;

use DB;
use Cookie;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        return redirect('login')->with('error', 'Username or password is incorrect. Please try again.');;

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

        /*if($request['score'] >= 0 && $request['score'] <= 299)
        {
            $request['status'] = "No Score";
        }
        else if($request['score'] >= 300 && $request['score'] <= 528)
        {
            $request['status'] = "Poor";
        }
        else if($request['score'] >= 529 && $request['score'] <= 650)
        {
            $request['status'] = "Low";
        }
        else if($request['score'] >= 651 && $request['score'] <= 696)
        {
            $request['status'] = "Fair";
        }
        else if($request['score'] >= 697 && $request['score'] <= 717)
        {
            $request['status'] = "Good";
        }
        else if($request['score'] >= 718 && $request['score'] <= 743)
        {
            $request['status'] = "Very Good";
        }
        else if($request['score'] >= 744 && $request['score'] <= 850)
        {
            $request['status'] = "Excellent";
        }*/
    
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
    }
    
    // ignore this
    public function viewAgent()
    {
        $users = DB::table('users')->select('users.*')->where('type','2')->paginate(5);
        return view("pages.viewAgent")->with(["users" => $users]);
    }
    
    //ignore this as well
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
        return redirect()->route('agent.show');
    }

    public function deleteMember($id)
    {
        $members = User::find($id);
        $members->delete();

        Session::flash('success',"Member was deleted from record successfully!");
        return redirect()->route('member.show');
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

        /*if($r['score'] >= 0 && $r['score'] <= 299)
        {
            $r['status'] = "No Score";
        }
        else if($r['score'] >= 300 && $r['score'] <= 528)
        {
            $r['status'] = "Poor";
        }
        else if($r['score'] >= 529 && $r['score'] <= 650)
        {
            $r['status'] = "Low";
        }
        else if($r['score'] >= 651 && $r['score'] <= 696)
        {
            $r['status'] = "Fair";
        }
        else if($r['score'] >= 697 && $r['score'] <= 717)
        {
            $r['status'] = "Good";
        }
        else if($r['score'] >= 718 && $r['score'] <= 743)
        {
            $r['status'] = "Very Good";
        }
        else if($r['score'] >= 744 && $r['score'] <= 850)
        {
            $r['status'] = "Excellent";
        }*/

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

        Session::flash('success',"User was updated successfully!");
        if($users->type == 2){
            return redirect()->route('agent.show');
        }
        else if($users->type == 1){
            return redirect()->route('member.show');
        }
        
    }


   /* public function about(){
        return view("pages.aboutUs");
    }*/

    public function searchAgent(Request $r)
    {
        $output = "";
        $users = DB::table('users')->where('name','like','%'.$r->search.'%')->where('type','2')->paginate(5);

        foreach($users as $user)
        {
            $output.=
            '<tr>
            <td>'.$user->name.'</td>
            <td>'.$user->email.'</td>
            <td>'.$user->ic.'</td>
            <td>'.$user->handphone_number.'</td>
            <td>'.$user->gender.'</td>
            <td style="white-space: nowrap">
            '.'
            <a href="/agent-edit/'.$user->id.'" class="btn btn-warning btn-xs">'.'Edit</a>
            '.'
            <a href="/agent-delete/'.$user->id.'" class="btn btn-danger btn-xs"  onClick="return confirm("Are you sure to delete?")">'.'Delete</a>
            '.'
            </td>
            </tr>';
        }

        return response($output);
    }

    public function searchMember(Request $r)
    {
        $output = "";
        $users = DB::table('users')->where('name','like','%'.$r->search.'%')->where('type','1')->paginate(5);

        foreach($users as $user)
        {
            $output.=
            '<tr>
            <td>'.$user->name.'</td>
            <td>'.$user->email.'</td>
            <td>'.$user->ic.'</td>
            <td>'.$user->bank_account_number1.'
                '.$user->bank_account_number2.'
                '.$user->bank_account_number3.'</td>
            <td>'.$user->handphone_number.'</td>
            <td>'.$user->gender.'</td>
            <td style="white-space: nowrap">
            '.'
            <a href="/member-edit/'.$user->id.'" class="btn btn-warning btn-xs">'.'Edit</a>
            '.'
            <a href="/member-delete/'.$user->id.'" class="btn btn-danger btn-xs"  onClick="return confirm("Are you sure to delete?")">'.'Delete</a>
            '.'
            </td>
            </tr>';
        }
        return response($output);
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