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
    <div class="box_text" style="text-align: right;">
        <span>9/11</span>
    </div>
    <div style="width: 100%; position: relative; margin-bottom: 10px;">
        <!-- กล่องกลาง -->
        <div style="text-align: center; font-weight: bold; font-size: 26px;">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/pdf/ครุฑ.png'))) }}"
                alt="Logo" height="100"><br>
        </div>

        <!-- กล่องขวาบน -->
        <div style="position: absolute; top: 0; right: 0; font-size: 22px; text-align: right; padding-top:2rem;">
            <span>(แบบ นส.3/1)</span>
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
        <span>ขอแก้ไขความไม่ถูกต้องหรือไม่สมบูรณ์ของคำขอรับใบอนุญาต/คำขอต่ออายุใบอนุญาต ส่งเอกสารหรือหลักฐานเพิ่มเติม</span>
    </div>
    <div class="box_text" style="text-align: left; ">
        <span style="margin-right: 2rem;">เรียน</span>
        <span class="dotted-line" style="width: 40%; text-align: center; line-height: 1;"></span>
    </div>
    <div class="box_text" style="text-align: left; margin-left: 7rem;">
        <span>ตามที่ท่านได้ยื่นคำขอรับใบอนุญาตต่อเจ้าพนักงานท้องถิ่นเพื่อประกอบกิจการ</span><br>
        <div style="margin-left: -7rem;">
            <span class="dotted-line" style="width: 46%; text-align: center; line-height: 1;"></span>
            <span>เมื่อวันที่</span>
            <span class="dotted-line" style="width: 40%; text-align: center; line-height: 1;"></span>
            <span>นั้น</span>
        </div>
    </div>
    <div class="box_text" style="text-align: left; margin-left: 7rem;">
        <span>เจ้าพนักงานท้องถิ่นได้ตรวจสอบคำขอของท่านแล้วพบว่าคำขอไม่ถูกต้องหรือไม่สมบูรณ์ดังนี้</span><br>
        <div style="margin-left: 3rem;">
            <span>1)</span>
            <span class="dotted-line" style="width: 65%; text-align: center; line-height: 1;"></span><br>
            <span>2)</span>
            <span class="dotted-line" style="width: 65%; text-align: center; line-height: 1;"></span><br>
            <span>3)</span>
            <span class="dotted-line" style="width: 65%; text-align: center; line-height: 1;"></span><br>
            <span>4)</span>
            <span class="dotted-line" style="width: 65%; text-align: center; line-height: 1;"></span><br>
            <span>5)</span>
            <span class="dotted-line" style="width: 65%; text-align: center; line-height: 1;"></span><br>
        </div>
    </div>
    <div class="box_text" style="text-align: left; margin-left: 7rem;">
        <span>จึงขอแจ้งให้ท่านทราบเพื่อดำเนินการแก้ไขให้ถูกต้องหรือสมบูรณ์ และส่งเอกสารหรือหลักฐานเพิ่มเติม</span><br>
        <div style="margin-left: -7rem;">
            <span>ภายใน</span>
            <span class="dotted-line" style="width: 7%; text-align: center; line-height: 1;"></span>
            <span>วันนับแต่วันที่ได้ได้ลงนามรับทราบในบันทึกข้อความนี้ หากท่านไม่ดำเนินการแก้ไขคำขอหรือส่งเอกสารหรือหลักฐาน</span>
            <span>เพิ่มเติมให้ครบถ้วนภายในเวลาดังกล่าว จะถือว่าท่านไม่ประสงค์ที่จะให้เจ้าหน้าที่ดำเนินการตามคำขอต่อไปและจะส่งคืนคำขอพร้อม</span>
            <span>เอกสารหรือหลักฐานให้แก่ท่าน</span>
        </div>
    </div>
    <div class="box_text" style="text-align: left; margin-left: 7rem;">
        <span>จึงเรียนมาเพื่อทราบและดำเนินการต่อไปด้วย</span>
    </div>
    <div style="width: 100%; position: relative; margin-top: 7rem;">
        <!-- กล่องกลาง -->
        <div style="position: absolute; top: 0; left: 0; text-align: left; width:50%;">
            <div class="box_text" style="text-align: center;">
                <span>(ลงชื่อ)</span>
                <span class="dotted-line" style="width: 50%; text-align: center; line-height: 1;"></span>
                <span>รับทราบ</span><br>
                <span>(</span>
                <span class="dotted-line" style="width: 50%; text-align: center; line-height: 1;"></span>
                <span>)</span><br>
                <span>ผู้ยื่นคำขอใบอนุญาต/คำขอต่ออายุใบอนุญาต</span><br>
                <span>วันที่</span>
                <span class="dotted-line" style="width: 15%; text-align: center; line-height: 1;"></span>
                <span>เดือน</span>
                <span class="dotted-line" style="width: 20%; text-align: center; line-height: 1;"></span>
                <span>พ.ศ.</span>
                <span class="dotted-line" style="width: 15%; text-align: center; line-height: 1;"></span>
            </div>
        </div>

        <!-- กล่องขวาบน -->
        <div style="position: absolute; top: 0; right: 0; text-align: right; width:50%;">
            <div class="box_text" style="text-align: center;">
                <span>(ลงชื่อ)</span>
                <span class="dotted-line" style="width: 50%; text-align: center; line-height: 1;"></span>
                <span>รับทราบ</span><br>
                <span>(</span>
                <span class="dotted-line" style="width: 50%; text-align: center; line-height: 1;"></span>
                <span>)</span><br>
                <span>ตำแหน่ง</span>
                <span class="dotted-line" style="width: 55%; text-align: center; line-height: 1;"></span><br>
                <span>เจ้าหน้าที่ผู้ซึ่งได้รับหมอบหมายจากเจ้าพนักงานท้องถิ่น</span>
            </div>
        </div>
    </div>
    
</body>


</html>
