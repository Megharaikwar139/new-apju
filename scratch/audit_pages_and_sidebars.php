<?php
$headerContent = file_get_contents(__DIR__ . '/../header.php');

// Define tabs and their submenus based on header.php
$tabs = [
    'about' => [
        'name' => 'About Us',
        'sidebar_file' => 'about-sidebar.php',
        'items' => [
            'why-aku.php' => 'Why AKU',
            'the-founder-2.php' => 'The Founder',
            'the-chancellor.php' => 'Chancellor',
            'pro-chancellor.php' => 'Pro Chancellor',
            'the-vice-chancellor.php' => 'Vice Chancellor',
            'the-pro-vice-chancellor.php' => 'Pro Vice Chancellor',
            'the-chairman.php' => 'The Chairman',
            'registrar.php' => 'Registrar',
            'chief-proctor.php' => 'Chief Proctor',
            'governing-body.php' => 'Governing Body',
            'board-of-management.php' => 'Board of Management',
            'academic-council.php' => 'Academic Council',
            'sponsoring-body.php' => 'Sponsoring Body',
            'finance-committee.php' => 'Finance Committee',
            'mandatory-disclosers.php' => 'Mandatory Disclosures',
            'awardsand-recognigation.php' => 'Awards & Recognition',
            'aku-in-media.php' => 'AKU in Media',
            'ugc-recognition.php' => 'UGC Recognition',
            'naac.php' => 'NAAC Accreditation',
            'nirf.php' => 'NIRF Ranking',
            'ariia.php' => 'ARIIA Ranking',
            'aicte-approvals.php' => 'AICTE Approvals',
            'approvals.php' => 'Statutory Approvals',
            'mous.php' => 'Institutional MOUs',
            'world-class-infrastructure.php' => 'Campus Infrastructure',
        ]
    ],
    'admissions' => [
        'name' => 'Admissions',
        'sidebar_file' => 'admission-sidebar.php',
        'items' => [
            'programs.php' => 'All Academic Programs',
            'apply-now.php' => 'Apply Online 2026',
            'admission-assistance.php' => 'Admission Assistance',
            'admission-procedure.php' => 'Admission Procedure',
            'admission-committee.php' => 'Admission Committee',
            'department-intake.php' => 'Department Intake Capacity',
            'faqs.php' => 'FAQs',
            'fee-structure.php' => 'Fee Structure',
            'general-rules-and-regulations.php' => 'General Rules and Regulations',
            'hostel-rules-regulations.php' => 'Hostel Rules & Regulations',
            'scholarships.php' => 'Scholarships',
            'download-form.php' => 'Admission Application Form'
        ]
    ],
    'examination' => [
        'name' => 'Examination',
        'sidebar_file' => 'exam-sidebar.php',
        'items' => [
            'about-the-section.php' => 'About The Section',
            'examination-committee.php' => 'Examination Committee',
            'examination-board.php' => 'Examination Board',
            'exam-policy.php' => 'Examination Policy',
            'exam-code.php' => 'Examination Code',
            'examination-calendar.php' => 'Examination Schedule',
            'old-question-papers.php' => 'Old Question Papers',
            'results.php' => 'Results',
            'convocation.php' => 'Convocation',
            'digi-locker-nad-gov-in.php' => 'Digi Locker (nad.gov.in)',
            'admit-card-download.php' => 'Admit Card Download',
            'forms.php' => 'Forms',
            'exam-notice.php' => 'Exam Notice'
        ]
    ],
    'committees' => [
        'name' => 'Committees',
        'sidebar_file' => 'committee-sidebar.php',
        'items' => [
            'anti-reggiging-committee.php' => 'Anti Ragging Committee',
            'anti-ragging-squad.php' => 'Anti Ragging Squad',
            'academic-committee.php' => 'Academic Committee',
            'cultruaral-committee.php' => 'Cultural Committee',
            'employee-grievance-wellfare-cell.php' => 'Employee Grievance/ Welfare Cell',
            'equalization-committee.php' => 'Equalization Committee',
            'infrastructure-campus-beautification-committee.php' => 'Infrastructure /Campus Beautification Committee',
            'regulatory-committee.php' => 'Regulatory Committee',
            'management-information-system-erp-committee.php' => 'Management Information System/ERP Committee',
            'library-committee.php' => 'Library Committee',
            'womens-grievance-redressal-and-welfare-cell.php' => 'Women’s Grievance Redressal and Welfare Cell',
            'jan-aushadhi-committee.php' => 'Jan Aushadhi Committee',
            'fdp-committee.php' => 'Faculty Development Programme (FDP) Committee',
            'purchase-committee.php' => 'Purchase Committee',
            'intellectual-property-rights-cell-ipr-cell.php' => 'Intellectual Property Rights Cell (IPR Cell)',
            'icc.php' => 'Internal Complaint Committee (ICC)',
            'sprots-committee.php' => 'Sports Committee',
            'hostel-disciplinary-committee.php' => 'Hostel Disciplinary Committee',
            'i-block-seminar-hall-committee.php' => 'I-Block Seminar Hall Committee'
        ]
    ],
    'placements' => [
        'name' => 'Placements',
        'sidebar_file' => 'placement-sidebar.php',
        'items' => [
            'our-recruiters.php' => 'Our Recruiters',
            'placement-cell.php' => 'Placement Cell',
            'corporate-interaction.php' => 'Corporate Interaction',
            'visits-events.php' => 'Visits/Events',
            'tp-industry.php' => 'T&P/Industry Linkage Committee',
            'placement-chart.php' => 'Placement Chart'
        ]
    ],
    'research' => [
        'name' => 'Research',
        'sidebar_file' => 'research-sidebar.php',
        'items' => [
            'research-area.php' => 'Research Areas',
            'research-committee.php' => 'Research and Development Committee',
            'fees-details.php' => 'Fees Details',
            'ph-d-selection-process.php' => 'Ph.D. Selection Process',
            'faculty-publications.php' => 'Faculty Publications',
            'incubation-center.php' => 'Kalam Incubation Center',
            'profile.php' => 'Academic & Research Profile'
        ]
    ],
    'student_zone' => [
        'name' => 'Student Zone',
        'sidebar_file' => 'student-sidebar.php',
        'items' => [
            'notice-board.php' => 'Notice Board',
            'academic-calendar.php' => 'Academic Calendar',
            'student-holiday-calender.php' => 'Student Holiday Calendar',
            'student-assistance.php' => 'Student Assistance',
            'student-grievance-cell.php' => 'Student Grievance Cell',
            'sc-st-committee.php' => 'SC/ST Committee',
            'scholarship-committee.php' => 'Scholarship Committee',
            'transport-committee.php' => 'Hostel/Canteen/Transport Committee',
            'download-form-student.php' => 'Student Request Forms',
            'sgrc.php' => 'SGRC (Grievance Redressal)',
            'ncc-nss-cell.php' => 'NCC/NSS Cell',
            'alumini-committee.php' => 'Alumni Committee'
        ]
    ],
    'event' => [
        'name' => 'Event',
        'sidebar_file' => 'campus-sidebar.php',
        'items' => [
            'gallery.php' => 'Gallery',
            'university-events.php' => 'University Events & Fests',
            'upcoming-events-and-news.php' => 'Upcoming Events and News',
            'visiters-testomonials.php' => 'Visiters Testomonials',
            'students-testomonials.php' => 'Students Testomonials'
        ]
    ]
];

echo "=== CHECKING PAGE SIDEBAR INCLUDES BY TAB ===\n\n";

foreach ($tabs as $key => $tab) {
    echo "--- Tab: {$tab['name']} (Expected Sidebar: {$tab['sidebar_file']}) ---\n";
    foreach ($tab['items'] as $file => $title) {
        $path = __DIR__ . '/../' . $file;
        if (!file_exists($path)) {
            echo "  [FILE NOT FOUND] {$file} ({$title})\n";
            continue;
        }
        $c = file_get_contents($path);
        if (preg_match('/(?:include|require|include_once|require_once)\s*[\'"]([^\'"]*sidebar[^\'"]*)[\'"]/i', $c, $m)) {
            $currentSidebar = $m[1];
            if ($currentSidebar === $tab['sidebar_file']) {
                echo "  [OK] {$file} includes {$currentSidebar}\n";
            } else {
                echo "  [MISMATCH] {$file} includes '{$currentSidebar}' (Expected: '{$tab['sidebar_file']}')\n";
            }
        } else {
            echo "  [NO SIDEBAR] {$file} has NO sidebar include!\n";
        }
    }
    echo "\n";
}
