<?php

use CodeIgniter\test\CIUnitTestCase;
use CodeIgniter\test\FeatureTestTrait;

/**
 * @internal
 */

class PenggunahotelTest extends CIUnitTestCase{
    
    use FeatureTestTrait;

    public function testLogin(){
        $this->call('post', 'login', [
            'email'     => 'syarifihsan17@gmail.com',
            'sandi'     => '123456'
        ])->assertStatus(404);
    }

    public function testCreateShowUpdateDelete(){
        $json = $this->call( 'post', 'Penggunahotel', [
            'nama_depan'      => 'Testing nama',
            'gender'    => 'L',
            'email'     => 'testing@gmail.com',
            'sandi'     => 'testing'
        ])->getJSON();
        $js = json_decode($json, true);
       
        $this->assertTrue($js['id'] > 0);

        $this->call('get', "Penggunahotel/" .$js['id'])
             ->assertStatus(200);

        $this->call('patch', 'Penggunahotel', [
            'nama_depan'      => 'Testing pengguna update',
            'gender'    => 'L',
            'email'     => 'testingupdate@gmail.com',
            'id'        => $js['id']
        ])->assertStatus(200);

        $this->call('delete', 'Penggunahotel', [
            'id'        => $js['id']
        ])->assertStatus(200);
    }    
        
    public function testRead(){
        $this->call('get', 'Penggunahotel/all')
             ->assertStatus(200);
    }

    public function testLogout(){
        $this->call('delete', 'login')
             ->assertStatus(302);
    } 
}