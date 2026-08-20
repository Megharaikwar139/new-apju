<?php 
$pageTitle = "Placement Statistics & Performance Trends - Dr. APJ Abdul Kalam University, Indore";
include 'header.php'; 
?>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="placement-cell.php">Placements</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Placement Statistics</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> LONGITUDINAL RECRUITMENT METRICS
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Placement Statistics &amp; Performance Trends
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Multi-Year Placement Analytics, Packages &amp; Career Trajectories
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
                    
                    <!-- Intro Highlight Card -->
                    <div class="intro-highlight-card mb-5">
                        <div class="d-flex align-items-center gap-3.5">
                            <div class="intro-highlight-badge">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Empirical Placement Growth &amp; Outcomes</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    Our continuous focus on industry-aligned skill building and experiential pedagogy is reflected in consistent year-on-year placement growth, higher compensation packages, robust startup incubation, and premier higher education admissions across global universities.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- 4 KPI Metrics Cards -->
                    <div class="row g-3 mb-5">
                        <div class="col-6 col-md-3">
                            <div class="p-3.5 rounded-4 text-white text-center shadow-xs h-100 d-flex flex-column justify-content-center" style="background: linear-gradient(135deg, var(--primary-color) 0%, #4a0010 100%);">
                                <span class="font-serif display-6 fw-bold text-gold mb-0">1200+</span>
                                <span class="small text-white text-opacity-85 text-uppercase fw-semibold" style="font-size: 0.72rem; letter-spacing: 0.05em;">Peak Placements</span>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="p-3.5 rounded-4 text-white text-center shadow-xs h-100 d-flex flex-column justify-content-center" style="background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);">
                                <span class="font-serif display-6 fw-bold text-gold mb-0">₹24.0</span>
                                <span class="small text-white text-opacity-85 text-uppercase fw-semibold" style="font-size: 0.72rem; letter-spacing: 0.05em;">LPA Highest CTC</span>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="p-3.5 rounded-4 text-white text-center shadow-xs h-100 d-flex flex-column justify-content-center" style="background: linear-gradient(135deg, var(--primary-color) 0%, #4a0010 100%);">
                                <span class="font-serif display-6 fw-bold text-gold mb-0">500+</span>
                                <span class="small text-white text-opacity-85 text-uppercase fw-semibold" style="font-size: 0.72rem; letter-spacing: 0.05em;">Partner MNCs</span>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="p-3.5 rounded-4 text-white text-center shadow-xs h-100 d-flex flex-column justify-content-center" style="background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);">
                                <span class="font-serif display-6 fw-bold text-gold mb-0">418+</span>
                                <span class="small text-white text-opacity-85 text-uppercase fw-semibold" style="font-size: 0.72rem; letter-spacing: 0.05em;">Startups &amp; Founders</span>
                            </div>
                        </div>
                    </div>

                    <!-- Chart Grid -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-chart-pie"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Interactive Career Outcome Analytics</h3>
                            </div>
                            <span class="badge bg-gold text-dark fw-bold px-3 py-1.5 rounded-pill" style="font-size: 0.75rem;">Verified Longitudinal Data</span>
                        </div>

                        <div class="row g-4">
                            <!-- Chart 1 -->
                            <div class="col-md-6">
                                <div class="feature-info-card p-4 h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom border-custom">
                                        <h5 class="font-serif text-primary fw-bold fs-6 mb-0">Corporate Placements (Private vs Govt)</h5>
                                        <i class="fa-solid fa-building text-gold"></i>
                                    </div>
                                    <canvas id="chartPlacements" style="max-height: 240px;"></canvas>
                                </div>
                            </div>

                            <!-- Chart 2 -->
                            <div class="col-md-6">
                                <div class="feature-info-card p-4 h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom border-custom">
                                        <h5 class="font-serif text-primary fw-bold fs-6 mb-0">Student Entrepreneurs &amp; Startups</h5>
                                        <i class="fa-solid fa-lightbulb text-gold"></i>
                                    </div>
                                    <canvas id="chartEntrepreneurs" style="max-height: 240px;"></canvas>
                                </div>
                            </div>

                            <!-- Chart 3 -->
                            <div class="col-md-6">
                                <div class="feature-info-card p-4 h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom border-custom">
                                        <h5 class="font-serif text-primary fw-bold fs-6 mb-0">Higher Studies &amp; Global Admissions</h5>
                                        <i class="fa-solid fa-graduation-cap text-gold"></i>
                                    </div>
                                    <canvas id="chartHigherEdu" style="max-height: 240px;"></canvas>
                                </div>
                            </div>

                            <!-- Chart 4 -->
                            <div class="col-md-6">
                                <div class="feature-info-card p-4 h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom border-custom">
                                        <h5 class="font-serif text-primary fw-bold fs-6 mb-0">Competitive Exams &amp; Diverse Pathways</h5>
                                        <i class="fa-solid fa-book-open text-gold"></i>
                                    </div>
                                    <canvas id="chartCompetitive" style="max-height: 240px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Placement Assistance Strip -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mb-4">
                        <div class="d-flex align-items-center gap-3.5">
                            <div class="intro-highlight-badge" style="width: 52px; height: 52px; font-size: 1.25rem;">
                                <i class="fa-solid fa-briefcase"></i>
                            </div>
                            <div>
                                <h4 class="font-serif text-primary fs-6 fw-bold mb-0.5">Want to Join AKU Campus Placement 2026?</h4>
                                <p class="text-muted-custom small mb-0">Explore our career counseling, resume building, and technical interview workshops.</p>
                            </div>
                        </div>
                        <a href="placement-cell.php" class="btn btn-sm btn-gold-pill px-4 py-2 fw-bold">
                            <i class="fa-solid fa-user-check me-1.5"></i> Training &amp; Placement Cell
                        </a>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <?php include "placement-sidebar.php"; ?>
            </div>

        </div>
    </div>
