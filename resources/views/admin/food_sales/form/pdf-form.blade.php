<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>PDF Report</title>

    <style>
        @font-face {
            font-family: 'sarabun';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'sarabun-bold';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew-Bold.ttf') }}") format('truetype');
        }

        body {
            font-family: 'sarabun', 'sarabun-bold', sans-serif;
            font-size: 20px;
            margin: 0;
            padding: 0;
            line-height: 0.8;
        }

        .regis_number {
            text-align: right;
            margin-right: 8px;
        }

        .title_doc {
            text-align: center;
            font-weight: bold;
        }

        .box_text {
            text-align: start;
        }

        input[type="checkbox"] {
            margin-bottom: -2px;
            margin-left: 15px;
        }

        .box_text span {
            display: inline-flex;
            line-height: 1;
        }

        .box_text_border {
            padding-top: 0px;
            padding-left: 10px;
            padding-right: 10px;
            padding-bottom: 7px;
            border: 1px solid #000000;
            font-size: 16px;
            text-align: left;
        }

        .box_text_border span {
            display: inline-flex;
            line-height: 1;
        }

        .dotted-line {
            margin-left: 2px;
            color: black;
            border-bottom: 2px dotted black;
            word-wrap: break-word;
            /* ห่อข้อความที่ยาวเกิน */
            overflow-wrap: break-word;
            /* รองรับ browser อื่น */
        }
    </style>
</head>

{{-- @php
    function toThaiNumber($number) {
        return strtr($number, ['0'=>'๐','1'=>'๑','2'=>'๒','3'=>'๓','4'=>'๔','5'=>'๕','6'=>'๖','7'=>'๗','8'=>'๘','9'=>'๙']);
    }

    $date = $form['details']->receipt_date ?? null;

    if ($date) {
        $carbon = \Carbon\Carbon::parse($date)->locale('th');
        $day = toThaiNumber($carbon->isoFormat('D'));
        $month = $carbon->isoFormat('MMMM');
        $year = toThaiNumber($carbon->year + 543);
    } else {
        $day = $month = $year = '-';
    }
@endphp --}}

@php
    $date = $form['details']->receipt_date ?? null;
    $carbon = \Carbon\Carbon::parse($date)->locale('th');
    $day = $carbon->isoFormat('D');
    $month = $carbon->isoFormat('MMMM');
    $year = $carbon->year + 543;
@endphp

