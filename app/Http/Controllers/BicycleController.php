<?php

namespace App\Http\Controllers;

use App\Models\Bicycle;
use Illuminate\Http\Request;

class BicycleController extends Controller
{
    public $color;
    public $type;
    public $speed;
    public $topMPH;
    public $price;
    public $stock;


    public function __construct($color = 'No Color', $type = 'No Type', $speed = 'No Gear') {
        $this->color = $color;
        $this->type = $type;
        $this->speed = $speed;
    }

    public function index() {
        $bicycles = Bicycle::all();

        return view('bicycles.index', compact('bicycles'));
    }

    public function show(Request $request) {
        $id = (string)$request->id;
        $bicycles = Bicycle::all();

        return view('bicycles.test', compact('bicycles', 'id'));
    }

    public function calculateTopMPH() {

        $speedAdd = match($this->speed) {
            'Single-speed' => 10,
            '3-speed' => 11,
            '5-speed' => 12,
            '7-speed' => 13,
            '8-speed' => 14,
        };

        $typeAdd = match($this->type) {
            'Cruiser' => 6,
            'Folding' => 7,
            'Mountain' => 8,
            'Hybrid' => 10,
            'Road' => 13,
        };

        $this->topMPH = $speedAdd + $typeAdd;

        if (!empty($this->topMPH)) {
            return $this->topMPH;
        } else {
            return "There was an error calculating the bike's top MPH.";
        }
    }

    public function calculatePrice() {

        $colorAdd = match($this->color) {
            'Blue' => 80.59,
            'Orange' => 83.49,
            'Green' => 85.49,
            'Black' => 90.99,
            'Red' => 100.79,
        };

        $speedAdd = match($this->speed) {
            'Single-speed' => 125.49,
            '3-speed' => 152.29,
            '5-speed' => 177.89,
            '7-speed' => 197.79,
            '8-speed' => 200.69,
        };

        $typeAdd = match($this->type) {
            'Cruiser' => 258.39,
            'Mountain' => 265.59,
            'Hybrid' => 274.59,
            'Folding' => 314.19,
            'Road' => 325.59,
        };

        $this->price = $colorAdd + $speedAdd + $typeAdd;

        if (!empty($this->price)) {
            return number_format($this->price, 2, '.', '');
        } else {
            return "There was an error calculating the bike's price.";
        }
    }

    public function calculateStock() {
        $this->stock = Bicycle::where('color', '=',  $this->color)
            ->where('type', '=', $this->type)
            ->where('speed', '=', $this->speed)
            ->count();

        if (!empty($this->stock)) {
            return $this->stock;
        } else {
            return "There was an error checking the bike's stock.";
        }
    }
}
