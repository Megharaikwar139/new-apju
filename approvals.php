<?php 
$pageTitle = "Statutory Approvals & Accreditations - Dr. APJ Abdul Kalam University, Indore";
require_once "db.php";
include "header.php"; 

$allApprovals = [
    // --- AICTE APPROVALS ---
    [
        'category' => 'aicte',
        'category_name' => 'AICTE (Engineering & Tech)',
        'badge' => 'AICTE',
        'badge_class' => 'bg-primary text-white',
        'council' => 'All India Council for Technical Education',
        'title' => 'AICTE Extension of Approval (EOA) - School of Engineering (SOE)',
        'target' => 'School of Engineering (SOE)',
        'session' => 'Session 2025-26',
        'file' => 'uploads/2026/03/SOE-EOA-2025-26.pdf',
        'is_image' => false
    ],
    [
        'category' => 'aicte',
        'category_name' => 'AICTE (Engineering & Tech)',
        'badge' => 'AICTE',
        'badge_class' => 'bg-primary text-white',
        'council' => 'All India Council for Technical Education',
        'title' => 'AICTE Extension of Approval (EOA) - College of Engineering (COE)',
        'target' => 'College of Engineering (COE)',
        'session' => 'Session 2025-26',
        'file' => 'uploads/2026/03/COE-EOA-2025-26.pdf',
        'is_image' => false
    ],
    [
        'category' => 'aicte',
        'category_name' => 'AICTE (Polytechnic)',
        'badge' => 'AICTE',
        'badge_class' => 'bg-primary text-white',
        'council' => 'All India Council for Technical Education',
        'title' => 'AICTE Extension of Approval (EOA) - College of Polytechnic Engineering (COPE)',
        'target' => 'College of Polytechnic Engineering (COPE)',
        'session' => 'Session 2025-26',
        'file' => 'uploads/2026/03/COPE-EOA-Report-2025-2026.pdf',
        'is_image' => false
    ],
    [
        'category' => 'aicte',
        'category_name' => 'AICTE (Engineering & Tech)',
        'badge' => 'AICTE',
        'badge_class' => 'bg-primary text-white',
        'council' => 'All India Council for Technical Education',
        'title' => 'AICTE Extension of Approval (EOA) - School of Engineering',
        'target' => 'School of Engineering (SOE)',
        'session' => 'Session 2024-25',
        'file' => 'uploads/2025/04/SOE13112024_103217_SOE-EOA-REPORT-2024-2025.pdf',
        'is_image' => false
    ],
    [
        'category' => 'aicte',
        'category_name' => 'AICTE (Engineering & Tech)',
        'badge' => 'AICTE',
        'badge_class' => 'bg-primary text-white',
        'council' => 'All India Council for Technical Education',
        'title' => 'AICTE Extension of Approval (EOA) - College of Engineering',
        'target' => 'College of Engineering (COE)',
        'session' => 'Session 2024-25',
        'file' => 'uploads/2025/04/13112024_103210_COE-EOA-REPORT-2024-2025.pdf',
        'is_image' => false
    ],
    [
        'category' => 'aicte',
        'category_name' => 'AICTE (Polytechnic)',
        'badge' => 'AICTE',
        'badge_class' => 'bg-primary text-white',
        'council' => 'All India Council for Technical Education',
        'title' => 'AICTE Extension of Approval (EOA) - College of Polytechnic Engineering',
        'target' => 'College of Polytechnic Engineering (COPE)',
        'session' => 'Session 2024-25',
        'file' => 'uploads/2025/04/13112024_103221_COPE-EOA-REPORT-2024-2025.pdf',
        'is_image' => false
    ],

    // --- PCI PHARMACY APPROVALS ---
    [
        'category' => 'pci',
        'category_name' => 'PCI (Pharmacy)',
        'badge' => 'PCI',
        'badge_class' => 'bg-success text-white',
        'council' => 'Pharmacy Council of India',
        'title' => 'PCI Statutory Approval Letter - School of Pharmacy (SOP)',
        'target' => 'School of Pharmacy (SOP)',
        'session' => 'Session 2025-26',
        'file' => 'uploads/2026/03/PCI-APPROVAL-2025-26-SOP.pdf',
        'is_image' => false
    ],
    [
        'category' => 'pci',
        'category_name' => 'PCI (Pharmacy)',
        'badge' => 'PCI',
        'badge_class' => 'bg-success text-white',
        'council' => 'Pharmacy Council of India',
        'title' => 'PCI Statutory Approval Letter - College of Pharmacy (COP)',
        'target' => 'College of Pharmacy (COP)',
        'session' => 'Session 2025-26',
        'file' => 'uploads/2026/03/PCI-APPROVAL-2025-26-COP.pdf',
        'is_image' => false
    ],
    [
        'category' => 'pci',
        'category_name' => 'PCI (Pharmacy)',
        'badge' => 'PCI',
        'badge_class' => 'bg-success text-white',
        'council' => 'Pharmacy Council of India',
        'title' => 'PCI Statutory Approval Letter - Institute of Pharmacy (IOP)',
        'target' => 'Institute of Pharmacy (IOP)',
        'session' => 'Session 2025-26',
        'file' => 'uploads/2026/03/PCI-APPROVAL-2025-26-IOP.pdf',
        'is_image' => false
    ],
    [
        'category' => 'pci',
        'category_name' => 'PCI (Pharmacy)',
        'badge' => 'PCI',
        'badge_class' => 'bg-success text-white',
        'council' => 'Pharmacy Council of India',
        'title' => 'PCI Extended Approval Order - School of Pharmacy (SOP)',
        'target' => 'School of Pharmacy (SOP)',
        'session' => 'Period 2019-2026',
        'file' => 'uploads/2026/03/SOP-Approvals-2019-2026-.pdf',
        'is_image' => false
    ],
    [
        'category' => 'pci',
        'category_name' => 'PCI (Pharmacy)',
        'badge' => 'PCI',
        'badge_class' => 'bg-success text-white',
        'council' => 'Pharmacy Council of India',
        'title' => 'PCI Extended Approval Order - College of Pharmacy (COP)',
        'target' => 'College of Pharmacy (COP)',
        'session' => 'Period 2019-2024',
        'file' => 'uploads/2026/03/COP-2019-2024.pdf',
        'is_image' => false
    ],
    [
        'category' => 'pci',
        'category_name' => 'PCI (Pharmacy)',
        'badge' => 'PCI',
        'badge_class' => 'bg-success text-white',
        'council' => 'Pharmacy Council of India',
        'title' => 'PCI Extended Approval Order - Institute of Pharmacy (IOP)',
        'target' => 'Institute of Pharmacy (IOP)',
        'session' => 'Period 2019-2024',
        'file' => 'uploads/2026/03/IOP-2019-2024.pdf',
        'is_image' => false
    ],
    [
        'category' => 'pci',
        'category_name' => 'PCI (Pharmacy)',
        'badge' => 'PCI',
        'badge_class' => 'bg-success text-white',
        'council' => 'Pharmacy Council of India',
        'title' => 'PCI Statutory Decision Letter - College of Pharmacy',
        'target' => 'College of Pharmacy (COP)',
        'session' => 'Session 2024-25',
        'file' => 'uploads/2025/06/13112024_103912_Decision-Letter-COP-24-25.pdf',
        'is_image' => false
    ],
    [
        'category' => 'pci',
        'category_name' => 'PCI (Pharmacy)',
        'badge' => 'PCI',
        'badge_class' => 'bg-success text-white',
        'council' => 'Pharmacy Council of India',
        'title' => 'PCI Statutory Decision Letter - Institute of Pharmacy',
        'target' => 'Institute of Pharmacy (IOP)',
        'session' => 'Session 2024-25',
        'file' => 'uploads/2025/06/13112024_103917_Decision-letter-IOP.pdf',
        'is_image' => false
    ],
    [
        'category' => 'pci',
        'category_name' => 'PCI (Pharmacy)',
        'badge' => 'PCI',
        'badge_class' => 'bg-success text-white',
        'council' => 'Pharmacy Council of India',
        'title' => 'PCI Statutory Decision Letter - School of Pharmacy',
        'target' => 'School of Pharmacy (SOP)',
        'session' => 'Session 2024-25',
        'file' => 'uploads/2025/06/13112024_103923_Decision-letter-SOP.pdf',
        'is_image' => false
    ],

    // --- BCI LAW APPROVALS ---
    [
        'category' => 'bci',
        'category_name' => 'BCI (Law)',
        'badge' => 'BCI',
        'badge_class' => 'bg-dark text-white',
        'council' => 'Bar Council of India',
        'title' => 'BCI Approval Letter - College of Professional Studies (LLB & BA LLB)',
        'target' => 'Faculty of Law / COPS',
        'session' => 'Session 2025-26',
        'file' => 'uploads/2025/06/10062025_124828_Approval-Letter-BCI-2025-26.pdf',
        'is_image' => false
    ],
    [
        'category' => 'bci',
        'category_name' => 'BCI (Law)',
        'badge' => 'BCI',
        'badge_class' => 'bg-dark text-white',
        'council' => 'Bar Council of India',
        'title' => 'BCI Extension of Provisional Approval of Affiliation',
        'target' => 'Faculty of Law (LLB & BA LLB)',
        'session' => 'Session 2024-25',
        'file' => 'uploads/2026/03/Extension-of-Provisional-approval-of-affiliation_BCI_2024-25.pdf',
        'is_image' => false
    ],
    [
        'category' => 'bci',
        'category_name' => 'BCI (Law)',
        'badge' => 'BCI',
        'badge_class' => 'bg-dark text-white',
        'council' => 'Bar Council of India',
        'title' => 'BCI Temporary Approval of Affiliation Letter',
        'target' => 'Faculty of Law (LLB & BA LLB)',
        'session' => 'Session 2022-23',
        'file' => 'uploads/2026/03/Extension-of-Provisional-Temporary-approval-of-Affiliation-Letter_BCI_2022-23.pdf',
        'is_image' => false
    ],
    [
        'category' => 'bci',
        'category_name' => 'BCI (Law)',
        'badge' => 'BCI',
        'badge_class' => 'bg-dark text-white',
        'council' => 'Bar Council of India',
        'title' => 'BCI Extension of Provisional Approval of Affiliation',
        'target' => 'Faculty of Law (LLB & BA LLB)',
        'session' => 'Session 2021-22',
        'file' => 'uploads/2026/03/Extension-of-Provisional-approval-of-affiliation_BCI_2021-22.pdf',
        'is_image' => false
    ],
    [
        'category' => 'bci',
        'category_name' => 'BCI (Law)',
        'badge' => 'BCI',
        'badge_class' => 'bg-dark text-white',
        'council' => 'Bar Council of India',
        'title' => 'BCI Final Approval Order - Legal Studies',
        'target' => 'Faculty of Law (LLB & BA LLB)',
        'session' => 'Period 2019-21',
        'file' => 'uploads/2026/03/Final-Letter_BCI_2019-21.pdf',
        'is_image' => false
    ],

    // --- AYUSH & MEDICAL (NCISM, CCH, NCH) ---
    [
        'category' => 'ayush',
        'category_name' => 'AYUSH (Ayurveda & Homeopathy)',
        'badge' => 'NCISM',
        'badge_class' => 'bg-warning text-dark',
        'council' => 'National Commission for Indian System of Medicine',
        'title' => 'NCISM Statutory Approval Letter - R N Kapoor Memorial Ayurvedic Medical College & Hospital',
        'target' => 'Ayurvedic Medical College (BAMS)',
        'session' => 'Session 2025-26',
        'file' => 'uploads/2026/03/NCISM-Approval-Letter_2025-26.pdf',
        'is_image' => false
    ],
    [
        'category' => 'ayush',
        'category_name' => 'AYUSH (Ayurveda)',
        'badge' => 'NCISM',
        'badge_class' => 'bg-warning text-dark',
        'council' => 'National Commission for Indian System of Medicine',
        'title' => 'NCISM Statutory Approval Letter - Ayurvedic Medical College',
        'target' => 'Ayurvedic Medical College (BAMS)',
        'session' => 'Session 2024-25',
        'file' => 'uploads/2026/03/NCISM-Approval-Letter_2024-25.pdf',
        'is_image' => false
    ],
    [
        'category' => 'ayush',
        'category_name' => 'AYUSH (Ayurveda)',
        'badge' => 'NCISM',
        'badge_class' => 'bg-warning text-dark',
        'council' => 'National Commission for Indian System of Medicine',
        'title' => 'NCISM Statutory Approval Order - AYU0629',
        'target' => 'Ayurvedic Medical College (BAMS)',
        'session' => 'Session 2023-24',
        'file' => 'uploads/2025/06/10062025_125317_NCISM-Approval-Letter-2024-25-AYU0629.pdf',
        'is_image' => false
    ],
    [
        'category' => 'ayush',
        'category_name' => 'AYUSH (Ayurveda)',
        'badge' => 'NCISM',
        'badge_class' => 'bg-warning text-dark',
        'council' => 'National Commission for Indian System of Medicine',
        'title' => 'NCISM Statutory Approval Letter - BAMS Program',
        'target' => 'Ayurvedic Medical College (BAMS)',
        'session' => 'Session 2022-23',
        'file' => 'uploads/2026/03/NCISM-Approval-Letter_2022-23.pdf',
        'is_image' => false
    ],
    [
        'category' => 'ayush',
        'category_name' => 'AYUSH (Ayurveda)',
        'badge' => 'NCISM',
        'badge_class' => 'bg-warning text-dark',
        'council' => 'National Commission for Indian System of Medicine',
        'title' => 'NCISM Intent Letter - Institutional Establishment',
        'target' => 'Ayurvedic Medical College',
        'session' => 'Session 2021-22',
        'file' => 'uploads/2026/03/NCISM-Intent-Letter_2021-22.pdf',
        'is_image' => false
    ],
    [
        'category' => 'ayush',
        'category_name' => 'AYUSH (State Govt)',
        'badge' => 'State NOC',
        'badge_class' => 'bg-secondary text-white',
        'council' => 'Government of Madhya Pradesh',
        'title' => 'Government of MP State No Objection Certificate (NOC) - BAMS',
        'target' => 'Faculty of Ayurvedic Medicine',
        'session' => 'State Statutory Order',
        'file' => 'uploads/2026/03/State-NOC-BAMS-2.pdf',
        'is_image' => false
    ],
    [
        'category' => 'ayush',
        'category_name' => 'AYUSH (Homeopathy)',
        'badge' => 'NCH / CCH',
        'badge_class' => 'bg-info text-dark',
        'council' => 'National Commission for Homoeopathy',
        'title' => 'R N Kapoor Memorial Homoeopathic Medical College (PG) AYUSH Approval',
        'target' => 'Homoeopathic Medical College (BHMS & MD)',
        'session' => 'Session 2025-26',
        'file' => 'uploads/2026/03/R.N.-Kapoor-HMC-_-28-7-2025_0001.pdf',
        'is_image' => false
    ],
    [
        'category' => 'ayush',
        'category_name' => 'AYUSH (Homeopathy)',
        'badge' => 'NCH / CCH',
        'badge_class' => 'bg-info text-dark',
        'council' => 'Central Council of Homoeopathy',
        'title' => 'CCH Approval Letter - Homoeopathic Medical College',
        'target' => 'Homoeopathic Medical College (BHMS)',
        'session' => 'Session 2025-26',
        'file' => 'uploads/2026/03/CCH-Approval-Letter-2025-26.pdf',
        'is_image' => false
    ],
    [
        'category' => 'ayush',
        'category_name' => 'AYUSH (Homeopathy)',
        'badge' => 'NCH / CCH',
        'badge_class' => 'bg-info text-dark',
        'council' => 'Central Council of Homoeopathy',
        'title' => 'CCH Approval Letter - Homoeopathic Medical College',
        'target' => 'Homoeopathic Medical College (BHMS)',
        'session' => 'Session 2024-25',
        'file' => 'uploads/2026/03/CCH-Approval-Letter-2024-25.pdf',
        'is_image' => false
    ],
    [
        'category' => 'ayush',
        'category_name' => 'AYUSH (Homeopathy)',
        'badge' => 'NCH / CCH',
        'badge_class' => 'bg-info text-dark',
        'council' => 'Central Council of Homoeopathy',
        'title' => 'CCH Approval Letter - Homoeopathic Medical College',
        'target' => 'Homoeopathic Medical College (BHMS)',
        'session' => 'Session 2023-24',
        'file' => 'uploads/2025/06/10062025_124937_CCH-Approval-Letter-2024-25.pdf',
        'is_image' => false
    ],
    [
        'category' => 'ayush',
        'category_name' => 'AYUSH (Homeopathy)',
        'badge' => 'NCH / CCH',
        'badge_class' => 'bg-info text-dark',
        'council' => 'National Commission for Homoeopathy',
        'title' => 'NCH Approval Letter - Homoeopathic Medical College',
        'target' => 'Homoeopathic Medical College (BHMS)',
        'session' => 'Session 2022-23',
        'file' => 'uploads/2026/03/NCH-Approval-Letter_2022-23.pdf',
        'is_image' => false
    ],
    [
        'category' => 'ayush',
        'category_name' => 'AYUSH (Homeopathy)',
        'badge' => 'NCH / CCH',
        'badge_class' => 'bg-info text-dark',
        'council' => 'National Commission for Homoeopathy',
        'title' => 'NCH Approval Letter - Homoeopathic Medical College',
        'target' => 'Homoeopathic Medical College (BHMS)',
        'session' => 'Session 2021-22',
        'file' => 'uploads/2026/03/NCH-Approval-Letter_2021-22.pdf',
        'is_image' => false
    ],
    [
        'category' => 'ayush',
        'category_name' => 'AYUSH (Homeopathy)',
        'badge' => 'NCH / CCH',
        'badge_class' => 'bg-info text-dark',
        'council' => 'Judicial / Regulatory Order',
        'title' => 'High Court Permission Order - Homoeopathic Medical College',
        'target' => 'Homoeopathic Medical College (BHMS)',
        'session' => 'Session 2020-21',
        'file' => 'uploads/2026/03/Court-Permission-Letter_2020-21.pdf',
        'is_image' => false
    ],
    [
        'category' => 'ayush',
        'category_name' => 'AYUSH (Homeopathy)',
        'badge' => 'NCH / CCH',
        'badge_class' => 'bg-info text-dark',
        'council' => 'Central Council of Homoeopathy',
        'title' => 'CCH Approval Letter - Homoeopathic Medical College',
        'target' => 'Homoeopathic Medical College (BHMS)',
        'session' => 'Session 2019-20',
        'file' => 'uploads/2026/03/CCH-Approval-Letter_2019-20.pdf',
        'is_image' => false
    ],

    // --- UGC & REGULATORY (MPPURC, NCTE) ---
    [
        'category' => 'ugc_reg',
        'category_name' => 'UGC Recognition',
        'badge' => 'UGC',
        'badge_class' => 'bg-danger text-white',
        'council' => 'University Grants Commission',
        'title' => 'UGC Section 2(f) Central Recognition Gazette Notification',
        'target' => 'Dr. A.P.J. Abdul Kalam University',
        'session' => 'Statutory Recognition',
        'file' => 'uploads/2025/06/05102020_043755_UGC_APPROVALS.pdf',
        'is_image' => false
    ],
    [
        'category' => 'ugc_reg',
        'category_name' => 'UGC Compliance',
        'badge' => 'UGC Expert',
        'badge_class' => 'bg-danger text-white',
        'council' => 'University Grants Commission',
        'title' => 'UGC Expert Committee Visit & Institutional Compliance Report',
        'target' => 'Dr. A.P.J. Abdul Kalam University',
        'session' => 'Compliance Verification',
        'file' => 'uploads/2026/03/UGC-Expert-Committee-Visited_10-11-May-2019-Complaince-1.pdf',
        'is_image' => false
    ],
    [
        'category' => 'ugc_reg',
        'category_name' => 'State Regulatory Commission',
        'badge' => 'MPPURC',
        'badge_class' => 'bg-primary text-white',
        'council' => 'M.P. Private University Regulatory Commission',
        'title' => 'MPPURC Regulatory Commission Aayog Statutory Approval Order',
        'target' => 'University Establishment & Regulations',
        'session' => 'Statutory Commission Order',
        'file' => 'uploads/2026/03/Aayog-Approval-MPPURC.pdf',
        'is_image' => false
    ],
    [
        'category' => 'ugc_reg',
        'category_name' => 'State Regulatory Commission',
        'badge' => 'MPPURC',
        'badge_class' => 'bg-primary text-white',
        'council' => 'M.P. Private University Regulatory Commission',
        'title' => 'Existing College Constituent Approvals & Integration Orders',
        'target' => 'Constituent Colleges Incorporation',
        'session' => 'Statutory Order',
        'file' => 'uploads/2026/03/Existing-College-Constitute-Approvals.pdf',
        'is_image' => false
    ],
    [
        'category' => 'ugc_reg',
        'category_name' => 'NCTE (Teacher Education)',
        'badge' => 'NCTE',
        'badge_class' => 'bg-success text-white',
        'council' => 'National Council for Teacher Education',
        'title' => 'NCTE Statutory Approval Order - College of Professional Studies B.Ed.',
        'target' => 'Faculty of Education (B.Ed)',
        'session' => 'NCTE Approved',
        'file' => 'uploads/2025/06/09082021_121616_B.Ed_.-Approval.pdf',
        'is_image' => false
    ],

    // --- ACCREDITATION MEMBERSHIPS ---
    [
        'category' => 'memberships',
        'category_name' => 'University Consortium',
        'badge' => 'AIU',
        'badge_class' => 'bg-warning text-dark',
        'council' => 'Association of Indian Universities',
        'title' => 'Official Certificate of Membership - Association of Indian Universities (AIU)',
        'target' => 'National University Equivalency & Sports',
        'session' => 'Lifetime Member',
        'file' => 'uploads/2025/06/09082021_121610_AIU-Approval-of-Dr.-APJ-Abdul-Kalam-University-scaled.jpg',
        'is_image' => true
    ],
    [
        'category' => 'memberships',
        'category_name' => 'International Alliance',
        'badge' => 'AUAP',
        'badge_class' => 'bg-info text-dark',
        'council' => 'Association of Universities of Asia and the Pacific',
        'title' => 'AUAP International University Membership Certificate',
        'target' => 'Global Academic Exchanges & Research',
        'session' => 'International Member',
        'file' => 'uploads/2025/06/02042021_041948_AUAP-CERTIFICATE.jpg',
        'is_image' => true
    ],
    [
        'category' => 'memberships',
        'category_name' => 'Professional Society',
        'badge' => 'CSI',
        'badge_class' => 'bg-dark text-white',
        'council' => 'Computer Society of India',
        'title' => 'Computer Society of India (CSI) Educational Institutional Membership',
        'target' => 'Department of Computer Science & IT',
        'session' => 'Institutional Member',
        'file' => 'uploads/2025/06/ACADEMIC-COUNCIL_2024-25.pdf',
        'is_image' => false
    ]
];
?>

