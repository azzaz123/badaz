<?php

use App\Http\Controllers\API\Admin\AbuseReportsController;
use App\Http\Controllers\API\Admin\AdSpacesController;
use App\Http\Controllers\API\Admin\AuthController;
use App\Http\Controllers\API\Admin\BankTransfersController;
use App\Http\Controllers\API\Admin\BlogCategoriesController;
use App\Http\Controllers\API\Admin\BlogCommentsController;
use App\Http\Controllers\API\Admin\BlogImagesController;
use App\Http\Controllers\API\Admin\BlogPostsController;
use App\Http\Controllers\API\Admin\BlogTagsController;
use App\Http\Controllers\API\Admin\CategoriesController;
use App\Http\Controllers\API\Admin\CategoriesLangController;
use App\Http\Controllers\API\Admin\CiSessionsController;
use App\Http\Controllers\API\Admin\CommentsController;
use App\Http\Controllers\API\Admin\ContactsController;
use App\Http\Controllers\API\Admin\ConversationMessagesController;
use App\Http\Controllers\API\Admin\ConversationsController;
use App\Http\Controllers\API\Admin\CouponProductsController;
use App\Http\Controllers\API\Admin\CouponsController;
use App\Http\Controllers\API\Admin\CouponsUsedController;
use App\Http\Controllers\API\Admin\CurrenciesController;
use App\Http\Controllers\API\Admin\CustomFieldsCategoryController;
use App\Http\Controllers\API\Admin\CustomFieldsController;
use App\Http\Controllers\API\Admin\CustomFieldsOptionsController;
use App\Http\Controllers\API\Admin\CustomFieldsOptionsLangController;
use App\Http\Controllers\API\Admin\CustomFieldsProductController;
use App\Http\Controllers\API\Admin\DigitalFilesController;
use App\Http\Controllers\API\Admin\DigitalSalesController;
use App\Http\Controllers\API\Admin\EarningsController;
use App\Http\Controllers\API\Admin\FollowersController;
use App\Http\Controllers\API\Admin\FontsController;
use App\Http\Controllers\API\Admin\GeneralSettingsController;
use App\Http\Controllers\API\Admin\HomepageBannersController;
use App\Http\Controllers\API\Admin\ImagesController;
use App\Http\Controllers\API\Admin\ImagesFileManagerController;
use App\Http\Controllers\API\Admin\ImagesVariationController;
use App\Http\Controllers\API\Admin\InvoicesController;
use App\Http\Controllers\API\Admin\KnowledgeBaseCategoriesController;
use App\Http\Controllers\API\Admin\KnowledgeBaseController;
use App\Http\Controllers\API\Admin\LanguagesController;
use App\Http\Controllers\API\Admin\LanguageTranslationsController;
use App\Http\Controllers\API\Admin\LocationCountriesController;
use App\Http\Controllers\API\Admin\LocationStatesController;
use App\Http\Controllers\API\Admin\MediaController;
use App\Http\Controllers\API\Admin\MembershipPlansController;
use App\Http\Controllers\API\Admin\MembershipTransactionsController;
use App\Http\Controllers\API\Admin\OrderProductsController;
use App\Http\Controllers\API\Admin\OrdersController;
use App\Http\Controllers\API\Admin\OrderShippingController;
use App\Http\Controllers\API\Admin\PagesController;
use App\Http\Controllers\API\Admin\PaymentGatewaysController;
use App\Http\Controllers\API\Admin\PaymentsController;
use App\Http\Controllers\API\Admin\PaymentSettingsController;
use App\Http\Controllers\API\Admin\PayoutsController;
use App\Http\Controllers\API\Admin\PermissionController;
use App\Http\Controllers\API\Admin\ProductDetailsController;
use App\Http\Controllers\API\Admin\ProductLicenseKeysController;
use App\Http\Controllers\API\Admin\ProductsController;
use App\Http\Controllers\API\Admin\ProductSettingsController;
use App\Http\Controllers\API\Admin\PromotedTransactionsController;
use App\Http\Controllers\API\Admin\QuoteRequestsController;
use App\Http\Controllers\API\Admin\RefundRequestsController;
use App\Http\Controllers\API\Admin\RefundRequestsMessagesController;
use App\Http\Controllers\API\Admin\ReviewsController;
use App\Http\Controllers\API\Admin\RoleController;
use App\Http\Controllers\API\Admin\RolesPermissionsController;
use App\Http\Controllers\API\Admin\RoutesController;
use App\Http\Controllers\API\Admin\SettingsController;
use App\Http\Controllers\API\Admin\ShippingAddressesController;
use App\Http\Controllers\API\Admin\ShippingClassesController;
use App\Http\Controllers\API\Admin\ShippingDeliveryTimesController;
use App\Http\Controllers\API\Admin\ShippingZoneLocationsController;
use App\Http\Controllers\API\Admin\ShippingZoneMethodsController;
use App\Http\Controllers\API\Admin\ShippingZonesController;
use App\Http\Controllers\API\Admin\SliderController;
use App\Http\Controllers\API\Admin\StorageSettingsController;
use App\Http\Controllers\API\Admin\SubscribersController;
use App\Http\Controllers\API\Admin\SupportSubticketsController;
use App\Http\Controllers\API\Admin\SupportTicketsController;
use App\Http\Controllers\API\Admin\TransactionsController;
use App\Http\Controllers\API\Admin\UserController;
use App\Http\Controllers\API\Admin\UserRoleController;
use App\Http\Controllers\API\Admin\UsersController;
use App\Http\Controllers\API\Admin\UsersMembershipPlansController;
use App\Http\Controllers\API\Admin\UsersPayoutAccountsController;
use App\Http\Controllers\API\Admin\VariationOptionsController;
use App\Http\Controllers\API\Admin\VariationsController;
use App\Http\Controllers\API\Admin\WishlistController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum', 'validate.user']], function () {
    Route::get('roles', [RoleController::class, 'index'])
        ->name('role.index')
        ->middleware(['permission:manage_roles']);
    Route::get('roles/{role}', [RoleController::class, 'show'])
        ->name('role.show')
        ->middleware(['permission:manage_roles']);
    Route::post('roles', [RoleController::class, 'store'])
        ->name('role.store')
        ->middleware(['permission:manage_roles']);
    Route::put('roles/{role}', [RoleController::class, 'update'])
        ->name('role.update')
        ->middleware(['permission:manage_roles']);
    Route::delete('roles/{role}', [RoleController::class, 'delete'])
        ->name('role.delete')
        ->middleware(['permission:manage_roles']);
    Route::post('roles/bulk-create', [RoleController::class, 'bulkStore'])
        ->name('role.store.bulk')
        ->middleware(['permission:manage_roles']);
    Route::post('roles/bulk-update', [RoleController::class, 'bulkUpdate'])
        ->name('role.update.bulk')
        ->middleware(['permission:manage_roles']);

    Route::get('permissions', [PermissionController::class, 'index'])
        ->name('permission.index')
        ->middleware(['permission:manage_roles']);
    Route::get('permissions/{permission}', [PermissionController::class, 'show'])
        ->name('permission.show')
        ->middleware(['permission:manage_roles']);

    Route::post('users/assign-role', [UserRoleController::class, 'assignRole'])
        ->name('users.role.assign')
        ->middleware(['permission:manage_roles']);
    Route::get('users/{user}/roles', [UserRoleController::class, 'getAssignedRoles'])
        ->name('get.assigned.roles')
        ->middleware(['permission:manage_roles']);
    Route::put('users/{user}/update-role', [UserRoleController::class, 'updateUserRole'])
        ->name('users.role.update')
        ->middleware(['permission:manage_roles']);
    Route::post('users/bulk-assign-role', [UserRoleController::class, 'bulkAssignRole'])
        ->name('users.bulk.assign.roles')
        ->middleware(['permission:manage_roles']);
});

Route::get('wishlists', [WishlistController::class, 'index'])
    ->name('wishlists.index');
Route::get('wishlists/{wishlist}', [WishlistController::class, 'show'])
    ->name('wishlist.show');
Route::post('wishlists', [WishlistController::class, 'store'])
    ->name('wishlist.store');
Route::put('wishlists/{wishlist}', [WishlistController::class, 'update'])
    ->name('wishlist.update');
Route::delete('wishlists/{wishlist}', [WishlistController::class, 'delete'])
    ->name('wishlist.delete');
Route::post('wishlists/bulk-create', [WishlistController::class, 'bulkStore'])
    ->name('wishlist.store.bulk');
Route::post('wishlists/bulk-update', [WishlistController::class, 'bulkUpdate'])
    ->name('wishlist.update.bulk');
Route::get('variation-options', [VariationOptionsController::class, 'index'])
    ->name('variation-options.index');
Route::get('variation-options/{variationOptions}', [VariationOptionsController::class, 'show'])
    ->name('variationOptions.show');
Route::post('variation-options', [VariationOptionsController::class, 'store'])
    ->name('variationOptions.store');
Route::put('variation-options/{variationOptions}', [VariationOptionsController::class, 'update'])
    ->name('variationOptions.update');
Route::delete('variation-options/{variationOptions}', [VariationOptionsController::class, 'delete'])
    ->name('variationOptions.delete');
Route::post('variation-options/bulk-create', [VariationOptionsController::class, 'bulkStore'])
    ->name('variationOptions.store.bulk');
Route::post('variation-options/bulk-update', [VariationOptionsController::class, 'bulkUpdate'])
    ->name('variationOptions.update.bulk');
Route::get('variations', [VariationsController::class, 'index'])
    ->name('variations.index');
Route::get('variations/{variations}', [VariationsController::class, 'show'])
    ->name('variations.show');
Route::post('variations', [VariationsController::class, 'store'])
    ->name('variations.store');
Route::put('variations/{variations}', [VariationsController::class, 'update'])
    ->name('variations.update');
Route::delete('variations/{variations}', [VariationsController::class, 'delete'])
    ->name('variations.delete');
Route::post('variations/bulk-create', [VariationsController::class, 'bulkStore'])
    ->name('variations.store.bulk');
Route::post('variations/bulk-update', [VariationsController::class, 'bulkUpdate'])
    ->name('variations.update.bulk');
