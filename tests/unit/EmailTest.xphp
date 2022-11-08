<?php

use CodeIgniter\Email\Email;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Email as ConfigEmail;

/**
 
 * @internal
 */
class EmailTest extends CIUnitTestCase{

    public function testKirimEmail(){
        $email = new Email(new ConfigEmail);
        $email->setFrom('naffiilham@gmail.com');
        $email->setTo('belanjaakunml1@gmail.com');
        $email->setSubject('Test Kirim Email');
        $email->setMessage('Hallo Selamat <b>Datang</b>');

        $this->assertTrue( $email->send() );
    }
}
