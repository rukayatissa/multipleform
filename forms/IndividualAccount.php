<!Doctype html>
                  <html>
                  <head>
                  <title>INDIVIDUAL ACCOUNT</title>
                  <meta charset="utf-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1">
                  <link rel="stylesheet" href="../css/bootstrap.min.css"type="text/css">
                 <!-- <link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> --> 
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
                 <script src="../js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

                    <link rel="stylesheet" href="../css/register.css" type="text/css">
                  </head>
                  <body>
                  <section>
                  <div>
                  <img src="../img/tyndales.jpg" alt="tyndaleslogo">
                  </div>
                  </section>
                  <?php
                                    require '../vendor/autoload.php';
                                    use PhpOffice\PhpSpreadsheet\Spreadsheet;
                                    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
                                    use PhpOffice\PhpSpreadsheet\IOFactory;
                  
                                    use PHPMailer\PHPMailer\PHPMailer;
                                    use PHPMailer\PHPMailer\Exception;
                                    //processing messages
                                    echo $_GET['success'];
                                    if(isset($_GET['success'])){
                                      switch($_GET['success']){
                                        case  'ok':
                                        echo '<h2 style="color:#0B4A2F";><strong>form submitted, you will be contacted shortly!<strong></h2>';
                                        break;
                                      }
                        
                                    }
                  if(isset($_POST['submit'])&& $_POST['submit']!=null){
                    
                    require '../phpMailer/src/Exception.php';
                    require '../phpMailer/src/PHPMailer.php';
                    require '../phpMailer/src/SMTP.php';

                    require '../include/tcpdf.php';
          
                    // create new PDF document
                    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                    
                    // set document information
                    // $pdf->SetCreator(PDF_CREATOR);
                    // $pdf->SetAuthor('Nicola Asuni');
                    // $pdf->SetTitle('TCPDF Example 001');
                    // $pdf->SetSubject('TCPDF Tutorial');
                    // $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
                    
                    // set default header data
                    $pdf->SetHeaderData(false);
                    $pdf->setFooterData(array(0,64,0), array(0,64,128));
                    
                    // set header and footer fonts
                    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
                    
                    // set default monospaced font
                    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                    
                    // set margins
                    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
                    
                    // set auto page breaks
                    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
                    
                    // set image scale factor
                    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
                    
                    // set some language-dependent strings (optional)
                    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                        require_once(dirname(__FILE__).'/lang/eng.php');
                        $pdf->setLanguageArray($l);
                    }
                    
                    // ---------------------------------------------------------
                    
                    // set default font subsetting mode
                    $pdf->setFontSubsetting(true);
                    
                    // Set font
                    // dejavusans is a UTF-8 Unicode font, if you only need to
                    // print standard ASCII chars, you can use core fonts like
                    // helvetica or times to reduce file size.
                    //$pdf->SetFont('dejavusans', '', 14, '', true);
                    
                    // Add a page
                    // This method has several options, check the source code documentation for more information.
                    $pdf->AddPage();
                    
                    // set text shadow effect
                    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
                    
                    //Set some content to print
