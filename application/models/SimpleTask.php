<?php

/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 3/9/2019
 * Time: 11:34 AM
 */
class SimpleTask extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private function sendemail($toEmailID, $fromEmailID, $emailSubject, $emailData, $templateName)
    {
        $this->load->library('email');
        $fromemail=$fromEmailID;
        $toemail = $toEmailID;
        $subject = $emailSubject;
        $data=$emailData;

        $msg = $this->load->view('website/templates/email/'.$templateName,$data,true);


        $config=array(
            'charset'=>'utf-8',
            'wordwrap'=> TRUE,
            'mailtype' => 'html'
        );

        $this->email->initialize($config);

        $this->email->to($toemail);
        $this->email->from($fromemail, "Onlinelaserusa.com");
        $this->email->subject($subject);
        $this->email->message($msg);
        $this->email->attach($data['file']);
        $this->email->send();
    }

    private function sendemail_plaintext($toEmailID, $fromEmailID, $emailSubject, $message)
    {
        $this->load->library('email');
        $fromemail=$fromEmailID;
        $toemail = $toEmailID;
        $subject = $emailSubject;

        $msg = $message;


        $config=array(
            'charset'=>'utf-8',
            'wordwrap'=> TRUE,
            'mailtype' => 'text'
        );

        $this->email->initialize($config);

        $this->email->to($toemail);
        $this->email->from($fromemail, "Contact Request");
        $this->email->subject($subject);
        $this->email->message($msg);
        $this->email->send();
    }


    public function contact_email($name, $surname, $email, $message)
    {
        $subject="Contact Message From ".$name." ".$surname;
        $this->sendemail_plaintext(SUPPORT_EMAIL, $email, $subject, $message);
    }

    public function mail_custom_quote($metalTypeCustomQuote, $firstNameCustomQuote, $lastNameCustomQuote, $emailCustomQuoteRequest, $additional_comments, $overallAreaCustomQuote, $totalQuantityCustomQuote, $thicknessCustomQuote, $uploaded_file)
    {
        $emailData=array(
          'metalType'=>$metalTypeCustomQuote,
          'dimension'=>$overallAreaCustomQuote,
          'thickness'=>$thicknessCustomQuote,
          'quantity'=>$totalQuantityCustomQuote,
          'firstName'=>$firstNameCustomQuote,
          'lastName'=>$lastNameCustomQuote,
          'email'=>$emailCustomQuoteRequest,
          'note'=>$additional_comments,
          'file'=>$uploaded_file
        );

        $this->sendemail(QUOTE_EMAIL, $emailCustomQuoteRequest, "Custom Quote (".uniqid().")", $emailData, 'custom_request');

    }

}