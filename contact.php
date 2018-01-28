<?php

  $email_to = "contact@wellerindependent.com";
  $email_from = "contact@wellerindependent.com";
  $email_subject = "Contact Request (Weller Independent)";

  $name = $_POST['name']; // required
  $company = $_POST['company']; // required
  $email = $_POST['email']; // required
  $phone = $_POST['phone']; // not required
  $comments = $_POST['details']; // required

  $email_message = "Form details below.\n\n";


  function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
  }

  $email_message .= "Name: ".clean_string($name)."\n";
  $email_message .= "Company: ".clean_string($company)."\n";
  $email_message .= "Email: ".clean_string($email)."\n";
  $email_message .= "Telephone: ".clean_string($phone)."\n";
  $email_message .= "Project Details: ".clean_string($comments)."\n";

  // create email headers
  $headers = 'From: '.$email_from."\r\n".
  'Reply-To: '.$email_from."\r\n";

  // send mail with content
  mail($email_to, $email_subject, $email_message, $headers);

?>
