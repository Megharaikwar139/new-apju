<?php 
$pageTitle = "Academic Calendar 2026-27 - Dr. APJ Abdul Kalam University, Indore";
include 'header.php'; 
?>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="academic-calendar.php">Academic Schedule</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Academic Calendar</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> SEMESTER TIMETABLES & SCHEDULES
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 900px; line-height: 1.15;">
            Official Academic Calendar
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Teaching, Examination &amp; Recess Schedules
        </p>
    </div>
</section>

<!-- Main Body -->
<main class="py-5" style="background-color: var(--bg-ivory);">
    <div class="container-custom">
        <div class="row g-4 g-xl-5">
            
            <!-- Left Main Content -->
            <div class="col-lg-8 col-xl-9">
                <article class="inner-main-card">
                    
                    <!-- Intro Card -->
                    <div class="p-4 rounded-4 border border-custom bg-light mb-4 shadow-xs">
                        <div class="d-flex align-items-start gap-3">
                            <div class="rounded-circle bg-white p-3 shadow-xs border border-custom d-flex align-items-center justify-content-center flex-shrink-0" style="width: 55px; height: 55px; color: var(--primary-color);">
                                <i class="fa-solid fa-calendar-days fs-3 text-gold"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-5 fw-bold mb-1">University Academic Almanac &amp; Session Plans</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.94rem; line-height: 1.7;">
                                    The Academic Calendar outlines the semester schedules, commencement of classes, mid-term examinations, end-semester evaluations, and vacation intervals for Engineering, Pharmacy, Management, Ayush, and General Sciences faculties.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Session Tabs Pill Bar -->
                    <ul class="nav nav-pills department-tabs mb-4 p-2 rounded-4 border border-custom bg-white" id="calendarSessionTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active rounded-pill px-3.5 py-2 small fw-semibold" id="tab-s25-26-btn" data-bs-toggle="pill" data-bs-target="#tab-s25-26" type="button" role="tab">
                                <i class="fa-solid fa-calendar-check me-1.5"></i> Session 2025-26
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill px-3.5 py-2 small fw-semibold" id="tab-s24-25-btn" data-bs-toggle="pill" data-bs-target="#tab-s24-25" type="button" role="tab">
                                <i class="fa-solid fa-calendar-day me-1.5"></i> Session 2024-25
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill px-3.5 py-2 small fw-semibold" id="tab-s23-24-btn" data-bs-toggle="pill" data-bs-target="#tab-s23-24" type="button" role="tab">
                                <i class="fa-solid fa-calendar-day me-1.5"></i> Session 2023-24
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill px-3.5 py-2 small fw-semibold" id="tab-s22-23-btn" data-bs-toggle="pill" data-bs-target="#tab-s22-23" type="button" role="tab">
                                <i class="fa-solid fa-calendar-day me-1.5"></i> Session 2022-23
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-pill px-3.5 py-2 small fw-semibold" id="tab-s21-22-btn" data-bs-toggle="pill" data-bs-target="#tab-s21-22" type="button" role="tab">
                                <i class="fa-solid fa-calendar-day me-1.5"></i> Session 2021-22
                            </button>
                        </li>
                    </ul>

                    <!-- Session Tab Contents -->
                    <div class="tab-content pt-2" id="calendarSessionTabContent">
                        
                        <!-- 1. Session 2025-26 -->
                        <div class="tab-pane fade show active" id="tab-s25-26" role="tabpanel">
                            <div class="tab-section-header mb-3 pb-2 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-file-pdf text-gold fs-5"></i>
                                    <h3 class="font-serif text-primary fs-4 fw-bold m-0">Academic Calendars · Session 2025-26</h3>
                                </div>
                                <span class="badge bg-gold text-dark fw-bold px-3 py-1.5 rounded-pill" style="font-size: 0.75rem;">Current Active Session</span>
                            </div>

                            <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white mb-4">
                                <table class="luxury-table table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Program / Department Calendar Title</th>
                                            <th style="width: 140px;" class="text-end">Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-2.5">
                                                    <i class="fa-solid fa-file-pdf text-danger fs-5"></i>
                                                    <div>
                                                        <a href="uploads/2026/03/82_BHMS_25-26_Nov_2025-to-Apr_2027.pdf" target="_blank" class="fw-bold text-primary text-decoration-none d-block">
                                                            BHMS Academic Calendar (Nov 2025 – Apr 2027)
                                                        </a>
                                                        <span class="small text-muted-custom">Faculty of Homeopathy · Code 82</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <a href="uploads/2026/03/82_BHMS_25-26_Nov_2025-to-Apr_2027.pdf" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small">
                                                    <i class="fa-solid fa-download me-1"></i> PDF
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-2.5">
                                                    <i class="fa-solid fa-file-pdf text-danger fs-5"></i>
                                                    <div>
                                                        <a href="uploads/2026/03/81_BAMS_25-26_Nov_2025-to-Apr_2027.pdf" target="_blank" class="fw-bold text-primary text-decoration-none d-block">
                                                            BAMS Academic Calendar (Nov 2025 – Apr 2027)
                                                        </a>
                                                        <span class="small text-muted-custom">Faculty of Ayurveda · Code 81</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <a href="uploads/2026/03/81_BAMS_25-26_Nov_2025-to-Apr_2027.pdf" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small">
                                                    <i class="fa-solid fa-download me-1"></i> PDF
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-2.5">
                                                    <i class="fa-solid fa-file-pdf text-danger fs-5"></i>
                                                    <div>
                                                        <a href="uploads/2026/03/80-Even-Sem.-Jan-June-2025-26.pdf" target="_blank" class="fw-bold text-primary text-decoration-none d-block">
                                                            Even Semester Academic Calendar (Jan – June 2026)
                                                        </a>
                                                        <span class="small text-muted-custom">All Engineering, Pharmacy &amp; Management Departments · Code 80</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <a href="uploads/2026/03/80-Even-Sem.-Jan-June-2025-26.pdf" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small">
                                                    <i class="fa-solid fa-download me-1"></i> PDF
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-2.5">
                                                    <i class="fa-solid fa-file-pdf text-danger fs-5"></i>
                                                    <div>
                                                        <a href="uploads/2025/11/Academic-Calendar-JULY-TO-DEC-2025.pdf" target="_blank" class="fw-bold text-primary text-decoration-none d-block">
                                                            Odd Semester Academic Calendar (July – Dec 2025)
                                                        </a>
                                                        <span class="small text-muted-custom">University All Faculty Almanac</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end">
                                                <a href="uploads/2025/11/Academic-Calendar-JULY-TO-DEC-2025.pdf" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small">
                                                    <i class="fa-solid fa-download me-1"></i> PDF
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- 2. Session 2024-25 -->
                        <div class="tab-pane fade" id="tab-s24-25" role="tabpanel">
                            <div class="tab-section-header mb-3 pb-2 border-bottom border-custom d-flex align-items-center gap-2">
                                <i class="fa-solid fa-file-pdf text-gold fs-5"></i>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Academic Calendars · Session 2024-25</h3>
                            </div>

                            <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white mb-4">
                                <table class="luxury-table table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Program / Department Calendar Title</th>
                                            <th style="width: 140px;" class="text-end">Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="uploads/2026/03/79-Odd-Sem.-Jul-Dec-2024-25.pdf" target="_blank" class="fw-bold text-primary text-decoration-none">
                                                    79- Odd Sem. Jul-Dec (2024-25) Academic Calendar
                                                </a>
                                            </td>
                                            <td class="text-end"><a href="uploads/2026/03/79-Odd-Sem.-Jul-Dec-2024-25.pdf" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small">PDF</a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="uploads/2026/03/78-Even-Sem.-Jan-June-2024-25.pdf" target="_blank" class="fw-bold text-primary text-decoration-none">
                                                    78- Even Sem. Jan-June (2024-25) Academic Calendar
                                                </a>
                                            </td>
                                            <td class="text-end"><a href="uploads/2026/03/78-Even-Sem.-Jan-June-2024-25.pdf" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small">PDF</a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="uploads/2025/06/23092024_125423_AcademicCalenderEng-scaled.pdf" target="_blank" class="fw-bold text-primary text-decoration-none">
                                                    Academic Calendar Engineering (July – Dec 2024)
                                                </a>
                                            </td>
                                            <td class="text-end"><a href="uploads/2025/06/23092024_125423_AcademicCalenderEng-scaled.pdf" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small">PDF</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- 3. Session 2023-24 -->
                        <div class="tab-pane fade" id="tab-s23-24" role="tabpanel">
                            <div class="tab-section-header mb-3 pb-2 border-bottom border-custom d-flex align-items-center gap-2">
                                <i class="fa-solid fa-file-pdf text-gold fs-5"></i>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Academic Calendars · Session 2023-24</h3>
                            </div>

                            <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white mb-4">
                                <table class="luxury-table table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Program / Department Calendar Title</th>
                                            <th style="width: 140px;" class="text-end">Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="uploads/2026/03/64-Odd-Sem-Jul-Dec-23-2023-24.pdf" target="_blank" class="fw-bold text-primary text-decoration-none">Odd Sem Jul-Dec 2023 (2023-24)</a></td>
                                            <td class="text-end"><a href="uploads/2026/03/64-Odd-Sem-Jul-Dec-23-2023-24.pdf" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small">PDF</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="uploads/2026/03/66-2nd-Year-Dip.-Phrmcy-2023-24.pdf" target="_blank" class="fw-bold text-primary text-decoration-none">2nd Year Diploma Pharmacy (2023-24)</a></td>
                                            <td class="text-end"><a href="uploads/2026/03/66-2nd-Year-Dip.-Phrmcy-2023-24.pdf" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small">PDF</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="uploads/2025/06/24072024_095333_B.H.M.S.-Academic-Calander-2023-24.pdf" target="_blank" class="fw-bold text-primary text-decoration-none">BHMS Academic Calendar (2023-24)</a></td>
                                            <td class="text-end"><a href="uploads/2025/06/24072024_095333_B.H.M.S.-Academic-Calander-2023-24.pdf" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small">PDF</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- 4. Session 2022-23 -->
                        <div class="tab-pane fade" id="tab-s22-23" role="tabpanel">
                            <div class="tab-section-header mb-3 pb-2 border-bottom border-custom d-flex align-items-center gap-2">
                                <i class="fa-solid fa-file-pdf text-gold fs-5"></i>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Academic Calendars · Session 2022-23</h3>
                            </div>

                            <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white mb-4">
                                <table class="luxury-table table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Program / Department Calendar Title</th>
                                            <th style="width: 140px;" class="text-end">Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="uploads/2026/03/70-AYU-2021-22-2022-23.pdf" target="_blank" class="fw-bold text-primary text-decoration-none">Ayurveda Faculty (2021-22 &amp; 2022-23)</a></td>
                                            <td class="text-end"><a href="uploads/2026/03/70-AYU-2021-22-2022-23.pdf" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small">PDF</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="uploads/2026/03/67-BHMS-2022-23.pdf" target="_blank" class="fw-bold text-primary text-decoration-none">BHMS Academic Calendar (2022-23)</a></td>
                                            <td class="text-end"><a href="uploads/2026/03/67-BHMS-2022-23.pdf" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small">PDF</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- 5. Session 2021-22 -->
                        <div class="tab-pane fade" id="tab-s21-22" role="tabpanel">
                            <div class="tab-section-header mb-3 pb-2 border-bottom border-custom d-flex align-items-center gap-2">
                                <i class="fa-solid fa-file-pdf text-gold fs-5"></i>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Academic Calendars · Session 2021-22</h3>
                            </div>

                            <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white mb-4">
                                <table class="luxury-table table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Program / Department Calendar Title</th>
                                            <th style="width: 140px;" class="text-end">Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="uploads/2026/03/38-Co-Curricular-Actiity-Calendar-2021-22.pdf" target="_blank" class="fw-bold text-primary text-decoration-none">Co-Curricular Activity Calendar (2021-22)</a></td>
                                            <td class="text-end"><a href="uploads/2026/03/38-Co-Curricular-Actiity-Calendar-2021-22.pdf" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small">PDF</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="uploads/2026/03/46-BE-B.Pharma.-M.pharma-M.tech-MCA-6th-Sem-Dip-Eng.-Final-year-Jan-Jun-2022.pdf" target="_blank" class="fw-bold text-primary text-decoration-none">BE, B.Pharm, M.Tech, MCA Even Sem (Jan-Jun 2022)</a></td>
                                            <td class="text-end"><a href="uploads/2026/03/46-BE-B.Pharma.-M.pharma-M.tech-MCA-6th-Sem-Dip-Eng.-Final-year-Jan-Jun-2022.pdf" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 small">PDF</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <!-- Holiday Calendar Cross Link -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mt-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle bg-primary text-gold p-3 d-flex align-items-center justify-content-center shadow-xs" style="width: 50px; height: 50px;">
                                <i class="fa-solid fa-umbrella-beach fs-4"></i>
                            </div>
                            <div>
                                <h4 class="font-serif text-primary fs-6 fw-bold mb-0.5">Looking for Student Holiday List 2026?</h4>
                                <p class="text-muted-custom small mb-0">View all national, festival, and declared university holidays.</p>
                            </div>
                        </div>
                        <a href="student-holiday-calender.php" class="btn btn-sm btn-gold-pill px-4 py-2 fw-bold">
                            <i class="fa-solid fa-calendar-check me-1.5"></i> View Holiday Calendar
                        </a>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <div class="sidebar-sticky-wrapper">
                    <?php include "faculty-sidebar.php"; ?>
                </div>
            </div>

        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
