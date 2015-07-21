<?php

namespace Vacatia\RedirectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Redirect
 *
 * @ORM\Entity
 * @ORM\Table(name="redirect")
 * @UniqueEntity(fields={"oldUrl"}, message="That URL already exists.")
 */
class Redirect
{
    const TYPE_VACATIA = 1;
    const TYPE_VRBO = 2;
    const TYPE_NAMES = array(
        self::TYPE_VACATIA => 'Vacatia',
        self::TYPE_VRBO => 'VRBO',
    );

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="old_url", type="string", length=500, nullable=false)
     */
    protected $oldUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="new_url", type="string", length=500, nullable=false)
     */
    protected $newUrl;

    /**
     * @var int
     *
     * @ORM\Column(name="http_status_code", type="integer", nullable=false)
     */
    protected $httpStatusCode = 301;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_regex", type="boolean", options={"default" = 0})
     */
    private $isRegex = false;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="smallint", nullable=false, options={"default" = 1})
     */
    protected $type = 1;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set oldUrl
     *
     * @param string $oldUrl
     * @return Redirect
     */
    public function setOldUrl($oldUrl)
    {
        $this->oldUrl = $oldUrl;

        return $this;
    }

    /**
     * Get oldUrl
     *
     * @return string
     */
    public function getOldUrl()
    {
        return $this->oldUrl;
    }

    /**
     * Set newUrl
     *
     * @param string $newUrl
     * @return Redirect
     */
    public function setNewUrl($newUrl)
    {
        $this->newUrl = $newUrl;

        return $this;
    }

    /**
     * Get newUrl
     *
     * @return string
     */
    public function getNewUrl()
    {
        return $this->newUrl;
    }

    /**
     * Set httpStatusCode
     *
     * @param string $httpStatusCode
     * @return Redirect
     */
    public function setHttpStatusCode($httpStatusCode)
    {
        $this->httpStatusCode = $httpStatusCode;

        return $this;
    }

    /**
     * Get httpStatusCode
     *
     * @return string
     */
    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }

    /**
     * Set isRegex
     *
     * @param string $isRegex
     * @return Redirect
     */
    public function setIsRegex($isRegex)
    {
        $this->isRegex = (bool) $isRegex;

        return $this;
    }

    /**
     * Get isRegex
     *
     * @return bool
     */
    public function getIsRegex()
    {
        return $this->isRegex;
    }

    /**
     * Get isRegex
     *
     * @return bool
     */
    public function isRegex()
    {
        return $this->isRegex;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }
}
