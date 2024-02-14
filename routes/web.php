    <?php

    use App\Http\Controllers\PartenairesController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\ProjectController;
    use App\Http\Controllers\UserController;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */

    Route::get('/', function () {
        return view('welcome');
    });
    
    
    Route::get('/dashboard',[UserController::class,'index'])->name('users.index');
    Route::delete('/dashboard/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::delete('/dashboard', [UserController::class, 'index'])->name('dashboard');
    
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    
    // Route::get('/addproject', [ProjectController::class, 'create'])->name('add.create');
    // Route::get('/project', [ProjectController::class, 'index'])->name('project');


    Route::get('/partenaire', [PartenairesController::class, 'index'])->name('partenaire');
    Route::get('/addpartenaire', [PartenairesController::class, 'create'])->name('createPartenaire');
    Route::post('/partenaire', [PartenairesController::class, 'store'])->name('partenaire.store');
    Route::get('/partenaire/{id}/edit', [PartenairesController::class, 'edit'])->name('partenaire.edit');
    Route::put('/partenaire/{partenaire}', [PartenairesController::class, 'update'])->name('partenaire.update');
    Route::delete('/partenaire/{id}', [PartenairesController::class, 'destroy'])->name('partenaire.destroy');

    Route::post('/project/{id}/ajoute', [ProjectController::class, 'ajoute'])->name('projects.ajoute');
    Route::get('/',[ProjectController::class, 'index2']);
    Route::get('/project/{id}',[ProjectController::class,'show2'])->name('project.show2');
    Route::resource('projects',ProjectController::class);





    require __DIR__.'/auth.php';
