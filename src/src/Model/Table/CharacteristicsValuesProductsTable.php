<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CharacteristicsValuesProducts Model
 *
 * @property \App\Model\Table\CharacteristicValuesTable&\Cake\ORM\Association\BelongsTo $CharacteristicValues
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\CharacteristicsValuesProduct newEmptyEntity()
 * @method \App\Model\Entity\CharacteristicsValuesProduct newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CharacteristicsValuesProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CharacteristicsValuesProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\CharacteristicsValuesProduct findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CharacteristicsValuesProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CharacteristicsValuesProduct[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CharacteristicsValuesProduct|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CharacteristicsValuesProduct saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CharacteristicsValuesProduct[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CharacteristicsValuesProduct[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CharacteristicsValuesProduct[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CharacteristicsValuesProduct[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CharacteristicsValuesProductsTable extends Table
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

        $this->setTable('characteristics_values_products');
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