Route::get('users-payout-accounts', [UsersPayoutAccountsController::class, 'index'])
    ->name('users-payout-accounts.index');
Route::get('users-payout-accounts/{usersPayoutAccounts}', [UsersPayoutAccountsController::class, 'show'])
    ->name('usersPayoutAccounts.show');
Route::post('users-payout-accounts', [UsersPayoutAccountsController::class, 'store'])
    ->name('usersPayoutAccounts.store');
Route::put('users-payout-accounts/{usersPayoutAccounts}', [UsersPayoutAccountsController::class, 'update'])
    ->name('usersPayoutAccounts.update');
Route::delete('users-payout-accounts/{usersPayoutAccounts}', [UsersPayoutAccountsController::class, 'delete'])
    ->name('usersPayoutAccounts.delete');
Route::post('users-payout-accounts/bulk-create', [UsersPayoutAccountsController::class, 'bulkStore'])
    ->name('usersPayoutAccounts.store.bulk');
Route::post('users-payout-accounts/bulk-update', [UsersPayoutAccountsController::class, 'bulkUpdate'])
    ->name('usersPayoutAccounts.update.bulk');
Route::get('users-membership-plans', [UsersMembershipPlansController::class, 'index'])
    ->name('users-membership-plans.index');
Route::get('users-membership-plans/{usersMembershipPlans}', [UsersMembershipPlansController::class, 'show'])
    ->name('usersMembershipPlans.show');
Route::post('users-membership-plans', [UsersMembershipPlansController::class, 'store'])
    ->name('usersMembershipPlans.store');
Route::put('users-membership-plans/{usersMembershipPlans}', [UsersMembershipPlansController::class, 'update'])
    ->name('usersMembershipPlans.update');
Route::delete('users-membership-plans/{usersMembershipPlans}', [UsersMembershipPlansController::class, 'delete'])
    ->name('usersMembershipPlans.delete');
Route::post('users-membership-plans/bulk-create', [UsersMembershipPlansController::class, 'bulkStore'])
    ->name('usersMembershipPlans.store.bulk');
Route::post('users-membership-plans/bulk-update', [UsersMembershipPlansController::class, 'bulkUpdate'])
    ->name('usersMembershipPlans.update.bulk');
Route::get('users', [UsersController::class, 'index'])
    ->name('users.index');
Route::get('users/{users}', [UsersController::class, 'show'])
    ->name('users.show');
Route::post('users', [UsersController::class, 'store'])
    ->name('users.store');
Route::put('users/{users}', [UsersController::class, 'update'])
    ->name('users.update');
Route::delete('users/{users}', [UsersController::class, 'delete'])
    ->name('users.delete');
Route::post('users/bulk-create', [UsersController::class, 'bulkStore'])
    ->name('users.store.bulk');
Route::post('users/bulk-update', [UsersController::class, 'bulkUpdate'])
    ->name('users.update.bulk');
Route::get('transactions', [TransactionsController::class, 'index'])
    ->name('transactions.index');
Route::get('transactions/{transactions}', [TransactionsController::class, 'show'])
    ->name('transactions.show');
Route::post('transactions', [TransactionsController::class, 'store'])
    ->name('transactions.store');
Route::put('transactions/{transactions}', [TransactionsController::class, 'update'])
    ->name('transactions.update');
Route::delete('transactions/{transactions}', [TransactionsController::class, 'delete'])
    ->name('transactions.delete');
Route::post('transactions/bulk-create', [TransactionsController::class, 'bulkStore'])
    ->name('transactions.store.bulk');
Route::post('transactions/bulk-update', [TransactionsController::class, 'bulkUpdate'])
    ->name('transactions.update.bulk');
Route::get('support-tickets', [SupportTicketsController::class, 'index'])
    ->name('support-tickets.index');
Route::get('support-tickets/{supportTickets}', [SupportTicketsController::class, 'show'])
    ->name('supportTickets.show');
Route::post('support-tickets', [SupportTicketsController::class, 'store'])
    ->name('supportTickets.store');
Route::put('support-tickets/{supportTickets}', [SupportTicketsController::class, 'update'])
    ->name('supportTickets.update');
Route::delete('support-tickets/{supportTickets}', [SupportTicketsController::class, 'delete'])
    ->name('supportTickets.delete');
Route::post('support-tickets/bulk-create', [SupportTicketsController::class, 'bulkStore'])
    ->name('supportTickets.store.bulk');
Route::post('support-tickets/bulk-update', [SupportTicketsController::class, 'bulkUpdate'])
    ->name('supportTickets.update.bulk');
Route::get('support-subtickets', [SupportSubticketsController::class, 'index'])
    ->name('support-subtickets.index');
Route::get('support-subtickets/{supportSubtickets}', [SupportSubticketsController::class, 'show'])
    ->name('supportSubtickets.show');
Route::post('support-subtickets', [SupportSubticketsController::class, 'store'])
    ->name('supportSubtickets.store');
Route::put('support-subtickets/{supportSubtickets}', [SupportSubticketsController::class, 'update'])
    ->name('supportSubtickets.update');
Route::delete('support-subtickets/{supportSubtickets}', [SupportSubticketsController::class, 'delete'])
    ->name('supportSubtickets.delete');
Route::post('support-subtickets/bulk-create', [SupportSubticketsController::class, 'bulkStore'])
    ->name('supportSubtickets.store.bulk');
Route::post('support-subtickets/bulk-update', [SupportSubticketsController::class, 'bulkUpdate'])
    ->name('supportSubtickets.update.bulk');
Route::get('subscribers', [SubscribersController::class, 'index'])
    ->name('subscribers.index');
Route::get('subscribers/{subscribers}', [SubscribersController::class, 'show'])
    ->name('subscribers.show');
Route::post('subscribers', [SubscribersController::class, 'store'])
    ->name('subscribers.store');
Route::put('subscribers/{subscribers}', [SubscribersController::class, 'update'])
    ->name('subscribers.update');
Route::delete('subscribers/{subscribers}', [SubscribersController::class, 'delete'])
    ->name('subscribers.delete');
Route::post('subscribers/bulk-create', [SubscribersController::class, 'bulkStore'])
    ->name('subscribers.store.bulk');
Route::post('subscribers/bulk-update', [SubscribersController::class, 'bulkUpdate'])
    ->name('subscribers.update.bulk');
Route::get('storage-settings', [StorageSettingsController::class, 'index'])
    ->name('storage-settings.index');
Route::get('storage-settings/{storageSettings}', [StorageSettingsController::class, 'show'])
    ->name('storageSettings.show');
Route::post('storage-settings', [StorageSettingsController::class, 'store'])
    ->name('storageSettings.store');
Route::put('storage-settings/{storageSettings}', [StorageSettingsController::class, 'update'])
    ->name('storageSettings.update');
Route::delete('storage-settings/{storageSettings}', [StorageSettingsController::class, 'delete'])
    ->name('storageSettings.delete');
Route::post('storage-settings/bulk-create', [StorageSettingsController::class, 'bulkStore'])
    ->name('storageSettings.store.bulk');
Route::post('storage-settings/bulk-update', [StorageSettingsController::class, 'bulkUpdate'])
    ->name('storageSettings.update.bulk');
Route::get('sliders', [SliderController::class, 'index'])
    ->name('sliders.index');
Route::get('sliders/{slider}', [SliderController::class, 'show'])
    ->name('slider.show');
Route::post('sliders', [SliderController::class, 'store'])
    ->name('slider.store');
Route::put('sliders/{slider}', [SliderController::class, 'update'])
    ->name('slider.update');
Route::delete('sliders/{slider}', [SliderController::class, 'delete'])
    ->name('slider.delete');
Route::post('sliders/bulk-create', [SliderController::class, 'bulkStore'])
    ->name('slider.store.bulk');
Route::post('sliders/bulk-update', [SliderController::class, 'bulkUpdate'])
    ->name('slider.update.bulk');
Route::get('shipping-zone-methods', [ShippingZoneMethodsController::class, 'index'])
    ->name('shipping-zone-methods.index');
Route::get('shipping-zone-methods/{shippingZoneMethods}', [ShippingZoneMethodsController::class, 'show'])
    ->name('shippingZoneMethods.show');
Route::post('shipping-zone-methods', [ShippingZoneMethodsController::class, 'store'])
    ->name('shippingZoneMethods.store');
Route::put('shipping-zone-methods/{shippingZoneMethods}', [ShippingZoneMethodsController::class, 'update'])
    ->name('shippingZoneMethods.update');
Route::delete('shipping-zone-methods/{shippingZoneMethods}', [ShippingZoneMethodsController::class, 'delete'])
    ->name('shippingZoneMethods.delete');
Route::post('shipping-zone-methods/bulk-create', [ShippingZoneMethodsController::class, 'bulkStore'])
    ->name('shippingZoneMethods.store.bulk');
Route::post('shipping-zone-methods/bulk-update', [ShippingZoneMethodsController::class, 'bulkUpdate'])
    ->name('shippingZoneMethods.update.bulk');
Route::get('shipping-zone-locations', [ShippingZoneLocationsController::class, 'index'])
    ->name('shipping-zone-locations.index');
Route::get('shipping-zone-locations/{shippingZoneLocations}', [ShippingZoneLocationsController::class, 'show'])
    ->name('shippingZoneLocations.show');
Route::post('shipping-zone-locations', [ShippingZoneLocationsController::class, 'store'])
    ->name('shippingZoneLocations.store');
Route::put('shipping-zone-locations/{shippingZoneLocations}', [ShippingZoneLocationsController::class, 'update'])
    ->name('shippingZoneLocations.update');
Route::delete('shipping-zone-locations/{shippingZoneLocations}', [ShippingZoneLocationsController::class, 'delete'])
    ->name('shippingZoneLocations.delete');
Route::post('shipping-zone-locations/bulk-create', [ShippingZoneLocationsController::class, 'bulkStore'])
    ->name('shippingZoneLocations.store.bulk');
Route::post('shipping-zone-locations/bulk-update', [ShippingZoneLocationsController::class, 'bulkUpdate'])
    ->name('shippingZoneLocations.update.bulk');
