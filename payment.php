<?php
 $name =$_POST['name'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $amount=$_POST['amount'];
 $purpose='donation';
 
 include 'instamojo/Instamojo.php';
 $api = new Instamojo\Instamojo('test_77fb20c2f235ed25794c4705d93','test_de6434ff7e6f95ba772bacad1dc', 'https://test.instamojo.com/api/1.1/');
 
 try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $purpose,
        "amount" => $amount,
        "send_email" => true,
        "email" => $email,
		"buyer_name"=>$name,
		"phone"	=> $phone,
		"send_sms"=> true,
		"allow_repeated_payments"=> false,
        "redirect_url" => "http://localhost/donatable/thankyou.php"
		//"webhook"=>
        ));
    //print_r($response);
	$pay_url=$response['longurl'];
	header("location:$pay_url");
	}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
	}	
?>