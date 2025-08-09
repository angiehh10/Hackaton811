<?php

namespace App\Http\Controllers;

use App\Models\VisitorMessage;
use Illuminate\Http\Request;

class VisitorLogController extends Controller
{
    public function index()
    {
        $messages = VisitorMessage::paginate(10);
        return view('visitor-log', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        VisitorMessage::create([
            'name' => $request->name,
            'message' => $request->message,
        ]);

        return redirect()->route('visitor-log.index')->with('success', 'Mensaje guardado con éxito.');
    }

    public function destroyAll()
    {
        VisitorMessage::truncate();
        return redirect()->route('visitor-log.index')->with('success', 'Todos los mensajes han sido eliminados.');
    }
}