<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='forgotpass.css'>
</head>

<body>
    <div class="login-box">
        <h2>Confirm email</h2>
        <form method="post">
            <div class="user-box">
                <input type="email" name="email" id="email">
                <label for="email">Enter email</label>
            </div>
            <div class="user-box">
                <input type="confrimEmail" name="confirmEmail" required="">
                <label for="confirmEmail">Confirm Email</label>
            </div>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

    <?php
     use PHPMailer\PHPMailer\PHPMailer;
    if (isset($_POST['submit'])) {
       
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        function sendMail()
        {
            $getEmail = $_POST['email'];
            $name = "MARVEL";  // Name of your website or yours
            $to = $getEmail;  // Email of the recipient
            $subject = "RESET PASSWORD";
            $body = "http://localhost/PorjectWEB2/Main/Forgot%20Password/changepassword.php";
            $from = "lirakxhelili@shqiptar.eu";  // Your email address
            $password = "ermali";  // Your email password

            $mail = new PHPMailer();

            //SMTP Settings
            $mail->isSMTP();
            $mail->Host = "smtp.office365.com"; // SMTP address of your email provider
            $mail->SMTPAuth = true;
            $mail->Username = $from;
            $mail->Password = $password;
            $mail->Port = 587;  // Port number
            $mail->SMTPSecure = "STARTTLS";  // Encryption type

            //Email Settings
            $mail->isHTML(true);
            $mail->setFrom($from, $name);
            $mail->addAddress($to);
            $mail->Subject = $subject;
            $mail->Body = $body;

            if ($mail->send()) {
                echo "Email is sent!";
            } else {
                echo "Something went wrong: <br><br>" . $mail->ErrorInfo;
            }
        }

        sendMail();

        // Updated code to fix the errors
        if (isset($_POST['name']) && isset($_POST['phone'])) {
            $name = $_POST['name'];
            $nr = $_POST['phone'];
            
            // The remaining code...
            
            $curl = curl_init();
            $postData = [
                "message" => "Dear $name, thank you for registration",
                "to" => $nr,
                "sender_id" => "SEMS",
                "callback_url" => "https://example.com/callback/handler"
            ];
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.sms.to/sms/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($postData),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2F1dGg6ODA4MC9hcGkvdjEvdXNlcnMvYXBpL2tleS9nZW5lcmF0ZSIsImlhdCI6MTY4MDcyMTE4MiwibmJmIjoxNjgwNzIxMTgyLCJqdGkiOiJrQlp1WHliWExrVUZ0dFJWIiwic3ViIjo0MTcxODgsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.o88w2bLOmxE7jXjAIxp1CsjkWuWFONBg9jli2vQGbDw',
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            echo $response;
        }
    }
    ?>
</body>

</html>
