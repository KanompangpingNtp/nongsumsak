<?php

namespace App\Http\Controllers\food_collection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodCollectionFrom;
use App\Models\FoodCollectionFromDetails;
use App\Models\FoodCollectionFromFiles;
use App\Models\FoodCollectionFromReplies;
use Illuminate\Support\Facades\Auth;

class FoodCollection extends Controller
{
    public function FoodCollectionFrom()
    {
        return view('admin.food_collection.form.page-form');
    }

    public function FoodCollectionFromCreate(Request $request)
    {
        $mainForm = new FoodCollectionFrom;
        $mainForm->users_id = Auth::id();
        $mainForm->form_status = 1;
        $mainForm->title_name = $request->input('title_name');
        $mainForm->full_name = $request->input('full_name');
        $mainForm->age = $request->input('age');
        $mainForm->nationality = $request->input('nationality');
        $mainForm->registration_number = $request->input('id_card_input');
        $mainForm->address = $request->input('address');
        $mainForm->village = $request->input('village');
        $mainForm->alley = $request->input('alley');
        $mainForm->road = $request->input('road');
        $mainForm->subdistrict = $request->input('subdistrict');
        $mainForm->district = $request->input('district');
        $mainForm->province = $request->input('province');
        $mainForm->telephone = $request->input('telephone');
        $mainForm->save();

        $details = new FoodCollectionFromDetails;
        $details->food_collection_id = $mainForm->id;
        $details->status = 1;
        $details->operation_area = $request->input('operation_area');
        $details->annual_fee = $request->input('annual_fee');
        $details->receipt_number = $request->input('receipt_number');
        $details->receipt_date = $request->input('receipt_date');
        $details->business_name = $request->input('business_name');
        $details->worker_count = $request->input('worker_count');
        $details->address_no = $request->input('business_address_no');
        $details->village_no = $request->input('business_village_no');
        $details->subdistrict = $request->input('business_subdistrict');
        $details->district = $request->input('business_district');
        $details->province = $request->input('business_province');
        $details->telephone = $request->input('business_telephone');
        $details->fax = $request->input('business_fax');
        $details->save();


        return redirect()->back()->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }
}