Route::get('shipping-zones', [ShippingZonesController::class, 'index'])
    ->name('shipping-zones.index');
Route::get('shipping-zones/{shippingZones}', [ShippingZonesController::class, 'show'])
    ->name('shippingZones.show');
Route::post('shipping-zones', [ShippingZonesController::class, 'store'])
    ->name('shippingZones.store');
Route::put('shipping-zones/{shippingZones}', [ShippingZonesController::class, 'update'])
    ->name('shippingZones.update');
Route::delete('shipping-zones/{shippingZones}', [ShippingZonesController::class, 'delete'])
    ->name('shippingZones.delete');
Route::post('shipping-zones/bulk-create', [ShippingZonesController::class, 'bulkStore'])
    ->name('shippingZones.store.bulk');
Route::post('shipping-zones/bulk-update', [ShippingZonesController::class, 'bulkUpdate'])
    ->name('shippingZones.update.bulk');
Route::get('shipping-delivery-times', [ShippingDeliveryTimesController::class, 'index'])
    ->name('shipping-delivery-times.index');
Route::get('shipping-delivery-times/{shippingDeliveryTimes}', [ShippingDeliveryTimesController::class, 'show'])
    ->name('shippingDeliveryTimes.show');
Route::post('shipping-delivery-times', [ShippingDeliveryTimesController::class, 'store'])
    ->name('shippingDeliveryTimes.store');
Route::put('shipping-delivery-times/{shippingDeliveryTimes}', [ShippingDeliveryTimesController::class, 'update'])
    ->name('shippingDeliveryTimes.update');
Route::delete('shipping-delivery-times/{shippingDeliveryTimes}', [ShippingDeliveryTimesController::class, 'delete'])
    ->name('shippingDeliveryTimes.delete');
Route::post('shipping-delivery-times/bulk-create', [ShippingDeliveryTimesController::class, 'bulkStore'])
    ->name('shippingDeliveryTimes.store.bulk');
Route::post('shipping-delivery-times/bulk-update', [ShippingDeliveryTimesController::class, 'bulkUpdate'])
    ->name('shippingDeliveryTimes.update.bulk');
Route::get('shipping-classes', [ShippingClassesController::class, 'index'])
    ->name('shipping-classes.index');
Route::get('shipping-classes/{shippingClasses}', [ShippingClassesController::class, 'show'])
    ->name('shippingClasses.show');
Route::post('shipping-classes', [ShippingClassesController::class, 'store'])
    ->name('shippingClasses.store');
Route::put('shipping-classes/{shippingClasses}', [ShippingClassesController::class, 'update'])
    ->name('shippingClasses.update');
Route::delete('shipping-classes/{shippingClasses}', [ShippingClassesController::class, 'delete'])
    ->name('shippingClasses.delete');
Route::post('shipping-classes/bulk-create', [ShippingClassesController::class, 'bulkStore'])
    ->name('shippingClasses.store.bulk');
Route::post('shipping-classes/bulk-update', [ShippingClassesController::class, 'bulkUpdate'])
    ->name('shippingClasses.update.bulk');
Route::get('shipping-addresses', [ShippingAddressesController::class, 'index'])
    ->name('shipping-addresses.index');
Route::get('shipping-addresses/{shippingAddresses}', [ShippingAddressesController::class, 'show'])
    ->name('shippingAddresses.show');
Route::post('shipping-addresses', [ShippingAddressesController::class, 'store'])
    ->name('shippingAddresses.store');
Route::put('shipping-addresses/{shippingAddresses}', [ShippingAddressesController::class, 'update'])
    ->name('shippingAddresses.update');
Route::delete('shipping-addresses/{shippingAddresses}', [ShippingAddressesController::class, 'delete'])
    ->name('shippingAddresses.delete');
Route::post('shipping-addresses/bulk-create', [ShippingAddressesController::class, 'bulkStore'])
    ->name('shippingAddresses.store.bulk');
Route::post('shipping-addresses/bulk-update', [ShippingAddressesController::class, 'bulkUpdate'])
    ->name('shippingAddresses.update.bulk');
Route::get('settings', [SettingsController::class, 'index'])
    ->name('settings.index');
Route::get('settings/{settings}', [SettingsController::class, 'show'])
    ->name('settings.show');
Route::post('settings', [SettingsController::class, 'store'])
    ->name('settings.store');
Route::put('settings/{settings}', [SettingsController::class, 'update'])
    ->name('settings.update');
Route::delete('settings/{settings}', [SettingsController::class, 'delete'])
    ->name('settings.delete');
Route::post('settings/bulk-create', [SettingsController::class, 'bulkStore'])
    ->name('settings.store.bulk');
Route::post('settings/bulk-update', [SettingsController::class, 'bulkUpdate'])
    ->name('settings.update.bulk');
Route::get('routes', [RoutesController::class, 'index'])
    ->name('routes.index');
Route::get('routes/{routes}', [RoutesController::class, 'show'])
    ->name('routes.show');
Route::post('routes', [RoutesController::class, 'store'])
    ->name('routes.store');
Route::put('routes/{routes}', [RoutesController::class, 'update'])
    ->name('routes.update');
Route::delete('routes/{routes}', [RoutesController::class, 'delete'])
    ->name('routes.delete');
Route::post('routes/bulk-create', [RoutesController::class, 'bulkStore'])
    ->name('routes.store.bulk');
Route::post('routes/bulk-update', [RoutesController::class, 'bulkUpdate'])
    ->name('routes.update.bulk');
Route::get('roles-permissions', [RolesPermissionsController::class, 'index'])
    ->name('roles-permissions.index');
Route::get('roles-permissions/{rolesPermissions}', [RolesPermissionsController::class, 'show'])
    ->name('rolesPermissions.show');
Route::post('roles-permissions', [RolesPermissionsController::class, 'store'])
    ->name('rolesPermissions.store');
Route::put('roles-permissions/{rolesPermissions}', [RolesPermissionsController::class, 'update'])
    ->name('rolesPermissions.update');
Route::delete('roles-permissions/{rolesPermissions}', [RolesPermissionsController::class, 'delete'])
    ->name('rolesPermissions.delete');
Route::post('roles-permissions/bulk-create', [RolesPermissionsController::class, 'bulkStore'])
    ->name('rolesPermissions.store.bulk');
Route::post('roles-permissions/bulk-update', [RolesPermissionsController::class, 'bulkUpdate'])
    ->name('rolesPermissions.update.bulk');
Route::get('reviews', [ReviewsController::class, 'index'])
    ->name('reviews.index');
Route::get('reviews/{reviews}', [ReviewsController::class, 'show'])
    ->name('reviews.show');
Route::post('reviews', [ReviewsController::class, 'store'])
    ->name('reviews.store');
Route::put('reviews/{reviews}', [ReviewsController::class, 'update'])
    ->name('reviews.update');
Route::delete('reviews/{reviews}', [ReviewsController::class, 'delete'])
    ->name('reviews.delete');
Route::post('reviews/bulk-create', [ReviewsController::class, 'bulkStore'])
    ->name('reviews.store.bulk');
Route::post('reviews/bulk-update', [ReviewsController::class, 'bulkUpdate'])
    ->name('reviews.update.bulk');
Route::get('refund-requests-messages', [RefundRequestsMessagesController::class, 'index'])
    ->name('refund-requests-messages.index');
Route::get('refund-requests-messages/{refundRequestsMessages}', [RefundRequestsMessagesController::class, 'show'])
    ->name('refundRequestsMessages.show');
Route::post('refund-requests-messages', [RefundRequestsMessagesController::class, 'store'])
    ->name('refundRequestsMessages.store');
Route::put('refund-requests-messages/{refundRequestsMessages}', [RefundRequestsMessagesController::class, 'update'])
    ->name('refundRequestsMessages.update');
Route::delete('refund-requests-messages/{refundRequestsMessages}', [RefundRequestsMessagesController::class, 'delete'])
    ->name('refundRequestsMessages.delete');
Route::post('refund-requests-messages/bulk-create', [RefundRequestsMessagesController::class, 'bulkStore'])
    ->name('refundRequestsMessages.store.bulk');
Route::post('refund-requests-messages/bulk-update', [RefundRequestsMessagesController::class, 'bulkUpdate'])
    ->name('refundRequestsMessages.update.bulk');
Route::get('refund-requests', [RefundRequestsController::class, 'index'])
    ->name('refund-requests.index');
Route::get('refund-requests/{refundRequests}', [RefundRequestsController::class, 'show'])
    ->name('refundRequests.show');
Route::post('refund-requests', [RefundRequestsController::class, 'store'])
    ->name('refundRequests.store');
Route::put('refund-requests/{refundRequests}', [RefundRequestsController::class, 'update'])
    ->name('refundRequests.update');
Route::delete('refund-requests/{refundRequests}', [RefundRequestsController::class, 'delete'])
    ->name('refundRequests.delete');
Route::post('refund-requests/bulk-create', [RefundRequestsController::class, 'bulkStore'])
    ->name('refundRequests.store.bulk');
Route::post('refund-requests/bulk-update', [RefundRequestsController::class, 'bulkUpdate'])
    ->name('refundRequests.update.bulk');
Route::get('quote-requests', [QuoteRequestsController::class, 'index'])
    ->name('quote-requests.index');
Route::get('quote-requests/{quoteRequests}', [QuoteRequestsController::class, 'show'])
    ->name('quoteRequests.show');
Route::post('quote-requests', [QuoteRequestsController::class, 'store'])
    ->name('quoteRequests.store');
Route::put('quote-requests/{quoteRequests}', [QuoteRequestsController::class, 'update'])
    ->name('quoteRequests.update');
Route::delete('quote-requests/{quoteRequests}', [QuoteRequestsController::class, 'delete'])
    ->name('quoteRequests.delete');
Route::post('quote-requests/bulk-create', [QuoteRequestsController::class, 'bulkStore'])
    ->name('quoteRequests.store.bulk');
Route::post('quote-requests/bulk-update', [QuoteRequestsController::class, 'bulkUpdate'])
    ->name('quoteRequests.update.bulk');
