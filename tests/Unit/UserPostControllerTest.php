<?php

namespace Tests\Unit;

use App\Http\Controllers\UserPostController;
use Tests\TestCase;

class UserPostControllerTest extends TestCase
{
    private $userPostController;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userPostController = new UserPostController();
    }

    public function testFindSimilarCategory()
    {
        // Test cases for exact matches
        $this->assertEquals('Programming', $this->userPostController->findSimilarCategory('Programming'));
        $this->assertEquals('Web Development', $this->userPostController->findSimilarCategory('Web Development'));

        // Test cases for abbreviations
        $this->assertEquals('Web Development', $this->userPostController->findSimilarCategory('web dev'));
        $this->assertEquals('Data Science', $this->userPostController->findSimilarCategory('data sci'));
        $this->assertEquals('Programming', $this->userPostController->findSimilarCategory('programmng'));

        // Test cases for typos
        $this->assertEquals('Programming', $this->userPostController->findSimilarCategory('prorammng'));
        $this->assertEquals('Web Development', $this->userPostController->findSimilarCategory('web develpment'));

        // Test case for unknown category
        $this->assertEquals('Sample Category', $this->userPostController->findSimilarCategory('Sample Category'));
    }
}