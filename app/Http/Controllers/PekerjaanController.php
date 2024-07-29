<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pekerjaan;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
        {
            $query = Pekerjaan::query();

            if ($request->has('searchTerm') && $request->searchTerm) {
                $searchBy = $request->searchBy ?? 'namaPekerjaan'; // Default to 'namaPekerjaan' if no searchBy is provided
                $query->where($searchBy, 'like', '%' . $request->searchTerm . '%');
            }

            $pekerjaan = $query->paginate(10);

            return view('pekerjaan.index', compact('pekerjaan'))->with('i', (request()->input('page', 1) - 1) * 10);
        }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pekerjaan.create');
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
            'namaPekerjaan'=>'required',
            'alamatPekerjaan' => 'required',
            'nomorPekerjaan'=>'required',

        ]);

        Pekerjaan::create($request->all());
        return redirect()->route('pekerjaan.index')
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
        $pekerjaan = Pekerjaan::find($id);
        return view('pekerjaan.detail', compact('pekerjaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pekerjaan = Pekerjaan::find($id);
        return view('pekerjaan.edit', compact('pekerjaan'));
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
            'namaPekerjaan'=>'required',
            'alamatPekerjaan' => 'required',
            'nomorPekerjaan'=>'required',
            //'gambarPekerjaan' => 'required|image|mimes:jpg,png,jpeg'
        ]);
        $pekerjaan = Pekerjaan::find($id);
        $pekerjaan->namaPekerjaan = $request->get('namaPekerjaan');
        $pekerjaan->alamatPekerjaan = $request->get('alamatPekerjaan');
        $pekerjaan->nomorPekerjaan = $request->get('nomorPekerjaan');
        $pekerjaan->save();
        return redirect()->route('pekerjaan.index')
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
        $pekerjaan = Pekerjaan::find($id);
        $pekerjaan->delete();
        return redirect()->route('pekerjaan.index')
                         ->with('success', 'Data Alumni berhasil dihapus');
    }
}
