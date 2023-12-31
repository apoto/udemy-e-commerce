<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CharacteristicValuesProducts Model
 *
 * @property \App\Model\Table\CharacteristicValuesTable&\Cake\ORM\Association\BelongsTo $CharacteristicValues
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\CharacteristicValuesProduct newEmptyEntity()
 * @method \App\Model\Entity\CharacteristicValuesProduct newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CharacteristicValuesProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CharacteristicValuesProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\CharacteristicValuesProduct findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CharacteristicValuesProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CharacteristicValuesProduct[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CharacteristicValuesProduct|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CharacteristicValuesProduct saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CharacteristicValuesProduct[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CharacteristicValuesProduct[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CharacteristicValuesProduct[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CharacteristicValuesProduct[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CharacteristicValuesProductsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('characteristic_values_products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('CharacteristicValues', [
            'foreignKey' => 'characteristic_value_id',
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('characteristic_value_id')
            ->notEmptyString('characteristic_value_id');

        $validator
            ->integer('product_id')
            ->notEmptyString('product_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('characteristic_value_id', 'CharacteristicValues'), ['errorField' => 'characteristic_value_id']);
        $rules->add($rules->existsIn('product_id', 'Products'), ['errorField' => 'product_id']);

        return $rules;
    }
}
