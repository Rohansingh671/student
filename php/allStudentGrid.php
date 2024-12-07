<?php
require_once 'databaseConnection.php';
$mysqli = db_connect();

$stmt = $mysqli->prepare("SELECT `ID`, `imageOfStudent`, `academicYear`, `admissionNumber`, `admissionDate`, `rollNumber`, `studentStatus`, 
`fnameOfStudent`, `lnameOfStudent`, `class`, `section`, `gender`, `dateOfBirth`, `bloodGroup`, `house`, `religion`, `feesGroup`, 
`caste`, `primaryContact`, `emailOfstudent`, `motherTongue`, `languageKnown`, `imageOfFather`, `fatherName`, 
`emailOfFather`, `fatherContact`, `fatherProfession`, `imageOfMother`, `motherName`, `emailOfMother`, 
`motherContact`, `motherProfession`, `guardianName`, `guardianRelation`, `guardianContact`, `guardianEmail`, 
`guardianOccupation`, `guardianAddress`, `imageOfGuardian`, `currentAddressOfStudent`, `permanentAddressOfStudent`, 
`districtOfStudent`, `provinceOfStudent`, `transportRoute`, `vehicleNumber`, `pickUpPoint`, `hostel`, `hostelRoomNumber`, 
`documentOfBirthCertificate`, `documentOfTransferCertificate`, `allergiesOfStudent`, 
`medicationOfStudent`, `previousSchoolName`, `previousSchoolAddress`, `bankName`, `branchOfBank`, `ifscNumber`, 
`otherInfo` FROM `addstudent`");

$stmt->execute();
$stmt->store_result();

// Bind the results to variables once
$stmt->bind_result(
    $id,
    $image_path,
    $academic_year,
    $admission_number,
    $admission_date,
    $roll_number,
    $status,
    $first_name,
    $last_name,
    $class,
    $section,
    $gender,
    $dob,
    $blood_group,
    $house,
    $religion,
    $feesGroup,
    $caste,
    $primary_contact,
    $email,
    $mother_tongue,
    $languages_known,
    $father_image_path,
    $father_name,
    $fatherEmail,
    $father_contact,
    $father_occupation,
    $mother_image_path,
    $mother_name,
    $motherEmail,
    $mother_contact,
    $mother_occupation,
    $guardian_name,
    $guardian_relation,
    $guardian_contact,
    $guardianEmail,
    $guardian_occupation,
    $guardian_address,
    $guardian_image_path,
    $current_addressOfStudent,
    $permanent_addressOfStudent,
    $districtOfStudent,
    $provinceOfStudent,
    $transportationRoute,
    $vehicleNumber,
    $pickUpPoint,
    $hostel,
    $hostelRoomNumber,
    $birthCertificate_image_path,
    $transferCertificate_image_path,
    $allergiesOfStudent,
    $medicationOfStudent,
    $previousSchoolName,
    $previousSchoolAddress,
    $bankName,
    $branchOfBank,
    $ifscNumber,
    $otherInfo
);

// Create an empty array to store all rows
$students = array();

// Fetch data row by row in the while loop
while ($stmt->fetch()) {
    $student = array(
        'id' => $id,
        'image_path' => $image_path,
        'academic_year' => $academic_year,
        'admission_number' => $admission_number,
        'admission_date' => $admission_date,
        'roll_number' => $roll_number,
        'status' => $status,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'class' => $class,
        'section' => $section,
        'gender' => $gender,
        'dob' => $dob,
        'blood_group' => $blood_group,
        'house' => $house,
        'religion' => $religion,
        'feesGroup' => $feesGroup,
        'caste' => $caste,
        'primary_contact' => $primary_contact,
        'email' => $email,
        'mother_tongue' => $mother_tongue,
        'languages_known' => $languages_known,
        'father_image_path' => $father_image_path,
        'father_name' => $father_name,
        'fatherEmail' => $fatherEmail,
        'father_contact' => $father_contact,
        'father_occupation' => $father_occupation,
        'mother_image_path' => $mother_image_path,
        'mother_name' => $mother_name,
        'motherEmail' => $motherEmail,
        'mother_contact' => $mother_contact,
        'mother_occupation' => $mother_occupation,
        'guardian_name' => $guardian_name,
        'guardian_relation' => $guardian_relation,
        'guardian_contact' => $guardian_contact,
        'guardianEmail' => $guardianEmail,
        'guardian_occupation' => $guardian_occupation,
        'guardian_address' => $guardian_address,
        'guardian_image_path' => $guardian_image_path,
        'current_addressOfStudent' => $current_addressOfStudent,
        'permanent_addressOfStudent' => $permanent_addressOfStudent,
        'districtOfStudent' => $districtOfStudent,
        'provinceOfStudent' => $provinceOfStudent,
        'transportationRoute' => $transportationRoute,
        'vehicleNumber' => $vehicleNumber,
        'pickUpPoint' => $pickUpPoint,
        'hostel' => $hostel,
        'hostelRoomNumber' => $hostelRoomNumber,
        'birthCertificate_image_path' => $birthCertificate_image_path,
        'transferCertificate_image_path' => $transferCertificate_image_path,
        'allergiesOfStudent' => $allergiesOfStudent,
        'medicationOfStudent' => $medicationOfStudent,
        'previousSchoolName' => $previousSchoolName,
        'previousSchoolAddress' => $previousSchoolAddress,
        'bankName' => $bankName,
        'branchOfBank' => $branchOfBank,
        'ifscNumber' => $ifscNumber,
        'otherInfo' => $otherInfo
    );
    
    // Add the student array to the $students array
    $students[] = $student;
}

$stmt->close();
db_close($mysqli);

?>
