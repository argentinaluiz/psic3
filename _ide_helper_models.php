<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Painel{
/**
 * App\Models\Painel\Client
 *
 * @property-read mixed $date_birth_formatted
 * @property-read mixed $document_number_formatted
 * @property-read mixed $sex_formatted
 * @property-write mixed $document_number
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property int $defaulter
 * @property string|null $date_birth
 * @property string|null $sex
 * @property string|null $marital_status
 * @property string|null $physical_disability
 * @property string|null $company_name
 * @property string $client_type
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Client whereClientType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Client whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Client whereDateBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Client whereDefaulter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Client whereDocumentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Client whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Client whereMaritalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Client wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Client wherePhysicalDisability($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Client whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Client whereUpdatedAt($value)
 */
	class Client extends \Eloquent {}
}

namespace App\Models\Painel{
/**
 * App\Models\Painel\Permission
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Painel\Role[] $roles
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $label
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Permission whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models\Painel{
/**
 * App\Models\Painel\Role
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Painel\Permission[] $permissions
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $label
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Role whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Painel\Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Painel\Role[] $roles
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

