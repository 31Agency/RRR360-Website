<?php

Route::group(['middleware' => ['auth']], function () {
    Route::get('2fa/verify', 'TwoFactorController@show')->name('2fa.verify.show');
    Route::get('enable-2fa', 'TwoFactorController@enable')->name('enable-2fa');
    Route::post('2fa/verify', 'TwoFactorController@verify')->name('2fa.verify');
});

Route::get('/', 'Client\HomePageController@index')->name('home');

Route::get('about', 'Client\AboutController@index')->name('about.index');

Route::get('visitors', 'Client\VisitorsController@store')->name('visitors.store');

Route::post('subscribers', 'Client\SubscribersController@store')->name('subscribers.store');

Route::get('contact', 'Client\ContactController@index')->name('contact.index');

Route::get('orders', 'Client\OrderController@index')->name('orders.index');
Route::get('orders/{order}', 'Client\OrderController@show')->name('orders.show');
Route::post('orders', 'Client\OrderController@store')->name('orders.store');

Route::get('properties', 'Client\PropertiesController@index')->name('properties.index');
Route::get('properties/json', 'Client\PropertiesController@json')->name('properties.json');
Route::get('properties/{property}', 'Client\PropertiesController@show')->name('properties.show');

Route::get('services', 'Client\ServicesController@index')->name('services.index');
Route::get('services/{service}', 'Client\ServicesController@show')->name('services.show');

Route::get('articles', 'Client\ArticlesController@index')->name('articles.index');
Route::get('articles/{article}', 'Client\ArticlesController@show')->name('articles.show');

Route::post('feeds', 'Client\FeedsController@store')->name('feeds.store');

