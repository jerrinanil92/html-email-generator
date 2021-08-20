<?php







require_once('vendor/spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
require_once('vendor/spreadsheet-reader-master/SpreadsheetReader.php');

class GoodZipArchive extends ZipArchive 
{
	//@author Nicolas Heimann
	public function __construct($a=false, $b=false) { $this->create_func($a, $b);  }
	
	public function create_func($input_folder=false, $output_zip_file=false)
	{
		if($input_folder !== false && $output_zip_file !== false)
		{
			$res = $this->open($output_zip_file, ZipArchive::CREATE);
			if($res === TRUE) 	{ $this->addDir($input_folder, basename($input_folder)); $this->close(); }
			else  				{ echo 'Could not create a zip archive. Contact Admin.'; }
		}
	}
	
    // Add a Dir with Files and Subdirs to the archive
    public function addDir($location, $name) {
        $this->addEmptyDir($name);
        $this->addDirDo($location, $name);
    }

    // Add Files & Dirs to archive 
    private function addDirDo($location, $name) {
        $name .= '/';         $location .= '/';
      // Read all Files in Dir
        $dir = opendir ($location);
        while ($file = readdir($dir))    {
            if ($file == '.' || $file == '..') continue;
          // Rekursiv, If dir: GoodZipArchive::addDir(), else ::File();
            $do = (filetype( $location . $file) == 'dir') ? 'addDir' : 'addFile';
            $this->$do($location . $file, $name . $file);
        }
    } 
}




  // filename for download


if (isset($_POST["import"]))
{
       $directoryName='emailFolders/emails'.time();
		mkdir($directoryName);
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
      $filename = "website_data_" . date('Ymd') . ".xls";
  
   /* header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");  */
  

  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
		
		$data = array();
		
		$dataRow=0;
        
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
				
				
                if(isset($Row[0])) {
                    $customerID = $Row[0];
                }
				
                
                if(isset($Row[1])) {
                    $customerEmail = $Row[1];
                }
				
				if(isset($Row[0])) {
                    $offer1 = $Row[2];
                }
				
                
                if(isset($Row[1])) {
                    $offer1Desc = $Row[3];
                }
                
                
                if(isset($Row[2])) {
                    $offer1URl = $Row[4];
                }
				
				if(isset($Row[0])) {
                    $offer2 = $Row[5];
                }
				
                
                if(isset($Row[1])) {
                    $offer2Desc = $Row[6];
                }
                
                
                if(isset($Row[7])) {
                    $offer2URl = $Row[7];
                }
				
				if(isset($Row[8])) {
                    $offer3 = $Row[8];
                }
				
                
                if(isset($Row[9])) {
                    $offer3Desc = $Row[9];
                }
                
                
                if(isset($Row[2])) {
                    $offer3URl = $Row[10];
                }
				
				if(isset($Row[8])) {
                    $offer4 = $Row[11];
                }
				
                
                if(isset($Row[9])) {
                    $offer4Desc = $Row[12];
                }
                
                
                if(isset($Row[2])) {
                    $offer4URl = $Row[13];
                }
				
				if(isset($Row[8])) {
                    $offer5 = $Row[14];
                }
				
                
                if(isset($Row[9])) {
                    $offer5Desc = $Row[15];
                }
                
                
                if(isset($Row[2])) {
                    $offer5URl = $Row[16];
                }
				
				if(isset($Row[8])) {
                    $offer6 = $Row[17];
                }
				
                
                if(isset($Row[9])) {
                    $offer6Desc = $Row[18];
                }
                
                
                if(isset($Row[2])) {
                    $offer6URl = $Row[19];
                }
                
                
				//echo "Cust ID: ".$customerID; echo "      <br>";
				//echo "Name ID: ".$customerEmail; echo "      ";
				//echo "Offer 1 ".$offer1; echo "      ";
				//echo "Offer Desc : ".$offer1Desc; echo "      <br>";
				//echo "Offer URL : ".$offer1Desc; echo "      <br>";
				 //echo "<br>";
				
				// send a file
				
				
				
				
				//echo "<br><br>----------------------------------------- <br>";
				//print_r($json);
				
				
				
				//echo "<br>";echo "<br>";
				
				
				$discoverTitle="padding:20px 0;color:#ffffff;text-align:center;font-size:30px;font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;";
				$downloadTitle="color:#ffffff;text-align:center;font-size:26px;font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;width:80%;";
				$dealsToTryTitle="color:#003e7d;text-align:center;font-size:22px;font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;";
				$footerHowTo="color:#003e7d;text-align:center;font-size:18px;padding-top:5px;font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;";
				$footerHowTo1="padding:20px 0;color:#003e7d;text-align:center;font-size:20px;font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;";
				$dealTitleStyle="color:#003e7d;text-align:center;font-size:16px;font-family:Segoe,'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;padding-top:5px;padding-bottom:5px;";
				$dealTitleStyle1="color:#003e7d;text-align:center;font-size:16px;font-family:Segoe,'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;";
				$dealDescriptionStyle="color:#003e7d;text-align:center;font-size:14px;font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;padding-top:10px;padding-bottom:10px;";
				$tandcStyle="padding:20px 0;color:#003e7d;text-align:center;font-size:15px;font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;";
				
				$Content='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>ADIB </title>
    <!-- Progressive Enhancements -->
    
  <style type="text/css">
		html,body{
			margin:0 auto !important;
			padding:0 !important;
			height:100% !important;
			width:100% !important;
		}
		*{
			-ms-text-size-adjust:100%;
			-webkit-text-size-adjust:100%;
		}
		div[style*=margin: 16px 0]{
			margin:0 !important;
		}
		table,td{
			mso-table-lspace:0 !important;
			mso-table-rspace:0 !important;
		}
		table{
			border-spacing:0 !important;
			border-collapse:collapse !important;
			table-layout:fixed !important;
			margin:0 auto !important;
		}
		table table table{
			table-layout:auto;
		}
		img{
			-ms-interpolation-mode:bicubic;
		}
		.leftlogo{
			text-align:right;
		}
		.mobile-link--footer a,a[x-apple-data-detectors]{
			color:inherit !important;
			text-decoration:underline !important;
		}
		.button-td,.button-a{
			transition:all 100ms ease-in;
		}
		.button-td:hover,.button-a:hover{
			background:#555555 !important;
			border-color:#555555 !important;
		}
		.textleft{
			text-align:right;
		}
	@media screen and (max-width: 749px){
		.textleft{
			text-align:left;
		}

}	@media screen and (max-width: 749px){
		.leftlogo{
			text-align:center;
		}

}	@media screen and (max-width: 749px){
		.email-container{
			width:100% !important;
			margin:auto !important;
		}

}	@media screen and (max-width: 749px){
		.email-container2{
			width:100% !important;
			font-size:14px !important;
			margin:0 auto !important;
		}

}	@media screen and (max-width: 749px){
		.fluid,.fluid-centered{
			max-width:100% !important;
			height:auto !important;
			margin-left:auto !important;
			margin-right:auto !important;
		}

}	@media screen and (max-width: 749px){
		.fluid-centered{
			margin-left:auto !important;
			margin-right:auto !important;
		}

}	@media screen and (max-width: 749px){
		.stack-column,.stack-column-center{
			display:block !important;
			padding:10px 0 !important;
			width:100% !important;
			max-width:100% !important;
			direction:ltr !important;
		}

}	@media screen and (max-width: 749px){
		.mob{
			padding:0 !important;
		}

}	@media screen and (max-width: 749px){
		.stack-column-center{
			text-align:center !important;
		}

}	@media screen and (max-width: 749px){
		.stack-column{
			text-align:left !important;
		}

}	@media screen and (max-width: 749px){
		.center-on-narrow{
			text-align:center !important;
			display:block !important;
			margin-left:auto !important;
			margin-right:auto !important;
			float:none !important;
		}

}	@media screen and (max-width: 749px){
		table.center-on-narrow{
			display:inline-block !important;
		}

}	@media screen and (max-width: 749px){
		.terms{
			margin:0 !important;
			padding:0 0 0 15px !important;
		}

}	@media screen and (max-width: 749px){
		.none{
			display:none !important;
		}

}	@media screen and (max-width: 749px){
		.footer-icon{
			width:48% !important;
			display:inline-block !important;
			padding:5px 0;
		}

}	@media screen and (max-width: 749px){
		.no-padding{
			padding:0 !important;
		}

}	@media screen and (max-width: 749px){
		.font{
			padding:10px !important;
			width:auto !important;
		}

}	@media screen and (max-width: 749px){
		.app-icon{
			display:block;
			padding-left:7px;
			padding-bottom:7px;
		}

}		.terms{
			text-align:left !important;
			direction:ltr !important;
		}
</style></head>
  <body style="margin: 0;">
    
    <!-- Email Body : BEGIN -->
    <table width="750" border="0" align="center" cellpadding="0" cellspacing="0" style="margin:0 auto;" class="email-container">
      <tr>
        <td class="stack-column mob">
          <img src="https://mcusercontent.com/5cbc0abd37/images/e41073ea-a669-4af6-b3a1-38b46feb6808.jpg" border="0" alt="" class="fluid">
        </td>
      </tr>
      <tr>
        <td style="'.$discoverTitle.'" class="stack-column-center" bgcolor="#003e7d">
          <strong>Discover top dining offers<br>across the UAE</strong>
        </td>
      </tr>
      <tr>
        <td style="padding:10px 40px 0 40px;text-align:center;" class="stack-column-center" bgcolor="#2d87c4">
          <a href="http://adib.ae/en/m/Pages/smartdeals-app.aspx" style="color:#fff;text-decoration:none;">
          </a>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
              <tr>
                <td align="left" class="stack-column-center mob" style="text-align:left;width:20%;">
                  <img src="https://mcusercontent.com/5cbc0abd37/images/537a036b-d289-4a3c-af69-3a1dfaf40f2d.jpg" border="0" alt="" class="fluid phone1">
                </td>
                <td style="'.$downloadTitle.'" class="stack-column-center">
                  <strong>Download the free smartdeals app with 1000+ offers today</strong>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td class="stack-column-center mob" bgcolor="#eaeaea" align="center" style="background-color:#eaeaea;padding:10px 0px;">
          
          
          
          <table width="100%" border="0" cellspacing="0" cellpadding="0" style="text-align:center;">
            <tbody>
              <tr>
                <td style="" dir="rtl">
                  <strong style="'.$dealsToTryTitle.'">
                    Great Deals to try this week
                  </strong>
                  <img src="https://mcusercontent.com/5cbc0abd37/images/b3fa4a39-030f-4323-935e-cc568d9dba7d.png" border="0" alt="" class="fluid" style="text-align: right;vertical-align: middle">
                </td>
                
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td class="stack-column-center" align="center" style="padding:20px 40px;" bgcolor="#466693">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
              <tr>
                <td style="padding:20px 0;" class="stack-column-center">
                  <table width="95%" border="0" cellspacing="0" cellpadding="0" style="background-color:#fff;">
                    <tr>
                     <td a lign="center" style="'.$dealTitleStyle.'" class="stack-column-center">
                        <strong style="'.$dealTitleStyle1.'">'.$offer1.'</strong>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" style="'.$dealDescriptionStyle.'" class="stack-column-center mob">
                        <img src="'.$offer1URl.'" border="0" alt="" class="fluid" width="100%" height="auto">
                      </td>
                    </tr>
                    <tr>
                      <td align="center" style="'.$dealDescriptionStyle.'" class="stack-column-center">
                        '.$offer1Desc.' </td>
                      </tr>
                    </table>
                  </td>
                  <td align="center" style="padding:20px 0;text-align:center;" class="stack-column-center">
                    
                    
                    <table width="95%" border="0" cellspacing="0" cellpadding="0" style="background-color:#fff;">
                      <tr>
                        <td a lign="center" style="'.$dealTitleStyle.'" class="stack-column-center">
                          <strong style="'.$dealTitleStyle1.'">'.$offer2.'</strong>
                        </td>
                      </tr>
                      <tr>
                      <td align="center" style="'.$dealDescriptionStyle.'" class="stack-column-center mob">
                        <img src="'.$offer2URl.'" border="0" alt="" class="fluid" width="100%" height="auto">
                      </td>
                    </tr>
                     <tr>
                      <td align="center" style="'.$dealDescriptionStyle.'" class="stack-column-center">
                        '.$offer2Desc.' </td>
                      </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding:20px 0;" class="stack-column-center">
                      <table width="95%" border="0" cellspacing="0" cellpadding="0" style="background-color:#fff;">
                        <tr>
                        <td a lign="center" style="'.$dealTitleStyle.'" class="stack-column-center">
                          <strong style="'.$dealTitleStyle1.'">'.$offer3.'</strong>
                        </td>
                      </tr>
                      <tr>
                      <td align="center" style="'.$dealDescriptionStyle.'" class="stack-column-center mob">
                        <img src="'.$offer3URl.'" border="0" alt="" class="fluid" width="100%" height="auto">
                      </td>
                    </tr>
                     <tr>
                      <td align="center" style="'.$dealDescriptionStyle.'" class="stack-column-center">
                        '.$offer3Desc.' </td>
                      </tr>
                      </table>
                    </td>
                    <td align="center" style="padding:20px 0;text-align:center;" class="stack-column-center">
                      
                      
                      <table width="95%" border="0" cellspacing="0" cellpadding="0" style="background-color:#fff;">
                        <tr>
                        <td a lign="center" style="'.$dealTitleStyle.'" class="stack-column-center">
                          <strong style="'.$dealTitleStyle1.'">'.$offer4.'</strong>
                        </td>
                      </tr>
                      <tr>
                      <td align="center" style="'.$dealDescriptionStyle.'" class="stack-column-center mob">
                        <img src="'.$offer4URl.'" border="0" alt="" class="fluid" width="100%" height="auto">
                      </td>
                    </tr>
                     <tr>
                      <td align="center" style="'.$dealDescriptionStyle.'" class="stack-column-center">
                        '.$offer4Desc.' </td>
                      </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:20px 0;" class="stack-column-center">
                        <table width="95%" border="0" cellspacing="0" cellpadding="0" style="background-color:#fff;">
                          <tr>
                        <td a lign="center" style="'.$dealTitleStyle.'" class="stack-column-center">
                          <strong style="'.$dealTitleStyle1.'">'.$offer5.'</strong>
                        </td>
                      </tr>
                      <tr>
                      <td align="center" style="'.$dealDescriptionStyle.'" class="stack-column-center mob">
                        <img src="'.$offer5URl.'" border="0" alt="" class="fluid" width="100%" height="auto">
                      </td>
                    </tr>
                     <tr>
                      <td align="center" style="'.$dealDescriptionStyle.'" class="stack-column-center">
                        '.$offer5Desc.' </td>
                      </tr>
                        </table>
                      </td>
                      <td style="padding:20px 0;" class="stack-column-center">
                        <table width="95%" border="0" cellspacing="0" cellpadding="0" style="background-color:#fff;">
                          <tr>
                        <td a lign="center" style="'.$dealTitleStyle.'" class="stack-column-center">
                          <strong style="'.$dealTitleStyle1.'">'.$offer6.'</strong>
                        </td>
                      </tr>
                      <tr>
                      <td align="center" style="'.$dealDescriptionStyle.'" class="stack-column-center mob">
                        <img src="'.$offer6URl.'" border="0" alt="" class="fluid" width="100%" height="auto">
                      </td>
                    </tr>
                     <tr>
                      <td align="center" style="'.$dealDescriptionStyle.'" class="stack-column-center">
                        '.$offer6Desc.' </td>
                      </tr>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr>
                <td style="padding:20px;" align="center" class="stack-column-center">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                      <tr>
                        <td colspan="3" style="'.$footerHowTo1.'" class="stack-column-center">
                          <strong>How to get these offers</strong>
                        </td>
                      </tr>
                      <tr>
                        <td style="padding:20px 0;" class="stack-column-center">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                              <tr>
                                <td align="center" style="text-align:center;" class="stack-column-center">
                                  <img src="https://mcusercontent.com/5cbc0abd37/images/b1def0db-17e3-43b9-a8f1-b0bfe06edd48.jpg" border="0" alt="" class="fluid">
                                </td>
                              </tr>
                              <tr>
                                <td align="center" style="'.$footerHowTo.'" class="stack-column-center">
                                  <strong style="'.$footerHowTo.'">Step 1</strong>
                                  <br>
                                  <br><a href="http://adib.ae/en/m/Pages/smartdeals-app.aspx" style="color:#003e7d;text-decoration:none;">Download the<br><span style="color:#00aeef;">smart</span>deals App</a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                        <td style="padding:20px 0;" class="stack-column-center">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                              <tr>
                                <td align="center" style="text-align:center;" class="stack-column-center"><img src="https://mcusercontent.com/5cbc0abd37/images/8dd3afe7-7b2a-4128-bb3b-208f1c3b36d4.jpg" border="0" alt="" class="fluid">
                                </td>
                              </tr>
                              <tr>
                                <td align="center" style="'.$footerHowTo.'" class="stack-column-center">
                                  <strong style="'.$footerHowTo.'">Step 2</strong>
                                  <br>
                                  <br>
                                  Visit any offer<br>location and enjoy
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                        <td style="padding:20px 0;" class="stack-column-center">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                              <tr>
                                <td align="center" style="text-align:center;" class="stack-column-center"><img src="https://mcusercontent.com/5cbc0abd37/images/e34f4753-d275-4b2e-ad2f-948c57fa53e8.jpg" border="0" alt="" class="fluid">
                                </td>
                              </tr>
                              <tr>
                                <td align="center" style="'.$footerHowTo.'" class="stack-column-center">
                                  <strong style="'.$footerHowTo.'">Step 3</strong>
                                  <br>
                                  <br>
                                  Use your<br>ADIB Card</td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td style="padding:20px;" class="stack-column-center">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td align="right" class="stack-column-center" style="padding-right:5px;text-align:right;">
                            <a href="https://appsto.re/ca/KhCl6.i"><img src="https://mcusercontent.com/5cbc0abd37/images/1f418c32-8062-43aa-ae2e-603b9bde2bdd.jpg" border="0" alt="" class="fluid"></a>
                          </td>
                          <td align="left" class="stack-column-center" style="padding-left:5px;text-align:left;">
                            <a href="https://play.google.com/store/apps/details?id=com.adib.traveller"><img src="https://mcusercontent.com/5cbc0abd37/images/d23c294f-cb37-427b-abce-8069561b42ee.jpg" border="0" alt="" class="fluid"></a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td>
                    <hr size="1">
                  </td>
                </tr>
                <tr>
                  <td style="text-align:center;padding:0 20px 20px 20px;" class="stack-column-center">
                    <table width="100%" border="0" cellspacing="0" cellpadding="1">
                      <tbody>
                        <tr>
                          <td class="footer-icon" style="text-align:left;">
                            <a href="http://www.adib.ae/en/"><img src="https://mcusercontent.com/5cbc0abd37/images/29fb7e74-0607-4d56-9b0d-e4b861e0a819.jpg" border="0" alt=""></a>
                          </td>
                          <td class="footer-icon" style="text-align:left;">
                            <a href="https://www.facebook.com/ADIB/"><img src="https://mcusercontent.com/5cbc0abd37/images/ca96c6c3-c49e-4ab4-bd0c-6fc3b5af9d80.jpg" border="0" alt=""></a>
                          </td>
                          <td class="footer-icon" style="text-align:left;">
                            <a href="https://www.instagram.com/adib_bank/"><img src="https://mcusercontent.com/5cbc0abd37/images/b17909b4-54a7-436d-8c69-bfab9d8fe750.jpg" border="0" alt=""></a>
                          </td>
                          <td class="footer-icon" style="text-align:left;">
                            <a href="https://twitter.com/adibtweets"><img src="https://mcusercontent.com/5cbc0abd37/images/3ec74d59-7169-4449-9490-45ab234ba21f.jpg" border="0" alt=""></a>
                          </td>
                          <td class="footer-icon" style="text-align:left;"><img src="https://mcusercontent.com/5cbc0abd37/images/1112655b-f56c-416d-bd50-683737d204af.jpg" border="0" alt="">
                          </td>
                          <td class="footer-icon" style="text-align:left;"><img src="https://mcusercontent.com/5cbc0abd37/images/35f5563e-5b53-4b55-9715-cb15b677fd49.jpg" border="0" alt="">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td style="padding:20px;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td colspan="3" style="'.$tandcStyle.'" class="stack-column-center">
                            <strong>*Terms and Conditions Apply</strong>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </table>
            </body>
</html>';
$TagCode = '<body>'.$Content.'</body>';


$Filename=$directoryName."/".$customerID."_email.html";
$Mode='w';

$File = fopen($Filename, $Mode);

$Status = fwrite($File, $Content);


				
			

				
			 
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }
}

