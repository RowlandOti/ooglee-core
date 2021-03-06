<?php namespace Oogle\Infrastructure\Hashing\Hashers;

use Oogle\Domain\Contracts\IHasher;

class Sha256Hasher implements IHasher
{

    use Hasher;

    /**
     * {@inheritDoc}
     */
    public function hash($value)
    {
        $salt = $this->createSalt();

        return $salt.hash('sha256', $salt.$value);
    }

    /**
     * {@inheritDoc}
     */
    public function check($value, $hashedValue)
    {
        $salt = substr($hashedValue, 0, $this->saltLength);

        return $this->slowEquals($salt.hash('sha256', $salt.$value), $hashedValue);
    }
}