Route::get('promoted-transactions', [PromotedTransactionsController::class, 'index'])
    ->name('promoted-transactions.index');
Route::get('promoted-transactions/{promotedTransactions}', [PromotedTransactionsController::class, 'show'])
    ->name('promotedTransactions.show');
Route::post('promoted-transactions', [PromotedTransactionsController::class, 'store'])
    ->name('promotedTransactions.store');
Route::put('promoted-transactions/{promotedTransactions}', [PromotedTransactionsController::class, 'update'])
    ->name('promotedTransactions.update');
Route::delete('promoted-transactions/{promotedTransactions}', [PromotedTransactionsController::class, 'delete'])
    ->name('promotedTransactions.delete');
Route::post('promoted-transactions/bulk-create', [PromotedTransactionsController::class, 'bulkStore'])
    ->name('promotedTransactions.store.bulk');
Route::post('promoted-transactions/bulk-update', [PromotedTransactionsController::class, 'bulkUpdate'])
    ->name('promotedTransactions.update.bulk');
Route::get('product-settings', [ProductSettingsController::class, 'index'])
    ->name('product-settings.index');
Route::get('product-settings/{productSettings}', [ProductSettingsController::class, 'show'])
    ->name('productSettings.show');
Route::post('product-settings', [ProductSettingsController::class, 'store'])
    ->name('productSettings.store');
Route::put('product-settings/{productSettings}', [ProductSettingsController::class, 'update'])
    ->name('productSettings.update');
Route::delete('product-settings/{productSettings}', [ProductSettingsController::class, 'delete'])
    ->name('productSettings.delete');
Route::post('product-settings/bulk-create', [ProductSettingsController::class, 'bulkStore'])
    ->name('productSettings.store.bulk');
Route::post('product-settings/bulk-update', [ProductSettingsController::class, 'bulkUpdate'])
    ->name('productSettings.update.bulk');
Route::get('product-license-keys', [ProductLicenseKeysController::class, 'index'])
    ->name('product-license-keys.index');
Route::get('product-license-keys/{productLicenseKeys}', [ProductLicenseKeysController::class, 'show'])
    ->name('productLicenseKeys.show');
Route::post('product-license-keys', [ProductLicenseKeysController::class, 'store'])
    ->name('productLicenseKeys.store');
Route::put('product-license-keys/{productLicenseKeys}', [ProductLicenseKeysController::class, 'update'])
    ->name('productLicenseKeys.update');
Route::delete('product-license-keys/{productLicenseKeys}', [ProductLicenseKeysController::class, 'delete'])
    ->name('productLicenseKeys.delete');
Route::post('product-license-keys/bulk-create', [ProductLicenseKeysController::class, 'bulkStore'])
    ->name('productLicenseKeys.store.bulk');
Route::post('product-license-keys/bulk-update', [ProductLicenseKeysController::class, 'bulkUpdate'])
    ->name('productLicenseKeys.update.bulk');
Route::get('product-details', [ProductDetailsController::class, 'index'])
    ->name('product-details.index');
Route::get('product-details/{productDetails}', [ProductDetailsController::class, 'show'])
    ->name('productDetails.show');
Route::post('product-details', [ProductDetailsController::class, 'store'])
    ->name('productDetails.store');
Route::put('product-details/{productDetails}', [ProductDetailsController::class, 'update'])
    ->name('productDetails.update');
Route::delete('product-details/{productDetails}', [ProductDetailsController::class, 'delete'])
    ->name('productDetails.delete');
Route::post('product-details/bulk-create', [ProductDetailsController::class, 'bulkStore'])
    ->name('productDetails.store.bulk');
Route::post('product-details/bulk-update', [ProductDetailsController::class, 'bulkUpdate'])
    ->name('productDetails.update.bulk');
Route::get('products', [ProductsController::class, 'index'])
    ->name('products.index');
Route::get('products/{products}', [ProductsController::class, 'show'])
    ->name('products.show');
Route::post('products', [ProductsController::class, 'store'])
    ->name('products.store');
Route::put('products/{products}', [ProductsController::class, 'update'])
    ->name('products.update');
Route::delete('products/{products}', [ProductsController::class, 'delete'])
    ->name('products.delete');
Route::post('products/bulk-create', [ProductsController::class, 'bulkStore'])
    ->name('products.store.bulk');
Route::post('products/bulk-update', [ProductsController::class, 'bulkUpdate'])
    ->name('products.update.bulk');
Route::get('payouts', [PayoutsController::class, 'index'])
    ->name('payouts.index');
Route::get('payouts/{payouts}', [PayoutsController::class, 'show'])
    ->name('payouts.show');
Route::post('payouts', [PayoutsController::class, 'store'])
    ->name('payouts.store');
Route::put('payouts/{payouts}', [PayoutsController::class, 'update'])
    ->name('payouts.update');
Route::delete('payouts/{payouts}', [PayoutsController::class, 'delete'])
    ->name('payouts.delete');
Route::post('payouts/bulk-create', [PayoutsController::class, 'bulkStore'])
    ->name('payouts.store.bulk');
Route::post('payouts/bulk-update', [PayoutsController::class, 'bulkUpdate'])
    ->name('payouts.update.bulk');
Route::get('payment-settings', [PaymentSettingsController::class, 'index'])
    ->name('payment-settings.index');
Route::get('payment-settings/{paymentSettings}', [PaymentSettingsController::class, 'show'])
    ->name('paymentSettings.show');
Route::post('payment-settings', [PaymentSettingsController::class, 'store'])
    ->name('paymentSettings.store');
Route::put('payment-settings/{paymentSettings}', [PaymentSettingsController::class, 'update'])
    ->name('paymentSettings.update');
Route::delete('payment-settings/{paymentSettings}', [PaymentSettingsController::class, 'delete'])
    ->name('paymentSettings.delete');
Route::post('payment-settings/bulk-create', [PaymentSettingsController::class, 'bulkStore'])
    ->name('paymentSettings.store.bulk');
Route::post('payment-settings/bulk-update', [PaymentSettingsController::class, 'bulkUpdate'])
    ->name('paymentSettings.update.bulk');
Route::get('payment-gateways', [PaymentGatewaysController::class, 'index'])
    ->name('payment-gateways.index');
Route::get('payment-gateways/{paymentGateways}', [PaymentGatewaysController::class, 'show'])
    ->name('paymentGateways.show');
Route::post('payment-gateways', [PaymentGatewaysController::class, 'store'])
    ->name('paymentGateways.store');
Route::put('payment-gateways/{paymentGateways}', [PaymentGatewaysController::class, 'update'])
    ->name('paymentGateways.update');
Route::delete('payment-gateways/{paymentGateways}', [PaymentGatewaysController::class, 'delete'])
    ->name('paymentGateways.delete');
Route::post('payment-gateways/bulk-create', [PaymentGatewaysController::class, 'bulkStore'])
    ->name('paymentGateways.store.bulk');
Route::post('payment-gateways/bulk-update', [PaymentGatewaysController::class, 'bulkUpdate'])
    ->name('paymentGateways.update.bulk');
Route::get('payments', [PaymentsController::class, 'index'])
    ->name('payments.index');
Route::get('payments/{payments}', [PaymentsController::class, 'show'])
    ->name('payments.show');
Route::post('payments', [PaymentsController::class, 'store'])
    ->name('payments.store');
Route::put('payments/{payments}', [PaymentsController::class, 'update'])
    ->name('payments.update');
Route::delete('payments/{payments}', [PaymentsController::class, 'delete'])
    ->name('payments.delete');
Route::post('payments/bulk-create', [PaymentsController::class, 'bulkStore'])
    ->name('payments.store.bulk');
Route::post('payments/bulk-update', [PaymentsController::class, 'bulkUpdate'])
    ->name('payments.update.bulk');
Route::get('pages', [PagesController::class, 'index'])
    ->name('pages.index');
Route::get('pages/{pages}', [PagesController::class, 'show'])
    ->name('pages.show');
Route::post('pages', [PagesController::class, 'store'])
    ->name('pages.store');
Route::put('pages/{pages}', [PagesController::class, 'update'])
    ->name('pages.update');
Route::delete('pages/{pages}', [PagesController::class, 'delete'])
    ->name('pages.delete');
Route::post('pages/bulk-create', [PagesController::class, 'bulkStore'])
    ->name('pages.store.bulk');
Route::post('pages/bulk-update', [PagesController::class, 'bulkUpdate'])
    ->name('pages.update.bulk');
Route::get('order-shippings', [OrderShippingController::class, 'index'])
    ->name('order-shippings.index');
Route::get('order-shippings/{orderShipping}', [OrderShippingController::class, 'show'])
    ->name('orderShipping.show');
Route::post('order-shippings', [OrderShippingController::class, 'store'])
    ->name('orderShipping.store');
Route::put('order-shippings/{orderShipping}', [OrderShippingController::class, 'update'])
    ->name('orderShipping.update');
Route::delete('order-shippings/{orderShipping}', [OrderShippingController::class, 'delete'])
    ->name('orderShipping.delete');
Route::post('order-shippings/bulk-create', [OrderShippingController::class, 'bulkStore'])
    ->name('orderShipping.store.bulk');
Route::post('order-shippings/bulk-update', [OrderShippingController::class, 'bulkUpdate'])
    ->name('orderShipping.update.bulk');
Route::get('order-products', [OrderProductsController::class, 'index'])
    ->name('order-products.index');
Route::get('order-products/{orderProducts}', [OrderProductsController::class, 'show'])
    ->name('orderProducts.show');
Route::post('order-products', [OrderProductsController::class, 'store'])
    ->name('orderProducts.store');
Route::put('order-products/{orderProducts}', [OrderProductsController::class, 'update'])
    ->name('orderProducts.update');
Route::delete('order-products/{orderProducts}', [OrderProductsController::class, 'delete'])
    ->name('orderProducts.delete');
Route::post('order-products/bulk-create', [OrderProductsController::class, 'bulkStore'])
    ->name('orderProducts.store.bulk');
Route::post('order-products/bulk-update', [OrderProductsController::class, 'bulkUpdate'])
    ->name('orderProducts.update.bulk');
