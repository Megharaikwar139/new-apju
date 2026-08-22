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
                <form action="javascript:void(0);" onsubmit="alert('Thank you for subscribing to Dr. APJ Abdul Kalam University newsletter!');" class="newsletter-capsule mt-4">
                    <input type="email" required placeholder="your@email.com" class="newsletter-input"/>
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

        <!-- Comprehensive 5-Column Sitemap Linking All Website Pages -->
        <div class="row g-4 py-5">
            
            <!-- Col 1: Brand & Social Media -->
            <div class="col-lg-3 col-md-6">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <img src="assets/lovable/aku-logo.jpeg" alt="AKU Logo" class="bg-white p-1 rounded-3 shadow-xs flex-shrink-0" style="height: 56px; width: auto;"/>
                    <div class="lh-sm">
                        <div class="font-serif fw-bold text-white fs-6" style="font-size: 1.05rem !important; line-height: 1.25;">Dr. A. P. J. Abdul Kalam University</div>
                        <div class="text-gold text-uppercase fw-semibold mt-1" style="font-size: 0.64rem; letter-spacing: 0.12em;">NURTURING TALENT TO SUCCESS</div>
                    </div>
                </div>
                <p class="text-white text-opacity-80 small mb-3" style="font-size: 0.85rem; line-height: 1.65;">
                    The Society was established in 2004 under the flagship of Central India Institute of Technology ever since its inception, a strong commitment to excellence in teaching and research has made the group a role-model and path-setter for other institution.
                </p>
                
                <!-- Direct Connected Social Media Links -->
                <div class="d-flex align-items-center gap-2 mt-3">
                    <a href="<?php echo htmlspecialchars($settings['facebook_url'] ?? 'https://www.facebook.com/DR.APJAK.University'); ?>" target="_blank" class="footer-social-btn" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="<?php echo htmlspecialchars($settings['instagram_url'] ?? 'https://www.instagram.com/drapjaku_universityindore/'); ?>" target="_blank" class="footer-social-btn" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="<?php echo htmlspecialchars($settings['twitter_url'] ?? 'https://x.com/APJ_University'); ?>" target="_blank" class="footer-social-btn" title="X (Twitter)"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="<?php echo htmlspecialchars($settings['linkedin_url'] ?? 'https://www.linkedin.com/in/akuniversityindore/'); ?>" target="_blank" class="footer-social-btn" title="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="<?php echo htmlspecialchars($settings['youtube_url'] ?? 'https://www.youtube.com/channel/UCHuwjAPSYLsThbZldaC75_A'); ?>" target="_blank" class="footer-social-btn" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>

            <!-- Col 2: Academics & Schools -->
            <div class="col-lg-2 col-md-6 col-6">
                <div class="footer-column-heading">Academics</div>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                    <li><a href="programs.php" class="footer-link text-gold fw-bold"><i class="fa-solid fa-layer-group me-1"></i> All Programs Directory</a></li>
                    <li><a href="department-of-computer-science-engineering.php" class="footer-link">Engineering & Tech</a></li>
                    <li><a href="department-of-management-studies.php" class="footer-link">Business & Management</a></li>
                    <li><a href="department-of-pharmacy.php" class="footer-link">Pharmacy & Health</a></li>
                    <li><a href="department-of-law.php" class="footer-link">Law & Legal Studies</a></li>
                    <li><a href="department-of-science.php" class="footer-link">Science & Research</a></li>
                    <li><a href="department-of-education.php" class="footer-link">Education & Humanities</a></li>
                    <li><a href="department-of-agriculture.php" class="footer-link">Agricultural Sciences</a></li>
                    <li><a href="diploma-in-enginering.php" class="footer-link">Polytechnic Diploma</a></li>
                    <li><a href="academic-calendar.php" class="footer-link text-gold fw-medium">Academic Calendar</a></li>
                </ul>
            </div>

            <!-- Col 3: Admissions & Research -->
            <div class="col-lg-2 col-md-4 col-6">
                <div class="footer-column-heading">Admissions & R&D</div>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                    <li><a href="apply-now.php" class="footer-link text-gold fw-bold"><i class="fa-solid fa-graduation-cap me-1"></i> Apply Online 2026</a></li>
                    <li><a href="admission-procedure.php" class="footer-link">Admission Procedure</a></li>
                    <li><a href="ph-d-selection-process.php" class="footer-link">Ph.D Admissions</a></li>
                    <li><a href="fee-structure.php" class="footer-link">Fee Structure</a></li>
                    <li><a href="admission-assistance.php" class="footer-link">Admission Helpdesk</a></li>
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
                    <li><a href="contact-us.php" class="footer-link text-gold fw-semibold"><i class="fa-solid fa-location-dot me-1"></i> Contact &amp; Campus Map</a></li>
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
                    <li><a href="contact-us.php" class="footer-link text-gold fw-medium"><i class="fa-solid fa-envelope-open-text me-1"></i> Contact &amp; Inquiries</a></li>
                    <li><a href="placement-cell.php" class="footer-link">Training & Placement</a></li>
                    <li><a href="our-recruiters.php" class="footer-link">Our 500+ Recruiters</a></li>
                    <li><a href="iqac.php" class="footer-link">IQAC (NAAC / NIRF)</a></li>
                    <li><a href="mandatory-disclosers.php" class="footer-link">Mandatory Disclosures</a></li>
                    <li><a href="ugc-recognition.php" class="footer-link">UGC Recognition</a></li>
                    <li><a href="admin/login.php" class="footer-link text-gold fw-semibold"><i class="fa-solid fa-lock me-1"></i> CMS Admin Portal</a></li>
                </ul>
            </div>

        </div>

        <!-- Divider 1 (Identical Width & Subtle Opacity) -->
        <div style="border-top: 1px solid rgba(255, 255, 255, 0.12) !important;"></div>

        <!-- Policy & Statutory Links Strip (Balanced Vertical & Horizontal Alignment) -->
        <div class="py-2.5 d-flex align-items-center justify-content-center text-center">
            <div class="d-flex flex-wrap justify-content-center align-items-center gap-2 gap-md-3 small text-white text-opacity-70" style="font-size: 0.76rem;">
                <a href="contact-us.php" class="footer-link text-gold fw-medium">Contact Us</a>
                <span class="text-white text-opacity-25 d-none d-sm-inline">·</span>
                <a href="privacy-policy.php" class="footer-link text-white text-opacity-70">Privacy Policy</a>
                <span class="text-white text-opacity-25 d-none d-sm-inline">·</span>
                <a href="payment-terms.php" class="footer-link text-white text-opacity-70">Terms of Use</a>
                <span class="text-white text-opacity-25 d-none d-sm-inline">·</span>
                <a href="refund-cancellation.php" class="footer-link text-white text-opacity-70">Refund Policy</a>
                <span class="text-white text-opacity-25 d-none d-sm-inline">·</span>
                <a href="anti-reggiging-committee.php" class="footer-link text-white text-opacity-70">Anti-Ragging</a>
                <span class="text-white text-opacity-25 d-none d-sm-inline">·</span>
                <a href="icc.php" class="footer-link text-white text-opacity-70">ICC</a>
                <span class="text-white text-opacity-25 d-none d-sm-inline">·</span>
                <a href="sgrc.php" class="footer-link text-white text-opacity-70">Grievance Redressal</a>
                <span class="text-white text-opacity-25 d-none d-sm-inline">·</span>
                <a href="rti-act.php" class="footer-link text-white text-opacity-70">RTI Act</a>
            </div>
        </div>

        <!-- Divider 2 (Exact Same Width & Opacity) -->
        <div style="border-top: 1px solid rgba(255, 255, 255, 0.12) !important;"></div>

        <!-- Bottom Copyright & Developer Credit Bar (Clean Top Padding & Alignment) -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 pt-3 small text-white text-opacity-75" style="font-size: 0.78rem;">
            <div class="text-center text-md-start">
                <?php echo htmlspecialchars($settings['copyright_text'] ?? ('© ' . date('Y') . ' Dr. A.P.J. Abdul Kalam University, Indore. All rights reserved.')); ?>
            </div>
            
            <!-- Permanent Designer & Developer Credit -->
            <div class="d-flex align-items-center gap-1.5 text-white text-opacity-85 text-nowrap">
                <span>Developed &amp; Created by </span>
                <a href="https://wecrescent.com/" target="_blank" rel="noopener noreferrer" class="footer-link fw-bold text-gold text-decoration-none d-inline-flex align-items-center gap-1 ms-1" title="Crescent Digital Solutions">
                    <span>Crescent Digital Solutions</span>
                    <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.65rem;"></i>
                </a>
            </div>
        </div>

    </div>
