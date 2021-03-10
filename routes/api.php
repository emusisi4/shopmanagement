<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResources(['user' => 'API\UserController']);
Route::apiResources(['vuecomponents' => 'API\VuecomponentsController']);
Route::apiResources(['formcomponents' => 'API\FormcomponentsController']);
Route::apiResources(['mainmenucomponents' => 'API\MainmenucomponentController']);
Route::apiResources(['branches' => 'API\BranchesController']);
Route::apiResources(['submenus' => 'API\SubmenusController']);
Route::apiResources(['expenses' => 'API\ExpensesController']);
Route::apiResources(['student' => 'API\StudentsController']);
Route::apiResources(['payouts' => 'API\BranchpayoutsController']);
Route::apiResources(['makeexpense' => 'API\MadeexpensesConroller']);
Route::apiResources(['makeexpenseofficeuser' => 'API\MadeexpensesofficeConroller']);
Route::apiResources(['shopbalancingrecord' => 'API\BrachRecordBranchbalacingController']);


Route::apiResources(['getexpensereportdetails' => 'API\ExpensesReportbybranchController']);
Route::apiResources(['gamefixtures' => 'API\GamefixturesController']);
Route::apiResources(['getincomereport' => 'API\Incomereport']);
Route::apiResources(['getincomereportforcredits' => 'API\Incomereportscredits']);
Route::apiResources(['getexpensesbycategoryreport' => 'API\ExpensesbycategoryReport']);

///

Route::apiResources(['roleandcomponentto' => 'API\RoleandformcomponentController']);
Route::apiResources(['roletobalance' => 'API\RoleinactionController']);

Route::apiResources(['roleaddformcomponent' => 'API\RoletoaddcomponentaccessController']);
/// subtotals  BranchbalacingController
Route::get('dailypayoutstotalbranch', 'APIController@Branchtotalsd');
//////
Route::apiResources(['branchtobalance' => 'API\BranchbalacingController']);
Route::apiResources(['confirmordersales' => 'API\ConfirmcustomerorderfromcartController']);
Route::apiResources(['recordtoincomeviewreport' => 'API\Branchtoviewreportcontroller']);

Route::apiResources(['expensesreportbybranch' => 'API\ExpensereportstoviewController']);


Route::apiResources(['brachtocollectorcredit' => 'API\BranchtocollectfromController']);
//////
Route::apiResources(['makecashcollection' => 'API\CashCollectionController']);
Route::apiResources(['makecashout' => 'API\CashoutController']);


Route::apiResources(['finalcashout' => 'API\CashCreditController']);



Route::get('profile', 'API\UserController@profile');
Route::get('getMainmenues', 'APIController@getMainmenues');
Route::get('getSubmenues', 'APIController@getSubmenues');
Route::get('getExpensecategories', 'APIController@getexpensecategoriesdy');
Route::get('getExpensetypes', 'APIController@getexpensetypes');
Route::get('getBranches', 'APIController@getBranches');
/// 
Route::get('findgeneralExpense', 'API\ExpensesController@search');
///
Route::get('getmainunits', 'APIController@getmainunits');
Route::get('getminorunits', 'APIController@getminorunits');
Route::get('getbrands', 'APIController@getbrands');
Route::get('companiesd', 'APIController@getcompaniesd');
Route::get('gettheorders', 'APIController@gettheorders');
Route::get('getsuppliers', 'APIController@getsuppliers');
Route::get('getunits', 'APIController@getunits');
Route::get('getcategories', 'APIController@getcategories');
Route::get('getproducts', 'APIController@getproducts');

Route::get('getWalletlist', 'APIController@getWallets');
Route::get('getcollections', 'APIController@getWallets');
Route::get('getformfeatures', 'APIController@getformfeatures');
Route::get('getmanmaderoles', 'APIController@getrolesmanmade');
Route::get('getcomponentslistmissing', 'APIController@getmissicomps');
Route::get('getlistofcomponents', 'APIController@getcomponentslist');
Route::get('getrolenameinaction', 'APIController@getrolename');
Route::get('getmainmenus', 'APIController@getmissicomps');


Route::get('getExpenseslist', 'APIController@getlistofexpenses');
Route::get('getExpensestomake', 'APIController@getExpensestomake');
Route::get('getsystemroles', 'APIController@getsystemroles');
Route::get('getMakeexpense', 'APIController@getaddnewexpense');
//////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('getAddnewbalancingrecord', 'APIController@getaddnewbalancingrecord');
Route::get('getviewbalancingrecord', 'APIController@getviewbalancingrecord');
Route::get('geteditbalancingrecord', 'APIController@geteditbalancingrecord');
Route::get('getdeletebalancingrecord', 'APIController@getdeletebalancingrecord');

// ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('getAddnewproduct', 'APIController@getaddnewproduct');
Route::get('getviewproduct', 'APIController@getviewproduct');
Route::get('geteditproduct', 'APIController@geteditproduct');
Route::get('getdeleteproduct', 'APIController@getdeleteproduct');
/////////////////

Route::get('getAddnewsupplier', 'APIController@getAddnewsupplier');
Route::get('getviewsupplier', 'APIController@getviewsupplier');

Route::get('geteditsupplier', 'APIController@geteditsupplier');
Route::get('getdeletesupplier', 'APIController@getdeletesupplier');
/////////////////////////////////////////////////////////////////////////////

Route::get('getAddnewcustomer', 'APIController@getAddnewcustomer');
Route::get('getviewcustomer', 'APIController@getviewcustomer');
Route::get('geteditcustomer', 'APIController@geteditcustomer');
Route::get('getdeletecustomer', 'APIController@getdeletecustomer');

////
Route::get('getAddnewmainmenu', 'APIController@getAddnewmainmenu');
//Route::get('getviewproduct', 'APIController@getviewproduct');
Route::get('geteditmainmenu', 'APIController@geteditmainmenu');
Route::get('getdeletemainmenu', 'APIController@getdeletemainmenu');

///
Route::get('getAddnewexpensecategory', 'APIController@getAddnewexpensecategory');
Route::get('getviewexpensecategory', 'APIController@getviewexpensecategory');
Route::get('geteditexpensecategory', 'APIController@geteditexpensecategory');
Route::get('getdeleteexpensecategory', 'APIController@getdeleteexpensecategory');




Route::get('getAddgeneralexpense', 'APIController@getAddgeneralexpense');
Route::get('getviewgeneralexpense', 'APIController@getviewgeneralexpense');
Route::get('geteditgeneralexpense', 'APIController@geteditgeneralexpense');
Route::get('getdeletegeneralexpense', 'APIController@getdeletegeneralexpense');

/// expense types access

Route::get('getAddnewexpensetype', 'APIController@getAddnewexpensetype');
Route::get('getviewexpensetype', 'APIController@getviewexpensetype');
Route::get('geteditexpensetype', 'APIController@geteditexpensetype');
Route::get('getdeleteexpensetype', 'APIController@getdeleteexpensetype');




Route::get('getAddnewofficeexpense', 'APIController@getAddnewofficeexpense');
Route::get('getviewofficeexpense', 'APIController@getviewofficeexpense');
Route::get('geteditofficeexpense', 'APIController@geteditofficeexpense');
Route::get('getdeleteofficeexpense', 'APIController@getdeleteofficeexpense');

Route::get('getAddnewrole', 'APIController@getAddnewrole');
Route::get('getviewrole', 'APIController@getviewrole');
Route::get('geteditrole', 'APIController@geteditrole');
Route::get('getdeleterole', 'APIController@getdeleterole');



/// product category
Route::get('getAddnewproductcategory', 'APIController@getAddnewproductcategory');
Route::get('getviewproductcategory', 'APIController@getviewproductcategory');
Route::get('geteditproductcategory', 'APIController@geteditproductcategory');
Route::get('getdeleteproductcategory', 'APIController@getdeleteproductcategory');

/// product unit of measure
Route::get('getAddnewproductunitmeasure', 'APIController@getAddnewproductunitmeasure');
Route::get('getviewproductunitmeasure', 'APIController@getviewproductunitmeasure');
Route::get('geteditproductunitmeasure', 'APIController@geteditproductunitmeasure');
Route::get('getdeleteproductunitmeasure', 'APIController@getdeleteproductunitmeasure');


/// product brand
Route::get('getAddnewproductbrand', 'APIController@getAddnewproductbrand');
Route::get('getviewproductbrand', 'APIController@getviewproductbrand');
Route::get('geteditproductbrand', 'APIController@geteditproductbrand');
Route::get('getdeleteproductbrand', 'APIController@getdeleteproductbrand');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('getAddnewshopcollection', 'APIController@getAddnewshopcollection');
Route::get('getviewshopcollectionrecord', 'APIController@getviewshopcollectionrecord');
Route::get('geteditshopcollection', 'APIController@geteditshopcollection');
Route::get('getdeleteshopcollection', 'APIController@getdeleteshopcollection');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('getdailytotalexpenses', 'APIController@Branchdailyexpenses');
//Route::get('branchtobalance', 'APIController@getLatestopenningbalance');
Route::get('getbranchopenningb', 'APIController@Bopenningbalance');

