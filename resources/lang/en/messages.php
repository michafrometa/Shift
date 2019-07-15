<?php
/**
 * Created by PhpStorm.
 * User: SOFTUR-CESAR
 * Date: 4/2/2019
 * Time: 2:40 PM
 */

return [
    'subjects'=>[
        'service_order'=>'service order|service orders',
        'patient'=>'patient|patients',
        'doctor'=>'doctor|doctors',
        'post_collection'=>'post collection|post collections',
        'agreement'=>'agreement|agreements',
        'exam'=>'exam|exams',
        'sector'=>'sector|sectors',
        'biologic_material'=>'biologic material|biologic materials',
        'neighborhood'=>'neighborhood|neighborhoods',
        'city'=>'city|cities',
        'specialty'=>'specialty|specialties',
        'gender'=>'gender|genders',
        'federated_unit'=>'federated unit|federated units',
    ],
    'response' => [
        'save' => 'Element saved correctly.',
        'update' => 'Element updated correctly.',
        'delete' => 'Element deleted correctly.| Elements deleted correctly.',
        'error' => 'Error performing operation.',
        'database_issue'=>'Error performing operation. Database issues',
        'not_found' => ':subject not found.',
    ],
    'logs'=>[
        'save' => 'row from shift_:subject with id = :id saved correctly.',
        'update' => 'row from shift_:subject with id = :id updated correctly.',
        'delete' => 'row from shift_:subject with id = :id deleted correctly.'
    ]

];