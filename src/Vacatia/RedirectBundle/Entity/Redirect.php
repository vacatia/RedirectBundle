<?php

namespace Vacatia\RedirectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * Redirect
 *
 * @ORM\Entity
 * @ORM\Table(name="redirect", uniqueConstraints={@UniqueConstraint(name="old_url_unique", columns={"old_url"})})
 */
class Redirect
{
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
     * @ORM\Column(name="old_url", type="string", length=255, nullable=false)
     */
    protected $oldUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="new_url", type="string", length=255, nullable=false)
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
}