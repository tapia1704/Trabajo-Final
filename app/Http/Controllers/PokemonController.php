<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class PokemonController extends Controller
{
   
   public function index():View{
    try{
        $res= Http::get('https://pokeapi.co/api/v2/pokemon/');
        if ($res->successful()){
            $apidata = $res->json();

            $pokemonResults = $apidata['results'] ?? [];
            foreach ($pokemonResults as $pokemon) {
                $id = basename(trim($pokemon['url'], '/'));
                $sprite = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{$id}.png";
                $shiny  = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/shiny/{$id}.png";
                    DB::table('pokemon_list')->updateOrInsert(
                        ['name' => $pokemon['name']], 
                        [
                            'url'   => $pokemon['url'],
                            'image' => $sprite,
                            'imageS' => $shiny,
                        ]

                    );

                }

            }
                
        }  catch(\Exception $e){
        $apidata = null;
    }
    $local = DB::table('pokemon_list')->get();
    return view("pokemon", ["LocalPokemon"=> $local, "apiResults"=> $apidata]);
   } 

}