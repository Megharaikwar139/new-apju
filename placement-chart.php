<?php include 'header.php'; ?>
<main id="primary" class="site-main">
   
    
 
		 
<article id="post-4397" class="post-4397 page type-page status-publish hentry">
	 
	<div class="uk-container">
		

	<div class="entry-content">
		<div class="wpb-content-wrapper"><div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper">
	<div class="wpb_raw_code wpb_raw_html wpb_content_element" >
		<div class="wpb_wrapper">
			<div class="aku-dashboard">

<script src="assets/js/chart.js"></script>

<style>
.aku-dashboard {
    font-family: 'Segoe UI', sans-serif;
}

/* HEADER */
.aku-header {
    text-align: center;
    margin-bottom: 25px;
}
.aku-header h2 {
    color: #8d141b;
    font-weight: 600;
}

/* KPI CARDS */
.aku-kpi {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px,1fr));
    gap: 15px;
    margin-bottom: 30px;
}

.kpi-card {
    background: linear-gradient(135deg, #8d141b, #c13b3b);
    color: #fff;
    padding: 18px;
    border-radius: 12px;
    box-shadow: 0 6px 14px rgba(0,0,0,0.1);
}
.kpi-card h3 {
    margin: 0;
    font-size: 24px;
}
.kpi-card p {
    margin: 5px 0 0;
    font-size: 13px;
}

/* GRID FOR CHARTS */
.chart-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

/* SINGLE FULL WIDTH */
.chart-full {
    margin-top: 20px;
}

/* CHART CARD */
.chart-box {
    background: #fff;
    border-radius: 12px;
    padding: 18px;
    box-shadow: 0 5px 12px rgba(0,0,0,0.08);
    transition: 0.3s;
}
.chart-box:hover {
    transform: translateY(-4px);
}

.chart-box h4 {
    margin-bottom: 12px;
    font-size: 15px;
    color: #444;
}

/* RESPONSIVE */
@media(max-width:768px){
    .chart-grid {
        grid-template-columns: 1fr;
    }
}

canvas {
    width: 100% !important;
    height: 280px !important;
}
</style>

<div class="aku-header">
    <h2>Placement Trends Dashboard</h2>
</div>

<!-- KPI -->
<div class="aku-kpi">
    <div class="kpi-card">
        <h3>1216</h3>
        <p>Highest Private Placement</p>
    </div>
    <div class="kpi-card">
        <h3>55</h3>
        <p>Highest Govt Placement</p>
    </div>
    <div class="kpi-card">
        <h3>1186</h3>
        <p>Higher Education Peak</p>
    </div>
    <div class="kpi-card">
        <h3>418</h3>
        <p>Entrepreneurs 2026</p>
    </div>
</div>

<!-- 2 COLUMN CHARTS -->
<div class="chart-grid">

    <div class="chart-box">
        <h4>Young Entrepreneurs</h4>
        <canvas id="c1"></canvas>
    </div>

    <div class="chart-box">
        <h4>Other Outcomes</h4>
        <canvas id="c2"></canvas>
    </div>

    <div class="chart-box">
        <h4>Higher Education</h4>
        <canvas id="c3"></canvas>
    </div>

    <div class="chart-box">
        <h4>Government vs Private (2018–2026)</h4>
        <canvas id="c4"></canvas>
    </div>

</div>

<script>
const years = ["2018","2019","2020","2021","2022","2023","2024","2025","2026"];

const options = {
    responsive: true,
    plugins: {
        legend: { position: 'top' }
    },
    scales: {
        y: { beginAtZero: true }
    }
};

/* Chart 1 */
new Chart(c1, {
    type: "bar",
    data: {
        labels: years,
        datasets: [{
            label: "Entrepreneurs",
            data: [42,77,325,211,197,195,160,180,418],
            backgroundColor: "#6c83d6"
        }]
    },
    options: options
});

/* Chart 2 */
new Chart(c2, {
    type: "bar",
    data: {
        labels: years,
        datasets: [
            { label: "Family", data: [53,30,453,447,57,119,28,61,2], backgroundColor: "#4e79a7" },
            { label: "Marriage", data: [53,143,140,51,36,36,77,15,16], backgroundColor: "#59a14f" },
            { label: "Exam Prep", data: [3,294,1032,580,121,120,191,70,11], backgroundColor: "#f1c40f" }
        ]
    },
    options: options
});

/* Chart 3 */
new Chart(c3, {
    type: "bar",
    data: {
        labels: years,
        datasets: [
            { label: "Higher Edu", data: [12,584,639,1186,85,185,193,175,103], backgroundColor: "#5b8fdc" },
            { label: "Abroad", data: [20,34,15,10,58,74,83,62,0], backgroundColor: "#7cc576" }
        ]
    },
    options: options
});

/* Chart 4 */
new Chart(c4, {
    type: "line",
    data: {
        labels: years,
        datasets: [
            { label: "Govt", data: [6,23,37,23,32,55,39,12,3], borderColor: "#2c6faa" },
            { label: "Private", data: [214,588,1059,1200,1192,1216,1139,361,3], borderColor: "#b8860b" }
        ]
    },
    options: options
});
</script>

</div>
		</div>
	</div>
</div></div></div></div>
</div>	</div><!-- .entry-content -->
	</div>
	</article><!-- #post-4397 -->  
	</main>
<?php include 'footer.php'; ?>
