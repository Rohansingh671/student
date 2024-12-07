<?php
// Check if GD library is installed
if (!extension_loaded('gd')) {
    die('GD library is not installed');
}

require_once 'databaseConnection.php';

$mysqli = db_connect();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $mysqli->prepare("SELECT `imageOfStudent`, `admissionNumber`, `fnameOfStudent`, `lnameOfStudent`, `currentAddressOfStudent`, `dateOfBirth`, `class`, `primaryContact` FROM `addstudent` WHERE ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($imageOfStudent ,$admissionNumber, $fnameOfStudent, $lnameOfStudent, $currentAddressOfStudent, $dateOfBirth, $class, $primaryContact);
    $stmt->fetch();

    //generate a date adding one year to the current date
    $date = new DateTime();
    $date->modify('+1 year');
    $valid_until = $date->format('Y-m-d');

    $student_data = [
        'photo' => "../" . $imageOfStudent,  // Path to the student photo (450px x 450px)
        'banner_top' => '../idCardAssets/banner_image.jpg',  // Path to the top banner image (1755px wide)
        'banner_side' => '../idCardAssets/side_banner_image.jpg',  // Path to the side banner image (137px wide)
        'bottom_bar' => '../idCardAssets/bottom_bar.jpg',

        'master_id' => $admissionNumber,
        'name' => $fnameOfStudent . " " . $lnameOfStudent,
        'address' => $currentAddressOfStudent,
        'dob' => $dateOfBirth,
        'course' => $class,
        'contact' => $primaryContact,
        'valid_until' => $valid_until
    ];


    // Create a blank image (ID card size)
    $card_width = 1755;
    $card_height = 1240;
    $image = imagecreatetruecolor($card_width, $card_height);

    // Colors
    $white = imagecolorallocate($image, 255, 255, 255);
    $black = imagecolorallocate($image, 0, 0, 0);
    $gray = imagecolorallocate($image, 200, 200, 200);

    // Fill background with white
    imagefilledrectangle($image, 0, 0, $card_width, $card_height, $white);

    // Load and place the top banner (full width)
    $banner_top = imagecreatefromjpeg($student_data['banner_top']);
    $banner_height = 200;  // Set the banner height
    imagecopyresized($image, $banner_top, 0, 0, 0, 0, $card_width, $banner_height, imagesx($banner_top), imagesy($banner_top));

    // Load and place the left-side banner (137px wide)
    $banner_side = imagecreatefromjpeg($student_data['banner_side']);
    $banner_side_width = 125;
    $banner_side_height = 973;
    imagecopyresized($image, $banner_side, 0, $banner_height, 0, 0, $banner_side_width, $banner_side_height, imagesx($banner_side), imagesy($banner_side));

    // Load student photo and place it on the right side
    $photo = imagecreatefromjpeg($student_data['photo']);
    $photo_width = 450;
    $photo_height = 450;
    $image_right_margin = $card_width - $photo_width - 20;  // Position the photo on the right
    imagecopyresized($image, $photo, $image_right_margin, $banner_height + 20, 0, 0, $photo_width, $photo_height, imagesx($photo), imagesy($photo));

    // Set the font path (adjust this if necessary)
    $font = __DIR__ . '/../idCardAssets/arial.ttf'; // Ensure you have a TTF font file in the same directory or provide a valid path
    $font_cursive = __DIR__ . '/../idCardAssets/cursive.ttf'; // Ensure you have a TTF font file in the same directory or provide a valid path

    // Increase font size for better coverage
    $font_size = 50;  // Increased font size

    // Add padding between top banner and text
    $padding = 100;  // Adjust padding between banner and text

    // Add student details to the card (to the right of the side banner)
    $text_start_x = $banner_side_width + 30;  // Start after the side banner
    $text_start_y = $banner_height + $padding;  // Add padding to the top text position

    // Adding line breaks (new lines) after each field by adjusting the y-coordinate
    imagettftext($image, $font_size, 0, $text_start_x, $text_start_y, $black, $font, "Master ID: " . $student_data['master_id']);
    $text_start_y += 130;  // Add space for the next line

    imagettftext($image, $font_size, 0, $text_start_x, $text_start_y, $black, $font, "Name: " . $student_data['name']);
    $text_start_y += 130;  // Add space for the next line

    imagettftext($image, $font_size, 0, $text_start_x, $text_start_y, $black, $font, "Address: " . $student_data['address']);
    $text_start_y += 130;  // Add space for the next line

    imagettftext($image, $font_size, 0, $text_start_x, $text_start_y, $black, $font, "DOB: " . $student_data['dob']);
    $text_start_y += 130;  // Add space for the next line

    imagettftext($image, $font_size, 0, $text_start_x, $text_start_y, $black, $font, "Course: " . $student_data['course']);
    $text_start_y += 130;  // Add space for the next line

    imagettftext($image, $font_size, 0, $text_start_x, $text_start_y, $black, $font, "Contact: " . $student_data['contact']);
    $text_start_y += 130;  // Add space for the next line

    imagettftext($image, $font_size, 0, $text_start_x, $text_start_y, $black, $font, "Valid Until: " . $student_data['valid_until']);
    $text_start_y += 50;

    imagettftext($image, 40, 0, 1200, $text_start_y, $black, $font_cursive, "Directory Signature");

    $bottom_bar = imagecreatefromjpeg($student_data['bottom_bar']);
    $bottom_bar_width = 1755;
    $bottom_bar_height = 80;
    imagecopyresized($image, $bottom_bar, 0, $card_height - $bottom_bar_height, 0, 0, $bottom_bar_width, $bottom_bar_height, imagesx($bottom_bar), imagesy($bottom_bar));


    // Optional: Add a border around the card
    imagerectangle($image, 0, 0, $card_width - 1, $card_height - 1, $gray);

    // Output the image
    header('Content-Type: image/png');
    imagepng($image);

    // Clean up
    imagedestroy($image);
    imagedestroy($photo);
    imagedestroy($banner_top);
    imagedestroy($banner_side);
    imagedestroy($bottom_bar);
} else {
    echo "ID not found";
}
