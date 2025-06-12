@extends('dashboard.layouts.master')
@section('content')
    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ $message }}',
            })
        </script>
    @endif

    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center mb-4">แบบคำร้องใบอนุญาตจัดตั้งสถานที่สะสมอาหาร</h2>

                    <form action="{{ route('FoodCollectionAdminConfirmSave') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-md-3 mb-3">
                            <label class="form-label d-block">ข้าพเจ้า <span class="text-danger">*</span></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="title_name" id="person_individual"
                                    value="บุคคลธรรมดา" {{ $form->title_name == 'บุคคลธรรมดา' ? 'checked' : '' }} readonly>
                                <label class="form-check-label" for="person_individual">บุคคลธรรมดา</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="title_name" id="person_legal"
                                    value="นิติบุคคล" {{ $form->title_name == 'นิติบุคคล' ? 'checked' : '' }} readonly>
                                <label class="form-check-label" for="person_legal">นิติบุคคล</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="full_name" class="form-label">ชื่อ<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="full_name" name="full_name"
                                    value="{{ $form->full_name }}" readonly>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="age" class="form-label">อายุ <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="age" name="age"
                                    value="{{ $form->age }}" readonly>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="nationality" class="form-label">สัญชาติ <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nationality" name="nationality"
                                    value="{{ $form->nationality }}" readonly>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="registration_number" class="form-label">จดทะเบียนเลขที่ <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="registration_number"
                                    name="registration_number" value="{{ $form->registration_number }}" readonly>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="address" class="form-label">อยู่บ้าน/สำนักงานเลขที่ <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ $form->address }}" readonly>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="road" class="form-label">ถนน</label>
                                <input type="text" class="form-control" id="road" name="road"
                                    value="{{ $form->road }}" readonly>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="subdistrict" class="form-label">ตำบล/แขวง <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="subdistrict" name="subdistrict"
                                    value="{{ $form->subdistrict }}" readonly>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="district" class="form-label">อำเภอ <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="district" name="district"
                                    value="{{ $form->district }}" readonly>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="province" class="form-label">จังหวัด <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="province" name="province"
                                    value="{{ $form->province }}" readonly>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="telephone" class="form-label">โทรศัพท์ <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="telephone" name="telephone"
                                    value="{{ $form->telephone }}" readonly>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="operation_area" class="form-label">มีพื้นที่ประกอบการ (ตารางเมตร)</label>
                                <input type="number" class="form-control" id="operation_area" name="operation_area"
                                    value="{{ $form->details->operation_area }}" readonly>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="annual_fee" class="form-label">ค่าธรรมเนียม (บาทต่อปี)</label>
                                <input type="number" class="form-control" id="annual_fee" name="annual_fee"
                                    value="{{ $form->details->annual_fee }}" readonly>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="receipt_number" class="form-label">ใบเสร็จรับเงินเลขที่</label>
                                <input type="text" class="form-control" id="receipt_number" name="receipt_number"
                                    value="{{ $form->details->receipt_number }}" readonly>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="receipt_date" class="form-label">วัน/เดือน/ปี</label>
                                <input type="date" class="form-control" id="receipt_date" name="receipt_date"
                                    value="{{ $form->details->receipt_date }}" readonly>
                            </div>

                            <div class="col-md-9 mb-3">
                                <label for="business_name" class="form-label">โดยใช้ชื่อสถานที่ประกอบกิจการว่า</label>
                                <input type="text" class="form-control" id="business_name" name="business_name"
                                    value="{{ $form->details->business_name }}" readonly>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="worker_count" class="form-label">จำนวนคนงาน (คน)</label>
                                <input type="number" class="form-control" id="worker_count" name="worker_count"
                                    value="{{ $form->details->worker_count }}" readonly>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="business_address_no" class="form-label">ตั้งอยู่ ณ เลขที่</label>
                                <input type="text" class="form-control" id="business_address_no"
                                    name="business_address_no" value="{{ $form->details->address_no }}" readonly>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="business_village_no" class="form-label">หมู่ที่</label>
                                <input type="text" class="form-control" id="business_village_no"
                                    name="business_village_no" value="{{ $form->details->village_no }}" readonly>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="business_subdistrict" class="form-label">ตำบล</label>
                                <input type="text" class="form-control" id="business_subdistrict"
                                    name="business_subdistrict" value="{{ $form->details->subdistrict }}" readonly>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="business_district" class="form-label">อำเภอ</label>
                                <input type="text" class="form-control" id="business_district"
                                    name="business_district" value="{{ $form->details->district }}" readonly>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="business_province" class="form-label">จังหวัด</label>
                                <input type="text" class="form-control" id="business_province"
                                    name="business_province" value="{{ $form->details->province }}" readonly>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="business_telephone" class="form-label">โทรศัพท์</label>
                                <input type="text" class="form-control" id="business_telephone"
                                    name="business_telephone" value="{{ $form->details->telephone }}" readonly>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="business_fax" class="form-label">โทรสาร</label>
                                <input type="text" class="form-control" id="business_fax" name="business_fax"
                                    value="{{ $form->details->fax }}" readonly>
                            </div>
                        </div>

                        <input type="hidden" name="result" value="1">

                        <br>
                        <button type="submit" class="btn btn-primary py-1">
                            <i class="fa fa-save"></i></i> บันทึกข้อมูล</button>
                        <input type="hidden" name="id" value="{{ old('id', $form->id) }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
