<?php
/**
 * Created by PhpStorm.
 * User: 乔明明
 * Date: 2019/4/16
 * Time: 11:44
 */
use Ramsey\Uuid\Doctrine\UuidGenerator;

return [
    'App\Models' => [
        'type'   => 'entity',
        'table'  => 'teachers',
        'id'     => [
            'id' => [
                'type'     => 'uuid',
                'generator' => [
                    'strategy' => 'custom'
                ],
                'customIdGenerator' => [
                    'class' => UuidGenerator::class
                ],
            ],
        ],
        'fields' => [
            'name' => [
                'type' => 'string'
            ]
        ]
    ]
];