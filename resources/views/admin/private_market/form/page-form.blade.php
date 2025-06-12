@extends('dashboard.layouts.master')
@section('content')
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center mb-4">แบบคำร้องขอจัดตั้งตลาด</h2><br>

                    <form action="{{ route('PrivateMarketFormCreate') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="full_name" class="form-label">ชื่อ - นามสกุล <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control require" id="full_name" name="full_name" required>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="age" class="form-label">อายุ <span class="text-danger">*</span></label>
                                <input type="text" class="form-control require" id="age" name="age" required>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="nationality" class="form-label">สัญชาติ <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control require" id="nationality" name="nationality"
                                    required>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="id_card" class="form-label">เลขประจำตัวบัตรประชาชน <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control require" id="id_card" name="id_card" required maxlength="13">
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="house_number" class="form-label">อยู่บ้านเลขที่ <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control require" id="house_number" name="house_number"
                                    required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="road" class="form-label">ถนน</label>
                                <input type="text" class="form-control require" id="road" name="road">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="village" class="form-label">หมู่ที่ <span class="text-danger">*</span></label>
                                <input type="text" class="form-control require" id="village" name="village" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="sub_district" class="form-label">ตำบล <span class="text-danger">*</span></label>
                                <input type="text" class="form-control require" id="sub_district" name="sub_district"
                                    required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="district" class="form-label">อำเภอ <span class="text-danger">*</span></label>
                                <input type="text" class="form-control require" id="district" name="district" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="province" class="form-label">จังหวัด <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control require" id="province" name="province"
                                    required>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="type_option" class="form-label" style="font-size: 15px;"><strong>1.
                                    </strong>จัดตั้งตลาดประเภทที่ <span class="text-danger">*</span></label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input require" type="radio" name="type_option"
                                        id="type_option_1" value="1" required>
                                    <label class="form-check-label" for="type_option_1">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input require" type="radio" name="type_option"
                                        id="type_option_2" value="2" required>
                                    <label class="form-check-label" for="type_option_2">2</label>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="submit_address_number" class="form-label">ตั้งอยู่เลขที่ <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control require" id="submit_address_number"
                                    name="submit_address_number" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="submit_alley" class="form-label">ซอย</label>
                                <input type="text" class="form-control require" id="submit_alley"
                                    name="submit_alley">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="submit_road" class="form-label">ถนน</label>
                                <input type="text" class="form-control require" id="submit_road" name="submit_road">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="submit_village" class="form-label">หมู่ที่</label>
                                <input type="text" class="form-control require" id="submit_village"
                                    name="submit_village">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="submit_sub_district" class="form-label">ตำบล <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control require" id="submit_sub_district"
                                    name="submit_sub_district" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="submit_district" class="form-label">อำเภอ <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control require" id="submit_district"
                                    name="submit_district" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="submit_province" class="form-label">จังหวัด <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control require" id="submit_province"
                                    name="submit_province" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="submit_phone" class="form-label">โทรศัพท์</label>
                                <input type="text" class="form-control require" id="submit_phone"
                                    name="submit_phone">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="fee" class="form-label" style="font-size: 15px;"><strong>2.
                                    </strong>ค่าธรรมเนียม ฉบับละ (บาท/ปี)</label>
                                <input type="text" class="form-control require" id="fee" name="fee">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="receipt_number" class="form-label">ใบเสร็จรับเงินเลขที่</label>
                                <input type="text" class="form-control require" id="receipt_number"
                                    name="receipt_number">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="receipt_date" class="form-label">ลงวันที่</label>
                                <input type="date" class="form-control require" id="receipt_date"
                                    name="receipt_date">
                            </div>
                        </div>

                        <br>

                        <p><strong>3. </strong>ผู้ได้รับใบอนุญาตต้องปฏิบัติตามเงื่อนไขดังต่อไปนี้</p>
                        <p> (1.) อนุญาติให้จัดตลาดวันอังคาร วันพฤหัสบดี และวันศุกร์</p>
                        <p> (2.) เวลาเปิดตลาด 15.00 น เวลปิดตลาด 19.30 น</p>

                        <br>

                        <div class="text-center w-full border mt-3">
                            <button type="submit" class="btn btn-primary w-100 py-1"><i
                                    class="fa-solid fa-file-arrow-up me-2"></i></i>ส่งฟอร์มข้อมูล</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/multipart_files.js') }}"></script>
@endsection
