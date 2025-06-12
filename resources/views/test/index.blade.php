<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="p-5">
        <h3 class="text-center">PDF</h3>
        <table class="table table-bordered table-striped mt-5" id="data_table">
            <thead>
                <tr>
                    <th class="text-center">หัวข้อ</th>
                    <th class="text-center">PDF</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ใบอนุญาติ ประกอบกิจการที่อันตรายต่อสุขภาพ</td>
                    <td class="text-center">
                        <a href="{{ route('formExportPDF1') }}" class="btn btn-danger btn-sm" target="_blank">
                            ใบอนุญาติ
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>ใบอนุญาตจัดตั้งสถานที่จำหน่ายอาหาร</td>
                    <td class="text-center">
                        <a href="{{ route('formExportPDF2') }}" class="btn btn-danger btn-sm" target="_blank">
                            ใบอนุญาติ
                        </a>
                        <a href="{{ route('formExportPDF3') }}" class="btn btn-danger btn-sm" target="_blank">
                            หนังสือรับรองการแจ้ง
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>ใบอนุญาต จัดตั้งสถานที่สะสมอาหาร</td>
                    <td class="text-center">
                        <a href="{{ route('formExportPDF4') }}" class="btn btn-danger btn-sm" target="_blank">
                            ใบอนุญาติ
                        </a>
                        <a href="{{ route('formExportPDF5') }}" class="btn btn-danger btn-sm" target="_blank">
                            หนังสือรับรองการแจ้ง
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>ใบอนุญาติจัดตั้งตลาด</td>
                    <td class="text-center">
                        <a href="{{ route('formExportPDF6') }}" class="btn btn-danger btn-sm" target="_blank">
                            ใบอนุญาติ
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>ใบอนุญาติประกอบกิจการรับทำการเก็บ ขน หรือกำจัดสิ่งปฏิกูลหรือมูลฝอย</td>
                    <td class="text-center">
                        <a href="{{ route('formExportPDF7') }}" class="btn btn-danger btn-sm" target="_blank">
                            ใบอนุญาติ
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>ขอแก้ไขความไม่ถูกต้องหรือไม่สมบูรณ์ของคำขอรับใบอนุญาต/คำขอต่ออายุใบอนุญาต ส่งเอกสารหรือพลักฐานเพิ่มเติม</td>
                    <td class="text-center">
                        <a href="{{ route('formExportPDF8') }}" class="btn btn-danger btn-sm" target="_blank">
                            เอกสาร
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>แจ้งขยายเวลาการพิจารณาอนุญาตประกอบกิจการ</td>
                    <td class="text-center">
                        <a href="{{ route('formExportPDF9') }}" class="btn btn-danger btn-sm" target="_blank">
                            เอกสาร
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</body>
</html>
