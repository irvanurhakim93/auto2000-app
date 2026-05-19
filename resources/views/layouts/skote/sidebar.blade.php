<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                @if (Auth::check() && Auth::user()->hasRole('admin'))
                    <li class="menu-title" key="t-menu">Menu</li>
                    {{-- <li>
                    <a href="{{ route('home') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li> --}}
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-home-circle"></i><span class="badge rounded-pill bg-info float-end"></span>
                            <span key="t-multi-level">Dashboard</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="{{ url('dashboard_so') }}" key="t-level-2-1">Dashboard S0</a></li>
                            <li><a href="{{ url('dashboard_tad') }}" key="t-level-2-1">Dashboard TAD</a></li>
                            <li><a href="{{ url('dashboard_absen') }}" key="t-level-2-1">Dashboard Absen</a></li>
                            <li><a href="{{ url('dashboard_spkp') }}" key="t-level-2-1">Dashboard SPKP</a></li>
                            <li><a href="{{ url('dashboard_monitoring_payrol') }}" key="t-level-2-1">Dashboard
                                    Monitoring Payrol</a></li>
                            <li><a href="{{ url('dashboard_benefit_kesehatan_tad') }}" key="t-level-2-1">Dashboard
                                    Benefit Kesehatan TAD</a></li>
                            <li><a href="{{ url('dashboard_hc') }}" key="t-level-2-1">Dashboard HC</a></li>
                            <li><a href="{{ url('dashboard_resume') }}" key="t-level-2-1">Dashboard Resume</a></li>
                            <li><a href="" key="t-level-2-1">Dashboard Distribusi kontrak</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-receipt"></i>
                            <span key="t-multi-level">Metabase</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li>
                                <a href="javascript: void(0);" class="has-arrow" key="t-level-1-2">OSM</a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Akses Area Status Pegawai</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">CBP
                                            Report</a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Contract Report CBP</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">Detail Reaspon Approval Terminate</a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Employee Data CBP</div>
                                        </a></li>
                                    <li><a href=""
                                            key="t-level-2-1">Jumlah Kontrak Upload</a></li>
                                    <li><a href=""
                                            key="t-level-2-1">Payroll Non Organik</a></li>
                                    <li><a href=""
                                            key="t-level-2-1">Absen Wfh
                                            / Wfo</a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Nilai Komponen</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">So Vs Gaji</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Mutasi</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report ess</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Master Gaji Per Komponen</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Upload Komponen</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Pra Proses Payroll</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Durasi Proses Payroll</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Spesial Salary Payroll</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Employee Dokument</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Data Primar Keluarga</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Rawat Jalan</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Rawat Inap</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Data Primer Bank</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Data Primer Identitas</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Data Primer Kontak</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Benefit Asuransi</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Benefit BPJS KS</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Benefit BPJS TK</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Download Softcopy</div>
                                        </a></li>

                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Cuti BPR 3</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Lembur BPR 3</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Sakit BPR 3</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Izin BPR 3</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Master Flow Kontrak</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Absensi BPR 3</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Setting Absensi BPR 3</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report SPT 21 BPR 3</div>
                                        </a></li>
                                    <li><a href=""
                                            key="t-level-2-1">
                                            <div style="color:green;">Report Identitas Data Pelamar</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Histori Pendidikan</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Generate Payroll</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Berita & Artikel</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report SKPG</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Task</div>
                                        </a></li>
                                    <li><a href=""
                                            key="t-level-2-1">
                                            <div style="color:green;">Report Perlengkapan Kerja</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Pendaftaran BPJS KS Keluarga</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Kompensasi</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Perjalanan Dinas</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Pendaftaran BPJS Kesehatan</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Pendaftaran BPJS Ketenagakerjaan</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Pendaftaran Asuransi</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Setting Rawat Jalan & Inap</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Beban Kompensasi Metode 1</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Setting Kontrak</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Setting Dokument Kontrak</div>
                                        </a></li>
                                    <li><a href=""
                                            key="t-level-2-1">
                                            <div style="color:green;">Report monitoring Pra Pendaftaran BPJS KS</div>
                                        </a></li>
                                    <li><a href=""
                                            key="t-level-2-1">
                                            <div style="color:green;">Report monitoring Pra Pendaftaran BPJS TK BARU
                                            </div>
                                        </a></li>
                                    <li><a href=""
                                            key="t-level-2-1">
                                            <div style="color:green;">Report monitoring Pra Pendaftaran BPJS TK BARU
                                                Keluar
                                            </div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Monitoring Lanjutan BPJS TK
                                            </div>
                                        </a></li>
                                    <li><a href=""
                                            key="t-level-2-1">
                                            <div style="color:green;">Report Upload Dokumen Benefit
                                            </div>
                                        </a></li>
                                    <li><a href=""
                                            key="t-level-2-1">
                                            <div style="color:green;">Report Master Shift
                                            </div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Lokasi Absen
                                            </div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Upah
                                            </div>
                                        </a></li>

                                    {{-- <li><a href="{{ route('metabase.osms.prapendaftaranbpjsks') }}" key="t-level-2-1">
                                            <div style="color:green;">Report monitoring Pra Pendaftaran  BPJS KS</div>
                                        </a></li>
                                        <li><a href="{{ route('metabase.osms.prapendaftaranbpjstk') }}"
                                            key="t-level-2-1">
                                            <div style="color:green;">Report monitoring Pra Pendaftaran BPJS TK BARU
                                            </div>
                                        </a></li> --}}
				<li><a href="" key="t-level-2-1"><div style="color:green;">Report Master All</div></a></li>
				<li><a href="" key="t-level-2-1">
                                <div style="color:green;">List Activity RM</div>
                                        </a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow" key="t-level-1-2">Bom</a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="" key="t-level-2-1">MPP FIF</a>
                                    </li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Akses Area Bisnis</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Akses Area Client</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Akses Area Client 2</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">Jumlah
                                            New Hire</a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Marketing SO Report</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Master Cabang Client</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Master Client</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">Master
                                            Company</a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Master Network</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Master Job Posisi</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Job Spesifikasi</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">Mutasi
                                            PE</a></li>
                                    <li><a href="" key="t-level-2-1">Proses Perpanjangan BPO</a></li>
                                    <li><a href="" key="t-level-2-1">Proses Perpanjangan PE</a></li>
                                    <li><a href="" key="t-level-2-1">Report SO Approval</a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Terminate</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Search</div>
                                        </a></li>
                                    <li><a href=""
                                            key="t-level-2-1">Employee LOB CC</a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Usulan NS</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report CQMS</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Offering SO</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report SO BPO</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Kebutuhan Usulan NS</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">CQMS Dinamis v.1</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Aktifitas Pelamar Seleksi v.1</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">kebutuhan vs
                                            hire</a></li>
                                    <li><a href="" key="t-level-2-1">Report BPJS
                                            Kesehatan v.0</a></li>
                                    <li><a href="" key="t-level-2-1">Report
                                            Master Gaji Per Komponen</a></li>
                                    <li><a href="" key="t-level-2-1">Aktual
                                            Layanan - Invoice LOB CC</a></li>
                                    <li><a href=""
                                            key="t-level-2-1">Dashboard contact center</a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Employee Assignment BPO</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">Report
                                            Order
                                            VN</a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report ReHire</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">report VN Order</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">report PROSES THR</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Log Send Payrol</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report employee family</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Offering Usulan</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Monitoring CR 9</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Invalid SO</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Komponen Benefit Ireguler (Rawat Jalan &
                                                Rawat Inap)</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Asuransi ESS</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Job Order</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report SLA</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Monitoring SO Minus</div>
                                        </a></li>

                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow" key="t-level-1-2">Legal</a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Master PKS</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Master SPKP</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">REPORT PKS TRAINING</div>
                                        </a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow" key="t-level-1-2">Ors</a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Task Recruitment</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Invalid Status RO</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Ativitas Seleksi Rekruitment</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">QA Offering</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">QA Tahap Seleksi</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Master Job Class Posisi</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Task Sourching</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Target Buffer</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report Penugasan Sourching</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Pelamar ORS (Identitas)</div>
                                        </a></li>
					<li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Pelamar ORS (Operasional)</div>
                                        </a></li>

                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Report RO Line</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Master Kota</div>
                                        </a></li>
                                    <li><a href=""
                                            key="t-level-2-1">
                                            <div style="color:green;">Performance Prosegur Cash Indonesia</div>
                                        </a></li>
                                    <li><a href=""
                                            key="t-level-2-1">
                                            <div style="color:green;"> Master Job Classification</div>
                                        </a></li>
                                    <li><a href=""
                                            key="t-level-2-1">
                                            <div style="color:green;"> RO Line Invalid</div>
                                        </a></li>
                                     <li><a href=""
                                            key="t-level-2-1">
                                            <div style="color:green;">Hiring Candidate Feedback</div>
                                        </a></li>
                                     <li><a href=""
                                            key="t-level-2-1">
                                            <div style="color:green;">Performa Sourcing</div>
                                        </a></li>
                                <li><a href="" key="t-level-2-1"><div style="color:green;">Summary Rejected Hiring Status</div></a></li>                               
				<li><a href="" key="t-level-2-1"><div style="color:green;">Fullfillment By Client</div></a></li>
				<li><a href="" key="t-level-2-1"><div style="color:green;">Job Vacancy</div></a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow" key="t-level-1-2">Billing</a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href=""
                                            key="t-level-2-1">
                                            <div style="color:green;">Rekap Beban Faktur Invoice</div>
                                        </a></li>
                                    <li><a href=""
                                            key="t-level-2-1">
                                            <div style="color:green;">Rekap Beban Pengiriman Invoice</div>
                                        </a></li>
                                    <li><a href="" key="t-level-2-1">
                                            <div style="color:green;">Rekap Beban Pengiriman Invoice</div>
                                        </a></li>
                                    <li><a href=""
                                            key="t-level-2-1">
                                            <div style="color:green;">Rekap Beban Ekspedisi Invoice</div>
                                        </a></li>
                                    <li><a href=""
                                            key="t-level-2-1">
                                            <div style="color:green;">Rekap Beban Penerimaan Invoice</div>
                                        </a></li>


                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow" key="t-level-1-2">Kiss</a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href=""
                                            key="t-level-2-1">
                                            <div style="color:green;">Report KISS - SPW PNK</div>
                                        </a></li>
                                     


                                </ul>
                            </li>
                        </ul>
                    </li>
                    {{-- test --}}

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-user"></i>
                            <span key="t-multi-level">Users</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="" key="t-level-2-1">List</a></li>
                            <li><a href="" key="t-level-2-1">Create</a></li>
                            {{-- role --}}
                            <li><a href="" key="t-level-2-1">Role</a></li>
                            <li><a href="" key="t-level-2-1">Master Area</a></li>

                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-briefcase"></i> <!-- Business / ERP -->
                            <span class="badge rounded-pill bg-info float-end"></span>
                            <span key="t-multi-level">ERP</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="" key="t-level-2-1">OUTSTANDING INVOICE</a>
                            </li>
                            {{-- <li><a href="{{ url('dashboard_tad') }}" key="t-level-2-1">Dashboard TAD</a></li>
                            <li><a href="{{ route('home') }}" key="t-level-2-1">Dashboard Distribusi kontrak</a></li> --}}
                        </ul>
                    </li>
                @else
                    @include('layouts.skote.menu_mapping')
                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
