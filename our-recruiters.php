<?php 
$pageTitle = "Our 500+ Top Recruiters - Dr. APJ Abdul Kalam University, Indore";
include 'header.php'; 
require_once 'db.php';

// Fetch all recruiters from the database
try {
    $dbRecruiters = $pdo->query("SELECT * FROM recruiters ORDER BY id ASC")->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $dbRecruiters = [];
}

function getRecruiterCategory($title) {
    $t = strtolower($title);
    if (strpos($t, 'pharma') !== false || strpos($t, 'cipla') !== false || strpos($t, 'lupin') !== false || strpos($t, 'glenmark') !== false || strpos($t, 'sun') !== false || strpos($t, 'ipca') !== false || strpos($t, 'alembic') !== false || strpos($t, 'gland') !== false || strpos($t, 'makin') !== false || strpos($t, 'medgel') !== false || strpos($t, 'indoco') !== false || strpos($t, 'mj bio') !== false) {
        return 'pharma';
    }
    if (strpos($t, 'wipro') !== false || strpos($t, 'tech mahindra') !== false || strpos($t, 'ibm') !== false || strpos($t, 'tcs') !== false || strpos($t, 'infosys') !== false || strpos($t, 'amazon') !== false || strpos($t, 'oracle') !== false || strpos($t, 'info impulse') !== false) {
        return 'it';
    }
    if (strpos($t, 'eicher') !== false || strpos($t, 'john deere') !== false || strpos($t, 'l&t') !== false || strpos($t, 'mahindra') !== false || strpos($t, 'grasim') !== false || strpos($t, 'dhl') !== false || strpos($t, 'macro') !== false || strpos($t, 'pinnacle') !== false) {
        return 'engg';
    }
    if (strpos($t, 'bank') !== false || strpos($t, 'icici') !== false || strpos($t, 'axis') !== false || strpos($t, 'pnb') !== false) {
        return 'bfsi';
    }
    return 'edtech';
}

function cleanRecruiterTitle($title, $id) {
    if ($id == 2) return 'Glenmark Pharmaceuticals';
    if ($id == 1) return 'IPCA Laboratories';
    if (strtolower($title) == 'test') return 'Glenmark Pharmaceuticals';
    if ($title == 'axis bank') return 'Axis Bank';
    if ($title == 'Amazon Logistics') return 'Amazon Development Center';
    return $title;
}
?>

<style>
.btn-recruiter-tab {
    border: 1px solid transparent;
    background: transparent;
    color: #4a3b3c;
    font-weight: 600;
    font-size: 0.88rem;
    padding: 0.55rem 1.25rem;
    border-radius: 50px;
    white-space: nowrap;
    transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    display: inline-flex;
    align-items: center;
    cursor: pointer;
}
.btn-recruiter-tab:hover {
    background: rgba(112, 0, 24, 0.05);
    color: var(--primary-color);
}
.btn-recruiter-tab.active {
    background: var(--primary-color) !important;
    color: #ffffff !important;
    border-color: var(--primary-color) !important;
    box-shadow: 0 4px 14px rgba(112, 0, 24, 0.28);
}
.btn-recruiter-tab.active i {
    color: var(--gold-color) !important;
}

.recruiter-tab-container {
    background: #ffffff;
    border: 1px solid var(--border-color);
    padding: 0.4rem;
    border-radius: 60px;
    overflow-x: auto;
    scrollbar-width: none;
    box-shadow: 0 2px 8px rgba(0,0,0,0.03);
}
.recruiter-tab-container::-webkit-scrollbar {
    display: none;
}

