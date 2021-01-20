<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    private $image;
    public function __construct(ImageService $imageService)
    {
        $this->image = $imageService;
    }

    public function index() {
        return view('welcome', ['imageForView' => $this->image->all()]);
    }

    public function create () {
        return view('create');
    }

    public function store (Request $request){
        $image = $request->file('image');
        
        $this->image->add($image);
    
        return redirect('/');
    
    }

    public function show($id){
        $imageInView = $this->image->one($id);
        
        return view('show', ['imageInView' => $imageInView->image]);
    }

    public function edit($id){
        $imageInView = $this->image->one($id);
    
        return view('edit', ['imageInView' => $imageInView]);
    }

    public function update (Request $request, $id){
        $this->image->update($id, $request->image);

        return redirect('/');
    
    }

    public function delete ($id){
        $this->image->delete($id);
        
    
        return redirect('/');
    }
}
