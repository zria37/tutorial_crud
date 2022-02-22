<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EmployeesController extends Controller
{
    public function index(){
        $data = DB::table("employees")->select(DB::raw('id, nama, IF(Jk= "L","Laki - Laki","Perempuan") AS Jk, notlp, photo'))->get();
        // ini untuk menampilkan semua data
        // $data = Employees::all();
        //ini untuk menghentikan 
        // dd($data);
    return view('v_datapegawai', compact('data'));   
    }

// Insert Pegawai
    public function addpegawai(){
        return view('v_addpegawai');
    }
    public function insert(Request $request){
        // dd($request);
        // ini untuk cara cepatt insert semua ke database
        // Employees::create($request->all());
        // DB::table('employees')->insert([
        //     'nama' => $request->nama,
        //     'Jk'=> $request->Jk,
        //     'notlp'=> $request->notlp
        // ]);

        $data = Employees::create($request->all());
            if($request->hasFile('photo')){
                $request->file('photo')->move('fotopegawai/', $request->file('photo')->getClientOriginalName());
                $data->photo = $request->file('photo')->getClientOriginalName();
                $data->save();
            }
        return redirect()->route('pegawai')->with('success', 'Data Berhasil di Tambahkan');
    }
// End Insert

// Update Pegawai
    public function editpegawai($id){
        $data = DB::table('employees')->find($id);
        // dd($data);
        return view('v_editpegawai', compact('data'));
    }
    public function update(Request $request, $id){
        // $data = DB::table('employees')->find($id);
        $data = Employees::find($id);
        $data->update($request->all());
        return redirect()->route('pegawai')->with('success', 'Data Berhasil di Berubah');
    }   

// End Update
// Delete 
    public function delete($id){
        $data = Employees::find($id);
        // ini untuk menghapus file photo gambar
        unlink('fotopegawai/'.$data->photo);
        // end
        $data->delete($id);
        return redirect()->route('pegawai')->with('success', 'Data Berhasil di Hapus');
    }
// end Delete
}
