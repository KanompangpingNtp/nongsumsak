<?php

namespace App\Http\Controllers\food_sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodSalesFrom;
use App\Models\FoodSalesFromDetails;
use App\Models\FoodSalesFromReplies;
use App\Models\FoodSalesFromLogs;
use App\Models\FoodSalesFromNumberLogs;
use App\Models\FoodSalesFromPaymentLogs;
use App\Models\FoodSalesFromAppointmentLogs;
use App\Models\FoodSalesFromExploreLogs;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminFoodSales extends Controller
{
     public function FoodSalesAdminShowData ()
    {
        $forms = FoodSalesFrom::whereHas('details', function ($query) {
            $query->whereIn('status', [1, 2]);
        })
            ->with(['details'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.food_sales.show-data', compact('forms'));
    }

    public function FoodSalesAdminExportPDF($id)
    {
        $form = FoodSalesFrom::with('details')->find($id);

        $pdf = Pdf::loadView(
            'admin.food_sales.form.pdf-form',
            compact('form')
        )->setPaper('A4', 'portrait');

        return $pdf->stream('pdf' . $form->id . '.pdf');
    }

    public function FoodSalesAdminConfirm($id)
    {
        $form = FoodSalesFrom::whereHas('details', function ($query) {
            $query->whereIn('status', [1, 2]);
        })
            ->with(['details'])
            ->find($id);

        return view('admin.food_sales.confirm', compact('form'));
    }

    public function FoodSalesAdminConfirmSave(Request $request)
    {
        $input = $request->input();
        if ($input['id']) {
            $detail = FoodSalesFromDetails::where('food_sales_id', $input['id'])->first();
            $detail->food_type = $input['food_type'];
            if ($input['result'] != 2) {
                $detail->status = 3;
                if ($detail->save()) {
                    return redirect()->route('FoodSalesAdminShowData')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
                }
            } else {
                $detail->status = 2;
                if ($detail->save()) {
                    $insert = new FoodSalesFromLogs();
                    $insert->food_sales_id = $input['id'];
                    $insert->detail = $input['detail'];
                    $insert->created_at = date('Y-m-d H:i:s');
                    $insert->updated_at = date('Y-m-d H:i:s');
                    if ($insert->save()) {
                        return redirect()->route('FoodSalesAdminShowData')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
                    }
                }
            }
        }
        return redirect()->route('FoodSalesAdminShowData')->with('error', 'ไม่สามารถบันทึกข้อมูลได้');
    }

    public function FoodSalesAdminDetail($id)
    {
        $form = FoodSalesFrom::with(['details'])
            ->find($id);

        return view('admin.food_sales.detail', compact('form'));
    }

    public function FoodSalesAdminAppointment()
    {
        $forms = FoodSalesFrom::whereHas('details', function ($query) {
            $query->whereIn('status', [3, 4, 5, 8]);
        })
            ->with(['details'])
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($forms as $key => $rs) {
            $rs->appointmentte = FoodSalesFromAppointmentLogs::orderBy('id', 'desc')->first();
        }

        return view('admin.food_sales.appointment', compact('forms'));
    }

    public function FoodSalesAdminCalendar($id)
    {
        $form = FoodSalesFrom::with(['details'])->find($id);

        return view('admin.food_sales.calendar', compact('form'));
    }

    public function FoodSalesAdminCalendarSave(Request $request)
    {
        $input = $request->input();
        if ($input['id']) {
            $detail = FoodSalesFromDetails::where('food_sales_id', $input['id'])->first();
            $detail->status = 6;
            if ($detail->save()) {
                $insert = new FoodSalesFromAppointmentLogs();
                $insert->food_sales_id = $input['id'];
                $insert->title = $input['title'];
                $insert->detail = $input['detail'];
                $insert->date_admin = $input['date_admin'];
                $insert->status = 1;
                $insert->created_at = date('Y-m-d H:i:s');
                $insert->updated_at = date('Y-m-d H:i:s');
                if ($insert->save()) {
                    return redirect()->route('FoodSalesAdminAppointment')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
                }
            }
        }
        return redirect()->route('FoodSalesAdminAppointment')->with('error', 'ไม่สามารถบันทึกข้อมูลได้');
    }

    public function FoodSalesAdminExplore()
    {
        $forms = FoodSalesFrom::whereHas('details', function ($query) {
            $query->whereIn('status', [6]);
        })
            ->with(['details'])
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($forms as $key => $rs) {
            $rs->appointmentte = FoodSalesFromAppointmentLogs::orderBy('id', 'desc')->first();
        }

        return view('admin.food_sales.explore', compact('forms'));
    }

    public function FoodSalesAdminChecklist($id)
    {
        $form = FoodSalesFrom::with(['details'])->find($id);

        return view('admin.food_sales.checklist', compact('form'));
    }

    public function FoodSalesAdminChecklistSave(Request $request)
    {
        $input = $request->input();

        if ($input['id']) {

            $detail = FoodSalesFromDetails::where('food_sales_id', $input['id'])->first();

            $detail->status = 9;

            if ($detail->save()) {
                $insert = new FoodSalesFromExploreLogs();
                $insert->food_sales_id = $input['id'];
                $insert->detail = $input['detail'];
                $insert->list_option = json_encode($request->input('list_option'));
                $insert->price = $input['price'];
                $insert->status = 1; // ผ่าน
                $insert->created_at = now();
                $insert->updated_at = now();

                if ($insert->save()) {
                    return redirect()->route('FoodSalesAdminExplore')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
                }
            }
        }
    }

    public function FoodSalesAdminPayment()
    {
        $forms = FoodSalesFrom::whereHas('details', function ($query) {
            $query->whereIn('status', [7, 9]);
        })
            ->with(['details'])
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($forms as $key => $rs) {
            $rs->payment = FoodSalesFromPaymentLogs::orderBy('id', 'desc')->first();
        }

        return view('admin.food_sales.payment', compact('forms'));
    }

    public function FoodSalesAdminPaymentCheck($id)
    {
        $form = FoodSalesFrom::with(['details'])->find($id);

        $file = FoodSalesFromPaymentLogs::where('food_sales_id', $id)->first();

        return view('admin.food_sales.payment-check', compact('form', 'file'));
    }

    public function FoodSalesAdminPaymentSave(Request $request)
    {
        $input = $request->all();

        if ($input['id']) {
            $detail = FoodSalesFromDetails::where('food_sales_id', $input['id'])->first();
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

                $insertPayment = new FoodSalesFromPaymentLogs();
                $insertPayment->food_sales_id = $input['id'];
                $insertPayment->file = $filePath;
                $insertPayment->file_treasury = $treasuryPath;
                $insertPayment->receipt_book = $input['receipt_book'];
                $insertPayment->receipt_number = $input['receipt_number'];
                $insertPayment->status = 2;
                $insertPayment->created_at = $createdAt;
                $insertPayment->updated_at = $createdAt;
                $insertPayment->expiration_date = $createdAt->copy()->addYear()->subDay();

                if ($insertPayment->save()) {
                    $number = FoodSalesFromNumberLogs::orderBy('id', 'desc')->first();
                    $run_book = $number ? $number->book + 1 : 1;
                    $run_number = $number ? $number->number + 1 : 1;

                    $insert = new FoodSalesFromNumberLogs();
                    $insert->food_sales_id = $input['id'];
                    $insert->number = $run_number;
                    $insert->book = $run_book;
                    $insert->year = date('Y') + 543;
                    $insert->created_at = now();
                    $insert->updated_at = now();

                    if ($insert->save()) {
                        return redirect()->route('FoodSalesAdminPayment')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
                    }
                }
            }
        }

        return redirect()->route('FoodSalesAdminPayment')->with('error', 'ไม่สามารถบันทึกข้อมูลได้');
    }

    public function FoodSalesAdminApprove()
    {
        $forms = FoodSalesFrom::whereHas('details', function ($query) {
            $query->whereIn('status', [10, 11]);
        })
            ->with(['details'])
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($forms as $key => $rs) {
            $rs->payment = FoodSalesFromPaymentLogs::orderBy('id', 'desc')->first();
        }

        return view('admin.food_sales.approve', compact('forms'));
    }

    public function AdminCertificateFoodSalesPDF($id)
    {
        $form = FoodSalesFrom::find($id);

        $file = FoodSalesFromPaymentLogs::where('food_sales_id', $form->id)->first();

        $explore = FoodSalesFromExploreLogs::where('food_sales_id', $form->id)->first();

        $info_number = FoodSalesFromNumberLogs::where('food_sales_id', $form->id)->first();

        $pdf = Pdf::loadView(
            "admin.food_sales.pdf.food_sales",
            compact('form', 'file', 'explore', 'info_number')
        )->setPaper('A4', 'portrait');

        return $pdf->stream('pdf' . $form->id . '.pdf');
    }

    public function CertificateFoodSalesCoppy(Request $request)
    {
        $id = $request->input('id');
        $original = FoodSalesFrom::with('details')->findOrFail($id);

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
            $newDetails->food_sales_id = $newInfo->id;
            $newDetails->status = 1;
            $newDetails->created_at = now();
            $newDetails->updated_at = now();
            $newDetails->save();
        }

        return response()->json(['success' => true, 'message' => 'คัดลอกข้อมูลเรียบร้อยแล้ว']);
    }

    public function CertificateFoodSalesExpire(Request $request)
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

        $forms = FoodSalesFrom::whereHas('details', function ($query) {
            $query->whereIn('status', [10, 11]);
        })
            ->with(['details'])
            ->get()
            ->filter(function ($form) use ($ninetyDaysFromNow, $startDate, $endDate) {
                $latestPayment = FoodSalesFromPaymentLogs::where('food_sales_id', $form->id)
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

        return view('admin.food_sales.expire-details', compact('forms', 'availableMonths', 'availableYears'));
    }
}
