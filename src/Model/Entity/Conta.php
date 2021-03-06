<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Conta Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $tipo
 * @property \Cake\I18n\FrozenDate|null $data_fechamento
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $user_id
 *
 * @property \App\Model\Entity\User $user
 */
class Conta extends Entity
{
    const TIPO_DEBITO = 'debito';
    const TIPO_CREDITO = 'credito';

    const TIPO = [
        self::TIPO_DEBITO => 'Débito',
        self::TIPO_CREDITO => 'Crédito'
    ];

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nome'            => true,
        'tipo'            => true,
        'dia_fechamento'  => true,
        'created'         => true,
        'modified'        => true,
        'user_id'         => true,
        'user'            => true,
    ];
}
