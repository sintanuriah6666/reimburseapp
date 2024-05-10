<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'jabatan' => 'required',
            'nip' => 'required',
        ]);

        
        $validatedData['password'] = bcrypt($request->password);
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $validatedData['password'];
        $user->jabatan = $request->jabatan;
        $user->nip = $request->nip;
        $user->save();

        if($user->save() == false){
            return redirect()->back()->with('error', 'Failed to create user.');

        } else {
            return redirect()->back()->with('success', 'User created successfully.');
        }
    }
    
    public function store()
    {
        return view('users.add');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'jabatan' => 'required',
            'nip' => 'required',
        ]);

        
        $validatedData['password'] = bcrypt($request->password);
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $validatedData['password'];
        $user->jabatan = $request->jabatan;
        $user->nip = $request->nip;
        $user->update();

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('user.index')->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('user.index')->with('error', 'Failed to delete user.');
        }
    }
    

}
