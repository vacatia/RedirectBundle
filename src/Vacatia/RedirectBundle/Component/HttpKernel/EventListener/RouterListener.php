<?php

namespace Vacatia\RedirectBundle\Component\HttpKernel\EventListener;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Symfony\Component\HttpKernel\EventListener\RouterListener as BaseRouterListener;

class RouterListener extends BaseRouterListener
{
    private $em;

    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        try {
            parent::onKernelRequest($event);
        } catch(NotFoundHttpException $e) {
            $request = $event->getRequest();
            $url = str_replace(array('https://', 'http://'), '', $request->getUri());

            // Do a lookup for a Redirect entity who's old_url matches that of this request
            $redirect = $this->em->getRepository('VacatiaRedirectBundle:Redirect')->findOneByOldUrl($url);

            // If found, redirect to the new_url with the correct status code
            if ($redirect) {
                $event->setResponse(new RedirectResponse($request->getScheme().'://'.$redirect->getNewUrl(), $redirect->getHttpStatusCode()));

                return;
            }

            // If not found, re-throw…
            throw $e;
        }
    }
}