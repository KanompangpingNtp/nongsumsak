@extends('dashboard.layouts.master')
@section('content')
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">แบบคำร้องขอจัดตั้งตลาดเอกชน <br>
                    </h2> <br>

                    <table class="table table-bordered table-striped" id="data_table">
                        <thead class="text-center">
                            <tr>
                                <th>วันที่ขอใบอนุญาต</th>
                                <th>ผู้ขอใบอนุญาต</th>
                                <th>วันที่ชำระเงิน</th>
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
                                        @if ($form->payment)
                                            {{ $form->payment->created_at }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($form->status == 7)
                                            <span class="badge rounded-pill text-primary">รอการชำระเงิน</span>
                                        @elseif($form->status == 9)
                                            <span class="badge rounded-pill text-primary">รอการตรวจสอบ</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($form->status == 9)
                                            <a href="{{ route('PrivateMarketAdminPaymentCheck', $form->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="bi bi-card-checklist"></i>
                                            </a>
                                        @endif
                                        {{-- <a href="{{ route('PrivateMarketAdminExportPDF', $form->id) }}" class="btn btn-danger btn-sm" target="_blank">
                        <i class="bi bi-file-earmark-pdf"></i>
                    </a> --}}
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
