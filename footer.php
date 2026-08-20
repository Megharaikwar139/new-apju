<?php
// Fetch site settings
try {
    $settings = $pdo->query("SELECT * FROM site_settings_custom LIMIT 1")->fetch() ?: [
        'university_tagline' => '…Nurturing Talents to Success',
        'address' => 'Indore-Dewas Bypass Road, Village Arandia, Post Jhalaria, Dewas Naka, Indore – 452016, Madhya Pradesh, India',
        'phone' => '+91 731 2530 500 / +91 91111 09999',
        'email' => 'info@aku.ac.in',
        'admissions_email' => 'admissions@aku.ac.in',
        'facebook_url' => 'https://www.facebook.com/DR.APJAK.University',
        'instagram_url' => 'https://www.instagram.com/drapjaku_universityindore/',
        'twitter_url' => 'https://x.com/APJ_University',
        'linkedin_url' => 'https://www.linkedin.com/in/akuniversityindore/',
        'youtube_url' => 'https://www.youtube.com/channel/UCHuwjAPSYLsThbZldaC75_A',
        'copyright_text' => '© ' . date('Y') . ' Dr. A.P.J. Abdul Kalam University, Indore. All rights reserved.'
    ];
} catch (Exception $e) {
    $settings = [];
}
?>

<footer class="pt-5 pb-4 mt-5 text-white" style="background-color: var(--primary-color);">
    <div class="container-custom">
        
        <!-- Top Footer Row: Newsletter & Contact Details -->
        <div class="row g-4 justify-content-between align-items-start pb-5 border-bottom border-white border-opacity-15">
            
            <!-- Left: Newsletter -->
            <div class="col-lg-6">
                <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
                    <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> Stay Connected
                </div>
                <h3 class="font-serif display-6 fw-medium text-white mb-2" style="max-width: 460px; line-height: 1.2;">
                    Receive our stories, research and admissions news.
                </h3>
                <form action="javascript:void(0);" onsubmit="let input = this.querySelector('input[type=email]'); let email = input.value.trim(); if(!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) { alert('Please enter a valid email address (e.g. yourname@domain.com).'); input.focus(); return false; } alert('Thank you for subscribing to Dr. APJ Abdul Kalam University newsletter!'); this.reset();" class="newsletter-capsule mt-4">
                    <input type="email" required pattern="[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}" placeholder="your@email.com" class="newsletter-input" title="Please enter a valid email address"/>
                    <button type="submit" class="newsletter-btn">
                        Subscribe
                    </button>
                </form>
            </div>

            <!-- Right: Contact Details -->
            <div class="col-lg-5 small text-white text-opacity-85 lh-base pt-2">
                <div class="d-flex align-items-start gap-3 mb-3">
                    <i class="fa-solid fa-location-dot text-gold fs-5 mt-1 flex-shrink-0"></i>
                    <div>
                        <strong class="font-serif fs-6 text-white d-block mb-1">Dr. A.P.J. Abdul Kalam University</strong>
                        <span class="text-white text-opacity-75"><?php echo nl2br(htmlspecialchars($settings['address'] ?? '')); ?></span>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3 mb-2">
                    <i class="fa-solid fa-phone text-gold flex-shrink-0"></i>
                    <a href="tel:<?php echo htmlspecialchars(explode('/', $settings['phone'] ?? '')[0]); ?>" class="footer-link text-white text-opacity-85">
                        <?php echo htmlspecialchars($settings['phone'] ?? '+91 731 2530 500'); ?>
                    </a>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <i class="fa-solid fa-envelope text-gold flex-shrink-0"></i>
                    <a href="mailto:<?php echo htmlspecialchars($settings['email'] ?? 'info@aku.ac.in'); ?>" class="footer-link text-white text-opacity-85">
                        <?php echo htmlspecialchars($settings['email'] ?? 'info@aku.ac.in'); ?>
                    </a>
                </div>
            </div>

        </div>

        <!-- Middle Footer Row: 5 Column Structured Site Directory -->
        <div class="row g-4 py-5 border-bottom border-white border-opacity-15 small">
            
            <!-- Col 1: About University -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-column-heading">About University</div>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                    <li><a href="why-aku.php" class="footer-link text-gold fw-medium">Why AKU</a></li>
                    <li><a href="the-founder-2.php" class="footer-link">The Founder</a></li>
                    <li><a href="the-chancellor.php" class="footer-link">The Chancellor</a></li>
                    <li><a href="the-vice-chancellor.php" class="footer-link">The Vice Chancellor</a></li>
                    <li><a href="governing-body.php" class="footer-link">Governing Body</a></li>
                    <li><a href="board-of-management.php" class="footer-link">Board of Management</a></li>
                    <li><a href="finance-committee.php" class="footer-link">Finance Committee</a></li>
                    <li><a href="awardsand-recognigation.php" class="footer-link">Awards & Recognition</a></li>
                    <li><a href="aku-in-media.php" class="footer-link">AKU in Media</a></li>
                </ul>
            </div>

            <!-- Col 2: Academic Faculties -->
            <div class="col-lg-2 col-md-6 col-6">
                <div class="footer-column-heading">Academics</div>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                    <li><a href="department-of-computer-science-engineering.php" class="footer-link">Faculty of Engineering</a></li>
                    <li><a href="college-of-pharmacy.php" class="footer-link">Faculty of Pharmacy</a></li>
                    <li><a href="department-of-management-studies.php" class="footer-link">College of Management</a></li>
                    <li><a href="department-of-commerce.php" class="footer-link">College of Commerce</a></li>
                    <li><a href="department-of-law.php" class="footer-link">College of Law</a></li>
                    <li><a href="department-of-agriculture.php" class="footer-link">School of Agriculture</a></li>
                    <li><a href="department-of-science.php" class="footer-link">Science & Life Science</a></li>
                    <li><a href="academic-calendar.php" class="footer-link text-gold">Academic Calendar</a></li>
                </ul>
            </div>

            <!-- Col 3: Admissions & Research -->
            <div class="col-lg-2 col-md-4 col-6">
                <div class="footer-column-heading">Admissions & R&D</div>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                    <li><a href="admission-procedure.php" class="footer-link text-gold fw-semibold">Admission 2026</a></li>
                    <li><a href="ph-d-selection-process.php" class="footer-link">Ph.D Admissions</a></li>
                    <li><a href="fee-structure.php" class="footer-link">Fee Structure</a></li>
                    <li><a href="scholarships.php" class="footer-link">Scholarships</a></li>
                    <li><a href="incubation-center.php" class="footer-link">Kalam Incubation</a></li>
                    <li><a href="research-committee.php" class="footer-link">R&D Committee</a></li>
                    <li><a href="faculty-publications.php" class="footer-link">Faculty Publications</a></li>
                    <li><a href="download-form.php" class="footer-link">Download Forms</a></li>
                </ul>
            </div>

            <!-- Col 4: Examinations & Campus -->
            <div class="col-lg-2 col-md-4 col-6">
                <div class="footer-column-heading">Examinations & Life</div>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                    <li><a href="results.php" class="footer-link text-gold fw-medium">Exam Results Portal</a></li>
                    <li><a href="examination-calendar.php" class="footer-link">Exam Schedule</a></li>
                    <li><a href="exam-notice.php" class="footer-link">Exam Notices</a></li>
                    <li><a href="old-question-papers.php" class="footer-link">Old Question Papers</a></li>
                    <li><a href="convocation.php" class="footer-link">Convocation</a></li>
                    <li><a href="world-class-infrastructure.php" class="footer-link">Infrastructure</a></li>
                    <li><a href="hostel-rules-regulations.php" class="footer-link">Hostel & Living</a></li>
                    <li><a href="gallery.php" class="footer-link">Photo Gallery</a></li>
                    <li><a href="university-events.php" class="footer-link">Campus Events &amp; Fests</a></li>
                </ul>
            </div>

            <!-- Col 5: Statutory & Portals -->
            <div class="col-lg-3 col-md-4 col-6">
                <div class="footer-column-heading">Statutory & Portals</div>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                    <li><a href="https://www.universitymanagementsystem.in/aku/Home/Dashboard" target="_blank" class="footer-link"><i class="fa-solid fa-file-circle-check text-gold me-1"></i> Document Verify</a></li>
                    <li><a href="https://login.rssrcampusconnect.com/" target="_blank" class="footer-link"><i class="fa-solid fa-right-to-bracket text-gold me-1"></i> Student ERP Login</a></li>
                    <li><a href="career.php" class="footer-link text-gold fw-medium"><i class="fa-solid fa-briefcase me-1"></i> Careers @ AKU</a></li>
                    <li><a href="notice-board.php" class="footer-link">Official Notice Board</a></li>
                    <li><a href="placement-cell.php" class="footer-link">Training & Placement</a></li>
                    <li><a href="our-recruiters.php" class="footer-link">Our 500+ Recruiters</a></li>
                    <li><a href="iqac.php" class="footer-link">IQAC (NAAC / NIRF)</a></li>
                    <li><a href="mandatory-disclosers.php" class="footer-link">Mandatory Disclosures</a></li>
                    <li><a href="ugc-recognition.php" class="footer-link">UGC Recognition</a></li>
                    <li><a href="admin/login.php" class="footer-link text-gold fw-semibold"><i class="fa-solid fa-lock me-1"></i> CMS Admin Portal</a></li>
                </ul>
            </div>

        </div>

        <!-- Copyright & Legal Bar -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 pt-4 small text-white text-opacity-60" style="font-size: 0.78rem;">
            <div><?php echo htmlspecialchars($settings['copyright_text'] ?? ('© ' . date('Y') . ' Dr. A.P.J. Abdul Kalam University, Indore. All rights reserved.')); ?></div>
            <div class="d-flex flex-wrap gap-3">
                <a href="privacy-policy.php" class="footer-link text-white text-opacity-60">Privacy Policy</a>
                <a href="terms-of-use.php" class="footer-link text-white text-opacity-60">Terms of Use</a>
                <a href="payment-terms.php" class="footer-link text-white text-opacity-60">Payment Terms</a>
                <a href="refund-cancellation.php" class="footer-link text-white text-opacity-60">Refund Policy</a>
                <a href="anti-reggiging-committee.php" class="footer-link text-white text-opacity-60">Anti-Ragging</a>
                <a href="icc.php" class="footer-link text-white text-opacity-60">ICC</a>
                <a href="sgrc.php" class="footer-link text-white text-opacity-60">Grievance Redressal</a>
                <a href="rti-act.php" class="footer-link text-white text-opacity-60">RTI Act</a>
            </div>
        </div>

    </div>
</footer>

<!-- Bootstrap 5.3.3 JavaScript Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
