<?php
/**
 * Department Page Sidebar Navigation
 * 100% Dynamic - Renders section tab points directly from active department tabs in DB
 * with two-way instant synchronization.
 */

// If $dbTabs is not already defined in the parent scope, fetch it if $currentDeptSlug exists
if (!isset($dbTabs) && isset($currentDeptSlug) && isset($pdo)) {
    $stmt = $pdo->prepare("SELECT * FROM department_tabs WHERE department_slug = ? AND status = 1 ORDER BY sort_order ASC, id ASC");
    $stmt->execute([$currentDeptSlug]);
    $dbTabs = $stmt->fetchAll();
}

$rootPath = (strpos($_SERVER['PHP_SELF'], '/course/') !== false) ? '../' : '';
?>

<div class="sidebar-sticky-wrapper">
    
    <!-- Department Section Navigation Card -->
    <div class="about-sidebar-card shadow-sm border border-custom mb-4">
        <div class="about-sidebar-heading d-flex align-items-center justify-content-between">
            <span>Department Sections</span>
            <i class="fa-solid fa-layer-group text-gold"></i>
        </div>
        
        <div class="px-3 pt-2 pb-2 text-muted-custom" style="font-size: 0.75rem; border-bottom: 1px solid rgba(0,0,0,0.06);">
            Explore details and academic resources
        </div>

        <nav class="d-flex flex-column py-1" id="departmentSidebarNav">
            <?php if (!empty($dbTabs)): ?>
                <?php foreach ($dbTabs as $idx => $t): ?>
                <?php 
                $isActive = ($idx === 0);
                $tabSlug = $t['tab_slug'];
                $tabTitle = $t['tab_title'];
                $tabIcon = $t['tab_icon'];
                ?>
                <a href="#<?php echo htmlspecialchars($tabSlug); ?>" 
                   class="about-nav-link department-tab-link <?php echo $isActive ? 'active' : ''; ?>" 
                   data-tab-target="#<?php echo htmlspecialchars($tabSlug); ?>" 
                   role="button">
                    <span>
                        <i class="<?php echo htmlspecialchars($tabIcon); ?> me-2 <?php echo $isActive ? 'text-gold' : 'text-primary'; ?>" style="font-size: 0.82rem; width: 18px;"></i>
                        <?php echo htmlspecialchars_decode($tabTitle); ?>
                    </span>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.7rem; opacity: 0.6;"></i>
                </a>
                <?php endforeach; ?>
                
                <!-- Link to Offered Courses if present -->
                <a href="#offered-courses" class="about-nav-link department-tab-link" data-scroll-target="#offered-courses" role="button">
                    <span>
                        <i class="fa-solid fa-graduation-cap me-2 text-primary" style="font-size: 0.82rem; width: 18px;"></i>
                        Offered Courses
                    </span>
                    <i class="fa-solid fa-chevron-down" style="font-size: 0.7rem; opacity: 0.6;"></i>
                </a>
            <?php else: ?>
                <!-- Fallback Academic Links for non-department pages -->
                <a href="admission-procedure.php" class="about-nav-link">
                    <span><i class="fa-solid fa-paper-plane me-2 text-primary"></i> Admission Procedure</span>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.7rem;"></i>
                </a>
                <a href="fee-structure.php" class="about-nav-link">
                    <span><i class="fa-solid fa-receipt me-2 text-primary"></i> Fee Structure</span>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.7rem;"></i>
                </a>
                <a href="scholarships.php" class="about-nav-link">
                    <span><i class="fa-solid fa-award me-2 text-primary"></i> Scholarships</span>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.7rem;"></i>
                </a>
                <a href="index.php#programs" class="about-nav-link">
                    <span><i class="fa-solid fa-book-bookmark me-2 text-primary"></i> All Degree Programs</span>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.7rem;"></i>
                </a>
            <?php endif; ?>
        </nav>
    </div>

    <!-- Quick Admissions Widget Card -->
    <div class="about-contact-widget">
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.25rem; height: 1px; display: inline-block;"></span> ADMISSIONS 2026-27
        </div>
        <h4 class="font-serif text-white fs-5 fw-medium mb-2">Apply for Degree Programs</h4>
        <p class="small text-white text-opacity-80 mb-3" style="font-size: 0.83rem; line-height: 1.5;">
            Explore AICTE, PCI &amp; UGC approved degree programs with world-class faculty and stellar placements.
        </p>
        <a href="apply-now.php" class="btn-gold-pill w-100 text-center py-2 text-decoration-none d-block mb-3" style="font-size: 0.85rem;">
            Apply Online Now <i class="fa-solid fa-arrow-right fs-6 ms-1"></i>
        </a>
        <div class="pt-2 border-top border-white border-opacity-15 small text-white text-opacity-80">
            <div class="d-flex align-items-center gap-2 mb-1">
                <i class="fa-solid fa-phone text-gold" style="font-size: 0.75rem;"></i>
                <a href="tel:+917312530500" class="text-white text-opacity-90 text-decoration-none">+91 731 2530 500</a>
            </div>
            <div class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-envelope text-gold" style="font-size: 0.75rem;"></i>
                <a href="mailto:info@aku.ac.in" class="text-white text-opacity-90 text-decoration-none">info@aku.ac.in</a>
            </div>
        </div>
    </div>