</footer>

<!-- Floating Sticky WhatsApp Helpdesk Widget -->
<?php
// Extract numbers from settings phone or fallback to +91 91111 09999
$raw_phone = $settings['phone'] ?? '+91 91111 09999';
$wa_phone = preg_replace('/[^0-9]/', '', explode('/', $raw_phone)[0]);
if (empty($wa_phone) || strlen($wa_phone) < 10) {
    $wa_phone = '919111109999';
} elseif (strlen($wa_phone) == 10) {
    $wa_phone = '91' . $wa_phone;
}
$wa_message = urlencode("Hello Dr. APJ Abdul Kalam University, I would like to inquire about Admissions & Courses 2026-27.");
?>
<!-- Floating Sticky WhatsApp Button (Bottom-Right) -->
<a href="https://api.whatsapp.com/send?phone=<?php echo $wa_phone; ?>&text=<?php echo $wa_message; ?>" 
   target="_blank" 
   rel="noopener noreferrer" 
   class="whatsapp-floating-btn floating-quick-action" 
   title="Chat with AKU Admission Counselor on WhatsApp"
   aria-label="Chat on WhatsApp">
    <div class="whatsapp-btn-pulse"></div>
    <i class="fa-brands fa-whatsapp"></i>
</a>

<!-- Floating Sticky Apply Now Button (Bottom-Left) -->
<a href="apply-now.php" 
   class="apply-floating-btn floating-quick-action" 
   title="Apply Online for Admissions 2026-27"
   aria-label="Apply Online 2026">
    <div class="apply-btn-pulse"></div>
    <i class="fa-solid fa-graduation-cap apply-icon"></i>