$data.='<p><span>Category:&nbsp;</span><span>'.$_POST["category"].'</span></p>';
$data.='<p><span>Title:&nbsp;</span><span>'.$_POST["title"].'</span></p>';
$data.='<p><span>fname:&nbsp;</span><span>'.$_POST["fname"].'</span></p>';
$data.='<p><span>mname:&nbsp;</span><span>'.$_POST["mname"].'</span></p>';
$data.='<p><span>lname:&nbsp;</span><span>'.$_POST["lname"].'</span></p>';
$data.='<p><span>religion:&nbsp;</span><span>'.$_POST["religion"].'</span></p>';
$data.='<p><span>sex:&nbsp;</span><span>'.$_POST["sex"].'</span></p>';
$data.='<p><span>Dob:&nbsp;</span><span>'.$_POST["Dob"].'</span></p>';
$data.='<p><span>Cob:&nbsp;</span><span>'.$_POST["Cob"].'</span></p>';
$data.='<p><span>MaritalStatus:&nbsp;</span><span>'.$_POST["MaritalStatus"].'</span></p>';
$data.='<p><span>SOO:&nbsp;</span><span>'.$_POST["SOO"].'</span></p>';
$data.='<p><span>LGA:&nbsp;</span><span>'.$_POST["LGA"].'</span></p>';
$data.='<p><span>MothersMaidenName:&nbsp;</span><span>'.$_POST["MothersMaidenName"].'</span></p>';
$data.='<p><span>ResidentialAddress:&nbsp;</span><span>'.$_POST["ResidentialAddress"].'</span></p>';
$data.='<p><span>MailingAddress:&nbsp;</span><span>'.$_POST["MailingAddress"].'</span></p>';
$data.='<p><span>DateofEntry:&nbsp;</span><span>'.$_POST["DateofEntry"].'</span></p>';
$data.='<p><span>COR:&nbsp;</span><span>'.$_POST["COR"].'</span></p>';
$data.='<p><span>Nationality:&nbsp;</span><span>'.$_POST["Nationality"].'</span></p>';
$data.='<p><span>ResidentIndicator:&nbsp;</span><span>'.$_POST["ResidentIndicator"].'</span></p>';
$data.='<p><span>Non-Resident:&nbsp;</span><span>'.$_POST["Non-Resident"].'</span></p>';
$data.='<p><span>otherpassport:&nbsp;</span><span>'.$_POST["otherpassport"].'</span></p>';
$data.='<p><span>statecountry":&nbsp;</span><span>'.$_POST["statecountry"].'</span></p>';
$data.='<p><span>MobilePhone:&nbsp;</span><span>'.$_POST["MobilePhone"].'</span></p>';
$data.='<p><span>Landline:&nbsp;</span><span>'.$_POST["Landline"].'</span></p>';
$data.='<p><span>PersonnalEmailAddress:&nbsp;</span><span>'.$_POST["PersonnalEmailAddress"].'</span></p>';
$data.='<p><span>idtype:&nbsp;</span><span>'.$_POST["idtype"].'</span></p>';
$data.='<p><span>idNo:&nbsp;</span><span>'.$_POST["idNo"].'</span></p>';
$data.='<p><span>IssueDate:&nbsp;</span><span>'.$_POST["IssueDate"].'</span></p>';
$data.='<p><span>expiryDate:&nbsp;</span><span>'.$_POST["expiryDate"].'</span></p>';
$data.='<p><span>place&countryofissue:&nbsp;</span><span>'.$_POST["place&countryofissue"].'</span></p>';
$data.='<p><span>NameofAccount:&nbsp;</span><span>'.$_POST["NameofAccount"].'</span></p>';
$data.='<p><span>RelationshipwithAccountHolder:&nbsp;</span><span>'.$_POST["RelationshipwithAccountHolder"].'</span></p>';
$data.='<p><span>jointaccountholdername:&nbsp;</span><span>'.$_POST["jointaccountholdername"].'</span></p>';
$data.='<p><span>jointaccountholderDob:&nbsp;</span><span>'.$_POST["jointaccountholderDob"].'</span></p>';
$data.='<p><span>Cob:&nbsp;</span><span>'.$_POST["Cob"].'</span></p>';
$data.='<p><span>jointaccountholderaddress:&nbsp;</span><span>'.$_POST["jointaccountholderaddress"].'</span></p>';
$data.='<p><span>jointaccountholdermaritalstatus:&nbsp;</span><span>'.$_POST["jointaccountholdermaritalstatus"].'</span></p>';
$data.='<p><span>COR:&nbsp;</span><span>'.$_POST["COR"].'</span></p>';
$data.='<p><span>Nationality:&nbsp;</span><span>'.$_POST["Nationality"].'</span></p>';
$data.='<p><span>ResidentIndicator:&nbsp;</span><span>'.$_POST["ResidentIndicator"].'</span></p>';
$data.='<p><span>otherpassport:&nbsp;</span><span>'.$_POST["otherpassport"].'</span></p>';
$data.='<p><span>statecountry:&nbsp;</span><span>'.$_POST["statecountry"].'</span></p>';
$data.='<p><span>MobilePhone:&nbsp;</span><span>'.$_POST["MobilePhone"].'</span></p>';
$data.='<p><span>Landline:&nbsp;</span><span>'.$_POST["Landline"].'</span></p>';
$data.='<p><span>PersonnalEmailAddress:&nbsp;</span><span>'.$_POST["PersonnalEmailAddress"].'</span></p>';
$data.='<p><span>idtype:&nbsp;</span><span>'.$_POST["idtype"].'</span></p>';
$data.='<p><span>idNo:&nbsp;</span><span>'.$_POST["idNo"].'</span></p>';
$data.='<p><span>issueDate:&nbsp;</span><span>'.$_POST["issueDate"].'</span></p>';
$data.='<p><span>expiryDate:&nbsp;</span><span>'.$_POST["expiryDate"].'</span></p>';
$data.='<p><span>place&countryofissue:&nbsp;</span><span>'.$_POST["place&countryofissue"].'</span></p>';
$data.='<p><span>NameofAccount:&nbsp;</span><span>'.$_POST["NameofAccount"].'</span></p>';
$data.='<p><span>RelationshipwithAccountHolder:&nbsp;</span><span>'.$_POST["RelationshipwithAccountHolder"].'</span></p>';
$data.='<p><span>jointaccountholdername:&nbsp;</span><span>'.$_POST["jointaccountholdername"].'</span></p>';
$data.='<p><span>jointaccountholderDob":&nbsp;</span><span>'.$_POST["jointaccountholderDob"].'</span></p>';
$data.='<p><span>Place/CountryofBirth:&nbsp;</span><span>'.$_POST["Place/CountryofBirth"].'</span></p>';
$data.='<p><span>ResidentialAddress:&nbsp;</span><span>'.$_POST["ResidentialAddress"].'</span></p>';
$data.='<p><span>jointaccountholderaddress:&nbsp;</span><span>'.$_POST["jointaccountholderaddress"].'</span></p>';
$data.='<p><span>jointaccountholdermaritalstatus:&nbsp;</span><span>'.$_POST["jointaccountholdermaritalstatus"].'</span></p>';
$data.='<p><span>countryofresidence:&nbsp;</span><span>'.$_POST["countryofresidence"].'</span></p>';
$data.='<p><span>NationalityCOR:&nbsp;</span><span>'.$_POST["NationalityCOR"].'</span></p>';
$data.='<p><span>mobilephoneCOR:&nbsp;</span><span>'.$_POST["mobilephoneCOR"].'</span></p>';
$data.='<p><span>LandlineCOR:&nbsp;</span><span>'.$_POST["LandlineCOR"].'</span></p>';
$data.='<p><span>PersonnalEmailAddress:&nbsp;</span><span>'.$_POST["PersonnalEmailAddress"].'</span></p>';
$data.='<p><span>idType:&nbsp;</span><span>'.$_POST["idType"].'</span></p>';
$data.='<p><span>IDNoCOR":&nbsp;</span><span>'.$_POST["IDNoCOR"].'</span></p>';
$data.='<p><span>IssueDateCOR:&nbsp;</span><span>'.$_POST["IssueDateCOR"].'</span></p>';
$data.='<p><span>ExpiryDate:&nbsp;</span><span>'.$_POST["ExpiryDate"].'</span></p>';
$data.='<p><span>place&countryofissueCOR:&nbsp;</span><span>'.$_POST["place&countryofissueCOR"].'</span></p>';
$data.='<p><span>BankName:&nbsp;</span><span>'.$_POST["BankName"].'</span></p>';
$data.='<p><span>Branch:&nbsp;</span><span>'.$_POST["Branch"].'</span></p>';
$data.='<p><span>accountname:&nbsp;</span><span>'.$_POST["accountname"].'</span></p>';
$data.='<p><span>accountnumber:&nbsp;</span><span>'.$_POST["accountnumber"].'</span></p>';
$data.='<p><span>dateopened:&nbsp;</span><span>'.$_POST["dateopened"].'</span></p>';
$data.='<p><span>bankverificationnumber:&nbsp;</span><span>'.$_POST["bankverificationnumber"].'</span></p>';
$data.='<p><span>levelofqualification:&nbsp;</span><span>'.$_POST["levelofqualification"].'</span></p>';
$data.='<p><span>EmploymentDetails:&nbsp;</span><span>'.$_POST["EmploymentDetails"].'</span></p>';
$data.='<p><span>Occupation/Employment:&nbsp;</span><span>'.$_POST["Occupation/Employment"].'</span></p>';
$data.='<p><span>Appointmentdate:&nbsp;</span><span>'.$_POST["Appointmentdate"].'</span></p>';
$data.='<p><span>CompanyName:&nbsp;</span><span>'.$_POST["CompanyName"].'</span></p>';
$data.='<p><span>CompanyAddress:&nbsp;</span><span>'.$_POST["CompanyAddress"].'</span></p>';
$data.='<p><span>Officialtelephonenumber:&nbsp;</span><span>'.$_POST["Officialtelephonenumber"].'</span></p>';
$data.='<p><span>Fax:&nbsp;</span><span>'.$_POST["Fax"].'</span></p>';
$data.='<p><span>faxoficialemail:&nbsp;</span><span>'.$_POST["faxoficilemail"].'</span></p>';
$data.='<p><span>faxofficialwebsite:&nbsp;</span><span>'.$_POST["faxofficialwebsite"].'</span></p>';
$data.='<p><span>annualaverageincome:&nbsp;</span><span>'.$_POST["annualaverageincome"].'</span></p>';
$data.='<p><span>sourceofinvestment:&nbsp;</span><span>'.$_POST["sourceofinvestment"].'</span></p>';
$data.='<p><span>NOKtitle:&nbsp;</span><span>'.$_POST["NOKtitle"].'</span></p>';
$data.='<p><span>NOKfirstname:&nbsp;</span><span>'.$_POST["NOKfirstname"].'</span></p>';
$data.='<p><span>NOKmiddlename:&nbsp;</span><span>'.$_POST["NOKmiddlename"].'</span></p>';
$data.='<p><span>NOKlastname:&nbsp;</span><span>'.$_POST["NOKlastname"].'</span></p>';
$data.='<p><span>NOKnationality/span><span>'.$_POST["NOKnationality"].'</span></p>';
$data.='<p><span>NOKgender":&nbsp;</span><span>'.$_POST["NOKgender"].'</span></p>';
$data.='<p><span>NOKdob:&nbsp;</span><span>'.$_POST["NOKdob"].'</span></p>';
$data.='<p><span>NOKmaritalstatus:&nbsp;</span><span>'.$_POST["NOKmaritalstatus"].'</span></p>';
$data.='<p><span>NOKrelationship:&nbsp;</span><span>'.$_POST["NOKrelationship"].'</span></p>';
$data.='<p><span>NOKemail:&nbsp;</span><span>'.$_POST["NOKemail"].'</span></p>';
$data.='<p><span>NOKphoneNumber:&nbsp;</span><span>'.$_POST["NOKphoneNumber"].'</span></p>';
$data.='<p><span>NOKaddress:&nbsp;</span><span>'.$_POST["NOKaddress"].'</span></p>';
$data.='<p><span>minordetailsName:&nbsp;</span><span>'.$_POST["minordetailsName"].'</span></p>';
$data.='<p><span>minordetailsNameDOB:&nbsp;</span><span>'.$_POST["minordetailsNameDOB"].'</span></p>';
$data.='<p><span>minordetailsgender:&nbsp;</span><span>'.$_POST["minordetailsgender"].'</span></p>';
$data.='<p><span>politicalposition:&nbsp;</span><span>'.$_POST["politicalposition"].'</span></p>';
$data.='<p><span>staterecentposition:&nbsp;</span><span>'.$_POST["staterecentposition"].'</span></p>';
$data.='<p><span>Datefromposition:&nbsp;</span><span>'.$_POST["Datefromposition"].'</span></p>';
$data.='<p><span>Dtoposition:&nbsp;</span><span>'.$_POST["Dtoposition"].'</span></p>';
$data.='<p><span>Category:&nbsp;</span><span>'.$_POST["category"].'</span></p>';
$data.='<p><span>politicalposition:&nbsp;</span><span>'.$_POST["politicalposition"].'</span></p>';
$data.='<p><span>nameposition:&nbsp;</span><span>'.$_POST["nameposition"].'</span></p>';
$data.='<p><span>positionheld":&nbsp;</span><span>'.$_POST["positionheld"].'</span></p>';
$data.='<p><span>Dfrom:&nbsp;</span><span>'.$_POST["Dfrom"].'</span></p>';
$data.='<p><span>Dto:&nbsp;</span><span>'.$_POST["Dto"].'</span></p>';
$data.='<p><span>nameposition2:&nbsp;</span><span>'.$_POST["nameposition2"].'</span></p>';
$data.='<p><span>Datefrom:&nbsp;</span><span>'.$_POST["Datefrom"].'</span></p>';
$data.='<p><span>Dateto:&nbsp;</span><span>'.$_POST["Dateto"].'</span></p>';

