@extends('dashboard.layouts.master')
@section('content')
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center mb-4">แบบคำร้องขอจัดตั้งตลาดเอกชน</h2><br>
                    <div class="col-md-3 mb-3">
                        <label class="form-label d-block">ข้าพเจ้า <span class="text-danger">*</span></label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="title_name" id="person_individual"
                                value="บุคคลธรรมดา" readonly {{ $form->title_name == 'บุคคลธรรมดา' ? 'checked' : '' }}>
                            <label class="form-check-label" for="person_individual">
                                บุคคลธรรมดา
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="title_name" id="person_legal"
                                value="นิติบุคคล" {{ $form->title_name == 'นิติบุคคล' ? 'checked' : '' }}>
                            <label class="form-check-label" for="person_legal">
                                นิติบุคคล
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="full_name" class="form-label">ชื่อ - นามสกุล <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control require" id="full_name" name="full_name" readonly
                                value="{{ $form->full_name }}">
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="age" class="form-label">อายุ <span class="text-danger">*</span></label>
                            <input type="text" class="form-control require" id="age" name="age" readonly
                                value="{{ $form->age }}">
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="nationality" class="form-label">สัญชาติ <span class="text-danger">*</span></label>
                            <input type="text" class="form-control require" id="nationality" name="nationality" readonly
                                value="{{ $form->nationality }}">
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="id_card" class="form-label">เลขประจำตัวบัตรประชาชน <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control require" id="id_card" name="id_card" readonly
                                maxlength="13" value="{{ $form->id_card }}">
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="house_number" class="form-label">อยู่บ้านเลขที่ <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control require" id="house_number" name="house_number"
                                readonly value="{{ $form->house_number }}">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="road" class="form-label">ถนน</label>
                            <input type="text" class="form-control require" id="road" name="road"
                                value="{{ $form->road }}" readonly>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="village" class="form-label">หมู่ที่ <span class="text-danger">*</span></label>
                            <input type="text" class="form-control require" id="village" name="village" readonly
                                value="{{ $form->village }}">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="sub_district" class="form-label">ตำบล <span class="text-danger">*</span></label>
                            <input type="text" class="form-control require" id="sub_district" name="sub_district"
                                readonly value="{{ $form->sub_district }}">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="district" class="form-label">อำเภอ <span class="text-danger">*</span></label>
                            <input type="text" class="form-control require" id="district" name="district" readonly
                                value="{{ $form->district }}">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="province" class="form-label">จังหวัด <span class="text-danger">*</span></label>
                            <input type="text" class="form-control require" id="province" name="province" readonly
                                value="{{ $form->province }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="type_option" class="form-label" style="font-size: 15px;"><strong>1.
                                </strong>จัดตั้งตลาดประเภทที่ <span class="text-danger">*</span></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input require" type="radio" name="type_option"
                                    id="type_option_1" value="1" {{ $form->type_option == '1' ? 'checked' : '' }}
                                    required readonly>
                                <label class="form-check-label" for="type_option_1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input require" type="radio" name="type_option"
                                    id="type_option_2" value="2" {{ $form->type_option == '2' ? 'checked' : '' }}
                                    required readonly>
                                <label class="form-check-label" for="type_option_2">2</label>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="submit_address_number" class="form-label">ตั้งอยู่เลขที่ <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control require" id="submit_address_number"
                                name="submit_address_number" value="{{ $form->submit_address_number }}" required
                                readonly>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="submit_alley" class="form-label">ซอย</label>
                            <input type="text" class="form-control require" id="submit_alley" name="submit_alley"
                                value="{{ $form->submit_alley }}" readonly>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="submit_road" class="form-label">ถนน</label>
                            <input type="text" class="form-control require" id="submit_road" name="submit_road"
                                value="{{ $form->submit_road }}" readonly>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="submit_village" class="form-label">หมู่ที่</label>
                            <input type="text" class="form-control require" id="submit_village" name="submit_village"
                                value="{{ $form->submit_village }}" readonly>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="submit_sub_district" class="form-label">ตำบล <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control require" id="submit_sub_district"
                                name="submit_sub_district" value="{{ $form->submit_sub_district }}" required readonly>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="submit_district" class="form-label">อำเภอ <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control require" id="submit_district"
                                name="submit_district" value="{{ $form->submit_district }}" required readonly>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="submit_province" class="form-label">จังหวัด <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control require" id="submit_province"
                                name="submit_province" value="{{ $form->submit_province }}" required readonly>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="submit_phone" class="form-label">โทรศัพท์</label>
                            <input type="text" class="form-control require" id="submit_phone" name="submit_phone"
                                value="{{ $form->submit_phone }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="fee" class="form-label" style="font-size: 15px;"><strong>2.
                                </strong>ค่าธรรมเนียม ฉบับละ (บาท/ปี)</label>
                            <input type="text" class="form-control require" id="fee" name="fee"
                                value="{{ $form->fee }}" readonly>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="receipt_number" class="form-label">ใบเสร็จรับเงินเลขที่</label>
                            <input type="text" class="form-control require" id="receipt_number" name="receipt_number"
                                value="{{ $form->receipt_number }}" readonly>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="receipt_date" class="form-label">ลงวันที่</label>
                            <input type="date" class="form-control require" id="receipt_date" name="receipt_date"
                                value="{{ $form->receipt_date ? \Illuminate\Support\Carbon::parse($form->receipt_date)->format('Y-m-d') : '' }}"
                                readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
