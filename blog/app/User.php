<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    protected $table = 'users';
    protected $id = '';
    protected $f_name = '';
    protected $m_name = '';
    protected $l_name = '';
    protected $email = '';
    protected $password = '';
    protected $user_mobile = '';
    protected $mobile = '';
    protected $status = '';
    protected $add_date = '';
    protected $add_by = '';
    protected $modify_date = '';
    protected $modify_by = '';
    protected $company_id = '';
    protected $role_id ='';
    protected $role_name='';

    public function set_role_id($val){
        $this->role_id = $val;
    }
    public function set_role_name($val){
        $this->role_name = $val;
    }

    public function set_id($val)
    {
        $this->id = $val;
    }

    public function set_f_name($val)
    {
        $this->f_name = $val;
    }

    public function set_m_name($val)
    {
        $this->m_name = $val;
    }

    public function set_l_name($val)
    {
        $this->l_name = $val;
    }


    public function set_email($val)
    {
        $this->email = $val;
    }

    public function set_password($val)
    {
        $this->password = $val;
    }

    public function set_mobile($val)
    {
        $this->mobile = $val;
    }

    public function set_status($val)
    {
        $this->status = $val;
    }

    public function set_add_date($val)
    {
        $this->add_date = $val;
    }

    public function set_add_by($val)
    {
        $this->add_by = $val;
    }

    public function set_modify_date($val)
    {
        $this->modify_date = $val;
    }

    public function set_modify_by($val)
    {
        $this->modify_by = $val;
    }

    function set_fields($val)
    {
        $this->fields = $val;
    }

    function set_term($val)
    {
        $this->term = $val;
    }
    function set_company_id($val)
    {
        $this->company_id = $val;
    }

    public function check_admin_login()
    {
        $collection = app('db')->select("SELECT * FROM $this->table WHERE email = '$this->email' ");

        return $collection;
    }

    public function product_details(){
        $collection = app('db')->select("SELECT * FROM product");

        return $collection;
    }
}
