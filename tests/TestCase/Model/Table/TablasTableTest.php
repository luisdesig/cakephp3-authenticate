<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TablasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TablasTable Test Case
 */
class TablasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TablasTable
     */
    public $Tablas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tablas',
        'app.rolusers',
        'app.users',
        'app.personas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tablas') ? [] : ['className' => 'App\Model\Table\TablasTable'];
        $this->Tablas = TableRegistry::get('Tablas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tablas);

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
