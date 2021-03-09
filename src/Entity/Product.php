<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity
 */
class Product implements \JsonSerializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=4, nullable=false)
     */
    private $price;

  
    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="update_at", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $updateAt = 'CURRENT_TIMESTAMP';

    public function getId()
        {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
        //return this;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
        //return this;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
       // return this;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
        //return this;
    }
    public function getCreatedAt()
    {
        return $this->createdAt;
        //return this;
    }
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        //return this;
    }
    public function getUpdateAt()
    {
        return $this->updatedAt;
        //return this;
    }
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;
        //return this;
    }

    public function getURL()
    {
        return $this->url;
        //return this;
    }
    public function setUrl($url)
    {
        $this->url = $url;
        //return this;
    }








    public function JsonSerialize(): array{
        return[
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
        ];
    }
    


}