Route::get('orders', [OrdersController::class, 'index'])
    ->name('orders.index');
Route::get('orders/{orders}', [OrdersController::class, 'show'])
    ->name('orders.show');
Route::post('orders', [OrdersController::class, 'store'])
    ->name('orders.store');
Route::put('orders/{orders}', [OrdersController::class, 'update'])
    ->name('orders.update');
Route::delete('orders/{orders}', [OrdersController::class, 'delete'])
    ->name('orders.delete');
Route::post('orders/bulk-create', [OrdersController::class, 'bulkStore'])
    ->name('orders.store.bulk');
Route::post('orders/bulk-update', [OrdersController::class, 'bulkUpdate'])
    ->name('orders.update.bulk');
Route::get('membership-transactions', [MembershipTransactionsController::class, 'index'])
    ->name('membership-transactions.index');
Route::get('membership-transactions/{membershipTransactions}', [MembershipTransactionsController::class, 'show'])
    ->name('membershipTransactions.show');
Route::post('membership-transactions', [MembershipTransactionsController::class, 'store'])
    ->name('membershipTransactions.store');
Route::put('membership-transactions/{membershipTransactions}', [MembershipTransactionsController::class, 'update'])
    ->name('membershipTransactions.update');
Route::delete('membership-transactions/{membershipTransactions}', [MembershipTransactionsController::class, 'delete'])
    ->name('membershipTransactions.delete');
Route::post('membership-transactions/bulk-create', [MembershipTransactionsController::class, 'bulkStore'])
    ->name('membershipTransactions.store.bulk');
Route::post('membership-transactions/bulk-update', [MembershipTransactionsController::class, 'bulkUpdate'])
    ->name('membershipTransactions.update.bulk');
Route::get('membership-plans', [MembershipPlansController::class, 'index'])
    ->name('membership-plans.index');
Route::get('membership-plans/{membershipPlans}', [MembershipPlansController::class, 'show'])
    ->name('membershipPlans.show');
Route::post('membership-plans', [MembershipPlansController::class, 'store'])
    ->name('membershipPlans.store');
Route::put('membership-plans/{membershipPlans}', [MembershipPlansController::class, 'update'])
    ->name('membershipPlans.update');
Route::delete('membership-plans/{membershipPlans}', [MembershipPlansController::class, 'delete'])
    ->name('membershipPlans.delete');
Route::post('membership-plans/bulk-create', [MembershipPlansController::class, 'bulkStore'])
    ->name('membershipPlans.store.bulk');
Route::post('membership-plans/bulk-update', [MembershipPlansController::class, 'bulkUpdate'])
    ->name('membershipPlans.update.bulk');
Route::get('media', [MediaController::class, 'index'])
    ->name('media.index');
Route::get('media/{media}', [MediaController::class, 'show'])
    ->name('media.show');
Route::post('media', [MediaController::class, 'store'])
    ->name('media.store');
Route::put('media/{media}', [MediaController::class, 'update'])
    ->name('media.update');
Route::delete('media/{media}', [MediaController::class, 'delete'])
    ->name('media.delete');
Route::post('media/bulk-create', [MediaController::class, 'bulkStore'])
    ->name('media.store.bulk');
Route::post('media/bulk-update', [MediaController::class, 'bulkUpdate'])
    ->name('media.update.bulk');
Route::get('location-states', [LocationStatesController::class, 'index'])
    ->name('location-states.index');
Route::get('location-states/{locationStates}', [LocationStatesController::class, 'show'])
    ->name('locationStates.show');
Route::post('location-states', [LocationStatesController::class, 'store'])
    ->name('locationStates.store');
Route::put('location-states/{locationStates}', [LocationStatesController::class, 'update'])
    ->name('locationStates.update');
Route::delete('location-states/{locationStates}', [LocationStatesController::class, 'delete'])
    ->name('locationStates.delete');
Route::post('location-states/bulk-create', [LocationStatesController::class, 'bulkStore'])
    ->name('locationStates.store.bulk');
Route::post('location-states/bulk-update', [LocationStatesController::class, 'bulkUpdate'])
    ->name('locationStates.update.bulk');
Route::get('location-countries', [LocationCountriesController::class, 'index'])
    ->name('location-countries.index');
Route::get('location-countries/{locationCountries}', [LocationCountriesController::class, 'show'])
    ->name('locationCountries.show');
Route::post('location-countries', [LocationCountriesController::class, 'store'])
    ->name('locationCountries.store');
Route::put('location-countries/{locationCountries}', [LocationCountriesController::class, 'update'])
    ->name('locationCountries.update');
Route::delete('location-countries/{locationCountries}', [LocationCountriesController::class, 'delete'])
    ->name('locationCountries.delete');
Route::post('location-countries/bulk-create', [LocationCountriesController::class, 'bulkStore'])
    ->name('locationCountries.store.bulk');
Route::post('location-countries/bulk-update', [LocationCountriesController::class, 'bulkUpdate'])
    ->name('locationCountries.update.bulk');
Route::get('language-translations', [LanguageTranslationsController::class, 'index'])
    ->name('language-translations.index');
Route::get('language-translations/{languageTranslations}', [LanguageTranslationsController::class, 'show'])
    ->name('languageTranslations.show');
Route::post('language-translations', [LanguageTranslationsController::class, 'store'])
    ->name('languageTranslations.store');
Route::put('language-translations/{languageTranslations}', [LanguageTranslationsController::class, 'update'])
    ->name('languageTranslations.update');
Route::delete('language-translations/{languageTranslations}', [LanguageTranslationsController::class, 'delete'])
    ->name('languageTranslations.delete');
Route::post('language-translations/bulk-create', [LanguageTranslationsController::class, 'bulkStore'])
    ->name('languageTranslations.store.bulk');
Route::post('language-translations/bulk-update', [LanguageTranslationsController::class, 'bulkUpdate'])
    ->name('languageTranslations.update.bulk');
Route::get('languages', [LanguagesController::class, 'index'])
    ->name('languages.index');
Route::get('languages/{languages}', [LanguagesController::class, 'show'])
    ->name('languages.show');
Route::post('languages', [LanguagesController::class, 'store'])
    ->name('languages.store');
Route::put('languages/{languages}', [LanguagesController::class, 'update'])
    ->name('languages.update');
Route::delete('languages/{languages}', [LanguagesController::class, 'delete'])
    ->name('languages.delete');
Route::post('languages/bulk-create', [LanguagesController::class, 'bulkStore'])
    ->name('languages.store.bulk');
Route::post('languages/bulk-update', [LanguagesController::class, 'bulkUpdate'])
    ->name('languages.update.bulk');
Route::get('knowledge-base-categories', [KnowledgeBaseCategoriesController::class, 'index'])
    ->name('knowledge-base-categories.index');
Route::get('knowledge-base-categories/{knowledgeBaseCategories}', [KnowledgeBaseCategoriesController::class, 'show'])
    ->name('knowledgeBaseCategories.show');
Route::post('knowledge-base-categories', [KnowledgeBaseCategoriesController::class, 'store'])
    ->name('knowledgeBaseCategories.store');
Route::put('knowledge-base-categories/{knowledgeBaseCategories}', [KnowledgeBaseCategoriesController::class, 'update'])
    ->name('knowledgeBaseCategories.update');
Route::delete('knowledge-base-categories/{knowledgeBaseCategories}', [KnowledgeBaseCategoriesController::class, 'delete'])
    ->name('knowledgeBaseCategories.delete');
Route::post('knowledge-base-categories/bulk-create', [KnowledgeBaseCategoriesController::class, 'bulkStore'])
    ->name('knowledgeBaseCategories.store.bulk');
Route::post('knowledge-base-categories/bulk-update', [KnowledgeBaseCategoriesController::class, 'bulkUpdate'])
    ->name('knowledgeBaseCategories.update.bulk');
Route::get('knowledge-bases', [KnowledgeBaseController::class, 'index'])
    ->name('knowledge-bases.index');
Route::get('knowledge-bases/{knowledgeBase}', [KnowledgeBaseController::class, 'show'])
    ->name('knowledgeBase.show');
Route::post('knowledge-bases', [KnowledgeBaseController::class, 'store'])
    ->name('knowledgeBase.store');
Route::put('knowledge-bases/{knowledgeBase}', [KnowledgeBaseController::class, 'update'])
    ->name('knowledgeBase.update');
Route::delete('knowledge-bases/{knowledgeBase}', [KnowledgeBaseController::class, 'delete'])
    ->name('knowledgeBase.delete');
Route::post('knowledge-bases/bulk-create', [KnowledgeBaseController::class, 'bulkStore'])
    ->name('knowledgeBase.store.bulk');
Route::post('knowledge-bases/bulk-update', [KnowledgeBaseController::class, 'bulkUpdate'])
    ->name('knowledgeBase.update.bulk');
Route::get('invoices', [InvoicesController::class, 'index'])
    ->name('invoices.index');
Route::get('invoices/{invoices}', [InvoicesController::class, 'show'])
    ->name('invoices.show');
Route::post('invoices', [InvoicesController::class, 'store'])
    ->name('invoices.store');
Route::put('invoices/{invoices}', [InvoicesController::class, 'update'])
    ->name('invoices.update');
Route::delete('invoices/{invoices}', [InvoicesController::class, 'delete'])
    ->name('invoices.delete');
Route::post('invoices/bulk-create', [InvoicesController::class, 'bulkStore'])
    ->name('invoices.store.bulk');
Route::post('invoices/bulk-update', [InvoicesController::class, 'bulkUpdate'])
    ->name('invoices.update.bulk');
Route::get('images-variations', [ImagesVariationController::class, 'index'])
    ->name('images-variations.index');
Route::get('images-variations/{imagesVariation}', [ImagesVariationController::class, 'show'])
    ->name('imagesVariation.show');
Route::post('images-variations', [ImagesVariationController::class, 'store'])
    ->name('imagesVariation.store');
Route::put('images-variations/{imagesVariation}', [ImagesVariationController::class, 'update'])
    ->name('imagesVariation.update');
