<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    // Property to store animal data
    private $animals;

    // Constructor to initialize animal data
    public function __construct() {
        // Initial data (array of animals)
        $this->animals = ['kucing', 'ayam', 'ikan'];
    }

    // GET: Display the list of animals
    public function index() {
        return response()->json($this->animals, 200);
    }

    // POST: Add a new animal
    public function store(Request $request) {
        // Validate the request data
        $request->validate([
            'animal' => 'required|string'
        ]);

        // Add the new animal to the list
        $this->animals[] = $request->animal;

        return response()->json([
            'message' => 'Animal added successfully',
            'data' => $this->animals
        ], 201);
    }

    // PUT: Update an animal by ID
    public function update(Request $request, $id) {
        // Validate the request data
        $request->validate([
            'animal' => 'required|string'
        ]);

        // Check if the ID exists in the array
        if (isset($this->animals[$id])) {
            $this->animals[$id] = $request->animal;

            return response()->json([
                'message' => 'Animal updated successfully',
                'data' => $this->animals
            ], 200);
        } else {
            return response()->json(['message' => 'Animal not found'], 404);
        }
    }

    // DELETE: Remove an animal by ID
    public function destroy($id) {
        // Check if the ID exists in the array
        if (isset($this->animals[$id])) {
            // Remove the animal
            unset($this->animals[$id]);
            $this->animals = array_values($this->animals); // Reindex the array

            return response()->json([
                'message' => 'Animal deleted successfully',
                'data' => $this->animals
            ], 200);
        } else {
            return response()->json(['message' => 'Animal not found'], 404);
        }
    }
}
