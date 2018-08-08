<?php

namespace App\Http\Controllers;
use App\Reponsitories\Eloquent\HomeEloquentInterface;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    protected $ReponsitoryHome;

    public function __construct(HomeEloquentInterface $Home)
    {
        $this->ReponsitoryHome = $Home;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $ReponsitoryHome = $this->ReponsitoryHome->getAll();

           return view('News',compact('ReponsitoryHome'));
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
        $ReponsitoryHome = $this->ReponsitoryHome->findID($id);
        
        return view('Home',compact('ReponsitoryHome'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $rq)
    {   
        $this->ReponsitoryHome->Edit( $rq);
        return redirect()->route('news');
  
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
    public function Phahuy($id)
    {
        $id_del= $this->ReponsitoryHome->delete($id);
        return  $id_del;
    }
}
