<?php

use CodeIgniter\Email\Email;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Email as ConfigEmail;

/**
 * @internal
 */
class EmailTest extends CIUnitTestCase{

    public function testKirimEmail(){
        $email = new Email( new ConfigEmail());
        $email ->setFrom(naffiilham@gmail.com);
        $email ->setTo(ubsi.pnk303@gmail.com);
        $email ->setSubject(Testing Kirim Email);
        $email ->setMessage(Hallo nama saya ilham <b>Testing</b>);

        $this->assertTrue( $email->send())
    }
}

