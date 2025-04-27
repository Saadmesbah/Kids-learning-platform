<?php

namespace App\Http\Controllers;

use App\Models\Element;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ElementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Element::with('category')->get();
        return view('elements.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('elements.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'audio' => 'nullable|mimes:mp3,wav|max:5120',
            'video' => 'nullable|mimes:mp4,avi,mov|max:10240'
        ]);

        $data = $request->except(['image', 'audio', 'video']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('elements/images', 'public');
            $data['image_path'] = $imagePath;
        }

        if ($request->hasFile('audio')) {
            $audioPath = $request->file('audio')->store('elements/audio', 'public');
            $data['audio_path'] = $audioPath;
        }

        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('elements/videos', 'public');
            $data['video_path'] = $videoPath;
        }

        Element::create($data);
        return redirect()->route('elements.index')->with('success', 'Element created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Element $element)
    {
        return view('elements.show', compact('element'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Element $element)
    {
        $categories = Category::all();
        return view('elements.edit', compact('element', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Element $element)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'audio' => 'nullable|mimes:mp3,wav|max:5120',
            'video' => 'nullable|mimes:mp4,avi,mov|max:10240'
        ]);

        $data = $request->except(['image', 'audio', 'video']);

        if ($request->hasFile('image')) {
            if ($element->image_path) {
                Storage::disk('public')->delete($element->image_path);
            }
            $imagePath = $request->file('image')->store('elements/images', 'public');
            $data['image_path'] = $imagePath;
        }

        if ($request->hasFile('audio')) {
            if ($element->audio_path) {
                Storage::disk('public')->delete($element->audio_path);
            }
            $audioPath = $request->file('audio')->store('elements/audio', 'public');
            $data['audio_path'] = $audioPath;
        }

        if ($request->hasFile('video')) {
            if ($element->video_path) {
                Storage::disk('public')->delete($element->video_path);
            }
            $videoPath = $request->file('video')->store('elements/videos', 'public');
            $data['video_path'] = $videoPath;
        }

        $element->update($data);
        return redirect()->route('elements.index')->with('success', 'Element updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Element $element)
    {
        if ($element->image_path) {
            Storage::disk('public')->delete($element->image_path);
        }
        if ($element->audio_path) {
            Storage::disk('public')->delete($element->audio_path);
        }

        $element->delete();
        return redirect()->route('elements.index')->with('success', 'Element deleted successfully.');
    }
}
