<?php
$pdo = new PDO('mysql:host=localhost;dbname=apju_custom_db;charset=utf8mb4', 'root', '');

$content1 = '<p>आज दिनांक 29 नवम्बर 2025 को डॉ एपीजे अब्दुल कलाम विश्वविद्यालय द्वारा विधि विभाग के छात्र छात्राओं हेतु थाना विजिट का कार्यक्रम आयोजित किया गया, इस कार्यक्रम के प्रथम चरण में विश्वविद्यालय के विधि विभाग के छात्र छात्राओं द्वारा लसूड़िआ थाना इंदौर में पुलिस विभाग द्वारा अपनाये जाने वाली प्रकियो के व्यावहारिक ज्ञान प्राप्त करने के लिए विजिट की गई इस कार्यक्रम में थाना प्रभारी श्री तारेष कुमार सोनी सर द्वारा एवं दीवान साहब श्री राकेश शर्मा सर द्वारा विधि विद्यार्थियों को थाने में अपनाये जाने वाली प्रकियो जैसे FIR , चालान, पंचनामा, अनुसन्धान और अन्य आवश्यक जानकारी विस्तृत रूप से प्रदान की गई। थाना विजिट के सफल आयोजन मे डॉ. ए.पी.जे. अब्दुल कलाम विश्वविद्यालय की कुलगुरु डॉ दीपिका पाठक, उपकुलपति डॉ राजीव जी विश्वकर्मा, कुलसचिव श्री संदीप गुप्ता, चीफ प्रोक्टर श्री करुणाकर शुक्ला CAO श्री प्रदीप चौहान, थाना प्रभारी श्री तारेष कुमार सोनी एवं विधि विभाग के प्राचार्य डॉ दरवेश भण्डारी की भूमिका महत्वपूर्ण रही, थाना विजिट का प्रबंध एवं संचालन सुश्री गीतांजली योगी, श्रीमती श्वेता पंवार, श्रीमती राना बजाज, सुश्री प्रिया गौर द्वारा किया गया।</p>
<p><iframe title="कानून की समझ क्यों जरूरी है ?" width="100%" height="450" src="https://www.youtube.com/embed/vMeD80BM4eE?feature=oembed" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></p>';

$content2 = '<p>इंदौर @ पत्रिका. एपीजे अब्दुल कलाम यूनिवर्सिटी में इंडियन फार्मेसी ग्रेजुएट्स एसोसिएशन (आईपीजीए) के द्वितीय अंतरराष्ट्रीय सम्मेलन की शुरुआत राज्यपाल मंगुभाई पटेल ने की। सांसद शंकर लालवानी, मंत्री तुलसीराम सिलावट, कुलाधिपति डॉ. प्रीति कपूर, कुलगुरु डॉ. दीपिका पाठक, उपकुलपति डॉ. राजीव विश्वकर्मा, आईपीजीए के राष्ट्रीय सचिव डॉ. अरुण गर्ग, उपाध्यक्ष डॉ. दीपेंद्र सिंह, प्रदेश अध्यक्ष डॉ. करणाकर शुक्ला, उपाध्यक्ष डॉ. राकेश जाटव, कोषाध्यक्ष डॉ. देवव्रत गुप्ता, सचिव डॉ. सौरभ जैन, कॉलेज ऑफ फार्मेसी के प्राचार्य डॉ. अमित मोदी सहित सभी डीन उपस्थित थे।</p>
<p>2 हजार से अधिक विद्यार्थियों और शोधार्थियों की सहभागिता वाले इस सम्मेलन में छात्रों ने ऑनलाइन और ऑफलाइन शोध प्रस्तुत किए। मुख्य विषय फार्मा और जैव विज्ञान में एआई संचालित नवाचार, स्किल सेल, एनीमिया और अन्य रोगों की दवा विकास में एक नया क्षितिज था।</p>
<p><strong>MP Darshan News</strong></p>
<p><iframe title="इंदौर में IPGA का अंतरराष्ट्रीय सम्मेलन सम्पन्न, राज्यपाल सहित कई विशेषज्ञ हुए शामिल" width="100%" height="450" src="https://www.youtube.com/embed/WLKZO7bETKc?feature=oembed" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></p>';

try {
    $pdo->exec("ALTER TABLE media_coverage ADD COLUMN content TEXT NULL");
    echo "Column added. ";
} catch (PDOException $e) {
    // Column might already exist, ignore
    echo "Column check done. ";
}

// Update query
$stmt1 = $pdo->prepare("UPDATE media_coverage SET content = ? WHERE title LIKE '%कानून की समझ%'");
$stmt1->execute([$content1]);

$stmt2 = $pdo->prepare("UPDATE media_coverage SET content = ? WHERE title LIKE '%आईपीजीए का अंतरराष्ट्रीय सम्मेलन%'");
$stmt2->execute([$content2]);

echo "Media updated successfully.";
?>