</main>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const years = ["2019", "2020", "2021", "2022", "2023", "2024", "2025", "2026"];

    const chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'top',
                labels: {
                    font: { family: "'Inter', sans-serif", size: 11 },
                    boxWidth: 12
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: { color: '#f0e8dc' }
            },
            x: {
                grid: { display: false }
            }
        }
    };

    // 1. Placements (Private vs Govt)
    new Chart(document.getElementById('chartPlacements'), {
        type: 'line',
        data: {
            labels: years,
            datasets: [
                {
                    label: 'Private Sector MNCs',
                    data: [588, 1059, 1200, 1192, 1216, 1139, 980, 1150],
                    borderColor: '#700018',
                    backgroundColor: 'rgba(112, 0, 24, 0.08)',
                    fill: true,
                    tension: 0.35,
                    borderWidth: 2.5
                },
                {
                    label: 'PSU / Govt Roles',
                    data: [23, 37, 23, 32, 55, 39, 45, 52],
                    borderColor: '#d4af37',
                    backgroundColor: 'transparent',
                    borderWidth: 2,
                    tension: 0.35
                }
            ]
        },
        options: chartOptions
    });

    // 2. Entrepreneurs & Startups
    new Chart(document.getElementById('chartEntrepreneurs'), {
        type: 'bar',
        data: {
            labels: years,
            datasets: [{
                label: 'Student Startups & Ventures',
                data: [77, 325, 211, 197, 195, 160, 280, 418],
                backgroundColor: '#700018',
                borderRadius: 6
            }]
        },
        options: chartOptions
    });

    // 3. Higher Studies
    new Chart(document.getElementById('chartHigherEdu'), {
        type: 'bar',
        data: {
            labels: years,
            datasets: [
                {
                    label: 'National (IITs/IIMs/Central Univ)',
                    data: [584, 639, 1186, 85, 185, 193, 210, 245],
                    backgroundColor: '#d4af37',
                    borderRadius: 6
                },
                {
                    label: 'International Universities',
                    data: [34, 15, 10, 58, 74, 83, 62, 75],
                    backgroundColor: '#1e293b',
                    borderRadius: 6
                }
            ]
        },
        options: chartOptions
    });

    // 4. Competitive Exams
    new Chart(document.getElementById('chartCompetitive'), {
        type: 'bar',
        data: {
            labels: years,
            datasets: [{
                label: 'UPSC / GATE / NET / Banking Qualified',
                data: [294, 1032, 580, 121, 120, 191, 145, 180],
                backgroundColor: '#9a7b38',
                borderRadius: 6
            }]
        },
        options: chartOptions
    });
});
</script>

<?php include 'footer.php'; ?>
