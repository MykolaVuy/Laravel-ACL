<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Config;
use Route;

/**
 * ACL class for Laravel
 *
 * @author   Mykola Vuy  <mykola.vuy@gmail.com>
 * @since    24.05.2017
 */
class ACL
{
    /**
     * The role of current user
     *
     * @var string
     */
    private $_role;
    
    /**
     * The name or action of current page
     *
     * @var string
     */
    private $_key;
    
    /**
     * The list of the permissions
     *
     * @var array
     */
    private $_permissions;
    
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct() 
    {
        $this->_role = Auth::user()->role ?? 'guest';
        $this->_permissions = Config::get('acl.permissions');
        $name = Route::currentRouteName();
        $action = Route::currentRouteAction();
        if (isset($this->_permissions[$name])) {
            $this->_key = $name;
        } elseif (isset($this->_permissions[$action])) {
            $this->_key = $action;
        }
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$this->_key) {
            return redirect(Config::get('acl.pageNotFound'));
        }
        
        switch ($this->_role) {
            case 'admin':
                break;
            case 'guest':
            case 'user':
                if (!in_array($this->_role, $this->_permissions[$this->_key])) {
                    return redirect(Config::get('acl.accessDenied'));
                }
                break;
        }
        
        return $next($request);
    }
}
