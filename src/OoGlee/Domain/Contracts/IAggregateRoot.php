<?php namespace Ooglee\Domain\Contracts;

use Ooglee\Domain\Contracts\IEvent;
 
interface IAggregateRoot
{

    /**
     * IAggregateRoot defines an important entity without which other entities 
     * don't make sense e.g Post{Comment, Author, Tag, Category}
     *
     */

    /**
     * Return the Aggregate Root identifer
     *
     * @return Identifier
     */
    //public function id();
 
    /**
     * Add an event to the pending events
     *
     * @param $event
     * @return void
     */
    public function recordEvents(IEvent $event);
 
    /**
     * Release the events
     *
     * @return array
     */
    public function releaseEvents();
}