Route::delete('images-variations/{imagesVariation}', [ImagesVariationController::class, 'delete'])
    ->name('imagesVariation.delete');
Route::post('images-variations/bulk-create', [ImagesVariationController::class, 'bulkStore'])
    ->name('imagesVariation.store.bulk');
Route::post('images-variations/bulk-update', [ImagesVariationController::class, 'bulkUpdate'])
    ->name('imagesVariation.update.bulk');
Route::get('images-file-managers', [ImagesFileManagerController::class, 'index'])
    ->name('images-file-managers.index');
Route::get('images-file-managers/{imagesFileManager}', [ImagesFileManagerController::class, 'show'])
    ->name('imagesFileManager.show');
Route::post('images-file-managers', [ImagesFileManagerController::class, 'store'])
    ->name('imagesFileManager.store');
Route::put('images-file-managers/{imagesFileManager}', [ImagesFileManagerController::class, 'update'])
    ->name('imagesFileManager.update');
Route::delete('images-file-managers/{imagesFileManager}', [ImagesFileManagerController::class, 'delete'])
    ->name('imagesFileManager.delete');
Route::post('images-file-managers/bulk-create', [ImagesFileManagerController::class, 'bulkStore'])
    ->name('imagesFileManager.store.bulk');
Route::post('images-file-managers/bulk-update', [ImagesFileManagerController::class, 'bulkUpdate'])
    ->name('imagesFileManager.update.bulk');
Route::get('images', [ImagesController::class, 'index'])
    ->name('images.index');
Route::get('images/{images}', [ImagesController::class, 'show'])
    ->name('images.show');
Route::post('images', [ImagesController::class, 'store'])
    ->name('images.store');
Route::put('images/{images}', [ImagesController::class, 'update'])
    ->name('images.update');
Route::delete('images/{images}', [ImagesController::class, 'delete'])
    ->name('images.delete');
Route::post('images/bulk-create', [ImagesController::class, 'bulkStore'])
    ->name('images.store.bulk');
Route::post('images/bulk-update', [ImagesController::class, 'bulkUpdate'])
    ->name('images.update.bulk');
Route::get('homepage-banners', [HomepageBannersController::class, 'index'])
    ->name('homepage-banners.index');
Route::get('homepage-banners/{homepageBanners}', [HomepageBannersController::class, 'show'])
    ->name('homepageBanners.show');
Route::post('homepage-banners', [HomepageBannersController::class, 'store'])
    ->name('homepageBanners.store');
Route::put('homepage-banners/{homepageBanners}', [HomepageBannersController::class, 'update'])
    ->name('homepageBanners.update');
Route::delete('homepage-banners/{homepageBanners}', [HomepageBannersController::class, 'delete'])
    ->name('homepageBanners.delete');
Route::post('homepage-banners/bulk-create', [HomepageBannersController::class, 'bulkStore'])
    ->name('homepageBanners.store.bulk');
Route::post('homepage-banners/bulk-update', [HomepageBannersController::class, 'bulkUpdate'])
    ->name('homepageBanners.update.bulk');
Route::get('general-settings', [GeneralSettingsController::class, 'index'])
    ->name('general-settings.index');
Route::get('general-settings/{generalSettings}', [GeneralSettingsController::class, 'show'])
    ->name('generalSettings.show');
Route::post('general-settings', [GeneralSettingsController::class, 'store'])
    ->name('generalSettings.store');
Route::put('general-settings/{generalSettings}', [GeneralSettingsController::class, 'update'])
    ->name('generalSettings.update');
Route::delete('general-settings/{generalSettings}', [GeneralSettingsController::class, 'delete'])
    ->name('generalSettings.delete');
Route::post('general-settings/bulk-create', [GeneralSettingsController::class, 'bulkStore'])
    ->name('generalSettings.store.bulk');
Route::post('general-settings/bulk-update', [GeneralSettingsController::class, 'bulkUpdate'])
    ->name('generalSettings.update.bulk');
Route::get('fonts', [FontsController::class, 'index'])
    ->name('fonts.index');
Route::get('fonts/{fonts}', [FontsController::class, 'show'])
    ->name('fonts.show');
Route::post('fonts', [FontsController::class, 'store'])
    ->name('fonts.store');
Route::put('fonts/{fonts}', [FontsController::class, 'update'])
    ->name('fonts.update');
Route::delete('fonts/{fonts}', [FontsController::class, 'delete'])
    ->name('fonts.delete');
Route::post('fonts/bulk-create', [FontsController::class, 'bulkStore'])
    ->name('fonts.store.bulk');
Route::post('fonts/bulk-update', [FontsController::class, 'bulkUpdate'])
    ->name('fonts.update.bulk');
Route::get('followers', [FollowersController::class, 'index'])
    ->name('followers.index');
Route::get('followers/{followers}', [FollowersController::class, 'show'])
    ->name('followers.show');
Route::post('followers', [FollowersController::class, 'store'])
    ->name('followers.store');
Route::put('followers/{followers}', [FollowersController::class, 'update'])
    ->name('followers.update');
Route::delete('followers/{followers}', [FollowersController::class, 'delete'])
    ->name('followers.delete');
Route::post('followers/bulk-create', [FollowersController::class, 'bulkStore'])
    ->name('followers.store.bulk');
Route::post('followers/bulk-update', [FollowersController::class, 'bulkUpdate'])
    ->name('followers.update.bulk');
Route::get('earnings', [EarningsController::class, 'index'])
    ->name('earnings.index');
Route::get('earnings/{earnings}', [EarningsController::class, 'show'])
    ->name('earnings.show');
Route::post('earnings', [EarningsController::class, 'store'])
    ->name('earnings.store');
Route::put('earnings/{earnings}', [EarningsController::class, 'update'])
    ->name('earnings.update');
Route::delete('earnings/{earnings}', [EarningsController::class, 'delete'])
    ->name('earnings.delete');
Route::post('earnings/bulk-create', [EarningsController::class, 'bulkStore'])
    ->name('earnings.store.bulk');
Route::post('earnings/bulk-update', [EarningsController::class, 'bulkUpdate'])
    ->name('earnings.update.bulk');
Route::get('digital-sales', [DigitalSalesController::class, 'index'])
    ->name('digital-sales.index');
Route::get('digital-sales/{digitalSales}', [DigitalSalesController::class, 'show'])
    ->name('digitalSales.show');
Route::post('digital-sales', [DigitalSalesController::class, 'store'])
    ->name('digitalSales.store');
Route::put('digital-sales/{digitalSales}', [DigitalSalesController::class, 'update'])
    ->name('digitalSales.update');
Route::delete('digital-sales/{digitalSales}', [DigitalSalesController::class, 'delete'])
    ->name('digitalSales.delete');
Route::post('digital-sales/bulk-create', [DigitalSalesController::class, 'bulkStore'])
    ->name('digitalSales.store.bulk');
Route::post('digital-sales/bulk-update', [DigitalSalesController::class, 'bulkUpdate'])
    ->name('digitalSales.update.bulk');
Route::get('digital-files', [DigitalFilesController::class, 'index'])
    ->name('digital-files.index');
Route::get('digital-files/{digitalFiles}', [DigitalFilesController::class, 'show'])
    ->name('digitalFiles.show');
Route::post('digital-files', [DigitalFilesController::class, 'store'])
    ->name('digitalFiles.store');
Route::put('digital-files/{digitalFiles}', [DigitalFilesController::class, 'update'])
    ->name('digitalFiles.update');
Route::delete('digital-files/{digitalFiles}', [DigitalFilesController::class, 'delete'])
    ->name('digitalFiles.delete');
Route::post('digital-files/bulk-create', [DigitalFilesController::class, 'bulkStore'])
    ->name('digitalFiles.store.bulk');
Route::post('digital-files/bulk-update', [DigitalFilesController::class, 'bulkUpdate'])
    ->name('digitalFiles.update.bulk');
Route::get('custom-fields-products', [CustomFieldsProductController::class, 'index'])
    ->name('custom-fields-products.index');
Route::get('custom-fields-products/{customFieldsProduct}', [CustomFieldsProductController::class, 'show'])
    ->name('customFieldsProduct.show');
Route::post('custom-fields-products', [CustomFieldsProductController::class, 'store'])
    ->name('customFieldsProduct.store');
Route::put('custom-fields-products/{customFieldsProduct}', [CustomFieldsProductController::class, 'update'])
    ->name('customFieldsProduct.update');
Route::delete('custom-fields-products/{customFieldsProduct}', [CustomFieldsProductController::class, 'delete'])
    ->name('customFieldsProduct.delete');
Route::post('custom-fields-products/bulk-create', [CustomFieldsProductController::class, 'bulkStore'])
    ->name('customFieldsProduct.store.bulk');
Route::post('custom-fields-products/bulk-update', [CustomFieldsProductController::class, 'bulkUpdate'])
    ->name('customFieldsProduct.update.bulk');
Route::get('custom-fields-options-langs', [CustomFieldsOptionsLangController::class, 'index'])
    ->name('custom-fields-options-langs.index');
Route::get('custom-fields-options-langs/{customFieldsOptionsLang}', [CustomFieldsOptionsLangController::class, 'show'])
    ->name('customFieldsOptionsLang.show');
Route::post('custom-fields-options-langs', [CustomFieldsOptionsLangController::class, 'store'])
    ->name('customFieldsOptionsLang.store');
Route::put('custom-fields-options-langs/{customFieldsOptionsLang}', [CustomFieldsOptionsLangController::class, 'update'])
    ->name('customFieldsOptionsLang.update');
Route::delete('custom-fields-options-langs/{customFieldsOptionsLang}', [CustomFieldsOptionsLangController::class, 'delete'])
    ->name('customFieldsOptionsLang.delete');
Route::post('custom-fields-options-langs/bulk-create', [CustomFieldsOptionsLangController::class, 'bulkStore'])
    ->name('customFieldsOptionsLang.store.bulk');
Route::post('custom-fields-options-langs/bulk-update', [CustomFieldsOptionsLangController::class, 'bulkUpdate'])
    ->name('customFieldsOptionsLang.update.bulk');
Route::get('custom-fields-options', [CustomFieldsOptionsController::class, 'index'])
    ->name('custom-fields-options.index');
