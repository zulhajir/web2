<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Event; // Pastikan Anda mengimport model Event
use Illuminate\Http\Request;

class DonationController extends Controller
{
    // Menampilkan daftar donation
    public function index()
    {
        $donations = Donation::with('event')->get(); // ambil donasi dan event-nya
        return view('donations.index', compact('donations'));
    }

    // Menampilkan form untuk menambah donation
    public function create()
    {
        // Mengambil semua events untuk ditampilkan pada dropdown
        $events = Event::all();
        return view('donations.create', compact('events'));
    }

    // Menyimpan donation baru
    public function store(Request $request)
    {
        $request->validate([
            'donor_name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'event_id' => 'required|exists:events,id',
        ]);
    
        $data = $request->all();
        $data['donation_date'] = now(); // otomatis pakai tanggal sekarang
    
        Donation::create($data);
    
        return redirect()->route('donations.index');
    }
    

    // Menampilkan form untuk mengedit donation
    public function edit(Donation $donation)
    {
        // Mengambil semua events untuk ditampilkan pada dropdown
        $events = Event::all();
        return view('donations.edit', compact('donation', 'events'));
    }

    // Memperbarui donation
    public function update(Request $request, Donation $donation)
    {
        $request->validate([
            'donor_name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'donation_date' => 'required|date',
            'event_id' => 'required|exists:events,id', // Pastikan event_id valid
        ]);

        $donation->update($request->all());

        return redirect()->route('donations.index');
    }

    // Menghapus donation
    public function destroy(Donation $donation)
    {
        $donation->delete();

        return redirect()->route('donations.index');
    }
}
