<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\Auth\ValidateController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\ViewAllController;
use App\Http\Controllers\Home\OwnCreationController;
use App\Http\Controllers\Home\TranslationController;
use App\Http\Controllers\Home\FanficController;
use App\Http\Controllers\Home\HomeGenreController;
use App\Http\Controllers\Home\ReviewController;
use App\Http\Controllers\Home\ProfileController;
use App\Http\Controllers\Home\BookmarkController;
use App\Http\Controllers\Author\AuthorController;
use App\Models\Order;


require __DIR__.'/auth.php';

//block statement for login and register
Route::post('/login/loginCheck', [ValidateController::class, 'loginCheck']);
Route::post('/login/signupCheck', [ValidateController::class, 'signupCheck']);
// Route::post('/signup', [ValidateController::class, 'signup']);
Route::get('/login', function(){
    if(Auth::check()){
        return redirect()->back()->with('error', 'You have already logged in!');
    }else{
        return redirect()->back()->with('error', 'Please Login!');
    }
});
Route::get('/register', function(){
    if(Auth::check()){
        return redirect()->back()->with('error', 'You have already registered!');
    }else{
        return redirect()->back()->with('error', 'Please Register!');
    }
});
//block statement for login and register

//FrontEnd Pages
Route::get('/', [HomeController::class, 'index'])->name('login');
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified']);

Route::get('/events', [HomeController::class, 'event']);
Route::get('/events-{id}', [HomeController::class, 'eventDetail']);
Route::get('/about', [HomeController::class, 'about']); //about page
Route::get('/gem', [HomeController::class, 'gem']); //gem page
Route::get('/contact', [HomeController::class, 'contact']); //contact page
//Send Mail
Route::get('/contact/sendmail', [HomeController::class, 'sendMail']);
//Send Mail

//without payment cannot read middleware
Route::get('/novel-{id}', [HomeController::class, 'book']);
// Route::get('/novel-{id}-chapters', [HomeController::class, 'chapters']);
Route::post('/novel/bookmark/', [BookmarkController::class, 'add']);
Route::post('/novel/bookmark/remove/{id}', [BookmarkController::class, 'remove']);
//review section
Route::post('/review/create/', [ReviewController::class, 'create']);
Route::post('/review/edit/', [ReviewController::class, 'edit']);
Route::post('/review/delete/', [ReviewController::class, 'delete']);


Route::get('/chapter-{id}/', [HomeController::class, 'chapter'])->middleware('paid');
//without payment cannot read middleware
//payment methods
Route::post('/book/chapter/purchase', [HomeController::class, 'payment']);
Route::post('/book/chapter/exchangeAllChapter/', [HomeController::class, 'paymentByNovel']);
//payment methods

//view all pages
Route::get('/popular_series', [ViewAllController::class, 'popularSeries']);
Route::get('/new_series', [ViewAllController::class, 'newSeries']);
Route::get('/latest_releases', [ViewAllController::class, 'latestSeries']);
//view all pages

//view category pages
//fanfic pages
Route::get('/fanfic', [FanficController::class, 'all']);
Route::get('/fanfic-popular', [FanficController::class, 'popular']);
Route::get('/fanfic-complete', [FanficController::class, 'complete']);
Route::get('/fanfic-newest', [FanficController::class, 'newest']);
Route::get('/fanfic-oldest', [FanficController::class, 'oldest']);
//fanfic pages

//own creation pages
Route::get('/own-creation', [OwnCreationController::class, 'all']);
Route::get('/own-creation-popular', [OwnCreationController::class, 'popular']);
Route::get('/own-creation-complete', [OwnCreationController::class, 'complete']);
Route::get('/own-creation-newest', [OwnCreationController::class, 'newest']);
Route::get('/own-creation-oldest', [OwnCreationController::class, 'oldest']);
//own creation pages