Route::group(['middleware' => 'auth', '2fa'], function () {
    Route::get('otp/generate', 'Auth\AuthOtpController@generate')->name('otp.generate');
    Route::post('otp/verification', 'Auth\AuthOtpController@verificationWithOtp')->name('otp.verification');
});

Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa']], function () {

    Route::get('/', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // articles
    Route::delete('articles/destroy', 'ArticleController@massDestroy')->name('articles.massDestroy');
    Route::post('articles/media', 'ArticleController@storeMedia')->name('articles.storeMedia');
    Route::resource('articles', 'ArticleController');

    // Categories
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Clients
    Route::delete('clients/destroy', 'ClientController@massDestroy')->name('clients.massDestroy');
    Route::post('clients/media', 'ClientController@storeMedia')->name('clients.storeMedia');
    Route::resource('clients', 'ClientController');

    // Gallery
    Route::delete('galleries/destroy', 'GalleryController@massDestroy')->name('galleries.massDestroy');
    Route::post('galleries/media', 'GalleryController@storeMedia')->name('galleries.storeMedia');
    Route::resource('galleries', 'GalleryController');

    // Info
    Route::delete('info/destroy', 'InfoController@massDestroy')->name('info.massDestroy');
    Route::post('info/media', 'InfoController@storeMedia')->name('info.storeMedia');
    Route::resource('info', 'InfoController');

    // Links
    Route::delete('links/destroy', 'LinkController@massDestroy')->name('links.massDestroy');
    Route::post('links/media', 'LinkController@storeMedia')->name('links.storeMedia');
    Route::resource('links', 'LinkController');

    // Properties
    Route::delete('properties/destroy', 'PropertiesController@massDestroy')->name('properties.massDestroy');
    Route::post('properties/media', 'PropertiesController@storeMedia')->name('properties.storeMedia');
    Route::resource('properties', 'PropertiesController');

    // Quotes
    Route::delete('quotes/destroy', 'QuoteController@massDestroy')->name('quotes.massDestroy');
    Route::post('quotes/media', 'QuoteController@storeMedia')->name('quotes.storeMedia');
    Route::resource('quotes', 'QuoteController');

    // Rates
    Route::delete('rates/destroy', 'RateController@massDestroy')->name('rates.massDestroy');
    Route::resource('rates', 'RateController');

    // Services
    Route::delete('services/destroy', 'ServiceController@massDestroy')->name('services.massDestroy');
    Route::post('services/media', 'ServiceController@storeMedia')->name('services.storeMedia');
    Route::resource('services', 'ServiceController');

    // Sliders
    Route::delete('sliders/destroy', 'SliderController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/media', 'SliderController@storeMedia')->name('sliders.storeMedia');
    Route::resource('sliders', 'SliderController');

    // Specifications
    Route::delete('specifications/destroy', 'SpecificationController@massDestroy')->name('specifications.massDestroy');
    Route::resource('specifications', 'SpecificationController');

    // Steps
    Route::delete('steps/destroy', 'StepController@massDestroy')->name('steps.massDestroy');
    Route::post('steps/media', 'StepController@storeMedia')->name('steps.storeMedia');
    Route::resource('steps', 'StepController');

    // Tags
    Route::delete('tags/destroy', 'TagController@massDestroy')->name('tags.massDestroy');
    Route::resource('tags', 'TagController');

    // Teams
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::post('teams/media', 'TeamController@storeMedia')->name('teams.storeMedia');
    Route::resource('teams', 'TeamController');

    // Counters
    Route::delete('counters/destroy', 'CounterController@massDestroy')->name('counters.massDestroy');
    Route::post('counters/media', 'CounterController@storeMedia')->name('counters.storeMedia');
    Route::resource('counters', 'CounterController');

    // Reels
    Route::delete('reels/destroy', 'ReelController@massDestroy')->name('reels.massDestroy');
    Route::post('reels/media', 'ReelController@storeMedia')->name('reels.storeMedia');
    Route::resource('reels', 'ReelController');

    // Socials
    Route::delete('socials/destroy', 'SocialController@massDestroy')->name('socials.massDestroy');
    Route::post('socials/media', 'SocialController@storeMedia')->name('socials.storeMedia');
    Route::resource('socials', 'SocialController');

    // Projects
    Route::delete('projects/destroy', 'ProjectController@massDestroy')->name('projects.massDestroy');
    Route::post('projects/media', 'ProjectController@storeMedia')->name('projects.storeMedia');
    Route::resource('projects', 'ProjectController');

    // Branches
    Route::delete('branches/destroy', 'BranchController@massDestroy')->name('branches.massDestroy');
    Route::resource('branches', 'BranchController');

    // Feeds
    Route::delete('feeds/destroy', 'FeedController@massDestroy')->name('feeds.massDestroy');
    Route::resource('feeds', 'FeedController');

    // Faqs
    Route::delete('faqs/destroy', 'FaqController@massDestroy')->name('faqs.massDestroy');
    Route::resource('faqs', 'FaqController');

    // Orders
    Route::delete('orders/destroy', 'OrdersController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrdersController');

    // Vehicle Types
    Route::delete('vehicle-types/destroy', 'VehicleTypesController@massDestroy')->name('vehicle-types.massDestroy');
    Route::resource('vehicle-types', 'VehicleTypesController');

    // Subscribers
    Route::delete('subscribers/destroy', 'SubscribersController@massDestroy')->name('subscribers.massDestroy');
    Route::resource('subscribers', 'SubscribersController');

    // Visitors
    Route::delete('visitors/destroy', 'VisitorsController@massDestroy')->name('visitors.massDestroy');
    Route::resource('visitors', 'VisitorsController');

    // Floors
    Route::delete('floors/destroy', 'FloorController@massDestroy')->name('floors.massDestroy');
    Route::resource('floors', 'FloorController');

    // Furnishings
    Route::delete('furnishings/destroy', 'FurnishingController@massDestroy')->name('furnishings.massDestroy');
    Route::resource('furnishings', 'FurnishingController');

    // Statuses
    Route::delete('statuses/destroy', 'StatusController@massDestroy')->name('statuses.massDestroy');
    Route::resource('statuses', 'StatusController');

    // Systems
    Route::delete('systems/destroy', 'SystemController@massDestroy')->name('systems.massDestroy');
    Route::resource('systems', 'SystemController');

    // Owners
    Route::delete('owners/destroy', 'OwnerController@massDestroy')->name('owners.massDestroy');
    Route::resource('owners', 'OwnerController');

    // Sections
    Route::delete('sections/destroy', 'SectionController@massDestroy')->name('sections.massDestroy');
    Route::resource('sections', 'SectionController');

});
