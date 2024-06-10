<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\models\laravel_crud_api; // importation de model laravel_crud_api
use App\Models\table_user; // importation de model table_user

class apiController extends Controller
{

    public function login(Request $request)
    {
        // Validation des champs
        $validator = Validator::make($request->all(), [
            'email_user' => 'required|string|email',
            'password_user' => 'required|string'
        ]);

        // Si la validation échoue, retourne une réponse d'erreur
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        // Récupérer les données validées
        $data = $validator->validated();

        // Trouver l'utilisateur par email
        $user = table_user::where('email_user', $data['email_user'])->first();

        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if (!$user || !Hash::check($data['password_user'], $user->password_user)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        // Générer un token avec Laravel Sanctum
        $token = $user->createToken('auth_token')->plainTextToken;

        // Retourner une réponse de succès avec le token
        return response()->json([
            'message' => 'Welcome, ' . $user->name_user,
            'token' => $token
        ], 200);
    }

    // Méthode pour la registration de l'utilisateur
    public function register(Request $request)
    {
        // Validation des champs
        $validator = Validator::make($request->all(), [
            'name_user' => 'required|string|max:255',
            'email_user' => [
                'required',
                'string',
                'regex:/^[^A-Z]*@[^A-Z]*\.com$/', // l'email ne doit pas contenir des majuscules,
                'unique:table_user,email_user'
            ],
            'password_user' => 'required|string|min:6',
            'password_confirm' => 'required|string|same:password_user'
        ]);

        // Si la validation échoue, retourne une réponse d'erreur
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        try {
            // Récupérer les données validées
            $data = $validator->validated();

            // Comparer les mots de passe
            if ($data['password_user'] !== $data['password_confirm']) {
                return response()->json(['error' => 'The password and confirmation do not match'], 400);
            }

            // Crypter les mots de passe
            $data['password_user'] = Hash::make($data['password_user']);
            $data['password_confirm'] = Hash::make($data['password_confirm']);

            // Enregistrer les données dans la table_user
            $user = table_user::create([
                'name_user' => $data['name_user'],
                'email_user' => $data['email_user'],
                'password_user' => $data['password_user'],
                'password_confirm' => $data['password_confirm'] // Enregistrez également le mot de passe confirmé
            ]);

            return response()->json(['message' => 'User registered successfully', 'data' => $user], 200);
        } catch (\Throwable $t) {
            return response()->json(['error' => $t->getMessage()], 500);
        }
    }

    //Afficher tous les données dans ma base de donnée sous format json
    public function get(){
        try{
            $data=laravel_crud_api::get();
            return response()->json($data,200);
        }catch(\Throwable $t)
        {
         return response()->json(['error'=> $t->getMessage()],500);
        }
    }

    //Fonction pour ajouter une nouvelle 
    public function create(Request $re)
    {
        // Validation des champs
        $validator = Validator::make($re->all(), [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'regex:/^[^A-Z]*@[^A-Z]*\.com$/', //l'email ne doit pas contenir des majuscule,
                /**
                 * 
                 * doit contenir un @
                 * doit se terminer par .com
                 * doit unique dans la base de donner ( unique:users,email)
                 */
                'unique:users,email'
            ],
            'password' => 'required|string|min:8'
            /**
             *  minimum 8 longueur de mot de passe pour être en sécurisé
             */
        ]);
    
        // Si la validation échoue, retourner une réponse d'erreur
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }
    
        try {
            // Récupérer les données validées
            $data = $validator->validated();
    
            // Crypter le mot de passe
            /**
             * cryptage de mot de passe la fonction Hash
             */
            $data['password'] = Hash::make($data['password']);
    
            // Enregistrer les données
            $res = laravel_crud_api::create($data);
    
            return response()->json(['message' => 'Saved successfully', 'data' => $res], 200);
        } catch (\Throwable $t) {
            return response()->json(['error' => $t->getMessage()], 500);
        }
    }
    
    
    //fonction pour récupérer par ID ( RECHERCHE PAR ID)
    public function getById($id){
        try{
            $data=laravel_crud_api::find($id);
            return response()->json($data,200);
        }catch(\Throwable $t)
        {
         return response()->json(['error'=> $t->getMessage()],500);
        }

    }

    public function update(Request $re, $id)
    {
        try {
            // Validation des champs
            $validator = Validator::make($re->all(), [
                'name' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => [
                    'required',
                    'string',
                    'email',
                    'unique:users,email,'.$id, // Assurez-vous de ne pas compter le courrier électronique actuel dans la vérification unique
                ],
                'password' => 'required|string|min:8'
            ]);

            // Si la validation échoue, retourner une réponse d'erreur
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->first()], 400);
            }

            // Récupérer les données validées
            $data = $validator->validated();

            // Crypter le mot de passe
            $data['password'] = Hash::make($data['password']);

            // Mettre à jour les données de l'utilisateur
            $crud = laravel_crud_api::find($id);
            if ($crud) {
                $crud->update($data);
                return response()->json(['message' => 'Updated successfully', 'data' => $crud], 200);
            } else {
                return response()->json(['error' => 'Record not found'], 404);
            }
        } catch (\Throwable $t) {
            return response()->json(['error' => $t->getMessage()], 500);
        }
    }


    // Foonction pour supprimer
    public function delete($id)
    {
        try {
            $crud = laravel_crud_api::find($id);
            if ($crud) {
                $crud->delete();
                return response()->json(['message' => 'Deleted successfully'], 200);
            } else {
                return response()->json(['error' => 'Record not found'], 404);
            }
        } catch (\Throwable $t) {
            return response()->json(['error' => $t->getMessage()], 500);
        }
    }

}
