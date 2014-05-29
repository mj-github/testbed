<?php
namespace MJCo\UserBundle\Tests\Models ;

use MJCo\UserBundle\Models\ModelUser ;
use MJCo\UserBundle\Tests\ModelTestCase ;

class ModelUserTest extends \MJCo\UserBundle\Tests\ModelTestCase 
{
	/**
	* @var int
	*/
	private $userid ;

    public function testDefault()
    {
        $user = new ModelUser(null);

        $this->assertEquals( 1 , 1 );
    }

    public function testAddUsers()
    {
        $user = new ModelUser( $this->getContainer()->get('doctrine')->getManager() );
        $this->userid = $user->useradd('Mark');
        $this->assertEquals( 1 , $this->userid );
        $this->userid = $user->manageradd('Dave',10);
        $this->assertEquals( 2 , $this->userid );
    }

    public function testUserlist()
    {
        $user = new ModelUser( $this->getContainer()->get('doctrine')->getManager() );
        $this->userid = $user->useradd('Mark');
        $this->userid = $user->manageradd('Dave',10);
        $userlist = $user->userlist();
     	$this->assertCount(2,$userlist);
    }

}