<body>
    <div style="width: 100%; position: relative; margin-bottom: 10px;">
        <!-- กล่องกลาง -->
        <div style="text-align: center; font-weight: bold; font-size: 26px;">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/pdf/ครุฑ.png'))) }}"
                alt="Logo" height="100"><br>
            <span>หนังสือรับรองการแจ้ง</span><br>
            <span>จัดตั้งสถานที่จำหน่ายอาหาร</span>
        </div>

        <!-- กล่องขวาบน -->
        <div style="position: absolute; top: 0; right: 0; font-size: 22px; text-align: right; padding-top:2rem;">
            <span>แบบ สอ.๖</span>
        </div>
    </div>
    <div style="width: 100%; position: relative; margin-bottom: 30px;">
        <!-- กล่องกลาง -->
        <div class="box_text" style="position: absolute; top: 0; width:50%; text-align: start;">
            <span>เล่มที่</span>
            <span class="dotted-line" style="width: 20%; text-align: center; line-height: 1;"></span>
            <span>เลขที่</span>
            <span class="dotted-line" style="width: 20%; text-align: center; line-height: 1;"></span>
            <span>ปี</span>
            <span class="dotted-line"
                style="width: 20%; text-align: center; line-height: 1;"></span>
        </div>

        <!-- กล่องขวาบน -->
        <div class="box_text" style="position: absolute; top: 0; right: 0; width:50%; text-align: right;">
            <span>สำนักงานเขต</span>
            <span class="dotted-line"
                style="width: 45%; text-align: center; line-height: 1;">เทศบาลตำบลหนองซ้ำซาก</span>
        </div>
    </div>
    <div class="box_text" style="text-align: start; margin-top:3rem;">
        <div style="margin-left: 5rem;">
            <span>เจ้าพนักงานท้องถิ่นออกหนังสือรับรองการแจ้งให้</span>
            <input type="checkbox" {{ $form->title_name == 'บุคคลธรรมดา' ? 'checked' : '' }}>
            <span>บุคคลธรรมดา</span>
            <input type="checkbox" {{ $form->title_name == 'นิติบุคคล' ? 'checked' : '' }}>
            <span>นิติบุคคล</span>
        </div>
    </div>
    <div class="box_text">
        <span>ชื่อ</span>
        <span class="dotted-line" style="width: 60%; text-align: center; line-height: 1;">{{ $form->full_name }}</span>
        <span>อายุ</span>
        <span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;">{{ $form->age }}</span>
        <span>ปี สัญชาติ</span>
        <span class="dotted-line"
            style="width: 13%; text-align: center; line-height: 1;">{{ $form->nationality }}</span>
        <span>เลขประจำตัวประชาชนเลขที่</span>
        <span class="dotted-line"
            style="width: 35%; text-align: center; line-height: 1;">{{ $form->registration_number }}</span>
        <span>อยู่บ้าน/สำนักงานเลขที่</span>
        <span class="dotted-line" style="width: 23.5%; text-align: center; line-height: 1;">{{ $form->address }}</span>
        <span>หมู่ที่</span>
        <span class="dotted-line" style="width: 17.5%; text-align: center; line-height: 1;">{{ $form->village }}</span>
        <span>ตรอก/ซอย</span>
        <span class="dotted-line" style="width: 17.5%; text-align: center; line-height: 1;">{{ $form->alley }}</span>
        <span>ถนน</span>
        <span class="dotted-line" style="width: 17.5%; text-align: center; line-height: 1;">{{ $form->road }}</span>
        <span>ตำบล/แขวง</span>
        <span class="dotted-line"
            style="width: 17.5%; text-align: center; line-height: 1;">{{ $form->subdistrict }}</span>
        <span>อำเภอ/เขต</span>
        <span class="dotted-line" style="width: 25%; text-align: center; line-height: 1;">{{ $form->district }}</span>
        <span>จังหวัด</span>
        <span class="dotted-line" style="width: 25%; text-align: center; line-height: 1;">{{ $form->province }}</span>
        <span>โทรศัพท์</span>
        <span class="dotted-line" style="width: 26%; text-align: center; line-height: 1;">{{ $form->telephone }}</span>
    </div>
    <div class="box_text" style="text-align: start; margin-top:1rem;">
        <div style="margin-left: 5rem;">
            <span style="font-weight: bold; margin-right:5px;">ข้อ ๑.</span><span>
                ดำเนินการจัดตั้งสถานที่จำหน่ายอาหารประเภท</span>
            <span class="dotted-line"
                style="width: 52.5%; text-align: center; line-height: 1;">{{ $form['details']->food_type ?? '-' }}</span>
        </div>
    </div>
    <div class="box_text">
        <span>มีพื้นที่ประกอบอาหาร</span>
        <span class="dotted-line"
            style="width: 12%; text-align: center; line-height: 1;">{{ $form['details']->operation_area ?? '-' }}</span>
        <span>ตารางเมตร คำธรรมเนียม</span>
        <span class="dotted-line"
            style="width: 15%; text-align: center; line-height: 1;">{{ $form['details']->annual_fee ?? '-' }}</span>
        <span>บาท ใบเสร็จรับเงินเลขที่</span>
        <span class="dotted-line"
            style="width: 15%; text-align: center; line-height: 1;">{{ $form['details']->receipt_number ?? '-' }}</span>
        <span>ลงวันที่</span>
        <span class="dotted-line"
            style="width: 8%; text-align: center; line-height: 1;">{{ $day }}</span>
        <span>เดือน</span>
        <span class="dotted-line" style="width: 12%; text-align: center; line-height: 1;">{{ $month }}</span>
        <span>พ.ศ.</span>
        <span class="dotted-line" style="width: 8%; text-align: center; line-height: 1;">{{ $year }}</span>
        <span>โดยใช้ชื่อสถานประกอบกิจการว่า</span>
        <span class="dotted-line" style="width: 29.3%; text-align: center; line-height: 1;">{{ $form['details']->business_name ?? '-' }}</span>
        <span>จำนวนคนงาน</span>
        <span class="dotted-line" style="width: 8%; text-align: center; line-height: 1;">{{ $form['details']->worker_count ?? '-' }}</span>
        <span>คน</span>
        <span>ตั้งอยู่ ณ เลขที่</span>
        <span class="dotted-line" style="width: 12.7%; text-align: center; line-height: 1;">{{ $form['details']->location_address ?? '-' }}</span>
        <span>หมู่ที่</span>
        <span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;">{{ $form['details']->village_no ?? '-' }}</span>
        <span>ตำบล</span>
        <span class="dotted-line" style="width: 12.7%; text-align: center; line-height: 1;">{{ $form['details']->subdistrict ?? '-' }}</span>
        <span>อำเภอ</span>
        <span class="dotted-line" style="width: 12%; text-align: center; line-height: 1;">{{ $form['details']->district ?? '-' }}</span>
        <span>จังหวัด</span>
        <span class="dotted-line" style="width: 20%; text-align: center; line-height: 1;">{{ $form['details']->province ?? '-' }}</span>
        <span>โทรศัพท์</span>
        <span class="dotted-line" style="width: 29%; text-align: center; line-height: 1;">{{ $form['details']->telephone ?? '-' }}</span>
        <span>โทรสาร</span>
        <span class="dotted-line" style="width: 29%; text-align: center; line-height: 1;">{{ $form['details']->fax ?? '-' }}</span>
    </div>
    <div class="box_text" style="text-align: start; margin-top:1rem; ">
        <div style="margin-left: 5rem;">
            <span style="font-weight: bold; margin-right:5px;">ข้อ ๒.</span><span>
                ผู้ได้รับใบอนุญาตต้องปฎิบัติตามเงื่อนไขดังต่อไปนี้</span><br>
            <span>(๑) ต้องปฎิบัติตามเทศบัญญัติเทศบาลตำบลหนองซ้ำซาก ว่าด้วยสถานที่จำหน่ายอาหารและสถานที่</span><br>
            <span style="margin-left: 1.2rem;">สะสมอาหาร พ.ศ. ๒๕๕๙</span>
        </div>
    </div>
    <div class="box_text" style="text-align: start; margin-top:5rem; ">
        <div style="margin-left: 5rem;">
            <span style="font-weight: bold;">หนังสือรับรองการแจ้งฉบับนี้ออกให้เมื่อวันที่</span>
            <span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;">{{ $day }}</span>
            <span style="font-weight: bold;">เดือน</span>
            <span class="dotted-line" style="width: 20%; text-align: center; line-height: 1;">{{ $month }}</span>
            <span style="font-weight: bold;">พ.ศ.</span>
            <span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;">{{ $year }}</span>
        </div>
    </div>
    <div class="box_text" style="text-align: right; margin-top:5rem; margin-left:10rem;">
        <div style="text-align: center">
            <span>(นายธานี เนื่องจำนงค์)</span><br>
            <span>นายกเทศมนตรีตำบลหนองซ้ำซาก</span>
        </div>
    </div>

</body>


</html>
