<?php

Class Mail
{

    private static $_to      = null;
    private $_subject = null;
    private $_message = null;
    private $_headers = null;
    private $_token   = null;


    private function sendMail()
    {
        $result = mail($this->_to, $this->_subject, $this->_message);
        var_dump($result);
        echo error_get_last();
    }

    public function newAccount($user, $mail)
    {
        $this->_to = $mail;
        $this->_subject = "Account confirmation";
        $this->_headers = "From: noreply@camagru.com";
        $this->_message = "Hey $user";
        $this->_token = uniqid('na_' . $user . '_');

        echo $this->_token;

        self::sendMail();
    }

    public function resetPassword($user, $mail)
    {
        $this->_to = $mail;
        $this->_subject = "Reset password";
        $this->_headers = "From: noreply@camagru.com";
        $this->_message = "Hey $user";
        $this->_token = uniqid('rp_' . $user . '_');

        echo $this->_token;

        self::sendMail();
    }

    public function changeMail($user, $mail)
    {
        $this->_to = $mail;
        $this->_subject = "New e-mail";
        $this->_headers = "From: noreply@camagru.com";
        $this->_message = "Hey $user";
        $this->_token = uniqid('cm_' . $user . '_');

        echo $this->_token;

        self::sendMail();
    }

    public static function checkNotif($user)
    {
        $sql = "SELECT `mail_notif` FROM `user` WHERE `username` = :uname";

		$params = array(
			':uname' => $user
        );

        try {
			$handler = Database::pdoQuery($sql, $params);
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
        }
        $query = $handler->fetch();
        echo 'a';
        var_dump($query);
        echo $query[0];
		return ($query[0]);
    }
}