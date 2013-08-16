<?php

namespace Vacatia\RedirectBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Vacatia\RedirectBundle\Entity\Redirect as RedirectEntity;

class Redirect
{
    private $em;
    private $container;

    public function __construct(EntityManager $em, ContainerInterface $container)
    {
        $this->em = $em;
        $this->container = $container;
    }

    public function create($oldUrl, $newUrl, $flush = true)
    {
        if (empty($oldUrl) || empty($newUrl) || $oldUrl == $newUrl) {
            return;
        }

        // Remove schemes of urls
        $oldUrl = $this->removeScheme($oldUrl);
        $newUrl = $this->removeScheme($newUrl);

        $redirect = $this->em->getRepository('VacatiaRedirectBundle:Redirect')->findOneByOldUrl($newUrl);

        if (!$redirect) {
            $redirect = new RedirectEntity;
            $redirect->setOldUrl($oldUrl);
            $redirect->setNewUrl($newUrl);

            $this->em->persist($redirect);
        } else {
            $redirect->setNewUrl($newUrl);
        }

        if ($flush === true) {
            $this->em->flush();
        }

        return $redirect;
    }

    protected function removeScheme($url)
    {
        return str_replace(array('https://', 'http://'), '', $url);
    }

}