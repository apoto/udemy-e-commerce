<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Photos Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\Photo newEmptyEntity()
 * @method \App\Model\Entity\Photo newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Photo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Photo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Photo findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Photo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Photo[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Photo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Photo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Photo[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Photo[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Photo[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Photo[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PhotosTable extends Table
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

        $this->setTable('photos');
        $this->setDisplayField('file_dir');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
        ]);

        $this->addBehavior('Proffer.Proffer', [
            'file_name' => [
                'root' => WWW_ROOT . 'img',
                'dir' => 'file_dir'
            ]
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
            ->scalar('alt')
            ->maxLength('alt', 100)
            ->requirePresence('alt', 'create')
            ->notEmptyString('alt');

        $validator
            ->integer('product_id')
            ->notEmptyString('product_id');

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
        $rules->add($rules->existsIn('product_id', 'Products'), ['errorField' => 'product_id']);

        return $rules;
    }
}
