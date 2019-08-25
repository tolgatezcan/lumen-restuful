<?php

class RouteTest extends TestCase
{
    /**
     * Testing for register 
     *
     * @return void
     */
    public function testRegister()
    {
        $response = $this->call('POST', '/register', ['email' => 'admin@web.com', 'password' => '123']);

        $this->assertEquals(200, $response->status());
    }

    /**
     * Testing for login
     *
     * @return void
     */
    public function testLogin()
    {
        $response = $this->call('POST', '/login', ['email' => 'admin@web.com', 'password' => '123']);

        $this->assertEquals(200, $response->status());
    }

    /**
     * Testing for hash
     *
     * @return void
     */
    public function testHash()
    {
        $response = $this->call('GET', '/hash');

        $this->assertEquals(200, $response->status());
    }
}