//var_dump($_FILES);
$errors= array();
$fileuploaderror=false;
$uploaded_filenames=array();
$expensions= array("jpeg","jpg","png","pdf");

function fileuploaderrormsgs($errorcode){
switch ($errorcode){
  case '4':
  return "file is not uploaded";
  break;
}       

}
if($_FILES['signature'] && $_FILES['signature']['error']==0){
  
  $file_name = $_FILES['signature']['name'];
  $file_size = $_FILES['signature']['size'];
  $file_tmp = $_FILES['signature']['tmp_name'];
  $file_type = $_FILES['signature']['type'];
  $file_ext=strtolower(end(explode('.',$_FILES['signature']['name'])));
  
  
  if(in_array($file_ext,$expensions)=== false){
     $errors[]="extension not allowed, please choose a PDF, JPEG or PNG file.";
  }
  
  if($file_size > 2097152) {
     $errors[]='File size must be excately 2 MB';
  }

  
  if(empty($errors)==true) {
     move_uploaded_file($file_tmp,__DIR__.'/'.$file_name); //The folder where you would like your file to be saved
     $uploaded_filenames[]=$file_name;
  }else{
     print_r($errors);
  }
}
else{
  $fileuploaderror=true;
  $errors[]=fileuploaderrormsgs($_FILES['signature']['error']);
}

if($_FILES['PassportPhotograph'] && $_FILES['PassportPhotograph']['error']==0){
  $errors= array();
  $file_name = $_FILES['PassportPhotograph']['name'];
  $file_size = $_FILES['PassportPhotograph']['size'];
  $file_tmp = $_FILES['PassportPhotograph']['tmp_name'];
  $file_type = $_FILES['PassportPhotograph']['type'];
  $file_ext=strtolower(end(explode('.',$_FILES['PassportPhotograph']['name'])));
    
  if(in_array($file_ext,$expensions)=== false){
     $errors[]="extension not allowed, please choose a PDF, JPEG or PNG file.";
  }
  
  if($file_size > 2097152) {
     $errors[]='File size must be exactly 2MB';
  }

  
  if(empty($errors)==true) {
     move_uploaded_file($file_tmp,__DIR__.'/'.$file_name); //The folder where you would like your file to be saved
     $uploaded_filenames[]=$file_name;
  }else{
     print_r($errors);
     $errors[]=fileuploaderrormsgs($_FILES['PassportPhotograph']['error']);
  }
}

else{
  $fileuploaderror=true;
}

if($_FILES['bill']&& $_FILES['bill']['error']==0){
  $errors= array();
  $file_name = $_FILES['bill']['name'];
  $file_size = $_FILES['bill']['size'];
  $file_tmp = $_FILES['bill']['tmp_name'];
  $file_type = $_FILES['bill']['type'];
  $file_ext=strtolower(end(explode('.',$_FILES['bill']['name'])));
    
  if(in_array($file_ext,$expensions)=== false){
     $errors[]="extension not allowed, please choose a PDF, JPEG or PNG file.";
  }
  
  if($file_size > 2097152) {
     $errors[]='File size must be excately 2 MB';
  }

  
  if(empty($errors)==true) {
     move_uploaded_file($file_tmp,__DIR__.'/'.$file_name); //The folder where you would like your file to be saved
     $uploaded_filenames[]=$file_name;
  }else{
     print_r($errors);
  }
}

else{
  $fileuploaderror=true;
  $errors[]=fileuploaderrormsgs($_FILES['bill']['error']);
}

if($_FILES['meansofId']&& $_FILES['meansofId']['error']==0){
  $errors= array();
  $file_name = $_FILES['meansofId']['name'];
  $file_size = $_FILES['meansofId']['size'];
  $file_tmp = $_FILES['meansofId']['tmp_name'];
  $file_type = $_FILES['meansofId']['type'];
  $file_ext=strtolower(end(explode('.',$_FILES['meansofId']['name'])));
    
  if(in_array($file_ext,$expensions)=== false){
     $errors[]="extension not allowed, please choose a PDF, JPEG or PNG file.";
  }
  
  if($file_size > 2097152) {
     $errors[]='File size must be excately 2 MB';
  }
  if(empty($errors)==true) {
     move_uploaded_file($file_tmp,__DIR__.'/'.$file_name); //The folder where you would like your file to be saved
     $uploaded_filenames[]=$file_name;
  }else{
     print_r($errors);
  }
}

