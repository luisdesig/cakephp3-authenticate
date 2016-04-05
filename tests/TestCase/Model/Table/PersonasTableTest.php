<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PersonasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PersonasTable Test Case
 */
class PersonasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PersonasTable
     */
    public $Personas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.personas',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Personas') ? [] : ['className' => 'App\Model\Table\PersonasTable'];
        $this->Personas = TableRegistry::get('Personas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Personas);

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
}
