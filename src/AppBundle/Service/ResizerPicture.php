<?php


namespace AppBundle\Service;

use Doctrine\ORM\EntityManagerInterface;
use \Gumlet\ImageResize;
use Cocur\Slugify\Slugify;

class ResizerPicture
{
    private $projectDir;
    private $em;

    public function __construct($projectDir, EntityManagerInterface $em)
    {
        $this->projectDir = $projectDir;
        $this->em = $em;
    }
    public function handlerImage($data, $width, $height)
    {
        $slugify = new Slugify();
        foreach ($data as $key => $value) {
            $imageNameOriginal = $value->getImageName();
            $imagePath =$this->projectDir.'upload/' . $imageNameOriginal;
            $ext = pathinfo($imagePath, PATHINFO_EXTENSION);
            $imageName = basename($imagePath,".".$ext);

            if ($imageNameOriginal !=  $slugify->slugify($imageName).'.'.$ext)
            {
                rename( $this->projectDir.'/web/upload/' .  $imageNameOriginal,$this->projectDir.'/web/upload/' .$slugify->slugify($imageName).'.'.$ext);
                $value->setImageName( $slugify->slugify($imageName).'.'.$ext);
                $this->em->persist($value);
                $this->em->flush();
            }
            if (!is_dir($this->projectDir.'/web/upload/imageGameResize')) {
                mkdir($this->projectDir.'/web/upload/imageGameResize', 0777, true);
            }

            if (!file_exists($this->projectDir.'/web/upload/imageGameResize/' . $slugify->slugify($imageName).'.'.$ext)) {
                $image = new ImageResize('upload/' . $imageNameOriginal);
                $image->resize($width, $height);
                $image->save($this->projectDir.'/web/upload/imageGameResize/' . $slugify->slugify($imageName).'.'.$ext);
            }
        }
    }
}