Route::get('getbranchnamebalancing', 'APIController@Branchnametobalancefunction'); 
Route::get('getbranchnametocollectfrom', 'APIController@Branchnametocollectfrom'); 
Route::get('getthedayscashin', 'APIController@Branchtobalancedayscashin'); 
Route::get('getrantetotalcollection', 'APIController@Rangecollection');



Route::get('gettotalexpensesintherange', 'APIController@Rangeexpensesreport');
Route::get('getrantetotalcredits', 'APIController@Rangecredits');
Route::get('getrantetotalexpenses', 'APIController@Rangeexpenses');
Route::get('reportgetrantetotalexpenses', 'APIController@Expensesrangeonreport');
///    
Route::get('getdaycashinbranch', 'APIController@Branchtobalancedayscashin'); 
Route::get('getdaycashoutbranch', 'APIController@Branchtobalancedayscashout'); 
Route::get('getdayexpensesbranch', 'APIController@Branchtobalancedayexpenses'); 
Route::get('getdaypayoutbranch', 'APIController@Branchtobalancedaypayout'); 
Route::get('branchalreadybalanced', 'APIController@getIfthebranchisalreadybalanced');
Route::get('pendingcashin', 'APIController@checkforapendingtransfercashin');
//// component access
Route::get('userscomponentaccess', 'APIController@acccessuserscomponent');
Route::get('shopbalancingcomponentaccess', 'APIController@acccessshopbalancingcomponent');
Route::get('shoppayoutcomponentaccess', 'APIController@acccessshoppayoutcomponent');

Route::get('shopcasouttransactionscomponentaccess', 'APIController@acccessshopcasouttransactionscomponent');

Route::get('shopcasintransactionscomponentaccess', 'APIController@acccessshopcashintransactionscomponent');
Route::get('shopmakeexpensescomponentaccess', 'APIController@acccessbranchexpensesbranchcomponent');




Route::get('branchescomponentaccess', 'APIController@acccessbranchescomponent');
Route::get('companyexpensescomponentaccess', 'APIController@acccesscompanyexpensescomponent');
Route::get('expensereportbybranchcomponentaccess', 'APIController@acccessexpensesreportbybranchcomponent');
Route::get('expensereportbydatecomponentaccess', 'APIController@acccessexpensesreportbydatecomponent');
Route::get('expensesreportbywalletcomponentaccess', 'APIController@acccessexpensesreportbywalletcomponent');
Route::get('incomereportcomponentaccess', 'APIController@acccessincomereportcomponent');
Route::get('accessmainmenucomponentaccess', 'APIController@acccessmainmenucomponent');
Route::get('officemakeexpensecomponentaccess', 'APIController@acccessofficemakeexpensecomponent');
Route::get('admincashcollectioncomponentaccess', 'APIController@acccessadmincashcollectioncomponent');
Route::get('admincashissuecomponentaccess', 'APIController@acccessadmincashissuecomponent');
Route::get('submenuscomponentaccess', 'APIController@acccesssubmenucomponent');
Route::get('systemcomponentscomponentaccess', 'APIController@systemvuecomponentscomponent');

Route::get('mainmenuaccesscomponentaccess', 'APIController@mainmenucomponentaccesscomponent');



Route::get('subnmenuaccesscomponentaccess', 'APIController@submenucomponentaccessaccesscomponent');

Route::get('adminmakepayoutcomponentaccess', 'APIController@branchpayoutadminaccesscomponent');

///////////////////////////////////////////////
Route::get('contactscomponentaccess', 'APIController@acccesscontactscomponentaccesscomponent');
Route::get('checkifarecordexistastovieworderdetails', 'APIController@existsordertoview');




Route::get('companyproductscomponentaccess', 'APIController@acccesscompanyproductscomponentaccesscomponent');
Route::get('settingscomponentaccess', 'APIController@acccesssettingscomponentaccesscomponent');
Route::get('productbrandscomponentaccess', 'APIController@acccessproductbrandscomponentaccesscomponent');
Route::get('productcategoriescomponentaccess', 'APIController@acccessproductcategoriescomponentaccesscomponent');
Route::get('customerscomponentaccess', 'APIController@acccesscustomerscomponentaccesscomponent');
Route::get('rolescomponentaccess', 'APIController@acccessrolescomponentaccesscomponent');
Route::get('productunitscomponentaccess', 'APIController@acccessproductunitofmeasurecomponentaccesscomponent');

