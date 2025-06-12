<?php

namespace App\Http\Controllers\food_license;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodStorageInformations;
use App\Models\FoodStorageFormDetails;
use App\Models\FoodStorageFormFiles;
use App\Models\FoodStorageType;

class FoodLicense extends Controller
{
    public function FoodStorageLicenseFormPage()
    {
        $types = FoodStorageType::all();

        return view('admin.food_storage_license.form.page-form', compact('types'));
    }

    public function FoodStorageLicenseFormCreate(Request $request)
    {
        // dd($request);

        $FoodStorageInformations = FoodStorageInformations::create([
            'users_id' => auth()->id(),
            'form_status' => 1,
            'title_name' => $request->title_name,
            'salutation' => $request->salutation,
            'full_name' => $request->full_name,
            'age' => $request->age,
            'nationality' => $request->nationality,
            'id_card_number' => $request->id_card_number,
            'address' => $request->address,
            'village' => $request->village,
            'alley' => $request->alley,
            'road' => $request->road,
            'subdistrict' => $request->subdistrict,
            'district' => $request->district,
            'province' => $request->province,
            'telephone' => $request->telephone,
            'fax' => $request->fax,
        ]);

        $FoodStorageFormDetails = FoodStorageFormDetails::create([
            'informations_id' => $FoodStorageInformations->id,
            'confirm_option' => $request->confirm_option,
            'confirm_volume' => $request->confirm_volume,
            'confirm_number' => $request->confirm_number,
            'confirm_year' => $request->confirm_year,
            'confirm_expiration_date' => $request->confirm_expiration_date,
            'place_name' => $request->place_name,
            'shop_type' => $request->shop_type,
            'location' => $request->location,
            'details_village' => $request->details_village,
            'details_alley' => $request->details_alley,
            'details_road' => $request->details_road,
            'details_subdistrict' => $request->details_subdistrict,
            'details_district' => $request->details_district,
            'details_province' => $request->details_province,
            'details_telephone' => $request->details_telephone,
            'details_fax' => $request->details_fax,
            'business_area' => $request->business_area,
            'number_of_cooks' => $request->number_of_cooks,
            'number_of_food' => $request->number_of_food,
            'including_food_handlers' => $request->including_food_handlers,
            'number_of_trainees' => $request->number_of_trainees,
            'opening_hours' => $request->opening_hours,
            'opening_for_business_until' => $request->opening_for_business_until,
            'total_hours' => $request->total_hours,
            'document_option' => json_encode($request->document_option),
            'document_option_detail' => $request->document_option_detail,
        ]);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $optionKey => $file) {
                $documentType = str_replace('option', '', $optionKey);

                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('attachments', $filename, 'public');

                FoodStorageFormFiles::create([
                    'informations_id' => $FoodStorageInformations->id,
                    'file_path' => $path,
                    'file_type' => $file->getClientMimeType(),
                    'document_type' => $documentType,
                ]);
            }
        }

        return redirect()->back()->with('success', 'ฟอร์มถูกส่งเรียบร้อยแล้ว');
    }
}
