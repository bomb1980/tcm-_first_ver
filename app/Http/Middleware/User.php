<?php

namespace App\Http\Middleware;

use App\Models\SvlsMasRolePer;
use App\Models\SvlsMasSubmenu;
use App\Models\SvlsMasUserPer;
use Closure;
use Illuminate\Http\Request;


class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);

        // if (empty(auth()->user()->mysvlssys))
        //     return redirect(route('logout_'));
        // // abort(code: 403);
        // if ($this->checkCanAccessRoute($request->route()->getName()) == true) {

        //     return $next($request);
        // };


        // abort(code: 403);
    }

    function checkCanAccessRoute($routeName = NULL)
    {

        // return true;

        $SvlsMasSubmenu = SvlsMasSubmenu::select([
            'svls_mas_submenu.*',

        ])->where('svls_mas_submenu.route_name',  $routeName)->first();

        if ($SvlsMasSubmenu) {

            $SvlsMasRolePer = SvlsMasRolePer::where(
                'svls_mas_role_per.role_id',
                auth()->user()->role_id
            )->where('submenu_id',   $SvlsMasSubmenu->submenu_id)->get();

            foreach ($SvlsMasRolePer as $ku => $vu) {

                return true;
            }

            $SvlsMasUserPer = SvlsMasUserPer::where(
                'svls_mas_user_per.user_id',
                auth()->user()->em_id
            )->where('submenu_id',   $SvlsMasSubmenu->submenu_id)->get();

            foreach ($SvlsMasUserPer as $ku => $vu) {

                return true;
            }

            return false;
        }

        return true;
    }
}
