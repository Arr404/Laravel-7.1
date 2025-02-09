<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Mahasiswa::query();

               if ($request->has('searchTerm') && $request->searchTerm) {
                   $searchBy = $request->searchBy ?? 'namaMahasiswa'; // Default to 'namaMahasiswa' if no searchBy is provided
                   $query->where($searchBy, 'like', '%' . $request->searchTerm . '%');
               }

               $mahasiswas = $query->paginate(10);

               return view('mahasiswa.index', compact('mahasiswas'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'namaMahasiswa'=>'required',
            'nimMahasiswa' => 'required',
            'angkatanMahasiswa'=>'required',
            'judulskripsiMahasiswa' => 'required',
            'pembimbing1'=>'required',
            'pembimbing2' => 'required',
            'gambarMahasiswa' => 'required|image|mimes:jpg,png,jpeg|min:1024',
            'ijazahMahasiswa' => 'required|image|mimes:jpg,png,jpeg|min:1024',

        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa')
                         ->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.detail', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'namaMahasiswa'=>'required',
            'nimMahasiswa' => 'required',
            'angkatanMahasiswa'=>'required',
            'judulskripsiMahasiswa' => 'required',
            'pembimbing1'=>'required',
            'pembimbing2' => 'required',
            'gambarMahasiswa' => 'required|image|mimes:jpg,png,jpeg|min:1024',
            'ijazahMahasiswa' => 'required|image|mimes:jpg,png,jpeg|min:1024',
        ]);
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->namaMahasiswa = $request->get('namaMahasiswa');
        $mahasiswa->nimMahasiswa = $request->get('nimMahasiswa');
        $mahasiswa->angkatanMahasiswa = $request->get('angkatanMahasiswa');
        $mahasiswa->judulskripsiMahasiswa = $request->get('judulskripsiMahasiswa');
        $mahasiswa->pembimbing1 = $request->get('pembimbing1');
        $mahasiswa->pembimbing2 = $request->get('pembimbing2');
        $mahasiswa->gambarMahasiswa = $request->get('gambarMahasiswa');
        $mahasiswa->ijazahMahasiswa = $request->get('ijazahMahasiswa');
        $mahasiswa->save();
        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data Alumni berhasil dihapus');
    }
}
