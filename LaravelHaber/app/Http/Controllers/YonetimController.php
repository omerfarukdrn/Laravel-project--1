<?php

namespace App\Http\Controllers;

use App\Models\Haberler;
use Illuminate\Http\Request;
use App\Models\Yazarlar;

class YonetimController extends Controller
{
    public function index()
    {
        return view("include.home");
    }

    public function welcome()
    {
        $haberler=Haberler::all();
        return view("welcome",compact('haberler'));
    }

    public function yazarEkle()
    {
        return view("include.yazar-ekle");
    }

    public function YazarEklePost(Request $request)
    {
        $request->validate([
            'adsoyad'=>'required',
            'mail'=>'required|email:rfc,dns'
        ]);
        Yazarlar::create([
           'adsoyad'=>$request->adsoyad,
           'mail'=>$request->mail,
           'telefon'=>$request->telefon, 
        ]);
        return redirect()->route('yazar-liste')->with('success','Yazar bilgisi başarıyla eklendi');
    }

    public function yazarListe()
    {
        $yazarlar=Yazarlar::all();
        return view("include.yazar-liste",compact('yazarlar'));
    }
    
    public function yazarDuzenle($id)
    {
        $yazarBilgisi=Yazarlar::whereId($id)->first();
        if($yazarBilgisi)
        {
            return view("include.yazar-duzenle",compact('yazarBilgisi'));
        }
        else
        {
            return redirect()->route("yazar-liste");
        }
    }
    public function YazarDuzenlePost(Request $request,$id)
    {
        $request->validate([
            'adsoyad'=>'required',
            'mail'=>'required|email:rfc,dns'
        ]);
        Yazarlar::whereId($id)->update([
           'adsoyad'=>$request->adsoyad,
           'mail'=>$request->mail,
           'telefon'=>$request->telefon, 
        ]);
        return redirect()->route('yazar-liste', $id)->with('success','Yazar bilgisi başarıyla güncellendi');
    }

    public function yazarSil($id)
    {
        $yazarBilgisi=Yazarlar::whereId($id)->first();
        if($yazarBilgisi)
        {
            Yazarlar::whereId($id)->delete();
        }
        return redirect()->route('yazar-liste')->with('success','Yazar bilgisi başarıyla kaldırılmıştır');
    }
    public function haberEkle()
    {
        return view("include.haber-ekle");
    }

    public function HaberEklePost(Request $request)
    {
        $request->validate([
            'baslik'=>'required',
            'aciklama'=>'required',
        ]);
        Haberler::create([
           'baslik'=>$request->baslik,
           'aciklama'=>$request->aciklama,
           'kategori'=>$request->kategori, 
        ]);
        return redirect()->route('haber-liste')->with('success','Haber bilgisi başarıyla eklendi');
    }

    public function haberListe()
    {
        $haberler=Haberler::all();
        return view("include.haber-liste",compact('haberler'));
    }

    public function haberDuzenle($id)
    {
        $haberBilgisi=Haberler::whereId($id)->first();
        if($haberBilgisi)
        {
            return view("include.haber-duzenle",compact('haberBilgisi'));
        }
        else
        {
            return redirect()->route("haber-liste");
        }
    }
    public function HaberDuzenlePost(Request $request,$id)
    {
        $request->validate([
            'baslik'=>'required',
            'aciklama'=>'required',
        ]);
        Haberler::whereId($id)->update([
           'baslik'=>$request->baslik,
           'aciklama'=>$request->aciklama,
           'kategori'=>$request->kategori, 
        ]);
        return redirect()->route('haber-liste', $id)->with('success','Haber bilgisi başarıyla güncellendi');
    }

    public function haberSil($id)
    {
        $haberBilgisi=Haberler::whereId($id)->first();
        if($haberBilgisi)
        {
            Haberler::whereId($id)->delete();
        }
        return redirect()->route('haber-liste')->with('success','Haber bilgisi başarıyla kaldırılmıştır');
    }
}


