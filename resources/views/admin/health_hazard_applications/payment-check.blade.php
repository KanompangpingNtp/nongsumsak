@extends('dashboard.layouts.master')
@section('content')

<div class="row">
    <div class="">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center mb-4">แบบคำร้องใบอนุญาตประกอบกิจการที่เป็นอันตรายต่อสุขภาพ</h2><br>

                <form action="{{route('HealthHazardApplicationAdminPaymentSave')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $form->id }}">
                    {{-- <input type="hidden" name="file-id" value="{{ $file->id ?? '' }}"> --}}

                    <div class="row g-3 mb-3">
                        <div class="col-md-7">
                            <label for="receipt_book" class="form-label">เล่มที่ :</label>
                            <input class="form-control" type="text" id="receipt_book" name="receipt_book" required>
                        </div>
                        <div class="col-md-7">
                            <label for="receipt_number" class="form-label">เลขที่ :</label>
                            <input class="form-control" type="text" id="receipt_number" name="receipt_number" required>
                        </div>
                        <div class="col-md-7">
                            <label for="file" class="form-label">หลักฐานการชำระเงินจากผู้ใช้ : </label>
                            <input type="file" id="file" class="form-control" name="file" required>
                        </div>
                        <div class="col-md-7">
                            <label for="file_treasury" class="form-label">ใบเสร็จสำหรับกองคลัง : </label>
                            <input type="file" id="file_treasury" class="form-control" name="file_treasury">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary py-1">
                        <i class="fa fa-save"></i> ยืนยันการชำระเงิน
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('js/multipart_files.js')}}"></script>
@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
