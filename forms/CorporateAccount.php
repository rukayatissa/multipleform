<!Doctype html>
                  <html>
                  <head>
                  <title>CORPORATE ACCOUNT</title>
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
                    $pdf->SetHeaderData(FALSE);
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
                    $pdf->SetFont('dejavusans', '', 14, '', true);
                    
                    // Add a page
                    // This method has several options, check the source code documentation for more information.
                    $pdf->AddPage();
                    
                    // set text shadow effect
                    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
                    
                    // Set some content to print

$data.='<p><span>fullnameofcompany:&nbsp;</span><span>'.$_POST['fullnameofcompany'].'</span></p>';
$data.='<p><span>shortnameofcompany:&nbsp;</span><span>'.$_POST['shortnameofcompany'].'</span></p>';
$data.='<p><span>DateofIncorporation:&nbsp;</span><span>'.$_POST['DateofIncorporation'].'</span></p>';
$data.='<p><span>placeofIncoporation:&nbsp;</span><span>'.$_POST['placeofIncoporation'].'</span></p>';
$data.='<p><span>Rcnumber:&nbsp;</span><span>'.$_POST['Rcnumber'].'</span></p>';
$data.='<p><span>Businesssector:&nbsp;</span><span>'.$_POST['Businesssector'].'</span></p>';
$data.='<p><span>Taxidentificationnumber:&nbsp;</span><span>'.$_POST['Taxidentificationnumber'].'</span></p>';
$data.='<p><span>CompanyType:&nbsp;</span><span>'.$_POST['CompanyType'].'</span></p>';
$data.='<p><span>CompanyAddress:&nbsp;</span><span>'.$_POST['CompanyAddress'].'</span></p>';
$data.='<p><span>MailingAddress:&nbsp;</span><span>'.$_POST['MailingAddress'].'</span></p>';
$data.='<p><span>CountryofResidence:&nbsp;</span><span>'.$_POST['CountryofResidence'].'</span></p>';
$data.='<p><span>CorporateEmailAddress:&nbsp;</span><span>'.$_POST['CorporateEmailAddress'].'</span></p>';
$data.='<p><span>TelephoneNumber:&nbsp;</span><span>'.$_POST['TelephoneNumber'].'</span></p>';
$data.='<p><span>WebsiteAddress:&nbsp;</span><span>'.$_POST['WebsiteAddress'].'</span></p>';
$data.='<p><span>Fax:&nbsp;</span><span>'.$_POST['Fax'].'</span></p>';
$data.='<p><span>PurposeofInvestment:&nbsp;</span><span>'.$_POST['PurposeofInvestment'].'</span></p>';
$data.='<p><span>AverageAnnualTurnOver:&nbsp;</span><span>'.$_POST['AverageAnnualTurnOver'].'</span></p>';
$data.='<p><span>SourceofInvestmentFund:&nbsp;</span><span>'.$_POST['SourceofInvestmentFund'].'</span></p>';
$data.='<p><span>BankName:&nbsp;</span><span>'.$_POST['BankName'].'</span></p>';
$data.='<p><span>Branch:&nbsp;</span><span>'.$_POST['Branch'].'</span></p>';
$data.='<p><span>AccountName:&nbsp;</span><span>'.$_POST['AccountName'].'</span></p>';
$data.='<p><span>AccountNumber:&nbsp;</span><span>'.$_POST['AccountNumber'].'</span></p>';
$data.='<p><span>DateofAccountCreation:&nbsp;</span><span>'.$_POST['DateofAccountCreation'].'</span></p>';
$data.='<p><span>BankVerificationNumber:&nbsp;</span><span>'.$_POST['BankVerificationNumber'].'</span></p>';
$data.='<p><span>PrincipalContactName:&nbsp;</span><span>'.$_POST['PrincipalContactName'].'</span></p>';
$data.='<p><span>PhoneNumber:&nbsp;</span><span>'.$_POST['PhoneNumber'].'</span></p>';
$data.='<p><span>EmailAddress:&nbsp;</span><span>'.$_POST['EmailAddress'].'</span></p>';
$data.='<p><span>Signature&Date:&nbsp;</span><span>'.$_POST['Signature&Date'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryName1:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryName1'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryDob:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryDob'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryPob:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryPob'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryGender:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryGender'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryNationality:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryNationality'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryResidentialAddress:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryResidentialAddress'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryCountryofResidence:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryCountryofResidence'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryPhoneNumber:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryPhoneNumber'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryEmail:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryEmail'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryIdType:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryIdType'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryID-No:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryID-No'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryIssueDate:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryIssueDate'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryExpiryDate:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryExpiryDate'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryplace&countryofissue:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryplace&countryofissue'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryPlaceofIssue:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryPlaceofIssue'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryDesignation:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryDesignation'].'</span></p>';
$data.='<p><span>AuthorizedSignatory:&nbsp;</span><span>'.$_POST['AuthorizedSignatory'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryDate:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryDate'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryName2:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryName2'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryDob2:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryDob2'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryPob2:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryPob2'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryGender2:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryGender2'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryNationality2:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryNationality2'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryResidentialAddress2:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryResidentialAddress2'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryCountryofResidence2:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryCountryofResidence2'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryPhoneNumber2:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryPhoneNumber2'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryEmail2:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryEmail2'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryIdType2:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryIdType2'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryID-No2:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryID-No2'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryIssueDate2:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryIssueDate2'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryExpiryDate2:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryExpiryDate2'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryplace&countryofissue2:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryplace&countryofissue2'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryPlaceofIssue2:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryPlaceofIssue2'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryDesignation2:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryDesignation2'].'</span></p>';
$data.='<p><span>AuthorizedSignatory2:&nbsp;</span><span>'.$_POST['AuthorizedSignatory2'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryDate2:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryDate2'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryName3:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryName3'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryDob3:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryDob3'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryPob3:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryPob3'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryGender3:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryGender3'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryNationality3:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryNationality3'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryResidentialAddress3:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryResidentialAddress3'].'</span></p>';
$data.='<p><span>Country of Residence:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryCountryofResidence3'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryPhoneNumber3:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryPhoneNumber3'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryEmail3:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryEmail3'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryIdType3:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryIdType3'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryID-No3:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryID-No3'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryIssueDate3:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryIssueDate3'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryExpiryDate3:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryExpiryDate3'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryplace&countryofissue3:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryplace&countryofissue3'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryPlaceofIssue3:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryPlaceofIssue3'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryDesignation3:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryDesignation3'].'</span></p>';
$data.='<p><span>AuthorizedSignatory3:&nbsp;</span><span>'.$_POST['AuthorizedSignatory3'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryDate3:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryDate3'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryName4:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryName4'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryDob4:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryDob4'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryPob4:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryPob4'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryGender4:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryGender4'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryNationality4:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryNationality4'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryResidentialAddress4:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryResidentialAddress4'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryCountryofResidence4:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryCountryofResidence4'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryPhoneNumber4:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryPhoneNumber4'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryEmail4:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryEmail4'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryIdType4:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryIdType4'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryID-No4:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryID-No4'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryIssueDate4:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryIssueDate4'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryExpiryDate4:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryExpiryDate4'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryplace&countryofissue4:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryplace&countryofissue4'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryPlaceofIssue4:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryPlaceofIssue4'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryDesignation4:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryDesignation4'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryIdType4:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryIdType4'].'</span></p>';
$data.='<p><span>AuthorizedSignatoryDate4:&nbsp;</span><span>'.$_POST['AuthorizedSignatoryDate4'].'</span></p>';
$data.='<p><span>Mandate&nbsp;</span><span>'.$_POST['Mandate'].'</span></p>';
$data.='<p><span>stateposition:&nbsp;</span><span>'.$_POST['stateposition'].'</span></p>';
$data.='<p><span>QuestionnaireName1:&nbsp;</span><span>'.$_POST['QuestionnaireName1'].'</span></p>';
$data.='<p><span>QuestionnairePositionHeld1:&nbsp;</span><span>'.$_POST['QuestionnairePositionHeld1'].'</span></p>';
$data.='<p><span>QuestionnaireDateFrom1:&nbsp;</span><span>'.$_POST['QuestionnaireDateFrom1'].'</span></p>';
$data.='<p><span>QuestionnaireDateTo1:&nbsp;</span><span>'.$_POST['QuestionnaireDateTo1'].'</span></p>';
$data.='<p><span>QuestionnaireName2:&nbsp;</span><span>'.$_POST['QuestionnaireName2'].'</span></p>';
$data.='<p><span>QuestionnairePositionHeld2:&nbsp;</span><span>'.$_POST['QuestionnairePositionHeld2'].'</span></p>';
$data.='<p><span>QuestionnaireDateFrom2:&nbsp;</span><span>'.$_POST['QuestionnaireDateFrom2'].'</span></p>';
$data.='<p><span>QuestionnaireDateTo2:&nbsp;</span><span>'.$_POST['QuestionnaireDateTo2'].'</span></p>';
$data.='<p><span>QuestionnaireName3:&nbsp;</span><span>'.$_POST['QuestionnaireName3'].'</span></p>';
$data.='<p><span>QuestionnairePositionHeld3:&nbsp;</span><span>'.$_POST['QuestionnairePositionHeld3'].'</span></p>';
$data.='<p><span>QuestionnaireDateFrom3:&nbsp;</span><span>'.$_POST['QuestionnaireDateFrom3'].'</span></p>';
$data.='<p><span>QuestionnaireDateTo3:&nbsp;</span><span>'.$_POST['QuestionnaireDateTo3'].'</span></p>';
$data.='<p><span>QuestionnaireName4:&nbsp;</span><span>'.$_POST['QuestionnaireName4'].'</span></p>';
$data.='<p><span>QuestionnairePositionHeld4:&nbsp;</span><span>'.$_POST['QuestionnairePositionHeld4'].'</span></p>';
$data.='<p><span>QuestionnaireDateFrom4:&nbsp;</span><span>'.$_POST['QuestionnaireDateFrom4'].'</span></p>';
$data.='<p><span>QuestionnaireDateTo4:&nbsp;</span><span>'.$_POST['QuestionnaireDateTo4'].'</span></p>';
$data.='<p><span>QuestionnaireName:&nbsp;</span><span>'.$_POST['QuestionnaireName'].'</span></p>';
$data.='<p><span>QuestionnairePositionHeld:&nbsp;</span><span>'.$_POST['QuestionnairePositionHeld'].'</span></p>';
$data.='<p><span>QuestionnaireDateFrom:&nbsp;</span><span>'.$_POST['QuestionnaireDateFrom'].'</span></p>';
$data.='<p><span>QuestionnaireDateTo:&nbsp;</span><span>'.$_POST['QuestionnaireDateTo'].'</span></p>';
$data.='<p><span>How did you hear about us?:&nbsp;</span><span>'.$_POST['How did you hear about us?'].'</span></p>';
$data.='<p><span>Staffreferrals:&nbsp;</span><span>'.$_POST['Staffreferrals'].'</span></p>';
$data.='<p><span>InvestmentandFinancial:&nbsp;</span><span>'.$_POST['InvestmentandFinancial'].'</span></p>';






   //                 $html = <<<EOD;


// <h1>Welcome  $lname to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
// <i>This is the first example of TCPDF library.</i>
// <p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
// <p>Please check the source code documentation and other examples for further information.</p>
// <p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>



// EOD;

 //Print text using writeHTMLCell()
          $pdf->writeHTML($data,true, 0);


// Close and output PDF document
// This method has several options, check the source code documentation for more information.
                     $pdfoutput=$pdf->Output(__DIR__.'\Corporateform.pdf', 'F');
                       //print_r($pdfoutput); exit;
                  
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
                    $mail->addAttachment(__DIR__.'\Corporateform.pdf'); 
                    //$mail->addAttachment($pdfoutput,'\Corporateform.pdf.');  
                    $mail->addStringAttachment($data, 'corporate Form.xlsx');
                    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                
                    //Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Registration Form';
                    $mail->Body    = 'This is the Registeration form!</b>';
                    $mail->AltBody = '';
                    if(!empty($uploaded_filenames)){
                    foreach ($uploaded_filenames as $filename) {
                     $mail->addAttachment(__DIR__.'/'.$filename);  
                    }
                   }
                    // Add attachments
                  
                   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
               
                   //Content
                   $mail->isHTML(true);                                  // Set email format to HTML
                   $mail->Subject = 'Corporate Account Registration Form for '.$_POST['fullnameofcompany'].'.';
                   $mail->Body    = 'CORPORATE ACCOUNT REGISTERATION';
                   $mail->AltBody = '';


                   if($mail->send()){
                    echo '<h2 style="color:#0B4A2F";><strong>form submitted, you will be contacted shortly!<strong></h2>';
                    unlink(__DIR__.'\Corporateform.pdf');
                      //header("Location: CorporateAccount.php");

                   }else{
                     echo 'Message not sent';
                   }
                 } catch (Exception $e) {
                  $_POST['error'] = 'Message could not be sent. Mailer Error: ';
                   //echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
               }
                 }
     
               ?>
           <form id="regForm" method="POST" action="" enctype="multipart/form-data">
            <!-- One "tab" for each step in the form: -->
          
              <h4>Company Details</h4>
              <div class="tab form-group">
              <label for="name">Full Name of Company</label>

              <input  name="fullnameofcompany" require id="fname" class="form-control inp" value="<?php echo $_POST['fullnameofcompany'];?>">
              <label for="name">Company Short Name</label>
              <input  name="shortnameofcompany" id="fname" class="form-control inp" value="<?php echo $_POST['shortnameofcompany'];?>" require>
              <label for="name">Date of Incorporation/Registration</label>
              <input   name="DateofIncorporation" type="date" placeholder="02-dec-2018" class="form-control inp" value="<?php echo $_POST['DateofIncorporation'];?>">
              <label for="name">Place of Incorporation</label>
              <input  name="placeofIncoporation" require id="fname" class="form-control inp" value="<?php echo $_POST['placeofIncoporation']?>">
              <label for="name">Rc Number</label>
              <input  name="Rcnumber" id="fname" class="form-control inp" value="<?php echo $_POST['Rcnumber']?>"require>
              <label for="name">Business Sector</label>
              <input name="Businesssector" id="lname" class="form-control inp" value="<?php echo $_POST['Businesssector']?>">
              <label for="name">Tax Identification Number (TIN)</label>
              <input name="Taxidentificationnumber" id="lname" class="form-control inp" value="<?php echo $_POST['Taxidentificationnumber']?>">
              <label for="name">Company Type</label>
              <select name="CompanyType" id="CompanyType" class="form-control inp">
              <option value=""<?php if($_POST['CompanyType']=='') echo 'selected="selected"';?>>Select</option>
              <option value="Limited Liability Company"<?php if($_POST['CompanyType']=='Limited Liability Company') echo 'selected="selected"';?>>Limited Liability Company </option>
              <option value="Partnership"<?php if($_POST['CompanyType']=='Partnership') echo 'selected="selected"';?>> Partnership</option>
              <option value="Enterprise"<?php if($_POST['CompanyType']=='Enterprise') echo 'selected="selected"';?>>Enterprise</option>
              <option value="Others"<?php if($_POST['CompanyType']=='Others') echo 'selected="selected"';?>>Others</option>
                </select>
                <label for="name">Company Address</label>
              <input name="CompanyAddress" id="lname" class="form-control inp" value="<?php echo $_POST['CompanyAddress']?>">
              <label for="name">Mailing Address</label>
              <input name="MailingAddress" id="lname" class="form-control inp" value="<?php echo $_POST['MailingAddress']?>">
              <label for="name">Country of Residence</label>
              <input name="CountryofResidence" id="lname" class="form-control inp" value="<?php echo $_POST['CountryofResidence']?>">
              <label for="name">Corporate Email Address</label>
              <input name="CorporateEmailAddress" id="lname" class="form-control inp" value="<?php echo $_POST['CorporateEmailAddress']?>">
              <label for="name">Telephone No(s)</label>
              <input name="TelephoneNumber" id="lname" class="form-control inp" value="<?php echo $_POST['TelephoneNumber']?>">
              <label for="name">Website Address</label>
              <input name="WebsiteAddress" id="lname" class="form-control inp" value="<?php echo $_POST['WebsiteAddress']?>">
              <label for="name">Fax</label>
              <input name="Fax" id="lname" class="form-control inp" value="<?php echo $_POST['Fax']?>">
              <label for="name">Purpose Of Investment</label>
              <input name="PurposeofInvestment" id="lname" class="form-control inp" value="<?php echo $_POST['PurposeofInvestment']?>">
              <label for="name">Average Annual Turn Over(NGN)</label>
              <select name="AverageAnnualTurnOver" id="AverageAnnualTurnOver" class="form-control inp">
              <option value=""<?php if($_POST['AverageAnnualTurnOver']=='') echo 'selected="selected"';?>>Select</option>
              <option value="Limited Liability Company"<?php if($_POST['AverageAnnualTurnOver']=='Limited Liability Company') echo 'selected="selected"';?>>Limited Liability Company </option>
              <option value="Less than 10m"<?php if($_POST['AverageAnnualTurnOver']=='Less than 10m') echo 'selected="selected"';?>>Less than 10m</option>
              <option value="10-50m"<?php if($_POST['AverageAnnualTurnOver']=='10-50m') echo 'selected="selected"';?>>10-50m</option>
              <option value="Others"<?php if($_POST['AverageAnnualTurnOver']=='Others') echo 'selected="selected"';?>>Above 50m</option>
                </select>
                <label for="name">Source of Investment Fund</label>
              <input name="SourceofInvestmentFund" id="lname" class="form-control inp" value="<?php echo $_POST['SourceofInvestmentFund']?>">
                          <br>
            <h5>Bank Account Details (Same as CSCS Account Name)</h5>
            <label for="name">Bank Name</label>
              <input name="BankName" id="lname" class="form-control inp" value="<?php echo $_POST['BankName']?>">
              <label for="name">Branch</label>
              <input name="Branch" id="lname" class="form-control inp" value="<?php echo $_POST['Branch']?>">
              <label for="name">Account Name</label>
              <input name="AccontName" id="lname" class="form-control inp" value="<?php echo $_POST['AccontName']?>">
              <label for="name">Account Number</label>
              <input name="AccountNumber" id="lname" class="form-control inp" value="<?php echo $_POST['AccountNumber']?>">
              <label for="name">Date of Account Creation</label>
              <input name="DateofAccountCreation" id="lname" class="form-control inp" value="<?php echo $_POST['DateofAccountCreation']?>">
              <label for="name">Bank Verification Number</label>
              <input name="BankVerificationNumber" id="lname" class="form-control inp"value="<?php echo $_POST['BankVerificationNumber']?>">
              <br>
            <h5>Principal Contact Person</h5>
            <label for="name">Name</label>
              <input name="PrincipalContactName" id="lname" class="form-control inp" value="<?php echo $_POST['PrincipalContactName']?>">
              <label for="name">Phone Number</label>
              <input name="PhoneNumber" id="lname" class="form-control inp" value="<?php echo $_POST['PhoneNumber']?>">
              <label for="name">Email Address</label>
              <input name="EmailAddress" id="lname" class="form-control inp" value="<?php echo $_POST['EmailAddress']?>">
              <label for="name">Signature & Date</label>
              <input name="Signature&Date" id="lname" class="form-control inp" value="<?php echo $_POST['Signature&Date']?>">
              <br>
            <h5>Authorized Signatory (1)</h5>
            <label for="name">Name</label>
              <input name="AuthorizedSignatoryName1" id="lname" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryName1']?>">
              <label for="name"> Date of Birth</label>
              <input name="AuthorizedSignatoryDob" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryDob']?>">    
              <label for="name">Place/Country of Birth</label>
              <input name="AuthorizedSignatoryPob" id="lname" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryPob']?>">
              <label for="name">Gender</label>
              <select name="AuthorizedSignatoryGender" id="AuthorizedSignatoryGender" class="form-control inp">
              <option value=""<?php if($_POST['AuthorizedSignatoryGender']=='') echo 'selected="selected"';?>>Select</option>
              <option value="Female"<?php if($_POST['AuthorizedSignatoryGender']=='Female') echo 'selected="selected"';?>>Female </option>
              <option value="Male"<?php if($_POST['AuthorizedSignatoryGender']=='Male') echo 'selected="selected"';?>> Male</option>
                          </select>
              <label for="name">Nationality</label>
              <input name="AuthorizedSignatoryNationality" id="lname" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryNationality']?>">
              <label for="name">Residential Address</label>
              <input name="AuthorizedSignatoryResidentialAddress" id="lname" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryResidentialAddress']?>">
              <label for="name">Country of Residence</label>
              <input name="AuthorizedSignatoryCountryofResidence" id="lname" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryCountryofResidence']?>">
              <label for="name">Phone Number</label>
              <input name="AuthorizedSignatoryPhoneNumber" id="lname" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryPhoneNumber']?>">
              <label for="name">E-mail Address</label>
              <input name="AuthorizedSignatoryEmail" id="lname" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryEmail']?>">
              <label for="idType">ID TYPE</label>
                     <select name="AuthorizedSignatoryIdType" require id="AuthorizedSignatoryIdType" class="form-control inp">
                    <option value=""<?php if($_POST['AuthorizedSignatoryIdType']=='') echo 'selected="selected"';?>>Select </option>
                     <option value="International Passport"<?php if($_POST['AuthorizedSignatoryIdType']=='International Passport') echo 'selected="selected"';?>>International Passport</option>
                     <option value="Drivers Licence"<?php if($_POST['AuthorizedSignatoryIdType']=='Drivers Licence') echo 'selected="selected"';?>>Drivers Licence</option>
                     <option value="PVC"<?php if($_POST['AuthorizedSignatoryIdType']=='PVC') echo 'selected="selected"';?>>PVC</option>
                     <option value="National IdCard"<?php if($_POST['AuthorizedSignatoryIdType']=='National IdCard') echo 'selected="selected"';?>>National Id Card</option>
                </select>
                <label for="ID No">ID Number</label>
              <input name="AuthorizedSignatoryID-No" type="text" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryID-No']?>">
              <label for="IssueDate">Issue Date</label>
              <input name="AuthorizedSignatoryIssueDate" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryIssueDate']?>">
              <label for="Expiry Date">Expiry Date</label>
              <input name="AuthorizedSignatoryExpiryDate" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryExpiryDate']?>">
              <label for="place&countryofissue">Place and Country of Issue</label>
              <input name="AuthorizedSignatoryplace&countryofissue" type="text" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryplace&countryofissue']?>">
              <label for="ID No">Place of Issue</label>
              <input name="AuthorizedSignatoryPlaceofIssue" type="text" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryPlaceofIssue']?>">
              <label for="ID No">Designation</label>
              <input name="AuthorizedSignatoryDesignation" type="text" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryDesignation']?>">
              <label for="idType">Class of Signatory</label>
                     <select name="AuthorizedSignatory" require id="AuthorizedSignatory" class="form-control inp" \>
                    <option value=""<?php if($_POST['AuthorizedSignatory']=='') echo 'selected="selected"';?>>Select </option>
                     <option value="A"<?php if($_POST['AuthorizedSignatory']=='A') echo 'selected="selected"';?>>A</option>
                     <option value="B"<?php if($_POST['AuthorizedSignatory']=='B') echo 'selected="selected"';?>>B</option>
                     <option value="C"<?php if($_POST['AuthorizedSignatory']=='C') echo 'selected="selected"';?>>C</option>
                </select>
                <label for="Date">Date</label>
              <input name="AuthorizedSignatoryDate" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['Cob']?>">
              <br>
              <h5>Authorized Signatory (2)</h5>
              <label for="name">Name</label>
              <input name="AuthorizedSignatoryName2" id="lname" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryName2']?>">
              <label for="name"> Date of Birth</label>
              <input name="AuthorizedSignatoryDob2" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryDob2']?>">    
              <label for="name">Place/Country of Birth</label>
              <input name="AuthorizedSignatoryPob2" id="lname" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryPob2']?>">
              <label for="name">Gender</label>
              <select name="AuthorizedSignatoryGender2" id="AuthorizedSignatoryGender2" class="form-control inp">
              <option name=""<?php if($_POST['AuthorizedSignatoryGender2']=='') echo 'selected="selected"';?>>Select</option>
              <option value="Female"<?php if($_POST['AuthorizedSignatoryGender2']=='Female') echo 'selected="selected"';?>>Female </option>
              <option value="Male"<?php if($_POST['AuthorizedSignatoryGender2']=='Male') echo 'selected="selected"';?>> Male</option>
                          </select>
              <label for="name">Nationality</label>
              <input name="AuthorizedSignatoryNationality2" id="lname" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryNationality2']?>">
              <label for="name">Residential Address</label>
              <input name="AuthorizedSignatoryResidentialAddress2" id="lname" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryResidentialAddress2']?>">
              <label for="name">Country of Residence</label>
              <input name="AuthorizedSignatoryCountryofResidence2" id="lname" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryCountryofResidence2']?>">
              <label for="name">Phone Number</label>
              <input name="AuthorizedSignatoryPhoneNumber2" id="lname" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryPhoneNumber2']?>">
              <label for="name">E-mail Address</label>
              <input name="AuthorizedSignatoryEmail2" id="lname" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryEmail2']?>">
              <label for="idType">ID TYPE</label>
                     <select name="AuthorizedSignatoryIdType2" require id="AuthorizedSignatoryIdType2" class="form-control inp">
                    <option value=""<?php if($_POST['AuthorizedSignatoryIdType2']=='') echo 'selected="selected"';?>>Select </option>
                     <option value="International Passport"<?php if($_POST['AuthorizedSignatoryIdType2']=='International Passport') echo 'selected="selected"';?>>International Passport</option>
                     <option value="Drivers Licence"<?php if($_POST['AuthorizedSignatoryIdType2']=='Drivers Licence') echo 'selected="selected"';?>>Drivers Licence</option>
                     <option value="PVC"<?php if($_POST['AuthorizedSignatoryIdType2']=='PVC') echo 'selected="selected"';?>>PVC</option>
                     <option value="National IdCard"<?php if($_POST['AuthorizedSignatoryIdType2']=='National IdCard') echo 'selected="selected"';?>>National Id Card</option>
                </select>
                <label for="ID No">ID Number</label>
              <input name="AuthorizedSignatoryID-No2" type="text" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryID-No2']?>">
              <label for="IssueDate">Issue Date</label>
              <input name="AuthorizedSignatoryIssueDate2" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryIssueDate2']?>">
              <label for="Expiry Date">Expiry Date</label>
              <input name="AuthorizedSignatoryExpiryDate2" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryExpiryDate2']?>">
              <label for="place&countryofissue">Place and Country of Issue</label>
              <input name="AuthorizedSignatoryplace&countryofissue2" type="text" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryplace&countryofissue2']?>">
              <label for="ID No">Place of Issue</label>
              <input name="AuthorizedSignatoryPlaceofIssue2" type="text" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryPlaceofIssue2']?>">
              <label for="ID No">Designation</label>
              <input name="AuthorizedSignatoryDesignation2" type="text" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryDesignation2']?>">
              <label for="idType">Class of Signatory</label>
                     <select name="AuthorizedSignatory2" require id="AuthorizedSignatory2" class="form-control inp">
                    <option value=""<?php if($_POST['AuthorizedSignatory2']=='') echo 'selected="selected"';?>>Select </option>
                     <option value="A"<?php if($_POST['AuthorizedSignatory2']=='A') echo 'selected="selected"';?>>A</option>
                     <option value="B"<?php if($_POST['AuthorizedSignatory2']=='B') echo 'selected="selected"';?>>B</option>
                     <option value="C"<?php if($_POST['AuthorizedSignatory2']=='C') echo 'selected="selected"';?>>C</option>
                </select>
                <label for="Date">Date</label>
              <input name="AuthorizedSignatoryDate2" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryDate2']?>">
            </div>
            <div class="tab form-group">
            <h5>Authorized Signatory (3)</h5>
            <label for="name">Name</label>
              <input name="AuthorizedSignatoryName3" id="lname" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryName3']?>">
              <label for="name"> Date of Birth</label>
              <input name="AuthorizedSignatoryDob3" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryDob3']?>">    
              <label for="name">Place/Country of Birth</label>
              <input name="AuthorizedSignatoryPob3" id="lname" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryPob3']?>">
              <label for="name">Gender</label>
              <select name="AuthorizedSignatoryGender3" id="AuthorizedSignatoryGender3" class="form-control inp">
              <option value=""<?php if($_POST['AuthorizedSignatoryGender3']=='') echo 'selected="selected"';?>>Select</option>
              <option value="Female"<?php if($_POST['AuthorizedSignatoryGender3']=='Female') echo 'selected="selected"';?>>Female </option>
              <option value="Male"<?php if($_POST['AuthorizedSignatoryGender3']=='Male') echo 'selected="selected"';?>> Male</option>
                          </select>
              <label for="name">Nationality</label>
              <input name="AuthorizedSignatoryNationality3" id="lname" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryNationality3']?>">
              <label for="name">Residential Address</label>
              <input name="AuthorizedSignatoryResidentialAddress3" id="lname" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryResidentialAddress3']?>">
              <label for="name">Country of Residence</label>
              <input name="AuthorizedSignatoryCountryofResidence3" id="lname" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryCountryofResidence3']?>">
              <label for="name">Phone Number</label>
              <input name="AuthorizedSignatoryPhoneNumber3" id="lname" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryPhoneNumber3']?>">
              <label for="name">E-mail Address</label>
              <input name="AuthorizedSignatoryEmail3" id="lname" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryEmail3']?>">
              <label for="idType">ID TYPE</label>
                     <select name="AuthorizedSignatoryIdType3" require id="AuthorizedSignatoryIdType3" class="form-control inp">
                    <option value=""<?php if($_POST['AuthorizedSignatoryIdType3']=='') echo 'selected="selected"';?>>Select </option>
                     <option value="International Passport"<?php if($_POST['AuthorizedSignatoryIdType3']=='International Passport') echo 'selected="selected"';?>>International Passport</option>
                     <option value="Drivers Licence"<?php if($_POST['AuthorizedSignatoryIdType3']=='Drivers Licence') echo 'selected="selected"';?>>Drivers Licence</option>
                     <option value="PVC"<?php if($_POST['AuthorizedSignatoryIdType3']=='PVC') echo 'selected="selected"';?>>PVC</option>
                     <option value="National IdCard"<?php if($_POST['idType']=='National IdCard') echo 'selected="selected"';?>>National Id Card</option>
                </select>
                <label for="ID No">ID Number</label>
              <input name="AuthorizedSignatoryID-No3" type="text" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryID-No3']?>">
              <label for="IssueDate">Issue Date</label>
              <input name="AuthorizedSignatoryIssueDate3" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryIssueDate3']?>">
              <label for="Expiry Date">Expiry Date</label>
              <input name="AuthorizedSignatoryExpiryDate3" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryExpiryDate3']?>">
              <label for="place&countryofissue">Place and Country of Issue</label>
              <input name="AuthorizedSignatoryplace&countryofissue3" type="text" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryplace&countryofissue3']?>">
              <label for="ID No">Place of Issue</label>
              <input name="AuthorizedSignatoryPlaceofIssue3" type="text" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryPlaceofIssue3']?>">
              <label for="ID No">Designation</label>
              <input name="AuthorizedSignatoryDesignation3" type="text" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryDesignation3']?>">
              <label for="idType">Class of Signatory</label>
                     <select name="AuthorizedSignatory3" require id="AuthorizedSignatory3" class="form-control inp">
                    <option value=""<?php if($_POST['AuthorizedSignatory3']=='') echo 'selected="selected"';?>>Select </option>
                     <option value="A"<?php if($_POST['AuthorizedSignatory3']=='A') echo 'selected="selected"';?>>A</option>
                     <option value="B"<?php if($_POST['AuthorizedSignatory3']=='B') echo 'selected="selected"';?>>B</option>
                     <option value="C"<?php if($_POST['AuthorizedSignatory3']=='C') echo 'selected="selected"';?>>C</option>
                </select>
                <label for="Date">Date</label>
              <input name="AuthorizedSignatoryDate3" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryDate3']?>">
              <br>    
              <h5>Authorized Signatory (4)</h5>
              <label for="name">Name</label>
              <input name="AuthorizedSignatoryName4" id="lname" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryName4']?>">
              <label for="name"> Date of Birth</label>
              <input name="AuthorizedSignatoryDob4" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryDob4']?>">    
              <label for="name">Place/Country of Birth</label>
              <input name="AuthorizedSignatoryPob4" id="lname" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryPob4']?>">
              <label for="name">Gender</label>
              <select name="AuthorizedSignatoryGender4" id="AuthorizedSignatoryGender4" class="form-control inp">
              <option value=""<?php if($_POST['AuthorizedSignatoryGender4']=='') echo 'selected="selected"';?>>Select</option>
              <option value="Female"<?php if($_POST['AuthorizedSignatoryGender4']=='Female') echo 'selected="selected"';?>>Female </option>
              <option value="Male"<?php if($_POST['AuthorizedSignatoryGender4']=='Male') echo 'selected="selected"';?>> Male</option>
                          </select>
              <label for="name">Nationality</label>
              <input name="AuthorizedSignatoryNationality4" id="lname" class="form-control inp" value="<?php echo $_POST['Cob']?>">
              <label for="name">Residential Address</label>
              <input name="AuthorizedSignatoryResidentialAddress4" id="lname" class="form-control inp" value="<?php echo $_POST['Cob']?>">
              <label for="name">Country of Residence</label>
              <input name="AuthorizedSignatoryCountryofResidence4" id="lname" class="form-control inp" value="<?php echo $_POST['Cob']?>">
              <label for="name">Phone Number</label>
              <input name="AuthorizedSignatoryPhoneNumber4" id="lname" class="form-control inp" value="<?php echo $_POST['Cob']?>">
              <label for="name">E-mail Address</label>
              <input name="AuthorizedSignatoryEmail4" id="lname" class="form-control inp" value="<?php echo $_POST['Cob']?>">
              <label for="idType">ID TYPE</label>
                     <select name="AuthorizedSignatoryIdType4" require id="AuthorizedSignatoryIdType4" class="form-control inp" value="<?php echo $_POST['Cob']?>">
                    <option value=""<?php if($_POST['AuthorizedSignatoryIdType4']=='') echo 'selected="selected"';?>>Select </option>
                     <option value="International Passport"<?php if($_POST['AuthorizedSignatoryIdType4']=='International Passport') echo 'selected="selected"';?>>International Passport</option>
                     <option value="Drivers Licence"<?php if($_POST['AuthorizedSignatoryIdType4']=='Drivers Licence') echo 'selected="selected"';?>>Drivers Licence</option>
                     <option value="PVC"<?php if($_POST['AuthorizedSignatoryIdType4']=='PVC') echo 'selected="selected"';?>>PVC</option>
                     <option value="National IdCard"<?php if($_POST['AuthorizedSignatoryIdType4']=='National IdCard') echo 'selected="selected"';?>>National Id Card</option>
                </select>
                <label for="ID No">ID Number</label>
              <input name="AuthorizedSignatoryID-No4" type="text" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryID-No4']?>">
              <label for="IssueDate">Issue Date</label>
              <input name="AuthorizedSignatoryIssueDate4" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryIssueDate4']?>">
              <label for="Expiry Date">Expiry Date</label>
              <input name="AuthorizedSignatoryExpiryDate4" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryExpiryDate4']?>">
              <label for="place&countryofissue">Place and Country of Issue</label>
              <input name="AuthorizedSignatoryplace&countryofissue4" type="text" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryplace&countryofissue4']?>">
              <label for="ID No">Place of Issue</label>
              <input name="AuthorizedSignatoryPlaceofIssue4" type="text" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryPlaceofIssue4']?>">
              <label for="ID No">Designation</label>
              <input name="AuthorizedSignatoryDesignation4" type="text" class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryDesignation4']?>">
              <label for="idType">Class of Signatory</label>
                     <select name="AuthorizedSignatoryIdType4" require id="title" class="form-control inp">
                    <option value=""<?php if($_POST['AuthorizedSignatoryIdType4']=='') echo 'selected="selected"';?>>Select </option>
                     <option value="A"<?php if($_POST['AuthorizedSignatoryIdType4']=='A') echo 'selected="selected"';?>>A</option>
                     <option value="B"<?php if($_POST['AuthorizedSignatoryIdType4']=='B') echo 'selected="selected"';?>>B</option>
                     <option value="C"<?php if($_POST['AuthorizedSignatoryIdType4']=='C') echo 'selected="selected"';?>>C</option>
                </select>
                <label for="Date">Date</label>
              <input name="AuthorizedSignatoryDate4" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['AuthorizedSignatoryDate4']?>">
              </div>
            <div class="tab form-group">
                <section>
                <h5>Mandate</h5>
                <label for="ID No">Mandate & Signing Instruction</label>
              <input name="Mandate" type="text" class="form-control inp" value="<?php echo $_POST['Mandate']?>">
                </section>
                <section>
                <h5>Questionnaire</h5>
                <label for="ID No">Please state if any of your Directors, Signatories, or Major Shareholders have held any Political Position</label>
                <textarea name="stateposition"cols="5" rows="5" class="form-control Inp" value="<?php echo $_POST['stateposition']?>"></textarea>
                <label for="category"class="important">1. Name</label>
              <input  name="QuestionnaireName1" require id="fname" class="form-control inp" value="<?php echo $_POST['QuestionnaireName1']?>">
              <label for="category"class="important">Position Held</label>
              <input  name="QuestionnairePositionHeld1" require id="fname" class="form-control inp" value="<?php echo $_POST['QuestionnairePositionHeld1']?>">
              <label for="name">Date From</label>
              <input name="QuestionnaireDateFrom1" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['QuestionnaireDateFrom1']?>">
              <label for="name"> Date To</label>
              <input name="QuestionnaireDateTo1" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['QuestionnaireDateTo1']?>">
              <label for="category"class="important">2. Name</label>
              <input  name="QuestionnaireName2" require id="fname" class="form-control inp"value="<?php echo $_POST['QuestionnaireName2']?>">
              <label for="category"class="important">Position Held</label>
              <input  name="QuestionnairePositionHeld2" require id="fname" class="form-control inp" value="<?php echo $_POST['QuestionnairePositionHeld2']?>">
              <label for="name">Date from</label>
              <input name="QuestionnaireDateFrom" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['QuestionnaireDateFrom']?>">
              <label for="name"> Date to</label>
              <input name="QuestionnaireDateTo" type="date" placeholder="02-dec-2018"class="form-control inp"value="<?php echo $_POST['QuestionnaireDateTo']?>">
              <label for="category"class="important">3. Name</label>
              <input  name="QuestionnaireName3" require id="fname" class="form-control inp" value="<?php echo $_POST['QuestionnaireName3']?>">
              <label for="category"class="important">Position Held</label>
              <input  name="QuestionnairePositionHeld3" require id="fname" class="form-control inp" value="<?php echo $_POST['QuestionnairePositionHeld3']?>">
              <label for="name">Date from</label>
              <input name="QuestionnaireDateFrom3" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['QuestionnaireDateFrom3']?>">
              <label for="name"> Date to</label>
              <input name="QuestionnaireDateTo3" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['QuestionnaireDateTo3']?>">
              <label for="category"class="important">4. Name</label>
              <input  name="QuestionnaireName4" require id="fname" class="form-control inp" value="<?php echo $_POST['QuestionnaireName4']?>">
              <label for="category"class="important">Position Held</label>
              <input  name="QuestionnairePositionHeld4" require id="fname" class="form-control inp" value="<?php echo $_POST['QuestionnairePositionHeld4']?>">
              <label for="name">Date from</label>
              <input name="QuestionnaireDateFrom4" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['QuestionnaireDateFrom4']?>">
              <label for="name"> Date to</label>
              <input name="QuestionnaireDateTo4" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['QuestionnaireDateTo4']?>">
              <label for="category"class="important">Name</label>
              <input  name="QuestionnaireName" require id="fname" class="form-control inp" value="<?php echo $_POST['QuestionnaireName']?>">
              <label for="category"class="important">Position Held</label>
              <input  name="QuestionnairePositionHeld" require id="fname" class="form-control inp" value="<?php echo $_POST['QuestionnairePositionHeld']?>">
              <label for="name">Date from</label>
              <input name="QuestionnaireDateFrom" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['QuestionnaireDateFrom']?>">
              <label for="name"> Date to</label>
              <input name="QuestionnaireDateTo" type="date" placeholder="02-dec-2018"class="form-control inp" value="<?php echo $_POST['QuestionnaireDateTo']?>">
              <label for="category"class="important">How did you hear about us?</label>
              <select name="How did you hear about us?" id="How did you hear about us?"class="form-control inp">
              <option value=""<?php if($_POST['How did you hear about us?']=='') echo 'selected="selected"';?>>Select</option>
              <option value="Internet"<?php if($_POST['How did you hear about us?']=='Internet') echo 'selected="selected"';?>>Internet</option>
              <option value="Advert"<?php if($_POST['How did you hear about us?']=='Advert') echo 'selected="selected"';?>>Advert</option>
              <option value="Staff"<?php if($_POST['How did you hear about us?']=='Staff') echo 'selected="selected"';?>>Staff</option>
              <option value="Referral"<?php if($_POST['How did you hear about us?']=='Referral') echo 'selected="selected"';?>>Referral</option>
              <option value="Others"<?php if($_POST['How did you hear about us?']=='Others') echo 'selected="selected"';?>>Others</option>
              </select>
              <label for="category"class="important">Staff, referrals or others, please specify</label>
              <input  name="Staffreferrals" require id="fname" class="form-control inp" value="<?php echo $_POST['Staffreferrals']?>">
              <label for="category"class="important">Investment and Financial Market Knowledge</label>
              <select name="InvestmentandFinancial" id="InvestmentandFinancial" class="form-control inp">
              <option value=""<?php if($_POST['InvestmentandFinancial']=='') echo 'selected="selected"';?>>Select</option>
              <option value="None"<?php if($_POST['InvestmentandFinancial']=='None') echo 'selected="selected"';?>>None</option>
              <option value="Low"<?php if($_POST['InvestmentandFinancial']=='Low') echo 'selected="selected"';?>>Low</option>
              <option value="Medium"<?php if($_POST['InvestmentandFinancial']=='Medium') echo 'selected="selected"';?>>Medium</option>
              <option value="High"<?php if($_POST['InvestmentandFinancial']=='High') echo 'selected="selected"';?>>High</option>
              <option value="Advance"<?php if($_POST['InvestmentandFinancial']=='Advance') echo 'selected="selected"';?>>Advance</option>
              </select>
                </section>
                </div>
            <div style="overflow:auto;">
              <div style="float:right;">
                <button type="button" class="btn" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" class="btn nextBtn" id="nextBtn"  onclick="nextPrev(1)">Next</button>
                <button type="button"  class="btn btn-info" id="preview" data-toggle="modal"  onclick="showInput()" data-target="#myModal">preview</button>
                <input type="submit" name="submit" id="submit" class="btn btn-primary"  value="submit"/>
              </div>
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
            
              <!--<span class="step"></span>-->
             
              <!-- <span class="step"></span>
              <span class="step"></span> -->
            </div>
            </form>
                  <!-- Button to Open the Modal -->
                  <!-- The Modal -->
                  <div class="modal" id="myModal">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h5 class="modal-title">Preview</h5>
                          <button type="button" class="btn btn-danger" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body" id="t2">
                          modal
                          </div>
                         
                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" id="buttonCloseId" class="btn btn-danger" data-dismiss="modal">close</button>

                        </div>
                        
                      </div>
                    </div>
                     </div>
                      </div>

                </body>
               
                <script src="../js/register.js" type="text/javascript"></script>
        </html>