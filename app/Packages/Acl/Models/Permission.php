<?php

namespace Multi\Packages\Acl\Models;

use Multi\Models\BaseModel;
use Multi\Packages\Acl\Exceptions\PermissionDoesNotExist;
use Multi\Packages\Acl\Traits\RefreshesPermissionCache;

/**
 * Multi\Packages\Acl\Models\Permission
 *
 * @property integer $id
 * @property string $name
 * @property string $display_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $description
 * @property-read \Illuminate\Database\Eloquent\Collection|\Multi\Packages\Acl\Models\Role[] $roles
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Permission whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Permission whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Permission whereDisplayName($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Permission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Permission whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Permission whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Permission whereDescription($value)
 * @mixin \Eloquent
 * @property integer $client_id
 * @property integer $tenant_id
 * @property string $slug
 * @property string $deleted_at
 * @property integer $deleted_by
 * @property-read \Multi\Models\User $createdBy
 * @property-read \Multi\Models\User $updatedBy
 * @property-read \Multi\Models\User $deletedBy
 * @property-read \Multi\Models\Client $client
 * @property-read \Multi\Models\Tenant $tenant
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Permission whereClientId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Permission whereTenantId($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Permission whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Permission whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Multi\Packages\Acl\Models\Permission whereDeletedBy($value)
 */
class Permission extends BaseModel
{
    use RefreshesPermissionCache;

    public $guarded = ['id'];

