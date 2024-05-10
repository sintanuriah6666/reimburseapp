<?php

namespace App\Http\Controllers;
use App\Models\Reimbursement;

use Illuminate\Http\Request;

class ReimbursementsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->jabatan === 'staff') {
            $reimbursements = Reimbursement::where('user_id', $user->id)->get();
        } else {
            $reimbursements = Reimbursement::all();
        }
        return view('reimbursement.index', compact('reimbursements'));
    }


    public function create()
    {
        return view('reimbursement.add');
    }
    
    public function store(Request $request)
    {
      
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'nama_reimbursement' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file_pendukung' => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048', 
        ]);

        if ($request->hasFile('file_pendukung')) {
            $file = $request->file('file_pendukung');
            $user_id = $request->user_id;
            $user_folder = public_path('storage/' . $user_id);
    
            if (!file_exists($user_folder)) {
                mkdir($user_folder, 0777, true);
            }
        
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move($user_folder, $fileName);
            $validatedData['file_pendukung'] = $user_id . '/' . $fileName;
        }
        Reimbursement::create($validatedData);

        return redirect()->route('reimbursement.index')->with('success', 'Reimbursement created successfully');
    }

    public function detail($id)
    {
        $reimbursement = Reimbursement::find($id);
        return view('reimbursement.detail', compact('reimbursement'));
    }
    
   public function approved($id)
    {
        $reimbursement = Reimbursement::find($id);
        $reimbursement->status = 'confirmed';
        $reimbursement->save();
        return redirect()->route('reimbursement.index');
    }

    public function paid($id)
    {
        $reimbursement = Reimbursement::find($id);
        $reimbursement->status = 'paid';
        $reimbursement->save();
        return redirect()->route('reimbursement.index');
    }

    public function rejected($id)
    {
        $reimbursement = Reimbursement::find($id);
        $reimbursement->status = 'rejected';
        $reimbursement->save();
        return redirect()->route('reimbursement.index');
    }

}
