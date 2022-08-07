<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\RendezVous;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class PrestataireController extends Controller
{
    public function show(){
       
        $prestataire = User::whereHas('roles', function ($query) {
            $query->where('name', 'prestataire');
           
           
        })->with('roles.RoleUser.specialite')
        ->with('roles.RoleUser.sous_specialite')
        ->get();
       
        
        return response()->json(
            $prestataire
        );

    }
    public function getPrestataireParSousSpecialite($idSpecialite, $idSous_specialite) {
        $role_user = RoleUser::where('sous_specialite',$idSous_specialite)
        ->where('specialite',$idSpecialite)
        ->where('status','=',1)->with('user')->get();
        return response()->json(
            $role_user
        );
    }
    public function accept($id){
        $prestataire = User::find($id);
        $prestataire->roles()->updateExistingPivot(2, ['status' => 1, 'date_dernier_paiement' => Carbon::now()]);
                $prestataire->save();
                return response()->json('Prestataire accepted',200);
    }
    public function refuse($id){
        $prestataire = User::find($id);
        $prestataire->roles()->updateExistingPivot(2, ['status' => 2]);
                $prestataire->save();
                return response()->json('Prestataire refused',200);
    }

    public function updateAccount(Request $request, $id){
        $User = User::find($id);
        if (!$User) {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
        $User->update(
            [
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "adresse" => $request->adresse,
                "phone_number" => $request->phone_number,
                "description" => $request->description,
                "image" => $request->image
            ]
        );
        $User->roles()->updateExistingPivot(2, ['description' => $request->description]);
        
        return response()->json(["data" => $User], 200);
    }

    public function search(request $request){
        $search = $request->input('search');
        $specialite = $request->input('specialite');
        $sous_specialite = $request->input('sous_specialite');
      
        $users = User::whereHas('roles', function ($query) use ($search,$specialite, $sous_specialite)  {
            $query->where('first_name', 'LIKE', '%'.$search.'%')
            ->where('roles.name','=','prestataire')
                ->where('status','=',1)
                ->where('specialite','=',$specialite)
                ->where('sous_specialite','=',$sous_specialite);
        })->with('roles')->get();
        // dd($users);
        return response()->json(["data" => $users], 200);

    }

    public function desactivateAccount( request $request){
        
        $users = User::whereHas('roles', function ($query) {
            $query->where('roles.name','=','prestataire')
            ->where('status','=',1);
        })->with('roles')->select('id','created_at')->get();

        // $users = RoleUser::where('role_id','=',2)->where('status','=',1)->select('user_id','date_dernier_paiement')->get();
   

     
      foreach ($users as $u) {
       
        $mytime = Carbon::now();
       
        $date = $u->date_dernier_paiement;
      
        
        if ($mytime == $u->created_at->addYear() ){
          
            $blocked = User::find($u->id);
        $blocked->roles()->updateExistingPivot(2, ['status' => 0]);
           
        }
       
      }
        return response()->json(["data" => $users], 200);

    }

    public function getMyRendezVous(Request $request){
        $authUser = $request->user()->id;
        $rdv = RendezVous::where('prestataire_id', $authUser)
        ->with('client')
        ->with('prestataire')
        ->get();
        if ($rdv){
            return response()->json(["data" => $rdv], 200);
        }
        return response()->json("Vous n'avez pas de rendez-vous ! ");

    }

    public function acceptRDV($id){
        $rdv = RendezVous::find($id);
        if (!$rdv) {
            return response()->json([
                "message" => " Rendez-vous non trouvé ! "
            ], 404);
        }
        $rdv->update(
            [
                "status" => 1,
            ]
        );
        return response()->json("Rendez-vous accepté !");

    }
    public function refuseRDV($id){
        $rdv = RendezVous::find($id);
        if (!$rdv) {
            return response()->json([
                "message" => " Rendez-vous non trouvé ! "
            ], 404);
        }
        $rdv->update(
            [
                "status" => 2,
            ]
        );
        return response()->json("Rendez-vous refusé !");

    }

    public function numberApprouvedRDV($id){
        $rdv = RendezVous::where('prestataire_id',$id)
        ->where('status',1)->count();
        return response()->json(["data" => $rdv], 200);
    }

    public function getOrderedByRate($idSpecialite, $idSous_specialite) {
        $role_user = RoleUser::where('sous_specialite',$idSous_specialite)
        ->where('specialite',$idSpecialite)
        ->where('status','=',1)->with('user')->orderBy('moyenne','desc')->get();
        return response()->json(
            $role_user
        );
   
    }
}