//translation pages
Route::get('/translation', [TranslationController::class, 'all']);
Route::get('/translation-popular', [TranslationController::class, 'popular']);
Route::get('/translation-complete', [TranslationController::class, 'complete']);
Route::get('/translation-newest', [TranslationController::class, 'newest']);
Route::get('/translation-oldest', [TranslationController::class, 'oldest']);
//translation pages

//genre pages
Route::get('/genre', [HomeGenreController::class, 'index']);
Route::get('/genre-{id}', [HomeGenreController::class,'detail']);
//genre pages
//view category pages


//user dashboard
Route::get('/profile', [ProfileController::class, 'profile'])->middleware(['auth', 'verified']);
Route::post('/profile/update_profile/{email}', [ProfileController::class, 'profileChange']);
Route::post('/profile/user_info/{email}', [ProfileController::class, 'infoChange']);
Route::post('/profile/change_password/{email}', [ProfileController::class, 'changePassword']);
//user dashboard

//search feature
Route::get('/search', [HomeController::class, 'search']);
//FrontEnd Pages

Route::group(['middleware' => ['auth', 'role:Author']], function () {
    Route::get('/author', [AuthorController::class, 'index']);

    //novel CRUD
    Route::get('/author/novels/', [AuthorController::class, 'novels']); //novel lists
    Route::get('/author/novels/create', [AuthorController::class, 'create']); //novel create form
    Route::post('/author/novels/create', [AuthorController::class, 'store']); //novel store function
    Route::get('/author/novels/edit/{id}', [AuthorController::class, 'edit']); //novel edit form
    Route::get('/author/novels/view/{id}', [AuthorController::class, 'view']); //novel view form
    Route::post('/author/novels/edit/{id}', [AuthorController::class, 'update']); //novel edit function
    Route::post('/author/novels/delete', [AuthorController::class, 'delete']); //novel delete function
    Route::post('/author/novels/status/{id}', [AuthorController::class, 'status']); //novel status change function
    Route::get('/author/novels/searchByTitle', [AuthorController::class, 'searchByTitle']); //search by title
    Route::get('/author/novels/searchByDate', [AuthorController::class, 'searchByDate']); //search by Date

    //chapter CRUD
    Route::get('/author/novels/{id}/chapters/create/', [AuthorController::class, 'chapterCreate']);
    Route::post('/author/novels/chapters/create/', [AuthorController::class, 'chapterStore']);
    Route::get('/author/novels/chapters/view/{id}', [AuthorController::class, 'chapterView']);
    Route::get('/author/novels/chapters/edit/{id}', [AuthorController::class, 'chapterEdit']);
    Route::post('/author/novels/chapters/edit/{id}', [AuthorController::class, 'chapterUpdate']);
    Route::post('/author/novels/chapters/delete/{book_id}', [AuthorController::class, 'chapterDelete']);
    Route::post('/author/novels/chapters/status/', [AuthorController::class, 'chapterStatus']);

    //order lists of author
    Route::get('/author/orders/', [AuthorController::class, 'orders']); //order list
    // Route::post('/author/orders/date', [AuthorController::class, 'filter']);
    Route::post('/author/orders/dateBetween', [AuthorController::class, 'filterDateBetween']);
    Route::post('/author/orders/titleDateBetween', [AuthorController::class, 'titleDateBetween']);
    // Route::post('/author/orders/novelMonthlyRecord', [AuthorController::class, 'novelMonthlyRecord']);
    Route::post('/author/orders/dateBetweenRecord', [AuthorController::class, 'filterDateBetweenRecord']);
    Route::post('/author/orders/titleDateBetweenRecord', [AuthorController::class, 'titleDateBetweenRecord']);
});

