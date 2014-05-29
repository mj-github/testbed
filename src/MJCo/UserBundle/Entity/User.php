<?php
namespace MJCo\UserBundle\Entity ;

use Doctrine\ORM\Mapping as ORM ;

/**
 * @ORM\Entity(repositoryClass="MJCo\UserBundle\Entity\UserRepository")
 * @ORM\Table(name="users")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"user" = "User", "manager" = "Manager"})
 * 
 */
class User
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id ;

    /**
     * @ORM\Column(type="string",length=64)
     */
    protected $name ;


    public function getId(){
    	return $this->id ;
    }

    public function getName() 
    {
    	return $this->name ;
    }

    public function setName($name)
    {
    	$this->name = $name ;
    }
}
