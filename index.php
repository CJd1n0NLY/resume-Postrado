<?php
require('imports.php');

$primaryColor = [39,29,32];
$secondaryColor = [243,226,210];
$black = [0,0,0];
$gray = [192,192,192];

$pdf = new PDF_Import();

$pdf->AddPage('P', array(210, 305));

$pdf->SetFillColor($primaryColor[0], $primaryColor[1], $primaryColor[2]); 

$pdf->Rect(90, 15, 130, 52, 'DF');

$pdf->SetTextColor($secondaryColor[0], $secondaryColor[1], $secondaryColor[2]);
$pdf->SetFont('Helvetica', 'B', 18);
$pdf->SetXY(107, 20);
$pdf->Cell(0, 10, "Charles Jacob C. Postrado", 0, 1);

$pdf->SetFont('Helvetica', 'I', 13.5);
$pdf->SetXY(107, 30);
$pdf->Cell(0, 10, "Bachelor of Science in Information Technology", 0, 1);

$pdf->SetFont('Helvetica', 'I', 10);
$pdf->SetXY(107, 35);
$pdf->Cell(0, 10, "University of Caloocan City (Main Campus)", 0, 1);

$pdf->SetXY(107, 40);
$pdf->Cell(0, 10, "S.Y. 2024-2025", 0, 1);
$pdf->Ln(5);

$pdf->Image('contact.png', 107, 51, 8, 8);
$pdf->SetXY(115, y: 50);
$pdf->Cell(0, 10, "+63-9937989901", 0, 1); 

$pdf->Image('email.png', 107, 58, 8, 8); 
$pdf->SetXY(115, y: 56);
$pdf->Cell(0, 10, "postradocharles.bsit@gmail.com", 0, 1);

$pdf->SetDrawColor($primaryColor[0], $primaryColor[1], $primaryColor[2]); 
$pdf->SetLineWidth(1.5);
$pdf->Ellipse(65, 40, 42, 34, 'D');

$pdf->ClippingEllipse(65, 40, 40, 32, true);

$pdf->Image('postrado.png', 8, -8, 120);

$pdf->UnsetClipping();

// OBJECTIVE
$pdf->Rect(0, 90, 80, 10, 'DF');
$pdf->SetTextColor($secondaryColor[0], $secondaryColor[1], $secondaryColor[2]);
$pdf->SetFont('Helvetica', 'B', 14);
$pdf->SetXY(15,90);
$pdf->Cell(0, 10, "OBJECTIVE:", 0, 1);

$pdf->SetTextColor($primaryColor[0], $primaryColor[1], $primaryColor[2]);

$objective = "To pursue a satisfying and challenging\n career that will broaden my \n experience as well as enhance my \n personal and professional growth.";
$pdf->SetFont('Helvetica', '', 12);
$pdf->SetXY(2,100);
$pdf->MultiCell(0, 10, $objective);

// SECTION LINE
$pdf->SetFillColor($primaryColor[0], $primaryColor[1], $primaryColor[2]); 
$pdf->Rect(80.5, 89.5, 1, 215, 'F');

// SKILLS AND ATTITUDE
$pdf->SetFillColor($primaryColor[0], $primaryColor[1], $primaryColor[2]); 
$pdf->Rect(81, 90, $pdf->GetPageWidth() - 80, 10, 'DF');

$pdf->SetFont('Helvetica', 'B', 14);
$pdf->SetXY(96,90);
$pdf->SetTextColor($secondaryColor[0], $secondaryColor[1], $secondaryColor[2]);
$pdf->Cell(0, 10, "SKILLS AND ATTITUDE:", 0, 1);

$pdf->SetTextColor($primaryColor[0], $primaryColor[1], $primaryColor[2]);
$pdf->SetFont('Helvetica', '', 12);
$pdf->SetXY(86, 100);

$s_a = [
    "Analyze complex problems and provide solutions",
    "Good oral and written communication skills (English, Tagalog)",
    "Honest",
    "Punctual",
    "Diligent and Persistent",
    "Patient",
    "Organized",
    "Good in interpersonal skills"
];

foreach ($s_a as $skill) {
    $pdf->Cell(5, 10, "-", 0, 0); 
    $pdf->Cell(0, 10, $skill, 0, 1);
    $pdf->SetX(86);
}


// EXPERTISE
$pdf->Rect(0, 145, 80, 10, 'DF');
$pdf->SetTextColor($secondaryColor[0], $secondaryColor[1], $secondaryColor[2]);
$pdf->SetFont('Helvetica', 'B', 14);
$pdf->SetXY(15,145);
$pdf->Cell(0, 10, "EXPERTISE:", 0, 1);

$pdf->SetTextColor($primaryColor[0], $primaryColor[1], $primaryColor[2]);
$pdf->SetFont('Helvetica', '', 12);

$expertise = [
    "Java" => 4,
    "PHP" => 3,
    "Javascript" => 3,
    "Graphic Design" => 2,
    "MS Office Programs" => 4
];

$y = 155; 

foreach ($expertise as $exp => $rating) {
    $pdf->SetXY(1, $y);
    $pdf->Cell(40, 10, $exp, 0, 0); 
    
    $x = 48; 
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $rating) {
            $pdf->SetFillColor($black[0], $black[1], $black[2]); 
        } else {
            $pdf->SetFillColor($gray[0], $gray[1], $gray[2]); 
        }
        
        $pdf->Ellipse($x, $y + 5, 2, 2, 'F');
        
        $x += 5; 
    }
    
    $y += 10;
}

