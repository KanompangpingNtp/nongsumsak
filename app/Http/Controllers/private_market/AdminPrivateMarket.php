<?php

namespace App\Http\Controllers\private_market;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrivateMarketForm;
use App\Models\PrivateMarketFormLogs;
use App\Models\PrivateMarketFormAppointmentLogs;
use App\Models\PrivateMarketFormPaymentLogs;
use App\Models\PrivateMarketFormExploreLogs;
use App\Models\PrivateMarketFormNumberLogs;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class AdminPrivateMarket extends Controller
{
    public function PrivateMarketAdminShowData()
    {
        $forms = PrivateMarketForm::with([])
            ->whereIn('status', [1, 2])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.private_market.show-data', compact('forms'));
    }

    public function PrivateMarketAdminExportPDF($id)
    {
        $form = PrivateMarketForm::find($id);

        $pdf = Pdf::loadView(
            'users.private_market.pdf-form',
            compact('form')
        )->setPaper('A4', 'portrait');

        return $pdf->stream('private_market_' . $form->id . '.pdf');
    }

    public function PrivateMarketAdminConfirm($id)
    {
        $form = PrivateMarketForm::whereIn('status', [1, 2])
            ->with([])
            ->findOrFail($id);

        return view('admin.private_market.confirm', compact('form'));
    }

    public function PrivateMarketAdminConfirmSave(Request $request)
    {
        $input = $request->input();

        if ($input['id']) {
            $form = PrivateMarketForm::find($input['id']);
            if (!$form) {
                return redirect()->route('PrivateMarketAdminShowData')->with('error', 'ไม่พบข้อมูล');
            }

            // $form->form_status = $input['type_request'] ?? null;
            $form->status = ($input['result'] != 2) ? 3 : 2;

            if ($form->save()) {
                if ($form->status == 2 && !empty($input['detail'])) {
                    $log = new PrivateMarketFormLogs();
                    $log->market_id = $form->id;
                    $log->detail = $input['detail'];
                    $log->created_at = now();
                    $log->updated_at = now();
                    $log->save();
                }

                return redirect()->route('PrivateMarketAdminShowData')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
            }
        }

        return redirect()->route('PrivateMarketAdminShowData')->with('error', 'ไม่สามารถบันทึกข้อมูลได้');
    }

    public function PrivateMarketAdminDetail($id)
    {
        $form = PrivateMarketForm::with([])
            ->find($id);

        return view('admin.private_market.detail', compact('form'));
    }

    public function PrivateMarketAdminAppointment()
    {
        $forms = PrivateMarketForm::whereIn('status', [3, 4, 5, 8])
            ->with([])
            ->orderBy('created_at', 'desc')
            ->get();

        foreach ($forms as $key => $form) {
            $form->appointmentte = PrivateMarketFormAppointmentLogs::where('market_id', $form->id)
                ->orderBy('id', 'desc')
                ->first();
        }

        return view('admin.private_market.appointment', compact('forms'));
    }

    public function PrivateMarketAdminCalendar($id)
    {
        $form = PrivateMarketForm::with([])->find($id);

        return view('admin.private_market.calendar', compact('form'));
    }

    public function PrivateMarketAdminCalendarSave(Request $request)
    {
        $input = $request->input();

        if ($input['id']) {
            $detail = PrivateMarketForm::find($input['id']);
            $detail->status = 6;

            if ($detail->save()) {
                $insert = new PrivateMarketFormAppointmentLogs();
                $insert->market_id = $input['id'];
                $insert->title = $input['title'];
                $insert->detail = $input['detail'];
                $insert->date_admin = $input['date_admin'];
                $insert->status = 1;
                $insert->created_at = now();
                $insert->updated_at = now();

                if ($insert->save()) {
                    return redirect()->route('PrivateMarketAdminAppointment')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
                }
            }
        }

        return redirect()->route('PrivateMarketAdminAppointment')->with('error', 'ไม่สามารถบันทึกข้อมูลได้');
    }

    public function PrivateMarketAdminExplore()
    {
        $forms = PrivateMarketForm::where('status', 6)
            ->with([])
            ->orderBy('created_at', 'desc')
            ->get();

        foreach ($forms as $key => $rs) {
            $rs->appointmentte = PrivateMarketFormAppointmentLogs::where('market_id', $rs->id)
                ->orderBy('id', 'desc')
                ->first();
        }

        return view('admin.private_market.explore', compact('forms'));
    }

    public function PrivateMarketAdminChecklist($id)
    {
        $form = PrivateMarketForm::with([])->find($id);

        return view('admin.private_market.checklist', compact('form'));
    }

    public function PrivateMarketAdminChecklistSave(Request $request)
    {
        $input = $request->input();

        $market = PrivateMarketForm::find($input['id']);

        $market->status = 9;

        if ($market->save()) {
            $log = new PrivateMarketFormExploreLogs();
            $log->market_id = $input['id'];
            $log->detail = $input['detail'];
            $log->list_option = json_encode($request->input('list_option'));
            $log->price = $input['price'];
            $log->status = 1;
            $log->created_at = now();
            $log->updated_at = now();

            if ($log->save()) {
                return redirect()->route('PrivateMarketAdminExplore')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
            }
        }
    }

    public function PrivateMarketAdminPayment()
    {
        $forms = PrivateMarketForm::whereIn('status', [7, 9])
            ->with([])
            ->orderBy('created_at', 'desc')
            ->get();

        foreach ($forms as $key => $rs) {
            $rs->payment = PrivateMarketFormPaymentLogs::where('market_id', $rs->id)
                ->orderBy('id', 'desc')
                ->first();
        }

        return view('admin.private_market.payment', compact('forms'));
    }

    public function PrivateMarketAdminPaymentCheck($id)
    {
        $form = PrivateMarketForm::with([])->find($id);

        $file = PrivateMarketFormPaymentLogs::where('market_id', $id)->first();

        return view('admin.private_market.payment-check', compact('form', 'file'));
    }

    public function PrivateMarketAdminPaymentSave(Request $request)
    {
        $input = $request->all();

        if ($input['id']) {
            $market = PrivateMarketForm::find($input['id']);
            if (!$market) {
                return redirect()->route('PrivateMarketAdminPayment')->with('error', 'ไม่พบข้อมูล');
            }

            $market->status = 10;

            if ($market->save()) {
                $filePath = '';
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('payment', $filename, 'public');
                }

                $treasuryPath = '';
                if ($request->hasFile('file_treasury')) {
                    $file2 = $request->file('file_treasury');
                    $filename2 = time() . '_treasury_' . $file2->getClientOriginalName();
                    $treasuryPath = $file2->storeAs('payment', $filename2, 'public');
                }

                $createdAt = now();
                $insertPayment = new PrivateMarketFormPaymentLogs();
                $insertPayment->market_id = $input['id'];
                $insertPayment->file = $filePath;
                $insertPayment->file_treasury = $treasuryPath;
                $insertPayment->receipt_book = $input['receipt_book'];
                $insertPayment->receipt_number = $input['receipt_number'];
                $insertPayment->status = 2;
                $insertPayment->created_at = $createdAt;
                $insertPayment->updated_at = $createdAt;
                $insertPayment->expiration_date = $createdAt->copy()->addYear()->subDay();

                if ($insertPayment->save()) {
                    $number = PrivateMarketFormNumberLogs::orderBy('id', 'desc')->first();

                    $run_book = $number ? $number->book + 1 : 1;
                    $run_number = $number ? $number->number + 1 : 1;

                    $insert = new PrivateMarketFormNumberLogs();
                    $insert->market_id = $input['id'];
                    $insert->number = $run_number;
                    $insert->book = $run_book;
                    $insert->year = date('Y') + 543;
                    $insert->created_at = $createdAt;
                    $insert->updated_at = $createdAt;

                    if ($insert->save()) {
                        return redirect()->route('PrivateMarketAdminPayment')->with('success', 'บันทึกรายการเรียบร้อยแล้ว');
                    }
                }
            }
        }

        return redirect()->route('PrivateMarketAdminPayment')->with('error', 'ไม่สามารถบันทึกข้อมูลได้');
    }


    public function PrivateMarketAdminApprove()
    {
        $forms = PrivateMarketForm::whereIn('status', [10, 11])
            ->with([])
            ->orderBy('created_at', 'desc')
            ->get();

        foreach ($forms as $key => $rs) {
            $rs->payment = PrivateMarketFormPaymentLogs::where('market_id', $rs->id)
                ->orderBy('id', 'desc')
                ->first();
        }

        return view('admin.private_market.approve', compact('forms'));
    }

    public function AdminCertificatePrivateMarketPDF($id)
    {
        $form = PrivateMarketForm::find($id);

        $file = PrivateMarketFormPaymentLogs::where('market_id', $form->id)->first();

        $explore = PrivateMarketFormExploreLogs::where('market_id', $form->id)->first();

        $info_number = PrivateMarketFormNumberLogs::where('market_id', $form->id)->first();

        $pdf = PDF::loadView(
            "admin.private_market.pdf.private_market_certificate",
            compact('form', 'file', 'explore', 'info_number')
        )->setPaper('A4', 'portrait');

        return $pdf->stream('pdf_' . $form->id . '.pdf');
    }

    public function CertificatePrivateMarketCopy(Request $request)
    {
        $id = $request->input('id');
        $original = PrivateMarketForm::findOrFail($id);
        $original->status = 11;
        $original->save();


        $newInfo = $original->replicate();
        $newInfo->form_status = 1;
        $newInfo->status = 1;
        $newInfo->refer_app_id = $original->id;
        $newInfo->created_at = now();
        $newInfo->updated_at = now();
        $newInfo->save();

        $appointments = PrivateMarketFormAppointmentLogs::where('market_id', $original->id)->get();
        foreach ($appointments as $appointment) {
            $newAppointment = $appointment->replicate();
            $newAppointment->market_id = $newInfo->id;
            $newAppointment->created_at = now();
            $newAppointment->updated_at = now();
            $newAppointment->save();
        }

        $explores = PrivateMarketFormExploreLogs::where('market_id', $original->id)->get();
        foreach ($explores as $explore) {
            $newExplore = $explore->replicate();
            $newExplore->market_id = $newInfo->id;
            $newExplore->created_at = now();
            $newExplore->updated_at = now();
            $newExplore->save();
        }

        return response()->json(['success' => true, 'message' => 'คัดลอกข้อมูลเรียบร้อยแล้ว']);
    }

    public function CertificatePrivateMarketExpire(Request $request)
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

        $forms = PrivateMarketForm::whereIn('status', [10, 11])
            ->with([])
            ->get()
            ->filter(function ($form) use ($ninetyDaysFromNow, $startDate, $endDate) {
                $latestPayment = PrivateMarketFormPaymentLogs::where('market_id', $form->id)
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

        return view('admin.private_market.expire-details', compact('forms', 'availableMonths', 'availableYears'));
    }
}
