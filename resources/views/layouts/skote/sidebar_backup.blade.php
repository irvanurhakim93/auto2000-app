<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
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
                        <li><a href="{{ route('home') }}" key="t-level-2-1">Dashboard Distribusi kontrak</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-receipt"></i>
                        <span key="t-multi-level">Metabase</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow"
                                key="t-level-1-2">OSM</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('metabase.osms.aksesareastatuspegawai') }}" key="t-level-2-1"><div style="color:green;">Akses Area Status Pegawai</div></a></li>
                                <li><a href="{{ route('metabase.osms.cbpreport') }}" key="t-level-2-1">CBP Report</a></li>
                                <li><a href="{{ route('metabase.osms.contactreportcbp') }}" key="t-level-2-1"><div style="color:green;">Contract Report CBP</div></a></li>
                                <li><a href="{{ route('metabase.osms.detailreasonapproveterminate') }}" key="t-level-2-1">Detail Reaspon Approval Terminate</a></li>
                                <li><a href="{{ route('metabase.osms.employeedatacbp') }}" key="t-level-2-1"><div style="color:green;">Employee Data CBP</div></a></li>
                                <li><a href="{{ route('metabase.osms.jumlahkontrakupload') }}" key="t-level-2-1">Jumlah Kontrak Upload</a></li>
                                <li><a href="{{ route('metabase.osms.payrollnonorganik') }}" key="t-level-2-1">Payroll Non Organik</a></li>
                                <li><a href="{{ route('metabase.osms.absenwfhwfo') }}" key="t-level-2-1">Absen Wfh / Wfo</a></li>
                                <li><a href="{{ route('metabase.osms.reportnilaikomponen') }}" key="t-level-2-1"><div style="color:green;">Report Nilai Komponen</div></a></li>
                                <li><a href="{{ route('metabase.boms.sogaji') }}" key="t-level-2-1"><div style="color:green;">So Vs Gaji</div></a></li>
                                <li><a href="{{ route('metabase.boms.reportmutasi') }}" key="t-level-2-1"><div style="color:green;">Report Mutasi</div></a></li>
                                <li><a href="{{ route('metabase.osms.reportess') }}" key="t-level-2-1"><div style="color:green;">Report ess</div></a></li>
                                <li><a href="{{ route('metabase.osms.mstgajiperkomp') }}" key="t-level-2-1"><div style="color:green;">Master Gaji Per Komponen</div></a></li>
                                <li><a href="{{ route('metabase.osms.uploadkomp') }}" key="t-level-2-1"><div style="color:green;">Upload Komponen</div></a></li>
                                <li><a href="{{ route('metabase.osms.praprpayroll') }}" key="t-level-2-1"><div style="color:green;">Pra Proses Payroll</div></a></li>
                                <li><a href="{{ route('metabase.osms.durasiprpayroll') }}" key="t-level-2-1"><div style="color:green;">Durasi Proses Payroll</div></a></li>
                                <li><a href="{{ route('metabase.osms.spcsalarypayroll') }}" key="t-level-2-1"><div style="color:green;">Report Spesial Salary Payroll</div></a></li>
                                <li><a href="{{ route('metabase.osms.employeedokument') }}" key="t-level-2-1"><div style="color:green;">Report Employee Dokument</div></a></li>
                                <li><a href="{{ route('metabase.osms.dataprimkel') }}" key="t-level-2-1"><div style="color:green;">Report Data Primar Keluarga</div></a></li>
                                <li><a href="{{ route('metabase.osms.rawatjalan') }}" key="t-level-2-1"><div style="color:green;">Report Rawat Jalan</div></a></li>
                                <li><a href="{{ route('metabase.osms.rawatinap') }}" key="t-level-2-1"><div style="color:green;">Report Rawat Inap</div></a></li>
                                <li><a href="{{ route('metabase.osms.dataprimbank') }}" key="t-level-2-1"><div style="color:green;">Report Data Primer Bank</div></a></li>
                                <li><a href="{{ route('metabase.osms.dataprimident') }}" key="t-level-2-1"><div style="color:green;">Report Data Primer Identitas</div></a></li>
                                <li><a href="{{ route('metabase.osms.dataprimkontak') }}" key="t-level-2-1"><div style="color:green;">Report Data Primer Kontak</div></a></li>
                                <li><a href="{{ route('metabase.osms.benefitasuransi') }}" key="t-level-2-1"><div style="color:green;">Report Benefit Asuransi</div></a></li>
                                <li><a href="{{ route('metabase.osms.benefitbpjsks') }}" key="t-level-2-1"><div style="color:green;">Report Benefit BPJS KS</div></a></li>
                                <li><a href="{{ route('metabase.osms.benefitbpjstk') }}" key="t-level-2-1"><div style="color:green;">Report Benefit BPJS TK</div></a></li>
                                <li><a href="{{ route('metabase.osms.downloadsoftcopy') }}" key="t-level-2-1"><div style="color:green;">Report Download Softcopy</div></a></li>
								
								<li><a href="{{ route('metabase.osms.cutibpr3') }}" key="t-level-2-1"><div style="color:green;">Report Cuti BPR 3</div></a></li>
								<li><a href="{{ route('metabase.osms.lemburbpr3') }}" key="t-level-2-1"><div style="color:green;">Report Lembur BPR 3</div></a></li>
								<li><a href="{{ route('metabase.osms.sakitbpr3') }}" key="t-level-2-1"><div style="color:green;">Report Sakit BPR 3</div></a></li>
								<li><a href="{{ route('metabase.osms.izinbpr3') }}" key="t-level-2-1"><div style="color:green;">Report Izin BPR 3</div></a></li>
								<li><a href="{{ route('metabase.osms.flowkontrak') }}" key="t-level-2-1"><div style="color:green;">Report Master Flow Kontrak</div></a></li>
								<li><a href="{{ route('metabase.osms.absensibpr3') }}" key="t-level-2-1"><div style="color:green;">Report Absensi BPR 3</div></a></li>
								<li><a href="{{ route('metabase.osms.settingabsensibpr3') }}" key="t-level-2-1"><div style="color:green;">Report Setting Absensi BPR 3</div></a></li>
								<li><a href="{{ route('metabase.osms.spt21bpr3') }}" key="t-level-2-1"><div style="color:green;">Report SPT 21 BPR 3</div></a></li>
								<li><a href="{{ route('metabase.osms.identitaspelamarbpr3') }}" key="t-level-2-1"><div style="color:green;">Report Identitas Data Pelamar</div></a></li>
								<li><a href="{{ route('metabase.osms.pendidikanbpr3') }}" key="t-level-2-1"><div style="color:green;">Report Histori Pendidikan</div></a></li>
								<li><a href="{{ route('metabase.osms.generatepayroll') }}" key="t-level-2-1"><div style="color:green;">Report Generate Payroll</div></a></li>
								<li><a href="{{ route('metabase.osms.beritaartikel') }}" key="t-level-2-1"><div style="color:green;">Report Berita & Artikel</div></a></li>
								<li><a href="{{ route('metabase.osms.skpgbpr3') }}" key="t-level-2-1"><div style="color:green;">Report SKPG</div></a></li>
								<li><a href="{{ route('metabase.osms.taskbpr3') }}" key="t-level-2-1"><div style="color:green;">Report Task</div></a></li>
								<li><a href="{{ route('metabase.osms.perlengkapankerjabpr3') }}" key="t-level-2-1"><div style="color:green;">Report Perlengkapan Kerja</div></a></li>
								<li><a href="{{ route('metabase.osms.bpjskskeluargabpr3') }}" key="t-level-2-1"><div style="color:green;">Report Pendaftaran BPJS KS Keluarga</div></a></li>
								<li><a href="{{ route('metabase.osms.kompensasi') }}" key="t-level-2-1"><div style="color:green;">Report Kompensasi</div></a></li>
								<li><a href="{{ route('metabase.osms.perdin') }}" key="t-level-2-1"><div style="color:green;">Report Perjalanan Dinas</div></a></li>
								<li><a href="{{ route('metabase.osms.bpjs_ks') }}" key="t-level-2-1"><div style="color:green;">Report Pendaftaran BPJS Kesehatan</div></a></li>
								<li><a href="{{ route('metabase.osms.bpjs_tk') }}" key="t-level-2-1"><div style="color:green;">Report Pendaftaran BPJS Ketenagakerjaan</div></a></li>
								<li><a href="{{ route('metabase.osms.asuransi') }}" key="t-level-2-1"><div style="color:green;">Report Pendaftaran Asuransi</div></a></li>
								<li><a href="{{ route('metabase.osms.setting_benefit') }}" key="t-level-2-1"><div style="color:green;">Report Setting Rawat Jalan & Inap</div></a></li>
                              
                                
                                
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow"
                                key="t-level-1-2">Bom</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('metabase.boms.mppfif') }}" key="t-level-2-1">MPP FIF</a></li>
                                <li><a href="{{ route('metabase.boms.aksesareabisnis') }}" key="t-level-2-1"><div style="color:green;">Akses Area Bisnis</div></a></li>
                                <li><a href="{{ route('metabase.boms.aksesareaclient') }}" key="t-level-2-1"><div style="color:green;">Akses Area Client</div></a></li>
                                <li><a href="{{ route('metabase.boms.aksesareaclient2') }}" key="t-level-2-1"><div style="color:green;">Akses Area Client 2</div></a></li>
                                <li><a href="{{ route('metabase.boms.jumlahnewhire') }}" key="t-level-2-1">Jumlah New Hire</a></li>
                                <li><a href="{{ route('metabase.boms.marketingsoreport') }}" key="t-level-2-1"><div style="color:green;">Marketing SO Report</div></a></li>
                                <li><a href="{{ route('metabase.boms.mastercabangclient') }}" key="t-level-2-1"><div style="color:green;">Master Cabang Client</div></a></li>
                                <li><a href="{{ route('metabase.boms.masterclient') }}" key="t-level-2-1"><div style="color:green;">Master Client</div></a></li>
                                <li><a href="{{ route('metabase.boms.mastercompany') }}" key="t-level-2-1">Master Company</a></li>
                                <li><a href="{{ route('metabase.boms.masternetwork') }}" key="t-level-2-1"><div style="color:green;">Master Network</div></a></li>
                                <li><a href="{{ route('metabase.boms.masterjobposisi') }}" key="t-level-2-1"><div style="color:green;">Master Job Posisi</div></a></li>
                                <li><a href="{{ route('metabase.boms.jobspesifikasi') }}" key="t-level-2-1"><div style="color:green;">Job Spesifikasi</div></a></li>
                                <li><a href="{{ route('metabase.boms.mutasipe') }}" key="t-level-2-1">Mutasi PE</a></li>
                                <li><a href="{{ route('metabase.boms.prosesperpanjanganbpo') }}" key="t-level-2-1">Proses Perpanjangan BPO</a></li>
                                <li><a href="{{ route('metabase.boms.prosesperpanjanganpe') }}" key="t-level-2-1">Proses Perpanjangan PE</a></li>
                                <li><a href="{{ route('metabase.boms.reportsoapproval') }}" key="t-level-2-1">Report SO Approval</a></li>
                                <li><a href="{{ route('metabase.boms.reportterminate') }}" key="t-level-2-1"><div style="color:green;">Report Terminate</div></a></li>
                                <li><a href="{{ route('metabase.boms.search') }}" key="t-level-2-1"><div style="color:green;">Search</div></a></li>
                                <li><a href="{{ route('metabase.boms.employeelobcc') }}" key="t-level-2-1">Employee LOB CC</a></li>
                                <li><a href="{{ route('metabase.boms.reportusulanns') }}" key="t-level-2-1"><div style="color:green;">Report Usulan NS</div></a></li>
                                <li><a href="{{ route('metabase.boms.reportcqms') }}" key="t-level-2-1"><div style="color:green;">Report CQMS</div></a></li>
                                <li><a href="{{ route('metabase.boms.offeringso') }}" key="t-level-2-1"><div style="color:green;">Offering SO</div></a></li>
                                <li><a href="{{ route('metabase.boms.reportsobpo') }}" key="t-level-2-1"><div style="color:green;">Report SO BPO</div></a></li>
                                <li><a href="{{ route('metabase.boms.usulanns') }}" key="t-level-2-1"><div style="color:green;">Kebutuhan Usulan NS</div></a></li>
                                <li><a href="{{ route('metabase.boms.reportcqms1') }}" key="t-level-2-1"><div style="color:green;">CQMS Dinamis v.1</div></a></li>
                                <li><a href="{{ route('metabase.boms.pelamarseleksi') }}" key="t-level-2-1"><div style="color:green;">Aktifitas Pelamar Seleksi v.1</div></a></li>
                                <li><a href="{{ route('metabase.boms.mpphire') }}" key="t-level-2-1">kebutuhan vs hire</a></li>
                                <li><a href="{{ route('metabase.boms.bpjskes') }}" key="t-level-2-1">Report BPJS Kesehatan v.0</a></li>
                                <li><a href="{{ route('metabase.boms.mastergaji') }}" key="t-level-2-1">Report Master Gaji Per Komponen</a></li>
                                <li><a href="{{ route('metabase.boms.aktuallayanan') }}" key="t-level-2-1">Aktual Layanan - Invoice LOB CC</a></li>
                                <li><a href="{{ route('metabase.boms.dashboardcc') }}" key="t-level-2-1">Dashboard contact center</a></li>
                                <li><a href="{{ route('metabase.boms.empolyebpo') }}" key="t-level-2-1"><div style="color:green;">Employee Assignment BPO</div></a></li>
                                <li><a href="{{ route('metabase.boms.ordervn') }}" key="t-level-2-1">Report Order VN</a></li>
                                <li><a href="{{ route('metabase.boms.rehire') }}" key="t-level-2-1"><div style="color:green;">Report ReHire</div></a></li>
                                <li><a href="{{ route('metabase.boms.reportvn') }}" key="t-level-2-1"><div style="color:green;">report VN Order</div></a></li>
                                <li><a href="{{ route('metabase.boms.reportthr') }}" key="t-level-2-1"><div style="color:green;">report PROSES THR</div></a></li>
                                <li><a href="{{ route('metabase.boms.logsend') }}" key="t-level-2-1"><div style="color:green;">Log Send Payrol</div></a></li>
                                <li><a href="{{ route('metabase.boms.repotempoly') }}" key="t-level-2-1"><div style="color:green;">Report employee family</div></a></li>
                                <li><a href="{{ route('metabase.boms.repotusulan') }}" key="t-level-2-1"><div style="color:green;">Report Offering Usulan</div></a></li>
                                <li><a href="{{ route('metabase.boms.repotcr9') }}" key="t-level-2-1"><div style="color:green;">Report Monitoring CR 9</div></a></li>
                                <li><a href="{{ route('metabase.boms.reportinvalidso') }}" key="t-level-2-1"><div style="color:green;">Report Invalid SO</div></a></li>
                                <li><a href="{{ route('metabase.boms.reportkompbenefitireg') }}" key="t-level-2-1"><div style="color:green;">Report Komponen Benefit Ireguler (Rawat Jalan & Rawat Inap)</div></a></li>
                                <li><a href="{{ route('metabase.boms.reportasuransiess') }}" key="t-level-2-1"><div style="color:green;">Report Asuransi ESS</div></a></li>
                                <li><a href="{{ route('metabase.boms.reportjoborder') }}" key="t-level-2-1"><div style="color:green;">Report Job Order</div></a></li>
                                <li><a href="{{ route('metabase.boms.reportsla') }}" key="t-level-2-1"><div style="color:green;">Report SLA</div></a></li>
                                <li><a href="{{ route('metabase.boms.monitoringsomin') }}" key="t-level-2-1"><div style="color:green;">Monitoring SO Minus</div></a></li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow"
                                key="t-level-1-2">Legal</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('metabase.legals.masterpks') }}" key="t-level-2-1"><div style="color:green;">Master PKS</div></a></li>
                                <li><a href="{{ route('metabase.legals.masterspkp') }}" key="t-level-2-1"><div style="color:green;">Master SPKP</div></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- <li>
                    <a href="{{ route('archive') }}" class="waves-effect">
                        <i class="bx bx-briefcase-alt-2"></i><span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards">Archive</span>
                    </a>
                </li> -->
                @if (Auth::user()->hasRole('admin'))
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-user"></i>
                            <span key="t-multi-level">Users</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="{{ route('users.index') }}" key="t-level-2-1">List</a></li>
                            <li><a href="{{ route('users.create') }}" key="t-level-2-1">Create</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->

