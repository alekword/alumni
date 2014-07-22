<?php
require("include/connect.php");
$name = $_GET['name'];
$sql = "SELECT * FROM alumni WHERE alumni_username = '$name'";
$result = mysql_query($sql);
list($alumni_id,$username,$student_id,$alumni_education,$name_title,$fname,$lname,$birthdate,$alumni_website,$alumni_facebook,$alumni_email,
	$alumni_address,$alumni_province,$alumni_post,$alumni_tel,$alumni_fax,$work_type,$work_name,$work_position,
	$work_department,$work_address,$work_province,$work_post,$work_tel,$work_fax,$pic) = mysql_fetch_row($result);

$name = $name_title.$fname." ".$lname;
require('fpdf.php');

define('FPDF_FONTPATH','font/');

class PDF extends FPDF
{
//Load data
function LoadData($file)
{
	//Read file lines
	$lines=file($file);
	$data=array();
	foreach($lines as $line)
	$data[]=explode(';',chop($line));
	return $data;
}

//Simple table
function BasicTable($header,$data)
{
	//Header
	
	$w=array(30,60,15,15,35,35);
	//Header
	
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C');
	$this->Ln();
	//Data
	foreach ($data as $eachResult) 
	{
		$this->Cell(30,6,iconv('UTF-8','TIS-620',$eachResult[0]),1,0,'L');
		$this->Cell(60,6,iconv('UTF-8','TIS-620',$eachResult[1]),1,0,'L');
		$this->Cell(15,6,iconv('UTF-8','TIS-620',$eachResult[2]),1,0,'C');
		$this->Cell(15,6,iconv('UTF-8','TIS-620',$eachResult[3]),1,0,'C');
		$this->Cell(35,6,iconv('UTF-8','TIS-620',$eachResult[4]),1,0,'L');
		$this->Cell(35,6,iconv('UTF-8','TIS-620',$eachResult[5]),1,0,'L');
		$this->Ln();
	}
}

function BasicTable2($header2,$data)
{
	//Header
	
	$w=array(30,30,30,30);
	//Header
	
	for($i=0;$i<count($header2);$i++)
		$this->Cell($w[$i],7,$header2[$i],1,0,'C');
	$this->Ln();
	//Data
	foreach ($data as $eachResult) 
	{
		$this->Cell(30,6,iconv('UTF-8','TIS-620',$eachResult[0]),1,0,'L');
		$this->Cell(30,6,iconv('UTF-8','TIS-620',$eachResult[1]),1,0,'L');
		$this->Cell(30,6,iconv('UTF-8','TIS-620',$eachResult[2]),1,0,'L');
		$this->Cell(30,6,iconv('UTF-8','TIS-620',$eachResult[3]),1,0,'L');
		$this->Ln();
	}
}

//Better table
}
$pdf=new PDF();
$pdf2 = new PDF();
$pdf->AddFont('angsa','B','angsa.php');
$pdf->SetFont('angsa','B',16);
$pdf2->AddFont('angsa','','angsa.php');
$pdf2->SetFont('angsa','',36);

//Column titles
$header=array(iconv('UTF-8','TIS-620','ระดับ'),iconv('UTF-8','TIS-620','สถานศึกษา'),iconv('UTF-8','TIS-620','ปีที่เริ่ม'),iconv('UTF-8','TIS-620','ปีที่จบ'),iconv('UTF-8','TIS-620','วุฒิการศึกษา'),iconv('UTF-8','TIS-620','วิชาเอก'));
$header2=array(iconv('UTF-8','TIS-620','ภาษา (Language)'),iconv('UTF-8','TIS-620','ฟัง / Listen'),iconv('UTF-8','TIS-620','พูด / Speaking'),iconv('UTF-8','TIS-620','เขียน / Writing'));


//Data loading

//*** Load MySQL Data ***//
//include("include/connect_database.php");
//connectdatabase();


if($pic){
	$path = "images/profile/".$pic;
}else{
	$path = "images/profile/imageNotFound.jpg";
}

$logo = "images/cis_logo.jpg";
//*** Table 1 ***//

$pdf->AddPage();
$pdf->Image($logo ,30,65,150,120);
$pdf->Cell(0,20,iconv( 'UTF-8','TIS-620','ใบประวัติศิษย์เก่า'),0,1,"C");
$pdf->Ln(25);

$pdf->Image($path,88,30,33);
$pdf->Ln(10);
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ข้อมูลประวัติ'),0,1,"L");
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','รหัสนักศึกษา  : '.$student_id),0,1,"L");
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ชื่อ-นามสกุล : '.$name),0,1,"L");
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','หลักสูตรที่จบ : '.$alumni_education),0,1,"L");
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','วันเดือนปีเกิด : '.$birthdate),0,1,"L");
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','เว็บไซต์ : '.$alumni_website),0,1,"L");
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','เฟสบุ๊ค : '.$alumni_facebook),0,1,"L");
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','อีเมล์ : '.$alumni_email),0,1,"L");
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ที่อยู่ปัจจุบัน : '.$alumni_address),0,1,"L");
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','จังหวัด : '.$alumni_province),0,1,"L");
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','รหัสไปรษณีย์ : '.$alumni_post.' '.' เบอร์โทรติดต่อ : '. $alumni_tel.' '.'  แฟกซ์ :  '.$alumni_fax),0,1,"L");
$pdf->Ln();
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ข้อมูลการทำงาน'),0,1,"L");
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ลักษณะงาน : '.$work_type),0,1,"L");
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ชื่อองค์กร หรือ บริษัท : '.$work_name),0,1,"L");
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ตำแหน่ง : '.$work_position),0,1,"L");
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','แผนก : '.$work_department),0,1,"L");
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','ที่อยู่ : '.$work_address),0,1,"L");
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','จังหวัด : '.$work_province),0,1,"L");
$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620','รหัสไปรษณีย์ : '.$work_post.' '.' เบอร์โทรติดต่อ :  '. $work_tel.' '.' แฟกซ์ :  '.$work_fax),0,1,"L");

//$pdf->Cell(0,20,iconv( 'UTF-8','TIS-620','สวัสดี ชาวไทยครีเอท'),0,1,"L");
$pdf->Output("report/alumni_print.pdf","F");
echo "<script type=\"text/javascript\">window.location=\"report/alumni_print.pdf\";</script>";
//PDF Created Click <a href="MyPDF/MyPDF.pdf">here</a> to Download

?>

