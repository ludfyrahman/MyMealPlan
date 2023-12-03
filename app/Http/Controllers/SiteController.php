<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Consultation;
use App\Models\Article;
use App\Models\MasterMenuDiet;
use App\Models\SiklusMenuDiet;
use App\Models\PolaMenuDiet;
use App\Models\SubCategory;
// import db
use Illuminate\Support\Facades\DB;
class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'HomePage | SMK';
        return redirect('/login');
        // return view('pages.frontend.index', compact('title'));
    }

    public function standart(){
        $title = 'Standart | SMK';
        return view('pages.backoffice.standart.index', compact('title'));
    }

    public function saveData(Request $request){

        $master_pagi = [];
        $master_selingan_pagi = [];
        $master_siang = [];
        $master_selingan_siang = [];
        $master_malam = [];

        $siklus_pagi = [];
        $siklus_selingan_pagi = [];
        $siklus_siang = [];
        $siklus_selingan_siang = [];
        $siklus_malam = [];

        try {
            DB::beginTransaction();
            foreach ($request->pola_makan_pagi as $key => $value) {
                $data = PolaMenuDiet::where('subcategory_id', $request->subcategory_id)->where('hari', $key+1)->first();
                if($data){
                    $data->update([
                        'makan_pagi' => $value,
                        'selingan_pagi' => $request->pola_selingan_pagi[$key] ?? '-',
                        'makan_siang' => $request->pola_makan_siang[$key] ?? '-',
                        'selingan_siang' => $request->pola_selingan_siang[$key] ?? '-',
                        'makan_malam' => $request->pola_makan_malam[$key] ?? '-',
                    ]);
                }else{
                    PolaMenuDiet::create([
                        'subcategory_id' => $request->subcategory_id,
                        'hari' => $key+1,
                        'makan_pagi' => $value,
                        'selingan_pagi' => $request->pola_selingan_pagi[$key] ?? '-',
                        'makan_siang' => $request->pola_makan_siang[$key] ?? '-',
                        'selingan_siang' => $request->pola_selingan_siang[$key] ?? '-',
                        'makan_malam' => $request->pola_makan_malam[$key] ?? '-',
                    ]);
                }
            }
            foreach ($request->master_makan_pagi as $key => $value) {
                $data = MasterMenuDiet::where('subcategory_id', $request->subcategory_id)->where('hari', $key+1)->first();
                if($data){
                    $data->update([
                        'makan_pagi' => $value,
                        'selingan_pagi' => $request->master_selingan_pagi[$key] ?? '-',
                        'makan_siang' => $request->master_makan_siang[$key] ?? '-',
                        'selingan_siang' => $request->master_selingan_siang[$key] ?? '-',
                        'makan_malam' => $request->master_makan_malam[$key] ?? '-',
                    ]);
                }else{
                    MasterMenuDiet::create([
                        'subcategory_id' => $request->subcategory_id,
                        'hari' => $key+1,
                        'makan_pagi' => $value,
                        'selingan_pagi' => $request->master_selingan_pagi[$key] ?? '-',
                        'makan_siang' => $request->master_makan_siang[$key] ?? '-',
                        'selingan_siang' => $request->master_selingan_siang[$key] ?? '-',
                        'makan_malam' => $request->master_makan_malam[$key] ?? '-',
                    ]);
                }
            }

            foreach ($request->siklus_makan_pagi as $key => $value) {
                $data = SiklusMenuDiet::where('subcategory_id', $request->subcategory_id)->where('hari', $key+1)->first();
                if($data){
                    $data->update([
                        'makan_pagi' => $value,
                        'selingan_pagi' => $request->siklus_selingan_pagi[$key] ?? '-',
                        'makan_siang' => $request->siklus_makan_siang[$key] ?? '-',
                        'selingan_siang' => $request->siklus_selingan_siang[$key] ?? '-',
                        'makan_malam' => $request->siklus_makan_malam[$key] ?? '-',
                    ]);
                }else{
                    SiklusMenuDiet::create([
                        'subcategory_id' => $request->subcategory_id,
                        'hari' => $key+1,
                        'makan_pagi' => $value,
                        'selingan_pagi' => $request->siklus_selingan_pagi[$key] ?? '-',
                        'makan_siang' => $request->siklus_makan_siang[$key] ?? '-',
                        'selingan_siang' => $request->siklus_selingan_siang[$key] ?? '-',
                        'makan_malam' => $request->siklus_makan_malam[$key] ?? '-',
                    ]);
                }
            }
            $sub = SubCategory::find($request->subcategory_id);
            DB::commit();
            return redirect('category/'.$sub->category_id)->with('success', 'Berhasil menambah data!');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return back()->with('failed', 'Gagal menambah data!' . $th->getMessage());
        }


    }
    public function recipe(){
        $data = Recipe::all();
        $latest = Recipe::orderBy('created_at', 'desc')->limit(3)->get();
        $title = 'Resep | CC';
        return view('pages.frontend.recipe.index', compact('data', 'title', 'latest'));
    }

    public function recipeDetail($id){
        $data = Recipe::find($id);
        $title = $data->name.' | CC';
        return view('pages.frontend.recipe.detail', compact('data', 'title'));
    }
    public function consultation(){
        $data = Consultation::all();
        $title = 'Konsultasi | CC';
        return view('pages.frontend.consultation.index', compact('data', 'title'));
    }

    public function about(){
        $title ='Tentang Aplikasi | CC';
        return view('pages.frontend.profile.index', compact('title'));
    }
    public function article(){
        $data = Article::all();
        $latest = Article::orderBy('created_at', 'desc')->limit(3)->get();
        $title = 'Artikel | CC';
        return view('pages.frontend.article.index', compact('data', 'title', 'latest'));
    }

    public function articleDetail($id){
        $data = Article::find($id);
        $title = $data->name.' | CC';
        return view('pages.frontend.article.detail', compact('data', 'title'));
    }

    public function profile()
    {
        $profiles = SchoolProfile::first();
        $title = 'Profil | SMK';
        return view('pages.frontend.profile.index', compact('profiles', 'title'));
    }



    public function programs(){
        $majors = Majors::all();
        return view('pages.frontend.programs.index', compact('majors'));
    }

    public function works(){
        $jobfair = JobFair::all();
        return view('pages.frontend.works.index', compact('jobfair'));
    }
}
