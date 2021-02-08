<?php

// bootstrap.php

// include Composer for packages/autoloading
require_once __DIR__ . "/vendor/autoload.php";
// bootstrap code
// uses the Application class in the App namespace
$app = new App\Application();
$app->start();

// This creates our first object, and from thenon we just use objects.

// Example of using OOP to send an email:
class Mail
{
    private $to;
    private $from;
    private $subject;
    private $message;
    public function to($to)
    {
        $this->to = $to;
        return $this;
    }
    public function from($from)
    {
        $this->from = $from;
        return $this;
    }
    public function subject($subject)
    {
        $this->subject = $subject;
        return $this;
    }
    public function message($message)
    {
        $this->message = $message;
        return $this;
    }
    public function mail()
    {
    }
}
// ... code to send mail
// we can use $this to access the values

// You’ll notice that all the methods that set a value return $this. As a general rule
// of thumb, if a method doesn’t have anything sensible to return, for example if it
// just sets a value, then you can return $this. $this represents the current object
// instance, which allows you to chain methods together:
$mail = new Mail();
$mail->to("bob@bob.com")
    ->from("hello@wombat.io")
    ->subject("A Wombat Welcome")
    ->message("Welcome to the best app for finding wombats near you")
    ->mail();
// If we returned nothing, we'd get null back instead, which isn't very useful...


// EXAMPLE OF OOP IN ACTION, OBJECTS TALKING TO EACHOTHER:
// A Mail class, and a MailingList class used together to send an email to
// everyone on the mailinglist.

class Mail
{
  private $to;
  private $from;
  private $message;
  private $subject;

  public function to($address)
  {
    $this->to = $address;
    return $this;
  }

  public function from($address)
  {
    $this->from = $address;
    return $this;
  }

  public function subject($subject)
  {
    $this->subject = $subject;
    return $this;
  }

  public function message($message)
  {
    $this->message = $message;
    return $this;
  }

  public function mail()
  {
    // ... sends the mail
    dump("Sending using local mail server: \"{$this->subject}\" to {$this->to}, from {$this->from}, saying {$this->message}");
  }
}

class MailingList
{
    private $subscribers = [];
    public function __construct($subscribers)
    {
        $this->subscribers = $subscribers;
    }
    // the send method takes a mail object as an argument
    public function send($mail)
    {
        // go through each subscriber one at a time
        foreach ($this->subscribers as $subscriber) {
            // use the passed in Mail object
            // update just the to field each time
            // then send the mail
            $mail->to($subscriber)->mail();
        }
    }
}

// create the mailing list
$mailinglist = new MailingList([
    "a@b.com",
    "c@d.com",
    "e@f.com"
]);
// setup the message
$mail = new Mail();
$mail->from("fish@flap.com")
    ->subject("Faces")
    ->message("Hi, I like your face");
// send the message to everyone on the mailing list
$mailinglist->send($mail);