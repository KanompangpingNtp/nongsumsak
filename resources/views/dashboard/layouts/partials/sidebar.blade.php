<!-- Sidebar -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('AdminIndex') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <i class='bx bx-clipboard-detail' style="font-size: 30px;"></i>
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2" style="font-size: 21px;">ระบบใบอนุญาต</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <ul class="menu-inner py-1">

        <li class="menu-header small text-uppercase"><span class="menu-header-text">menu</span></li>

        @if (Auth::user()->level == 'admin')
            <li class="menu-item {{ request()->is('admin/health_hazard_applications*') ? 'active open' : '' }}">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class='menu-icon tf-icons bx bx-folder'></i>
                    <div data-i18n="User interface" class="text-truncate">ประกอบกิจการที่เป็นอันตรายต่อสุขภาพ
                    </div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->is('admin/health_hazard_applications/form') ? 'active' : '' }}">
                        <a href="{{ route('HealthHazardApplicationFormPage') }}" class="menu-link">
                            <div>นำเข้าคำร้อง</div>
                        </a>
                    </li>

                    <li
                        class="menu-item {{ request()->is('admin/health_hazard_applications/showdata*') ? 'active' : '' }}">
                        <a href="{{ route('HealthHazardApplicationAdminShowData') }}" class="menu-link">
                            <div>รับเรื่อง</div>
                        </a>
                    </li>

                    <li
                        class="menu-item {{ request()->is('admin/health_hazard_applications/appointment') ? 'active' : '' }}">
                        <a href="{{ route('HealthHazardApplicationAdminAppointment') }}" class="menu-link">
                            <div>การนัดหมาย</div>
                        </a>
                    </li>

                    <li
                        class="menu-item {{ request()->is('admin/health_hazard_applications/explore') ? 'active' : '' }}">
                        <a href="{{ route('HealthHazardApplicationAdminExplore') }}" class="menu-link">
                            <div>ออกสำรวจ</div>
                        </a>
                    </li>

                    <li
                        class="menu-item {{ request()->is('admin/health_hazard_applications/payment') ? 'active' : '' }}">
                        <a href="{{ route('HealthHazardApplicationAdminPayment') }}" class="menu-link">
                            <div>ชำระเงิน</div>
                        </a>
                    </li>

                    <li
                        class="menu-item {{ request()->is('admin/health_hazard_applications/approve') ? 'active' : '' }}">
                        <a href="{{ route('HealthHazardApplicationAdminApprove') }}" class="menu-link">
                            <div>ออกใบอนุญาต</div>
                        </a>
                    </li>

                    <li
                        class="menu-item {{ request()->is('admin/health_hazard_applications/expire') ? 'active' : '' }}">
                        <a href="{{ route('CertificateHealthHazardApplicationExpire') }}" class="menu-link">
                            <div>ใบอนุญาตใกล้หมดอายุ</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item {{ request()->is('admin/food_sales*') ? 'active open' : '' }}">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class='menu-icon tf-icons bx bx-folder'></i>
                    <div data-i18n="User interface" class="text-truncate">จัดตั้งสถานที่จำหน่ายอาหาร</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->is('admin/food_sales/form') ? 'active' : '' }}">
                        <a href="{{ route('FoodSalesFrom') }}" class="menu-link">
                            <div>นำเข้าคำร้อง</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/food_sales/showdata') ? 'active' : '' }}">
                        <a href="{{ route('FoodSalesAdminShowData') }}" class="menu-link">
                            <div>รับเรื่อง</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/food_sales/appointment*') ? 'active' : '' }}">
                        <a href="{{ route('FoodSalesAdminAppointment') }}" class="menu-link">
                            <div>การนัดหมาย</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/food_sales/explore') ? 'active' : '' }}">
                        <a href="{{ route('FoodSalesAdminExplore') }}" class="menu-link">
                            <div>ออกสำรวจ</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/food_sales/payment*') ? 'active' : '' }}">
                        <a href="{{ route('FoodSalesAdminPayment') }}" class="menu-link">
                            <div>ชำระเงิน</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/food_sales/approve') ? 'active' : '' }}">
                        <a href="{{ route('FoodSalesAdminApprove') }}" class="menu-link">
                            <div>ออกใบอนุญาต</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/food_sales/expire') ? 'active' : '' }}">
                        <a href="{{ route('CertificateFoodSalesExpire') }}" class="menu-link">
                            <div>ใบอนุญาตใกล้หมดอายุ</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item {{ request()->is('admin/food_collection*') ? 'active open' : '' }}">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class='menu-icon tf-icons bx bx-folder'></i>
                    <div data-i18n="User interface" class="text-truncate">จัดตั้งสถานที่สะสมอาหาร</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->is('admin/food_collection/form') ? 'active' : '' }}">
                        <a href="{{ route('FoodCollectionFrom') }}" class="menu-link">
                            <div>นำเข้าคำร้อง</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/food_collection/showdata') ? 'active' : '' }}">
                        <a href="{{ route('FoodCollectionAdminShowData') }}" class="menu-link">
                            <div>รับเรื่อง</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/food_collection/appointment') ? 'active' : '' }}">
                        <a href="{{ route('FoodCollectionAdminAppointment') }}" class="menu-link">
                            <div>การนัดหมาย</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/food_collection/explore') ? 'active' : '' }}">
                        <a href="{{ route('FoodCollectionAdminExplore') }}" class="menu-link">
                            <div>ออกสำรวจ</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/food_collection/payment') ? 'active' : '' }}">
                        <a href="{{ route('FoodCollectionAdminPayment') }}" class="menu-link">
                            <div>ชำระเงิน</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/food_collection/approve') ? 'active' : '' }}">
                        <a href="{{ route('FoodCollectionAdminApprove') }}" class="menu-link">
                            <div>ออกใบอนุญาต</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/food_collection/expire') ? 'active' : '' }}">
                        <a href="{{ route('CertificateFoodCollectionExpire') }}" class="menu-link">
                            <div>ใบอนุญาตใกล้หมดอายุ</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item {{ request()->is('admin/private_market*') ? 'active open' : '' }}">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class='menu-icon tf-icons bx bx-folder'></i>
                    <div data-i18n="User interface" class="text-truncate">แบบคำร้องขอจัดตั้งตลาด</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->is('admin/private_market/form') ? 'active' : '' }}">
                        <a href="{{ route('PrivateMarketForm') }}" class="menu-link">
                            <div>นำเข้าคำร้อง</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/private_market/showdata') ? 'active' : '' }}">
                        <a href="{{ route('PrivateMarketAdminShowData') }}" class="menu-link">
                            <div>รับเรื่อง</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/private_market/appointment') ? 'active' : '' }}">
                        <a href="{{ route('PrivateMarketAdminAppointment') }}" class="menu-link">
                            <div>การนัดหมาย</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/private_market/explore') ? 'active' : '' }}">
                        <a href="{{ route('PrivateMarketAdminExplore') }}" class="menu-link">
                            <div>ออกสำรวจ</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/private_market/payment') ? 'active' : '' }}">
                        <a href="{{ route('PrivateMarketAdminPayment') }}" class="menu-link">
                            <div>ชำระเงิน</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/private_market/approve') ? 'active' : '' }}">
                        <a href="{{ route('PrivateMarketAdminApprove') }}" class="menu-link">
                            <div>ออกใบอนุญาต</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/private_market/expire') ? 'active' : '' }}">
                        <a href="{{ route('CertificatePrivateMarketExpire') }}" class="menu-link">
                            <div>ใบอนุญาตใกล้หมดอายุ</div>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- <li class="menu-item {{ request()->is('') ? 'active open' : '' }}">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class='menu-icon tf-icons bx bx-folder'></i>
                    <div data-i18n="User interface" class="text-truncate">ประกอบกิจการรับทำการเก็บ ขน ขยะ</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->is('') ? 'active' : '' }}">
                        <a href="" class="menu-link">
                            <div>นำเข้าคำร้อง</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('') ? 'active' : '' }}">
                        <a href="" class="menu-link">
                            <div>รับเรื่อง</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('') ? 'active' : '' }}">
                        <a href="" class="menu-link">
                            <div>การนัดหมาย</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('') ? 'active' : '' }}">
                        <a href="" class="menu-link">
                            <div>ออกสำรวจ</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('') ? 'active' : '' }}">
                        <a href="" class="menu-link">
                            <div>ชำระเงิน</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('') ? 'active' : '' }}">
                        <a href="" class="menu-link">
                            <div>ออกใบอนุญาต</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('') ? 'active' : '' }}">
                        <a href="" class="menu-link">
                            <div>ใบอนุญาตใกล้หมดอายุ</div>
                        </a>
                    </li>
                </ul>
            </li> --}}
        @endif

        @if (Auth::user()->level == 'user')
        @endif

    </ul>
</aside>
<!-- / Sidebar -->
