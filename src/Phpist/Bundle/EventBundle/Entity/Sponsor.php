<?php

namespace Phpist\Bundle\EventBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Sponsor
 *
 * @ORM\Table(name="sponsor")
 * @ORM\Entity(repositoryClass="Phpist\Bundle\EventBundle\Repository\SponsorRepository")
 */
class Sponsor
{
    const TYPE_GOLD     = 'gold';
    const TYPE_PLATIN   = 'platin';
    const TYPE_STANDARD = 'standard';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255)
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", columnDefinition="ENUM('gold', 'platin', 'standard')")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="supporter", type="string", length=255)
     */
    private $supporter;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdDate", type="datetime")
     */
    private $createdDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedDate", type="datetime")
     */
    private $updatedDate;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Event", inversedBy="sponsors")
     * @ORM\JoinTable(name="event_sponsor")
     */
    private $events;


    public function __construct() {
        $this->events = new ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     * @return Sponsor
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Sponsor
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return Sponsor
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set type
     *
     * @param $type
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setType($type)
    {
        if (!in_array($type, $this->getTypeList())) {
            throw new \InvalidArgumentException('Invalid status');
        }
        $this->type = $type;

        return $this;

    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }


    public function getTypeList()
    {
        return array(
            self::TYPE_GOLD,
            self::TYPE_PLATIN,
            self::TYPE_STANDARD
        );
    }

    /**
     * Set supporter
     *
     * @param string $supporter
     * @return Sponsor
     */
    public function setSupporter($supporter)
    {
        $this->supporter = $supporter;

        return $this;
    }

    /**
     * Get supporter
     *
     * @return string
     */
    public function getSupporter()
    {
        return $this->supporter;
    }

    /**
     * @param \DateTime $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param \DateTime $updatedDate
     */
    public function setUpdatedDate($updatedDate)
    {
        $this->updatedDate = $updatedDate;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedDate()
    {
        return $this->updatedDate;
    }

    /**
     * Add events
     *
     * @param \Phpist\Bundle\EventBundle\Entity\Event $events
     * @return Sponsor
     */
    public function addEvent(\Phpist\Bundle\EventBundle\Entity\Event $events)
    {
        $this->events[] = $events;
    
        return $this;
    }

    /**
     * Remove events
     *
     * @param \Phpist\Bundle\EventBundle\Entity\Event $events
     */
    public function removeEvent(\Phpist\Bundle\EventBundle\Entity\Event $events)
    {
        $this->events->removeElement($events);
    }

    /**
     * Get events
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEvents()
    {
        return $this->events;
    }
}