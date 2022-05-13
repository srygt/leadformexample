<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeadForm;
use App\Http\Requests\LeadFormRequest;
use Yajra\DataTables\DataTables;

class LeadFormController extends Controller
{
    // Form arayüz sayfası web olarak ayarlanmıştır
    public function web(){
        $lead = LeadForm::get(); // LeadForm Modeli üzerinden tüm kayıtlar çağrılarak $lead değişkenine atanmıştır.
        return view('web',['lead'=>$lead]); // Web blade dosyası return edilerek içine $lead değişkeni array olarak dahil edilmiştir.
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Başvuru formundan gelen değerler aşağıdaki save metodu ile database insert edilmektedir.
    public function save(Request $request)
    {
        LeadForm::create($request->all());
        return redirect()->back()->with('message', 'Adding Successful');
    }

}
