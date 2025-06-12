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
            margin-left: 6px;
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

<body>
    <div style="width: 100%; position: relative; margin-bottom: 10px;">
        <!-- กล่องกลาง -->
        <div style="text-align: center; font-weight: bold; font-size: 26px;">
            <span>สำเนา</span><br>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/pdf/ครุฑ.png'))) }}"
                alt="Logo" height="100"><br>
            <span>ใบอนุญาตจัดตั้งตลาด</span>
        </div>

        <!-- กล่องขวาบน -->
        <div style="position: absolute; top: 0; right: 0; font-size: 22px; text-align: right; padding-top:2rem;">

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
            <span class="dotted-line" style="width: 20%; text-align: center; line-height: 1;"></span>
        </div>

        <!-- กล่องขวาบน -->
        <div class="box_text" style="position: absolute; top: 0; right: 0; width:50%; text-align: right;">
            <span>สำนักงานเขต</span>
            <span class="dotted-line" style="width: 45%; text-align: center; line-height: 1;"></span>
        </div>
    </div>
    <div class="box_text" style="text-align: start; margin-top:3rem;">
        <div style="margin-left: 5rem;">
            <span>เจ้าพนักงานท้องถิ่น</span><span style="margin-left: 10px;">อนุญาตให้</span>
            <input type="checkbox">
            <span>บุคคลธรรมดา</span>
            <input type="checkbox">
            <span>นิติบุคคล</span><br>
            <span>ชื่อ</span>
        <span class="dotted-line" style="width: 58%; text-align: center; line-height: 1;"></span>
        <span>อายุ</span>
        <span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
        <span>ปี สัญชาติ</span>
        <span class="dotted-line" style="width: 13%; text-align: center; line-height: 1;"></span>

        </div>
    </div>
    <div class="box_text">
        <span>เลขประจำตัวประชาชนเลขที่</span>
        <span class="dotted-line" style="width: 34%; text-align: center; line-height: 1;"></span>
        <span>อยู่บ้านเลขที่</span>
        <span class="dotted-line" style="width: 13%; text-align: center; line-height: 1;"></span>
        <span>หมู่ที่</span>
        <span class="dotted-line" style="width: 14.5%; text-align: center; line-height: 1;"></span>
        <span>ตรอก/ซอย</span>
        <span class="dotted-line" style="width: 16.2%; text-align: center; line-height: 1;"></span>
        <span>ถนน</span>
        <span class="dotted-line" style="width: 16.2%; text-align: center; line-height: 1;"></span>
        <span>ตำบล/แขวง</span>
        <span class="dotted-line" style="width: 16.2%; text-align: center; line-height: 1;"></span>
        <span>อำเภอ/เขต</span>
        <span class="dotted-line" style="width: 16.2%; text-align: center; line-height: 1;"></span>
        <span>จังหวัด</span>
        <span class="dotted-line" style="width: 30%; text-align: center; line-height: 1;"></span>
    </div>
    <div class="box_text" style="text-align: start; margin-top:1rem; ">
        <div style="margin-left: 5rem;">
            <span>๑. จัดตั้งตลาดประเภทที่</span>
            <input type="checkbox" style="margin-bottom: 2px; margin-right: 10px;"><span>๑.</span>
            <input type="checkbox" style="margin-bottom: 2px; margin-right: 10px;"><span>๒. ชื่อ</span>
            <span class="dotted-line" style="width: 59%; text-align: center; line-height: 1;"></span>
        </div>
    </div>
    <div class="box_text">
        <span>ตั้งอยู่เลขที่</span>
        <span class="dotted-line" style="width: 20.8%; text-align: center; line-height: 1;"></span>
        <span>ซอย</span>
        <span class="dotted-line" style="width: 13%; text-align: center; line-height: 1;"></span>
        <span>ถนน</span>
        <span class="dotted-line" style="width: 13%; text-align: center; line-height: 1;"></span>
        <span>หมู่ที่</span>
        <span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
        <span>ตำบล</span>
        <span class="dotted-line" style="width: 13%; text-align: center; line-height: 1;"></span>
        <span>อำเภอ</span>
        <span class="dotted-line" style="width: 26.2%; text-align: center; line-height: 1;"></span>
        <span>จังหวัด</span>
        <span class="dotted-line" style="width: 26.2%; text-align: center; line-height: 1;"></span>
        <span>โทรศัพท์</span>
        <span class="dotted-line" style="width: 26.2%; text-align: center; line-height: 1;"></span>
    </div>
    <div class="box_text" style="text-align: start; margin-top:1rem; ">
        <div style="margin-left: 5rem;">
            <span>๒. ค่าธรรมเนียม ฉบับละ</span>
            <span class="dotted-line" style="width: 26%; text-align: center; line-height: 1;"></span>
            <span>บาท/ปี ใบเสร็จรับเงินเลขที่</span>
            <span class="dotted-line" style="width: 26%; text-align: center; line-height: 1;"></span>
        </div>
    </div>
    <div class="box_text">
        <span>ลงวันที่</span>
            <span class="dotted-line" style="width: 15%; text-align: center; line-height: 1;"></span>
            <span>เดือน</span>
            <span class="dotted-line" style="width: 25%; text-align: center; line-height: 1;"></span>
            <span>พ.ศ.</span>
            <span class="dotted-line" style="width: 15%; text-align: center; line-height: 1;"></span>
    </div>
    <div class="box_text" style="text-align: start; margin-top:1rem; ">
        <div style="margin-left: 5rem;">
            <span>๓. ผู้ได้รับใบอนุญาตต้องปฎิบัติตามเงื่อนไขดังต่อไปนี้</span><br>
            <span>(๑) อนุญาตให้จัดตลาดวันอังคาร วันพฤหัสบดี และวันศุกร์</span><br>
            <span>(๒) เวลาเปิดตลาด ๑๕.๐๐ น. เวลาปิดตลาด ๑๙.๓๐ น.</span>
        </div>
    </div>
    <div class="box_text" style="text-align: start; margin-top:2rem; ">
            <span >ออกให้ ณ วันที่</span>
            <span class="dotted-line" style="width: 12%; text-align: center; line-height: 1;"></span>
            <span >เดือน</span>
            <span class="dotted-line" style="width: 22%; text-align: center; line-height: 1;"></span>
            <span >พ.ศ.</span>
            <span class="dotted-line" style="width: 12%; text-align: center; line-height: 1;"></span>
    </div>
    <div class="box_text" style="text-align: left;">
        <div style="margin-left: 8rem; margin-top:1rem; font-weight: bold;">
            <span>สิ้นอายุ วันที่</span>
            <span class="dotted-line" style="width: 13%; text-align: center; line-height: 1;"></span>
            <span>เดือน</span>
            <span class="dotted-line" style="width: 23%; text-align: center; line-height: 1;"></span>
            <span>พ.ศ.</span>
            <span class="dotted-line" style="width: 13%; text-align: center; line-height: 1;"></span>
        </div>

    </div>
    <div class="box_text" style="text-align: left; margin-top:2rem; margin-left:10rem;">
            <div style="text-align: center">
                <span>(นายสุชีพ เถวนสาริกิจ)</span><br>
            <span>ปลัดเทศบาล ปฎิบัติหน้าที่</span><br>
            <span>นายกเทศมนตรีตำบลหนองซ้ำซาก</span>
            </div>
    </div>
    <div style="width: 100%; position: relative; margin-top:-20px;">
        <!-- กล่องกลาง -->
        <div style="text-align: left;  padding-top:150px;">
            <span style="text-decoration: underline; font-weight: bold;">คำเตือน</span>
            <span>แสดงใบอนุญาตไว้ในที่เปิดเผย ณ สถานที่ที่ได้รับอนุญาต</span>
        </div>

        <!-- กล่องขวาบน -->
        <div style="position: absolute; top: 0; right: 0; text-align: right; padding-top:2rem; width:30%">
            <div class="box_text_border" style="font-weight: bold; text-align: right; width:100%">
                <span class="dotted-line" style="width: 76%; text-align: center; line-height: 1;"></span>
                <span>รองนายก</span><br>
                <span class="dotted-line" style="width: 85%; text-align: center; line-height: 1;"></span>
                <span>ปลัด</span><br>
                <span class="dotted-line" style="width: 78%; text-align: center; line-height: 1;"></span>
                <span>รองปลัด</span><br>
                <span class="dotted-line" style="width: 76%; text-align: center; line-height: 1;"></span>
                <span>ผอ.กองฯ</span><br>
                <span class="dotted-line" style="width: 72%; text-align: center; line-height: 1;"></span>
                <span>หัวหน้างาน</span><br>
                <span class="dotted-line" style="width: 72%; text-align: center; line-height: 1;"></span>
                <span>พิมพ์/ทาน</span>
            </div>
        </div>
    </div>
</body>


</html>
