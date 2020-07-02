<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function(){

        /**
         * Plan x Profile
         */

        Route::get('plans/{id}/profile/{idProfile}/detach', 'ACL\PlanProfileController@detachProfilePlan')->name('plans.profile.detach');
        Route::post('plans/{id}/profiles', 'ACL\PlanProfileController@attachProfilesPlan')->name('plans.profiles.attach');
        Route::any('plans/{id}/profiles/create', 'ACL\PlanProfileController@profilesAvailable')->name('plans.profiles.available');
        Route::get('plans/{id}/profiles', 'ACL\PlanProfileController@profiles')->name('plans.profiles');
        Route::get('profiles/{id}/plans', 'ACL\PlanProfileController@plans')->name('profiles.plans');
        
        /**
         * Permisson x Profile
         */

        Route::get('profiles/{id}/permission/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionsProfile')->name('profiles.permission.detach');
        Route::post('profiles/{id}/permissions', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
        Route::any('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
        Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permissions');
        Route::get('permissions/{id}/profile', 'ACL\PermissionProfileController@profiles')->name('permissions.profiles');

        /**
         * Permissons
         */

        Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
        Route::resource('permissions', 'ACL\PermissionController');
        
        /**
         * Profiles
         */

        Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
        Route::resource('profiles', 'ACL\ProfileController');

        /**
         * Detail Plans
         */
        
        Route::delete('plans/{slug}/details/{idDetail}', 'DetailPlanController@destroy')->name('details.plan.destroy');
        Route::get('plans/{slug}/details/create', 'DetailPlanController@create')->name('details.plan.create');
        Route::get('plans/{slug}/details/{idDetail}', 'DetailPlanController@show')->name('details.plan.show');
        Route::put('plans/{slug}/details/{idDetail}', 'DetailPlanController@update')->name('details.plan.update');
        Route::get('plans/{slug}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
        Route::post('plans/{slug}/details', 'DetailPlanController@store')->name('details.plan.store');
        Route::get('plans/{slug}/details', 'DetailPlanController@index')->name('details.plan.index');

        /**
         * Plans
         */
        
        Route::get('plans/create', 'PlanController@create')->name('plans.create');
        Route::put('plans/{slug}', 'PlanController@update')->name('plans.update');
        Route::get('plans/{slug}/edit', 'PlanController@edit')->name('plans.edit');
        Route::any('plans/search', 'PlanController@search')->name('plans.search');
        Route::delete('plans/{slug}', 'PlanController@destroy')->name('plans.destroy');
        Route::post('plans', 'PlanController@store')->name('plans.store');
        Route::get('plans/{slug}', 'PlanController@show')->name('plans.show');
        Route::get('plans', 'PlanController@index')->name('plans.index');

        Route::get('/', 'PlanController@index')->name('admin.index');
    });
Auth::routes();

Route::get('/plan/{$slug}', 'Site\SiteController@plan')->name('plan.subscription');
Route::get('/', 'Site\SiteController@index')->name('site.home');

