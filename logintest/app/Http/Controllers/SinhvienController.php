<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sinhvien;

class SinhvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //phan trang la 5
        $sinhvien = SinhVien::paginate(5);
        // lay cac thong tin sv tra ve view
        return view('index', compact('sinhvien'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //tra ve view create
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //lay tat ca cac data gui len tu client
        SinhVien::create($request->all());
        //dieu huong view sang indec
        return redirect()->route('sinhvien.index')->with('Thongbao','Them sinh vien thanh cong');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SinhVien $sinhvien)
    {
        //tra ve trang edit sinhvien
        return view('edit', compact('sinhvien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SinhVien $sinhvien)
    {
        //update lay data update 
        $sinhvien->update($request->all());
        return redirect()->route('sinhvien.index')->with('Thongbao','Cap nhat sinh vien thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sinhvien $sinhvien)
    {
        //
        $sinhvien->delete();
        return redirect()->route('sinhvien.index')->with('Thongbao','Xoa sinh vien thanh cong');
    }
}
