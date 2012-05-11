<?php

namespace PhotoPool\PoolBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="category")
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\Column(type="string")
     */
    protected $path;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;

    /**
     * @ORM\ManyToOne(targetEntity="Pool", inversedBy="categories")
     * @ORM\JoinColumn(name="pool_id", referencedColumnName="id")
     */
    protected $pool;

    /**
     * @ORM\OneToMany(targetEntity="Gallery", mappedBy="category")
     */
    protected $galleries;

    public function __toString()
    {
        return $this->getTitle();
    }

    public function __construct()
    {
        $this->galleries = new ArrayCollection();
        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime());
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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set path
     *
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set created
     *
     * @param datetime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * Get created
     *
     * @return datetime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param datetime $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * Get updated
     *
     * @return datetime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Add galleries
     *
     * @param PhotoPool\PoolBundle\Entity\Gallery $galleries
     */
    public function addGallery(\PhotoPool\PoolBundle\Entity\Gallery $galleries)
    {
        $this->galleries[] = $galleries;
    }

    /**
     * Get galleries
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getGalleries()
    {
        return $this->galleries;
    }

    /**
     * Set pool
     *
     * @param PhotoPool\PoolBundle\Entity\Pool $pool
     */
    public function setPool(\PhotoPool\PoolBundle\Entity\Pool $pool)
    {
        $this->pool = $pool;
    }

    /**
     * Get pool
     *
     * @return PhotoPool\PoolBundle\Entity\Pool 
     */
    public function getPool()
    {
        return $this->pool;
    }
}