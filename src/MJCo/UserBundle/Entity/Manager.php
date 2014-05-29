<?php
namespace MJCo\UserBundle\Entity ;

use Doctrine\ORM\Mapping as ORM ;

/**
 * @ORM\Entity
 */
class Manager extends User {
    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $level;
    
    public function getLevel() {
        return $this->level;
    }

    public function setLevel($level) {
        $this->level = $level;
    }


}
