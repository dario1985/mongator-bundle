<?php

/*
 * This file is part of Mongator.
 *
 * (c) Pablo Díez <pablodip@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Mongator\MongatorBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * MergeGroupListener.
 *
 * @author Pablo Díez <pablodip@gmail.com>
 */
class MergeGroupListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(FormEvents::SUBMIT => 'onBindNormData');
    }

    public function onBindNormData(FormEvent $event)
    {
        $group = $event->getForm()->getData();
        $data = $event->getData();

        $group->replace($data);

        $event->setData($group);
    }
}
