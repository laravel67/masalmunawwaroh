<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\AdminGuruController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\PostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminSaranaController;
use App\Http\Controllers\AdminSetterController;
use App\Http\Controllers\ImportExcelController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\Home\ProfileController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\Home\AkademikController;
use App\Http\Controllers\Home\KesiswaanController;
use App\Http\Controllers\AdminAchievmentController;
use App\Http\Controllers\AdminMasterdataController;
use App\Http\Controllers\Home\AchievmentController;
use App\Http\Controllers\AdminProfilemasController;
use App\Http\Controllers\AdminProgramController;

Auth::routes();
Route::get('/ppdb/test', function(){
    return view('ppdb.psb');
});
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/berita', [PostController::class, 'index'])->name('posts');
Route::get('/berita/{slug}', [PostController::class, 'show'])->name('post');
// Profile
Route::prefix('/profile')->controller(ProfileController::class)->group(function () {
    Route::get('/identitas', 'identitas')->name('identitas');
    Route::get('/sambutan', 'sambutan')->name('sambutan');
    Route::get('/struktur-organisasi', 'struktur')->name('struktur');
    Route::get('/sejarah', 'sejarah')->name('sejarah');
    Route::get('/visi-misi', 'visi')->name('visi');
});
// Akademik
Route::prefix('/akademik')->controller(AkademikController::class)->group(function () {
    Route::get('/program-unggulan','programUnggulan')->name('pronggul');
    Route::get('/kurikulum', 'kurikulum')->name('kurikulum');
    Route::get('/daftar-prestasi', 'prestasi')->name('prestasi.aliyah');
    Route::get('/sarpras', 'sarana')->name('sarana');
    Route::get('/sarpras/{slug}', 'saranaDetail')->name('sarana.detail');
    Route::get('/biografi', 'biografi')->name('biografi');
    Route::get('/biografi/{slug}', 'guruDetail')->name('guru.detail');
});
// Achievment/Prestasi
Route::prefix('/prestasi')->controller(AchievmentController::class)->group(function () {
    Route::get('/akademik', 'akademik')->name('akademik');
    Route::get('/nonakademik', 'nonakademik')->name('nonakademik');
    Route::get('/santri', 'student')->name('students.prestasi');
});
// Kesiswaan
Route::prefix('/kesiswaan')->controller(KesiswaanController::class)->group(function () {
    Route::get('/ekstrakulikuler', 'lifeskill')->name('lifeskill');
    Route::get('/ekstrakulikuler/{slug}', 'lifeskillDetail')->name('lifeskill.detail');
    Route::get('/bem', 'bem')->name('bem');
    Route::get('/album', 'album')->name('album');
    Route::get('/album/{slug}', 'albumDetail')->name('album.detail');
});
// Pendaftaran PPDB
Route::prefix('/ppdb')->controller(PpdbController::class)->group(function () {
    Route::get('/info-pendaftaran',  'home')->name('ppdb.home');
    Route::get('/formulir-pendaftaran/{tahun?}',  'daftar')->name('ppdb.daftar');
    Route::get('/downloads', 'download')->name('downloading');
    Route::get('/download/brosur/{id}', 'downloadBrosur')->name('downloadBrosur');
    Route::middleware(['siswa'])->group(function () {
        Route::get('/biodata', 'profileRegister')->name('ppdb.profile');
        Route::get('/download/formulir/{id}', 'downloadForm')->name('downloadForm');
    });
});

/** ROUTE BAGIAN DASHBOARD */
// User dan admin
Route::prefix('/dashboard')->middleware(['middleware' => 'role'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/posts', AdminPostController::class)->names('apost');
    Route::prefix('/ppdb')->controller(AdminStudentController::class)->group(function(){
        Route::get('/siswa',  'index')->name('appdb.index');
        Route::get('/siswa/{student}/show',  'show')->name('appdb.show');
        Route::get('/siswa/{student}/edit',  'edit')->name('appdb.edit');
        Route::put('/siswa/{student}/update',  'update')->name('appdb.update');
    });
    Route::get('/profile', [UserProfileController::class, 'userProfile'])->name('user.profile');
    Route::get('/persada', [DashboardController::class, 'persada'])->name('admin.persada');
    Route::post('/reset-password', [UserProfileController::class, 'updatepassword'])->name('password.update');
    Route::post('/update/profile', [UserProfileController::class, 'updateprofile'])->name('profile.update');
});

// Admin
Route::prefix('/dashboard')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('/categories', AdminCategoryController::class)->names('category');
    Route::resource('/users', AdminUserController::class)->names('user');
    Route::controller(AdminMasterdataController::class)->group(function(){
        Route::get('/masterdata/jabatan',  'jabatan')->name('admin.jabatan');
        Route::get('/masterdata/mapel',  'mapel')->name('admin.mapel');
    });
    Route::get('/ppdb/pengaturan',[AdminSetterController::class,'setDaftar'])->name('set.reg');
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/ekstrakulikuler',  'lifeskill')->name('admin.lifeskill');
        Route::get('/struktural',  'struktur')->name('admin.struktur');
        Route::get('/data/bidang',  'bidang')->name('admin.bidang');
        Route::get('/pengaturan', 'generalSetting')->name('pengaturan');
        Route::post('/pengaturan/sambutan', 'sambutan')->name('pengaturan.sambutan');
    });

    Route::prefix('/profile-madrasah')->controller(AdminProfilemasController::class)->group(function(){
        Route::get('/struktur', 'struktur')->name('profilemas.struktur');
        Route::get('/sambutan', 'sambutan')->name('profilemas.sambutan');
        Route::get('/visi-misi', 'visiMisi')->name('profilemas.visimisi');
        Route::post('/visi-misi/update', 'updateVisi')->name('visimisi.update');
        Route::get('/mars', 'mars')->name('profilemas.mars');
        Route::post('/mars/update', 'updateMars')->name('mars.update');
    });

    Route::resource('/programs', AdminProgramController::class)->names('aprogram');
    Route::resource('/akademik/guru', AdminGuruController::class)->names('guru');
    Route::resource('/akademik/prestasi', AdminAchievmentController::class)->names('prestasi');
    Route::resource('/akademik/sarana', AdminSaranaController::class)->names('asarana');

    Route::prefix('/import')->controller(ImportExcelController::class)->group(function () {
        Route::post('/jabatan',  'jabatan')->name('import.jabatan');
        Route::post('/bidang',  'bidang')->name('import.bidang');
        Route::post('/mapel',  'mapel')->name('import.mapel');
        Route::post('/guru',  'guru')->name('import.guru');
        Route::post('/sarana',  'sarana')->name('import.sarana');
        Route::post('/prestasi',  'prestasi')->name('import.prestasi');
        Route::post('/lifeskill',  'lifeskill')->name('import.lifeskill');
    });

});

Route::middleware(['middleware' => 'role'])->group(function(){
    Route::get('/category/slug', [AdminCategoryController::class, 'slug']);
    Route::get('/mapels/slug', [AdminGuruController::class, 'slug']);
    Route::get('/program/slug', [AdminProgramController::class, 'slugProgram']);
    Route::get('/sarana/slug', [AdminSaranaController::class, 'slug']);
    Route::get('/post/slug', [AdminPostController::class, 'slug']);
    Route::get('/achievments/slug', [AdminAchievmentController::class, 'slug']);
    Route::get('/guru/slug', [AdminGuruController::class, 'slugGuru']);
});

Route::fallback(function () {
    return view('errors.404');
});
