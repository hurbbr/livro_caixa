<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Teste Model
 *
 * @method \App\Model\Entity\Teste get($primaryKey, $options = [])
 * @method \App\Model\Entity\Teste newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Teste[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Teste|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Teste saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Teste patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Teste[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Teste findOrCreate($search, callable $callback = null, $options = [])
 */
class TesteTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('teste');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->allowEmptyString('nome');

        $validator
            ->integer('numero')
            ->allowEmptyString('numero');

        return $validator;
    }
}
