<?php

namespace App\Http\Controllers\Perpustaaan;

use App\Http\Controllers\Controller;
use App\Models\Perpustakaan\Perpustakaans;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PerpustaanController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    // Get the currently logged in user's ID
    $user_id = Auth::user()->id;

    // Get all the books borrowed by the user
    $datas = User::find($user_id)->pinjams;

    // Return the library page view with book data borrowed
    return view('pages.perpustakaan.index')->with('datas', $datas);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    // Return the form view to create a new book
    return view('pages.perpustakaan.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // Validate the input data
    $request->validate([
      'nama_buku' => 'required',
      'penerbit' => 'required',
    ]);

    // Try to create a new book
    try {
      Perpustakaans::create([
        'nama_buku' => $request->nama_buku,
        'penerbit' => $request->penerbit,
        'user_id' => Auth::user()->id,
      ]);

      // Redirect back to the library page with a success message
      return redirect()->route('perpustakaan.index')->with('success', 'Store created successfully');
    } catch (\Throwable $e) {
      // Log error message if failed to create a book
      Log::error($e->getMessage());

      // Redirect back to the library page with an error message
      return redirect()->route('perpustakaan.index')->with('error', 'Store created fail');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    // Get book data with connected user information
    $data = Perpustakaans::with('user')->find($id);

    // Return the library page view with book data
    return view('pages.perpustakaan.show')->with('data', $data);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    // Find a book based on the id
    $data = Perpustakaans::findOrFail($id);

    // Return the form view edit with the book data
    return view('pages.perpustakaan.edit', compact('data'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    // Validate the input data
    $request->validate([
      'nama_buku' => 'required',
      'penerbit' => 'required',
    ]);

    // Try to update the book
    try {
      // Find a book based on the id
      $buku = Perpustakaans::findOrFail($id);

      // Update the book name and publisher
      $buku->nama_buku = $request->nama_buku;
      $buku->penerbit = $request->penerbit;

      // Save the changes
      $buku->save();

      // Redirect back to the library page with a success message
      return redirect()->route('perpustakaan.index')->with('success', 'Resource updated successfully');
    } catch (\Throwable $e) {
      // Log error message if failed to update book
      Log::error($e->getMessage());

      // Redirect back to the library page with an error message
      return redirect()->route('perpustakaan.index')->with('error', 'Store created fail');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    // Try to delete the book
    try {
      // Find a book based on the id
      $buku = Perpustakaans::findOrFail($id);

      // Delete the book
      $buku->delete();

      // Redirect back to the library page with a success message
      return redirect()->route('perpustakaan.index')->with('success', 'Resource deleted successfully');
    } catch (\Throwable $e) {
      // Log error message if failed to delete book
      Log::error($e->getMessage());

      // Go back to the previous page with an error message
      return back()->withErrors(['error' => 'Resource deleted fail!']);
    }
  }
}
