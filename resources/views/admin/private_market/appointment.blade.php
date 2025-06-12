@extends('dashboard.layouts.master')
@section('content')
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">แบบคำร้องขอจัดตั้งตลาดเอกชน <br>
                        <h3 class="text-center">ตารางแสดงข้อมูลฟอร์มที่ส่งเข้ามา</h3>
                    </h2> <br>

                    <table class="table table-bordered table-striped" id="data_table">
                        <thead class="text-center">
                            <tr>
                                <th>วันที่ขอใบอนุญาต</th>
                                <th>ผู้ขอใบอนุญาต</th>
                                <th>วันที่นัดหมาย</th>
                                <th>วันที่สะดวก</th>
                                <th>สถานะ</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($forms as $form)
                                <tr>
                                    <td class="date-column">{{ $form->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $form->salutation }} {{ $form->full_name }}</td>
                                    <td>
                                        @if ($form->appointmentte)
                                            {{ $form->appointmentte->date_admin }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($form->appointmentte)
                                            {{ $form->appointmentte->date_user }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($form->status == 3)
                                            <span class="badge rounded-pill text-primary">รอการนัดหมาย</span>
                                        @elseif($form->status == 4)
                                            <span class="badge rounded-pill text-primary">รอยืนยันนัดหมาย</span>
                                        @elseif($form->status == 5)
                                            <span class="badge rounded-pill text-warning">นัดหมายใหม่</span>
                                        @elseif($form->status == 8)
                                            <span
                                                class="badge rounded-pill text-warning">ผลสำรวจไม่ผ่านรอการนัดหมายใหม่</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($form->status != 4)
                                            <a href="{{ route('PrivateMarketAdminCalendar', $form->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="bi bi-calendar-check"></i>
                                            </a>
                                        @endif

                                        <a href="{{ route('PrivateMarketAdminDetail', $form->id) }}"
                                            class="btn btn-success btn-sm">
                                            <i class="bi bi-search"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/datatable.js') }}"></script>
@endsection
