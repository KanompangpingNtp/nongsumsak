<!-- Sidebar -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('AdminIndex') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <i class='bx bx-clipboard-detail' style="font-size: 30px;"></i>
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2" style="font-size: 21px;">ระบบใบอนุญาติ</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <ul class="menu-inner py-1">

        <li class="menu-header small text-uppercase"><span class="menu-header-text">menu</span></li>

        @if (Auth::user()->level == 'admin')
            <li class="menu-item {{ request()->is('admin/food_storage_license*') ? 'active open' : '' }}">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class='menu-icon tf-icons bx bx-folder'></i>
                    <div data-i18n="User interface" class="text-truncate">ใบอนุญาตสะสมอาหาร</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->is('admin/food_storage_license/form') ? 'active' : '' }}">
                        <a href="{{ route('FoodStorageLicenseFormPage') }}" class="menu-link">
                            <div>นำเข้าคำร้อง</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/food_storage_license/showdata') ? 'active' : '' }}">
                        <a href="{{ route('FoodStorageLicenseAdminShowData') }}" class="menu-link">
                            <div>รับเรื่อง</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/food_storage_license/appointment') ? 'active' : '' }}">
                        <a href="{{ route('FoodStorageLicenseAdminAppointment') }}" class="menu-link">
                            <div>การนัดหมาย</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/food_storage_license/explore') ? 'active' : '' }}">
                        <a href="{{ route('FoodStorageLicenseAdminExplore') }}" class="menu-link">
                            <div>ออกสำรวจ</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/food_storage_license/payment') ? 'active' : '' }}">
                        <a href="{{ route('FoodStorageLicenseAdminPayment') }}" class="menu-link">
                            <div>ชำระเงิน</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/food_storage_license/approve') ? 'active' : '' }}">
                        <a href="{{ route('FoodStorageLicenseAdminApprove') }}" class="menu-link">
                            <div>ออกใบอนุญาต</div>
                        </a>
                    </li>

                    <li class="menu-item {{ request()->is('admin/food_storage_license/expire') ? 'active' : '' }}">
                        <a href="{{ route('FoodStorageLicenseExpire') }}" class="menu-link">
                            <div>ใบอนุญาตใกล้หมดอายุ</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item {{ request()->is('admin/health_hazard_applications*') ? 'active open' : '' }}">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class='menu-icon tf-icons bx bx-folder'></i>
                    <div data-i18n="User interface" class="text-truncate">ใบอนุญาตประกอบกิจการที่เป็นอันตรายต่อสุขภาพ
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

            <li class="menu-item {{ request()->is('') ? 'active open' : '' }}">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class='menu-icon tf-icons bx bx-folder'></i>
                    <div data-i18n="User interface" class="text-truncate">ใบอนุญาตจัดตั้งตลาด</div>
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
            </li>

            <li class="menu-item {{ request()->is('') ? 'active open' : '' }}">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class='menu-icon tf-icons bx bx-folder'></i>
                    <div data-i18n="User interface" class="text-truncate">ประกอบกิจการรับทำการเก็บ ขน หรือ กำจัดสิ่งปฏิกูลหรือมูลฝอย</div>
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
            </li>
        @endif

        @if (Auth::user()->level == 'user')
        @endif

    </ul>
</aside>
<!-- / Sidebar -->
