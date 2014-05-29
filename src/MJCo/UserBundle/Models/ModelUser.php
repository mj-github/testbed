<?php
namespace MJCo\UserBundle\Models;

use Doctrine\ORM\EntityManager;
use MJCo\UserBundle\Entity\User ;
use MJCo\UserBundle\Entity\Manager ;

class ModelUser {

	protected $em ;

	/**
	 * Doctrine EM needed for all functions
	 * @todo Hook into events instead
	 * 
	 * @param DoctrineORMEntityManager $entitymanager
	 */
	public function __construct( \Doctrine\ORM\EntityManager $entitymanager )
	{
        $this->em = $entitymanager ;
	}

	public function userlist()
	{
        $userrepository = $this->em->getRepository('MJCo\UserBundle\Entity\User');
        $users = $userrepository->getUsers();

        return $users ;
	}

	public function useradd($name)
	{
        $user = new User() ;
        $user->setName($name);
        $this->em->persist($user);
        $this->em->flush();
        return $user->getId() ;
	}

	public function manageradd($name,$level)
	{
        $manager = new Manager();
        $manager->setName($name);
        $manager->setLevel($level);
        $this->em->persist($manager);
        $this->em->flush();        
        return $manager->getId();
	}


}