<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RolusersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RolusersTable Test Case
 */
class RolusersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RolusersTable
     */
    public $Rolusers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rolusers',
        'app.users',
        'app.personas',
        'app.tablas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Rolusers') ? [] : ['className' => 'App\Model\Table\RolusersTable'];
        $this->Rolusers = TableRegistry::get('Rolusers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Rolusers);

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
