 <?php

use Hopkins\LaravelFkMigration\Migration;

class ForeignKeys extends Migration
{
    protected $keys = [];

    protected $presets = [
        'createdBy' => [ 
            'column' => 'created_by',
            'references' => 'id',
            'on'=>'users' 
        ],
        'updatedBy' => [
            'column' => 'updated_by',
            'references' => 'id',
            'on'=>'users'
        ],
        'deletedBy' => [
            'column' => 'deleted_by',
            'references' => 'id',
            'on'=>'users'
        ],
        'tenant' => [
            'column' => 'tenant_id'
        ],
        'client' => [
            'column' => 'client_id'
        ]
    ];

    public function getKeys()
    {
        $keys = [
            'users'      => [ 
                $this->presets['createdBy'],
                $this->presets['updatedBy'],
                $this->presets['deletedBy'],
                $this->presets['client'],
                $this->presets['tenant'],
            ],
            'products'       => [
                $this->presets['createdBy'],
                $this->presets['updatedBy'],
                $this->presets['deletedBy'],
                $this->presets['client'],
                $this->presets['tenant'],
            ],
            'orders' => [
                ['column' => 'user_id'],
                $this->presets['createdBy'],
                $this->presets['updatedBy'],
                $this->presets['deletedBy'],
                $this->presets['client'],
                $this->presets['tenant'],
            ],
            'roles' => [
                $this->presets['createdBy'],
                $this->presets['updatedBy'],
                $this->presets['deletedBy'],
                $this->presets['client'],
                $this->presets['tenant'],
            ],
            'permissions' => [
                $this->presets['createdBy'],
                $this->presets['updatedBy'],
                $this->presets['deletedBy'],
                $this->presets['client'],
                $this->presets['tenant'],
            ],
            'tenants' => [
                ['column' => 'client_id']
            ],
            'permission_role' => [
                ['column' => 'permission_id'],
                ['column' => 'role_id'],
            ],
            'permission_user' => [
                ['column' => 'permission_id'],
                ['column' => 'user_id'],
            ],
            'role_user' => [
                ['column' => 'user_id'],
                ['column' => 'role_id'],
            ],
            'line_items' => [
                ['column' => 'product_id'],
                ['column' => 'order_id'],
            ]


        ];

        return $keys;
    }
}