    public static $basePermissions = [
        // staff permissions
        'staff-create' => ['Create staff', 'Allow create new staff'],
        'staff-update' => ['Edit staff', 'Allow edit staff'],
        'staff-destroy' => ['Remove staff', 'Allow remove staff'],
        'staff-role' => ['Assign role', 'Allow assign role to staff (default staff is manager)'],
        // Order permissions
        'order-search' => ['Search order list', 'Allow see & search orders'],
        'order-show' => ['See order', 'Allow see detail & order'],
        'order-update' => ['Edit order', 'Allow edit order content'],
        'order-assign' => ['Assign order', 'Allow assign a manager for order'],
        'order-incidents-show' => ['See Incident order', 'Allow see Incident panel'],
        'order-incidents-update' => ['Edit Incident order', 'Allow edit Incident panel'],
        'order-comments-show' => ['See order comments', 'Allow see comments panel and comments'],
        'order-comments-update' => ['Update/Delete order comments', 'Allow edit or delete order comments'],
        'order-shipments-show' => ['See shippment order', 'Allow see shipping information'],
        'order-shipments-update' => ['Edit shipment order', 'Allow edit content shipping'],
        'order-address-show' => ['See address', 'Allow see address customer'],
        'order-item-show' => ['See items order', 'Allow see items inside an order'],
        'order-item-assign' => ['Assign designer', 'Allow assign a designer to item'],
        'order-item-proof-show' => ['See proof files', 'Allow see proofs versions inside item'],
        'order-item-proof-update' => ['Edit proof files', 'Allow edit (add/remove) files proof inside item'],
        // Customer
        'customer-search' => ['Search customer list', 'Allow search customer in list'],
        'customer-show' => ['See customer', 'Allow see content a customer'],
        'customer-create' => ['Create customer', 'Allow create customer'],
        'customer-update' => ['Edit customer', 'Allow edit customer'],
        'customer-destroy' => ['Remove customer', 'Allow remove customer'],
        'customer-address-show' => ['See address', 'Allow see address'],
        'customer-address-update' => ['Edit address', 'Allow edit (add/remove) address'],
        'customer-order-show' => ['See order', 'Allow see customer orders'],
        // categories
        'category-search' => ['Search category', 'Allow search categories in list'],
        'category-show' => ['See category', 'Allow see content category'],
        'category-create' => ['Create category', 'Allow create new category'],
        'category-update' => ['Edit category', 'Allow Edit category'],
        'category-destroy' => ['Remove category', 'Allow Remove category'],
        // products
        'product-search' => ['Search product', 'Allow search products in list'],
        'product-show' => ['See product', 'Allow see content product'],
        'product-create' => ['Create product', 'Allow create new product'],
        'product-update' => ['Edit product', 'Allow Edit product'],
        'product-destroy' => ['Remove product', 'Allow Remove product'],
        // discount
        'discount-search' => ['Search discount', 'Allow search discounts in list'],
        'discount-show' => ['See discount', 'Allow see content discount'],
        'discount-create' => ['Create discount', 'Allow create new discount'],
        'discount-update' => ['Edit discount', 'Allow Edit discount'],
        'discount-destroy' => ['Remove discount', 'Allow Remove discount'],
        // review
        'review-search' => ['Search review', 'Allow search reviews in list'],
        'review-show' => ['See review', 'Allow see content review'],
        'review-create' => ['Create review', 'Allow create new review'],
        'review-update' => ['Edit review', 'Allow Edit review'],
        'review-destroy' => ['Remove review', 'Allow Remove review'],
        // FAQ category
        'faq-category-search' => ['Search faq category', 'Allow search faq categories in list'],
        'faq-category-show' => ['See faq category', 'Allow see content faq category'],
        'faq-category-create' => ['Create faq category', 'Allow create new faq category'],
        'faq-category-update' => ['Edit faq category', 'Allow Edit faq category'],
        'faq-category-destroy' => ['Remove faq category', 'Allow Remove faq category'],
        // faq
        'faq-search' => ['Search faq', 'Allow search faqs in list'],
        'faq-show' => ['See faq', 'Allow see content faq'],
        'faq-create' => ['Create faq', 'Allow create new faq'],
        'faq-update' => ['Edit faq', 'Allow Edit faq'],
        'faq-destroy' => ['Remove faq', 'Allow Remove faq'],
        // tutorials
        'tut-search' => ['Search tut', 'Allow search tuts in list'],
        'tut-show' => ['See tut', 'Allow see content tut'],
        'tut-create' => ['Create tut', 'Allow create new tut'],
        'tut-update' => ['Edit tut', 'Allow Edit tut'],
        'tut-destroy' => ['Remove tut', 'Allow Remove tut'],
        // tutorial category
        'tut-category-search' => ['Search tut', 'Allow search tuts category in list'],
        'tut-category-show' => ['See tut', 'Allow see content tut category'],
        'tut-category-create' => ['Create tut', 'Allow create new tut category'],
        'tut-category-update' => ['Edit tut', 'Allow Edit tut category'],
        'tut-category-destroy' => ['Remove tut', 'Allow Remove tut category'],
        // productions
        'production-search' => ['Search production', 'Allow search productions in list'],
        'production-show' => ['See production', 'Allow see content production'],
        'production-create' => ['Create production', 'Allow create new production'],
        'production-update' => ['Edit production', 'Allow Edit production'],
        'production-destroy' => ['Remove production', 'Allow Remove production'],
        // domains
        'domain-search' => ['Search domain', 'Allow search domains in list'],
        'domain-show' => ['See domain', 'Allow see content domain'],
        'domain-create' => ['Create domain', 'Allow create new domain'],
        'domain-update' => ['Edit domain', 'Allow Edit domain'],
        'domain-destroy' => ['Remove domain', 'Allow Remove domain'],
        // roles
        'role-search' => ['Search role', 'Allow search roles in list'],
        'role-show' => ['See role', 'Allow see content role'],
        'role-create' => ['Create role', 'Allow create new role'],
        'role-update' => ['Edit role', 'Allow Edit role'],
        'role-destroy' => ['Remove role', 'Allow Remove role'],
        // permissions
        'permission-search' => ['Search permission', 'Allow search permissions in list'],
        'permission-show' => ['See permission', 'Allow see content permission'],
        'permission-create' => ['Create permission', 'Allow create new permission'],
        'permission-update' => ['Edit permission', 'Allow Edit permission'],
        'permission-destroy' => ['Remove permission', 'Allow Remove permission'],

        // special permissions
        'special-permissions' => ['Special permission', 'Allow use powerful features ( like databae update )'],

    ];

    /**
     * A permission can be applied to roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permission_role');
    }

    /**
     * Find a permission by its name.
     *
     * @param string $name
     *
     * @throws PermissionDoesNotExist
     */
    public static function findByName($name)
    {
        $permission = static::where('name', $name)->first();

        if (!$permission) throw new PermissionDoesNotExist();

        return $permission;
    }
    public static $rules = [
        'name' => 'required|unique:permissions,name',
    ];
    public static function rules($id = null)
    {
        $rules = self::$rules;
        if (!is_null($id)) {
            $rules['name'] = $rules['name'] . ',' . $id;
        }

        return $rules;
    }
    public static function getPermissions($wilcat = null)
    {
        $baseName = array_keys(self::$basePermissions);

        if (is_null($wilcat)) {
            return $baseName;
        } elseif (is_string($wilcat)) {
            $data = array_where($baseName, function ($name, $val) use ($wilcat) {
                return str_is($wilcat, $val);
            });

            return $data;
        } elseif (is_array($wilcat)) {
            $returnNames = [];

            foreach ($wilcat as $regex) {
                $returnNames = array_merge($returnNames, self::getPermissions($regex));
            }

            return $returnNames;
        }

        return [];
    }
}
