<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\itemAdd;
use App\Http\Requests\itemModif;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LookForItem;
use Illuminate\Support\Facades\Route;


class ItemController extends Controller
{
    public function item()
    {
        /*
            Fonction item
            Pagination des items
        */

        $items = DB::table('item')->paginate();
        // Ici on change le nombre de résultat qu'on veux voir apparaitre sur la page
        $user = Auth::user()->name;
        return view('Visu', array ( 'items' => $items ))->with('username',$user);
        // Autre possibilité ici : return view('Visu')->with('items',$items);
    }

    public function additem()
    {
            /*
                Fonction additem
                Renvoie sur la vue pour ajouter des items
            */
        $user = Auth::user()->name;
        $itemsType = DB::table('item_type')->select('*')->get();

        return view('itemAdd',['username' => $user])->with('itemsType',$itemsType);
    }
    
    public function additempost(itemAdd $request)
    {
            /*
                Fonction additempost
                Ajoute en BD l'item voulu et renvoie sur la view item
            */
            $ittid = DB::table('item_type')->select('ITT_ID')->where('ITT_NAME','=',$request->input('type'))->get();

            //foreach à modifier c'est du bricolage
            foreach($ittid as $itt){

                DB::table('item')->insert(
                    ['IT_ID' => $request->input('id'),
                    'IT_NAME' => $request->input('nom'), 
                    'IT_LORE' => $request->input('lore'),
                    'ITT_ID' => $itt->ITT_ID,
                    'IT_PALLIER' => $request->input('pallier'),
                    'ITS_VIT' => $request->input('vit'),
                    'ITS_DEF' => $request->input('def'),
                    'ITS_ENE' => $request->input('ene'),
                    'ITS_REG' => $request->input('reg'),
                    'ITS_CONC' => $request->input('conc'),
                    'ITS_VITE' => $request->input('vite'),
                    'ITS_PUI' => $request->input('pui'),
                    'ITS_CRI' => $request->input('crit'),
                    'ITS_ESQ' => $request->input('esq'),
                    'ITS_MEL' => $request->input('mel'),
                    'ITS_DIS' => $request->input('dis'),
                    'ITS_DEG' => $request->input('deg'),
                    'ITS_SOIN' => $request->input('soin'),
                    'ITS_PROV' => $request->input('pro'),
                    'ITS_CONT' => $request->input('cont')]
                );

            }


            $user = Auth::user()->name;
            $itemsType = DB::table('item_type')->select('*')->get();
    
            return view('itemAdd',['username' => $user])->with('itemsType',$itemsType);

        
    }


    public function searchitem(LookForItem $request)
    {
            /*
                Fonction searchitem
                Recherche les items demandée et les affiches
            */
        $user = Auth::user()->name;

        if($request->input('choix') == "IT_ID"){
            $items = DB::table('item')->where('IT_ID', '=', $request->input('entree'))->paginate(3);
        }else if ($request->input('choix') == "IT_NAME"){
            $items = DB::table('item')->where('IT_NAME', '=', $request->input('entree'))->paginate(3);
        }else if ($request->input('choix') == "ITT_NAME"){
            $items = DB::table('item')->join('item_type','item.ITT_ID','=','item_type.ITT_ID')->where('ITT_NAME', '=', $request->input('entree'))->paginate(3);
        }else if ($request->input('choix') == "IT_PALLIER"){
            $items = DB::table('item')->where('IT_PALLIER', '=', $request->input('entree'))->paginate(3);
        }
        
        return view('Visu', array ( 'items' => $items ))->with('username',$user);
    }

    public function ajaxSuppr(Request $request)
    {
            /*
                Fonction ajaxsuppr
                Supprime le tuple choisie
            */

            //DB::table('item')->where('IT_ID', '=', $request->IT_ID)->delete();

            return response()->json(['result'=>$request->IT_ID]);

    }

    public function ajaxModif(Request $request)
    {
            /*
                Fonction ajaxModif
                Modifie les tuples demandée depuis la requête ajax
            */

            DB::table('item')->where('IT_ID','=',$request->id)->update(['IT_NAME' => $request->nom]);
            DB::table('item')->where('IT_ID','=',$request->id)->update(['IT_PALLIER' => $request->pallier]);

            return response(null);

    }

    public function modification()
    {
            /*
                Fonction modification
                Pour afficher les items avec tous leurs détails
            */
            $user = Auth::user()->name;
            $id = Route::current()->parameter('id');


            $item = DB::table('item')->select('*')->where('IT_ID','=',$id)->limit('1')->get();
            
            if ($item->isEmpty()){ 
               abort(404);
             }else {
                return view('modificationItem',['item' => $item])->with('username',$user);
             }

    }

    public function modificationPost(itemModif $request)
    {
            /*
                Fonction modificationPOst
                Pour afficher les items avec tous leurs détails
            */
            $user = Auth::user()->name;
            $id = Route::current()->parameter('id');

            DB::table('item')->insert(
                ['IT_ID' => $request->input('id'),
                'IT_NAME' => $request->input('nom'), 
                'IT_LORE' => $request->input('lore'),
                'ITT_ID' => $id,
                'IT_PALLIER' => $request->input('pallier'),
                'ITS_VIT' => $request->input('vit'),
                'ITS_DEF' => $request->input('def')]
            );

            $item = DB::table('item')->select('*')->where('IT_ID','=',$id)->limit('1')->get();
            
            if ($item->isEmpty()){ 
               abort(404);
             }else {
                return view('modificationItem',['item' => $item])->with('username',$user);
             }

    }
    
}
