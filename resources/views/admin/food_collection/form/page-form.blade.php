@extends('dashboard.layouts.master')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center mb-4">ใบอนุญาตจัดตั้งสถานที่สะสมอาหาร</h2><br>

                    <form action="{{ route('FoodCollectionFromCreate') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-3 mb-3">
                            <label class="form-label d-block">ข้าพเจ้า <span class="text-danger">*</span></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="title_name" id="person_individual"
                                    value="บุคคลธรรมดา" required>
                                <label class="form-check-label" for="person_individual">
                                    บุคคลธรรมดา
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="title_name" id="person_legal"
                                    value="นิติบุคคล">
                                <label class="form-check-label" for="person_legal">
                                    นิติบุคคล
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="full_name" class="form-label" id="full_name_input">ชื่อ<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="full_name" name="full_name" required>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="age" class="form-label">อายุ <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="age" name="age" required>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="nationality" class="form-label">สัญชาติ <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nationality" name="nationality" required>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="id_card_input" class="form-label" id="id_card_input">เลขประจำตัวบัตรประชาชน
                                    <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="id_card_input" name="id_card_input" required
                                    maxlength="13">
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="address" class="form-label">อยู่บ้าน/สำนักงานเลขที่ <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="road" class="form-label">ถนน</label>
                                <input type="text" class="form-control" id="road" name="road">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="subdistrict" class="form-label">ตำบล/แขวง <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="subdistrict" name="subdistrict" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="district" class="form-label">อำเภอ <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="district" name="district" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="province" class="form-label">จังหวัด <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="province" name="province" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="telephone" class="form-label">โทรศัพท์ <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="telephone" name="telephone" required
                                    maxlength="10">
                            </div>
                        </div>

                        <br>

                        <div>
                            <p><strong>1. </strong>ดำเนินการจัดตั้งสถานที่สะสมอาหาร </p>
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="operation_area" class="form-label">มีพื้นที่ประกอบการ (ตารางเมตร)</label>
                                <input type="number" class="form-control" id="operation_area" name="operation_area"
                                    required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="annual_fee" class="form-label">ค่าธรรมเนียม (บาทต่อปี)</label>
                                <input type="number" class="form-control" id="annual_fee" name="annual_fee" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="receipt_number" class="form-label">ใบเสร็จรับเงินเลขที่</label>
                                <input type="text" class="form-control" id="receipt_number" name="receipt_number"
                                    required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="receipt_date" class="form-label">วัน/เดือน/ปี</label>
                                <input type="date" class="form-control" id="receipt_date" name="receipt_date"
                                    required>
                            </div>

                            <div class="col-md-9 mb-3">
                                <label for="business_name" class="form-label">โดยใช้ชื่อสถานที่ประกอบกิจการว่า</label>
                                <input type="text" class="form-control" id="business_name" name="business_name"
                                    required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="worker_count" class="form-label">จำนวนคนงาน (คน)</label>
                                <input type="number" class="form-control" id="worker_count" name="worker_count"
                                    required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="business_address_no" class="form-label">ตั้งอยู่ ณ เลขที่</label>
                                <input type="text" class="form-control" id="business_address_no"
                                    name="business_address_no" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="business_village_no" class="form-label">หมู่ที่</label>
                                <input type="text" class="form-control" id="business_village_no"
                                    name="business_village_no" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="business_subdistrict" class="form-label">ตำบล</label>
                                <input type="text" class="form-control" id="business_subdistrict"
                                    name="business_subdistrict" value="หนองซ้ำซาก" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="business_district" class="form-label">อำเภอ</label>
                                <input type="text" class="form-control" id="business_district"
                                    name="business_district" value="บ้านบึง" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="business_province" class="form-label">จังหวัด</label>
                                <input type="text" class="form-control" id="business_province"
                                    name="business_province" value="ชลบุรี" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="business_telephone" class="form-label">โทรศัพท์</label>
                                <input type="text" class="form-control" id="business_telephone"
                                    name="business_telephone" required maxlength="10">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="business_fax" class="form-label">โทรสาร</label>
                                <input type="text" class="form-control" id="business_fax" name="business_fax"
                                    maxlength="10">
                            </div>
                        </div>

                        <br>

                        <div>
                            <p><strong>ข้อ 2. </strong>ผู้ได้รับใบอนุญาตต้องปฏิบัติตามเงื่อนไข ดังต่อไปนี้</p>
                            <p>1. ต้องปฏิบัติตามเทศบัญญัติเทศบาลตำบลหนองซ้ำซาก ว่าด้วยสถานที่จำหน่ายอาหารและสถานที่สะสมอาหาร
                                พ.ศ. 2559</p>
                        </div>

                        <br>

                        <div class="text-center w-full border mt-3">
                            <button type="submit" class="btn btn-primary w-100 py-1"><i
                                    class="fa-solid fa-file-arrow-up me-2"></i></i>
                                ส่งฟอร์มข้อมูล</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/multipart_files.js') }}"></script>
@endsection