Route::get('expensecategoriescomponentaccess', 'APIController@acccessexpensecategoriescomponentaccesscomponent');

Route::get('expensetypescomponentaccess', 'APIController@acccessexpensetypescomponentaccesscomponent');
Route::get('branchexpensescomponentaccess', 'APIController@acccessbranchexpensescomponentaccesscomponent');
Route::get('officeexpensescomponentaccess', 'APIController@acccessofficeexpensescomponentaccesscomponent');









/// access to vue components
Route::apiResources(['saveformcomponentaccess' => 'API\GiveaccesstoformcomponentController']);
Route::apiResources(['saveaccesstovuecomponent' => 'API\GiveaccesstovuecomponentController']);
Route::apiResources(['savemainmenuaccess' => 'API\GiveaccesstomainmenuController']);
Route::apiResources(['savesubmenuaccess' => 'API\GiveaccesstosubmenuController']);
////////////////////////////////////////////////////////////////////////////////////////////////////
/// Working on the balancing Records
Route::apiResources(['currentbalancingrecords' => 'API\CurrentShopbalancingContoller']);

Route::apiResources(['supplierdetails' => 'API\SuppliersController']);
Route::apiResources(['companyproducts' => 'API\CompanyproductsController']);
Route::apiResources(['productcategories' => 'API\ProductcategoriesController']);
Route::apiResources(['customerdetails' => 'API\CustomersController']);
Route::apiResources(['productbrands' => 'API\ProductbrandsController']);
Route::apiResources(['productunits' => 'API\ProductunitmeasuresController']);
Route::apiResources(['ordermakingdetails' => 'API\OrdermakingController']);

Route::apiResources(['selectedorderdetailstoview' => 'API\SelectedordertoviewController']);

Route::apiResources(['itemdelivery' => 'API\ItemdeliveryController']);
Route::apiResources(['expensetypesdata' => 'API\ExpensetypesController']);
//Route::apiResources(['expensetypesdata' => 'API\ExpensetypesController']);
Route::apiResources(['makesalepur' => 'API\ConfirmpositemsController']);
Route::apiResources(['purchasessummary' => 'API\ConfirmcustomerorderfromcartController']);
Route::apiResources(['saveordertoviedetails' => 'API\SaveordertoviewdetailsController']);
Route::apiResources(['userroles' => 'API\UserrolesController']);
Route::apiResources(['insertintoorders' => 'API\InserintoordersController']);

Route::apiResources(['inserintocart' => 'API\InserintocartController']);
Route::apiResources(['authorisedcomponents' => 'API\AuthorisedcomponentsController']);
Route::apiResources(['shopingcartdetails' => 'API\InserintocartController']);

Route::apiResources(['authorisedformcomponents' => 'API\AuthorisedformcomponentsController']);

Route::apiResources(['expensecategories' => 'API\ExpensecategoriesController']);




Route::apiResources(['authorisedmainmenus' => 'API\AuthorisedmainmenuController']);

Route::apiResources(['authorisedsubmenus' => 'API\AuthorisedsubmenuController']);










Route::apiResources(['branchcashdetails' => 'API\Branchshopcashdetails']);
Route::apiResources(['cashindetails' => 'API\CashCollectionController']);
Route::apiResources(['approvecashin' => 'API\ApproveCashinController']);
Route::apiResources(['shopcashoutdetails' => 'API\ShopcasoutdetailsController']);
Route::apiResources(['cashoutfromoffice' => 'API\CashCreditController']);
Route::apiResources(['approvecashout' => 'API\ApproveCashoutController']);

////////////////////////////////////////////////////////
Route::get('gettodayscashout', 'APIController@Branchtodayscashout'); 
Route::get('gettodayexpenses', 'APIController@Branchtodaysexpenses'); 
Route::get('gettodayspayout', 'APIController@Branchtodayspayout'); 
Route::get('gettodaycashin', 'APIController@Branchtodayscashin'); 
Route::get('getbranchopenningbalancefortoday', 'APIController@Bopenningbalancetoday');
Route::get('getcurrencydetails', 'APIController@Currencysymbol'); 
Route::get('getcattotal', 'APIController@Carttotal');

Route::get('getuserbalance', 'APIController@getuserbalance');
Route::get('getordertotal', 'APIController@Ordertotal');
Route::post('checks', 'CheckController@store');
Route::get('getselectedordertotal', 'APIController@getselectedordertotal');
//GetShopbalancingrecords
/// End of balancing Records