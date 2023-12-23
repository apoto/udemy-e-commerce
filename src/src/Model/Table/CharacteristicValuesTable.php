<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CharacteristicValues Model
 *
 * @property \App\Model\Table\CharacteristicsTable&\Cake\ORM\Association\BelongsTo $Characteristics
 * @property \App\Model\Table\CharacteristicsValuesProductsTable&\Cake\ORM\Association\HasMany $CharacteristicsValuesProducts
 *
 * @method \App\Model\Entity\CharacteristicValue newEmptyEntity()
 * @method \App\Model\Entity\CharacteristicValue newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CharacteristicValue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CharacteristicValue get($primaryKey, $options = [])
 * @method \App\Model\Entity\CharacteristicValue findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CharacteristicValue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CharacteristicValue[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CharacteristicValue|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CharacteristicValue saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CharacteristicValue[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CharacteristicValue[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CharacteristicValue[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CharacteristicValue[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CharacteristicValuesTable extends Table
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

        $this->setTable('characteristic_values');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Characteristics', [
            'foreignKey' => 'characteristic_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('CharacteristicsValuesProducts', [
            'foreignKey' => 'characteristic_value_id',
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('characteristic_id')
            ->notEmptyString('characteristic_id');

        $validator
            ->dateTime('deleted')
            ->allowEmptyDateTime('deleted');

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
        $rules->add($rules->existsIn('characteristic_id', 'Characteristics'), ['errorField' => 'characteristic_id']);

        return $rules;
    }
}
