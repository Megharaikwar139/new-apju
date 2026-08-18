<?php include 'header.php'; ?>

<style>
    /* Custom styles for Academic Calendar */
    .hero-banner {
        background-image: url('assets/images/home-slider01.jpg'); 
        background-size: cover;
        background-position: center;
        padding: 120px 0;
        text-align: center;
        color: white;
        position: relative;
    }
    .hero-banner::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0, 0, 0, 0.6); /* dark overlay */
    }
    .hero-content {
        position: relative;
        z-index: 1;
    }
    .hero-title {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }
    .hero-breadcrumb {
        font-size: 1.1rem;
    }
    .hero-breadcrumb a {
        color: white;
        text-decoration: none;
    }
    .hero-breadcrumb a:hover {
        text-decoration: underline;
    }
    
    .academic-calendar-container {
        max-width: 1200px;
        margin: 50px auto;
        padding: 0 15px;
        font-family: 'Inter', sans-serif;
    }
    
    .calendar-tabs {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 30px;
        background-color: #f8f9fa;
        border-radius: 5px;
        overflow: hidden;
    }
    .calendar-tab {
        padding: 15px 25px;
        cursor: pointer;
        background-color: transparent;
        color: #555;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        border-right: 1px solid #e9ecef;
    }
    .calendar-tab:last-child {
        border-right: none;
    }
    .calendar-tab.active {
        background-color: #8b0000; /* Dark red matching screenshot */
        color: white;
    }
    .calendar-tab:hover:not(.active) {
        background-color: #e2e6ea;
    }
    
    .calendar-content {
        display: none;
        animation: fadeIn 0.4s ease-in-out;
    }
    .calendar-content.active {
        display: block;
    }
    
    .calendar-table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #dee2e6;
        background: #fff;
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.02);
    }
    .calendar-table th {
        background-color: #fff;
        color: #6c757d;
        font-weight: 700;
        text-transform: uppercase;
        padding: 20px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
        font-size: 0.9rem;
    }
    .calendar-table td {
        padding: 20px;
        border-bottom: 1px solid #dee2e6;
    }
    .calendar-table tr:last-child td {
        border-bottom: none;
    }
    .calendar-table td a {
        color: #0d6efd;
        text-decoration: none;
        font-weight: 500;
        font-size: 1rem;
        transition: color 0.2s ease;
    }
    .calendar-table td a:hover {
        color: #0a58ca;
        text-decoration: underline;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(5px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 768px) {
        .calendar-tab {
            flex: 1 1 100%;
            border-right: none;
            border-bottom: 1px solid #e9ecef;
        }
        .hero-title {
            font-size: 2.5rem;
        }
    }
</style>

<div class="hero-banner">
    <div class="hero-content">
        <h1 class="hero-title">Academic Calendar</h1>
        <div class="hero-breadcrumb">
            <a href="index.php">Home</a> &raquo; Academic Calendar
        </div>
    </div>
</div>

<div class="academic-calendar-container">
    <div class="calendar-tabs">
        <div class="calendar-tab active" data-target="session-25-26">Session 2025-26</div>
        <div class="calendar-tab" data-target="session-24-25">Session 2024-25</div>
        <div class="calendar-tab" data-target="session-23-24">Session 2023-24</div>
        <div class="calendar-tab" data-target="session-22-23">Session 2022-23</div>
        <div class="calendar-tab" data-target="session-21-22">Session 2021-22</div>
    </div>

    <!-- Session 2025-26 -->
    <div class="calendar-content active" id="session-25-26">
        <table class="calendar-table">
            <tr><th>TITLE</th></tr>
            <tr><td><a href="uploads/2026/03/82_BHMS_25-26_Nov_2025-to-Apr_2027.pdf" target="_blank">82_BHMS_25-26_Nov_2025 to Apr_2027</a></td></tr>
            <tr><td><a href="uploads/2026/03/81_BAMS_25-26_Nov_2025-to-Apr_2027.pdf" target="_blank">81_BAMS_25-26_Nov_2025 to Apr_2027</a></td></tr>
            <tr><td><a href="uploads/2026/03/80-Even-Sem.-Jan-June-2025-26.pdf" target="_blank">80- Even Sem. Jan-June (2025-26)</a></td></tr>
            <tr><td><a href="uploads/2025/11/Academic-Calendar-JULY-TO-DEC-2025.pdf" target="_blank">Academic Calendar JULY TO DEC 2025</a></td></tr>
            <tr><td><a href="uploads/2025/11/Academic-calender-JAN-TO-JUNE-2025.pdf" target="_blank">Academic calender JAN TO JUNE 2025</a></td></tr>
        </table>
    </div>

    <!-- Session 2024-25 -->
    <div class="calendar-content" id="session-24-25">
        <table class="calendar-table">
            <tr><th>TITLE</th></tr>
            <tr><td><a href="uploads/2026/03/79-Odd-Sem.-Jul-Dec-2024-25.pdf" target="_blank">79- Odd Sem. Jul-Dec (2024-25)</a></td></tr>
            <tr><td><a href="uploads/2026/03/78-Even-Sem.-Jan-June-2024-25.pdf" target="_blank">78- Even Sem. Jan-June (2024-25)</a></td></tr>
            <tr><td><a href="uploads/2025/11/Academic-Calendar-JULY-TO-DEC-2024.pdf" target="_blank">Academic Calendar JULY TO DEC 2024</a></td></tr>
            <tr><td><a href="uploads/2025/06/23092024_125423_AcademicCalenderEng-scaled.pdf" target="_blank">Academic Calender Engineering July Dec 2024</a></td></tr>
            <tr><td><a href="uploads/2025/06/27072024_035940_Academic-Calendar-2024-25.pdf" target="_blank">Academic Calendar 2024-25</a></td></tr>
            <tr><td><a href="uploads/2025/06/06022024_044902_Academic-Calendar.pdf" target="_blank">Academic Calendar 2024</a></td></tr>
        </table>
    </div>

    <!-- Session 2023-24 -->
    <div class="calendar-content" id="session-23-24">
        <table class="calendar-table">
            <tr><th>TITLE</th></tr>
            <tr><td><a href="uploads/2026/03/64-Odd-Sem-Jul-Dec-23-2023-24.pdf" target="_blank">Odd Sem- Jul-Dec 23 (2023-24)</a></td></tr>
            <tr><td><a href="uploads/2026/03/65-Odd-sem-Jul-Dec-23-2023-24.pdf" target="_blank">Odd sem- Jul-Dec 23 (2023-24)</a></td></tr>
            <tr><td><a href="uploads/2026/03/66-2nd-Year-Dip.-Phrmcy-2023-24.pdf" target="_blank">2nd Year Dip. Phrmcy (2023-24)</a></td></tr>
            <tr><td><a href="uploads/2026/03/63-Odd-Sem-Jul-dec-23-2023-24.pdf" target="_blank">Odd Sem- Jul-dec 23 (2023-24)</a></td></tr>
            <tr><td><a href="uploads/2025/06/24072024_095333_B.H.M.S.-Academic-Calander-2023-24.pdf" target="_blank">BHMS Academic Calander 2023-24</a></td></tr>
            <tr><td><a href="uploads/2025/06/09122023_040030_Academic-Calender-2023-24.pdf" target="_blank">Academic Calendar 1st BAMS_2023-24</a></td></tr>
            <tr><td><a href="uploads/2025/06/Academic-Calendar-Dip-UG-PG-July-Dec-2023_Odd-Sem-First-Year-scaled.pdf" target="_blank">Academic Calendar Dip, UG, PG July-Dec 2023_Odd Sem First Year</a></td></tr>
            <tr><td><a href="uploads/2025/06/20092023_035147_Academic-Calendar-Diploma-Pharmacy-First-Year-_Yearly-Programme-2023-24-scaled.pdf" target="_blank">Academic Calendar Diploma Pharmacy First Year_Yearly Programme 2023-24</a></td></tr>
            <tr><td><a href="uploads/2025/06/Academic-Calendar-Odd-Semester_July-December-2023.pdf" target="_blank">Academic Calendar Odd Semester_July-December 2023</a></td></tr>
            <tr><td><a href="uploads/2025/06/Academic-Calendar-Diploma-Pharmacy_Yearly-Programme-2023.pdf" target="_blank">Academic Calendar Diploma Pharmacy_Yearly Programme 2023</a></td></tr>
            <tr><td><a href="uploads/2025/06/Academic-Calendar-BHMS_2023.pdf" target="_blank">Academic Calendar BHMS_2023</a></td></tr>
            <tr><td><a href="uploads/2025/06/Academic-Caldendar-BAMS_2023.pdf" target="_blank">Academic Calendar BAMS_2023</a></td></tr>
            <tr><td><a href="uploads/2025/06/Academic-Calendar_-Jan-June-_2023.pdf" target="_blank">Academic Calendar Jan-June 2023</a></td></tr>
        </table>
    </div>

    <!-- Session 2022-23 -->
    <div class="calendar-content" id="session-22-23">
        <table class="calendar-table">
            <tr><th>TITLE</th></tr>
            <tr><td><a href="uploads/2026/03/70-AYU-2021-22-2022-23.pdf" target="_blank">AYU (2021-22 &amp; 2022-23)</a></td></tr>
            <tr><td><a href="uploads/2026/03/71-AYU-2021-22-2022-23.pdf" target="_blank">AYU (2021-22 &amp; 2022-23)</a></td></tr>
            <tr><td><a href="uploads/2026/03/67-BHMS-2022-23.pdf" target="_blank">67- BHMS (2022-23)</a></td></tr>
            <tr><td><a href="uploads/2026/03/68-BHMS-2022-23.pdf" target="_blank">68-BHMS (2022-23)</a></td></tr>
            <tr><td><a href="uploads/2026/03/69-BHMS-2022-23.pdf" target="_blank">69-BHMS (2022-23)</a></td></tr>
        </table>
    </div>

    <!-- Session 2021-22 -->
    <div class="calendar-content" id="session-21-22">
        <table class="calendar-table">
            <tr><th>TITLE</th></tr>
            <tr><td><a href="uploads/2026/03/38-Co-Curricular-Actiity-Calendar-2021-22.pdf" target="_blank">Co-Curricular Actiity Calendar (2021-22)</a></td></tr>
            <tr><td><a href="uploads/2026/03/39-Co-Curricular-Actiity-Calendar-2021-22.pdf" target="_blank">Co-Curricular Actiity Calendar (2021-22)</a></td></tr>
            <tr><td><a href="uploads/2026/03/41-Dip-UG-PG-Except-D-Phrmcy-I-and-II-year-July-Dec.21-2021-22.pdf" target="_blank">Dip UG-PG (Except D Phrmcy &amp; I and II year) July-Dec.21 (2021-22)</a></td></tr>
            <tr><td><a href="uploads/2026/03/42-Dip-UG-PG-for-II-year-July-Dec.21-2021-22.pdf" target="_blank">Dip UG-PG for II year July-Dec.21 (2021-22)</a></td></tr>
            <tr><td><a href="uploads/2026/03/44-Dip-Phrmcy-2nd-Year-2021-22.pdf" target="_blank">Dip Phrmcy 2nd Year (2021-22)</a></td></tr>
            <tr><td><a href="uploads/2026/03/45-Dip-Phrmcy-1st-Year-2021-22.pdf" target="_blank">Dip Phrmcy 1st Year (2021-22)</a></td></tr>
            <tr><td><a href="uploads/2026/03/46-BE-B.Pharma.-M.pharma-M.tech-MCA-6th-Sem-Dip-Eng.-Final-year-Jan-Jun-2022.pdf" target="_blank">BE, B.Pharma., M.pharma, M.tech, MCA-6th Sem &amp; Dip Eng. Final year (Jan-Jun 2022)</a></td></tr>
            <tr><td><a href="uploads/2026/03/47-Non-Tech-UG-PG-2nd-3rd-year-with-MBA-MCA-Jan-Jun-22-2021-22.pdf" target="_blank">Non Tech UG PG 2nd &amp; 3rd year with MBA &amp; MCA Jan-Jun 22 (2021-22)</a></td></tr>
            <tr><td><a href="uploads/2026/03/48-Non-Tech.-UG-PG-2nd-3rd-Year-with-MBA-MCA-Jan-Jun-2022.pdf" target="_blank">Non Tech. UG-PG 2nd &amp; 3rd Year with MBA &amp; MCA (Jan-Jun 2022)</a></td></tr>
            <tr><td><a href="uploads/2026/03/49-BE-B.Pharma-3rd-Year-Even-Sem-Jan-Jun-2022.pdf" target="_blank">BE, B.Pharma 3rd Year Even Sem (Jan-Jun 2022)</a></td></tr>
        </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.calendar-tab');
        const contents = document.querySelectorAll('.calendar-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                // Remove active class from all tabs and contents
                tabs.forEach(t => t.classList.remove('active'));
                contents.forEach(c => c.classList.remove('active'));

                // Add active class to clicked tab and corresponding content
                this.classList.add('active');
                const targetId = this.getAttribute('data-target');
                document.getElementById(targetId).classList.add('active');
            });
        });
    });
</script>

<?php include 'footer.php'; ?>
