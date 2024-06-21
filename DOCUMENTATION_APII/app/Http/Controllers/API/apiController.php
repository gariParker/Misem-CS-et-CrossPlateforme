<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\models\laravel_crud_api; // importation de model laravel_crud_api
use App\Models\table_user; // importation de model table_user

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Laravel API",
 *     description="API CRUD USER"
 * )
 */

class apiController extends Controller
{
        /**
     * @OA\Post(
     *     path="/api/chemin/laravel_api/login",
     *     summary="Login a user",
     *     tags={"SE CONNECTE"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="email_user", type="string", example="john.doe@example.com"),
     *             @OA\Property(property="password_user", type="string", example="password123")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Welcome, John"),
     *             @OA\Property(property="token", type="string", example="token123")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validation Error",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string", example="The email field is required.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string", example="Invalid credentials")
     *         )
     *     )
     * )
     */

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

        /**
     * @OA\Post(
     *     path="/api/chemin/laravel_api/register",
     *     operationId="register",
     *     summary="Register a new user",
     *     tags={"USER QUI SE CONNECTE"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name_user", "email_user", "password_user", "password_confirm"},
     *             @OA\Property(property="name_user", type="string", example="John Doe"),
     *             @OA\Property(property="email_user", type="string", format="email", example="john.doe@example.com"),
     *             @OA\Property(property="password_user", type="string", format="password", example="password123"),
     *             @OA\Property(property="password_confirm", type="string", format="password", example="password123")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User registered successfully"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     )
     * )
     */

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

        /**
     * @OA\Get(
     *     path="/api/chemin/laravel_api",
     *     operationId="getAllData",
     *     summary="Get all data",
     *     tags={"CRUD Operations"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *       
     *            
     *          
     *         
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */

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

        /**
     * @OA\Post(
     *     path="/api/chemin/laravel_api/",
     *     operationId="createData",
     *     summary="Create new data",
     *     tags={"CRUD Operations"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "lastname", "email", "password"},
     *             @OA\Property(property="name", type="string", example="John"),
     *             @OA\Property(property="lastname", type="string", example="Doe"),
     *             @OA\Property(property="email", type="string", format="email", example="john.doe@example.com"),
     *             @OA\Property(property="password", type="string", format="password", example="password123")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validation error"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    
    //Fonction pour ajouter une nouvelle user
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

        /**
     * @OA\Get(
     *     path="/api/chemin/laravel_api/{id}",
     *     operationId="getDataById",
     *     summary="Get data by ID",
     *     tags={"CRUD Operations"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *         
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
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
    
        /**
     * @OA\Put(
     *     path="/api/chemin/laravel_api/{id}",
     *     operationId="updateData",
     *     summary="Update data by ID",
     *     tags={"CRUD Operations"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "lastname", "email", "password"},
     *             @OA\Property(property="name", type="string", example="John"),
     *             @OA\Property(property="lastname", type="string", example="Doe"),
     *             @OA\Property(property="email", type="string", format="email", example="john.doe@example.com"),
     *             @OA\Property(property="password", type="string", format="password", example="password123")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *       
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validation error"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Record not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
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

        /**
     * @OA\Delete(
     *     path="/api/chemin/laravel_api/{id}",
     *     operationId="deleteData",
     *     summary="Delete data by ID",
     *     tags={"CRUD Operations"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Record not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
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
