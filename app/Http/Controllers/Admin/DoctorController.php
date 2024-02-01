<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Typology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index(Request $request)
    {
        // $user = Auth::user();

        // $doctor = Doctor::with('typologies')->find(Auth::user()->id);
        // return view('admin.doctors.index', compact('doctor', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $typologies = Typology::all();
        return view('admin.doctors.create', compact('typologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(Request $request)
    {
        $data = $this->validation($request->all());

        if (Arr::exists($data, 'photo')) {
            $path = Storage::put('uploads/doctors', $data['photo']);
            $data['photo'] = $path;
        };

        $user = Auth::user();

        $id = Auth::id();
        $doctor = new Doctor;
        $doctor->fill($data);
        $doctor->id = $id;
        $doctor->user_id = $id;
        $doctor->slug = Str::slug($user->name, '-');
        $doctor->save();

        if (Arr::exists($data, 'typologies')) $doctor->typologies()->attach($data['typologies']);

        return redirect()->route('admin.doctors.show', $doctor);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     *
     */
    public function show(Doctor $doctor)
    {
        $user = Auth::user();

        return view('admin.doctors.show', compact('doctor', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     *
     */
    public function edit(Doctor $doctor)
    {
        $typologies = Typology::all();
        return view('admin.doctors.edit', compact('doctor', 'typologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        $data = $this->validation($request->all());

        if (Arr::exists($data, 'photo')) {
            if ($doctor->photo) Storage::delete($doctor->photo);

            $path = Storage::put('uploads/doctors', $data['photo']);
            $data['photo'] = $path;
        };

        if (Arr::exists($data, 'typologies')) $doctor->typologies()->sync($data['typologies']);
        else $doctor->typologies()->detach();

        $doctor->update($data);
        return redirect()->route('admin.doctors.show', $doctor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        if ($doctor->photo) Storage::delete($doctor->photo);
        $doctor->delete();
        return to_route('admin.dashboard');
    }

    //VALIDATION
    private function validation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'address' => 'required|string|max:255',
                'description' => 'required|string|max:500',
                'services' => 'required|string|max:500',
                'photo' => 'nullable|image|mimes:jpg,png,jpeg',
                'visible' => 'required|boolean',
                'typologies' => 'required'
            ],
            [
                'address.required' => 'L\'idirizzo è obbligatorio',
                'address.string' => 'L\'idirizzo deve essere una stringa',
                'address.max' => 'L\'idirizzo deve avere massimo 255 caratteri',

                'description.required' => 'La descrizione è obbligatoria',
                'description.string' => 'La descrizione deve essere una stringa',
                'description.max' => 'La descrizione deve avere massimo 500 caratteri',

                'services.required' => 'I servizi da proporre sono obbligatori',
                'services.string' => 'Il campo "servizi" deve essere una stringa',
                'services.max' => 'Il campo "servizi" deve avere massimo 500 caratteri',

                'typologies.required' => 'La specializzazione è obbligatoria',

                'photo.image' => 'Perfavore inserisci un file',
                'photo.mimes' => 'I formati accettati sono: jpg, png o jpeg',

            ]
        )->validate();
        return $validator;
    }
}
