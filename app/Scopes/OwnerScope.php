<?php


namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class OwnerScope implements \Illuminate\Database\Eloquent\Scope
{
    public function apply(Builder $builder, Model $model){
        $builder->where('user_id', '=', Auth::id());
    }

}