</a>

<style>
/* Base Floating Trigger State (Hidden on Hero / Top of Page) */
.floating-quick-action {
    position: fixed;
    z-index: 99999;
    opacity: 0;
    visibility: hidden;
    transform: translateY(24px) scale(0.85);
    pointer-events: none;
    transition: opacity 0.35s ease, transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1), visibility 0.35s ease, box-shadow 0.3s ease;
}

/* Active Visible State on Scroll */
.floating-quick-action.is-visible {
    opacity: 1;
    visibility: visible;
    transform: translateY(0) scale(1);
    pointer-events: auto;
}

/* 1. Floating Apply Now Button (Pure Circular Icon on Left) */
.apply-floating-btn {
    bottom: 85px;
    left: 24px;
    width: 56px;
    height: 56px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #700015 0%, #43000c 100%);
    border: 2px solid #D4AF37;
    color: #ffffff !important;
    text-decoration: none !important;
    box-shadow: 0 8px 24px rgba(112, 0, 21, 0.5), 0 2px 6px rgba(0, 0, 0, 0.25);
}

.apply-floating-btn .apply-icon {
    color: #ffd700;
    font-size: 1.65rem;
    line-height: 1;
    transition: transform 0.3s ease;
}

.apply-floating-btn:hover {
    transform: translateY(-4px) scale(1.08) !important;
    background: linear-gradient(135deg, #8a001a 0%, #52000f 100%);
    border-color: #ffd700;
    box-shadow: 0 12px 30px rgba(112, 0, 21, 0.65), 0 4px 10px rgba(0, 0, 0, 0.3);
    color: #ffffff !important;
}

.apply-floating-btn:hover .apply-icon {
    transform: rotate(-10deg) scale(1.1);
}

.apply-floating-btn .apply-btn-pulse {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 50%;
    border: 2px solid #D4AF37;
    animation: applyPulse 2.2s infinite cubic-bezier(0.455, 0.03, 0.515, 0.955);
    pointer-events: none;
}

@keyframes applyPulse {
    0% { transform: scale(0.95); opacity: 0.85; }
    70% { transform: scale(1.22); opacity: 0; }
    100% { transform: scale(1.22); opacity: 0; }
}

/* 2. Floating WhatsApp Button (Pure Circular Icon on Right) */
.whatsapp-floating-btn {
    bottom: 85px;
    right: 24px;
    width: 56px;
    height: 56px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
    color: #ffffff !important;
    text-decoration: none !important;
    box-shadow: 0 8px 24px rgba(18, 140, 126, 0.45), 0 2px 6px rgba(0, 0, 0, 0.18);
}

.whatsapp-floating-btn i {
    font-size: 1.95rem;
    line-height: 1;
    color: #ffffff;
}

.whatsapp-floating-btn:hover {
    transform: translateY(-4px) scale(1.08) !important;
    box-shadow: 0 12px 30px rgba(18, 140, 126, 0.6), 0 4px 10px rgba(0, 0, 0, 0.25);
    color: #ffffff !important;
}

.whatsapp-floating-btn .whatsapp-btn-pulse {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 50%;
    border: 2px solid #25D366;
    animation: waPulse 2s infinite cubic-bezier(0.455, 0.03, 0.515, 0.955);
    pointer-events: none;
}

@keyframes waPulse {
    0% { transform: scale(0.95); opacity: 0.85; }
    70% { transform: scale(1.22); opacity: 0; }
    100% { transform: scale(1.22); opacity: 0; }
}

/* Mobile Responsive Optimization */
@media (max-width: 767.98px) {
    .apply-floating-btn {
        bottom: 75px;
        left: 18px;
        width: 50px;
        height: 50px;
    }
    .apply-floating-btn .apply-icon {
        font-size: 1.45rem;
    }
    .whatsapp-floating-btn {
        bottom: 75px;
        right: 18px;
        width: 50px;
        height: 50px;
    }
    .whatsapp-floating-btn i {
        font-size: 1.75rem;
    }
}
</style>

<!-- Scroll Trigger JS for Floating Quick Action Buttons -->
<script>
(function() {
    function initFloatingQuickActions() {
        const floatingBtns = document.querySelectorAll('.floating-quick-action');
        if (!floatingBtns.length) return;

        function checkScroll() {
            // Show after scrolling past top hero section (> 220px)
            if (window.scrollY > 220) {
                floatingBtns.forEach(btn => btn.classList.add('is-visible'));
            } else {
                floatingBtns.forEach(btn => btn.classList.remove('is-visible'));
            }
        }

        window.addEventListener('scroll', checkScroll, { passive: true });
        // Initial check on load
        checkScroll();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initFloatingQuickActions);
    } else {
        initFloatingQuickActions();
    }
})();
</script>

<!-- Bootstrap 5.3.3 JavaScript Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