else{
  $fileuploaderror=true;
  $errors[]=fileuploaderrormsgs($_FILES['meansofId']['error']);
}
if(count($errors)<=0){




  

//                     $html = <<<EOD
// <h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
// <i>This is the first example of TCPDF library.</i>
// <p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
// <p>Please check the source code documentation and other examples for further information.</p>
// <p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>

// EOD;
// Print text using writeHTMLCell()
//$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->writeHTML($data,true, 0);

// ---------------------------------------------------------
 
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
                $pdfoutput=$pdf->Output(__DIR__.'\individualform.pdf', 'F');
                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                
                    $n=0;
                    foreach($_POST as $field => $value) {
                        $n++;
                        $sheet->setCellValue('A'.$n, $field);
                        $sheet->setCellValue('B'.$n, $value);
                    }
                    $filename = 'sample-'.time().'.xlsx';
                    // Redirect output to a client's web browser (Xlsx)
                    // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    // header('Content-Disposition: attachment;filename="'.$filename.'"');
                    // header('Cache-Control: max-age=0');
                    ob_start();
                    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                    $writer->save('php://output');
                    $data = ob_get_contents();
                    $xlsdata = "data:application/vnd.ms-excel;base64,".base64_encode($data);
                    $filer = substr($xlsdata, strpos($xlsdata,","));
                    ob_end_clean();
                
                //print_r($pdfoutput); exit;
                    $mail= new PHPMailer(true);
                    try {
                  //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
                  $mail->isSMTP();                                      // Set mailer to use SMTP
                  $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                  $mail->SMTPAuth = true;                               // Enable SMTP authentication
                  $mail->Username = 'issarukayat4@gmail.com';                 // SMTP username
                  $mail->Password = 'oluwarukayat';                           // SMTP password
                  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                  $mail->Port = 587;                                    // TCP port to connect to
                  //Recipients
                  $mail->setFrom('issarukayat4@gmail.com', 'Registration Form');
                  $mail->addAddress('info@tyndale-securities.com', 'Tyndale Securities');     // Add a recipient
                  
                  // $mail->addAddress('ellen@example.com');               // Name is optional
                    // $mail->addReplyTo('info@example.com', 'Information');
                  $mail->addCC('compliance@tyndale-securities.com');
                    // $mail->addBCC('bcc@example.com');
                
                    //Attachments
                    //$mail->addStringAttachment($pdfoutput,'registrationForm.pdf');
                    $encoding = "base64";
                    $type = "application/vnd.ms-excel";
                     $mail->addAttachment(__DIR__.'\individualform.pdf');
                     $mail->addStringAttachment(base64_decode($filer), 'registration_Form.xlsx',$encoding,$type);
                     if(!empty($uploaded_filenames)){
                     foreach ($uploaded_filenames as $filename) {
                      $mail->addAttachment(__DIR__.'/'.$filename);  
                     }
                    }
                     // Add attachments
                   
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                
                    //Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Individual Account Registration Form for '.$_POST['fname'].' '.$_POST['mname'].' '.$_POST['lname'];
                    $mail->Body    = 'APPLICATION FOR  '  .$_POST['category'].' Account';
                    $mail->AltBody = '';

                    set_time_limit(0);

                    if($mail->send()){
                      echo '<h2 style="color:#0B4A2F";><strong>form submitted, you will be contacted shortly!<strong></h2>';
                      unlink(__DIR__.'\individualform.pdf');
                      if(!empty($uploaded_filenames)){
                        foreach ($uploaded_filenames as $filename) {
                          unlink(__DIR__.'/'.$filename);  
                        }
                       }
                       //header('Location: individualAccount.php?success=ok');
                       
                    }else{
                      echo 'Message not sent';
                    }
                  } catch (Exception $e) {
                    
                    $_POST['error'] = 'Message could not be sent. Mailer Error: ';
                    //echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                  }
                  }
        
                }
                ?>
                <?php if(count($errors)>0)) { 

                  
                  echo "Message could not be sent. Mailer Error";
                
                
            }?>

                <?php if(isset($_POST['error'])) { echo "Message could not be sent. Mailer Error";}else{ echo "";} ?>
                
            <form id="regForm" method="POST" action="" enctype="multipart/form-data"  novalidate>
            <!-- One "tab" for each step in the form: -->
          
              <h3 id="IRF"><u> Individual Registeration Form </u></h3>
              <h2>Personal Details</h2>
              <div class="tab form-group">
              <label for="category"class="important">Category</label>
              <select name="category" id="Category" class="form-control inp">
              <option value=""<?php if($_POST['category']=='') echo 'selected="selected"';?>>Select</option>
              <option value="Individual"<?php if($_POST['category']=='Individual') echo 'selected="selected"';?>>Individual</option>
              <option value="Joint"<?php if($_POST['category']=='Joint') echo 'selected="selected"';?>>Joint</option>
              </select>
                      <label for="name">Title</label>
                     <select name="title" require id="title" class="form-control inp">
                    <option value=""<?php if($_POST['title']=='') echo 'selected="selected"';?>>Select </option>
                     <option value="Mr" <?php if($_POST['title']=='Mr') echo 'selected="selected"';?>>Mr</option>
                     <option value="Mrs"<?php if($_POST['title']=='Mrs') echo 'selected="selected"';?>>Mrs</option>
                     <option value="Miss"<?php if($_POST['title']=='Miss') echo 'selected="selected"';?>>Miss.</option>
                     <option value="Dr"<?php if($_POST['title']=='Dr') echo 'selected="selected"';?>>Dr.</option>
                     <option value="Engr"<?php if($_POST['title']=='Engr') echo 'selected="selected"';?>>Engr.</option>
                     <option value="Prof"<?php if($_POST['title']=='Prof') echo 'selected="selected"';?>>Prof.</option>
							     	<option  value="Chief"<?php if($_POST['title']=='Chief') echo 'selected="selected"';?>>Chief</option>
                </select>
                <label for="name">First Name</label>
              <input  name="fname" require id="fname" class="form-control inp" value="<?php echo $_POST["fname"]?>">
              <label for="name">Middle Name</label>
              <input  name="mname" id="mname" class="form-control inp" value="<?php echo $_POST["mname"]?>"required>
              <label for="name">Last Name</label>
              <input name="lname" id="lname" class="form-control inp"value="<?php echo $_POST["lname"]?>">
              <label for="Religion">Religion</label>
              <input  name="religion" id="fname" class="form-control inp" value="<?php echo $_POST["religion"]?>">
              <label for="Gender">Gender</label>
              <select name="sex" id="sex" class="form-control inp">
              <option value=""<?php if($_POST['sex']=='') echo 'selected="selected"';?>>Select</option>
              <option value="Female"<?php if($_POST['sex']=='Female') echo 'selected="selected"';?>>Female </option>
              <option value="Male"<?php if($_POST['sex']=='Male') echo 'selected="selected"';?>> Male</option>
                          </select>
              <label for="Dob"> Date of Birth</label>
              <input name="Dob" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php  echo $_POST["Dob"]?>">    
              <label for="Place/countryofbirth"> Place/Country of Birth</label>
              <input name="Cob" type="text" class="form-control inp"value="<?php echo $_POST["Cob"]?>">    
              <label for="name">Marital Status</label>
              <select name="MaritalStatus" id="Marital-status" class="form-control inp">
              <option value=""<?php if($_POST['MaritalStatus']=='') echo 'selected="selected"';?>>Select </option>
              <option value="Single"<?php if($_POST['MaritalStatus']=='Single') echo 'selected="selected"';?>>Single </option>
              <option value="Married"<?php if($_POST['MaritalStatus']=='Married') echo 'selected="selected"';?>> Married</option>
              <option value="Divorced"<?php if($_POST['MaritalStatus']=='Divorced') echo 'selected="selected"';?>> Divorced</option>
              <option value="Widow"<?php if($_POST['MaritalStatus']=='Window') echo 'selected="selected"';?>> Widow</option>
                          </select>
                <label for="SoO">State Of Origin</label>
                <select name="SOO" id="SOO" class="form-control inp">
								<option value=""<?php if($_POST['SOO']=='') echo 'selected="selected"';?>>Select</option>
								<option value="Abia"<?php if($_POST['SOO']=='Abia') echo 'selected="selected"';?>>Abia</option>
								<option value="Adamawa"<?php if($_POST['SOO']=='Adamawa') echo 'selected="selected"';?>>Adamawa</option>
								<option value="Anambra"<?php if($_POST['SOO']=='Anambra') echo 'selected="selected"';?>>Anambra</option>
								<option value="Akwa Ibom"<?php if($_POST['SOO']=='Akwa Ibom') echo 'selected="selected"';?>>Akwa Ibom</option>
								<option value="Bauchi"<?php if($_POST['SOO']=='Bauchi') echo 'selected="selected"';?>>Bauchi</option>
								<option value="Bayelsa"<?php if($_POST['SOO']=='Bayelsa') echo 'selected="selected"';?>>Bayelsa</option>
								<option value="Benue"<?php if($_POST['SOO']=='Benue') echo 'selected="selected"';?>>Benue</option>
								<option value="Borno"<?php if($_POST['SOO']=='Borno') echo 'selected="selected"';?>>Borno</option>
								<option value="Cross River"<?php if($_POST['SOO']=='Cross River') echo 'selected="selected"';?>>Cross River</option>
								<option value="Delta"<?php if($_POST['SOO']=='Delta') echo 'selected="selected"';?>>Delta</option>
								<option value="Ebonyi"<?php if($_POST['SOO']=='Ebonyi') echo 'selected="selected"';?>>Ebonyi</option>
								<option value="Enugu"<?php if($_POST['SOO']=='Enugu') echo 'selected="selected"';?>>Enugu</option>
								<option value="Edo"<?php if($_POST['SOO']=='Edo') echo 'selected="selected"';?>>Edo</option>
								<option value="Ekiti"<?php if($_POST['SOO']=='Ekiti') echo 'selected="selected"';?>>Ekiti</option>
								<option value="Gombe"<?php if($_POST['SOO']=='Gombe') echo 'selected="selected"';?>>Gombe</option>
								<option value="Imo"<?php if($_POST['SOO']=='Imo') echo 'selected="selected"';?>>Imo</option>
								<option value="Jigawa"<?php if($_POST['SOO']=='Jigawa') echo 'selected="selected"';?>>Jigawa</option>
								<option value="Kaduna"<?php if($_POST['SOO']=='Kaduna') echo 'selected="selected"';?>>Kaduna</option>
								<option value="Kano"<?php if($_POST['SOO']=='Kano') echo 'selected="selected"';?>>Kano</option>
								<option value="Katsina"<?php if($_POST['SOO']=='Katsina') echo 'selected="selected"';?>>Katsina</option>
								<option value="Kebbi"<?php if($_POST['SOO']=='Kebbi') echo 'selected="selected"';?>>Kebbi</option>
								<option value="Kogi"<?php if($_POST['SOO']=='Kogi') echo 'selected="selected"';?>>Kogi</option>
								<option value="Kwara"<?php if($_POST['SOO']=='Kwara') echo 'selected="selected"';?>>Kwara</option>
								<option value="Lagos"<?php if($_POST['SOO']=='Lagos') echo 'selected="selected"';?>>Lagos</option>
								<option value="Nasarawa"<?php if($_POST['SOO']=='Nasarawa') echo 'selected="selected"';?>>Nasarawa</option>
								<option value="Niger"<?php if($_POST['SOO']=='Niger') echo 'selected="selected"';?>>Niger</option>
								<option value="Ogun"<?php if($_POST['SOO']=='Ogun') echo 'selected="selected"';?>>Ogun</option>
								<option value="Ondo"<?php if($_POST['SOO']=='Ondo') echo 'selected="selected"';?>>Ondo</option>
								<option value="Osun"<?php if($_POST['SOO']=='Osun') echo 'selected="selected"';?>>Osun</option>
								<option value="Oyo"<?php if($_POST['SOO']=='Oyo') echo 'selected="selected"';?>>Oyo</option>
								<option value="Plateau"<?php if($_POST['SOO']=='Plateau') echo 'selected="selected"';?>>Plateau</option>
								<option value="Rivers"<?php if($_POST['SOO']=='Rivers') echo 'selected="selected"';?>>Rivers</option>
								<option value="Sokoto"<?php if($_POST['SOO']=='Sokoto') echo 'selected="selected"';?>>Sokoto</option>
								<option value="Taraba"<?php if($_POST['SOO']=='Taraba') echo 'selected="selected"';?>>Taraba</option>
								<option value="Yobe"<?php if($_POST['SOO']=='Yobe') echo 'selected="selected"';?>>Yobe</option>
								<option value="Zamfara"<?php if($_POST['SOO']=='Zamfara') echo 'selected="selected"';?>>Zamfara</option>
								<option value="Territory"<?php if($_POST['SOO']=='Territory') echo 'selected="selected"';?>>Territory</option>
								<option value="Federal Capital Territory"<?php if($_POST['SOO']=='Federal Capital Territory') echo 'selected="selected"';?>>Federal Capital Territory</option>
              </select>
              <label for="LGA">LGA</label>
              <input name="LGA" type="text" class="form-control inp" value="<?php echo $_POST["LGA"]?>">
              <label for="MothersMaidenName">Mothers Maiden Name</label>
			    <input name="MotherMaidenName" type="text" class="form-control inp" value="<?php echo $_POST["MotherMaidenName"]?>">
          <label for="ResidentialAddress">Residential Address</label>
			    <textarea name="ResidentialAddress"cols="5" rows="5" class="form-control Inp" value="<?php echo $_POST["ResidentialAddress"]?>"> </textarea>
          <label for="MailingAddress">Mailing Address</label>
			   <textarea name="MailingAddress"cols="5" rows="5" class="form-control Inp" value="<?php echo $_POST["MailingAddress"]?>"> </textarea>
          <label for="DateofEntry"> Date of Entry into Present Residence</label>
              <input name="DateofEntry" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST["DateofEntry"]?>">
              <label for="COR">Country of Residence</label>
              <input name="COR" type="text" class="form-control inp" value="<?php echo $_POST["COR"]?>"> 
              <label for="Nationality">Nationality</label>
              <input name="Nationality" type="text" class="form-control inp" value="<?php echo $_POST["Nationality"]?>"> 
              <label for="ResidentIndicator">Resident Indicator</label>
              <select name="ResidentIndicator" require id="ResidentIndicator" class="form-control inp">
              <option value="Resident">Resident</option>
              <option value="Non-Resident">Non-Resident</option>
              </select>
              <label for="otherpassport">Do you carry other country's Passport other than Nigeria</label>
              <select name="otherpassport" require id="ResidentIndicator" class="form-control inp">
              <option value="">Select </option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
              </select>
              <label for="state country">If yes, state country</label>
              <input name="statecountry" type="text" class="form-control inp" value="<?php echo $_POST["statecountry"]?>">
              <label for="MobilePhone"class="important">Mobile Phone</label>
              <input name="MobilePhone" type="text" class="form-control inp" value="<?php echo $_POST["MobilePhone"]?>">
              <label for="Landline">Land Line Phone</label>
              <input name="Landline" type="text" class="form-control inp" value="<?php echo $_POST["Landline"]?>">
              <label for="PersonnalEmailAddress">Personnal Email Address</label>
              <input name="PersonnalEmailAddress" type="text" class="form-control inp" value="<?php echo $_POST["PersonnalEmailAddress"]?>">
              <label for="idType">ID TYPE</label>
                     <select name="idtype" require id="idtype" class="form-control inp">
                    <option value=""<?php if($_POST['idtype']=='') echo 'selected="selected"';?>>Select </option>
                     <option value="International Passport"<?php if($_POST['idtype']=='International Passport') echo 'selected="selected"';?>>International Passport</option>
                     <option value="Drivers Licence"<?php if($_POST['idtype']=='Drivers Licence') echo 'selected="selected"';?>>Drivers Licence</option>
                     <option value="PVC"<?php if($_POST['idtype']=='PVC') echo 'selected="selected"';?>>PVC</option>
                     <option value="National IdCard"<?php if($_POST['idtype']=='National IdCard') echo 'selected="selected"';?>>National Id Card</option>
                </select>
                <label for="ID No">ID No</label>
              <input name="idNo" type="text" class="form-control inp" value="<?php echo $_POST["idNo"]?>">
              <label for="IssueDate">Issue Date</label>
              <input name="issueDate" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST["issueDate"]?>">
              <label for="Expiry Date">Expiry Date</label>
              <input name="expiryDate" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST["expiryDate"]?>">
              <label for="place&countryofissue">Place and Country of Issue</label>
              <input name="place&countryofissue" type="text" class="form-control inp" value="<?php echo $_POST["place&countryofissue"]?>"><br>
              <h4 id="JAHD">Joint Account Holder Details</h4>      
                <label for="NameofAccount">Name of Account</label>
              <input  name="NameofAccount" require id="fname" class="form-control inp" value="<?php echo $_POST["NameofAccount"]?>">
              <label for="RelationshipwithAccountHolder">Relationship with Account Holder</label>
              <input  name="RelationshipwithAccountHolder" id="fname" class="form-control inp" value="<?php echo $_POST["RelationshipwithAccountHolder"]?>"required>
              <label for="jointaccountholder">Name of Joint Account Holder</label>
              <input name="jointaccountholdername" id="lname" class="form-control inp" value="<?php echo $_POST["jointaccountholdername"]?>">
              <label for="name"> Date of Birth</label>
              <input   name="jointaccountholderDob" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST["jointaccountholderDob"]?>">    
              <label for="Place/CountryofBirth"> Place/Country of Birth</label>
              <input name="Place/CountryofBirth" type="text" class="form-control inp" value="<?php echo $_POST["Place/CountryofBirth"]?>">
              <label for="ResidentialAddress">Residential Address</label>
			        <textarea name="jointaccountholderaddress"cols="5" rows="5" class="form-control Inp" value="<?php echo $_POST["jointaccountholderaddress"]?>"></textarea>    
              <label for="MaritalStatus">Marital Status</label>
              <select name="jointaccountholdermaritalstatus" id="jointaccountholdermaritalstatus" class="form-control inp">
              <option value=""<?php if($_POST['jointaccountholdermaritalstatus']=='') echo 'selected="selected"';?>>Select </option>
              <option value="Single"<?php if($_POST['jointaccountholdermaritalstatus']=='Single') echo 'selected="selected"';?>>Single </option>
              <option value="Married"<?php if($_POST['jointaccountholdermaritalstatus']=='Married') echo 'selected="selected"';?>> Married</option>
              <option value="Divorced"<?php if($_POST['jointaccountholdermaritalstatus']=='Divorced') echo 'selected="selected"';?>> Divorced</option>
              <option value="Widow"<?php if($_POST['jointaccountholdermaritalstatus']=='Widow') echo 'selected="selected"';?>> Widow</option>
                          </select>
              <label for="CountryofResidence">Country of Residence</label>
              <input name="countryofresidence" type="text" class="form-control inp" value="<?php echo $_POST["countryofresidence"]?>"> 
              <label for="Nationality">Nationality</label>
              <input name="NationalityCOR" type="text" class="form-control inp" value="<?php echo $_POST["NationalityCOR"]?>"> 
              <label for="MobilePhoneCOR"class="important">Mobile Phone</label>
              <input name="MobilePhoneCOR" type="text" class="form-control inp" value="<?php echo $_POST["MobilePhoneCOR"]?>">
              <label for="LandlineCOR">Land Line Phone</label>
              <input name="LandlineCOR" type="text" class="form-control inp" value="<?php echo $_POST["LandlineCOR"]?>">
              <label for="PersonnalEmailAddress">Personnal Email Address</label>
              <input name="PersonnalEmailAddress" type="text" class="form-control inp" value="<?php  echo $_POST["PersonnalEmailAddress"]?>">
              <label for="idType">ID TYPE</label>
                     <select name="idType" id="idType" require class="form-control inp">
                    <option value=""<?php if($_POST['idType']=='') echo 'selected="selected"';?>>Select </option>
                     <option value="International Passport"<?php if($_POST['idType']=='International Passport') echo 'selected="selected"';?>>International Passport</option>
                     <option value="Drivers Licence"<?php if($_POST['idType']=='Drivers Licence') echo 'selected="selected"';?>>Drivers Licence</option>
                     <option value="PVC"<?php if($_POST['idType"']=='PVC') echo 'selected="selected"';?>>PVC</option>
                     <option value="National IdCard"<?php if($_POST['idType"']=='National IdCard') echo 'selected="selected"';?>>National Id Card</option>
                </select>
                <label for="IDNoCOR">ID No</label>
              <input name="IDNoCOR" type="text" class="form-control inp" value="<?php echo $_POST["IDNoCOR"]?>">
              <label for="IssueDateCOR">Issue Date</label>
              <input name="IssueDateCOR" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST["IssueDateCOR"]?>">
              <label for="Expiry DateCOR">Expiry Date</label>
              <input name="ExpiryDateCOR" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST["ExpiryDateCOR"]?>">
              <label for="place&countryofissueCOR">Place and Country of Issue</label>
              <input name="place&countryofissueCOR" type="text" class="form-control inp" value="<?php echo $_POST["place&countryofissueCOR"]?>"><br>
            </div>
            <div class="tab form-group">
            <h4 id="BD">Bank Details</h4>
            <label for="Bank Name" class="important"> Bank Name</label>
              <input   name="BankName" id="BankName" class="form-control inp" value="<?php echo $_POST["BankName"]?>">
              <label for="Branch" class="important">Branch</label>
              <input name="Branch" id="Branch" class="form-control inp" value="<?php echo $_POST["Branch"]?>">
              <label for="AccountName" class="important">Account Name</label>
              <input name="accountname" id="AccountName" class="form-control inp" value="<?php echo $_POST["accountname"]?>">
              <label for="AccountNumber" class="important">Account Number</label>
              <input name="accountnumber" id="AccountNumber" class="form-control inp" value="<?php echo $_POST["accountnumber"]?>">
              <label for="DateOpened" class="important">Date Opened</label>
              <input name="dateopened" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST["dateopened"]?>">
              <label for="BankVerificationNumber" class="important">Bank Verification Number </label>
              <input name="bankverificationnumber" id="BankVerificationNumber" class="form-control inp" value="<?php echo $_POST["bankverificationnumber"]?>">
            </div>
              <div class="tab form-group display">
            <h4 id="BD">Employment Details</h4>
            <label for="levelofqualification">Level of Qualification</label>
              <input name="levelofqualification" type="text" class="form-control inp" value="<?php echo $_POST["levelofqualification"]?>">
              <label for="name" class="important">Employment Details</label>
                     <select name="EmploymentDetails" id="EmploymentDetails"require id="title" class="form-control inp">
                    <option value=""<?php if($_POST['EmploymentDetails']=='') echo 'selected="selected"';?>>Select </option>
                     <option value="Full time"<?php if($_POST['EmploymentDetails']=='Full time') echo 'selected="selected"';?>>Full time</option>
                     <option value="Part time"<?php if($_POST['EmploymentDetails']=='Part time') echo 'selected="selected"';?>>Part time</option>
                     <option value="Retired"<?php if($_POST['EmploymentDetails']=='Retired') echo 'selected="selected"';?>>Retired</option>
                     <option value="Self Employed"<?php if($_POST['EmploymentDetails']=='Self Employed') echo 'selected="selected"';?>>Self Employed</option>
                     <option value="Others"<?php if($_POST['EmploymentDetails']=='Others') echo 'selected="selected"';?>>Others</option>
                </select>
              <label for="Occupation/Employment" >Occupation/Employment Segment</label>
              <input  name="Occupation/Employment" id="Occupation/EmploymentSegment" value="<?php echo $_POST["Occupation/Employment"]?>" class="form-control inp"required>
              <label for="Appointmentdate">Appointment Date</label>
              <input name="Appointmentdate" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST["Appointmentdate"]?>">
              <label for="Company Name">Company Name</label>
              <input  name="CompanyName" id="CompanyName" class="form-control inp" value="<?php echo $_POST["CompanyName"]?>"required>
              <label for="CompanyAddress" class="important">Company/Office Address</label>
			        <textarea name="CompanyAddress"cols="5" rows="5" class="form-control Inp" value="<?php echo $_POST["CompanyAddress"]?>"></textarea> 
              <label for="Officialtelephonenumber">Official Telephone Number</label>
              <input  name="Officialtelephonenumber" id="Officialtelephonenumber" class="form-control inp" value="<?php echo $_POST["Officialtelephonenumber"]?>"required>
              <label for="Fax">Fax</label>
              <input  name="Fax" id="" class="form-control inp" value="<?php echo $_POST["Fax"]?>"required>
              <label for="faxoficilemail">Official Email Address</label>
              <input  name="faxoficialemail" id="" class="form-control inp" value="<?php echo $_POST["faxoficialemail"]?>"required>
              <label for="faxofficialwebsite">Official Website Url</label>
              <input  name="faxofficialwebsite" id="" class="form-control inp" value="<?php echo $_POST["faxofficialwebsite"]?>"required>
              <label for="annualaverageincome" class="important">Annual Average Income</label>
              <select name="annualaverageincome" id="annualaverageincome" class="form-control inp">
              <option value="" <?php if($_POST['annualaverageincome']=='') echo 'selected="selected"';?>>Select </option>
              <option value="Less than ₦10m"<?php if($_POST['annualaverageincome']=='Less than ₦10m') echo 'selected="selected"';?>>Less than ₦10m</option>
              <option value="₦10-50m"<?php if($_POST['annualaverageincome']=='₦10-50m') echo 'selected="selected"';?>> ₦10-50m</option>
              <option value="₦50m and Above"<?php if($_POST['annualaverageincome']=='₦50m and Above') echo 'selected="selected"';?>>₦50m and Above</option>
                          </select>    
              <label for="sourceofinvestment">Source of Investment</label>
              <select name="sourceofinvestment" id="sourceofinvestment" class="form-control inp">
              <option value="" <?php if($_POST['sourceofinvestment']=='₦50m and Above') echo 'selected="selected"';?>>Select </option>
              <option value="Employment" <?php if($_POST['sourceofinvestment']=='Employment') echo 'selected="selected"';?>>Employment</option>
              <option value="Business" <?php if($_POST['sourceofinvestment']=='Business') echo 'selected="selected"';?>>Business</option>
              <option value="Others" <?php if($_POST['sourceofinvestment']=='Others') echo 'selected="selected"';?>>Others</option>
                          </select>
            </div>
            <div class="tab form-group display">
            <h4 id="BD">Next of Kin Details</h4>
            <label for="NOK" class="important">Title</label>
                     <select name="NOKtitle" require id="title" class="form-control inp">
                    <option value=""<?php if($_POST['title']=='') echo 'selected="selected"';?>>Select </option>
                     <option value="Mr"<?php if($_POST['title']=='Mr') echo 'selected="selected"';?> >Mr</option>
                     <option value="Mrs"<?php if($_POST['title']=='Mrs') echo 'selected="selected"';?>>Mrs</option>
                     <option value="Miss"<?php if($_POST['title']=='Miss') echo 'selected="selected"';?>>Miss.</option>
                     <option value="Dr" <?php if($_POST['title']=='Dr') echo 'selected="selected"';?>>Dr.</option>
                     <option value="Engr" <?php if($_POST['title']=='Engr') echo 'selected="selected"';?>>Engr.</option>
                     <option value="Prof"<?php if($_POST['title']=='Prof') echo 'selected="selected"';?>>Prof.</option>
							     	<option  value="Chief" <?php if($_POST['title']=='Chief') echo 'selected="selected"';?>>Chief</option>
                </select>
                <label for="NOKfirstname" class="important">First Name</label>
              <input  name="NOKfirstname" require id="fname" class="form-control inp" value="<?php echo $_POST["NOKfirstname"]?>">
              <label for="NOKmiddlename" >Middle Name</label>
              <input  name="NOKmiddlename" id="fname" class="form-control inp" value="<?php echo $_POST["NOKmiddlename"]?>"required>
              <label for="NOKlastname" class="important">Last Name</label>
              <input name="NOKlastname" id="lname" class="form-control inp" value="<?php echo $_POST["NOKlastname"]?>">
              <label for="NOKnationality" class="important">Nationality</label>
              <input  name="NOKnationality" id="fname" class="form-control inp" value="<?php echo $_POST["NOKnationality"]?>">
              <label for="NOKgender" class="important">Gender</label>
              <select name="NOKgender" id="sex" class="form-control inp">
              <option value="" <?php if($_POST['sex']=='') echo 'selected="selected"';?>>Select</option>
              <option value="Female" <?php if($_POST['sex']=='Female') echo 'selected="selected"';?>>Female </option>
              <option value="Male" <?php if($_POST['sex']=='Male') echo 'selected="selected"';?>> Male</option>
                          </select>
              <label for="NOKdob" class="important"> Date of Birth</label>
              <input  name="NOKdob" type="date" placeholder="02-dec-2018"class="form-control inp"value="<?php echo $_POST["NOKdob"]?>">
              <label for="NOKmaritalstatus" class="important">Marital Status</label>
              <select name="NOKmaritalstatus" id="Marital-status" class="form-control inp">
              <option value=""<?php if($_POST['Marital-status']=='') echo 'selected="selected"';?>>Select </option>
              <option value="Single" <?php if($_POST['Marital-status']=='Single') echo 'selected="selected"';?>>Single </option>
              <option value="Married" <?php if($_POST['Marital-status']=='Married') echo 'selected="selected"';?>> Married</option>
              <option value="Divorced" <?php if($_POST['Marital-status']=='Divorced') echo 'selected="selected"';?>> Divorced</option>
              <option value="Widow" <?php if($_POST['Marital-status']=='Widow') echo 'selected="selected"';?>> Widow</option>
                          </select>    
              <label for="NOKrelationship">Relationship</label>
              <select name="NOKrelationship" id="Relationship" class="form-control inp">
              <option value="" <?php if($_POST['Relationship']=='') echo 'selected="selected"';?>>Select </option>
              <option value="Single" <?php if($_POST['Relationship']=='Single') echo 'selected="selected"';?>>Parent </option>
              <option value="Married"<?php if($_POST['Relationship']=='Married') echo 'selected="selected"';?>> Child</option>
              <option value="Divorced"<?php if($_POST['Relationship']=='Divorced') echo 'selected="selected"';?>> Spouse</option>
              <option value="Others"<?php if($_POST['Relationship']=='Others') echo 'selected="selected"';?>>Others</option>
                          </select>
              <label for="NOKemail" class="important">Email</label>
              <input  name="NOKemail" require id="Email" class="form-control inp" value="<?php echo $_POST["NOKemail"]?>">
              <label for="NOKphoneNumber"class="important">Phone Number</label>
              <input  name="NOKphoneNumber" require id="PhoneNumber" class="form-control inp" value="<?php echo $_POST["NOKphoneNumber"]?>">        
              <label for="NOKaddress" class="important">Address</label>
			        <textarea name="NOKaddress"cols="5" rows="5" class="form-control Inp" value="<?php echo $_POST["NOKaddress"]?>"></textarea>  
            </div>
              <div class="tab form-group">
              <h5>Minors details</h5>
              <label for="Minordetails"class="important">Name</label>
              <input  name="minordetailsName" require id="fname" class="form-control inp"value="<?php echo $_POST["minordetailsName"]?>">
              <label for="minordetailsNameDOB"> Date of Birth</label>
              <input name="minordetailsNameDOB" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST["minordetailsNameDOB"]?>">
              <label for="Gender">Gender</label>
              <select name="minordetailsgender" id="sex2" class="form-control inp">
              <option value="" <?php if($_POST['sex2']=='') echo 'selected="selected"';?>>Select</option>
              <option value="Female" <?php if($_POST['sex2']=='Female') echo 'selected="selected"';?>>Female </option>
              <option value="Male" <?php if($_POST['sex2']=='Male') echo 'selected="selected"';?>> Male</option>
                          </select> <br/>
              <h5>Questionnaire</h5>
              <label for="position">Have you occupied any political position?</label>
              <select name="politicalposition" id="Relationship" class="form-control inp">
              <option value="" <?php if($_POST['Relationship']=='') echo 'selected="selected"';?>>Select </option>
              <option value="No" <?php if($_POST['Relationship']=='No') echo 'selected="selected"';?>>No </option>
              <option value="Yes" <?php if($_POST['Relationship']=='Yes') echo 'selected="selected"';?>> Yes</option>
                          </select>
              <label for="category"class="important">If yes, state the recent position occupied</label>
              <input  name="staterecentposition" require id="fname" class="form-control inp" value="<?php echo $_POST["staterecentposition"]?>">
              <label for="Datefromposition">Date from</label>
              <input name="Datefromposition" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST["Datefromposition"]?>">
              <label for="Dtoposition"> Date to</label>
              <input name="Dtoposition" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST["Dtoposition"]?>">
              <label for="politicalposition">Have any of your close relative/associate occupied a political position?</label>
              <select name="politicalposition" id="Relationship" class="form-control inp">
              <option value=""<?php if($_POST['Relationship2']=='') echo 'selected="selected"';?>>Select </option>
              <option value="No" <?php if($_POST['Relationship2']=='No') echo 'selected="selected"';?>>No </option>
              <option value="Yes"<?php if($_POST['Relationship2']=='Yes') echo 'selected="selected"';?>> Yes</option>
                          </select>
              <label for="Name"class="important">Name</label>
              <input  name="nameposition" require id="fname" class="form-control inp" value="<?php echo $_POST["nameposition"]?>">
              <label for="category"class="important">Position Held</label>
              <input  name="positionheld" require id="fname" class="form-control inp" value="<?php echo $_POST["positionheld"]?>">
              <label for="date">Date from</label>
              <input name="Dfrom" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST["Dfrom"]?>">
              <label for=" Date to"> Date to</label>
              <input name="Dto" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST["Dto"]?>">
              <label for="Name"class="important">Name</label>
              <input  name="Name" require id="fname" class="form-control inp" value="<?php echo $_POST["Name"]?>">
              <label for="category"class="important">Position Held</label>
              <input  name="nameposition2" require id="fname" class="form-control inp" value="<?php echo $_POST["nameposition2"]?>">
              <label for="Date from">Date from</label>
              <input name="Datefrom" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST["Datefrom"]?>">
              <label for="Date to"> Date to</label>
              <input name="Date to" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST["Date to"]?>"><br/>
              <h5>Uploads</h5>
              <label for="signature"class="important upload">Upload Signature:</label><br/>
                <input type="file"
                  id="signature" name="signature"
                      accept="image/png, image/jpeg" value="<?php echo $_POST["signature"]?>"><br/> 
                <label for="signature"class="important">Upload Passport Photograph:</label><br/>
                <input type="file"
                  id="PassportPhotograph" name="PassportPhotograph"
                      accept="image/png, image/jpeg" value="<?php echo $_POST["PassportPhotograph"]?>"><br/>
                <label for="signature"class="important">Upload a Valid bill (not more than 3 months old):</label>
                <input type="file"
                  id="bill" name="bill"
                      accept="image/png, image/jpeg" value="<?php echo $_POST["bill"]?>">
                <label for="meansofId" class="important">Upload a valid means of Identification(International passport, Drivers's license, National ID card or Permanent voters's Card):</label>
                <input type="file"
                  id="meansofId" name="meansofId"
                      accept="image/png, image/jpeg" value="<?php echo $_POST["meansofId"]?>">
            </div>
            <div style="overflow:auto;">
              <div style="float:right;">
                <button type="button" class="btn" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" class="btn nextBtn" id="nextBtn"  onclick="nextPrev(1)">Next</button>
                <button type="button"  class="btn btn-info" id="preview" data-toggle="modal"  onclick="showInput()" data-target="#exampleModal">preview</button>
                <input type="submit" name="submit" id="submit" class="btn btn-primary"  value="submit"/>

              </div>

            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
              <!--<span class="step"></span>-->
             
              <!-- <span class="step"></span>
              <span class="step"></span> -->
            </div>
            </form>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn btn-danger" class="close"  data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" id="t2">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


                </body>
               
                <script src="../js/register.js" type="text/javascript"></script>
        </html>