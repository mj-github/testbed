<?php
namespace MJCo\UserBundle\Entity ;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    /**
     * 
     * @return array
     */
    public function getUsers()
    {
        $dql = "SELECT u FROM MJCo\\UserBundle\\Entity\\User u";

        $users = $this->getEntityManager()->createQuery($dql)->getArrayResult() ;
        return $users;
    }
            
}
