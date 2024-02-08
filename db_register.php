<?php
// Retrieve data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];
  $lastname = $_POST['lastname'];
  $age = $_POST['age'];
  $dob = date('Y-m-d', strtotime($_POST['dob']));
  $gender = $_POST['gender'];
  $fathername = $_POST['fathername'];
  $highesteducation = $_POST['highesteducation'];
  $qualification = $_POST['qualification'];
  $major = $_POST['major'];
  $board = $_POST['board'];
  $course = $_POST['course'];
  $code = $_POST['code'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $resume = $_POST['resume'];
  $file = $_POST['file'];
  $skills = $_POST['skills'];
  $current = $_POST['current'];
  $permanent = $_POST['permanent'];

  //Create connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "recruitment";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } else {


    $sql = "insert into `profile` (`firstname`, `middlename`, `lastname`,`age`, `dob`, `gender`, `fathername`, `highesteducation`, `qualification`, `major`, `board`, `course`, `code`, `phone`, `email`, `resume`, `file`, `skills`, `current`, `permanent`, `time`) values ('$firstname', '$middlename', '$lastname','$age', '$dob', '$gender', '$fathername', '$highesteducation', '$qualification', '$major', '$board', '$course', '$code', '$phone', '$email', '$resume', '$file', '$skills', '$current', '$permanent',current_timestamp())";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your entry has been submitted successfully!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>';
    } else {
      echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>';
    }
    ob_start();
    require('fpdf186/fpdf.php'); // Include the FPDF library
    class PDF extends FPDF
    {
      function Header()
      {
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, 'User Details', 0, 1, 'C');
      }

      function Footer()
      {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
      }
    }
    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 12);

    // $pdf->Cell(190, 10, 'User Details', 1, 1, 'C');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(65, 10, 'Field', 1);
    $pdf->Cell(125, 10, 'Value', 1);
    $pdf->Ln();

    // Output the submitted details in the PDF
    $data = array(
      'First Name' => $firstname,
      'Middle Name' => $middlename,
      'Last Name' => $lastname,
      'Age' => $age,
      'Date of Birth' => $dob,
      'Gender' => $gender,
      'Guardian\'s/Father\'s Name' => $fathername,
      'Highest Education' => $highesteducation,
      'Educational Qualification' => $qualification,
      'Specialization/Major' => $major,
      'Board/University' => $board,
      'Nature of the Course' => $course,
      'Mobile Number' => $code . ' ' . $phone,
      'Email' => $email,
      'Resume' => $resume,
      'Additional Certificate' => $file,
      'Skills' => $skills,
      'Current Address' => $current,
      'Permanent Address' => $permanent
    );
    $pdf->SetFont('Arial', '', 12);
    foreach ($data as $field => $value) {
      $pdf->Cell(65, 10, $field, 1);
      $pdf->Cell(125, 10, $value, 1);
      $pdf->Ln();
    }
    $pdf->Output('user_details.pdf', 'D'); // Output the PDF as a download
    ob_end_flush();
  }
}
?>