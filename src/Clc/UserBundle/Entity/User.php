<?php
//src/Clc/UserBundle/Entity/User.php
 
namespace Clc\UserBundle\Entity;
 
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
 
/**
 * User
 * 
 * @ORM\Table(name="clc_user")
 * @ORM\Entity(repositoryClass="Clc\UserBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="facebookId", type="string", length=255)
     */
    protected $facebookId;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nickname", type="string", length=255, nullable=true)
     */
    protected $nickname;
    
    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    protected $firstname;
    
    /**
     * @var string
     *
     * @ORM\Column(name="lasttname", type="string", length=255, nullable=true)
     */
    protected $lastname;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nationality", type="string", length=255, nullable=true)
     */
    protected $nationality;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="birthday", type="date", nullable=true)
     */
    protected $birthday;
    
    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    protected $phone;
    
    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    protected $comment;
    
    /**
     * @ORM\ManyToOne(targetEntity="Clc\UserBundle\Entity\profilepicture", cascade={"all"})
     */
    protected $picture;
    
    /**
     * @ORM\ManyToOne(targetEntity="Clc\ColocBundle\Entity\coloc", inversedBy="user", cascade={"persist"})
     */
    protected $coloc;
    
    /**
     * @ORM\OneToMany(targetEntity="Clc\ExpensemanagerBundle\Entity\expense", mappedBy="owner", cascade={"persist"})
     */
    protected $myExpenses;
    
    /**
     * @ORM\ManyToMany(targetEntity="Clc\ExpensemanagerBundle\Entity\expense", mappedBy="users", cascade={"persist"})
     */
    protected $ForMeExpenses;
    
    /**
     * @ORM\ManyToMany(targetEntity="Clc\InboxBundle\Entity\notification", mappedBy="users", cascade={"persist"})
     */
    protected $notifications;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $facebookId
     * @return void
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;
        $this->setUsername($facebookId);
        $this->salt = '';
    }
 
    /**
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }
 
    /**
     * @param Array
     */
    public function setFBData($fbdata) // C'est dans cette méthode que vous ajouterez vos informations
    {
        if (isset($fbdata['id'])) {
            $this->setFacebookId($fbdata['id']);
            $this->addRole('ROLE_FACEBOOK');
        }
        if (isset($fbdata['first_name'])) {
            $this->setFirstname($fbdata['first_name']);
        }
        if (isset($fbdata['last_name'])) {
            $this->setLastname($fbdata['last_name']);
        }
        if (isset($fbdata['email'])) {
            $this->setEmail($fbdata['email']);
        }
    }

    /**
     * Set picture
     *
     * @param \Clc\UserBundle\Entity\profilepicture $picture
     * @return User
     */
    public function setPicture(\Clc\UserBundle\Entity\profilepicture $picture = null)
    {
        $this->picture = $picture;
    
        return $this;
    }

    /**
     * Get picture
     *
     * @return \Clc\UserBundle\Entity\profilepicture 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set users
     *
     * @param \Clc\ColocBundle\Entity\coloc $users
     * @return User
     */
    public function setUsers(\Clc\ColocBundle\Entity\coloc $users = null)
    {
        $this->users = $users;
    
        return $this;
    }

    /**
     * Get users
     *
     * @return \Clc\ColocBundle\Entity\coloc 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set coloc
     *
     * @param \Clc\ColocBundle\Entity\coloc $coloc
     * @return User
     */
    public function setColoc(\Clc\ColocBundle\Entity\coloc $coloc = null)
    {
        $this->coloc = $coloc;
    
        return $this;
    }

    /**
     * Get coloc
     *
     * @return \Clc\ColocBundle\Entity\coloc 
     */
    public function getColoc()
    {
        return $this->coloc;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    
        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set nationality
     *
     * @param string $nationality
     * @return User
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    
        return $this;
    }

    /**
     * Get nationality
     *
     * @return string 
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return User
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    
        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return integer 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return User
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    
        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
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
        parent::__construct();
        $this->myExpenses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ForMeExpenses = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add myExpenses
     *
     * @param \Clc\ExpensemanagerBundle\Entity\expenses $myExpenses
     * @return User
     */
    public function addMyExpense(\Clc\ExpensemanagerBundle\Entity\expense $myExpenses)
    {
        $this->myExpenses[] = $myExpenses;
    
        return $this;
    }

    /**
     * Remove myExpenses
     *
     * @param \Clc\ExpensemanagerBundle\Entity\expenses $myExpenses
     */
    public function removeMyExpense(\Clc\ExpensemanagerBundle\Entity\expense $myExpenses)
    {
        $this->myExpenses->removeElement($myExpenses);
    }

    /**
     * Get myExpenses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMyExpenses()
    {
        return $this->myExpenses;
    }

    /**
     * Add ForMeExpenses
     *
     * @param \Clc\ExpensemanagerBundle\Entity\expenses $forMeExpenses
     * @return User
     */
    public function addForMeExpense(\Clc\ExpensemanagerBundle\Entity\expense $forMeExpenses)
    {
        $this->ForMeExpenses[] = $forMeExpenses;
    
        return $this;
    }

    /**
     * Remove ForMeExpenses
     *
     * @param \Clc\ExpensemanagerBundle\Entity\expenses $forMeExpenses
     */
    public function removeForMeExpense(\Clc\ExpensemanagerBundle\Entity\expense $forMeExpenses)
    {
        $this->ForMeExpenses->removeElement($forMeExpenses);
    }

    /**
     * Get ForMeExpenses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getForMeExpenses()
    {
        return $this->ForMeExpenses;
    }

    /**
     * Set nickname
     *
     * @param string $nickname
     * @return User
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    
        return $this;
    }

    /**
     * Get nickname
     *
     * @return string 
     */
    public function getNickname()
    {
        return $this->nickname;
    }
    
    // override methods for username and tie them with email field

    /**
     * Sets the email.
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->setUsername($email);
        
        $nickname = explode( '@', $email );
        $this->setNickname($nickname[0]);

        return parent::setEmail($email);
    }

    /**
     * Set the canonical email.
     *
     * @param string $emailCanonical
     * @return User
     */
    public function setEmailCanonical($emailCanonical)
    {
        $this->setUsernameCanonical($emailCanonical);

        return parent::setEmailCanonical($emailCanonical);
    }

    /**
     * Add notifications
     *
     * @param \Clc\InboxBundle\Entity\notification $notifications
     * @return User
     */
    public function addNotification(\Clc\InboxBundle\Entity\notification $notifications)
    {
        $this->notifications[] = $notifications;
    
        return $this;
    }

    /**
     * Remove notifications
     *
     * @param \Clc\InboxBundle\Entity\notification $notifications
     */
    public function removeNotification(\Clc\InboxBundle\Entity\notification $notifications)
    {
        $this->notifications->removeElement($notifications);
    }

    /**
     * Get notifications
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNotifications()
    {
        return $this->notifications;
    }
}