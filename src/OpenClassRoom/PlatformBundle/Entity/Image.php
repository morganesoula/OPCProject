<?php

// src/OpenClassRoom/PlatformBundle/Entity/Image

namespace OpenClassRoom\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Table(name="oc_image")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Image
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @ORM\Column(name="alt", type="string", length=255, nullable=true)
     */
    private $alt;

    /**
     * @var UploadedFile
     */
    private $file;

    private $tempFilename;



    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $alt
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;
    }

    /**
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setFile(UploadedFile $file)
    {
        $this->file = $file;

        if (null !== $this->url)
        {
            $this->tempFilename = $this->url;

            $this->url = null;
            $this->alt = null;
        }
    }

    /**
     * ORM\PrePersist()
     * ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null === $this->file)
        {
            return;
        }

        $this->url = $this->file->guessClientExtension();

        $this->alt = $this->file->getClientOriginalName();
    }

    /**
     * ORM\PostPersist()
     * ORM\PostUpdate()
     */
    public function upload()
    {
        // Cas où il n'y a pas de fichier
        if ($this->file === null)
        {
            return;
        }

        // Si ancien fichier -> Suppression
        if ($this->tempFilename !== null)
        {
            $oldFile = $this->getUploadRootDir().'/'.$this->id.'.'.$this->tempFilename;

            if (file_exists($oldFile))
            {
                unlink($oldFile);
            }
        }

        // Déplacement du fichier envoyé - destination au choix
        $this->file->move(
            $this->getUploadRootDir(),
            $this->id.'.'.$this->url
        );
    }

    /**
     * ORM\PreRemove()
     */
    public function preRemoveUpload()
    {
        $this->tempFilename = $this->getUploadRootDir().'/'.$this->id.'.'.$this->url;
    }


    /**
     * ORM\PostRemove()
     */
    public function removeUpload()
    {
        if (file_exists($this->tempFilename))
        {
            unlink($this->tempFilename);
        }
    }


    public function getUploadDir()
    {
        return 'uploads/img';
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    public function getWebPath()
    {
        return $this->getUploadDir().'/'.$this->getId().'.'.$this->getUrl();
    }

    
}
