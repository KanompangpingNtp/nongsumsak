<?php

namespace App\Http\Controllers\food_collection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodCollectionFrom;
use App\Models\FoodCollectionFromDetails;
use App\Models\FoodCollectionFromLogs;
use App\Models\FoodCollectionFromNumberLogs;
use App\Models\FoodCollectionFromPaymentLogs;
use App\Models\FoodCollectionFromAppointmentLogs;
use App\Models\FoodCollectionFromExploreLogs;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminFoodCollection extends Controller
{
    public function FoodCollectionAdminShowData()
    {
        $forms = FoodCollectionFrom::whereHas('details', function ($query) {
            $query->whereIn('status', [1, 2]);
        })
            ->with(['details'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.food_collection.show-data', compact('forms'));
    }

    public function FoodCollectionAdminExportPDF($id)
    {
        $form = FoodCollectionFrom::with('details')->find($id);

        $pdf = Pdf::loadView(
            'admin.food_collection.form.pdf-form',
            compact('form')
        )->setPaper('A4', 'portrait');

        return $pdf->stream('pdf' . $form->id . '.pdf');
    }

    public function FoodCollectionAdminConfirm($id)
    {
        $form = FoodCollectionFrom::whereHas('details', function ($query) {
            $query->whereIn('status', [1, 2]);
        })
            ->with(['details'])
            ->find($id);

        return view('admin.food_collection.confirm', compact('form'));
    }

    public function FoodCollectionAdminConfirmSave(Request $request)
    {
        $input = $request->input();
        if ($input['id']) {
            $detail = FoodCollectionFromDetails::where('food_collection_id', $input['id'])->first();
            if ($input['result'] != 2) {
                $detail->status = 3;
                if ($detail->save()) {
                    return redirect()->route('FoodCollectionAdminShowData')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
                }
            } else {
                $detail->status = 2;
                if ($detail->save()) {
                    $insert = new FoodCollectionFromLogs();
                    $insert->food_collection_id = $input['id'];
                    $insert->detail = $input['detail'];
                    $insert->created_at = date('Y-m-d H:i:s');
                    $insert->updated_at = date('Y-m-d H:i:s');
                    if ($insert->save()) {
                        return redirect()->route('FoodCollectionAdminShowData')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
                    }
                }
            }
        }
        return redirect()->route('FoodCollectionAdminShowData')->with('error', 'ไม่สามารถบันทึกข้อมูลได้');
    }

    public function FoodCollectionAdminDetail($id)
    {
        $form = FoodCollectionFrom::with(['details'])
            ->find($id);

        return view('admin.food_collection.detail', compact('form'));
    }

    public function FoodCollectionAdminAppointment()
    {
        $forms = FoodCollectionFrom::whereHas('details', function ($query) {
            $query->whereIn('status', [3, 4, 5, 8]);
        })
            ->with(['details'])
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($forms as $key => $rs) {
            $rs->appointmentte = FoodCollectionFromAppointmentLogs::orderBy('id', 'desc')->first();
        }

        return view('admin.food_collection.appointment', compact('forms'));
    }

    public function FoodCollectionAdminCalendar($id)
    {
        $form = FoodCollectionFrom::with(['details'])->find($id);

        return view('admin.food_collection.calendar', compact('form'));
    }

    public function FoodCollectionAdminCalendarSave(Request $request)
    {
        $input = $request->input();
        if ($input['id']) {
            $detail = FoodCollectionFromDetails::where('food_collection_id', $input['id'])->first();
            $detail->status = 6;
            if ($detail->save()) {
                $insert = new FoodCollectionFromAppointmentLogs();
                $insert->food_collection_id = $input['id'];
                $insert->title = $input['title'];
                $insert->detail = $input['detail'];
                $insert->date_admin = $input['date_admin'];
                $insert->status = 1;
                $insert->created_at = date('Y-m-d H:i:s');
                $insert->updated_at = date('Y-m-d H:i:s');
                if ($insert->save()) {
                    return redirect()->route('FoodCollectionAdminAppointment')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
                }
            }
        }
        return redirect()->route('FoodCollectionAdminAppointment')->with('error', 'ไม่สามารถบันทึกข้อมูลได้');
    }

    public function FoodCollectionAdminExplore()
    {
        $forms = FoodCollectionFrom::whereHas('details', function ($query) {
            $query->whereIn('status', [6]);
        })
            ->with(['details'])
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($forms as $key => $rs) {
            $rs->appointmentte = FoodCollectionFromAppointmentLogs::orderBy('id', 'desc')->first();
        }

        return view('admin.food_collection.explore', compact('forms'));
    }

    public function FoodCollectionAdminChecklist($id)
    {
        $form = FoodCollectionFrom::with(['details'])->find($id);

        return view('admin.food_collection.checklist', compact('form'));
    }

    public function FoodCollectionAdminChecklistSave(Request $request)
    {
        $input = $request->input();

        if ($input['id']) {

            $detail = FoodCollectionFromDetails::where('food_collection_id', $input['id'])->first();

            $detail->status = 9;

            if ($detail->save()) {
                $insert = new FoodCollectionFromExploreLogs();
                $insert->food_collection_id = $input['id'];
                $insert->detail = $input['detail'];
                $insert->list_option = json_encode($request->input('list_option'));
                $insert->price = $input['price'];
                $insert->status = 1; // ผ่าน
                $insert->created_at = now();
                $insert->updated_at = now();

                if ($insert->save()) {
                    return redirect()->route('FoodCollectionAdminExplore')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
                }
            }
        }
    }

    public function FoodCollectionAdminPayment()
    {
        $forms = FoodCollectionFrom::whereHas('details', function ($query) {
            $query->whereIn('status', [7, 9]);
        })
            ->with(['details'])
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($forms as $key => $rs) {
            $rs->payment = FoodCollectionFromPaymentLogs::orderBy('id', 'desc')->first();
        }

        return view('admin.food_collection.payment', compact('forms'));
    }

    public function FoodCollectionAdminPaymentCheck($id)
    {
        $form = FoodCollectionFrom::with(['details'])->find($id);

        $file = FoodCollectionFromPaymentLogs::where('food_collection_id', $id)->first();

        return view('admin.food_collection.payment-check', compact('form', 'file'));
    }

    public function FoodCollectionAdminPaymentSave(Request $request)
    {
        $input = $request->all();

        if ($input['id']) {
            $detail = FoodCollectionFromDetails::where('food_collection_id', $input['id'])->first();
            $detail->status = 10; // การชำระเงินเสร็จสิ้นโดยแอดมิน

            if ($detail->save()) {
                // อัปโหลดไฟล์ผู้ใช้
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
                $createdAt = now();

                $insertPayment = new FoodCollectionFromPaymentLogs();
                $insertPayment->food_collection_id = $input['id'];
                $insertPayment->file = $filePath;
                $insertPayment->file_treasury = $treasuryPath;
                $insertPayment->receipt_book = $input['receipt_book'];
                $insertPayment->receipt_number = $input['receipt_number'];
                $insertPayment->status = 2;
                $insertPayment->created_at = $createdAt;
                $insertPayment->updated_at = $createdAt;
                $insertPayment->expiration_date = $createdAt->copy()->addYear()->subDay();

                if ($insertPayment->save()) {
                    $number = FoodCollectionFromNumberLogs::orderBy('id', 'desc')->first();
                    $run_book = $number ? $number->book + 1 : 1;
                    $run_number = $number ? $number->number + 1 : 1;

                    $insert = new FoodCollectionFromNumberLogs();
                    $insert->food_collection_id = $input['id'];
                    $insert->number = $run_number;
                    $insert->book = $run_book;
                    $insert->year = date('Y') + 543;
                    $insert->created_at = now();
                    $insert->updated_at = now();

                    if ($insert->save()) {
                        return redirect()->route('FoodCollectionAdminPayment')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
                    }
                }
            }
        }

        return redirect()->route('FoodCollectionAdminPayment')->with('error', 'ไม่สามารถบันทึกข้อมูลได้');
    }

    public function FoodCollectionAdminApprove()
    {
        $forms = FoodCollectionFrom::whereHas('details', function ($query) {
            $query->whereIn('status', [10, 11]);
        })
            ->with(['details'])
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($forms as $key => $rs) {
            $rs->payment = FoodCollectionFromPaymentLogs::orderBy('id', 'desc')->first();
        }

        return view('admin.food_collection.approve', compact('forms'));
    }

    public function AdminCertificateFoodCollectionPDF($id)
    {
        $form = FoodCollectionFrom::find($id);

        $file = FoodCollectionFromPaymentLogs::where('food_collection_id', $form->id)->first();

        $explore = FoodCollectionFromExploreLogs::where('food_collection_id', $form->id)->first();

        $info_number = FoodCollectionFromNumberLogs::where('food_collection_id', $form->id)->first();

        $pdf = Pdf::loadView(
            "admin.food_collection.pdf.food_collection",
            compact('form', 'file', 'explore', 'info_number')
        )->setPaper('A4', 'portrait');

        return $pdf->stream('pdf' . $form->id . '.pdf');
    }

    public function CertificateFoodCollectionCoppy(Request $request)
    {
        $id = $request->input('id');
        $original = FoodCollectionFrom::with('details')->findOrFail($id);

        if ($original->details) {
            $original->details->status = 11;
            $original->details->save();
        }

        $newInfo = $original->replicate();
        $newInfo->form_status = 1;
        $newInfo->refer_app_id = $original->id;
        $newInfo->created_at = now();
        $newInfo->updated_at = now();
        $newInfo->save();

        if ($original->details) {
            $newDetails = $original->details->replicate();
            $newDetails->food_collection_id = $newInfo->id;
            $newDetails->status = 1;
            $newDetails->created_at = now();
            $newDetails->updated_at = now();
            $newDetails->save();
        }

        return response()->json(['success' => true, 'message' => 'คัดลอกข้อมูลเรียบร้อยแล้ว']);
    }

    public function CertificateFoodCollectionExpire(Request $request)
    {
        $ninetyDaysFromNow = Carbon::now()->addDays(90);

        $month = $request->input('month');
        $year = $request->input('year');

        $startDate = null;
        $endDate = null;

        if ($month && $year) {
            $startDate = Carbon::create($year, $month, 1)->startOfMonth();
            $endDate = Carbon::create($year, $month, 1)->endOfMonth();
        }

        $availableMonths = range(1, 12);
        $availableYears = range(now()->year - 5, now()->year + 1);

        $forms = FoodCollectionFrom::whereHas('details', function ($query) {
            $query->whereIn('status', [10, 11]);
        })
            ->with(['details'])
            ->get()
            ->filter(function ($form) use ($ninetyDaysFromNow, $startDate, $endDate) {
                $latestPayment = FoodCollectionFromPaymentLogs::where('food_collection_id', $form->id)
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

        return view('admin.food_collection.expire-details', compact('forms', 'availableMonths', 'availableYears'));
    }
}
