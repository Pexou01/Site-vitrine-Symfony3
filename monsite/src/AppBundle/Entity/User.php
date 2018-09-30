<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="username", type="string", length=25)
     */
    private $username;

    /**
     * @ORM\Column(name="password", type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;
    
    /**
     *@ORM\ManyToMany(targetEntity="telephone", mappedBy="user")
     * @var type 
     */
    private $telephone;
    /**
     *@ORM\ManyToOne(targetEntity="villes", inversedBy="user")
     * @var type 
     */
    private $ville;
    
    /**
     * lien entre la table score avec une relation OneToMany car un utilisateur peu avoir plusieur score 
     * mes 1 score et lier a un seul utilisateur il prend 2 argument le premier le nom de l'entity viser le 2 eme et le nom
     * qui sera dans la table score 
     * @ORM\OneToMany(targetEntity="score", mappedBy="username")
     */
    private  $score;
    /**
     *
     * @ORM\OneToMany(targetEntity="Comments",mappedBy="user")
     */
    private  $comment;
    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username) {
        $this->username = $username;

        return $this;
    }

    /**
     * Set password
     *
     * @param password $password
     *
     * @return User
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    public function getUsername() {
        return $this->email;
    }

    public function getSalt() {
        return null;
    }

    public function getRoles() {
        return array('ROLE_USER');
    }

    public function eraseCredentials() {
        
    }

    public function serialize() {
        return serialize(array($this->id, $this->username, $this->password,));
    }

    public function unserialize($serialized) {
        list ( $this->id, $this->username, $this->password ) = unserialize($serialized);
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->score = new \Doctrine\Common\Collections\ArrayCollection();
        $this->score_2 = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add score
     *
     * @param \AppBundle\Entity\score $score
     *
     * @return User
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
     * @return User
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

    /**
     * Get comment
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComment()
    {
        return $this->comment;
    }


    /**
     * Add telephone
     *
     * @param \AppBundle\Entity\telephone $telephone
     *
     * @return User
     */
    public function addTelephone(\AppBundle\Entity\telephone $telephone)
    {
        $this->telephone[] = $telephone;

        return $this;
    }

    /**
     * Remove telephone
     *
     * @param \AppBundle\Entity\telephone $telephone
     */
    public function removeTelephone(\AppBundle\Entity\telephone $telephone)
    {
        $this->telephone->removeElement($telephone);
    }

    /**
     * Get telephone
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set ville
     *
     * @param \AppBundle\Entity\villes $ville
     *
     * @return User
     */
    public function setVille(\AppBundle\Entity\villes $ville = null)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return \AppBundle\Entity\villes
     */
    public function getVille()
    {
        return $this->ville;
    }
}
