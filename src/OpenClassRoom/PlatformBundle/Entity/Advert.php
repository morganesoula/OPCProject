<?php

namespace OpenClassRoom\PlatformBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity(repositoryClass="OpenClassRoom\PlatformBundle\Repository\AdvertRepository")
 */
class Advert
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @ORM\Column(name="published", type="boolean")
     */
    private $published = true;

    /**
     * @ORM\OneToOne(targetEntity="OpenClassRoom\PlatformBundle\Entity\Image", cascade={"persist"})
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity="OpenClassRoom\PlatformBundle\Entity\Category", cascade={"persist"})
     * @ORM\JoinTable(name="oc_advert_category")
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity="OpenClassRoom\PlatformBundle\Entity\Application", mappedBy="advert")
     */
    private $applications;


    /**
     * Advert constructor
     */
    public function __construct()
    {
        // On indique, par défaut, la date du jour pour une annonce
        $this->date = new \DateTime();

        $this->categories = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return Advert
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Advert
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author.
     *
     * @param string $author
     *
     * @return Advert
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author.
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set content.
     *
     * @param string $content
     *
     * @return Advert
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set published.
     *
     * @param bool $published
     *
     * @return Advert
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published.
     *
     * @return bool
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set image.
     *
     * @param \OpenClassRoom\PlatformBundle\Entity\Image|null $image
     *
     * @return Advert
     */
    public function setImage(\OpenClassRoom\PlatformBundle\Entity\Image $image = null)
    {
        $this->image = $image;
    }

    /**
     * Get image.
     *
     * @return \OpenClassRoom\PlatformBundle\Entity\Image|null
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add category.
     *
     * @param \OpenClassRoom\PlatformBundle\Entity\Category $category
     *
     * @return Advert
     */
    public function addCategory(\OpenClassRoom\PlatformBundle\Entity\Category $category)
    {
        $this->categories[] = $category;
    }

    /**
     * Remove category.
     *
     * @param \OpenClassRoom\PlatformBundle\Entity\Category $category
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCategory(\OpenClassRoom\PlatformBundle\Entity\Category $category)
    {
        return $this->categories->removeElement($category);
    }

    /**
     * Get categories.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Add application.
     *
     * @param \OpenClassRoom\PlatformBundle\Entity\Application $application
     *
     * @return Advert
     */
    public function addApplication(\OpenClassRoom\PlatformBundle\Entity\Application $application)
    {
        $this->applications[] = $application;
        $application->setAdvert($this);

        return $this;
    }

    /**
     * Remove application.
     *
     * @param \OpenClassRoom\PlatformBundle\Entity\Application $application
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeApplication(\OpenClassRoom\PlatformBundle\Entity\Application $application)
    {
        return $this->applications->removeElement($application);
    }

    /**
     * Get applications.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getApplications()
    {
        return $this->applications;
    }
}
