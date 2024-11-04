<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PsbController;
use App\Http\Controllers\AdminGuruController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\PostController;
use App\Http\Controllers\AdminSaranaController;
use App\Http\Controllers\AdminSetterController;
use App\Http\Controllers\ImportExcelController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AdminProgramController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\Home\ProfileController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminKegiatanController;
use App\Http\Controllers\Home\AkademikController;
use App\Http\Controllers\AdminKesiswaanController;
use App\Http\Controllers\Home\KesiswaanController;
use App\Livewire\Psb\Fomulir\Main as formulirMain;
use App\Http\Controllers\AdminAchievmentController;
use App\Http\Controllers\AdminAgendaController;
use App\Http\Controllers\AdminInformasiController;
use App\Http\Controllers\AdminProfilemasController;
use App\Http\Controllers\Home\AchievmentController;
use App\Http\Controllers\Home\InformasiController;
use App\Livewire\Psb\Dashboard\Profile as ProfileSiswa;



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
    Route::get('/sarpras', 'sarana')->name('sarana');
    Route::get('/kurikulum', 'kurikulum')->name('kurikulum');
    Route::get('/daftar-prestasi', 'prestasi')->name('prestasi.aliyah');
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
    Route::get('/ekstrakulikuler', 'ekskul')->name('ekskul');
    Route::get('/ekstrakulikuler/{slug}', 'ekskulDetail')->name('ekskul.detail');
    Route::get('/bem', 'bem')->name('bems');
    Route::get('/album', 'album')->name('album');
    Route::get('/album/{slug}', 'albumDetail')->name('album.detail');
    Route::get('/kegiatan', 'Kegiatan')->name('kegiatan.siwa');
    
    Route::get('/alumnus', 'alumnus')->name('alumnus');
    Route::post('/sending', 'createPesanOrKesan')->name('create.kesan');
});

Route::prefix('/informasi')->controller(InformasiController::class)->group(function(){
    Route::get('/arsip', 'arsips')->name('arsips');
    Route::get('/kontak', 'kontak')->name('kontak');
    Route::get('/agenda', 'agenda')->name('agenda');
});

Route::prefix('/ppdb')->group(function(){
    Route::get('/formulir-pendaftaran', formulirMain::class)->name('formulir.psb')->middleware('guest');
    Route::get('/ppdb/biodata', ProfileSiswa::class)->name('biodata')->middleware('siswa');
});

Route::prefix('/ppdb/dashboard/')->controller(PsbController::class)->middleware(['siswa'])->group(function () {
    Route::get('/biodata', 'dashboard')->name('ppdb.profile');
    Route::get('/download/formulir/{id}', 'downloadForm')->name('downloadForm');
});

// Route::prefix('/ppdb')->controller(PpdbController::class)->group(function () {
//     Route::get('/info-pendaftaran',  'home')->name('ppdb.home');
//     Route::get('/formulir-pendaftaran/{tahun?}',  'daftar')->name('ppdb.daftar');
//     Route::get('/downloads', 'download')->name('downloading');
//     Route::get('/download/brosur/{id}', 'downloadBrosur')->name('downloadBrosur');
// });

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
    // Route::post('/reset-password', [UserProfileController::class, 'updatepassword'])->name('password.update');
    Route::post('/update/profile', [UserProfileController::class, 'updateprofile'])->name('profile.update');
});

// Admin
Route::prefix('/dashboard')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('/categories', AdminCategoryController::class)->names('category');
    Route::resource('/users', AdminUserController::class)->names('user');
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
    Route::prefix('/kesiswaan')->group(function(){
        Route::resource('/kegiatan', AdminKegiatanController::class)->names('akegiatan');
        Route::get('/album', [AdminKesiswaanController::class, 'album'])->name('galeri.index');
        Route::get('/ekstrakulikuler', [AdminKesiswaanController::class, 'ekskul'])->name('ekskul.index');
        Route::get('/bem', [AdminKesiswaanController::class, 'bem'])->name('bem.index');
    });
    Route::resource('akademik/programs', AdminProgramController::class)->names('aprogram');
    Route::resource('/akademik/guru', AdminGuruController::class)->names('guru');
    Route::resource('/akademik/prestasi', AdminAchievmentController::class)->names('prestasi');
    Route::resource('/akademik/sarana', AdminSaranaController::class)->names('asarana');

    Route::prefix('informasi')->controller(AdminInformasiController::class)->group(function(){
        Route::get('/arsips', 'arsip')->name('data.arsip');
    });
    Route::resource('/informasi/agenda', AdminAgendaController::class)->names('acara');
    Route::prefix('/import')->controller(ImportExcelController::class)->group(function () {
        Route::post('/guru',  'guru')->name('import.guru');
        Route::post('/sarana',  'sarana')->name('import.sarana');
        Route::post('/prestasi',  'prestasi')->name('import.prestasi');
        Route::post('/ekskul',  'ekskul')->name('import.ekskul');
    });


});

Route::middleware(['middleware' => 'role'])->group(function(){
    Route::get('/category/slug', [AdminCategoryController::class, 'slug']);
    Route::get('/program/slug', [AdminProgramController::class, 'slugProgram']);
    Route::get('/sarana/slug', [AdminSaranaController::class, 'slug']);
    Route::get('/post/slug', [AdminPostController::class, 'slug']);
    Route::get('/achievments/slug', [AdminAchievmentController::class, 'slug']);
    Route::get('/guru/slug', [AdminGuruController::class, 'slugGuru']);
    Route::get('/agenda/slug', [AdminAgendaController::class, 'slugAgenda']);
});

Route::fallback(function () {
    return view('errors.404');
});
