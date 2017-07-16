<?php 
include "init.php";

// check if user coming from request

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $name  = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
  $cell  = filter_var($_POST['cellphone'],FILTER_SANITIZE_NUMBER_INT);
  $msg   = filter_var($_POST['message'],FILTER_SANITIZE_STRING);
  
  //creating array of errors
  $form_errors = array();

  if(strlen($name) < 3)
  {
      $form_errors[] = 'username must be larger tha 3 charchers';
  } 

  $headers = 'From: '. $email . '\r\n';
 
// if no errors send the email [ mail( to ,suject,message,headers,paremeters) ]
if(empty($form_errors))
{
    mail('mademeprogrammer3@gmail.com','contact form',$msg,$headers);
     $name  = '';
  $email = '';
  $cell  = '';
  $msg   = '';
  $success = '<div class="alert alert-success ">
                   Email Sended
                </div> ';
  
}
}

?>
    <!--start form-->
    <div class="container">
        <h1 class="text-center">Contact Me</h1>
        <div class="errors">
          
        </div>
        <form class="contact" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
         <?php 
               if(!empty($form_errors))
               {
                    foreach($form_errors as $error)
                    {
                        echo '<div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                        </button>' . $error . '</div>';
                    }
               }
               else
               {
                   echo $success;
               }
           ?>
           <div class="form-group">
             <input
                class="username form-control"
                type="text" 
                name="username" 
                placeholder="Enter your name"
                value="<?php if ( isset($name) ) { echo $name; } ?>"
                required="required"/>
                <i class="fa fa-user fa-fw"></i>
                <span class="asterisx">*</span> 
                <div class="alert alert-danger custom-alert">
                   user name must be larger than <strong> 3 </strong>
                </div> 

            </div>
            <div class="form-group">
             <input 
                class="email form-control" 
                type="email" 
                name="email" 
                placeholder="Enter your Valid Email"
                value="<?php if ( isset($email) ) { echo $email; } ?>"
                required="required"/>
                <i class="fa fa-envelope fa-fw"></i>
                <span class="asterisx">*</span>  
                 <div class="alert alert-danger custom-alert">
                   email ccan\'t be <strong> Empty </strong>
                </div> 

            </div>
             <input 
                class="form-control" 
                type="text" 
                name="cellphone"
                placeholder="Enter your Number"
                value="<?php if ( isset($cell) ) { echo $cell; } ?>"/> 
               <i class="fa fa-phone fa-fw"></i>
             <div class="form-group">
             <textarea class="message form-control"name="message" ></textarea>
              <div class="alert alert-danger custom-alert">
                   Message must be larger than <strong> 10 </strong>
                </div> 

             </div>
             <input 
                class="send btn btn-success" 
                type="submit" name="submit"
                value="send message"/>
                <i class="fa fa-send fa-fw send-icon"></i>
        </form>
    </div>
    <!--end form-->


<?php 
include $tpl . "footer.php";
?>