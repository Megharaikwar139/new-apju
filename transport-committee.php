<?php 
$pageTitle = "Hostel, Canteen & Transport Committee - Dr. APJ Abdul Kalam University, Indore";
include "header.php"; 

$hostelMembers = [
    ["name" => "Mr. Pradeep Singh Chouhan", "role" => "Chairman", "desig" => "Chief Admin Officer", "dept" => "Admin Block", "mobile" => "+91 98260 54004"],
    ["name" => "Mr. Shailesh Soni", "role" => "Member", "desig" => "Assistant Deputy Registrar", "dept" => "Administration", "mobile" => "+91 94254 75949"],
    ["name" => "Dr. Manish Yadav", "role" => "Member", "desig" => "Resident Medical Officer", "dept" => "RNKMHH&MC", "mobile" => "+91 94065 04263"],
    ["name" => "Mr. Dharmendra Yadav", "role" => "Member", "desig" => "Assistant Professor", "dept" => "Agriculture, COPS", "mobile" => "+91 90094 05155"],
    ["name" => "Dr. Yogesh Yadav", "role" => "Member", "desig" => "Assistant Professor", "dept" => "RNKMAMC&H", "mobile" => "+91 72472 86742"],
    ["name" => "Dr. Akhilesh Gupta", "role" => "Member", "desig" => "Assistant Professor", "dept" => "COP", "mobile" => "+91 91653 62824"],
    ["name" => "Mr. Anwar Ashraf", "role" => "Member", "desig" => "Assistant Professor", "dept" => "MBA, COE", "mobile" => "+91 98312 20872"],
    ["name" => "Mr. Pramod Dwivedi", "role" => "Member", "desig" => "Hostel Warden", "dept" => "University Boys Hostel", "mobile" => "+91 88789 38864"]
];

$canteenMembers = [
    ["name" => "Mr. Pradeep Singh Chouhan", "role" => "Chairman", "desig" => "Chief Admin Officer", "dept" => "Admin Block", "mobile" => "+91 98260 54004"],
    ["name" => "Dr. Mohit Chaturvedi", "role" => "Member", "desig" => "Professor", "dept" => "Institute of Pharmacy", "mobile" => "+91 96302 70986"],
    ["name" => "Ms. Parul Singh Rajput", "role" => "Member", "desig" => "Assistant Professor", "dept" => "Chemistry, COPS", "mobile" => "+91 98262 42328"],
    ["name" => "Mr. Rameshwar Singh", "role" => "Member", "desig" => "Assistant Professor", "dept" => "CSE, SOE", "mobile" => "+91 82698 55038"]
];

$transportMembers = [
    ["name" => "Mr. Pradeep Singh Chouhan", "role" => "Chairman", "desig" => "Chief Admin Officer", "dept" => "Admin Block", "mobile" => "+91 98260 54004"],
    ["name" => "Mr. Lavshivanshu Mishra", "role" => "Member", "desig" => "Assistant Professor", "dept" => "COP", "mobile" => "+91 89629 22953"],
    ["name" => "Mr. Rohan Rao", "role" => "Member", "desig" => "Transport Fleet Incharge", "dept" => "Central Transport", "mobile" => "+91 98931 92333"]
];
?>

<!-- Hero Banner -->
<section class="inner-page-hero">
    <div class="container-custom position-relative" style="z-index: 2;">
        <div class="inner-breadcrumb-pill">
            <a href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
            <span>&raquo;</span>
            <a href="notice-board.php">Student Zone</a>
            <span>&raquo;</span>
            <span class="text-gold fw-medium">Hostel &amp; Transport</span>
        </div>
        
        <div class="eyebrow-label gold-eyebrow mb-2" style="color: var(--gold-color) !important;">
            <span style="background: var(--gold-color); width: 1.5rem; height: 1px; display: inline-block;"></span> CAMPUS RESIDENTIAL &amp; FLEET MANAGEMENT
        </div>
        <h1 class="font-serif display-5 fw-medium text-white mb-2" style="max-width: 950px; line-height: 1.15;">
            Hostel, Canteen &amp; Transport Committee
        </h1>
        <p class="text-white text-opacity-80 small mb-0" style="letter-spacing: 0.12em; text-transform: uppercase;">
            Dr. A.P.J. Abdul Kalam University · Residential Living, Hygienic Cafeteria &amp; City-Wide Bus Transit
        </p>
    </div>
</section>

