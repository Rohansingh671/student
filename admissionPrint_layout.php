<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aria Admission Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <div class="header">
            <div class="logo-placeholder">
                <!-- Replace this with your logo image -->
                <span>Logo</span>
            </div>
            <div class="title">
                <h1>ARIA EDUCATION INS. PVT. LTD.</h1>
                <p>District Post Office (Hulak) Birgunj<br>
                Ph.: +977-051-524773, 051-530778<br>
                Email: info@aria.edu.np<br>
                Web: www.aria.edu.np</p>
            </div>
        </div>
        
        <h2 class="form-title">STUDENT'S DETAIL</h2>
        
        <form>
            <div class="row">
                <label>Regd. No.: <input type="text"></label>
                <label>MID No.: <input type="text"></label>
                <label>Date: <input type="date"></label>
            </div>
            
            <div class="row">
                <label>Course Desired: <input type="text"></label>
                <label>Group: <input type="text"></label>
            </div>
            
            <div class="row">
                <label>Student's Full Name:</label>
                <input type="text" placeholder="First Name">
                <input type="text" placeholder="Middle Name">
                <input type="text" placeholder="Last Name">
            </div>
            
            <div class="row">
                <label>Date of Birth: <input type="date"></label>
                <label>Gender: 
                    <input type="radio" name="gender" value="male"> Male
                    <input type="radio" name="gender" value="female"> Female
                </label>
            </div>
            
            <div class="row">
                <label>Contact No.: <input type="tel"></label>
                <label>Email ID: <input type="email"></label>
            </div>
            
            <div class="row">
                <label>Citizenship No.: <input type="text"></label>
                <label>National ID: <input type="text"></label>
            </div>
            
            <div class="row">
                <label>Father's Name:</label>
                <input type="text" placeholder="First Name">
                <input type="text" placeholder="Middle Name">
                <input type="text" placeholder="Last Name">
            </div>
            
            <div class="row">
                <label>Contact No.: <input type="tel"></label>
            </div>
            
            <div class="address">
                <div>
                    <h3>Permanent Address</h3>
                    <label>Province: <input type="text"></label>
                    <label>District: <input type="text"></label>
                    <label>Local Level: <input type="text"></label>
                    <label>Ward No.: <input type="text"></label>
                    <label>Tole: <input type="text"></label>
                </div>
                <div>
                    <h3>Temporary Address</h3>
                    <label>Province: <input type="text"></label>
                    <label>District: <input type="text"></label>
                    <label>Local Level: <input type="text"></label>
                    <label>Ward No.: <input type="text"></label>
                    <label>Tole: <input type="text"></label>
                </div>
            </div>
            
            <h2>Academic Qualification</h2>
            <table>
                <tr>
                    <th>Level</th>
                    <th>School/College</th>
                    <th>Board</th>
                    <th>Passing Year</th>
                    <th>Percentage</th>
                </tr>
                <tr>
                    <td>SLC/SEE</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td>+2</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td>Bachelors</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td>Masters</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td>Others</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>