Route::get('custom-fields-options/{customFieldsOptions}', [CustomFieldsOptionsController::class, 'show'])
    ->name('customFieldsOptions.show');
Route::post('custom-fields-options', [CustomFieldsOptionsController::class, 'store'])
    ->name('customFieldsOptions.store');
Route::put('custom-fields-options/{customFieldsOptions}', [CustomFieldsOptionsController::class, 'update'])
    ->name('customFieldsOptions.update');
Route::delete('custom-fields-options/{customFieldsOptions}', [CustomFieldsOptionsController::class, 'delete'])
    ->name('customFieldsOptions.delete');
Route::post('custom-fields-options/bulk-create', [CustomFieldsOptionsController::class, 'bulkStore'])
    ->name('customFieldsOptions.store.bulk');
Route::post('custom-fields-options/bulk-update', [CustomFieldsOptionsController::class, 'bulkUpdate'])
    ->name('customFieldsOptions.update.bulk');
Route::get('custom-fields-categories', [CustomFieldsCategoryController::class, 'index'])
    ->name('custom-fields-categories.index');
Route::get('custom-fields-categories/{customFieldsCategory}', [CustomFieldsCategoryController::class, 'show'])
    ->name('customFieldsCategory.show');
Route::post('custom-fields-categories', [CustomFieldsCategoryController::class, 'store'])
    ->name('customFieldsCategory.store');
Route::put('custom-fields-categories/{customFieldsCategory}', [CustomFieldsCategoryController::class, 'update'])
    ->name('customFieldsCategory.update');
Route::delete('custom-fields-categories/{customFieldsCategory}', [CustomFieldsCategoryController::class, 'delete'])
    ->name('customFieldsCategory.delete');
Route::post('custom-fields-categories/bulk-create', [CustomFieldsCategoryController::class, 'bulkStore'])
    ->name('customFieldsCategory.store.bulk');
Route::post('custom-fields-categories/bulk-update', [CustomFieldsCategoryController::class, 'bulkUpdate'])
    ->name('customFieldsCategory.update.bulk');
Route::get('custom-fields', [CustomFieldsController::class, 'index'])
    ->name('custom-fields.index');
Route::get('custom-fields/{customFields}', [CustomFieldsController::class, 'show'])
    ->name('customFields.show');
Route::post('custom-fields', [CustomFieldsController::class, 'store'])
    ->name('customFields.store');
Route::put('custom-fields/{customFields}', [CustomFieldsController::class, 'update'])
    ->name('customFields.update');
Route::delete('custom-fields/{customFields}', [CustomFieldsController::class, 'delete'])
    ->name('customFields.delete');
Route::post('custom-fields/bulk-create', [CustomFieldsController::class, 'bulkStore'])
    ->name('customFields.store.bulk');
Route::post('custom-fields/bulk-update', [CustomFieldsController::class, 'bulkUpdate'])
    ->name('customFields.update.bulk');
Route::get('currencies', [CurrenciesController::class, 'index'])
    ->name('currencies.index');
Route::get('currencies/{currencies}', [CurrenciesController::class, 'show'])
    ->name('currencies.show');
Route::post('currencies', [CurrenciesController::class, 'store'])
    ->name('currencies.store');
Route::put('currencies/{currencies}', [CurrenciesController::class, 'update'])
    ->name('currencies.update');
Route::delete('currencies/{currencies}', [CurrenciesController::class, 'delete'])
    ->name('currencies.delete');
Route::post('currencies/bulk-create', [CurrenciesController::class, 'bulkStore'])
    ->name('currencies.store.bulk');
Route::post('currencies/bulk-update', [CurrenciesController::class, 'bulkUpdate'])
    ->name('currencies.update.bulk');
Route::get('coupon-products', [CouponProductsController::class, 'index'])
    ->name('coupon-products.index');
Route::get('coupon-products/{couponProducts}', [CouponProductsController::class, 'show'])
    ->name('couponProducts.show');
Route::post('coupon-products', [CouponProductsController::class, 'store'])
    ->name('couponProducts.store');
Route::put('coupon-products/{couponProducts}', [CouponProductsController::class, 'update'])
    ->name('couponProducts.update');
Route::delete('coupon-products/{couponProducts}', [CouponProductsController::class, 'delete'])
    ->name('couponProducts.delete');
Route::post('coupon-products/bulk-create', [CouponProductsController::class, 'bulkStore'])
    ->name('couponProducts.store.bulk');
Route::post('coupon-products/bulk-update', [CouponProductsController::class, 'bulkUpdate'])
    ->name('couponProducts.update.bulk');
Route::get('coupons-useds', [CouponsUsedController::class, 'index'])
    ->name('coupons-useds.index');
Route::get('coupons-useds/{couponsUsed}', [CouponsUsedController::class, 'show'])
    ->name('couponsUsed.show');
Route::post('coupons-useds', [CouponsUsedController::class, 'store'])
    ->name('couponsUsed.store');
Route::put('coupons-useds/{couponsUsed}', [CouponsUsedController::class, 'update'])
    ->name('couponsUsed.update');
Route::delete('coupons-useds/{couponsUsed}', [CouponsUsedController::class, 'delete'])
    ->name('couponsUsed.delete');
Route::post('coupons-useds/bulk-create', [CouponsUsedController::class, 'bulkStore'])
    ->name('couponsUsed.store.bulk');
Route::post('coupons-useds/bulk-update', [CouponsUsedController::class, 'bulkUpdate'])
    ->name('couponsUsed.update.bulk');
Route::get('coupons', [CouponsController::class, 'index'])
    ->name('coupons.index');
Route::get('coupons/{coupons}', [CouponsController::class, 'show'])
    ->name('coupons.show');
Route::post('coupons', [CouponsController::class, 'store'])
    ->name('coupons.store');
Route::put('coupons/{coupons}', [CouponsController::class, 'update'])
    ->name('coupons.update');
Route::delete('coupons/{coupons}', [CouponsController::class, 'delete'])
    ->name('coupons.delete');
Route::post('coupons/bulk-create', [CouponsController::class, 'bulkStore'])
    ->name('coupons.store.bulk');
Route::post('coupons/bulk-update', [CouponsController::class, 'bulkUpdate'])
    ->name('coupons.update.bulk');
Route::get('conversation-messages', [ConversationMessagesController::class, 'index'])
    ->name('conversation-messages.index');
Route::get('conversation-messages/{conversationMessages}', [ConversationMessagesController::class, 'show'])
    ->name('conversationMessages.show');
Route::post('conversation-messages', [ConversationMessagesController::class, 'store'])
    ->name('conversationMessages.store');
Route::put('conversation-messages/{conversationMessages}', [ConversationMessagesController::class, 'update'])
    ->name('conversationMessages.update');
Route::delete('conversation-messages/{conversationMessages}', [ConversationMessagesController::class, 'delete'])
    ->name('conversationMessages.delete');
Route::post('conversation-messages/bulk-create', [ConversationMessagesController::class, 'bulkStore'])
    ->name('conversationMessages.store.bulk');
Route::post('conversation-messages/bulk-update', [ConversationMessagesController::class, 'bulkUpdate'])
    ->name('conversationMessages.update.bulk');
Route::get('conversations', [ConversationsController::class, 'index'])
    ->name('conversations.index');
Route::get('conversations/{conversations}', [ConversationsController::class, 'show'])
    ->name('conversations.show');
Route::post('conversations', [ConversationsController::class, 'store'])
    ->name('conversations.store');
Route::put('conversations/{conversations}', [ConversationsController::class, 'update'])
    ->name('conversations.update');
Route::delete('conversations/{conversations}', [ConversationsController::class, 'delete'])
    ->name('conversations.delete');
Route::post('conversations/bulk-create', [ConversationsController::class, 'bulkStore'])
    ->name('conversations.store.bulk');
Route::post('conversations/bulk-update', [ConversationsController::class, 'bulkUpdate'])
    ->name('conversations.update.bulk');
Route::get('contacts', [ContactsController::class, 'index'])
    ->name('contacts.index');
Route::get('contacts/{contacts}', [ContactsController::class, 'show'])
    ->name('contacts.show');
Route::post('contacts', [ContactsController::class, 'store'])
    ->name('contacts.store');
Route::put('contacts/{contacts}', [ContactsController::class, 'update'])
    ->name('contacts.update');
Route::delete('contacts/{contacts}', [ContactsController::class, 'delete'])
    ->name('contacts.delete');
Route::post('contacts/bulk-create', [ContactsController::class, 'bulkStore'])
    ->name('contacts.store.bulk');
Route::post('contacts/bulk-update', [ContactsController::class, 'bulkUpdate'])
    ->name('contacts.update.bulk');
Route::get('comments', [CommentsController::class, 'index'])
    ->name('comments.index');
Route::get('comments/{comments}', [CommentsController::class, 'show'])
    ->name('comments.show');
Route::post('comments', [CommentsController::class, 'store'])
    ->name('comments.store');
Route::put('comments/{comments}', [CommentsController::class, 'update'])
    ->name('comments.update');
Route::delete('comments/{comments}', [CommentsController::class, 'delete'])
    ->name('comments.delete');
Route::post('comments/bulk-create', [CommentsController::class, 'bulkStore'])
    ->name('comments.store.bulk');
Route::post('comments/bulk-update', [CommentsController::class, 'bulkUpdate'])
    ->name('comments.update.bulk');
Route::get('ci-sessions', [CiSessionsController::class, 'index'])
    ->name('ci-sessions.index');
Route::get('ci-sessions/{ciSessions}', [CiSessionsController::class, 'show'])
    ->name('ciSessions.show');
Route::post('ci-sessions', [CiSessionsController::class, 'store'])
    ->name('ciSessions.store');
Route::put('ci-sessions/{ciSessions}', [CiSessionsController::class, 'update'])
    ->name('ciSessions.update');
Route::delete('ci-sessions/{ciSessions}', [CiSessionsController::class, 'delete'])
    ->name('ciSessions.delete');
Route::post('ci-sessions/bulk-create', [CiSessionsController::class, 'bulkStore'])
    ->name('ciSessions.store.bulk');
