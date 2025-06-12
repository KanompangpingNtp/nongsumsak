<?php

namespace App\Http\Controllers\private_market;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrivateMarketForm;
use Illuminate\Support\Facades\Auth;

class PrivateMarket extends Controller
{
    public function PrivateMarketForm()
    {
        return view("admin.private_market.form.page-form");
    }

    public function PrivateMarketFormCreate(Request $request)
    {
        $privateMarket = new PrivateMarketForm();

        $privateMarket->users_id = Auth::id();
        $privateMarket->form_status = 1;
        $privateMarket->title_name = $request->input('title_name');
        $privateMarket->full_name = $request->input('full_name');
        $privateMarket->age = $request->input('age');
        $privateMarket->nationality = $request->input('nationality');
        $privateMarket->id_card = $request->input('id_card');
        $privateMarket->house_number = $request->input('house_number');
        $privateMarket->road = $request->input('road');
        $privateMarket->village = $request->input('village');
        $privateMarket->sub_district = $request->input('sub_district');
        $privateMarket->district = $request->input('district');
        $privateMarket->province = $request->input('province');
        $privateMarket->type_option = $request->input('type_option');
        $privateMarket->submit_address_number = $request->input('submit_address_number');
        $privateMarket->submit_alley = $request->input('submit_alley');
        $privateMarket->submit_road = $request->input('submit_road');
        $privateMarket->submit_village = $request->input('submit_village');
        $privateMarket->submit_sub_district = $request->input('submit_sub_district');
        $privateMarket->submit_district = $request->input('submit_district');
        $privateMarket->submit_province = $request->input('submit_province');
        $privateMarket->submit_phone = $request->input('submit_phone');
        $privateMarket->fee = $request->input('fee');
        $privateMarket->receipt_number = $request->input('receipt_number');
        $privateMarket->receipt_date = $request->input('receipt_date');
        $privateMarket->status = 1;
        $privateMarket->save();

        return redirect()->back()->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }
}
