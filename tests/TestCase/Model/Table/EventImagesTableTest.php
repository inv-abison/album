<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EventImagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EventImagesTable Test Case
 */
class EventImagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EventImagesTable
     */
    public $EventImages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.EventImages',
        'app.Categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('EventImages') ? [] : ['className' => EventImagesTable::class];
        $this->EventImages = TableRegistry::getTableLocator()->get('EventImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EventImages);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
