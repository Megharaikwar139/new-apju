<?php
$pdo = new PDO('mysql:host=localhost;dbname=apju_custom_db;charset=utf8mb4', 'root', '');

// Clear existing blogs
$pdo->exec("TRUNCATE TABLE blogs");

// Insert Blog 1
$title1 = "Building Careers with Industry Partnerships";
$slug1 = "building-careers-with-industry-partnerships";
$image1 = "assets/images/blog1-300x180.jpg";
$content1 = "<p>At AJP Abdul Kalam University, we understand that education is not just about degrees , it’s about building careers.</p><p>That’s why we actively collaborate with leading industries, organizations, and research institutions to bridge the gap between academia and the professional world.</p><p>Our <strong>Training and Placement Cell</strong> works tirelessly to connect students with top recruiters through placement drives, internships, and industrial visits. With partnerships spanning IT, engineering, management, healthcare, and creative industries, we provide students with the exposure they need to thrive in competitive environments.</p><p>In the past year, several students secured placements in reputed multinational companies and startups, proving the effectiveness of our skill-driven curriculum. Regular workshops on resume building, interview skills, and entrepreneurship further prepare students to step confidently into the workforce.</p><p>By aligning academic excellence with practical learning, AJP Abdul Kalam University ensures that every graduate is not just employable but industry-ready.</p>";
$pdo->prepare("INSERT INTO blogs (title, slug, content, image_path) VALUES (?, ?, ?, ?)")->execute([$title1, $slug1, $content1, $image1]);

// Insert Blog 2
$title2 = "Fostering Innovation through Research and Development";
$slug2 = "fostering-innovation-through-research-and-development";
$image2 = "assets/images/blog2-300x200.jpg";
$content2 = "<p>At Dr. A.P.J. Abdul Kalam University, innovation is not just a concept — it is a way of life. Inspired by our namesake, we encourage students and faculty alike to pursue research that addresses real-world problems and contributes to societal progress.</p><p>Our state-of-the-art laboratories and research centers are equipped with the latest technology, enabling breakthroughs in fields such as renewable energy, biotechnology, artificial intelligence, and pharmaceuticals. We actively support students with funding opportunities, mentorship, and access to global research databases.</p><p>This year alone, our faculty and scholars have published numerous papers in prestigious international journals and filed several patents. Through our dedicated Incubation Center, we also help aspiring entrepreneurs turn their innovative ideas into successful startups.</p><p>We believe that research is the cornerstone of progress, and at AKU, we are committed to nurturing the next generation of thinkers, innovators, and leaders.</p>";
$pdo->prepare("INSERT INTO blogs (title, slug, content, image_path) VALUES (?, ?, ?, ?)")->execute([$title2, $slug2, $content2, $image2]);

// Insert Blog 3
$title3 = "Independence Day 2025: A Proud Celebration";
$slug3 = "independence-day-2025";
$image3 = "assets/images/blog-300x169.png";
$content3 = "<p>Every year, Independence Day brings with it a renewed sense of pride and patriotism, and this year at Dr. A.P.J. Abdul Kalam University, the celebrations were grander than ever.</p><p>The day began with the hoisting of the national flag by our Honorable Vice-Chancellor, followed by the singing of the national anthem that echoed through the campus. The ceremony was attended by students, faculty, and staff, all dressed in traditional attire, reflecting the rich cultural diversity of our nation.</p><p>Various cultural performances, including patriotic songs, dances, and skits, were organized by the students, leaving the audience spellbound. The highlight of the event was a special address honoring the sacrifices of our freedom fighters and reminding the youth of their responsibility towards building a progressive India.</p><p>The event concluded with the distribution of sweets and a pledge to uphold the values of democracy, unity, and integrity.</p>";
$pdo->prepare("INSERT INTO blogs (title, slug, content, image_path) VALUES (?, ?, ?, ?)")->execute([$title3, $slug3, $content3, $image3]);

echo "Blogs updated successfully!";
?>
