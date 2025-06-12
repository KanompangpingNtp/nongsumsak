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

<body>
    <div style="width: 100%; position: relative; margin-bottom: 10px;">
        <!-- กล่องกลาง -->
        <div style="text-align: center; font-weight: bold; font-size: 26px;">
            <span>สำเนา</span><br>
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/pdf/ครุฑ.png'))) }}"
                alt="Logo" height="100"><br>
            <span>ใบอนุญาต</span><br>
            <span>จัดตั้งสถานที่สะสมอาหาร</span>
        </div>

        <!-- กล่องขวาบน -->
        <div style="position: absolute; top: 0; right: 0; font-size: 22px; text-align: right; padding-top:2rem;">
            <span>แบบ สอ.๕</span>
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
            <span>เจ้าพนักงานท้องถิ่นออกหนังสือรับรองการแจ้งให้</span>
            <input type="checkbox">
            <span>บุคคลธรรมดา</span>
            <input type="checkbox">
            <span>นิติบุคคล</span>
        </div>
    </div>
    <div class="box_text">
        <span>ชื่อ</span>
        <span class="dotted-line" style="width: 60%; text-align: center; line-height: 1;"></span>
        <span>อายุ</span>
        <span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
        <span>ปี สัญชาติ</span>
        <span class="dotted-line" style="width: 13%; text-align: center; line-height: 1;"></span>
        <span>เลขประจำตัวประชาชนเลขที่</span>
        <span class="dotted-line" style="width: 35%; text-align: center; line-height: 1;"></span>
        <span>อยู่บ้าน/สำนักงานเลขที่</span>
        <span class="dotted-line" style="width: 23.5%; text-align: center; line-height: 1;"></span>
        <span>หมู่ที่</span>
        <span class="dotted-line" style="width: 17.5%; text-align: center; line-height: 1;"></span>
        <span>ตรอก/ซอย</span>
        <span class="dotted-line" style="width: 17.5%; text-align: center; line-height: 1;"></span>
        <span>ถนน</span>
        <span class="dotted-line" style="width: 17.5%; text-align: center; line-height: 1;"></span>
        <span>ตำบล/แขวง</span>
        <span class="dotted-line" style="width: 17.5%; text-align: center; line-height: 1;"></span>
        <span>อำเภอ/เขต</span>
        <span class="dotted-line" style="width: 25%; text-align: center; line-height: 1;"></span>
        <span>จังหวัด</span>
        <span class="dotted-line" style="width: 25%; text-align: center; line-height: 1;"></span>
        <span>โทรศัพท์</span>
        <span class="dotted-line" style="width: 26%; text-align: center; line-height: 1;"></span>
    </div>
    <div class="box_text" style="text-align: start; margin-top:1rem; ">
        <div style="margin-left: 5rem;">
            <span style="font-weight: bold; margin-right:5px;">ข้อ ๑.</span><span> ดำเนินการจัดตั้งสถานที่สะสมอาหาร</span>
            <span>มีพื้นที่ประกอบอาหาร</span>
            <span class="dotted-line" style="width: 33%; text-align: center; line-height: 1;"></span>
            <span>ตารางเมตร</span>
        </div>
    </div>
    <div class="box_text">
        
        <span>ค่าธรรมเนียม</span>
        <span class="dotted-line" style="width: 15%; text-align: center; line-height: 1;"></span>
        <span>บาทต่อปี ใบเสร็จรับเงินเลขที่</span>
        <span class="dotted-line" style="width: 18%; text-align: center; line-height: 1;"></span>
        <span>ลงวันที่</span>
        <span class="dotted-line" style="width: 8%; text-align: center; line-height: 1;"></span>
        <span>เดือน</span>
        <span class="dotted-line" style="width: 12%; text-align: center; line-height: 1;"></span>
        <span>พ.ศ.</span>
        <span class="dotted-line" style="width: 8%; text-align: center; line-height: 1;"></span>
        <span>โดยใช้ชื่อสถานประกอบกิจการว่า</span>
        <span class="dotted-line" style="width: 35%; text-align: center; line-height: 1;"></span>
        <span>จำนวนคนงาน</span>
        <span class="dotted-line" style="width: 11%; text-align: center; line-height: 1;"></span>
        <span>คน</span>
        <span>ตั้งอยู่ ณ เลขที่</span>
        <span class="dotted-line" style="width: 12.7%; text-align: center; line-height: 1;"></span>
        <span>หมู่ที่</span>
        <span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
        <span>ตำบล</span>
        <span class="dotted-line" style="width: 12.7%; text-align: center; line-height: 1;"></span>
        <span>อำเภอ</span>
        <span class="dotted-line" style="width: 12%; text-align: center; line-height: 1;"></span>
        <span>จังหวัด</span>
        <span class="dotted-line" style="width: 16%; text-align: center; line-height: 1;"></span>
        <span>โทรศัพท์</span>
        <span class="dotted-line" style="width: 42%; text-align: center; line-height: 1;"></span>
        <span>โทรสาร</span>
        <span class="dotted-line" style="width: 42%; text-align: center; line-height: 1;"></span>
    </div>
    <div class="box_text" style="text-align: start; margin-top:1rem; ">
        <div style="margin-left: 5rem;">
            <span style="font-weight: bold; margin-right:5px;">ข้อ ๒.</span><span> ผู้ได้รับใบอนุญาตต้องปฎิบัติตามเงื่อนไขดังต่อไปนี้</span><br>
            <span>(๑) ต้องปฎิบัติตามเทศบัญญัติเทศบาลตำบลหนองซ้ำซาก ว่าด้วยสถานที่จำหน่ายอาหารและสถานที่</span><br>
            <span style="margin-left: 1.2rem;">สะสมอาหาร พ.ศ. ๒๕๕๙</span>
        </div>
    </div>
    <div class="box_text" style="text-align: start; margin-top:2rem; ">
        <div style="margin-left: 5rem;">
            <span style="font-weight: bold;">หนังสือนี้ ให้ใช้ได้จนถึงวันที่</span>
            <span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
            <span style="font-weight: bold;">เดือน</span>
            <span class="dotted-line" style="width: 20%; text-align: center; line-height: 1;"></span>
            <span style="font-weight: bold;">พ.ศ.</span>
            <span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
        </div>
    </div>
    <div class="box_text" style="text-align: right;">
            <span>ออกให้ ณ วันที่</span>
            <span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
            <span>เดือน</span>
            <span class="dotted-line" style="width: 20%; text-align: center; line-height: 1;"></span>
            <span>พ.ศ.</span>
            <span class="dotted-line" style="width: 10%; text-align: center; line-height: 1;"></span>
    </div>
    <div class="box_text" style="text-align: right; margin-top:2rem; margin-left:10rem;">
            <div style="text-align: center">
                <span>(นายธานี เนื่องจำนงค์)</span><br>
                <span>นายกเทศมนตรีตำบลหนองซ้ำซาก</span>
            </div>
    </div>
    <div style="width: 100%; position: relative; margin-top:30px;">
        <!-- กล่องกลาง -->
        <div style="text-align: center; font-weight: bold; ">
        </div>

        <!-- กล่องขวาบน -->
        <div style="position: absolute; top: 0; right: 0; text-align: right; padding-top:2rem; width:30%">
            <div class="box_text_border" style="font-weight: bold; text-align: right; width:100%">
                <span class="dotted-line" style="width: 62%; text-align: center; line-height: 1;"></span>
                <span>รองนายก</span><br>
                <span class="dotted-line" style="width: 56%; text-align: center; line-height: 1;"></span>
                <span>ปลัดเทศลาล</span><br>
                <span class="dotted-line" style="width: 49%; text-align: center; line-height: 1;"></span>
                <span>รองปลัดเทศลาล</span><br>
                <span class="dotted-line" style="width: 40%; text-align: center; line-height: 1;"></span>
                <span>ผอ.กองสาธารณสุขฯ</span><br>
                <span class="dotted-line" style="width: 48%; text-align: center; line-height: 1;"></span>
                <span>หัวหน้างาน/ฝ่าย</span><br>
                <span class="dotted-line" style="width: 56%; text-align: center; line-height: 1;"></span>
                <span>ผู้พิมพ์/ทาน</span>
            </div>
        </div>
    </div>
</body>


</html>