</div>

<!-- Interactive Tab & Sidebar Synchronization Script -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const sidebarNav = document.getElementById('departmentSidebarNav');
    const deptTabsList = document.getElementById('deptTab');
    
    if (!sidebarNav) return;

    // Sidebar tab click handler
    sidebarNav.querySelectorAll('a[data-tab-target]').forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('data-tab-target'); // e.g. #tab-about
            
            // Find corresponding horizontal tab button
            const tabBtn = document.querySelector(`button[data-bs-target="${targetId}"]`) || 
                           document.querySelector(`a[data-bs-target="${targetId}"]`) ||
                           document.querySelector(`button[href="${targetId}"]`) ||
                           document.querySelector(`a[href="${targetId}"]`);
            
            if (tabBtn && typeof bootstrap !== 'undefined' && bootstrap.Tab) {
                const tabInstance = bootstrap.Tab.getOrCreateInstance(tabBtn);
                tabInstance.show();
            } else if (tabBtn) {
                tabBtn.click();
            }
            
            // Update sidebar active classes
            sidebarNav.querySelectorAll('.department-tab-link').forEach(l => {
                l.classList.remove('active');
                const ic = l.querySelector('span > i');
                if (ic) {
                    ic.classList.remove('text-gold');
                    ic.classList.add('text-primary');
                }
            });
            
            this.classList.add('active');
            const activeIcon = this.querySelector('span > i');
            if (activeIcon) {
                activeIcon.classList.remove('text-primary');
                activeIcon.classList.add('text-gold');
            }

            // Smooth scroll to main card
            const mainCard = document.querySelector('.inner-main-card');
            if (mainCard) {
                const navOffset = 90;
                const elementPosition = mainCard.getBoundingClientRect().top + window.pageYOffset;
                if (window.scrollY > elementPosition - navOffset + 150 || window.innerWidth < 992) {
                    window.scrollTo({
                        top: Math.max(0, elementPosition - navOffset),
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // Sidebar scroll-to link (e.g. Offered Courses)
    sidebarNav.querySelectorAll('a[data-scroll-target]').forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const targetSelector = this.getAttribute('data-scroll-target');
            const targetElem = document.querySelector(targetSelector);
            if (targetElem) {
                const navOffset = 90;
                const elementPosition = targetElem.getBoundingClientRect().top + window.pageYOffset;
                window.scrollTo({
                    top: Math.max(0, elementPosition - navOffset),
                    behavior: 'smooth'
                });
            }
        });
    });

    // Listen to horizontal tab switches to update sidebar active item
    if (deptTabsList) {
        deptTabsList.querySelectorAll('button[data-bs-toggle="pill"], a[data-bs-toggle="pill"]').forEach(function (btn) {
            btn.addEventListener('shown.bs.tab', function (e) {
                const activeTarget = e.target.getAttribute('data-bs-target') || e.target.getAttribute('href');
                
                sidebarNav.querySelectorAll('a[data-tab-target]').forEach(link => {
                    const matches = link.getAttribute('data-tab-target') === activeTarget;
                    link.classList.toggle('active', matches);
                    
                    const ic = link.querySelector('span > i');
                    if (ic) {
                        if (matches) {
                            ic.classList.remove('text-primary');
                            ic.classList.add('text-gold');
                        } else {
                            ic.classList.remove('text-gold');
                            ic.classList.add('text-primary');
                        }
                    }
                });
            });
        });
    }
});
</script>