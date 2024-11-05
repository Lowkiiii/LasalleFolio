<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\UserPostController;

class CategoryMatchingTest extends TestCase
{
    private $controller;

    protected function setUp(): void
    {
        parent::setUp();
        $this->controller = new UserPostController();
    }

    public function testFindSimilarCategory()
    {
        // Test exact matches
        $this->assertEquals('Web Development', $this->controller->findSimilarCategory('Web Development'));
        $this->assertEquals('Graphic Design', $this->controller->findSimilarCategory('Graphic Design'));
        $this->assertEquals('Programming', $this->controller->findSimilarCategory('Programming'));
     

        // Test close matches
        $this->assertEquals('Web Development', $this->controller->findSimilarCategory('web dev'));
        $this->assertEquals('Data Science', $this->controller->findSimilarCategory('data sci'));
        $this->assertEquals('Programming', $this->controller->findSimilarCategory('programmng'));
       

        // Test matches below threshold
        $this->assertNull($this->controller->findSimilarCategory('random category'));
        $this->assertNull($this->controller->findSimilarCategory('abcdefg'));
    }
}