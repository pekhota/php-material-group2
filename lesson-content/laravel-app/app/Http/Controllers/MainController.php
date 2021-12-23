<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MainController extends Controller
{
    public function main() {
        $posts = Post::query()->where("id", ">", 24)->paginate(10);
        return view('base', [
            'posts' => $posts
        ]);
    }

    public function ajax(Request $request) {
        $client = new Client();
        $response = $client->get("https://blockchain.info/ticker");
        $body = json_decode($response->getBody()->getContents(), true);

        return [
            "last" => $body['USD']['last'],
            "user_get" => $request->get("user"),
            "msg_post" => $request->post('message')
        ];
    }

    public function signup(Request $request) {
        if ($request->isMethod('get')) {
            return view('signup');
        }

        // https://laravel.com/docs/8.x/validation#available-validation-rules
        try {
            $request->validate([
                'email' => 'required|email:rfc,dns',
                'password' => 'required|max:255',
            ]);

            $user = new User();
            $user->name = "123";
            $user->email = $request->post('email');
            $user->password = Hash::make($request->post('password'));
            if ($user->save()) {
                return redirect("/", 301);
            } else {
                throw new \RuntimeException("Can't save user!");
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }

    function login(Request $request) {
        if ($request->isMethod('get')) {
            return view('login');
        }

        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required|max:255',
        ]);

        try {
            /** @var User $user */
            $user = User::query()
                ->where('email', '=' , $request->post('email'))
                ->firstOrFail();

            if (!Hash::check($request->post('password'), $user->password)) {
                throw new NotFoundHttpException("User and password is wrong!");
            }
        } catch (\Exception $e) {
            dd($e);
        }

        // https://laravel.com/docs/8.x/authentication
        // https://ru.stackoverflow.com/questions/90280/%D0%A0%D0%B0%D0%B7%D0%BD%D0%B8%D1%86%D0%B0-%D0%BC%D0%B5%D0%B6%D0%B4%D1%83-cookies-%D0%B8-%D1%81%D0%B5%D1%81%D1%81%D0%B8%D1%8F%D0%BC%D0%B8
        Auth::login($user);
//        $request->session()->put('user', $user->email);

        return redirect('/authorised', 301);
    }
}
