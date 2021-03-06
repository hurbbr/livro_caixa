<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LancamentosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LancamentosTable Test Case
 */
class LancamentosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LancamentosTable
     */
    public $Lancamentos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Lancamentos',
        'app.Contas',
        'app.Categorias',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Lancamentos') ? [] : ['className' => LancamentosTable::class];
        $this->Lancamentos = TableRegistry::getTableLocator()->get('Lancamentos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Lancamentos);

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