// EXPERIENCE:
$pdf->SetFillColor($primaryColor[0], $primaryColor[1], $primaryColor[2]); 
$pdf->Rect(0, 208, $pdf->GetPageWidth()-80, 10, 'DF');
$pdf->SetTextColor($secondaryColor[0], $secondaryColor[1], $secondaryColor[2]);
$pdf->SetFont('Helvetica', 'B', 14);
$pdf->SetXY(15,208);
$pdf->Cell(0, 10, "EXPERIENCE:", 0, 1);

$pdf->SetTextColor($primaryColor[0], $primaryColor[1], $primaryColor[2]);
$pdf->SetXY(15,220);
$pdf->SetFont('Helvetica', 'B', 12);
$pdf->Cell(0, 5, " Busking Cosplayer ", 0, 1);
$pdf->SetFont('Helvetica', 'I', 10);
$pdf->SetXY(12,227);
$pdf->Cell(0, 5, " December 2023 - March 2024", 0, 1);


// ACHIEVEMENTS:
$pdf->SetFillColor($primaryColor[0], $primaryColor[1], $primaryColor[2]); 
$pdf->Rect(0, 235, $pdf->GetPageWidth()-130, 10, 'DF');
$pdf->SetTextColor($secondaryColor[0], $secondaryColor[1], $secondaryColor[2]);
$pdf->SetFont('Helvetica', 'B', 14);
$pdf->SetXY(15,235);
$pdf->Cell(0, 10, "ACHIEVEMENTS:", 0, 1);

$pdf->SetTextColor($primaryColor[0], $primaryColor[1], $primaryColor[2]);
$pdf->SetXY(0,252);
$pdf->SetFont('Helvetica', 'B', 10);
$pdf->Cell(0, 5, " Mabini Medical Clinic Appointment System ", 0, 1);
$pdf->SetXY(25,257);
$pdf->SetFont('Helvetica', 'I', 10);
$pdf->Cell(0, 5, "2023", 0, 1);

$pdf->SetXY(10,262);
$pdf->SetFont('Helvetica', 'B', 10);
$pdf->Cell(0, 5, " Hotel Management System ", 0, 1);
$pdf->SetXY(25,267);
$pdf->SetFont('Helvetica', 'I', 10);
$pdf->Cell(0, 5, "2023", 0, 1);

$pdf->SetXY(5,272);
$pdf->SetFont('Helvetica', 'B', 10);
$pdf->Cell(0, 5, " Dad's Waterpark Resort Booking System ", 0, 1);
$pdf->SetXY(25,277);
$pdf->SetFont('Helvetica', 'I', 10);
$pdf->Cell(0, 5, "2022", 0, 1);



// ACADEMIC BACKGROUND:

$pdf->SetFillColor($primaryColor[0], $primaryColor[1], $primaryColor[2]); 
$pdf->Rect(81, 208, $pdf->GetPageWidth()-80, 10, 'DF');
$pdf->SetTextColor($secondaryColor[0], $secondaryColor[1], $secondaryColor[2]);
$pdf->SetFont('Helvetica', 'B', 14);
$pdf->SetXY(120,208);
$pdf->Cell(0, 10, "ACADEMIC BACKGROUND:", 0, 1);

$pdf->SetXY(120,220);
$pdf->SetTextColor($primaryColor[0], $primaryColor[1], $primaryColor[2]);
$pdf->SetFont('Helvetica', 'B', 12);
$pdf->Cell(0, 8, "Tertiary Level School:", 0, 1);

$pdf->SetXY(110,227);
$pdf->SetFont('Helvetica', '', 12);
$pdf->Cell(0, 5, " University of Caloocan City (BSIT)", 0, 1);
$pdf->SetFont('Helvetica', 'I', 10);
$pdf->SetXY(130,232);
$pdf->Cell(0, 5, " 2022 - Present", 0, 1);

$pdf->SetXY(120,235);
$pdf->SetFont('Helvetica', 'B', 12);
$pdf->Cell(0, 8, "Secondary Level School:", 0, 1);

$pdf->SetXY(110,242);
$pdf->SetFont('Helvetica', '', 12);
$pdf->Cell(0, 5, " AMA Computer College Caloocan (ICT)", 0, 1);
$pdf->SetFont('Helvetica', 'I', 10);
$pdf->SetXY(130,247);
$pdf->Cell(0, 5, " 2020 - 2022", 0, 1);

$pdf->SetXY(110,252);
$pdf->SetFont('Helvetica', '', 12);
$pdf->Cell(0, 5, " Macario B. Asistio Sr. High School (Main)", 0, 1);
$pdf->SetXY(130,257);
$pdf->SetFont('Helvetica', 'I', 10);
$pdf->Cell(0, 5, " 2016 - 2020", 0, 1);

$pdf->SetXY(120,260);
$pdf->SetFont('Helvetica', 'B', 12);
$pdf->Cell(0, 8, "Primary Level School:", 0, 1);

$pdf->SetXY(115,267);
$pdf->SetFont('Helvetica', '', 12);
$pdf->Cell(0, 5, " Imelda Elementary School ", 0, 1);
$pdf->SetXY(130,272);
$pdf->SetFont('Helvetica', 'I', 10);
$pdf->Cell(0, 5, " 2011 - 2016", 0, 1);

$pdf->Output();
