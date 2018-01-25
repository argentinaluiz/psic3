<?php

namespace App;

use Bootstrapper\Interfaces\TableInterface;
use App\Notifications\MyResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Painel\Permission;
use App\Models\Painel\Role;

class User extends Authenticatable implements TableInterface
{
    use Notifiable;
    const ROLE_ADMIN = 1;
    const ROLE_PSYCHOANALYST = 2;
    const ROLE_PATIENT = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','enrolment'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function sendPasswordResetNotification($token){
        $this->notify(new MyResetPasswordNotification($token));
    }

    public function calls(){
        return $this->belongsToMany(\App\Models\Painel\Call::class);
    }

    public function eAdmin()
    {
      //return $this->id == 1;
      return $this->existRole('Admin');
    }
    
    public function roles()
    {
        return $this->belongsToMany(\App\Models\Painel\Role::class);
    }

    public function addRole($role){
        if (is_string($role)) {
            $role = Role::where('name','=',$role)->firstOrFail();
        }

        if($this->existRole($role)){
            return;
        }
        return $this->roles()->attach($role);

    }

    public function existRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name','=',$role)->firstOrFail();
        }
        return (boolean) $this->roles()->find($role->id);

    }

    public function deleteRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name','=',$role)->firstOrFail();
        }
        return $this->roles()->detach($role);
    }
    
    public function existThisRole($roles)
    {
      $userRoles = $this->roles;
      return $roles->intersect($userRoles)->count();
    }

    public static function createFully($data)
    {
        $password = str_random(6);
        $data['password'] = bcrypt($password);
        /** @var User $user */
        $user = parent::create($data + ['enrolment' => str_random(6)]);
        self::assignEnrolment($user, self::ROLE_ADMIN);
      //  self::assingRole($user, $data['type']);
        $user->save();
     /*   if (isset($data['send_mail'])) {
            $token = \Password::broker()->createToken($user);
            $user->notify(new UserCreated($token));
        }
    */
        return compact('user', 'password');
    }

    public static function assignEnrolment(User $user, $type)
    {
        $types = [
            self::ROLE_ADMIN => 100000,
            self::ROLE_PSYCHOANALYST => 400000,
            self::ROLE_PATIENT => 700000,
        ];
        $user->enrolment = $types[$type] + $user->id;
        return $user->enrolment;
    }

    
     /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['ID', 'Nome', 'Email'];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header) {
            case 'ID':
                return $this->id;
            case 'Nome':
                return $this->name;
            case 'Email':
                return $this->email;
        }
    }



}
