<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Http\Requests\StoreKaryawanRequest;
use App\Http\Requests\UpdateKaryawanRequest;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    protected $view = 'karyawan.';
    protected $route = '/karyawans/';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routes = (object)[
            'index'=> $this->route,
            'is_update'=>false,
        ];

        $karyawan = Karyawan::All();
        return view($this->view.'data', compact('routes','karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKaryawanRequest $request)
    {
        // dd($request->all());
        $request['password'] = Hash::make($request->password);
        Karyawan::create($request->all());

        return redirect($this->route)->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        // return response()->json($karyawan);
        $is_update = true;
        return response()->json(['karyawan' => $karyawan, 'is_update' => $is_update]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKaryawanRequest $request, Karyawan $karyawan)
    {
        // Ambil data yang dikirimkan dalam request
        $data = $request->only(['nip', 'nama', 'username','password', 'jabatan', 'alamat', 'jenis_kelamin', 'role']);

        // Periksa apakah ada perubahan pada password
        if ($request->has('password')) {
            $karyawan->password = Hash::make($request->password);
        }
        
        // Perbarui data Karyawan
        $karyawan->update($data);

    //  $karyawan->save();
        return redirect($this->route)->with('success', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->delete();

        return redirect($this->route)->with('success', 'Data Berhasil Dihapus');
    }
}