<!-- Main Body -->
<main class="py-5" style="background-color: var(--bg-ivory);">
    <div class="container-custom">
        <div class="row g-4 g-xl-5">
            
            <div class="col-lg-8 col-xl-9">
                <article class="inner-main-card">
                    
                    <div class="intro-highlight-card mb-5">
                        <div class="d-flex align-items-center gap-3.5">
                            <div class="intro-highlight-badge">
                                <i class="fa-solid fa-bus"></i>
                            </div>
                            <div>
                                <h3 class="font-serif text-primary fs-4 fw-bold mb-1">Campus Living &amp; Daily Transit Infrastructure</h3>
                                <p class="mb-0 text-muted-custom" style="font-size: 0.95rem; line-height: 1.75;">
                                    Overseeing secure AC/Non-AC student hostels, 24x7 medical assistance, nutritious food quality in cafeterias, and a modern fleet of 30+ university buses covering all major routes across Indore, Dewas, and Ujjain.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- 1. Hostel Committee -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-bed"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Hostel Management Committee</h3>
                            </div>
                            <span class="badge bg-gold text-dark fw-bold px-3 py-1.5 rounded-pill" style="font-size: 0.75rem;">Boys &amp; Girls Hostels</span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Members Name</th>
                                        <th style="width: 140px;">Role</th>
                                        <th>Designation</th>
                                        <th>Dept. / Unit</th>
                                        <th style="width: 160px;">Contact No.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($hostelMembers as $m): ?>
                                    <tr>
                                        <td><span class="fw-bold text-primary"><?php echo htmlspecialchars($m['name']); ?></span></td>
                                        <td><span class="badge <?php echo ($m['role'] === 'Chairman') ? 'bg-primary text-white' : 'bg-light text-dark border'; ?>"><?php echo htmlspecialchars($m['role']); ?></span></td>
                                        <td><?php echo htmlspecialchars($m['desig']); ?></td>
                                        <td><?php echo htmlspecialchars($m['dept']); ?></td>
                                        <td><span class="font-monospace small text-muted-custom fw-semibold"><?php echo htmlspecialchars($m['mobile']); ?></span></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- 2. Canteen Committee -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-utensils"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Canteen &amp; Mess Hygiene Committee</h3>
                            </div>
                            <span class="badge bg-gold text-dark fw-bold px-3 py-1.5 rounded-pill" style="font-size: 0.75rem;">FSSAI Standards</span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Members Name</th>
                                        <th style="width: 140px;">Role</th>
                                        <th>Designation</th>
                                        <th>Dept. / Unit</th>
                                        <th style="width: 160px;">Contact No.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($canteenMembers as $m): ?>
                                    <tr>
                                        <td><span class="fw-bold text-primary"><?php echo htmlspecialchars($m['name']); ?></span></td>
                                        <td><span class="badge <?php echo ($m['role'] === 'Chairman') ? 'bg-primary text-white' : 'bg-light text-dark border'; ?>"><?php echo htmlspecialchars($m['role']); ?></span></td>
                                        <td><?php echo htmlspecialchars($m['desig']); ?></td>
                                        <td><?php echo htmlspecialchars($m['dept']); ?></td>
                                        <td><span class="font-monospace small text-muted-custom fw-semibold"><?php echo htmlspecialchars($m['mobile']); ?></span></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- 3. Transport Committee -->
                    <div class="mb-5">
                        <div class="tab-section-header mb-4 pb-2.5 border-bottom border-custom d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2.5">
                                <span class="section-icon-pill"><i class="fa-solid fa-van-shuttle"></i></span>
                                <h3 class="font-serif text-primary fs-4 fw-bold m-0">Transport Fleet Operations Committee</h3>
                            </div>
                            <span class="badge bg-gold text-dark fw-bold px-3 py-1.5 rounded-pill" style="font-size: 0.75rem;">GPS Tracked Fleet</span>
                        </div>

                        <div class="table-responsive rounded-4 border border-custom overflow-hidden shadow-xs bg-white">
                            <table class="luxury-table table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Members Name</th>
                                        <th style="width: 140px;">Role</th>
                                        <th>Designation</th>
                                        <th>Dept. / Unit</th>
                                        <th style="width: 160px;">Contact No.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transportMembers as $m): ?>
                                    <tr>
                                        <td><span class="fw-bold text-primary"><?php echo htmlspecialchars($m['name']); ?></span></td>
                                        <td><span class="badge <?php echo ($m['role'] === 'Chairman') ? 'bg-primary text-white' : 'bg-light text-dark border'; ?>"><?php echo htmlspecialchars($m['role']); ?></span></td>
                                        <td><?php echo htmlspecialchars($m['desig']); ?></td>
                                        <td><?php echo htmlspecialchars($m['dept']); ?></td>
                                        <td><span class="font-monospace small text-muted-custom fw-semibold"><?php echo htmlspecialchars($m['mobile']); ?></span></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </article>
            </div>

            <div class="col-lg-4 col-xl-3">
                <?php include "student-sidebar.php"; ?>
            </div>

        </div>
    </div>
</main>

<?php include "footer.php"; ?>