.recruiter-search-box {
    background: #ffffff;
    border: 1px solid var(--border-color);
    border-radius: 1rem;
    padding: 0.4rem 0.6rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.03);
    transition: border-color 0.2s, box-shadow 0.2s;
}
.recruiter-search-box:focus-within {
    border-color: var(--gold-color);
    box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.18);
}
.recruiter-search-box input {
    border: none !important;
    box-shadow: none !important;
    font-size: 0.95rem;
}
.recruiter-logo-card {
    background: #ffffff;
    border: 1px solid rgba(112, 0, 21, 0.12);
    border-radius: 1.25rem;
    transition: all 0.28s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.03);
    height: 100%;
    padding: 1.5rem 1.25rem 1.1rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
}
.recruiter-logo-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 28px rgba(112, 0, 21, 0.09);
    border-color: rgba(212, 175, 55, 0.5);
}
.recruiter-logo-card .logo-img-box {
    height: 90px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 12px 16px;
    margin-bottom: 0.85rem;
}
.recruiter-logo-card .logo-img-box img {
    max-height: 52px;
    max-width: 82%;
    width: auto;
    height: auto;
    object-fit: contain;
    filter: drop-shadow(0 1px 2px rgba(0,0,0,0.04));
    transition: transform 0.25s ease;
}
.recruiter-logo-card:hover .logo-img-box img {
    transform: scale(1.08);
}
.recruiter-logo-card .recruiter-name-bar {
    width: 100%;
    padding-top: 0.75rem;
    border-top: 1px solid rgba(112, 0, 21, 0.08);
    margin-top: auto;
}
.custom-badge-pill {
    display: inline-flex;
    align-items: center;
    background: #fbf3f5;
    color: #700015;
    border: 1px solid rgba(112, 0, 21, 0.2);
    padding: 0.4rem 1rem;
    border-radius: 50px;
    font-size: 0.78rem;
    font-weight: 700;
    letter-spacing: 0.04em;
}
</style>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="placement-cell.php">Placements</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Our Recruiters</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> INDUSTRY RECRUITMENT PARTNERS
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Our 500+ Corporate Recruiters
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Fortune 500 MNCs, Pharma Giants &amp; Technology Leaders
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
                                <i class="fa-solid fa-handshake"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Corporate Recruitment Partners</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    Leading multinational enterprises, pharmaceutical giants, tech conglomerates, core manufacturing leaders, and premier financial institutions recruit campus talent annually from Dr. A.P.J. Abdul Kalam University.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- 1. Luxury Segmented Pill Navigation Tabs -->
                    <div class="mb-3">
                        <div class="recruiter-tab-container d-flex align-items-center gap-2" id="recruiterTabNav">
                            <button type="button" class="btn-recruiter-tab active" data-filter="all">
                                <i class="fa-solid fa-border-all me-1.5"></i> All Recruiters
                                <span class="badge bg-gold text-dark ms-2 rounded-pill px-2" style="font-size: 0.7rem;"><?php echo count($dbRecruiters); ?>+</span>
                            </button>
                            <button type="button" class="btn-recruiter-tab" data-filter="pharma">
                                <i class="fa-solid fa-capsules me-1.5 text-gold"></i> Pharma &amp; Healthcare
                            </button>
                            <button type="button" class="btn-recruiter-tab" data-filter="it">
                                <i class="fa-solid fa-laptop-code me-1.5 text-gold"></i> IT &amp; Technology
                            </button>
                            <button type="button" class="btn-recruiter-tab" data-filter="engg">
                                <i class="fa-solid fa-gears me-1.5 text-gold"></i> Engineering &amp; Auto
                            </button>
                            <button type="button" class="btn-recruiter-tab" data-filter="bfsi">
                                <i class="fa-solid fa-building-columns me-1.5 text-gold"></i> Banking &amp; BFSI
                            </button>
                        </div>
                    </div>

                    <!-- 2. Clean Dedicated Search Bar -->
                    <div class="mb-5">
                        <div class="recruiter-search-box d-flex align-items-center">
                            <span class="ps-3 pe-2 text-primary">
                                <i class="fa-solid fa-magnifying-glass fs-6"></i>
                            </span>
                            <input type="text" 
                                   class="form-control" 
                                   id="recruiterSearchInput" 
                                   placeholder="Search by company name (e.g. Amazon, Cipla, TCS, L&amp;T, ICICI, Sun Pharma, Eicher)..."
                                   autocomplete="off">
                            <button type="button" class="btn btn-sm btn-link text-muted-custom pe-3 text-decoration-none" id="clearSearchBtn" style="display: none;">
                                <i class="fa-solid fa-circle-xmark"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Section Header -->
                    <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div class="d-flex align-items-center gap-2.5">
                            <span class="section-icon-pill"><i class="fa-solid fa-building-circle-check"></i></span>
                            <h3 class="font-serif text-primary fs-4 fw-bold m-0" id="currentSectionTitle">All Partner Recruiter Logos</h3>
                        </div>
                        <span class="custom-badge-pill">
                            <i class="fa-solid fa-building me-1.5 text-gold"></i> <span id="visibleCount"><?php echo count($dbRecruiters); ?></span> Companies Displayed
                        </span>
                    </div>

                    <!-- Recruiters Logo Grid -->
                    <div class="row g-3.5 mb-5" id="recruiterGrid">
                        <?php foreach ($dbRecruiters as $r): 
                            $cleanTitle = cleanRecruiterTitle($r['title'], $r['id']);
                            $cat = getRecruiterCategory($cleanTitle);
                            $imgSrc = "uploads/" . $r['image_path'];
                        ?>
                        <div class="col-6 col-sm-4 col-md-3 recruiter-item" data-category="<?php echo $cat; ?>" data-title="<?php echo strtolower($cleanTitle); ?>">
                            <div class="recruiter-logo-card text-center d-flex flex-column align-items-center justify-content-between" style="min-height: 155px;">
                                <div class="logo-img-box flex-grow-1">
                                    <img src="<?php echo htmlspecialchars($imgSrc); ?>" 
                                         alt="<?php echo htmlspecialchars($cleanTitle); ?>" 
                                         loading="lazy">
                                </div>
                                <div class="recruiter-name-bar">
                                    <h6 class="font-serif text-primary fw-bold mb-0 text-truncate" style="font-size: 0.82rem;" title="<?php echo htmlspecialchars($cleanTitle); ?>">
                                        <?php echo htmlspecialchars($cleanTitle); ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- No Results Message -->
                    <div id="noResultsAlert" class="feature-info-card text-center py-5 mb-5" style="display: none;">
                        <i class="fa-solid fa-search fa-2x text-muted-custom mb-3"></i>
                        <h4 class="font-serif text-primary fs-5 fw-bold mb-1">No Matching Companies Found</h4>
                        <p class="small text-muted-custom mb-3">Try searching for a different keyword or select another category tab.</p>
                        <button type="button" class="btn btn-sm btn-gold-pill px-4 py-2" id="resetFilterBtn">Reset Search &amp; Filters</button>
                    </div>

                    <!-- Additional Corporate Recruiters Marquee Strip -->
                    <div class="feature-info-card p-4 p-md-4.5 mb-4">
                        <div class="d-flex align-items-center gap-3 mb-3 pb-2.5 border-bottom border-custom">
                            <div class="feature-icon-badge">
                                <i class="fa-solid fa-layer-group"></i>
                            </div>
                            <h4 class="font-serif text-primary fw-bold fs-6 mb-0">More Featured Recruitment Partners</h4>
                        </div>
                        <p class="small text-muted-custom mb-3" style="line-height: 1.65;">
                            In addition to the companies listed above, our students receive placement &amp; internship offers from 500+ esteemed recruiters including:
                        </p>
                        <div class="d-flex flex-wrap gap-2">
                            <?php 
                            $extraRecruiters = [
                                'Tech Mahindra', 'Cognizant', 'Capgemini', 'Persistent Systems', 
                                'Teleperformance', 'Cadila Pharma', 'Zydus Lifesciences', 'Macleods Pharma', 
                                'Granules India', 'Biophore Labs', 'Vimta Labs', 'Alivus Life Sciences', 
                                'Bharat Rasayan', 'Sumitomo Chemical', 'Tata Motors', 'JSW Steel', 
                                'Godrej Consumer', 'Universal Ltd', 'HDFC Bank', 'Kotak Mahindra', 
                                'Bajaj Finserv', 'Muthoot Finance', 'Bandhan Bank', 'Reliance Retail'
                            ];
                            foreach ($extraRecruiters as $er): ?>
                            <span class="badge bg-white text-primary border border-custom px-3 py-2 fw-medium rounded-pill shadow-xs" style="font-size: 0.8rem;">
                                <i class="fa-solid fa-circle-check text-gold me-1.5"></i> <?php echo $er; ?>
                            </span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Corporate Invitation CTA Strip -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mb-4">
                        <div class="d-flex align-items-center gap-3.5">
                            <div class="intro-highlight-badge" style="width: 52px; height: 52px; font-size: 1.25rem;">
                                <i class="fa-solid fa-envelope-open-text"></i>
                            </div>
                            <div>
                                <h4 class="font-serif text-primary fs-6 fw-bold mb-0.5">Inviting Corporates for Campus Placement 2026-27</h4>
                                <p class="text-muted-custom small mb-0">Partner with Dr. A.P.J. Abdul Kalam University to recruit industry-ready talent.</p>
                            </div>
                        </div>
                        <a href="mailto:placements@aku.ac.in" class="btn btn-sm btn-gold-pill px-4 py-2 fw-bold">
                            <i class="fa-solid fa-paper-plane me-1.5"></i> Invite for Campus Drive
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('recruiterSearchInput');
    const clearBtn = document.getElementById('clearSearchBtn');
    const tabBtns = document.querySelectorAll('.btn-recruiter-tab');
    const items = document.querySelectorAll('.recruiter-item');
    const visibleCountEl = document.getElementById('visibleCount');
    const noResultsAlert = document.getElementById('noResultsAlert');
    const resetBtn = document.getElementById('resetFilterBtn');
    const sectionTitle = document.getElementById('currentSectionTitle');

    let currentFilter = 'all';

    const categoryTitles = {
        'all': 'All Partner Recruiter Logos',
        'pharma': 'Pharmaceutical & Healthcare Recruiters',
        'it': 'IT, Software & Technology Recruiters',
        'engg': 'Core Engineering & Automotive Recruiters',
        'bfsi': 'Banking, Finance & BFSI Recruiters'
    };

    function filterItems() {
        const query = (searchInput ? searchInput.value.toLowerCase().trim() : '');
        let visibleCount = 0;

        if (clearBtn) {
            clearBtn.style.display = query ? 'inline-block' : 'none';
        }

        items.forEach(item => {
            const title = item.getAttribute('data-title') || '';
            const category = item.getAttribute('data-category') || '';

            const matchesCategory = (currentFilter === 'all' || category === currentFilter);
            const matchesQuery = (query === '' || title.includes(query));

            if (matchesCategory && matchesQuery) {
                item.style.display = '';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        if (visibleCountEl) {
            visibleCountEl.innerText = visibleCount;
        }

        if (noResultsAlert) {
            noResultsAlert.style.display = (visibleCount === 0) ? 'block' : 'none';
        }
    }

    if (searchInput) {
        searchInput.addEventListener('input', filterItems);
    }

    if (clearBtn) {
        clearBtn.addEventListener('click', function() {
            searchInput.value = '';
            filterItems();
            searchInput.focus();
        });
    }

    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            tabBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            currentFilter = this.getAttribute('data-filter');
            if (sectionTitle && categoryTitles[currentFilter]) {
                sectionTitle.innerText = categoryTitles[currentFilter];
            }
            filterItems();
        });
    });

    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            if (searchInput) searchInput.value = '';
            currentFilter = 'all';
            tabBtns.forEach(b => b.classList.remove('active'));
            const allBtn = document.querySelector('.btn-recruiter-tab[data-filter="all"]');
            if (allBtn) allBtn.classList.add('active');
            if (sectionTitle) sectionTitle.innerText = categoryTitles['all'];
            filterItems();
        });
    }
});
</script>

<?php include 'footer.php'; ?>