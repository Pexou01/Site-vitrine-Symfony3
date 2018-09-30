<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * jeux
 *
 * @ORM\Table(name="jeux")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\jeuxRepository")
 */
class jeux
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
     *@ORM\OneToMany(targetEntity="score",mappedBy="jeu")
     * @var type 
     */
    private $score;
    /**
     *@ORM\OneToMany(targetEntity="Comments",mappedBy="jeux")
     * @var type 
     */
    private $comment;
    /**
     * @var string
     *
     * @ORM\Column(name="nom_jeu", type="string", length=75)
     */
    private $nomJeu;


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
     * Set nomJeu
     *
     * @param string $nomJeu
     *
     * @return jeux
     */
    public function setNomJeu($nomJeu)
    {
        $this->nomJeu = $nomJeu;

        return $this;
    }

    /**
     * Get nomJeu
     *
     * @return string
     */
    public function getNomJeu()
    {
        return $this->nomJeu;
    }


    /**
     * Set comment
     *
     * @param \AppBundle\Entity\Comments $comment
     *
     * @return jeux
     */
    public function setComment(\AppBundle\Entity\Comments $comment = null)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return \AppBundle\Entity\Comments
     */
    public function getComment()
    {
        return $this->comment;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->score = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add score
     *
     * @param \AppBundle\Entity\score $score
     *
     * @return jeux
     */
    public function addScore(\AppBundle\Entity\score $score)
    {
        $this->score[] = $score;

        return $this;
    }

    /**
     * Remove score
     *
     * @param \AppBundle\Entity\score $score
     */
    public function removeScore(\AppBundle\Entity\score $score)
    {
        $this->score->removeElement($score);
    }

    /**
     * Get score
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Add comment
     *
     * @param \AppBundle\Entity\Comments $comment
     *
     * @return jeux
     */
    public function addComment(\AppBundle\Entity\Comments $comment)
    {
        $this->comment[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \AppBundle\Entity\Comments $comment
     */
    public function removeComment(\AppBundle\Entity\Comments $comment)
    {
        $this->comment->removeElement($comment);
    }
}
