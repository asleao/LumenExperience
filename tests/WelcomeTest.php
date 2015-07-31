<?php

class WelcomeTest extends TestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function testIfExistsAWelcomeMessage()
    {
        $this->visit('/')
                ->see('Welcome');
    }
}
