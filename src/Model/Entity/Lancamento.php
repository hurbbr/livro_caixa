<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lancamento Entity
 *
 * @property int $id
 * @property string $descricao
 * @property float $valor
 * @property string $tipo
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 * @property \Cake\I18n\FrozenDate $data
 * @property int $conta_id
 * @property int $categoria_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Conta $conta
 * @property \App\Model\Entity\Categoria $categoria
 * @property \App\Model\Entity\User $user
 */
class Lancamento extends Entity
{
    const TIPO_ENTRADA = 'entrada';
    const TIPO_SAIDA = 'saida';

    const TIPO_ENTRADA_SINAL = '+';
    const TIPO_SAIDA_SINAL = '-';

    const TIPO_NOME = [
        self::TIPO_ENTRADA => 'Entrada',
        self::TIPO_SAIDA => 'Saída'
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
        'descricao'    => true,
        'data'         => true,
        'valor'        => true,
        'tipo'         => true,
        'created'      => true,
        'modified'     => true,
        'deleted'      => true,
        'conta_id'     => true,
        'categoria_id' => true,
        'user_id'      => true,
        'conta'        => true,
        'categoria'    => true,
        'user'         => true,
    ];
}