<!-- Inner Page Luxury Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="why-aku.php">About</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Statutory Approvals</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> ACCREDITATIONS, RANKINGS &amp; APPROVALS
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Statutory Approvals &amp; Accreditations Repository
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Recognized &amp; Approved by UGC, AICTE, PCI, BCI, NCTE, NCISM &amp; NCH
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
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">State Established &amp; Centrally Recognized</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    Dr. A.P.J. Abdul Kalam University, Indore is a premier multidisciplinary university established under the Madhya Pradesh Niji Vishwavidyalaya Adhiniyam and recognized by the <strong>University Grants Commission (UGC)</strong> under Section 2(f). All professional degree programs strictly conform to the regulatory mandates of <strong>AICTE, PCI, BCI, NCTE, NCISM, and NCH</strong>.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Search & Category Filters Bar -->
                    <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs mb-4">
                        <div class="row g-3 align-items-center justify-content-between">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-custom text-muted"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    <input type="text" id="approvalSearchInput" class="form-control border-custom small" placeholder="Search approvals by council, degree, year (e.g. 2025-26, Pharmacy)..." onkeyup="filterApprovalRows()">
                                </div>
                            </div>
                            <div class="col-lg-6 text-lg-end">
                                <span class="badge bg-gold text-dark fw-bold px-3 py-2 rounded-pill font-monospace" id="approvalCounterBadge">
                                    <i class="fa-solid fa-file-shield me-1"></i> <?php echo count($allApprovals); ?> Statutory Orders
                                </span>
                            </div>
                        </div>

                        <!-- Filter Category Pills -->
                        <div class="d-flex align-items-center gap-1.5 flex-wrap pt-3 mt-3 border-top border-custom" id="categoryFilterContainer">
                            <button type="button" class="btn btn-sm btn-gold-pill px-3 py-1 font-monospace fw-bold active-filter-btn" onclick="setCategoryFilter('all', this)">All (<?php echo count($allApprovals); ?>)</button>
                            <button type="button" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 font-monospace fw-semibold" onclick="setCategoryFilter('aicte', this)">AICTE (6)</button>
                            <button type="button" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 font-monospace fw-semibold" onclick="setCategoryFilter('pci', this)">PCI (9)</button>
                            <button type="button" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 font-monospace fw-semibold" onclick="setCategoryFilter('bci', this)">BCI Law (5)</button>
                            <button type="button" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 font-monospace fw-semibold" onclick="setCategoryFilter('ayush', this)">AYUSH &amp; Medical (14)</button>
                            <button type="button" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 font-monospace fw-semibold" onclick="setCategoryFilter('ugc_reg', this)">UGC &amp; Regulatory (5)</button>
                            <button type="button" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 font-monospace fw-semibold" onclick="setCategoryFilter('memberships', this)">Memberships (3)</button>
                        </div>
                    </div>

                    <!-- Approvals Table -->
                    <div class="mb-5">
                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0" id="approvalsTable">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;" class="text-center">#</th>
                                        <th>Statutory Council &amp; Order Title</th>
                                        <th style="width: 190px;">Target Institution / Scope</th>
                                        <th style="width: 140px;">Validity / Session</th>
                                        <th style="width: 120px;" class="text-end">Document</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($allApprovals as $idx => $a): 
                                        $fileIcon = $a['is_image'] ? 'fa-file-image text-warning' : 'fa-file-pdf text-danger';
                                    ?>
                                    <tr class="approval-row" 
                                        data-category="<?php echo $a['category']; ?>"
                                        data-search="<?php echo strtolower(htmlspecialchars($a['title'] . ' ' . $a['council'] . ' ' . $a['target'] . ' ' . $a['session'] . ' ' . $a['badge'])); ?>">
                                        <td class="text-center font-monospace fw-bold text-primary"><?php echo sprintf('%02d', $idx + 1); ?></td>
                                        <td>
                                            <div class="d-flex align-items-start gap-2.5">
                                                <i class="fa-solid <?php echo $fileIcon; ?> fs-5 mt-1 flex-shrink-0"></i>
                                                <div>
                                                    <a href="<?php echo htmlspecialchars($a['file']); ?>" target="_blank" class="fw-bold text-primary text-decoration-none d-block hover-gold" style="font-size: 0.92rem; line-height: 1.4;">
                                                        <?php echo htmlspecialchars($a['title']); ?>
                                                    </a>
                                                    <div class="d-flex align-items-center gap-2 mt-1">
                                                        <span class="badge <?php echo $a['badge_class']; ?> px-2 py-0.5" style="font-size: 0.68rem; letter-spacing: 0.05em;"><?php echo htmlspecialchars($a['badge']); ?></span>
                                                        <span class="small text-gold fw-semibold" style="font-size: 0.78rem;"><?php echo htmlspecialchars($a['council']); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="small text-dark fw-medium d-block" style="font-size: 0.82rem; line-height: 1.4;"><?php echo htmlspecialchars($a['target']); ?></span>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark border small px-2.5 py-1 fw-semibold font-monospace" style="font-size: 0.75rem;"><?php echo htmlspecialchars($a['session']); ?></span>
                                        </td>
                                        <td class="text-end">
                                            <a href="<?php echo htmlspecialchars($a['file']); ?>" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1.5 small fw-semibold" download>
                                                <i class="fa-solid fa-download me-1 text-gold"></i> <?php echo $a['is_image'] ? 'JPG' : 'PDF'; ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Client-Side Filter & Search Script -->
                    <script>
                    var currentSelectedCategory = 'all';

                    function setCategoryFilter(cat, btn) {
                        currentSelectedCategory = cat;
                        var buttons = document.querySelectorAll('#categoryFilterContainer button');
                        buttons.forEach(function(b) {
                            b.className = 'btn btn-sm btn-outline-dark rounded-pill px-3 py-1 font-monospace fw-semibold';
                        });
                        btn.className = 'btn btn-sm btn-gold-pill px-3 py-1 font-monospace fw-bold active-filter-btn';
                        filterApprovalRows();
                    }

                    function filterApprovalRows() {
                        var searchVal = document.getElementById('approvalSearchInput').value.toLowerCase().trim();
                        var rows = document.querySelectorAll('#approvalsTable tbody tr.approval-row');
                        var visibleCount = 0;

                        rows.forEach(function(row) {
                            var rowCategory = row.getAttribute('data-category');
                            var rowSearchText = row.getAttribute('data-search') || '';

                            var matchesCategory = (currentSelectedCategory === 'all' || rowCategory === currentSelectedCategory);
                            var matchesSearch = (searchVal === '' || rowSearchText.indexOf(searchVal) !== -1);

                            if (matchesCategory && matchesSearch) {
                                row.style.display = '';
                                visibleCount++;
                            } else {
                                row.style.display = 'none';
                            }
                        });

                        var badge = document.getElementById('approvalCounterBadge');
                        if (badge) {
                            badge.innerHTML = '<i class="fa-solid fa-file-shield me-1"></i> ' + visibleCount + ' Statutory Orders';
                        }
                    }
                    </script>

                    <!-- Statutory Badges Grid -->
                    <div class="row g-3">
                        <div class="col-sm-6 col-md-4">
                            <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs d-flex align-items-center gap-3">
                                <i class="fa-solid fa-building-columns text-gold fs-3"></i>
                                <div>
                                    <div class="font-serif text-primary fw-bold fs-6">AICTE Approved</div>
                                    <div class="small text-muted-custom" style="font-size: 0.8rem;">Engineering &amp; Technology</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs d-flex align-items-center gap-3">
                                <i class="fa-solid fa-prescription-bottle-medical text-gold fs-3"></i>
                                <div>
                                    <div class="font-serif text-primary fw-bold fs-6">PCI Approved</div>
                                    <div class="small text-muted-custom" style="font-size: 0.8rem;">Pharmacy Council of India</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs d-flex align-items-center gap-3">
                                <i class="fa-solid fa-scale-balanced text-gold fs-3"></i>
                                <div>
                                    <div class="font-serif text-primary fw-bold fs-6">BCI Approved</div>
                                    <div class="small text-muted-custom" style="font-size: 0.8rem;">Bar Council of India</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs d-flex align-items-center gap-3">
                                <i class="fa-solid fa-award text-gold fs-3"></i>
                                <div>
                                    <div class="font-serif text-primary fw-bold fs-6">UGC Recognized</div>
                                    <div class="small text-muted-custom" style="font-size: 0.8rem;">Section 2(f) UGC Act 1956</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs d-flex align-items-center gap-3">
                                <i class="fa-solid fa-chalkboard-user text-gold fs-3"></i>
                                <div>
                                    <div class="font-serif text-primary fw-bold fs-6">NCTE Approved</div>
                                    <div class="small text-muted-custom" style="font-size: 0.8rem;">Teacher Education Council</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="p-3.5 rounded-4 border border-custom bg-white shadow-xs d-flex align-items-center gap-3">
                                <i class="fa-solid fa-leaf text-gold fs-3"></i>
                                <div>
                                    <div class="font-serif text-primary fw-bold fs-6">NCISM &amp; NCH</div>
                                    <div class="small text-muted-custom" style="font-size: 0.8rem;">Ayurveda &amp; Homeopathy</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Inquiries Footer Box -->
                    <div class="p-4 rounded-4 border border-custom bg-white d-flex align-items-center justify-content-between flex-wrap gap-3 shadow-xs mt-5">
                        <div>
                            <h5 class="font-serif text-primary fw-bold fs-6 mb-0.5">Need More Information?</h5>
                            <p class="small text-muted-custom mb-0">For statutory documentation or academic queries regarding Approvals, reach out to the Registrar Office.</p>
                        </div>
                        <a href="contact-us.php" class="btn btn-sm btn-gold-pill px-3.5 py-2 fw-bold">
                            <i class="fa-solid fa-headset me-1"></i> Contact Registrar
                        </a>
                    </div>

                </article>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-xl-3">
                <?php include "about-sidebar.php"; ?>
            </div>

        </div>
    </div>
</main>

<?php include "footer.php"; ?>
