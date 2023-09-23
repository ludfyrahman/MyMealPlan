<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\BackOffice\Services\SummaryService;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;

use Auth;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public SummaryService $service;

    public function __construct(SummaryService $service)
    {
        $this->service = $service;
    }
    public function index(Request $request)
    {
        //
        // $summary = $this->service->getSummary($request);
        $summary =(object) [
            'saleToday' => 0,
            'saleTodayBefore' => 0,
            'purchaseToday' => 0,
            'purchaseTodayBefore' => 0,
            'saleMonth' => 0,
            'saleMonthBefore' => 0,
            'purchaseMonth' => 0,
            'purchaseMonthBefore' => 0,
            'salesChart' => [],
            'product' => 0,
            'service' => 0,
            'sales' => [],
            'purchaseChart' => [],

        ];
        $category  = Category::all();
        $article = Article::all();
        $recipe = Recipe::all();
        $users = User::all();
        return view('pages.backoffice.dashboard.index', compact('article', 'summary', 'category', 'recipe', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
