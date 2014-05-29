<?php
namespace MJCo\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MJCo\UserBundle\Models\ModelUser ;

class DefaultController extends Controller
{
    /**
    * @var MJCo\UserBundle\Models\User ;
    */
    protected $user ;

    protected function init()
    {
        if ( empty($this->user) ) 
        {
            $this->user = new ModelUser( $this->getDoctrine()->getManager() );
        }
    }

    /**
     * @Route("/" , name="_default_index"))
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/userlist", name="_default_userlist"))
     * @Template()
     */
    public function userlistAction()
    {   
        $this->init();
        $users = $this->user->userlist();
        return array('users' => $users);
    }

    /**
     * @Route("/useradd/{name}" , name="_default_useradd")
     * @Template()
     */
    public function useraddAction($name)
    {
        $this->init();
        $id = $this->user->useradd($name);
        return array('name' => "{$id}:$name"  );
    }

    /**
     * @Route("/manageradd/{name}/{level}" , name="_default_manageradd")
     * @Template()
     */
    public function manageraddAction($name,$level)
    {
        $this->init();
        $id = $this->user->manageradd($name,$level);
        // $manager = new Manager();
        // $manager->setName($name);
        // $manager->setLevel($level);
        // $em = $this->getDoctrine()->getManager();
        // $em->persist($manager);
        // $em->flush();        
        return array('name' => "{$id}:$name"  );
    }


}