Route::group(['middleware' => ['auth', 'role:Super Admin']], function () {
    // User Management
    Route::get('/admin', [AdminController::class, 'index'])->name('admin'); //admin dashboard

    //user list by each role
    Route::get('/admin/superAdmins', [AdminController::class, 'superAdmins']); //super admin lists
    Route::get('/admin/authors', [AdminController::class, 'authors']); //author lists
    Route::get('/admin/users', [AdminController::class, 'users']); //user lists
    Route::get('/admin/pending-list', [AdminController::class, 'pending']); //pending lists
    // user list by each role

    //search by each role
    Route::get('/admin/superAdmins/search/', [AdminController::class, 'adminSearch']);
    Route::get('/admin/authors/search/', [AdminController::class, 'authorSearch']);
    Route::get('/admin/users/search/', [AdminController::class, 'userSearch']);
    Route::get('/admin/pending/search/', [AdminController::class, 'pendingSearch']);
    //search by each role

    //search by date in each role
    Route::get('/admin/superAdmins/search/date', [AdminController::class, 'adminSearchByDate']);
    Route::get('/admin/authors/search/date', [AdminController::class, 'authorSearchByDate']);
    Route::get('/admin/users/search/date', [AdminController::class, 'userSearchByDate']);
    Route::get('/admin/pending/search/date', [AdminController::class, 'pendingSearchByDate']);
    //search by date in each role

    Route::post('/admin/roleChange/{id}', [AdminController::class, 'roleChange']); //role change
    Route::post('/admin/percentChange/{id}', [AdminController::class, 'percentChange']); //author percent change
    Route::post('/admin/gem/{id}', [AdminController::class, 'gem']); //fill gem for user role
    Route::post('/admin/users/delete/', [AdminController::class, 'userDelete']); //user delete
    Route::get('/admin/gem_order/', [AdminController::class, 'gem_order']); //gem order lists
    Route::get('/admin/gems/searchByDate', [AdminController::class, 'gemOrderDateBetween']); // gem order filter
    // User Management

    //Home Banner CRUD
    Route::get('/admin/homebanner/', [HomeBannerController::class, 'index']); // banner lists
    Route::post('/admin/homebanner/create/', [HomeBannerController::class, 'create']); //create
    Route::post('/admin/homebanner/edit/', [HomeBannerController::class, 'edit']); //edit
    Route::post('/admin/homebanner/delete/', [HomeBannerController::class, 'delete']); //delete

    //Event CRUD
    Route::get('/admin/events/', [EventController::class, 'index']); //event lists
    Route::get('/admin/events/create', [EventController::class, 'create']); //event create page
    Route::post('/admin/events/create', [EventController::class, 'store']); //event create
    Route::get('/admin/events/edit/{id}', [EventController::class, 'edit']); //event edit page
    Route::post('/admin/events/edit/{id}', [EventController::class, 'update']); //event update
    Route::get('/admin/events/view/{id}', [EventController::class, 'view']); //event view
    Route::post('/admin/events/delete', [EventController::class, 'delete']); //delete event
    Route::get('/admin/events/searchByTitle', [EventController::class, 'searchByTitle']); //search by title
    Route::get('/admin/events/searchByDate', [EventController::class, 'searchByDate']); //search by title


    //Category CRUD
    Route::get('/admin/category', [CategoryController::class, 'index']); //category lists
    Route::post('/admin/category/create', [CategoryController::class, 'create']); //create category
    Route::post('/admin/category/edit', [CategoryController::class, 'edit']); //edit category
    Route::post('/admin/category/delete', [CategoryController::class, 'delete']); //delete category
    Route::get('/admin/category/searchByName', [CategoryController::class, 'searchByName']); //search by name
    Route::get('/admin/category/searchByDate', [CategoryController::class, 'searchByDate']); //search by date

    //Genre CRUD
    Route::get('/admin/genre', [GenreController::class, 'index']); //genre lists
    Route::post('/admin/genre/create', [GenreController::class, 'create']); //create genre
    Route::post('/admin/genre/edit', [GenreController::class, 'edit']); //edit genre
    Route::post('/admin/genre/delete', [GenreController::class, 'delete']); //delete genre
    Route::get('/admin/genre/searchByName', [GenreController::class, 'searchByName']); //search by name
    Route::get('/admin/genre/searchByDate', [GenreController::class, 'searchByDate']); //search by date

    //Book CRUD
    Route::get('/admin/book/', [BookController::class, 'index']); //book lists
    Route::get('/admin/book/create/', [BookController::class, 'create']); //create
    Route::post('/admin/book/create/', [BookController::class, 'store']); //store
    Route::get('/admin/book/view/{id}', [BookController::class, 'view']); //view
    Route::get('/admin/book/edit/{id}', [BookController::class, 'edit']); //update
    Route::post('/admin/book/edit/{id}', [BookController::class, 'update']); //update
    Route::post('/admin/book/delete/', [BookController::class, 'delete']); //delete
    Route::post('/admin/book/popular/{id}', [BookController::class, 'popular']); //popular switch
    Route::post('/admin/book/latest/{id}', [BookController::class, 'latest']); //latest switch
    Route::post('/admin/book/status/{id}', [BookController::class, 'status']); //status switch
    Route::post('/admin/book/new/{id}', [BookController::class, 'new']); //new switch
    Route::get('/admin/book/searchByTitle', [BookController::class, 'searchByTitle']); //search by title
    Route::get('/admin/book/searchByDate', [BookController::class, 'searchByDate']); //search by date
    Route::get('/admin/book/searchByAuthor/', [BookController::class, 'searchByAuthor']); //search by author

    //Chapter CRUD
    Route::get('/admin/chapter/view/{id}', [ChapterController::class, 'view']); //chapter view
    // Route::get('/admin/chapter/', [ChapterController::class, 'index']); // chapter lists
    Route::get('/admin/book/{id}/chapter/create', [ChapterController::class, 'create']); // create
    Route::post('/admin/chapter/create', [ChapterController::class, 'store']); // store
    Route::get('/admin/chapter/edit/{id}', [ChapterController::class, 'edit']); // edit
    Route::post('/admin/chapter/edit/{id}', [ChapterController::class, 'update']); // update
    Route::post('/admin/chapter/delete/{book_id}', [ChapterController::class, 'delete']); // delete
    Route::post('/admin/chapter/status/', [ChapterController::class, 'status']); //status switch (Free or Paid)

    //Order Lists
    Route::get('/admin/orders/', [OrderController::class, 'index']); //order lists
    //filters
    Route::get('/admin/orders/{id}', [OrderController::class, 'filterByAuthor']); //filter by author
    Route::post('/admin/orders/authorDateBetween/', [OrderController::class, 'authorDateBetween']); //author date between
    Route::post('/admin/orders/authorMonthly/', [OrderController::class, 'authorMonthly']); //author monthly
    Route::post('/admin/orders/authorYearly/', [OrderController::class, 'authorYearly']); //author yearly

    Route::post('/admin/orders/titleDateBetween/', [OrderController::class, 'titleDateBetween']); //title date between

    Route::post('/admin/orders/dateBetween/', [OrderController::class, 'dateBetween']); //date between filter
    Route::post('/admin/orders/monthly/', [OrderController::class, 'monthlySearch']); //monthly filter
    Route::post('/admin/orders/yearly/', [OrderController::class, 'yearlySearch']); //yearly filter
    // Route::get('/admin/orders/month/{month}', [OrderController::class, 'filterByDate']); //filter by date



    //reports
    // Route::get('/overall_orders', [OrderController::class, 'overallExport']); //order export by excel
    Route::get('/date_between_report', [OrderController::class, 'dateBetweenReport']);
    Route::get('/author_date_between_report', [OrderController::class, 'authorDateBetweenReport']);
    Route::get('/author_title_date_between_report', [OrderController::class, 'authorTitleDateBetweenReport']);
    // Route::get('/author_monthly_report', [OrderController::class, 'authorMonthlyReport']);
    // Route::get('/author_yearly_report', [OrderController::class, 'authorYearlyReport']);
    // Route::get('/monthly_report', [OrderController::class, 'monthlyReport']);
    // Route::get('/yearly_report', [OrderController::class, 'yearlyReport']);
});


Route::get('editOrder', [OrderController::class, 'editOrder']);

