<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 登录验证
        if(!session('user')){
            return redirect('/admin/login');
        }

        //4.和sesson权限信息做对比
        //获取访问的控制器和方法
        $action=$request->route()->getActionMethod();
        $actions=explode('\\', \Route::current()->getActionName());
        //或$actions=explode('\\', \Route::currentRouteAction());
        $modelName=$actions[count($actions)-2]=='Controllers'?null:$actions[count($actions)-2];
        $func=explode('@', $actions[count($actions)-1]);
        $controllerName=$func[0];
        $actionName=$func[1];
        //获取当前登录用户的权限列表
        $nodelist=session('nodelist');
        if(empty($nodelist[$controllerName]) || !in_array($action,$nodelist[$controllerName])){
            return redirect("/admin/error")->with('error','抱歉,你没有权限访问该模块,请联系超级管理员');
        }
        
        return $next($request);
    }
}
