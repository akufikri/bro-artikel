<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function users(){
        $user = User::all();
        return view('user_end', compact('user'));
    }
    public function insert_user(Request $request){
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => 'pengunjung',
            'password' => bcrypt($request->password),
            'repeat_password' => $request->repeat_password,
        ]);

        return redirect('users_end');
    }
    public function delete_user($id){
        $data = User::findorfail($id);

        $data->delete();

        return redirect('users_end');
    }

    public function show_user($id){
        $data = User::find($id);

        return view('update.edit_user_end', compact('data'));
    }
    public function update_user(Request $request, $id){
        $data = User::find($id);
        
        $data->update($request->all());

        return redirect('users_end');
    }
    public function print_user(){
        $print = User::all();
        return view('print.user_print', compact('print'));
    }
}