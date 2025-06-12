<?php

namespace App\Http\Controllers\food_license;

use App\Http\Controllers\Controller;
use App\Models\FoodStorageAppointmentLogs;
use App\Models\FoodStorageExploreLogs;
use App\Models\FoodStorageFormDetails;
use Illuminate\Http\Request;
use App\Models\FoodStorageInformations;
use App\Models\FoodStorageFormReplies;
use App\Models\FoodStorageLogs;
use App\Models\FoodStorageNumberLogs;
use App\Models\FoodStoragePaymentLogs;
use App\Models\FoodStorageType;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminFoodLicense extends Controller
{
     public function FoodStorageLicenseAdminShowData()
    {
        $forms = FoodStorageInformations::whereHas('details', function ($query) {
            $query->whereIn('status', [1, 2]);
        })
            ->with(['user', 'details', 'files', 'replies'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.food_storage_license.show-data', compact('forms'));
    }

    public function FoodStorageLicenseAdminExportPDF($id)
    {
        $form = FoodStorageInformations::with('details')->find($id);

        $document_option = $form->details->first()->document_option ?? [];
        if (is_string($document_option)) {
            $document_option = json_decode($document_option, true);
        }

        $pdf = Pdf::loadView(
            'admin.food_storage_license.form.pdf-form',
            compact('form', 'document_option')
        )->setPaper('A4', 'portrait');

        return $pdf->stream('pdf' . $form->id . '.pdf');
    }

    public function FoodStorageLicenseAdminReply(Request $request, $formId)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        FoodStorageFormReplies::create([
            'informations_id' => $formId,
            'users_id' => auth()->id(),
            'reply_text' => $request->message,
            'reply_date' => now()->toDateString(),
        ]);

        return redirect()->back()->with('success', 'ตอบกลับสำเร็จแล้ว!');
    }

    public function FoodStorageLicenseUpdateStatus($id)
    {
        $form = FoodStorageInformations::findOrFail($id);

        $form->form_status = 2;
        $form->admin_name_verifier = Auth::user()->name;
        $form->save();

        return redirect()->back()->with('success', 'คุณได้กดรับแบบฟอร์มเรียบร้อยแล้ว');
    }

    public function FoodStorageLicenseAdminDetail($id)
    {
        $form = FoodStorageInformations::with(['user', 'details', 'files', 'replies'])
            ->find($id);

        if ($form['details']->document_option != 'null') {
            $document_option = $form['details']->document_option;
            if (is_string($document_option)) {
                $form['details']->document_option = json_decode($document_option, true);
            }
        } else {
            $form['details']->document_option = [];
        }
        $types = FoodStorageType::all();

        return view('admin.food_storage_license.detail', compact('form', 'types'));
    }

    public function FoodStorageLicenseAdminConfirm($id)
    {
        $form = FoodStorageInformations::whereHas('details', function ($query) {
            $query->whereIn('status', [1, 2]);
        })
            ->with(['user', 'details', 'files', 'replies'])
            ->find($id);

        if ($form['details']->document_option != 'null') {
            $document_option = $form['details']->document_option;
            if (is_string($document_option)) {
                $form['details']->document_option = json_decode($document_option, true);
            }
        } else {
            $form['details']->document_option = [];
        }
        $types = FoodStorageType::all();

        return view('admin.food_storage_license.confirm', compact('form', 'types'));
    }

    public function FoodStorageLicenseAdminConfirmSave(Request $request)
    {
        $input = $request->input();
        if ($input['id']) {
            $detail = FoodStorageFormDetails::where('informations_id', $input['id'])->first();
            if ($input['result'] != 2) {
                $detail->status = 3;
                if ($detail->save()) {
                    return redirect()->route('FoodStorageLicenseAdminShowData')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
                }
            } else {
                $detail->status = 2;
                if ($detail->save()) {
                    $insert = new FoodStorageLogs();
                    $insert->informations_id = $input['id'];
                    $insert->detail = $input['detail'];
                    $insert->created_at = date('Y-m-d H:i:s');
                    $insert->updated_at = date('Y-m-d H:i:s');
                    if ($insert->save()) {
                        return redirect()->route('FoodStorageLicenseAdminShowData')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
                    }
                }
            }
        }
        return redirect()->route('FoodStorageLicenseAdminShowData')->with('error', 'ไม่สามารถบันทึกข้อมูลได้');
    }

    public function FoodStorageLicenseAdminAppointment()
    {
        $forms = FoodStorageInformations::whereHas('details', function ($query) {
            $query->whereIn('status', [3, 4, 5, 8]);
        })
            ->with(['user', 'details', 'files', 'replies'])
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($forms as $key => $rs) {
            $rs->appointmentte = FoodStorageAppointmentLogs::orderBy('id', 'desc')->first();
        }

        return view('admin.food_storage_license.appointment', compact('forms'));
    }

    public function FoodStorageLicenseAdminCalendar($id)
    {
        $form = FoodStorageInformations::with(['user', 'details', 'files', 'replies'])->find($id);

        return view('admin.food_storage_license.calendar', compact('form'));
    }

    public function FoodStorageLicenseAdminCalendarSave(Request $request)
    {
        $input = $request->input();
        if ($input['id']) {
            $detail = FoodStorageFormDetails::where('informations_id', $input['id'])->first();
            $detail->status = 6;
            if ($detail->save()) {
                $insert = new FoodStorageAppointmentLogs();
                $insert->informations_id = $input['id'];
                $insert->title = $input['title'];
                $insert->detail = $input['detail'];
                $insert->date_admin = $input['date_admin'];
                $insert->status = 1;
                $insert->created_at = date('Y-m-d H:i:s');
                $insert->updated_at = date('Y-m-d H:i:s');
                if ($insert->save()) {
                    return redirect()->route('FoodStorageLicenseAdminAppointment')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
                }
            }
        }
        return redirect()->route('FoodStorageLicenseAdminAppointment')->with('error', 'ไม่สามารถบันทึกข้อมูลได้');
    }

    public function FoodStorageLicenseAdminExplore()
    {
        $forms = FoodStorageInformations::whereHas('details', function ($query) {
            $query->whereIn('status', [6]);
        })
            ->with(['user', 'details', 'files', 'replies'])
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($forms as $key => $rs) {
            $rs->appointmentte = FoodStorageAppointmentLogs::orderBy('id', 'desc')->first();
        }

        return view('admin.food_storage_license.explore', compact('forms'));
    }

    public function FoodStorageLicenseAdminChecklist($id)
    {
        $form = FoodStorageInformations::with(['user', 'details', 'files', 'replies'])->find($id);

        return view('admin.food_storage_license.checklist', compact('form'));
    }

    public function FoodStorageLicenseAdminChecklistSave(Request $request)
    {
        $input = $request->input();

        if ($input['id']) {

            $detail = FoodStorageFormDetails::where('informations_id', $input['id'])->first();

            $detail->status = 9;

            if ($detail->save()) {
                $insert = new FoodStorageExploreLogs();
                $insert->informations_id = $input['id'];
                $insert->detail = $input['detail'];
                $insert->list_option = json_encode($request->input('list_option'));
                $insert->price = $input['price'];
                $insert->status = 1; // ผ่าน
                $insert->created_at = now();
                $insert->updated_at = now();

                if ($insert->save()) {
                    return redirect()->route('FoodStorageLicenseAdminExplore')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
                }
            }
        }

        return redirect()->route('FoodStorageLicenseAdminExplore')->with('error', 'ไม่สามารถบันทึกข้อมูลได้');
    }


    public function FoodStorageLicenseAdminPayment()
    {
        $forms = FoodStorageInformations::whereHas('details', function ($query) {
            $query->whereIn('status', [7, 9]);
        })
            ->with(['user', 'details', 'files', 'replies'])
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($forms as $key => $rs) {
            $rs->payment = FoodStoragePaymentLogs::orderBy('id', 'desc')->first();
        }

        return view('admin.food_storage_license.payment', compact('forms'));
    }

    public function FoodStorageLicenseAdminPaymentCheck($id)
    {
        $form = FoodStorageInformations::with(['user', 'details', 'files', 'replies'])->find($id);

        $file = FoodStoragePaymentLogs::where('informations_id', $id)->first();
        return view('admin.food_storage_license.payment-check', compact('form', 'file'));
    }

    public function FoodStorageLicenseAdminPaymentSave(Request $request)
    {
        $input = $request->all();

        if ($input['id']) {
            $detail = FoodStorageFormDetails::where('informations_id', $input['id'])->first();
            $detail->status = 10; // การชำระเงินเสร็จสิ้นโดยแอดมิน

            if ($detail->save()) {
                // อัปโหลดไฟล์ผู้ใช้ (ถ้ามี)
                $filePath = '';
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('payment', $filename, 'public');
                }

                // อัปโหลดไฟล์ใบเสร็จกองคลัง
                $treasuryPath = '';
                if ($request->hasFile('file_treasury')) {
                    $file2 = $request->file('file_treasury');
                    $filename2 = time() . '_treasury_' . $file2->getClientOriginalName();
                    $treasuryPath = $file2->storeAs('payment', $filename2, 'public');
                }

                // สร้างข้อมูลการชำระเงินใหม่
                $insertPayment = new FoodStoragePaymentLogs();
                $insertPayment->informations_id = $input['id'];
                $insertPayment->file = $filePath;
                $insertPayment->file_treasury = $treasuryPath;
                $insertPayment->receipt_book = $input['receipt_book'];
                $insertPayment->receipt_number = $input['receipt_number'];
                $insertPayment->status = 2;
                $insertPayment->created_at = now();
                $insertPayment->updated_at = now();
                $createdAt = $insertPayment->created_at ?? now();
                $insertPayment->expiration_date = $createdAt->addYear()->subDay();

                if ($insertPayment->save()) {
                    // เลขหนังสือ
                    $number = FoodStorageNumberLogs::where('type', $detail['confirm_option'])->orderBy('id', 'desc')->first();
                    $run_book = $number ? $number->book + 1 : 1;
                    $run_number = $number ? $number->number + 1 : 1;

                    $numberLog = new FoodStorageNumberLogs();
                    $numberLog->informations_id = $input['id'];
                    $numberLog->number = $run_number;
                    $numberLog->book = $run_book;
                    $numberLog->year = date('Y') + 543;
                    $numberLog->type = $detail['confirm_option'];
                    $numberLog->created_at = now();
                    $numberLog->updated_at = now();

                    if ($numberLog->save()) {
                        return redirect()->route('FoodStorageLicenseAdminPayment')->with('success', 'บันทึกเรียบร้อยแล้ว');
                    }
                }
            }
        }

        return redirect()->route('FoodStorageLicenseAdminPayment')->with('error', 'ไม่สามารถบันทึกข้อมูลได้');
    }

    public function FoodStorageLicenseAdminApprove()
    {
        $forms = FoodStorageInformations::whereHas('details', function ($query) {
            $query->whereIn('status', [10, 11]);
        })
            ->with(['user', 'details', 'files', 'replies'])
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($forms as $key => $rs) {
            $rs->payment = FoodStoragePaymentLogs::orderBy('id', 'desc')->first();
        }

        return view('admin.food_storage_license.approve', compact('forms'));
    }

    public function AdminCertificateFoodStorageLicensePDF($id)
    {
        $form = FoodStorageInformations::find($id);

        $explore = FoodStorageExploreLogs::where('informations_id', $form->id)->first();

        $file = FoodStoragePaymentLogs::where('informations_id', $form->id)->first();

        $info_number = FoodStorageNumberLogs::where('informations_id', $form->id)->first();

        if ($form['details']->confirm_option == 1) {
            $views = "admin.food_storage_license.pdf.food_storage_license";
        } else {
            $views = "admin.food_storage_license.pdf.food_sales";
        }
        $pdf = Pdf::loadView(
            $views,
            compact('form', 'file', 'info_number', 'explore')
        )->setPaper('A4', 'portrait');

        return $pdf->stream('pdf' . $form->id . '.pdf');
    }

    public function FoodStorageLicenseCoppy(Request $request)
    {
        $id = $request->input('id');
        $original = FoodStorageInformations::with('details')->findOrFail($id);

        if ($original->details) {
            $original->details->status = 11;
            $original->details->save();
        }

        $newInfo = $original->replicate();
        $newInfo->form_status = 1;
        $newInfo->refer_information_id = $original->id;
        $newInfo->created_at = now();
        $newInfo->updated_at = now();
        $newInfo->save();

        if ($original->details) {
            $newDetails = $original->details->replicate();
            $newDetails->informations_id = $newInfo->id;
            $newDetails->status = 1;
            $newDetails->created_at = now();
            $newDetails->updated_at = now();
            $newDetails->save();
        }

        return response()->json(['success' => true, 'message' => 'คัดลอกข้อมูลเรียบร้อยแล้ว']);
    }

    public function FoodStorageLicenseExpire(Request $request)
    {
        $ninetyDaysFromNow = Carbon::now()->addDays(90);

        // รับค่าเดือนและปีจากฟอร์ม
        $month = $request->input('month');
        $year = $request->input('year');

        $startDate = null;
        $endDate = null;

        if ($month && $year) {
            // กำหนดช่วงเวลาตามเดือนและปีที่เลือก
            $startDate = Carbon::create($year, $month, 1)->startOfMonth();
            $endDate = Carbon::create($year, $month, 1)->endOfMonth();
        }

        // ตรวจสอบว่ามีข้อมูลในเดือนและปีที่เลือกหรือไม่
        $availableMonths = range(1, 12); // เดือนทั้งหมด
        $availableYears = range(now()->year - 5, now()->year + 1); // ปีทั้งหมด

        // กรองข้อมูลที่ตรงกับเดือนและปีที่เลือก
        $forms = FoodStorageInformations::whereHas('details', function ($query) {
            $query->whereIn('status', [10, 11]);
        })
            ->with(['user', 'details', 'files', 'replies'])
            ->get()
            ->filter(function ($form) use ($ninetyDaysFromNow, $startDate, $endDate) {
                $latestPayment = FoodStoragePaymentLogs::where('informations_id', $form->id)
                    ->orderBy('id', 'desc')
                    ->first();

                if ($latestPayment && $latestPayment->expiration_date) {
                    $form->payment = $latestPayment;

                    $isWithin90Days = Carbon::parse($latestPayment->expiration_date)->lessThanOrEqualTo($ninetyDaysFromNow);

                    if ($startDate && $endDate) {
                        return Carbon::parse($latestPayment->created_at)->between($startDate, $endDate) && $isWithin90Days;
                    }

                    return $isWithin90Days;
                }

                return false;
            });

        // ตรวจสอบว่าในแต่ละเดือนและปีมีข้อมูลหรือไม่
        $availableMonths = collect($availableMonths)->filter(function ($m) use ($forms) {
            return $forms->filter(function ($form) use ($m) {
                return Carbon::parse($form->payment->created_at)->month == $m;
            })->isNotEmpty();
        });

        $availableYears = collect($availableYears)->filter(function ($y) use ($forms) {
            return $forms->filter(function ($form) use ($y) {
                return Carbon::parse($form->payment->created_at)->year == $y;
            })->isNotEmpty();
        });

        return view('admin.food_storage_license.expire-details', compact('forms', 'availableMonths', 'availableYears'));
    }
}
