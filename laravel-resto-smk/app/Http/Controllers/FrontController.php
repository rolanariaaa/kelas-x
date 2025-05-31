<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::all();
        $menus = Menu::paginate(3);

        return view('menu', [
            'kategoris' => $kategoris,
            'menus' => $menus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pelanggan' => 'required',
            'email' => 'required|email|unique:pelanggans,email',
            'password' => 'required|min:3',
            'alamat' => 'required',
            'telp' => 'required',
            'jeniskelamin' => 'required',
        ]);

        $pelanggan = new Pelanggan();
        $pelanggan->pelanggan = $request->input('pelanggan');
        $pelanggan->email = $request->input('email');
        $pelanggan->password = Hash::make($request->input('password'));
        $pelanggan->alamat = $request->input('alamat');
        $pelanggan->telp = $request->input('telp');
        $pelanggan->jeniskelamin = $request->input('jeniskelamin');
        $pelanggan->save();

        session([
            'IDpelanggan' => $pelanggan->idpelanggan,
            'email' => $pelanggan->email
        ]);

        return redirect(url('/'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategoris = Kategori::all();
        $menus = Menu::where('idkategori', $id)->paginate(3);

        return view('kategori', [
            'kategoris' => $kategoris,
            'menus' => $menus
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function register()
    {
        $kategoris = Kategori::all();
        return view('register', ['kategoris' => $kategoris]);
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|min:3',
            'password' => 'required|min:3',
        ]);

        $pelanggan = Pelanggan::where('email', $request->input('email'))->first();
        if (!$pelanggan) {
            return back()->withInput()->with('salah', 'Email tidak ditemukan.');
        }
        if (!Hash::check($request->input('password'), $pelanggan->password)) {
            return back()->withInput()->with('salah', 'Password salah.');
        }
        session([
            'IDpelanggan' => $pelanggan->idpelanggan,
            'email' => $pelanggan->email
        ]);
        return redirect(url('/'));
    }

    public function showLoginForm()
    {
        return view('login');
    }
    public function logout()
    {
        session()->forget(['IDpelanggan', 'email']);
        return redirect(url('/'));
    }
}
