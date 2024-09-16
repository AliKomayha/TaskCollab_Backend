[1mdiff --git a/app/Models/User.php b/app/Models/User.php[m
[1mindex fe70d2e..19158d0 100644[m
[1m--- a/app/Models/User.php[m
[1m+++ b/app/Models/User.php[m
[36m@@ -44,4 +44,25 @@[m [mclass User extends Authenticatable[m
         'email_verified_at' => 'datetime',[m
         'password' => 'hashed',[m
     ];[m
[32m+[m
[32m+[m
[32m+[m[32m    public function tasks(){[m
[32m+[m
[32m+[m[32m        return $this->hasMany(Task::class, 'employee_id');[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    public function managedTasks(){[m
[32m+[m
[32m+[m[32m        return $this->hasMany(Task::class, 'manager_id');[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    public function manager()[m
[32m+[m[32m    {[m
[32m+[m[32m        return $this->belongsTo(User::class, 'manager_id');[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    public function employees()[m
[32m+[m[32m    {[m
[32m+[m[32m        return $this->hasMany(User::class, 'manager_id');[m
[32m+[m[32m    }[m
 }[m
[1mdiff --git a/routes/api.php b/routes/api.php[m
[1mindex 889937e..49e2d46 100644[m
[1m--- a/routes/api.php[m
[1m+++ b/routes/api.php[m
[36m@@ -1,19 +1,10 @@[m
 <?php[m
 [m
[32m+[m[32muse App\Http\Controllers\API\UserController;[m
 use Illuminate\Http\Request;[m
 use Illuminate\Support\Facades\Route;[m
 [m
[31m-/*[m
[31m-|--------------------------------------------------------------------------[m
[31m-| API Routes[m
[31m-|--------------------------------------------------------------------------[m
[31m-|[m
[31m-| Here is where you can register API routes for your application. These[m
[31m-| routes are loaded by the RouteServiceProvider and all of them will[m
[31m-| be assigned to the "api" middleware group. Make something great![m
[31m-|[m
[31m-*/[m
[32m+[m[32mRoute::get('/users',[UserController::class,'index']);[m
[32m+[m[32mRoute::post('/users',[UserController::class,'store']);[m
[32m+[m
 [m
[31m-Route::middleware('auth:sanctum')->get('/user', function (Request $request) {[m
[31m-    return $request->user();[m
[31m-});[m
