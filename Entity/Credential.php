<?php

namespace Tahoe\CredentialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Credential
 *
 * @author Konrad Podgórski <konrad.podgorski@gmail.com>
 */
class Credential
{
    /**
     * @var integer
     */
    protected $id;
    /**
     * @var string
     */
    protected $readToken;
    /**
     * @var string
     */
    protected $writeToken;
    /**
     * @var array
     */
    protected $data;

    public function __construct()
    {
        $this->data = array();
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
     * @return string
     */
    public function getReadToken()
    {
        return $this->readToken;
    }

    /**
     * @param string $readToken
     *
     * @return $this
     */
    public function setReadToken($readToken)
    {
        $this->readToken = $readToken;

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return string
     */
    public function getWriteToken()
    {
        return $this->writeToken;
    }

    /**
     * @param string $writeToken
     *
     * @return $this
     */
    public function setWriteToken($writeToken)
    {
        $this->writeToken = $writeToken;

        return $this;
    }
}
