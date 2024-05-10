<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'email' => 'required|email',
            'password' => 'required',
            'jabatan' => 'required',
            'nip' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->jabatan = $request->jabatan;
        $user->nip = $request->nip;


        if (User::where('id', $user->id)->exists()) {
            $user->id = generate_unique_id();
        }

        $user->save();

        return redirect()->route('user.index')->with('success', 'User created successfully.');
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



    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'jabatan' => 'required',
            'nip' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'nip' => $request->nip,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'User updated successfully');
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
