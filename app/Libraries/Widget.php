<?php namespace App\Libraries;
use App\Models\M_dataproduksi;

class Widget
{

    public function recentPost()
    {
        // $M_dataproduksi = new M_dataproduksi();
        // $master = $M_dataproduksi->findAll();
        // $data['produksidatas'] = $M_dataproduksi->orderBy('P_No', 'DESC')->findAll();
        
        return view('widget/recent_post');
    }
}