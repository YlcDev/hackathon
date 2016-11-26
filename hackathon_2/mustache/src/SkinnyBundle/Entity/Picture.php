<?php

namespace SkinnyBundle\Entity;

/**
 * Picture
 */
class Picture
{


    /*
    * A NE PASSER QU'UNE FOIS
    */
    protected function getUploadDir()
    {
        return 'uploads';
    }

    protected function getUploadRootDir()
    {
        return __DIR__ . '/../../../web/' . $this->getUploadDir();
    }

    /*
     * FIN BLOC UNIQUE
     */

    /*
    * AVATAR
    */

    public $file;


    public function preUpload()
    {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $this->avatar = uniqid() . '.' . $this->file->guessExtension();
        }
    }

    public function upload()
    {
        if (null === $this->file) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file->move($this->getUploadRootDir(), $this->avatar);

        unset($this->file);
    }

    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

    public function getWebPath()
    {
        return null === $this->avatar ? null : $this->getUploadDir() . '/' . $this->avatar;
    }

    public function getAbsolutePath()
    {
        return null === $this->avatar ? null : $this->getUploadRootDir() . '/' . $this->avatar;
    }
    
    /*
     * FIN AVATAR
     */

    /*
    * image1
    */

    public $image1;


    public function preUpload2()
    {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $this->image1 = uniqid() . '.' . $this->file->guessExtension();
        }
    }

    public function upload2()
    {
        if (null === $this->file) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file->move($this->getUploadRootDir(), $this->image1);

        unset($this->file);
    }

    public function removeUpload2()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

    public function getWebPath2()
    {
        return null === $this->image1 ? null : $this->getUploadDir() . '/' . $this->image1;
    }

    public function getAbsolutePath2()
    {
        return null === $this->image1 ? null : $this->getUploadRootDir() . '/' . $this->image1;
    }

    /*
     * FIN image1
     */


    /*
    * image2
    */

    public $image2;


    public function preUpload3()
    {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $this->image2 = uniqid() . '.' . $this->file->guessExtension();
        }
    }

    public function upload3()
    {
        if (null === $this->file) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file->move($this->getUploadRootDir(), $this->image2);

        unset($this->file);
    }

    public function removeUpload3()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

    public function getWebPath3()
    {
        return null === $this->image2 ? null : $this->getUploadDir() . '/' . $this->image2;
    }

    public function getAbsolutePath3()
    {
        return null === $this->image2 ? null : $this->getUploadRootDir() . '/' . $this->image2;
    }

    /*
     * FIN image2
     */

    /*
    * image3
    */

    public $image3;


    public function preUpload4()
    {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $this->image3 = uniqid() . '.' . $this->file->guessExtension();
        }
    }

    public function upload4()
    {
        if (null === $this->file) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file->move($this->getUploadRootDir(), $this->image3);

        unset($this->file);
    }

    public function removeUpload4()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

    public function getWebPath4()
    {
        return null === $this->image3 ? null : $this->getUploadDir() . '/' . $this->image3;
    }

    public function getAbsolutePath4()
    {
        return null === $this->image3 ? null : $this->getUploadRootDir() . '/' . $this->image3;
    }

    /*
     * FIN image3
     */

    /*
    * image4
    */

    public $image4;


    public function preUpload5()
    {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $this->image4 = uniqid() . '.' . $this->file->guessExtension();
        }
    }

    public function upload5()
    {
        if (null === $this->file) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file->move($this->getUploadRootDir(), $this->image4);

        unset($this->file);
    }

    public function removeUpload5()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

    public function getWebPath5()
    {
        return null === $this->image4 ? null : $this->getUploadDir() . '/' . $this->image4;
    }

    public function getAbsolutePath5()
    {
        return null === $this->image4 ? null : $this->getUploadRootDir() . '/' . $this->image4;
    }

    /*
     * FIN image4
     */

    /*
    * image5
    */

    public $image5;


    public function preUpload6()
    {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $this->image5 = uniqid() . '.' . $this->file->guessExtension();
        }
    }

    public function upload6()
    {
        if (null === $this->file) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file->move($this->getUploadRootDir(), $this->image5);

        unset($this->file);
    }

    public function removeUpload6()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

    public function getWebPath6()
    {
        return null === $this->image5 ? null : $this->getUploadDir() . '/' . $this->image5;
    }

    public function getAbsolutePath6()
    {
        return null === $this->image5 ? null : $this->getUploadRootDir() . '/' . $this->image5;
    }

    /*
     * FIN image5
     */
    
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $avatar;

    

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
     * Set avatar
     *
     * @param string $avatar
     *
     * @return Picture
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set image1
     *
     * @param string $image1
     *
     * @return Picture
     */
    public function setImage1($image1)
    {
        $this->image1 = $image1;

        return $this;
    }

    /**
     * Get image1
     *
     * @return string
     */
    public function getImage1()
    {
        return $this->image1;
    }

    /**
     * Set image2
     *
     * @param string $image2
     *
     * @return Picture
     */
    public function setImage2($image2)
    {
        $this->image2 = $image2;

        return $this;
    }

    /**
     * Get image2
     *
     * @return string
     */
    public function getImage2()
    {
        return $this->image2;
    }

    /**
     * Set image3
     *
     * @param string $image3
     *
     * @return Picture
     */
    public function setImage3($image3)
    {
        $this->image3 = $image3;

        return $this;
    }

    /**
     * Get image3
     *
     * @return string
     */
    public function getImage3()
    {
        return $this->image3;
    }

    /**
     * Set image4
     *
     * @param string $image4
     *
     * @return Picture
     */
    public function setImage4($image4)
    {
        $this->image4 = $image4;

        return $this;
    }

    /**
     * Get image4
     *
     * @return string
     */
    public function getImage4()
    {
        return $this->image4;
    }

    /**
     * Set image5
     *
     * @param string $image5
     *
     * @return Picture
     */
    public function setImage5($image5)
    {
        $this->image5 = $image5;

        return $this;
    }

    /**
     * Get image5
     *
     * @return string
     */
    public function getImage5()
    {
        return $this->image5;
    }
}
