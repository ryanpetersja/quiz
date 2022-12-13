<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Mail\QuizResults;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\MailChimpController;



class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'sometimes',
            'responses' => 'required',
            'recommendations_string' => 'required',
        ]);



        $oils = [
            'neem' => [
                'name' => 'neem',
                'display_name' => 'Neem Oil',
                'body' => 'Yay neem stuff',
                'image' => 'https://5.imimg.com/data5/VX/WC/LQ/SELLER-35988233/neem-tree-500x500.jpg'
            ],
            'caster' => [
                'name' => 'caster',
                'display_name' => 'Caster Oil',
                'body' => 'Oooo! Caster stuff',
                'image' => 'https://post.healthline.com/wp-content/uploads/2022/01/castor-bean-oil-732x549-thumbnail-732x549.jpg'
            ],
            'gb' => [
                'name' => 'gb',
                'display_name' => 'Tropical Growth Blend',
                'body' => 'oh yes! gb stuff',
                'image' => 'https://img.freepik.com/premium-vector/seamless-pattern-with-exotic-tropical-plants-modern-style_1458-980.jpg?w=2000'
            ],
        ];

        Mail::to($validated["email"])
            ->send(new QuizResults($validated["email"], $validated["name"], $oils[$validated["recommendations_string"]]));

        $response_object = json_decode($validated["responses"], true);
        // dd($response_object);

        $merge_fields = [
            "EMAIL" => $validated["email"],
            "NAME" => $validated["name"],
            "PHONE" => $validated["phone"],
            "ROUTINE" => $response_object["routine"],
            "WIG_BEFORE" => $response_object["wig-before"],
            "CHALLENGE" => $response_object["challenge"],
            "GOAL" => $response_object["goal"],
        ];
        $controller = new MailChimpController;
        $controller->addSubscriber($validated["email"], $merge_fields, 'subscribers');
        return view("success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        //
    }
}
