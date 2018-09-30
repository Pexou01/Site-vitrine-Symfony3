<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * score
 *
 * @ORM\Table(name="score")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\scoreRepository")
 */
class score
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="jeux", inversedBy="score")
     * @var type 
     */
    private $jeu;
    
    /**
     *  a l'inverse de l'entity user onfait la relation avec ManyToOne car le score et lier à 1 utilisateur il prend  
     * 2 argument aussi le premier le nom de l'entity  viser le 2eme et le nom de l'élément choisi
     * @ORM\ManyToOne(targetEntity="User", inversedBy="score")
     */
    private $username;
   
    

    function getUsername() {
        return $this->username;
    }

    function setUsername($username) {
        $this->username = $username;
    }

        /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return score
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

  
  

    /**
     * Set jeu
     *
     * @param \AppBundle\Entity\jeux $jeu
     *
     * @return score
     */
    public function setJeu(\AppBundle\Entity\jeux $jeu = null)
    {
        $this->jeu = $jeu;

        return $this;
    }

    /**
     * Get jeu
     *
     * @return \AppBundle\Entity\jeux
     */
    public function getJeu()
    {
        return $this->jeu;
    }
}
