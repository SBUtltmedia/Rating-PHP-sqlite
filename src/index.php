<?php

// print_r($_POST);
// exit;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//IVQ outside of bookMaker
session_start();
if(array_key_exists("lis_person_name_given", $_POST)){
        $_SESSION['mail']= $_POST['lis_person_contact_email_primary'];
        $_SESSION['givenName']= $_POST['lis_person_name_given'];
        $_SESSION['nickname']=  $_POST['lis_person_name_given'];;
        $_SESSION['sn']=  $_POST['lis_person_name_family'];
        $JSON_POST=json_encode($_POST);
        print <<<EOT
                <script src="js/grading.js"></script>
                <script>
              var  ses=$JSON_POST;
        </script>
EOT;
}
#else if(array_key_exists("mail",$_SESSION)){
else if(isset($_SESSION['mail'])){
    
}
else{
        if (!isset($_SERVER['cn']) && file_exists(".htaccess")){
                $server= $_SERVER['SERVER_NAME'];
                $target = "https://{$server}{$_SERVER['REQUEST_URI']}";
header("Location: /shib/?shibtarget=$target");        
}
}

?>

<script>

    				ses.grade= 0.75;

				postLTI(ses,"userData").then((result)=>{
                    console.log(result);
						if (!result.match(/success/g)){
						// setTimeout(()=>{
                            // location.reload
                            // window.parent.location.reload()
						// },0);
						 	
						}
						});	
</script>