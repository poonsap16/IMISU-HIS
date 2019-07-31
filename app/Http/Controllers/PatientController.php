<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Division;
use \App\Treatement;




class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {

 
            // $latest = DB::table('treatments')
            //             ->select('patient_id', DB::raw('MAX(updated_at) as latest_treat', 'name as t_name'))
            //             ->groupBy('patient_id');

            
            // $patients = DB::table('patients')
            //             ->join('divisions','patients.division_id',"=",'divisions.id')
                        
            //             ->joinSub($latest, 'treat', function ($join){
            //                 $join->on('treat.patient_id','=','patients.id');
            //                 })

            //             ->select(
            //                 'patients.*',
            //                 'divisions.name as division_name',
            //                 'latest_treat',
            //                 'treat.*'
            //             )

            //             ->get();

        $patients = Patient::paginate(20);

        //return $patients;
        //  return view('index', compact('patients'));
        return view('index')->with(['patients'=>$patients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->get('search');
    
        $patients_search = Patient::where('first_name', 'LIKE', '%'.$search.'%')
                                    ->orWhere('last_name','LIKE', '%' . $search . '%')
                                    ->orWhereHas('division',function($div_query) use($search) {
                                        $div_query->where('name','LIKE', '%' . $search . '%');
                                    })
                                    ->paginate(20);

        return view('index',['patients' => $patients_search ]);

    }


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
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
