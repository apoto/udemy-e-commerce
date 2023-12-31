<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrderLines Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 *
 * @method \App\Model\Entity\OrderLine newEmptyEntity()
 * @method \App\Model\Entity\OrderLine newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\OrderLine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrderLine get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrderLine findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\OrderLine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrderLine[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrderLine|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrderLine saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrderLine[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrderLine[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrderLine[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrderLine[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class OrderLinesTable extends Table
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

        $this->setTable('order_lines');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
        ]);
        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
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
            ->integer('product_id')
            ->allowEmptyString('product_id');

        $validator
            ->integer('quantity')
            ->allowEmptyString('quantity');

        $validator
            ->integer('order_id')
            ->allowEmptyString('order_id');

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
        $rules->add($rules->existsIn('product_id', 'Products'), ['errorField' => 'product_id']);
        $rules->add($rules->existsIn('order_id', 'Orders'), ['errorField' => 'order_id']);

        return $rules;
    }
}
