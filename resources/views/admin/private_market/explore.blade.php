@extends('dashboard.layouts.master')
@section('content')
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">แบบคำร้องขอจัดตั้งตลาด <br>
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
                                        @if ($form->status == 6)
                                            <span class="badge rounded-pill text-primary">รอผลสำรวจ</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('PrivateMarketAdminChecklist', $form->id) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="bi bi-card-checklist"></i>
                                        </a>
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
