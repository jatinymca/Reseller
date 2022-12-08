 #!/usr/bin/php
 
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include  '/var/www/html/ResellerNew/PHPMailer/src/Exception.php';
include '/var/www/html/ResellerNew/PHPMailer/src/PHPMailer.php';
include  '/var/www/html/ResellerNew/PHPMailer/src/SMTP.php';
$dataArray = array();
$finalArray = array();
$mail = new PHPMailer(true);
     
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.zoho.com';                    
        $mail->SMTPAuth   = true; 
        $mail->SMTPDebug = 1;  // debugging: 2 = errors and messages, 2 = messages only                                  
        //$mail->Username   = 'alok.gangwar26@gmail.com';                     
        //$mail->Password   = 'unuolniniyggavle';           
        /*$mail->Username   = 'bipul.singh27@gmail.com';                     
        $mail->Password   = 'varsha@727272';  */
        $mail->Username   = 'dharmender.pal@vert-age.com';                     
        $mail->Password   = 'sP704246@';                               
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
        $mail->Port       = 465;    
        $mail->SMTPSecure = 'ssl';                               

        $mail->setFrom('dharmender.pal@vert-age.com', 'info');
        $mail->addAddress("bipul.singh27@gmail.com", "siddharth");  

       

        $mail->isHTML(true);                              
        $mail->Subject = "test";
        $mail->Body    = "sidd125";
        $mail->send();

       

        $result = array(
                      "Response" => "200",
                      "message" => "Message has been sent"
                  );
    
 

echo json_encode($result);
 

 
 