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
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/pdf/ครุฑ.png'))) }}"
                alt="Logo" height="100"><br>
        </div>

        <!-- กล่องขวาบน -->
        <div style="position: absolute; top: 0; right: 0; font-size: 22px; text-align: right; padding-top:2rem;">
            
        </div>
    </div>
    <div style="width: 100%; position: relative; margin-bottom: 30px;">
        <!-- กล่องกลาง -->
        <div class="box_text" style="position: absolute; top: 0; width:50%; text-align: start;">
            <span>ที่</span>
            <span class="dotted-line" style="width: 20%; text-align: center; line-height: 1;"></span>
            <span>/</span>
            <span class="dotted-line" style="width: 20%; text-align: center; line-height: 1;"></span>
        </div>

        <!-- กล่องขวาบน -->
        <div class="box_text" style="position: absolute; top: 0; right: 0; width:50%; text-align: right;">
            <span>สำนักงาน</span>
            <span class="dotted-line" style="width: 35%; text-align: center; line-height: 1;"></span><br>
            <span>วัน</span>
            <span class="dotted-line" style="width: 15%; text-align: center; line-height: 1;"></span>
            <span>เดือน</span>
            <span class="dotted-line" style="width: 25%; text-align: center; line-height: 1;"></span>
            <span>พ.ศ.</span>
            <span class="dotted-line" style="width: 15%; text-align: center; line-height: 1;"></span>

        </div>
    </div>
    <div class="box_text" style="text-align: left; margin-top:5rem;">
        <span style="margin-right: 2rem;">เรื่อง</span>
        <span>แจ้งขยายเวลาการพิจารณาอนุญาตประกอบกิจการ</span>
    </div>
    <div class="box_text" style="text-align: left; ">
        <span style="margin-right: 2rem;">เรียน</span>
        <span class="dotted-line" style="width: 40%; text-align: center; line-height: 1;"></span>
    </div>
    <div class="box_text" style="text-align: left; ">
        <span>อ้างถึง ใบรับคำขออนุญาต/ต่ออายุใบอนุญาตเลขที่</span>
        <span class="dotted-line" style="width: 15%; text-align: center; line-height: 1;"></span>
        <span>ลงวันที่</span>
        <span class="dotted-line" style="width: 8%; text-align: center; line-height: 1;"></span>
        <span>เดือน</span>
        <span class="dotted-line" style="width: 12%; text-align: center; line-height: 1;"></span>
        <span>พ.ศ.</span>
        <span class="dotted-line" style="width: 8%; text-align: center; line-height: 1;"></span>
    </div>
    <div class="box_text" style="text-align: left; ">
        <span style="margin-right: 2rem;">สิ่งที่ส่งมาด้วย</span><span>1.</span>
        <span class="dotted-line" style="width: 51%; text-align: center; line-height: 1;"></span>
        <div style="margin-left: 6.5rem;">
            <span>2.</span>
        <span class="dotted-line" style="width: 60%; text-align: center; line-height: 1;"></span>
        </div>
    </div>
    <div class="box_text" style="text-align: left; margin-left: 7rem;">
        <span>ตามที่ท่านได้ยื่นคำขอรับใบอนุญาตประกอบกิจการ</span>
        <span class="dotted-line" style="width: 54%; text-align: center; line-height: 1;"></span><br>
        <div style="margin-left: -7rem;">
            <span>และราชการส่วนท้องถิ่นได้ออกใบรับคำขออนุญาตไว้ตามที่อ้างถึง นั้น เนื่องจากมีเหตุจำเป็นที่เจ้าพนักงานท้องถิ่นไม่อาจออกใบอนุญาต</span>
            <span>หรือยังไม่อาจมีคำสั่ง ไม่อนุญาตได้ภายในเวลา 30 วันนับแต่วันที่ได้รับคำขอดังกล่าวดังนี้</span>
        </div>
    </div>
    <div class="box_text" style="text-align: left; margin-left: 7rem;">
            <span>1.</span>
            <span class="dotted-line" style="width: 60%; text-align: center; line-height: 1;"></span><br>
            <span>2.</span>
            <span class="dotted-line" style="width: 60%; text-align: center; line-height: 1;"></span><br>
            <span>3.</span>
            <span class="dotted-line" style="width: 60%; text-align: center; line-height: 1;"></span><br>
    </div>
    <div class="box_text" style="text-align: left; margin-left: 7rem;">
        <span>ดังนั้น จึงขอแจ้งเวลาการพิจารณาอนุญาตออกไปเป็นเวลา 15 วันนับแต่วันสิ้นสุดเวลาข้างต้นและต้องขออภัยมา ณ</span><br>
        <div style="margin-left: -7rem;">
            <span>โอกาสนี้ด้วย จึงเรียนมาเพื่อโปรดทราบ</span>
        </div>
    </div>
    <div class="box_text" style="text-align: right; margin-top:3rem;">
        <span style="margin-right: 4rem;">ขอแสดงความนับถือ</span><br>
        <span>(ลงชื่อ)</span>
        <span class="dotted-line" style="width: 32%; text-align: center; line-height: 1;"></span><br>
        <span>(</span>
        <span class="dotted-line" style="width: 30%; text-align: center; line-height: 1;"></span>
        <span>)</span><br>
        <span>ตำแหน่ง</span>
        <span class="dotted-line" style="width: 30%; text-align: center; line-height: 1;"></span><br>
        <span style="margin-right: 4rem;">เจ้าพนักงานท้องถิ่น</span>
    </div>
    <div class="box_text" style="text-align: left; margin-top:3rem;">
        <span>ส่วนราชการ</span>
        <span class="dotted-line" style="width: 47%; text-align: center; line-height: 1;"></span><br>
        <span>โทร</span>
        <span class="dotted-line" style="width: 23%; text-align: center; line-height: 1;"></span>
        <span>โทรสาร</span>
        <span class="dotted-line" style="width: 23%; text-align: center; line-height: 1;"></span><br>
        <span>E-mail</span>
        <span class="dotted-line" style="width: 51%; text-align: center; line-height: 1;"></span><br>
    </div>
    <div class="box_text" style="text-align: left; margin-top:2rem;">
        <span>** แบบฟอร์มนี้เป็นตัวอย่าง อย่างไรก็ตาม ให้ใช้แบบฟอร์มที่กำหนดในข้อบัญญัติท้องถิ่นของราชการส่วนท้องถิ่นนั้นๆ</span>
    </div>
</body>


</html>