$zipname='zips/'.time().'_zippedTemplates.zip';

new GoodZipArchive($directoryName.'/',$zipname) ;

if (isset($_POST["import"])) {

$file_url = 'zips/';
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=\"" . basename($zipname) . "\""); 
readfile($zipname); 

}


/* function cleanData(&$str)
  {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
	if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }
  


$flag = false;
  foreach($data as $row) {
    if(!$flag) {
      // display field/column names as first row
      echo implode("\t", array_keys($row)) . "\r\n";
      $flag = true;
    }
	array_walk($row, __NAMESPACE__ . '\cleanData');
    echo implode("\t", array_values($row)) . "\r\n";
  }
  exit; */


?>
// Initialize the session
/* session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 */
//print_r($response);
?>




<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="au theme template">
	<meta name="author" content="Hau Nguyen">
	<meta name="keywords" content="au theme template">

	<!-- Title Page-->
	<title>Modal</title>

	<!-- Fontfaces CSS-->
	<link href="css/font-face.css" rel="stylesheet" media="all">
	<link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
	<link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
	<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

	<!-- Bootstrap CSS-->
	<link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

	<!-- Vendor CSS-->
	<link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
	<link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
	<link href="vendor/wow/animate.css" rel="stylesheet" media="all">
	<link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
	<link href="vendor/slick/slick.css" rel="stylesheet" media="all">
	<link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
	<link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

	<!-- Main CSS-->
	<link href="css/theme.css" rel="stylesheet" media="all">
	
	

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            


			<!-- MAIN CONTENT-->
			<div class="main-content">
				<div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">	</div>
                                    <div class="card-body">
                                        <div class="card-title">
											<center><img src="images/icon/logo_large.png" style="height:65px" alt="androidlogo"></img></center><br>
                                            <h3 class="text-center title-2">Email Campaign Generator</h3>
                                        </div>
                                        <hr>
                                        <form action="excelUploader.php" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                          <center>
											<div class="row form-group">
                                                <div class="col col-md-5">
                                                    <label for="file-input" class="form-control-label">File input (Excel Format)</label>
                                                </div>
                                                <div class="col-12 col-md-7">
                                                    <input type="file" name="file" id="file" accept=".xls,.xlsx" class="form-control-file">
                                                </div>
                                            </div>
                                            </center>
                                            <br>
                                            <div>
                                                <button onclick="change()" id="submit" type="submit" name="import" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Submit FILE</span>
                                                    <span id="payment-button-sending" style="display:none;">Analyzing…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
							
                            
                            
                            
                            
                            
                            
                            
                        </div>
                        
                    </div>
                </div>
			</div>
			<!-- modal small -->
			<div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="smallmodalLabel">Small Modal</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								There are three species of zebras: the plains zebra, the mountain zebra and the Grévy's zebra. The plains zebra and the mountain
								zebra belong to the subgenus Hippotigris, but Grévy's zebra is the sole species of subgenus Dolichohippus. The latter
								resembles an ass, to which it is closely related, while the former two are more horse-like. All three belong to the
								genus Equus, along with other living equids.
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-primary">Confirm</button>
						</div>
					</div>
				</div>
			</div>
			<!-- end modal small -->

			<!-- modal medium -->
			<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="mediumModalLabel">Medium Modal</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								There are three species of zebras: the plains zebra, the mountain zebra and the Grévy's zebra. The plains zebra and the mountain
								zebra belong to the subgenus Hippotigris, but Grévy's zebra is the sole species of subgenus Dolichohippus. The latter
								resembles an ass, to which it is closely related, while the former two are more horse-like. All three belong to the
								genus Equus, along with other living equids.
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-primary">Confirm</button>
						</div>
					</div>
				</div>
			</div>
			<!-- end modal medium -->

			<!-- modal large -->
			<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="largeModalLabel">Large Modal</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								There are three species of zebras: the plains zebra, the mountain zebra and the Grévy's zebra. The plains zebra and the mountain
								zebra belong to the subgenus Hippotigris, but Grévy's zebra is the sole species of subgenus Dolichohippus. The latter
								resembles an ass, to which it is closely related, while the former two are more horse-like. All three belong to the
								genus Equus, along with other living equids.
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-primary">Confirm</button>
						</div>
					</div>
				</div>
			</div>
			<!-- end modal large -->

			<!-- modal scroll -->
			<div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="scrollmodalLabel">Scrolling Long Content Modal</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo
								risus, porta ac consectetur ac, vestibulum at eros.
								<br> Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum
								faucibus dolor auctor.
								<br> Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
								Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.
								<br> Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi
								leo risus, porta ac consectetur ac, vestibulum at eros.
								<br> Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum
								faucibus dolor auctor.
								<br> Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
								Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.
								<br> Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi
								leo risus, porta ac consectetur ac, vestibulum at eros.
								<br> Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum
								faucibus dolor auctor.
								<br> Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
								Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.
								<br> Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi
								leo risus, porta ac consectetur ac, vestibulum at eros.
								<br> Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum
								faucibus dolor auctor.
								<br> Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
								Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.
								<br> Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi
								leo risus, porta ac consectetur ac, vestibulum at eros.
								<br> Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum
								faucibus dolor auctor.
								<br> Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
								Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.
								<br> Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi
								leo risus, porta ac consectetur ac, vestibulum at eros.
								<br> Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum
								faucibus dolor auctor.
								<br> Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
								Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-primary">Confirm</button>
						</div>
					</div>
				</div>
			</div>
			<!-- end modal scroll -->
			<!-- modal static -->
			<div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
			 data-backdrop="static">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Static Modal</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								This is a static modal, backdrop click will not close it.
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-primary">Confirm</button>
						</div>
					</div>
				</div>
			</div>
			<!-- end modal static -->

		</div>
		<!-- END PAGE CONTAINER-->

	</div>

	<!-- Jquery JS-->
	<script src="vendor/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap JS-->
	<script src="vendor/bootstrap-4.1/popper.min.js"></script>
	<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
	<!-- Vendor JS       -->
	<script src="vendor/slick/slick.min.js">
	</script>
	<script src="vendor/wow/wow.min.js"></script>
	<script src="vendor/animsition/animsition.min.js"></script>
	<script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
	</script>
	<script src="vendor/counter-up/jquery.waypoints.min.js"></script>
	<script src="vendor/counter-up/jquery.counterup.min.js">
	</script>
	<script src="vendor/circle-progress/circle-progress.min.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
	<script src="vendor/chartjs/Chart.bundle.min.js"></script>
	<script src="vendor/select2/select2.min.js">
	</script>

	<!-- Main JS-->
	<script src="js/main.js"></script>
	<script>
	function change()
	{
	document.getElementById("test").innerHTML="Analyzing";
	}
	</script>

</body>

</html>
<!-- end document-->