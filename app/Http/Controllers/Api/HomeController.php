<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use DB;
use App\Question;
class HomeController extends Controller
{


    public function appData(Request $request)


    {

$main=$request->input('main');
        DB::table('clients')->insert(
            ['company_name' => $main['company_name'],
                'first_name' => $main['first_name'],
                'last_name' => $main['last_name'],
                'street_house_number' => $main['street_house_number'],

                'email' => $main['email'],
                'telephone' => $main['telephone'],
                
            ]
        );
        return $request->__authenticatedApp;
    }

    public function authorizeApp(Request $request)
    {
        // Проверка параметров валидации...
        $validator = Validator::make($request->all(), [
            'app_key' => 'required|exists:applications,key,is_active,1',
            'redirect_uri' => 'required:active_url',
        ]);

        if (! $validator->passes()) {
            return redirect()->back()->withMessage('Неверные параметры авторизации');
        }

        // Проверим логин/пароль пользователя...
        if (! Auth::validate($request->only(['email', 'password']))) {
            return redirect()->back()->withMessage('Неверный логин или пароль');
        }

        $app = Application::whereKey($request->app_key)->first();

        $user = User::whereEmail($request->email)->first();

        // Генерация кода авторизации для приложения..
        $pivotData = ['Authorization_code' => $code = sha1($app->id.':'.$user->id.str_random())];

        // Обновим данные связующей таблицы...
        if ($app->users->contains($user)) {
            $app->users()->updateExistingPivot($user->id, $pivotData);
        } else {
            $app->users()->attach($user->id, $pivotData);
        }

        // Перейдем по указанному  redirect_uri с кодом...
        return redirect()->away($request->redirect_uri.'?code='.$code);
    }

    public function userData(Request $request)
    {
        dd($request);
        return [
            'app' => $request->__authenticatedApp,
            'user' => $request->__authenticatedUser,
        ];
    }
}
