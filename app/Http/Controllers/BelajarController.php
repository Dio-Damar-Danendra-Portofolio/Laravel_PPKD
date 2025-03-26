<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BelajarController extends Controller
{
    public function index()
    {
        return view('belajar');
    }

    public function tambah()
    {
        $hasil = 0;
        return view('tambah', compact('hasil'));
    }

    public function kurang()
    {
        $hasil = 0;
        return view('kurang', compact('hasil'));
    }

    public function bagi()
    {
        $hasil = 0;
        return view('bagi', compact('hasil'));
    }
    public function banding()
    {
        $hasil = 0;
        return view('banding', compact('hasil'));
    }
    public function kali()
    {
        $hasil = 0;
        return view('kali', compact('hasil'));
    }

    public function modulo()
    {
        $hasil = 0;
        return view('modulo', compact('hasil'));
    }

    public function pangkat()
    {
        $hasil = 0;
        return view('pangkat', compact('hasil'));
    }

    public function logaritma10()
    {
        $hasil = 0;
        return view('logaritma-basis-10', compact('hasil'));
    }

    public function logaritma()
    {
        $hasil = 0;
        return view('logaritma-natural', compact('hasil'));
    }

    public function actionTambah(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $hasil = $angka1 + $angka2;

        return view('tambah', compact('hasil'));
    }
    public function actionKurang(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $hasil = $angka1 - $angka2;

        return view('kurang', compact('hasil'));
    }

    public function actionKali(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $hasil = $angka1 * $angka2;

        return view('kali', compact('hasil'));
    }

    public function actionBagi(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $hasil = $angka1 / $angka2;

        return view('bagi', compact('hasil'));
    }

    public function actionModulo(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $hasil = $angka1 % $angka2;

        return view('modulo', compact('hasil'));
    }

    public function actionPangkat(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $hasil = $angka1 ** $angka2;

        return view('pangkat', compact('hasil'));
    }

    public function actionLog10(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $hasil = log10($angka1);

        return view('logaritma-basis-10', compact('hasil'));
    }

    public function actionLog(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $hasil = log($angka1, $angka2);
        return view('logaritma-natural', compact('hasil'));
    }
}