Route::post('ci-sessions/bulk-update', [CiSessionsController::class, 'bulkUpdate'])
    ->name('ciSessions.update.bulk');
Route::get('categories-langs', [CategoriesLangController::class, 'index'])
    ->name('categories-langs.index');
Route::get('categories-langs/{categoriesLang}', [CategoriesLangController::class, 'show'])
    ->name('categoriesLang.show');
Route::post('categories-langs', [CategoriesLangController::class, 'store'])
    ->name('categoriesLang.store');
Route::put('categories-langs/{categoriesLang}', [CategoriesLangController::class, 'update'])
    ->name('categoriesLang.update');
Route::delete('categories-langs/{categoriesLang}', [CategoriesLangController::class, 'delete'])
    ->name('categoriesLang.delete');
Route::post('categories-langs/bulk-create', [CategoriesLangController::class, 'bulkStore'])
    ->name('categoriesLang.store.bulk');
Route::post('categories-langs/bulk-update', [CategoriesLangController::class, 'bulkUpdate'])
    ->name('categoriesLang.update.bulk');
Route::get('categories', [CategoriesController::class, 'index'])
    ->name('categories.index');
Route::get('categories/{categories}', [CategoriesController::class, 'show'])
    ->name('categories.show');
Route::post('categories', [CategoriesController::class, 'store'])
    ->name('categories.store');
Route::put('categories/{categories}', [CategoriesController::class, 'update'])
    ->name('categories.update');
Route::delete('categories/{categories}', [CategoriesController::class, 'delete'])
    ->name('categories.delete');
Route::post('categories/bulk-create', [CategoriesController::class, 'bulkStore'])
    ->name('categories.store.bulk');
Route::post('categories/bulk-update', [CategoriesController::class, 'bulkUpdate'])
    ->name('categories.update.bulk');
Route::get('blog-tags', [BlogTagsController::class, 'index'])
    ->name('blog-tags.index');
Route::get('blog-tags/{blogTags}', [BlogTagsController::class, 'show'])
    ->name('blogTags.show');
Route::post('blog-tags', [BlogTagsController::class, 'store'])
    ->name('blogTags.store');
Route::put('blog-tags/{blogTags}', [BlogTagsController::class, 'update'])
    ->name('blogTags.update');
Route::delete('blog-tags/{blogTags}', [BlogTagsController::class, 'delete'])
    ->name('blogTags.delete');
Route::post('blog-tags/bulk-create', [BlogTagsController::class, 'bulkStore'])
    ->name('blogTags.store.bulk');
Route::post('blog-tags/bulk-update', [BlogTagsController::class, 'bulkUpdate'])
    ->name('blogTags.update.bulk');
Route::get('blog-posts', [BlogPostsController::class, 'index'])
    ->name('blog-posts.index');
Route::get('blog-posts/{blogPosts}', [BlogPostsController::class, 'show'])
    ->name('blogPosts.show');
Route::post('blog-posts', [BlogPostsController::class, 'store'])
    ->name('blogPosts.store');
Route::put('blog-posts/{blogPosts}', [BlogPostsController::class, 'update'])
    ->name('blogPosts.update');
Route::delete('blog-posts/{blogPosts}', [BlogPostsController::class, 'delete'])
    ->name('blogPosts.delete');
Route::post('blog-posts/bulk-create', [BlogPostsController::class, 'bulkStore'])
    ->name('blogPosts.store.bulk');
Route::post('blog-posts/bulk-update', [BlogPostsController::class, 'bulkUpdate'])
    ->name('blogPosts.update.bulk');
Route::get('blog-images', [BlogImagesController::class, 'index'])
    ->name('blog-images.index');
Route::get('blog-images/{blogImages}', [BlogImagesController::class, 'show'])
    ->name('blogImages.show');
Route::post('blog-images', [BlogImagesController::class, 'store'])
    ->name('blogImages.store');
Route::put('blog-images/{blogImages}', [BlogImagesController::class, 'update'])
    ->name('blogImages.update');
Route::delete('blog-images/{blogImages}', [BlogImagesController::class, 'delete'])
    ->name('blogImages.delete');
Route::post('blog-images/bulk-create', [BlogImagesController::class, 'bulkStore'])
    ->name('blogImages.store.bulk');
Route::post('blog-images/bulk-update', [BlogImagesController::class, 'bulkUpdate'])
    ->name('blogImages.update.bulk');
Route::get('blog-comments', [BlogCommentsController::class, 'index'])
    ->name('blog-comments.index');
Route::get('blog-comments/{blogComments}', [BlogCommentsController::class, 'show'])
    ->name('blogComments.show');
Route::post('blog-comments', [BlogCommentsController::class, 'store'])
    ->name('blogComments.store');
Route::put('blog-comments/{blogComments}', [BlogCommentsController::class, 'update'])
    ->name('blogComments.update');
Route::delete('blog-comments/{blogComments}', [BlogCommentsController::class, 'delete'])
    ->name('blogComments.delete');
Route::post('blog-comments/bulk-create', [BlogCommentsController::class, 'bulkStore'])
    ->name('blogComments.store.bulk');
Route::post('blog-comments/bulk-update', [BlogCommentsController::class, 'bulkUpdate'])
    ->name('blogComments.update.bulk');
Route::get('blog-categories', [BlogCategoriesController::class, 'index'])
    ->name('blog-categories.index');
Route::get('blog-categories/{blogCategories}', [BlogCategoriesController::class, 'show'])
    ->name('blogCategories.show');
Route::post('blog-categories', [BlogCategoriesController::class, 'store'])
    ->name('blogCategories.store');
Route::put('blog-categories/{blogCategories}', [BlogCategoriesController::class, 'update'])
    ->name('blogCategories.update');
Route::delete('blog-categories/{blogCategories}', [BlogCategoriesController::class, 'delete'])
    ->name('blogCategories.delete');
Route::post('blog-categories/bulk-create', [BlogCategoriesController::class, 'bulkStore'])
    ->name('blogCategories.store.bulk');
Route::post('blog-categories/bulk-update', [BlogCategoriesController::class, 'bulkUpdate'])
    ->name('blogCategories.update.bulk');
Route::get('bank-transfers', [BankTransfersController::class, 'index'])
    ->name('bank-transfers.index');
Route::get('bank-transfers/{bankTransfers}', [BankTransfersController::class, 'show'])
    ->name('bankTransfers.show');
Route::post('bank-transfers', [BankTransfersController::class, 'store'])
    ->name('bankTransfers.store');
Route::put('bank-transfers/{bankTransfers}', [BankTransfersController::class, 'update'])
    ->name('bankTransfers.update');
Route::delete('bank-transfers/{bankTransfers}', [BankTransfersController::class, 'delete'])
    ->name('bankTransfers.delete');
Route::post('bank-transfers/bulk-create', [BankTransfersController::class, 'bulkStore'])
    ->name('bankTransfers.store.bulk');
Route::post('bank-transfers/bulk-update', [BankTransfersController::class, 'bulkUpdate'])
    ->name('bankTransfers.update.bulk');
Route::get('ad-spaces', [AdSpacesController::class, 'index'])
    ->name('ad-spaces.index');
Route::get('ad-spaces/{adSpaces}', [AdSpacesController::class, 'show'])
    ->name('adSpaces.show');
Route::post('ad-spaces', [AdSpacesController::class, 'store'])
    ->name('adSpaces.store');
Route::put('ad-spaces/{adSpaces}', [AdSpacesController::class, 'update'])
    ->name('adSpaces.update');
Route::delete('ad-spaces/{adSpaces}', [AdSpacesController::class, 'delete'])
    ->name('adSpaces.delete');
Route::post('ad-spaces/bulk-create', [AdSpacesController::class, 'bulkStore'])
    ->name('adSpaces.store.bulk');
Route::post('ad-spaces/bulk-update', [AdSpacesController::class, 'bulkUpdate'])
    ->name('adSpaces.update.bulk');
Route::get('abuse-reports', [AbuseReportsController::class, 'index'])
    ->name('abuse-reports.index');
Route::get('abuse-reports/{abuseReports}', [AbuseReportsController::class, 'show'])
    ->name('abuseReports.show');
Route::post('abuse-reports', [AbuseReportsController::class, 'store'])
    ->name('abuseReports.store');
Route::put('abuse-reports/{abuseReports}', [AbuseReportsController::class, 'update'])
    ->name('abuseReports.update');
Route::delete('abuse-reports/{abuseReports}', [AbuseReportsController::class, 'delete'])
    ->name('abuseReports.delete');
Route::post('abuse-reports/bulk-create', [AbuseReportsController::class, 'bulkStore'])
    ->name('abuseReports.store.bulk');
Route::post('abuse-reports/bulk-update', [AbuseReportsController::class, 'bulkUpdate'])
    ->name('abuseReports.update.bulk');
Route::get('users', [UserController::class, 'index'])
    ->name('users.index');
Route::get('users/{user}', [UserController::class, 'show'])
    ->name('user.show');
Route::post('users', [UserController::class, 'store'])
    ->name('user.store');
Route::put('users/{user}', [UserController::class, 'update'])
    ->name('user.update');
Route::delete('users/{user}', [UserController::class, 'delete'])
    ->name('user.delete');
Route::post('users/bulk-create', [UserController::class, 'bulkStore'])
    ->name('user.store.bulk');
Route::post('users/bulk-update', [UserController::class, 'bulkUpdate'])
    ->name('user.update.bulk');

Route::post('register', [AuthController::class, 'register'])
    ->name('register');
Route::post('login', [AuthController::class, 'login'])
    ->name('login');
Route::post('logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth:sanctum');
Route::put('change-password', [AuthController::class, 'changePassword'])
    ->name('change.password')
    ->middleware(['auth:sanctum', 'validate.user']);
Route::post('forgot-password', [AuthController::class, 'forgotPassword'])
    ->name('forgot.password');
Route::post('validate-otp', [AuthController::class, 'validateResetPasswordOtp'])
    ->name('reset.password.validate.otp');
Route::put('reset-password', [AuthController::class, 'resetPassword'])
    ->name('reset.password');
